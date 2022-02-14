<?php
require_once 'cabecera.php';


echo "<br><br><br><br><br>";

//preparar las variables
if(isset($_REQUEST["idItem"])){
    $idItem= $_REQUEST["idItem"];

    $items= cogerInfoItem($con, $idItem);
    
    $imagenes= cogerImagenes($con, $idItem);
    $nombreItem= $items[0]["nombre"];
    $pujas= pujasPorItem($con, $idItem);
    $numPujasTotal= count($pujas);
    $descripcion= $items[0]["descripcion"];
    
    if($numPujasTotal> 0){
        $precioPartida= $pujas[0]["cantidad"];
    }else{
        $precioPartida= $items[0]["precio_partida"];
    }
    $fechaFin= date("d/m/Y h:iA", strtotime($items[0]["fechafin"]));

    
    //si se introduce una puja nueva, se comprueba:
        //si es mayor a la puja/precio anterior
        //si se hha pujado más de 3 veces
    $strError="";
    $strExito="";
    if(isset($_POST["butPujar"])){
        $puja= $_POST["puja"];
        $fecha= date("Y-m-d");
        $idUser= $_SESSION["usuarioId"];
        $nPujas= pujasAlDia($con, $idItem, $idUser, $fecha);
        
        if($puja<= $precioPartida){
            $strError= "Puja inválida. Prueba con otra cantidad";
        }else if( $nPujas >=3 ){
            $strError= "Has alcanzado el límite de 3 pujas al día";
        }else{
            if(insertarNuevaPuja($con, $idItem, $idUser, $puja, $fecha)){
                $strExito= "Puja realizada";
                
                $pujas= pujasPorItem($con, $idItem);
                $numPujasTotal= count($pujas);

                $precioPartida= $pujas[0]["cantidad"];

            }else{
                $strError="No se ha podido guardar la puja";
            }
        }
    }
    
    
    //mostrar información
    echo "<h1>".$nombreItem."</h1>";
    echo "<p>Número de pujas: ".$numPujasTotal."</p>";
    echo "<p>Precio actual: ".$precioPartida.MONEDA."</p>";
    echo "<p>Fecha fin para pujar: ".$fechaFin."</p>";
    
    echo "<div>";
    if($imagenes==null){
        echo "<td>NO IMAGEN</td>";
    }else{
        foreach ($imagenes as $imagen) {
            echo "<img width='150' height='150' src='".IMAGES_ROUTE.$imagen["imagen"]."'>";
        }
    }
    echo "</div>";
    echo "<p>".$descripcion."</p>";
    
    echo "<br><br><br>";
    echo "<h1>Puja por este item</h1>";
    if(!isset($_SESSION['usuarioId'])){
        echo "<p>Para pujar debes de autentificarte.<a href='login.php'>Autentificarse</a></p>";
    }else{
?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <p>Añade tu puja en el cuadro inferior:</p>
            <table>
                <tr>
                    <td><input type="number" name="puja"></td>
                    <td>
                        <button type='submit' name="butPujar">Pujar</button>
                    </td>
                </tr>
            </table>
            <div style="color:red;"><?php echo $strError ?></div>
            <div style="color:green;"><?php echo $strExito ?></div>

            <input type="hidden" name="idItem" value ="<?php echo $idItem?>">
        </form>
       
        
        <h2>Historial de la puja</h2>
        <ul>
            <?php
            foreach ($pujas as $puja) {
                $usuarios= quienPujo($con, $puja["id_user"]);
                echo "<li>".$usuarios[0]["username"]." - ".$puja["cantidad"].MONEDA."</li>";
            }
            
            ?> 
        </ul>



<?php
    }
}else{
    echo "<p>Item no disponible</p>" ;
}
    require_once 'pie.php';
?>
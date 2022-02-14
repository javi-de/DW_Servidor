<?php
    require_once 'cabecera.php';
    
    if(isset($_GET['idCat'])){
        $idCat= $_GET['idCat'];
    }else{
        $idCat= "";
    }
    
    //comprobar que lleva bien la variableGET idCat
    //echo "<br><br><br><br><br><br><p>".$idCat."</p>";

    $items= cogerItemsPorCategoria($con, $idCat);
    
    echo "<br><br><br><br><br>";
    
    if($items== null){
        echo "<h2>No hay items disponibles</h2>";
    }else{
?>
        <table>
            <tr>
                <th>IMAGEN</th>
                <th>ITEM</th>
                <th>PUJAS</th>
                <th>PRECIO</th>
                <th>PUJAS HASTA</th>
            </tr>
            <?php
                foreach ($items as $item) {
                    $idItem= $item["id"];
                    $imagenes= cogerImagenes($con, $idItem);
                    $nombreItem= $item["nombre"];
                    $pujas= pujasPorItem($con, $idItem);
                    $numPujas= count($pujas);
                    
                    if($numPujas> 0){
                        $precioPartida= $pujas[0]["cantidad"];
                    }
                    $precioPartida= $item["precio_partida"];
                    $fechaFin= date("d/m/Y h:iA", strtotime($item["fechafin"]));
                    
                    echo "<tr>";
                        if($imagenes==null){
                            echo "<td>NO IMAGEN</td>";
                        }else{
                            echo "<td><img width='150' height='150' src='".IMAGES_ROUTE.$imagenes[0]["imagen"]."'></td>";
                        }
                        echo "<td><a href='".BASE_ROUTE."itemdetalles.php?idItem=$idItem'>".$nombreItem."</a></td>";
                        echo "<td>".$numPujas."</td>";
                        
                        echo "<td>".$precioPartida.MONEDA."</td>";
                        
                        echo "<td>".$fechaFin."</td>";
                    echo "</tr>";
                }






            ?>
        </table>

<?php
    } //fin de else
    
    require_once 'pie.php';
?>
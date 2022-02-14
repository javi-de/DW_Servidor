<?php
    require_once 'cabecera.php';

    if(!isset($_SESSION["usuarioId"])) {
        header("Location: login.php");
    }else{
        $strError="";

        if(isset($_POST["butEnviar"])){
            $nombre= $_POST["nombre"];
            $descripcion= $_POST["descripcion"];
            $precio= $_POST["precio"];
            $categoriaId= $_POST["categoriaId"];
            $userId= $_SESSION["usuarioId"];

            $dia= $_POST["dia"];
            $mes= $_POST["mes"];
            $anio= $_POST["anio"];
            $horas= $_POST["horas"];
            $minutos= $_POST["minutos"];
            $fecha= "$anio-$mes-$dia $horas:$minutos:00";
            $fechaActual = date('d-m-Y H:i:s');
            
            if($nombre== "" && $descripcion=="" && $precio==""){
                $strError="Hay que rellenar todos los campos";
            }else if($fecha<= $fechaActual){
                $strError="La fecha debe ser mayor a la actual";
            }else{
                if( insertarItem($con, $categoriaId, $userId, $nombre, $precio, $descripcion, $fecha) ){
                    header("Location: editaritem.php");
                }else{
                    $strError="Error al insertar Item en BD";
                }
            }
            
        }
        
        
        
        $categorias= cogerCategorias($con);
?>    
        <br><br><br><br><br>
        <h1>AÑADE NUEVO ITEM</h1>
        <p style="color:red;"><?php echo $strError ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Categoría</td>
                    <td>
                        <select name="categoriaId">
                            <?php
                            foreach ($categorias as $categoria) {
                                echo "<option value='".$categoria["id"]."'>".$categoria["categoria"]."</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><textarea name="textarea" rows="10" cols="50" name="descripcion"></textarea></td>
                </tr>
                <tr>
                    <td>Fecha de fin para pujar</td>
                    <td>
                        <table>
                            <tr>
                                <td>Día</td>
                                <td>Mes</td>
                                <td>Año</td>
                                <td>Hora</td>
                                <td>Minutos</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="dia">
                                        <?php
                                        for ($index = 1; $index <= 31; $index++) {
                                            echo "<option value='$index'>$index</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="mes">
                                        <?php
                                        for ($index = 1; $index <= 12; $index++) {
                                            echo "<option value='$index'>$index</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="anio">
                                        <?php
                                        $anio= date("Y");
                                        for ($index = $anio; $index <= ($anio+5); $index++) {
                                            echo "<option value='$index'>$index</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="horas">
                                        <?php
                                        for ($index = 0; $index <= 23; $index++) {
                                            echo "<option value='$index'>$index</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="minutos">
                                        <?php
                                        for ($index = 0; $index <= 59; $index++) {
                                            echo "<option value='$index'>$index</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="number" name="precio"><?php echo MONEDA ?></td>
                </tr>
                <tr><td colspan="2">
                    <button type="submit" name="butEnviar">Enviar</button>
                </td></tr>
            </table>
        </form>
    
    
<?php
    }
    require_once 'pie.php';
?>
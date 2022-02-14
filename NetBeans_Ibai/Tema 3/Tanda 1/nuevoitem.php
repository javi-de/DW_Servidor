<?php
    require_once 'cabecera.php';
    $_SESSION['ultimaPag']=$_SERVER['PHP_SELF'];
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
    }
    $err="";
    if(isset($_POST['submit'])){
       if($_POST['nombre']!="" && $_POST['descripcion']!="" && $_POST['precio']>0){
           $anyo=$_POST['anyo'];
           $mes=$_POST['mes'];
           $dia=$_POST['dia'];
           $horas=$_POST['hora'];
           $minutos=$_POST['minutos'];
           $fecha= date('Y-m-d H:i', strtotime("$anyo-$mes-$dia $horas:$minutos"));
           $fechaActual=date('Y-m-d H:i');
           $fechaMes=date("m", strtotime($fecha));
           if($fechaMes!=$mes){
               $err="Fecha incorrecta";
           } elseif($fecha>$fechaActual){
               $id_cat=$_POST['categoria'];
               $id_user=$_SESSION['id'];
               $nombre=$_POST['nombre'];
               $preciopartida=$_POST['precio'];
               $descripcion=$_POST['descripcion'];
               $fechafin=$fecha;
               crearItem($con, $id_cat, $id_user, $nombre, $preciopartida, $descripcion, $fechafin);
               $idItem=itemUltimoId($con);
               header("Location: editaritem.php?id=$idItem");
           }
           
       } else {
            $err="Rellena todos los campos";
        }
    } 
?>
<p style="color: red"><?php echo $err?></p>
<h2>Añade nuevo item</h2>
<table border="1">
    <form action="" method="POST" enctype="multipart/form-data">
        <tr>
            <td><label for="categoria">Categoría</label></td>
            <td>
                <select name="categoria" id="categoria">
                    <?php
                        $categorias=categorias($con);
                        foreach ($categorias as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }          
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="nombre">Nombre</label></td>
            <td><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripción</label></td>
            <td>
                <textarea name="descripcion" rows="10" cols="40"></textarea>
            </td>
        </tr>
        <tr>
            <td><label for="fecha">Fecha de fin para pujas</label></td>
            <td>
                <table border="1">
                    <tr>
                        <td><label for="dia">Día</label></td>
                        <td><label for="mes">Mes</label></td>
                        <td><label for="anyo">Año</label></td>
                        <td><label for="hora">Hora</label></td>
                        <td><label for="minutos">Minutos</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="dia" id="dia">
                                <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo "<option value'$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="mes" id="mes">
                                <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo "<option value'$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="anyo" id="anyo">
                                <?php
                                    for ($i = date("Y"); $i <= (date("Y")+5); $i++) {
                                        echo "<option value'$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="hora" id="hora">
                                <?php
                                    for ($i = 0; $i <= 23; $i++) {
                                        echo "<option value'$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="minutos" id="minutos">
                                <?php
                                    for ($i = 0; $i <= 59; $i++) {
                                        echo "<option value'$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><label for="precio">Precio</label></td>
            <td><input type="number" id="precio" name="precio"><?php echo MONEDA_LOCAL ?></td>
        </tr>
        <tr>
            <td colspan="2"><input style="width: 100%" type="submit" name="submit" value="Enviar!"></td>
        </tr>
    </form>
</table>

<?php
    require_once 'pie.php';
?>


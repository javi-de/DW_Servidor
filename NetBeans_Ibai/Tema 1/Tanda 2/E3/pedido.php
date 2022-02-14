<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $articulos=fopen("articulos.txt", "a+");
            if (isset($_GET['cant'])) {
                $cant=floatval($_GET['cant']);
            } else {
                $cant=0;
            }
            if (isset($_POST['enviado']) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                $ruta=$_FILES['archivo']['tmp_name'];
                $rutaNueva=$_POST['nombre'];
                move_uploaded_file($ruta,$rutaNueva.".txt");
            }
        ?>
        <table>
            <caption style="background-color: grey">ELIGE TU PEDIDO</caption>
            <?php
                if (isset($_POST['nombre']) && isset($_POST['precio'])) {
                    $item=$_POST['nombre'].";".$_POST['precio'].PHP_EOL;
                    fwrite($articulos, $item);
                    fclose($articulos);
                }
                $articulos=fopen("articulos.txt", "a+");
                while ($value=fgets($articulos)) {
                    echo "<tr>";
                    $texto=explode(";", $value);
                    echo    "<td>".$texto[0]."</td>";
                    echo    "<td>".$texto[1]."</td>";
                    $cant2=$cant+floatval($texto[1]);
                    echo    "<td><a href='?cant=".$cant2."'>Añadir unidad</a></td>";
                    if (file_exists($texto[0].".txt")) {
                        echo "<td><a href=".$texto[0].'.txt'.">Ver descripcion</a></td>";
                    }
                    echo "</tr>";
                }
                echo "<tr><td colspan='3' style='text-align:center; background-color: grey'>TOTAL: ".$cant."€</td></tr>";
                
                
            ?>
        </table>
        <br>
        <table>
            <caption style="background-color: grey">AÑADE ARTICULO</caption>
            <tr>
                <td>Nombre:</td>
                <td>Precio(€):</td>
            </tr>
            <tr>
            <form name="form" action="pedido.php" method="POST" enctype="multipart/form-data">
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="precio"></td>
                <td><input type="submit" name="enviado" value="Añadir"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="file" name="archivo"/></td>
            </form>
            </tr>
        </table>
    </body>
</html>

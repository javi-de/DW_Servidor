<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            define("NOM", "DIRIMG");
            $directorio= opendir(NOM);
            $cant= cuentaImag($directorio);
            
            function cuentaImag($carpeta) {
                $cant=0;
                $arrext=array("jpg","png","tiff");
                while ($nombre=readdir($carpeta)) {
                    $separado=explode(".", $nombre);
                    $extension=$separado[1];
                    if (in_array($extension, $arrext)) {
                        $cant++;
                    }
                }
                return $cant;
            }
            closedir($directorio);
        ?>
        <form name="form" action="eval_imag.php" method="POST">
            <label for="cantidad">¿Cuántas imágenes deseas ver?</label>
            <select name="cantidad">
                <?php
                        for ($i = 2; $i <= $cant; $i++) {
                            echo "<option value=".$i.">$i</option>";
                        }
                ?>
            </select><br>
            <input type="submit" name="accion1" value="VER IMAGENES">
        </form>
        
    </body>
</html>

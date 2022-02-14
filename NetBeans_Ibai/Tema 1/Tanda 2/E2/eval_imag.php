<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php  
        //Parte 1
        if (isset($_POST['accion1'])){
            $cantidad=$_POST["cantidad"];
            $directorio= opendir("DIRIMG");
            //Rutas imagenes
            function rutas_imag($carpeta) {
                $agregados=array();
                $arrext=array("jpg","png","tiff");
                while ($nombre=readdir($carpeta)) {
                    $separado=explode(".", $nombre);
                    $extension=$separado[1];
                    if (in_array($extension, $arrext)) {
                        array_push($agregados,$nombre);
                    }
                }
                return $agregados;
            }
            //Uso rutas imagenes
            $agregados=rutas_imag($directorio);
            closedir($directorio);
            //Numeros random en base a cantidad de numeros de un array
            $cantidades=array_rand($agregados, $cantidad);
            //HTML
            echo '<form name="form2" action="eval_imag.php" method="POST">';
                echo '<table>';
                    $cant=0;
                    while ($cant<$cantidad) {
                        echo "<tr>"
                                . "<td><img src='DIRIMG/".$agregados[$cantidades[$cant]]."' width='100px' heigth='100px'></td>"
                                . "<td><input type='checkbox' name='Mg[]' id=".$agregados[$cantidades[$cant]]." value=".$agregados[$cantidades[$cant]]."/></td>"
                                . "<td><label for=".$agregados[$cantidades[$cant]].">Me gusta</label></td>"
                            . "</tr>";
                        $cant++;
                    }      
                
                echo '</table>';
            echo "<input type='submit' name='accion2' value='ENVIAR VALORACIONES'>";
            echo "</form>";
        //Parte 2
        } elseif (isset ($_POST['accion2'])) {
            if (isset($_POST['Mg'])) {
                echo "Gracias por tu envio<br>";
                $imagenes=$_POST['Mg'];
                $ficheroIPImagenes= fopen("DIRIMG/ficheroIPImagenes.txt","a+");
                $ip=$_SERVER['REMOTE_ADDR'];
                fwrite($ficheroIPImagenes, $ip);
                foreach ($imagenes as $value) {
                    fwrite($ficheroIPImagenes, " ".$value);
                }fwrite($ficheroIPImagenes, PHP_EOL);
                fclose($ficheroIPImagenes);
            }else{
                echo 'Sentimos que no le haya gustado ninguna<br>';
            }
            echo '<a href="selec_cantidad.php">Volver a la pagina inicial</a>';
        }
        ?>

    </body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS.css">
    <title>Ejercicio2_b</title>
</head>
<body>
    <?php
            if(isset($_GET["butEnviar"])){
                if( isset($_GET["imagenes"]) ){
                    echo "<p>Imagenes favoritas guardadas</p><br>";
                    $arrGuardarImgs= $_GET["imagenes"];
                    
                    /*foreach($arrGuardarImgs as $img){
                        echo $img."<br>";
                    }*/
                
                    $client_ip= $_SERVER["REMOTE_ADDR"]; //IP
                    $linea="\n".$client_ip." --> ";
                    
                    $f= fopen("./imgLikeGuardadas.txt", "a");
                    for($count= 0; $count< count($arrGuardarImgs); $count++){
                        $linea.= $arrGuardarImgs[$count]."  ";
                    }
                    fwrite($f, $linea);
                    
                    fclose($f);
                    
                }else
                    echo "<p>Sentimos que no le haya gustado ninguna</p><br>";

                echo "<form name='input' action='selec_cantidad.php' method='get'>
                        <button type='submit' name='butVolver'>Volver a la página principal</button>
                      </form>";
                //echo <a>

            }else{
                $nImages= $_GET['images'];

                echo "<p> Nº de imgs: ".$nImages."</p>";

                $arrUrlImgs=array();

                function rutasImag($carpeta){
                    // Abrimos la carpeta que nos pasan como parámetro
                    $dir = opendir($carpeta);
                    // Leo todos los ficheros de la carpeta
                    while ($elemento = readdir($dir)){
                        // Tratamos los elementos . y .. que tienen todas las carpetas
                        if( $elemento != "." && $elemento != ".."){
                            //guardamos los archivos en el array de imagenes.
                            $arrUrlImgs[]= $carpeta.$elemento;

                            //echo $path.$elemento."<br>";
                            //echo count($arrUrlImgs)."<br>";
                        }
                    }
                    return $arrUrlImgs;
                }

                $arrUrlImgs= rutasImag("./DIRIMG/");

                //echo count($arrUrlImgs)."<br>";
          
        ?>

        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
            <table>
                <?php
                    $arrKeyRandom= array_rand($arrUrlImgs, $nImages);
                    foreach($arrKeyRandom as $key){
                        echo "<tr>
                                <td>
                                    <img src='".$arrUrlImgs[$key]."' width='100' height='100'>
                                </td>
                                <td>
                                    <input type='checkbox' id='".$key."' name='imagenes[]' value='".$arrUrlImgs[$key]."'/>
                                    <label for='".$key."'>Me gusta</label><br>
                                </td>
                            </tr>";
                    }
                ?>
                <button type="submit" name="butEnviar">ENVIAR VALORACIONES</button>
            </table>
        </form>

        <?php
            }
        ?>
        
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
        define('DIRECCION', './fichClaves/');
        
        $textoCorrecto= false;
        $desplazaCorrecto= false;
    
        $tipoCifrado= array(3, 5, 10);
        $texto="";
        $desplazamiento="";
        $archivoSeleccionado;
        
        /*Se comprueba si se ha clicado el boton butCesar y, en caso de que 
        * el campo textoACifrar tenga un valor, se guarda en una variable  
        */
        if( isset($_GET["butCesar"]) && !empty($_GET["textoACifrar"])){
           $texto = $_GET["textoACifrar"];
           $textoCorrecto= true;
        }
       
        /*Se comprueba si se ha clicado el boton butCesar y, en caso de que 
        * el se haya elegido un desplazamiento, se guarda en una variable  
        */
        if (isset($_GET["butCesar"]) && !empty($_GET["tipoCesar"])){
            $desplazamiento= $_GET["tipoCesar"];
            $desplazaCorrecto= true;
        }
        
        /* si se ha pulsado el boton butSustitucion, 
         * guarda el fichero que este seleccionado en la ista desplegable (
         * siempre hay uno seleccionado)
         */
        if (isset($_GET["butSustitucion"])&& !empty($_GET["textoACifrar"])){
            $texto = $_GET["textoACifrar"];
            $textoCorrecto= true;
            $archivoSeleccionado= $_GET["ficheros"];
        }
        
        /***********************************************************/
        function cifrarTextoCesar($texto, $desplazamiento){
            $textoCifrado="";
            
            for($count= 0; $count< strlen($texto); $count++){
                $car= strtolower($texto[$count]);
                
                $numCar= ord($car)+ $desplazamiento;
                if($numCar> ord('z')){
                    $numCar-= ord('z')-ord('a')+1;
                }
                //echo "Numero ".$numCar."<br>";
                $carCar= chr($numCar);
                //echo "Letra ".$carCar."<br>";
                $textoCifrado.= strtoupper($carCar);
            }
            
            return $textoCifrado;
        }
        
        /******************************************************************/
        function cifrarTextoSustitucion($texto, $archivoSeleccionado){
            $textoCifrado="";
            $textoArchivo= file_get_contents(DIRECCION.$archivoSeleccionado);
            
            for($count= 0; $count< strlen($texto); $count++){
                $numCar= ord(strtolower($texto[$count]));
                //echo "<p>".($numCar-ord('a'))."</p>";
                $carCifrado= $textoArchivo[$numCar-ord('a')];
                $textoCifrado.= strtoupper($carCifrado);
            }
            
            return $textoCifrado;
        }
    ?>
    
    <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <table>
            <tr>
                <td><label for="textoACifrar">Texto a cifrar</label></td>
                <td><input type="text" id="textoACifrar" name="textoACifrar" value="<?php echo strtoupper($texto); ?>"><br></td>
                <?php
                    /*Si se ha pulsado el boton butCesar y el campo textoACifrar no tiene
                     * ningún valor, se muestra un mensaje al lado de la caja de texto
                     */ 
                    if (isset($_GET["butCesar"]) && empty($_GET["textoACifrar"]))
                        echo "<td><span>Introduce un texto!!</span></td>";
                ?>
            </tr>

            <tr>
                <td><label>Desplazamiento</label></td>
                <td>
                    <?php
                        foreach($tipoCifrado as $num){
                            echo "<input type='radio' id='radio".$num."' name='tipoCesar' value='".$num."'>";
                            echo "<label for='radio".$num."'>".$num."<label><br>";
                        }
                    ?>
                </td>
                
                <td><button type="submit" name="butCesar">CIFRADO CESAR</button></td>

                <?php
                    if (isset($_GET["butCesar"]) && empty($_GET["tipoCesar"]))
                        echo "<td><span>Selecciona un desplazamiento!!</span></td>";
                ?>
            </tr>

            <tr>
                <td><label>Fichero de clave</label></td>
                <td>
                    <select name="ficheros">
                        <?php
                            if(file_exists(DIRECCION)){
                                $arrFiles= scandir(DIRECCION);
                                foreach($arrFiles as $file){
                                    if(is_file(DIRECCION.$file))
                                        echo "<option value='".$file."'>".$file."</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td><button type="submit" name="butSustitucion">CIFRADO POR SUSTITUCIÓN</button></td>
                <?php
                    if (isset($_GET["butSustitucion"]) && empty($_GET["textoACifrar"]))
                         echo "<td><span>Introduce un texto!!</span></td>";
                ?>
            </tr>
        </table>
            
        <?php
            if($textoCorrecto){
                if($desplazaCorrecto && isset($_GET["butCesar"])){
                    echo "<h2><strong>Texto cifrado: ".cifrarTextoCesar($texto, $desplazamiento)."</strong></h2>";
                }
                if( isset($_GET["butSustitucion"])){
                    echo "<h2><strong>Texto cifrado: ". cifrarTextoSustitucion($texto, $archivoSeleccionado)."</strong></h2>";
                }
            }    
        ?>
    </form>
</body>
</html>


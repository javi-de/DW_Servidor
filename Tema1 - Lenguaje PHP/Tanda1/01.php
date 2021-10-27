<?php
    function fechaActual(){
        echo date("d")."th ".date("F Y").", ".date("l");
    }
    
    function diasRestantes(){
        $fecha_fin= strtotime("2022/1/1");
        $fecha_actual= time();

        $diastotales= (int)(($fecha_fin - $fecha_actual)/(3600*24));

        echo "Faltan ".$diastotales." dias hasta fin de año";
    }
    
    function crearFrase(){
        $arrayPalabras=array("Hola", "que", "tal");
        $fraseCompleta= "";
        
        foreach($arrayPalabras as $palabra){
            $fraseCompleta.= $palabra . " ";
        }
        
        echo $fraseCompleta;
    }
    
    function reemplazando($entrada){
       $salida= str_replace("ñ", "gn", $entrada);
       
       echo $salida;
    }
   
    function dameNumerosRandom($cuantos, $limInf, $limSup){        
        if($limInf> $limSup){
            $aux= $limSup;
            $limSup= $limInf;
            $limInf= $aux;
        }    
        
        for($cont= 1; $cont<= $cuantos; $cont++){
            $num= rand($limInf, $limSup);
            $arrayRandom[$cont-1]= $num;       
        }
        
        echo join(', ', $arrayRandom);
    }
    
    function dameCadena($cadena){
        $arrCifrado= array("h" =>"HH", 
                           "o" =>"OO", 
                           "l" =>"LL", 
                           "a" =>"AA", 
                           //"q" =>"QQ", 
                           "u" =>"UU", 
                           "e" =>"EE",
                           //"t" =>"TT",
                           " " =>"_"
                            );
        
        $cadenaCifrada="";
        
        for($cont= 0; $cont<= strlen($cadena)-1; $cont++){
            if(array_key_exists($cadena[$cont], $arrCifrado)){
                $cadenaCifrada.= $arrCifrado[$cadena[$cont]];
            }
            else{
                $cadenaCifrada.= $cadena[$cont];
            }
        }
        
        echo $cadenaCifrada;
    }
    
    fechaActual();
    echo "<br>";
    diasRestantes();
    echo "<br>";
    crearFrase();
    echo "<br>";
    reemplazando("niño, guiño, piña");
    echo "<br>";
    dameNumerosRandom(5, 1, 9);
    echo "<br>";
    dameCadena("hola que tal");
    
?>
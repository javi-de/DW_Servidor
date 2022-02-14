<?php
    function dameFechaActual(){           
        return date("d F Y, l");;
    }
    
    /************************************************************/
    function diasParaFinAnio(){
        $anio= date("Y");
        $diasAnio= 365;
        
        if(anioBisiesto($anio)){
            $diasAnio++;
        }
        
        return $diasAnio - date("z") + 1;
    }
    
    function anioBisiesto($anio){
        if( (($anio%4== 0) && ($anio%100!= 0)) || ($anio%400== 0)){
            return true;
        }
    }
    
    /************************************************************/
    function crearFrase($arrCadena){
        $frase="";
        foreach ($arrCadena as $palabra) {
            $frase.= $palabra . " ";
        }
        
        return $frase;
    }
    
    /************************************************************/
    function sustituyeEnies($strCadena){
        $frase= str_replace("ñ", "gn", $strCadena);
        
        return $frase;
    }
    /************************************************************/

    
    function cifrarCadena($strCadena){
        $cifrador = ["A"=>"20","H"=>"9R","M"=>"abcd"];
        $palabraCifrada= $strCadena;
        foreach ($cifrador as $key => $value) {
            $palabraCifrada= str_replace($key, $value, $palabraCifrada);
        }
        
        return $palabraCifrada;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>RESULTADOS</h1>
    <p>Fecha actual:
        <?php echo dameFechaActual(); ?>
    </p>
    <p>Días para que termine el año: 
        <?php echo diasParaFinAnio() ?>
    </p>
    <p>Crear frase: 
        <?php 
            $arrCadena= ["hola", "que", "tal"];
            echo crearFrase($arrCadena);
        ?>    
    </p>
    <p>Sustituir eñes: 
        <?php 
            $strCadena= "Menuda ñapa le hicimos a la niña del ñoño";
            echo sustituyeEnies($strCadena);
        ?>
    </p>
    <p>Cifrar cadena:
        <?php 
            $strCadena="HOLA AMO";
            echo cifrarCadena($strCadena);
        ?>
    </p>
    
</body>

</html>
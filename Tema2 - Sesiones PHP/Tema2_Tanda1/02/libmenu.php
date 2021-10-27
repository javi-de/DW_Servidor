<?php
    function autentica($strUsu, $strPass){
        $f= fopen("socios.txt", "r");
        
        while(!feof($f)){
            $linea= fgets($f);
            $arrLinea= explode(" ", $linea);
            echo $arrLinea[0]." -- ".$arrLinea[1];
            if($arrLinea[0]== $strUsu && $arrLinea[1]== $strPass)
                return 1;
        }
        
        fclose($f); 
        
        return 0;
    }
    
    function dameDcto($strUsu){
        $f= fopen("socios.txt", "r");
        
        while(!feof($f)){
            $linea= fgets($f);
            $arrLinea= explode(" ", $linea);
            
            if($arrLinea[0]== $strUsu)
                return $arrLinea[2];
        }
        
        fclose($f);  
    }
    
    function damePlatos($tipoPlato){
        // tipoPlato= Primero, Segundo o Postre
        $arrPlatosSelec= [];
        
        $f= fopen("platos.txt", "r");
        
        while(!feof($f)){
            $linea= fgets($f);
            
            $arrLinea= explode(" ", $linea);
            if($arrLinea[1]== $tipoPlato)
                $arrPlatosSelec[$arrLinea[0]]= $arrLinea[2];
            
            
        }
        fclose($f); 
        /*
        foreach ($arrPlatosSelec as $key => $value) {
            echo $key;
            echo "*";
            echo $value;
            echo "<br>";
            
        }*/
        return $arrPlatosSelec;
    }
    
    function damePrecio($nombrePlato){
        $f= fopen("platos.txt", "r");
        
        while(!feof($f)){
            $linea= fgets($f);
            $arrLinea= explode(" ", $linea);
            
            if($arrLinea[0]== $nombrePlato)
               return $arrLinea[2];
        }
        
        fclose($f); 
    }

?>
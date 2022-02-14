<?php
    function autentica($usuario, $password) {
        $gestor= fopen("socios.txt", "r");
        while(!feof($gestor)){
            $linea=fgets($gestor);
            $separado=explode(" ", $linea);
            if($usuario==$separado[0] && $password==$separado[1]){
                return 1;
            } 
        }
        return -1;
    }
    
    function dameDcto($nombre) {
        $gestor= fopen("socios.txt", "r");
        while(!feof($gestor)){
            $linea=fgets($gestor);
            $separado=explode(" ", $linea);
            if($nombre==$separado[0]){
                return $separado[2];
            } 
        }
        return -1;
    }
    
    function damePlatos($tipo) {
        $platos=array();
        $gestor= fopen("platos.txt", "r");
        while(!feof($gestor)){
            $linea=fgets($gestor);
            $separado=explode(" ", $linea);
            if($tipo==$separado[1]){
                $platos[$separado[0]]=$separado[2];
            } 
        }
        return $platos;
    }
    
    function damePrecio($plato) {
        $gestor= fopen("platos.txt", "r");
        while(!feof($gestor)){
            $linea=fgets($gestor);
            $separado=explode(" ", $linea);
            if($plato==$separado[0]){
                return $separado[2];
            } 
        }
        return -1;
    }

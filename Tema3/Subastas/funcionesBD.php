<?php
    require_once("config.php");

    //conectarse a la BD
    function conectarBD(){
        $conn= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        mysqli_set_charset($conn, "UTF8");
        return $conn;
    }

    //comparar datos introducidos en login.php con la BD
    function comprobarLogin($conn, $usu, $pass){
        $sentencia= "SELECT id, activo
                     FROM usuario
                     WHERE username='".$usu."' AND password='".$pass."'";

        //convierte el string $sentencia en una consulta sql y se guarda en una boolean
        $sentenciaPreparada= $conn->prepare($sentencia);

        if(!$sentenciaPreparada){
            return false;
        }

        //ejecuta la consulta sql y se guarda en una boolean
        $ejecucionCorrecta= $sentenciaPreparada->execute();

        if($ejecucionCorrecta){
            $resultado= $sentenciaPreparada->get_result();
            
            if($resultado->num_rows> 0){
                $fila= $resultado->fetch_assoc();

                if(!$fila){
                    $sentenciaPreparada->close();
                    return false;
                }

                $sentenciaPreparada->close();
                return $fila;
            }
        }

        $sentenciaPreparada->close();
        return false;
    }

    
    function registrarUsuario($conn, $usu, $nombre, $pass, $email){
        $cadenaverificacion= crearCadenaVerificacion();
        
        $sentencia= "INSERT INTO usuario(username, nombre, password, email, cadenaverificacion, activo, falso)".
                     "VALUES ('$usu', '$nombre', '$pass', '$email', '$cadenaverificacion', 1, 0)";

        $sentenciaPreparada= $conn->prepare($sentencia);

        if(!$sentenciaPreparada){
            return false;
        }

        $ejecucionCorrecta= $sentenciaPreparada->execute();

        if(!$ejecucionCorrecta){
            return false;
        }

        $sentenciaPreparada->close();
        return true;
    }

    function crearCadenaVerificacion(){
        $maxCar= 16;
        $cadena= "";

        for ($i= 0; $i< $maxCar; $i++) {
            $car= chr(random_int(ord('A'), ord('z')));
            $cadena.= $car;
        }

        return $cadena;
    }

    function dameItems($conn){
        $sentencia = "SELECT id FROM item";  

        $sentenciaPreparada= $conn->prepare($sentencia);

        if(!$sentenciaPreparada)
            return false;

        $ejecucionCorrecta= $sentenciaPreparada->execute();

        if(!$ejecucionCorrecta)
            return false;
        else{
            $resultado= $sentenciaPreparada->get_result();

            if($resultado->num_rows> 0){

                while($fila= $resultado->fetch_assoc())
                $filas[]= $fila;

                $sentenciaPreparada->close();
                return $filas;
            }
        }
    }
    





?>
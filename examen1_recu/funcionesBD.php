<?php
    require_once("config.php");

    //conectarse a la BD
    function conectarBD(){
        $conn= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        mysqli_set_charset($conn, "UTF8");
        return $conn;
    }



    function dameTemas($conn, $categoria){
        if($categoria== "todas")
            $sentencia= "SELECT IDTEMA, TEMA FROM TEMAS";
        else
            $sentencia= "SELECT IDTEMA, TEMA FROM TEMAS WHERE CATEGORIA= '".$categoria."'";

        
        $sentenciaPreparada = $conn->prepare($sentencia);
        
        $temas = [];
        if($sentenciaPreparada === false)
            return $temas;
        
        $sentenciaEjecutada = $sentenciaPreparada->execute();

        if($sentenciaEjecutada){
            $result = $sentenciaPreparada->get_result();
            while ($tema = $result->fetch_assoc()) {
                $temas[] = $tema;
            }
        }

        $sentenciaPreparada->close();
        return $temas;
    }

    function dameNumCursosDe($conn, $idCat){ 
        if($idCat== "todas")
            $sentencia= "SELECT count(*) FROM CURSOS";
        else
            $sentencia= "SELECT count(*) FROM CURSOS WHERE IDTEMA= '".$idCat."'";

        $catresult = mysqli_query($conn, $sentencia);
        $catrow = mysqli_fetch_assoc($catresult);

        return $catrow ;

    }

    function damePrecios($conn, $idTemaCurso){
        $sentencia= "SELECT PRECIO FROM CURSOS WHERE IDTEMA='".$idTemaCurso."' ORDER BY PRECIO";

        $sentenciaPreparada = $conn->prepare($sentencia);
        
        $precios = [];
        if($sentenciaPreparada === false)
            return $precios;
        
        $sentenciaEjecutada = $sentenciaPreparada->execute();

        if($sentenciaEjecutada){
            $result = $sentenciaPreparada->get_result();
            while ($precio = $result->fetch_assoc()) {
                $precios[] = $precio;
            }
        }

        $sentenciaPreparada->close();
        
        return $precios;
    }

    function subirBajarPrecios($conn, $idTemaCurso, $resultadoPrecio){
        $sentencia= "UPDATE cursos SET PRECIO='".$resultadoPrecio."' WHERE IDTEMA='".$idTemaCurso."'";

        $sentenciaPreparada = $conn->prepare($sentencia);
                
        if($sentenciaPreparada == false){
            echo "preparacion";
            return false;
        }

        $ejecucionCorrecta = $sentenciaPreparada->execute();

        if(!$ejecucionCorrecta){
            echo "ejecucion";
            return false;
        }
        else{
            $resultado= $sentenciaPreparada->get_result();
            return true;
        }
    }

    function cambiarPrecios($conn, $porcen, $arrCheckIds){           
        $contPreciosCambiados= 0;

        foreach ($arrCheckIds as $idTemaCurso) {
            echo "idTemaCurso: ".$idTemaCurso;
            $precios= damePrecios($conn, $idTemaCurso);

            foreach ($precios as $precio) {
                echo "precio: ".$precio["PRECIO"];
                $resultadoPrecio= floatval($precio["PRECIO"]) * $porcen;
                echo "* porcen=".$resultadoPrecio;

                if($resultadoPrecio>= 150 || $resultadoPrecio <=9)
                    return 0;
                else{
                    if(subirBajarPrecios($conn, $porcen, $idTemaCurso, $resultadoPrecio) )
                        $contPreciosCambiados++;
                }
            }
        }

        return $contPreciosCambiados;
    }


    function dameCursosHoy($date){
        $sentencia= "SELECT * FROM CURSOS WHERE DIA='".$date."'";


    }



?>
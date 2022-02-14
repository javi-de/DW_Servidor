<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            //Todas las preguntas
            $preguntas=array(
                "GEOGRAFIA" => array(
                    "Actual presodente de EEUU" => array(
                        "Biden","Obama","Reagan","Trump"
                    ),
                    "Capital de Francia" => array(
                        "Paris","Kiev","Bruselas","Madrid"
                    )
                ),
                "CINE" => array(
                    "Director de Pulp Fiction" => array(
                        "Tarantino","Kubrick"
                    ),
                    "Lugar de exilio de Cahrles Champlin" => array(
                        "Suiza", "Canada"
                    ),
                    "Director de Psicosis" => array(
                        "Hitchcock","Scorsesse","Tarantino","Allen"
                    )
                ),
                "CIENCIAS" => array(
                    "Formula de la sal" => array(
                        "NaCl","SaL","Co2"
                    )
                ));
            //Preguntas selecionadas y NPregunta
            if(!isset($_SESSION['preguntas'])){
                $_SESSION['preguntas']=array();
                $_SESSION['nPregunta']=array();
                $_SESSION['aciertos']=array();
                if(isset($_SESSION['tipo'])){
                    $tipos=$_SESSION['tipo'];
                    foreach ($tipos as $key => $value) {
                        if(isset($preguntas[$value])){
                            $_SESSION['preguntas'][$value]=$preguntas[$value];
                            $_SESSION['nPregunta'][$value]=1;
                            $_SESSION['aciertos'][$value]=0;
                        }
                    }
                }
            }
            //Juego y grabar
            foreach ($_SESSION['preguntas'] as $key => $value) {
                if(isset($_POST[$key])){
                    $_SESSION['nPregunta'][$key]++;
                    foreach ($value as $key2 => $value2) {
                        if(isset($_POST['respuesta'])){
                            foreach ($value2 as $key3 => $value3) {
                                if($_POST['respuesta']==$value3){
                                    $_SESSION['aciertos'][$key]++;
                                }
                                break;
                            }
                        }
                    }
                } 
            }
            //Grabar
            $gestor=fopen("fallos.txt","a+");
            $texto="";
            foreach ($_SESSION['preguntas'] as $tipo => $value) {
                if(isset($_POST[$tipo])){
                    $tipoPregunta=$_POST[$tipo];
                    $numeroPregunta=$_SESSION['nPregunta'][$tipo]-1;
                    $cont=1;
                    if(isset($_POST['respuesta'])){
                        foreach ($value as $pregunta => $value2){
                            if($cont==$numeroPregunta){
                                foreach ($value2 as $key => $respuesta) {
                                    if($_POST['respuesta']!=$respuesta){
                                        $texto="Pregunta: $pregunta, respuesta: ".$_POST['respuesta'].", correcta: $respuesta \n";
                                    }
                                    break;
                                }
                            }
                            $cont=$cont+1;
                        }
                    } else {
                        foreach ($value as $pregunta => $value2){
                            print_r($cont." --- ".$numeroPregunta);
                            if($cont==$numeroPregunta){
                                foreach ($value2 as $key => $respuesta) {
                                    $texto="Pregunta: $pregunta, no se ha respondido a la pregunta, correcta: $respuesta \n";
                                    print_r($texto);
                                    break;
                                }
                            }
                            $cont=$cont+1;
                        }
                    }
                }
            }
            fwrite($gestor, $texto);
            fclose($gestor);
            //Tabla
            $tabla="<table border='1'><tr>"
                        . "<th>TIPO</th>"
                        . "<th>NºPREGUNTA</th>"
                        . "<th>PREGUNTA</th>"
                        . "<th>RESPUESTAS</th>"
                        . "<th></th>"
                        . "<th></th>"
                    . "</tr>";
            if(isset($_SESSION['preguntas'])){
                $quedan=false;
                foreach ($_SESSION['preguntas'] as $key => $value) {
                    $numPregunta=$_SESSION['nPregunta'][$key];
                    $tabla.="<tr><td>$key</td>";
                    if($numPregunta<=$_SESSION['cantidad'][$key] && $numPregunta<=sizeof($value)){
                        $quedan=true;
                        $tabla.= "<td>".$numPregunta."</td>";
                        $cont=0;
                        foreach ($value as $key2 => $value2) {
                            if($cont==$numPregunta-1){
                                $tabla.= "<td>$key2</td><td>";
                                shuffle($value2);
                                foreach ($value2 as $key3 => $value3) {
                                    $tabla.="<input id='$value3' name='respuesta' value='$value3' type='radio'>"
                                        . "<label for='$value3'>$value3</label>";
                                }
                                $tabla.="</td>";
                            }
                            $cont++;
                        }
                        $tabla.="<td><input type='submit' name='$key' value='ENVIAR' style='color: white; background-color: dodgerblue;'></td>";
                    } else{
                        $tabla.="<td></td><td></td><td></td><td></td>";
                    }
                    $tabla.="<td>".$_SESSION['aciertos'][$key]." aciertos</td></tr>";
                }
            }
            $tabla.= "</table>";
            $archivo="";
            if(!$quedan){
                $gestor=fopen("fallos.txt","a+");
                $texto="--------------------------FFFIIINNN--------------------------\n\n";
                fwrite($gestor, $texto);
                fclose($gestor);
                $archivo="<a href='fallos.txt'>Fallos</a>";
            }
        ?>
        <form action="jugar.php" method="POST" enctype="multipart/form-data">
            <?php echo $tabla; ?>
        </form>
        <?php echo $archivo ?>
    </body>
</html>

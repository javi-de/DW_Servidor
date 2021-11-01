<?php  
    session_start();

    $_SESSION["preguntasYrespuestas"]= 
        [
            "CINE"        =>[["pregunta1_CINE?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_CINE?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_CINE?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ],
            "LITERATURA"  =>[["pregunta1_LITERATURA?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_LITERATURA?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_LITERATURA?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ],
            "GEOGRAFIA"   =>[["pregunta1_GEOGRAFIA?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_GEOGRAFIA?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_GEOGRAFIA?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ],
            "BIOLOGIA"    =>[["pregunta1_BIOLOGIA?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_BIOLOGIA?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_BIOLOGIA?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ],
            "QUIMICA"     =>[["pregunta1_QUIMICA?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_QUIMICA?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_QUIMICA?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ],
            "INFORMATICA" =>[["pregunta1_INFORMATICA?", "p1_Resp. Correcta", "p1_Resp. Falsa 1", "p1_Resp. Falsa 2"],
                                ["pregunta2_INFORMATICA?", "p2_Resp. Correcta", "p2_Resp. Falsa 1", "p2_Resp. Falsa 2"],
                                ["pregunta3_INFORMATICA?", "p3_Resp. Correcta", "p3_Resp. Falsa 1", "p3_Resp. Falsa 2"]
                            ]
        ];
        
    $arrTiposPreg= ["", "CINE", "LITERATURA", "GEOGRAFIA", "BIOLOGIA", "QUIMICA", "INFORMATICA"];
    $cantidadPreg= 3;

    $arrTiposTodos= [];
    $arrTiposSeleccionados= [];
    $arrCantidadesSeleccionadas= [];

    if(isset($_POST["butEnviar"])){
        //hay que comprobar:
            /*que se hayan seleccionado al menos 3 tipos distintos de preguntas: (se 
            almacenan los tipos seleccionados en arrTiposSeleccionados y luego se 
            comprueba que su tamaño sea > 3) */

            /*que no hayan tipos repetidos: (se compara la primera con el resto, así 
            sucesivamente hasta que encuentre alguna repetida para parar el bucle)*/

        $hayRepetidos= false;
        for($cont= 1; $cont<= count($arrTiposPreg)-1; $cont++){
            $selectPreg1= "selectTipo_".$cont;
            $seleccion1= $_POST[$selectPreg1];

            $selectPreg2= "selectCantidad_".$cont;
            $seleccion2= $_POST[$selectPreg2];

            $arrTiposTodos[]= $seleccion1;

            if($seleccion1!= ""){
                $arrTiposSeleccionados[]= $seleccion1;
                $arrCantidadesSeleccionadas[]= $seleccion2;
            }
        }

        echo join(" - ", $arrTiposSeleccionados);
        echo "<br>";
        echo join(" - ", $arrCantidadesSeleccionadas);
        echo "<br>";

        for($cont1= 0; $cont1< count($arrTiposSeleccionados); $cont1++){
            for($cont2= $cont1+1; $cont2< count($arrTiposSeleccionados); $cont2++){
                if($arrTiposSeleccionados[$cont1] == $arrTiposSeleccionados[$cont2]){
                    $hayRepetidos= true;
                    break;
                }
            }   
        }

        //COMPROBACIONES
        if($hayRepetidos)
            echo "Hay algún tipo repetido, no debe haber ninguno<br>";
        else
            echo "todo ok<br>";
        
        if(count($arrTiposSeleccionados)<3)
            echo "No hay al menos tres tipos de preguntas distintos<br>";
        else
            echo "todo ok<br>";

        //IR A JUGAR.PHP
        if(!$hayRepetidos && count($arrTiposSeleccionados)>=3){
            $_SESSION["tiposElegidos"]= $arrTiposSeleccionados;
            $_SESSION["cantidadesElegidas"]= $arrCantidadesSeleccionadas;

            for($i= 0; $i< count($_SESSION["tiposElegidos"]); $i++){
                $_SESSION["arrPreguntas"]= $_SESSION["preguntasYrespuestas"][$_SESSION["tiposElegidos"][$i]];

                echo "cosas creadas";
            }
            
            header("Location: jugar.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main.php</title>
</head>
<style>
    table {
        text-align: center;
        border: 1px solid black;
    }
</style>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <th></th>
                <th>TIPO DE PREGUNTA</th>
                <th>CANTIDAD</th>
                <th>GRABAR FALLOS</th>
            </tr>
            <?php
                
                for($cont= 1; $cont<= count($arrTiposPreg)-1; $cont++){
                    //creacion fila por fila
                    echo "<tr>";
                        
                        //COLUMNA 1
                        echo "<td>$cont</td>";
                        
                        //COLUMNA 2
                        echo "<td>";
                        echo "<select name='selectTipo_$cont'>";
                        
                        foreach ($arrTiposPreg as $tipo) {
                                echo "<option value='$tipo'>$tipo</option>";
                        }
                        
                        echo "</select>";        
                        echo "</td>";
                        
                        //COLUMNA 3
                        echo "<td>";
                        echo "<select name='selectCantidad_$cont'>";
                        
                        for($cant= 1; $cant<= $cantidadPreg; $cant++) {
                            echo "<option value='$cant'>$cant</option>";
                        }
                        
                        echo "</select>";  
                        echo "</td>";
                        
                        //COLUMNA 4
                        echo "<td>";
                        echo "<label><input type='checkbox' name='check_$cont'>Grabar fallos</label>";
                        echo "</td>";
                        

                    
                    echo "</tr>";
                }  
            ?>
            
            <tr>
                <td colspan="2"></td>
                <td><button type="submit" name="butEnviar">ENVIAR DATOS</button></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
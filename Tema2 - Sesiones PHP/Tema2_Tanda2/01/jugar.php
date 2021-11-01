<?php       
    session_start();
    
    $arrInfo;
    for($i= 0; $i< count($_SESSION["tiposElegidos"]); $i++){  
        $tipo= $_SESSION["tiposElegidos"][$i];
        $cantidad= $_SESSION["cantidadesElegidas"][$i];

        
        //echo "numero random: ".$numRand."<br>"; 

        ${"contPred_".$i}= 1;
        //echo "contador:".${"contPred_".$i}."<br>";

        //COLUMNA 1
        $arrInfo[$i][0]= $tipo;

        //COLUMNA 2 
        $arrInfo[$i][1]= ${"contPred_".$i};

        $numRand= array_rand($_SESSION["arrPreguntas"]);
        //COLUMNA 3  Y  //COLUMNA 4                
        $arrInfo[$i][2]= $_SESSION["arrPreguntas"][$numRand];


        /*
        
        */

    //COLUMNA 5
        //echo "<button type='submit' name='butEnviar_$i'>ENVIAR DATOS</button>";


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jugar.php</title>
</head>
<style>
    table {
        text-align: center;
        border: 1px solid black;
    }
</style>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table>
            <tr>
                <th>TIPO</th>
                <th>Nº PREGUNTA</th>
                <th>PREGUNTA</th>
                <th>RESPUESTAS</th>
            </tr>
            <?php
                for($i= 0; $i< count($_SESSION["tiposElegidos"]); $i++){  
                    echo "<tr>";
                        //COLUMNA 1
                        echo "<td>".$arrInfo[$i][0]."</td>"; 

                        //COLUMNA 2
                        echo "<td>".$arrInfo[$i][1]."/".$cantidad."</td>";


                        if(isset($_POST["butEnviar_$i"])){
                            unset( $_SESSION["arrPreguntas"][$numRand] );
                            $numRand= array_rand($_SESSION["arrPreguntas"]);
                            $arrInfo[$i][1]++;
                        }

                        if($arrInfo[$i][1]<= $cantidad){
                            //COLUMNA 3
                            echo "<td>".$arrInfo[$i][2][0]."</td>";
                            
                            //COLUMNA 4
                            echo "<td>";
                            echo "<td><input type='radio' id='resp1' name='respuestas_$i' value='".$_SESSION["arrPreguntas"][$numRand][1]."'>";
                            echo "<label for='resp1'>".$_SESSION["arrPreguntas"][$numRand][1]."</label>";

                            echo "<input type='radio' id='resp2' name='respuestas_$i' value='".$_SESSION["arrPreguntas"][$numRand][2]."'>";
                            echo "<label for='resp2'>".$_SESSION["arrPreguntas"][$numRand][2]."</label>";

                            echo "<input type='radio' id='resp3' name='respuestas_$i' value='".$_SESSION["arrPreguntas"][$numRand][3]."'>";
                            echo "<label for='resp3'>".$_SESSION["arrPreguntas"][$numRand][3]."</label>";
                            echo "</td>";
                        }else{
                            echo "<td></td>";
                            echo "<td></td>";
                        }

                        //COLUMNA 5
                        echo "<td><button type='submit' name='butEnviar_$i'>ENVIAR DATOS</button></td>";

                    echo "</tr>";
                }
            ?>
            

        </table>
    </form>
</body>
</html>
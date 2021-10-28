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
    <?php        
        $arrTiposPreg= ["", "CINE", "LITERATURA", "GEOGRAFIA", "BIOLOGIA", "QUIMICA", "INFORMATICA"];
        $cantidadPreg= 10;
        
        
        
        
        if(isset($_POST["butEnviar"])){
            //hay que comprobar:
                //que se hayan seleccionado al menos 3 tipos distintos de preguntas
                //que no hayan tipos repetidos

            //COMPROBAR SI HAY REPETIDOS
            $hayRepetidos= false;
            $distintos= count($arrTiposPreg)-1;
            for($cont= 1; $cont<= count($arrTiposPreg)-1; $cont++){
                $selectPreg1= "selecTipo_".$cont;
                $seleccion1= $_POST[$selectPreg1];
                //echo $seleccion1." 1<br>";

                if($seleccion1!= ""){
                    for($cont2= 1; $cont2<= count($arrTiposPreg)-1; $cont2++){
                        if($cont!= $cont2){
                            $selectPreg2= "selecTipo_".$cont2;
                            $seleccion2= $_POST[$selectPreg2];
                            //echo $seleccion2." 2<br>";

                            if($seleccion2!="" && ($seleccion1== $seleccion2) ){
                                $hayRepetidos= true;
                                break;
                            }
                        }
                    }
                }else{
                    $distintos--;
                }
            }
            
            //COMPROBAR SI HAY 3 DISTINTOS
            
            
            if($hayRepetidos)
                echo "cagaste<br>";
            else
                echo "todo ok<br>";
            
            if($distintos<3)
                echo "no hay al menos tres distnitos<br>";
            else
                echo "todo chachi<br>";
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
                        echo "<select name='selecTipo_$cont'>";
                        
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
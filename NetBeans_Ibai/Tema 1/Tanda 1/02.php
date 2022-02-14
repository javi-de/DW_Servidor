<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //1
            $temperaturaDiasMes=array("1"=>"20","2"=>"22","3"=>"23","4"=>"32","5"=>"16","6"=>"20");
            print_r($temperaturaDiasMes);
            echo"<br>";
            //2
            $suma= array_sum($temperaturaDiasMes);
            $tamanioArray= sizeof($temperaturaDiasMes);
            $media=$suma/$tamanioArray;
            $mediaRedondeada=round($suma/$tamanioArray);
            $mediaTruncada= bcdiv($media, 1, 3);
            echo "$mediaTruncada == $mediaRedondeada<br>";
            //3
            /*$copiaTemperaturas1=$temperaturaDiasMes;
            $copiaTemperaturas2=$temperaturaDiasMes;
            for ($i=0;$i<5;$i++){
                $numerosMasAltos[$i]=max($copiaTemperaturas1);
                $clave=array_search($numerosMasAltos[$i], $copiaTemperaturas1);
                unset($copiaTemperaturas1[$clave]);
                
                $numerosMasBajos[$i]=min($copiaTemperaturas2);
                $clave2=array_search($numerosMasBajos[$i], $copiaTemperaturas2);
                unset($copiaTemperaturas2[$clave2]);
            }
            print_r($numerosMasAltos);
            echo "<br>";
            print_r($numerosMasBajos);
            echo "<br>";
            */
            $minAMax=$temperaturaDiasMes;
            $maxAMin=$temperaturaDiasMes;
            sort($minAMax);
            rsort($maxAMin);
            $minimos= array_slice($minAMax, 0,5);
            $maximos= array_slice($maxAMin, 0,5);
            print_r($minimos);
            echo "<br>";
            print_r($maximos);
            echo "<br>";
            
                
            
        ?>
    </body>
</html>

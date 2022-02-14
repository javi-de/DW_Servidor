<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //1,2
            $dia=date("j");
            $mes=date("F");
            $diaSemana=date("l");
            $anyo=date("Y");
            $diaAnyo=date("z")+1;
            $diasRestantes=365-$diaAnyo;
            echo("$dia  $mes  $anyo,  $diaSemana <br>");
            echo("$diasRestantes <br>");
            //3
            $p1=["hola ","que ","tal"];
            $cadena=$p1[0] . $p1[1] . $p1[2];
            echo("$cadena <br>");
            //4
            $cadena2="ññññññ";
            $cadenaCambiada=str_replace("ñ", "gn", $cadena2);
            echo("$cadenaCambiada <br>");
            //5
            function aleatorioEntre($n1,$n2,$cant){
                for($x=0;$x<$cant;$x++){
                    $numeroAleatorio[$x]=random_int($n1, $n2);
                }
                return $numeroAleatorio;
            }
            $num=aleatorioEntre(1,10,5);
            print_r ($num);
            echo("<br>");
            //6
            $cadenaCifrada = array("A"=>"20","H"=>"9R","M"=>"abcd");
            $palabra="HOLA AMO";
            $palabraCambiada=$palabra;
            foreach ($cadenaCifrada as $key => $value) {
                $palabraCambiada= str_replace($key, $value, $palabraCambiada);
            }
            echo ("$palabra == $palabraCambiada <br>");
        ?>
    </body>
</html>

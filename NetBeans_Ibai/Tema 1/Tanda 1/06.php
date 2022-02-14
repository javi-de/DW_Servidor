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
        <table border="1">
            <?php
                $diasSemana=array("Lun","Mar","Mie","Jue","Vie","Sab","Dom");
                $horaIn=mktime(8, 0, 0, 0, 0, 0);
                $horaFin=mktime(15, 0, 0, 0, 0, 0);
                $hora=$horaIn;
                $intervalo="60";
                echo "<tr><th></th>";
                foreach ($diasSemana as $key => $value) {
                    echo "<th>$value</th>";
                }
                $par=0;
                while($hora<=$horaFin){
                    $horaEnMins=date('H:i', $hora);
                    if($par==0){
                        $par++;
                        echo "<tr><td>$horaEnMins</td>";
                        for ($index = 0; $index < 7; $index++) {
                            echo"<td></td>";
                        }
                        echo "</tr>";
                    } else {
                        $par=0;
                        echo "<tr style='background-color:gray'><td>$horaEnMins</td>";
                        for ($index = 0; $index < 7; $index++) {
                            echo"<td></td>";
                        }
                        echo "</tr>";
                    }
                    $hora+=$intervalo*60;
                }
            ?>  
        </table>
        
    </body>
</html>

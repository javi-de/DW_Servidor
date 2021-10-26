<?php
    $arrWeek= array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

    echo "<style>
            table, th, td{
                border: 1px solid black;
            }
            tr:nth-child(2n+1)>td{
                background-color: lightgray;
            }
        </style>";
    
    function createTable($arrWeek, $strHourIni, $strHourEnd, $intInterval){
        echo "<table>";
        
        echo "<tr><th></th>";
        foreach($arrWeek as $dayWeek){
            echo "<th>".$dayWeek."</th>";
        }
        echo "</tr>";
        
        $arrHour= explode(":", $strHourIni);
        $arrHourEnd= explode(":", $strHourEnd);
        
        while($arrHour[0]< $arrHourEnd[0] || ($arrHour[0]== $arrHourEnd[0] && $arrHour[1] == $arrHourEnd[1])){
            echo "<tr>";
            echo "<td>" . $arrHour[0].":".$arrHour[1] . "</td>";
            
            foreach($arrWeek as $dayWeek){
                echo "<td></td>";
            }
            echo "</tr>";
            $arrHour[1] += $intInterval;
        
            while($arrHour[1]>= 60){
                $arrHour[0]++;
                $arrHour[1]-= 60; 
            }      
        }
        
        echo "</table>";
    }

    createTable($arrWeek, "8:00", "15:00", 60);

?>
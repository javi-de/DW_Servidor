<?php
    $arrTemps= array(1, 20, 14, 2, -5, 45, 34, 40);
    
    echo join(', ', $arrTemps)."<br>";
    
    $media= array_sum($arrTemps)/ count($arrTemps);
    echo "Media redondeada: ".round($media)."<br>";
    echo "Media truncada: ".floor($media)."<br>";
    
    
    sort($arrTemps); //orden ascendente
    for($cont= 1; $cont<= 5; $cont++){
        echo $arrTemps[$cont-1].", ";
    }
    echo "<br>";
    
    rsort($arrTemps); //orden descendente
    for($cont= 1; $cont<= 5; $cont++){
        echo $arrTemps[$cont-1].", ";
    }
    echo "<br>";
?>
<?php
    $arrTemperaturas= [35.5, 48.2, 1, 10, 11.1, 23.8, 12.8];
    $mediaTemps= array_sum($arrTemperaturas)/count($arrTemperaturas);


    sort($arrTemperaturas);
    $tempMinimas= array_slice($arrTemperaturas, 0, 5);

    rsort($arrTemperaturas);
    $tempMaximas= array_slice($arrTemperaturas, 0, 5);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <p>
            <?php
                echo "Todas las temperaturas: ". join(", ", $arrTemperaturas);
                echo "<br>";
                echo "<br>";
                
                echo "Media temperaturas (rounded): " . round($mediaTemps);
                echo "<br>";
                echo "Media temperaturas (truncated): " . floor($mediaTemps);
                echo "<br>";
                echo "<br>";
                
                echo "Mínimas: ". join(", ", $tempMinimas);
                echo "<br>";
                echo "Máximas: ". join(", ", $tempMaximas);
            ?>
        </p>
    </body>
</html>
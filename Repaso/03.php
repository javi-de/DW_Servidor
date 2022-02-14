<?php
    $arrCiudades= ["Albacete", "Vitoria", "Vitoria", "Cuenca", "Asturias", "Vitoria", "Albacete", "Cordoba"];

    $arrCiudadesSinRepetir=array_unique($arrCiudades);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <ol>
            <?php
            foreach ($arrCiudadesSinRepetir as $ciudad) {
                echo "<li>". $ciudad . "</li>";
            }
            ?>
        </ol>
    </body>
</html>
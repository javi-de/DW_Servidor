<?php
    $gestor= fopen("charla.txt", "r");
    while($linea= fgets($gestor)){
        $separado=explode(";", $linea);
        echo "<strong>".$separado[0]."</strong>: ".$separado[1]."<br>";
    }
    fclose($gestor);
?>


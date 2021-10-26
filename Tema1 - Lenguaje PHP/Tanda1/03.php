<?php
    $ciudades= array("Sevilla", "Albacete", "Córdoba", "Vitoria", "Sevilla", "Albacete", "Córdoba", "Vitoria", "Bilbao", "Vigo");
    
    echo join(', ', $ciudades)."<br>";
    
    echo "<ol>";
        foreach (array_unique($ciudades) as $value) {
            echo "<li>".$value . "</li>";
        }
    echo "</ol>";

?>

<!-- Otra forma de crear la lista
<ol>
    <?php
    foreach (array_unique($ciudades) as $value)
            echo "<li>".$value . "</li>";
    ?>
</ol>
-->
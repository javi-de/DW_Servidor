<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $fechaActual = new DateTime();
    $ultimoDiaMes = $fechaActual->format('t');

    $datos = [];
    for ($dia= 1; $dia <= $ultimoDiaMes; $dia++) {
        $datos[$dia] = site_url("/Chome/calendario/". $fechaActual->format("Y") . "-" . $fechaActual->format("m") . "-" .$dia);
    }

    echo $this->calendario->generate($fechaActual->format("Y"), $fechaActual->format("m"), $datos);

    if (isset($fecha) and is_array($librosEnFecha) and count($librosEnFecha) > 0) {
        $fechaLibrosPrestados = new DateTime($fecha);
        echo "<h3>Libros prestados el " . $fechaLibrosPrestados->format("Y-m-d") . "</h3>";

        foreach ($librosEnFecha as $libro) {
            echo "<li>$libro</li>";
        }
    }

?>
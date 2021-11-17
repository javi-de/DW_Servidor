<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    echo form_open("/Chome/prestamos");
        echo "<table>";
        foreach ($datosLibroPrestado as $dato) {
            echo "<tr>";
                echo "<td>Préstamo Nº ".$dato["idprestamo"]."</td>";
                echo "<td>".$dato["fecha"]."</td>";
                echo "<td><a href='".site_url("/Chome/borrar/".$dato["idprestamo"])."'>Devolver</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    echo form_close();
?>
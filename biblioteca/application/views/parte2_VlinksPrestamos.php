<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($datosLibroPrestado) and is_array($datosLibroPrestado) and count($datosLibroPrestado) > 0){

        echo "<table>";
        foreach ($datosLibroPrestado as $dato) {
            echo "<tr>";
                echo "<td>Préstamo Nº ".$dato["idprestamo"]."</td>";
                echo "<td>".$dato["fecha"]."</td>";
                echo "<td><a href='".site_url("/Chome/borrar/".$dato["idprestamo"])."'>Devolver</a></td>";
            echo "</tr>";
        }
        echo "</table>";      

        
        if($eliminar){
            echo "<br><br><br>Préstamos seleccionados para ser borrados: <br>";
            print_r($this->session->borrar);
            echo "<br>";
            echo "<a href='".site_url("/Chome/eliminar/")."'> Borrar definitivamente </a>";
        }
    }


?>
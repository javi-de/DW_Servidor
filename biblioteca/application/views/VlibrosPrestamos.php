<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    if(count($librosPrestados)> 0){
        echo "<h1>Libros prestados</h1>";
        echo "<ul>";
        foreach ($librosPrestados as $libro) {
            echo "<li>".$libro."</li>";
        }
        echo "</ul>";
    }
   
    if(count($librosNoPrestados)> 0){
        echo "<h1>Libros no prestados</h1>";
        echo "<ul>";
        foreach ($librosNoPrestados as $libro) {
            echo "<li>".$libro."</li>";
        }
        echo "</ul>";
    }
?>
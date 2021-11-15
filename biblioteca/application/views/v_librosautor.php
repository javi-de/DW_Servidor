<!-- Le llega:       arraylibros: array de arrays (cada subarray(libro) tiene idlibro, titulo, paginas, genero  --> 
<?php  
    echo "<ul>";
    foreach ($arraylibros as $libro)    {
        echo "<li><b>".$libro['titulo']."</b>, " . $libro['paginas']." páginas. ". $libro['genero']."</li>";
    }
    echo "</ul>";
?>
<?php
//Recibe $arrayautores: array con objetos (idautor,nombre)        
foreach ($arrayautores as $autor){
    $idautor=$autor->idautor;
    $nombreautor=$autor->nombre;
    echo "<p><a href='".  site_url()."/clibros/librosautor/$idautor'>".$nombreautor."</a></p>";
}
?>
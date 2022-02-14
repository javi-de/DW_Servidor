<?php
    $arrPelis= ["Pepe" =>    ["Cadena perpetua", "Prision Break", "La Milla Verde", "Fuga de Alcatraz"],
                "Juan" =>    ["Dos tontos muy tontos", "Ace Ventura", "Hot shot", "Zombies party"],
                "Pepa" =>    ["Hereditary", "Midsommar", "The ring", "El exorcista"],
                "Juana" =>   ["Prision Break", "The ring", "Cadena perpetua", "La Milla Verde"],
                "Antonio" => ["Shutter island", "Cadena perpetua", "La maldicion"],
               ];
    
    
    function damePeli($strPeli, $arrPelis){
        $intCont= 0;
        
        foreach ($arrPelis as $arrPersona) {
            foreach ($arrPersona as $strPelicula) {
                if($strPeli== $strPelicula){
                    $intCont++;
                    break;
                }
            }
        }
        
        return $intCont;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <p>
            <?php 
                $strPeli= "The ring";
                $numFavs= damePeli($strPeli, $arrPelis);
            ?>
            La película <?php echo $strPeli ?> es la favorita de <?php echo $numFavs ?> personas
        </p>
    </body>
</html>
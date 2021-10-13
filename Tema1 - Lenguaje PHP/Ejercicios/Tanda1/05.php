<?php
    $arrFilms= array("Pepe" => array("Cadena perpetua", "Prision Break", "La Milla Verde", "Fuga de Alcatraz"),
                        "Juan" => array("Dos tontos muy tontos", "Ace Ventura", "Hot shot", "Zombies party"),
                        "Pepa" => array("Hereditary", "Midsommar", "The ring", "El exorcista"),
                        "Juana" => array("Prision Break", "The ring", "Cadena perpetua", "La Milla Verde"),
                        "Antonio" => array("Shutter island", "Cadena perpetua", "La maldicion"),
                       );
    /*
    function showPeople($arrFilms){       
        //para mostrar las peliculas de cada persona
        foreach ($arrFilms as $person => $arrPerFilm) {
            echo $person. ": <br>";
            foreach ($arrPerFilm as $film){
                echo $film.", ";
            } 
            echo "<br>";
        }
    }
    */
    
    function whoLike($strFilm, $arrFilms){
        $count= 0;
        
        foreach ($arrFilms as $person => $arrPerFilm) {
            foreach ($arrPerFilm as $film){
                if($strFilm==$film){
                    $count++;
                    break;
                }   
            } 
        }
        
        return $count;
    }
    
    /************************************************************/
    //showPeople($arrFilms);
    $strFilm= "Cadena perpetua";
    $people= whoLike($strFilm, $arrFilms);
    
    echo "A " . $people . " personas les gusta " . $strFilm;
    
?>
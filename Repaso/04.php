<?php
    $arrRutasImgs= array("images/img1.jpeg", 
                    "images/img2.jfif", 
                    "images/img3.jfif", 
                    "images/img4.jfif", 
                    "images/img5.jfif", 
                    "images/img55.jfif", 
                    "images/img555.jfif", 
                    "images/img6.jfif",
                    "images/img7.jfif", 
                    "images/img8.jfif"
                   );

    function mostrarImagenes($arrRutasImgs){
        $arrAux= array();
        $countRows= 1;

        echo "<table><tr>";

        foreach($arrRutasImgs as $urlImg) {
            //se guarda un resumen binario del contenido de la imagen
            $binaryImg= md5_file($urlImg, true);

            //se comprueba que ese resumen binario no exista ya en el arrAux
            //Lo que se hace es comprobar que el contenido no esté repetido (no sea igual a otra imagen)
            if(!in_array($binaryImg, $arrAux)){
                $arrAux[$urlImg]= $binaryImg;
                
                echo "<td><a target='_blanc' href=".$urlImg."><img src=".$urlImg." width='150' height='150'></a></td>";
            
                if($countRows%3==0){
                    echo "</tr>";
                }
                
                $countRows++;
            }

        }

        echo "</tr></table>";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <?php
            mostrarImagenes($arrRutasImgs);
        ?>
    </body>
</html>
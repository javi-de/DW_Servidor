<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $arraDeArrays=array("Juan"=>array("Dune","Maligno","Fast & Furius"),"Aitor"=>array("After","Casper","Thor"),"Javier"=>array("Maligno","Cars","Ironman"));
            $nombre=$_GET["nombre"];
            foreach ($arraDeArrays as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if($nombre==$value2){
                        $numeroRandom= random_int(0, count($value)-1);
                        do{
                            $random2=random_int(0, count($value)-1);
                        }while($numeroRandom==$random2);
                        echo($key.": ".$value[$numeroRandom].", ".$value[$random2]."<br>");
                    }
                }
            }
            
        ?>
    </body>
</html>

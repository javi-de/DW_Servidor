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
            $ciudades=array("madrid","sevilla","vitoria","cadiz","badajoz","madrid","alicante","bilbao","bilbao","badajoz");
            $ciudadesSinRepetir=array_unique($ciudades);
            print_r($ciudadesSinRepetir);
        ?>
    </body>
</html>

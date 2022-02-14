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
            $handle = fopen("fichero", "r");
            while (!feof($handle)) {
                $linea = fgets($handle);
                $urlNombre= explode(" ", $linea);
                echo "<a href=$urlNombre[0]>$urlNombre[1]</a><br>";
            }
            fclose($handle);

        ?>
    </body>
</html>

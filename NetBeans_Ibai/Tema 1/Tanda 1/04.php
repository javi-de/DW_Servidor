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
        <table>
            <?php
                $rutasImagenes=array("img/img1.png","img/img2.png","img/img3.png","img/img4.png","img/img5.png","img/img6.png","img/img7.png","img/img8.png");
                $i=1;
                foreach ($rutasImagenes as $key => $value) {
                    foreach ($rutasImagenes as $key2 => $value2) {
                        if (md5_file($value) == md5_file($value2) && $key!=$key2) {
                            unset($rutasImagenes[$key]);
                        }
                    }
                }
                $cont = 0;
                foreach ($rutasImagenes as $key => $value) {
                    if($cont==0){
                        echo"<tr>";
                    }
                    if($cont<3){
                        echo "<td><a href=$rutasImagenes[$key]><img src=$rutasImagenes[$key] width='100' height='100'/></a></td>";
                    }else{
                        $cont=0;
                        echo"</tr>";
                        echo "<td><a href=$rutasImagenes[$key]><img src=$rutasImagenes[$key] width='100' height='100'/></a></td>";
                    }
                    $cont++;
                }
                echo"</tr>";
            ?>
        </table>
    </body>
</html>

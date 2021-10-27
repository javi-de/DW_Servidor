<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>
<body>
    <ol>
    <?php
            $handle = fopen("fich/webs.txt", "r");
            while (!feof($handle)) {
                $linea = fgets($handle);
                if($linea!=""){
                    $info= explode(" ", $linea);
                    echo "<li><a href=".$info[0]." target='_blank'>".$info[1]."</a></li>";
                }
            }
            fclose($handle);         
        ?>
    </ol>
</body>
</html>
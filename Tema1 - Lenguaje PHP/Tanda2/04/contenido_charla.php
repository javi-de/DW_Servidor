<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contenido_charla</title>
    <meta http-equiv="refresh" content="2"> <!--Refresco cada 2 segundos -->
</head>
<body>
    <?php
        $f= fopen("./charla.txt", "r");
        while(!feof($f)){
            $linea= rtrim(ltrim(fgets($f)));
            
            echo "<p>".$linea."</p>";
        }
    ?>
</body>

</html>
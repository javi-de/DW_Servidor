<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finpedido.php</title>
</head>
<body>
    <table>
        <?php
            $pedido= $_POST["olPedido"];
            
            foreach ($array as $key => $value) {
                echo $key."->".$value;
            }
        ?>        
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pedidoplato.php</title>
</head>
<body>
    <?php
        session_start();
        
        $tipoPlato= $_GET["tipo"];
        
    require_once 'libmenu.php';
        $arrPlatos= damePlatos($tipoPlato);
    ?>
    
    <form name="input" action="pedido.php" method="get">
        <?php
            $platoElegido= $_SESSION["menu"][$tipoPlato];
            if($platoElegido== "unknown")
                echo "<p>Elige un $tipoPlato</p>";
            else
                echo "<p>Vas a cambiar el plato $platoElegido por:</p>";
        ?>
        <select name="<?php echo $tipoPlato ?>">
            <?php
                foreach($arrPlatos as $nomPlato => $precioPlato){
                    echo "<option value='$nomPlato'>$nomPlato - $precioPlato €</option>";
                }
            ?>
        </select>
        <button type="submit" name="butElegir">ELEGIR <?php echo $tipoPlato ?></button>
        
        <?php
            
        
            
        ?>
    </form>
</body>
</html>
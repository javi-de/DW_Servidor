<?php
    require_once "bbdd.php";
    
    session_start();
    $con = conectarBD();
    
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/css.css" type="text/css" />
        <title></title>
    </head>
    <body>
        <div id="header">
            <h1><?php echo NOMBRE_FORO ?></h1>
        </div>
        <div id="menu">
            <a href="index.php">Home</a>
            <?php
            if(isset($_SESSION["usuarioId"])) {
                echo "<a href='logout.php'>Logout</a>";
                echo "<a href='nuevoitem.php'>Nuevo Item</a>";
            }else{
                echo "<a href='login.php'>Login</a>";
            }
            ?>
        </div>
        
        <div id="bar">
            <br><br><br><br>
            <?php
                if(isset($_SESSION['usuarioId'])){
                    echo "<p>Bienvenido ".$_SESSION['usuario']."(".$_SESSION['usuarioId'].")</p>";
                }else{
                    echo "<p>No has logeado</p>";
                }
                
                require("barra.php"); 
            ?>
        </div>
        
        <div id="main">
            
        <!--</div> este cierre debe ir incluido en cada página que se cree  -->

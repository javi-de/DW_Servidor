<?php 
    include_once "BBDD.php";
    include_once "config.php";

    $con=conexion();
    session_start();
?>
<html>
    <head>
        <title><?php echo NOMBRE_FORO;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body>
        <div id="header">
            <h1>SUBASTAS CIUDAD JARDIN</h1>
        </div>
        <div id="menu">
            <a href="index.php">Home</a>
            <?php
            if (isset($_SESSION['id'])) {
                echo "<a href='logout.php'>Logout</a> ";
                echo "<a href='nuevoitem.php'>Nuevo Item</a>";
                
            } else {
                echo "<a href='login.php'>Login</a>";
            }
            ?>
            
        </div>
        <div id="container">
            <div id="bar">
                <?php require("barra.php"); ?>
            </div>
            <div id="main">

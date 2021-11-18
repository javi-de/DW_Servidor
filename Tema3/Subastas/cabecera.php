<?php
    require_once "config.php";

    session_start();

    //conectarse a la BD
    $conn= conectarBD();
    function conectarBD(){
        $conn= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
        
        if($conn->connect_errno > 0){   
            die("Imposible conectarse con la base de datos [" . $conn->connect_error . "]");   
        }  
      
        mysqli_set_charset($conn, "UTF8");
        return $conn;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style/css.css" type="text/css" />
        <title><?php echo $config_forumsname; ?></title>
    </head>
    <body>
        <div id="header">
            <h1>SUBASTAS CIUDAD JARDIN</h1>
        </div>
        <div id="menu">
            <a href="index.php">Home</a>
            <?php
                //si se ha iniciado sesión, mostrar link logout; si no, mostrar link login
                if(isset($_SESSION['USERNAME']) == TRUE) {
                    echo "<a href='logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php'>Login</a>";
                }
            ?>
            <a href="newitem.php">New Item</a>
        </div>
        <div id="container">
            <div id="bar">
               <?php require("barra.php"); ?>
            </div>
            <div id="main">

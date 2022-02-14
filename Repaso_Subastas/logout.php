<?php 
    require_once "config.php";
    
    session_start();
    
    //$_SESSION['usuario']=null;
    //$_SESSION['usuarioId']=null;
    session_unset();
    
    header("Location: index.php");
    //header("location:".BASE_ROUTE);
?>
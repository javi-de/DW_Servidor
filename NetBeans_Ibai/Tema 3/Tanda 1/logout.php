<?php
    session_start();
    $_SESSION['id']=null;
    $_SESSION['usuario']=null;
    header("Location: index.php");
?>
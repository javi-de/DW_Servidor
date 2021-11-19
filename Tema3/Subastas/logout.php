<?php require_once "config.php";
    session_start();
    session_unset();
    header("location:".BASE_ROUTE);
?>
<?php
    include_once 'libmenu.php';
    if(isset($_POST['invitado'])){
        session_start();
        $_SESSION['nombre']="invitado";
        header('Location: pedido.php');
    } else if (isset($_POST['socio'])){
        if(autentica($_POST['usuario'], $_POST['password'])==1){
            session_start();
            setcookie("usuario",$_POST['usuario'],time()+3600);
            $_SESSION['nombre']=$_POST['usuario'];
            header('Location: pedido.php');
        } else {
            header('Location: entrada.php?error');
        }
    }


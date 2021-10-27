<?php
require_once 'libmenu.php';
    if( isset($_POST["butInvitado"]) )
        header ("Location: pedido.php");
    else{
        echo "else";
        if( isset($_POST["butSocio"]) ){
            $usu= trim($_POST["txtUsuario"]);
            $pass= trim($_POST["txtPass"]);
            echo $usu;
            echo $pass;
            if( autentica($usu, $pass)== 1)
                header ("Location: pedido.php?usu=".$strUsu."&pass=".$strPass);
            else
                header ("Location: entrada.php?conecFallida");
        }
    }

?>
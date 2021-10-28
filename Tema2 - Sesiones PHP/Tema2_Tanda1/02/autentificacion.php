<?php
require_once 'libmenu.php';
    if( isset($_POST["butInvitado"]) )
        header ("Location: pedido.php?usu=invitado");
    else{
        if( isset($_POST["butSocio"]) ){
            $strUsu= trim($_POST["txtUsuario"]);
            $strPass= trim($_POST["txtPass"]);
            //echo $usu;
            //echo $pass;
            if( autentica($strUsu, $strPass)== 1)
                header ("Location: pedido.php?usu=$strUsu&pass=$strPass");
            else
                header ("Location: entrada.php?conecFallida");
        }
    }

?>
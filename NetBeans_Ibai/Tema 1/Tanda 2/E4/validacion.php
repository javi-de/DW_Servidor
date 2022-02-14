<?php
    $nombre=$_POST['nombre'];
    $pass=$_POST['pass'];
    $gestor=fopen("usuarios.txt", "r");
    while ($linea = fgets($gestor)) {
        $usuario = explode(";", $linea);
        $usuario[0]=trim($usuario[0]);
        $usuario[1]=trim($usuario[1]);
        if ($usuario[0]==$nombre && $usuario[1]==$pass){
            header("Location: charla.php?nombre=".$nombre);
            exit();
        } elseif ($usuario[0]==$nombre && trim($usuario[1])!=$pass) {
            header("Location: login.php?nombre=".$nombre);
            exit();
        }
    }
    header("Location: alta.php?nombre=".$nombre);
    exit();
    fclose($gestor);
?>


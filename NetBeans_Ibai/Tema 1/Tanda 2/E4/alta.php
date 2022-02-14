<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $creado=false;
            if(isset($_GET['login'])){
                $login=$_GET['login'];
                $gestor=fopen("usuarios.txt", "a+");
                $existe=false;
                while ($linea = fgets($gestor)) {
                    $usuario = explode(";", $linea);
                    if ($usuario[0]==$login) {
                        echo "Lo sentimos, ya existe un usuario ".$login;
                        $existe=true;
                        $creado=false;
                    }
                }
                if (!$existe) {
                    $nuevo=$_GET['login'].";".$_GET['pass'];
                    fwrite($gestor, $nuevo.PHP_EOL);
                    $creado=true;
                }
                
                fclose($gestor);
            }
            if(!$creado){
        ?>
        <form name="form" action="alta.php" method="GET">
            <table>
                <tr>
                    <td><label for="login">Login:</label></td>
                    <td><input type="text" name="login" id="login"></td>
                </tr>
                <tr>
                    <td><label for="pass">Password:</label></td>
                    <td><input type="text" name="pass" id="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Registrar" value="REGISTRAR"></td>
                </tr>
        </form>
        <?php
            }else{
                $login=$_GET['login'];
                echo "<strong>".$login."</strong>: Has sido dado de alta";
                echo "<h2><a href='charla.php?nombre=".$login."'>ENTRAR AL CHAT</a></h2>";
            }
        ?>
    </body>
</html>
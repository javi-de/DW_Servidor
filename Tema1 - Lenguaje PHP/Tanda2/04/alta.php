<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTA</title>
</head>
<body>
    <?php
        function guardarNombreUser($user, $pass){
            $f= fopen("./usuarios.txt", "a+");
            //echo $user."<br>";

            if(!$f)
                echo "No se puede abrir el fichero.<br>";
            else{
                while(!feof($f)){
                    $linea= fgets($f);
                    //echo $linea."<br>";
                    $infoLinea= explode("_", $linea);
                    
                    $userLinea= rtrim(ltrim($infoLinea[0]));

                    //echo "usu: ".$userLinea."<br>";

                    if($user== $userLinea)
                        return false; 
                }

                $userYPass= "\n".$user."_".$pass;
                fwrite($f, $userYPass);
            }
            fclose($f);
            return true;
        }

        $infoUser= "";
        $pass;

        if( isset($_GET["userValidador"]) )
            $infoUser = $_GET["userValidador"];


        //echo $infoUser."<br>";
        
        if(isset($_GET["butRegistro"])){ //no hace falta comprobar si txtUser o txtPass están vacios ya que las etiquetas tienen un 'required'
            $infoUser= $_GET["txtUser"];
            $pass= $_GET["txtPass"];
            $booleanValidar= guardarNombreUser($infoUser, $pass);
        }
    ?>

    <h1>REGRISTRATE</h1>
    <form enctype="multipart/form-data" name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <table>
        
            <tr>
                <td><label for="txtUser">Login: </label>
                <td><input type="text" name="txtUser" id="txtUser" value="<?php echo $infoUser; ?>" required></td>
            </tr>
            <tr>
                <td><label for="txtPass">Password: </label></td>
                <td><input type="password" name="txtPass" id="txtPass" required></td>
                
                <td>
                    <button type="submit" name="butRegistro">REGISTRARSE</button>
                </td>
            </tr>
            
            <?php
                if(isset($booleanValidar)){
                    if($booleanValidar){
                        echo "<tr><td colspan='3' style='color:green'><strong>$infoUser</strong> registrado con éxito</td></td>
                              <tr><td colspan='4'> <a href='login.php'>ENTRAR AL CHAT</a></td></tr>";
                    }else
                        echo "<tr><td colspan='3' style='color:red'><strong>$infoUser</strong> ya existe. Prueba con otro</td></tr>";
                }
            ?>

        </table>
    </form>
</body>
</html>
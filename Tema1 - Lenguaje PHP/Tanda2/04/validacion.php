<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDANDO</title>
</head>
<body>
    <?php
        $user= $_REQUEST["txtUser"];
        $pass= $_REQUEST["txtPass"]; 

        echo $user." ------ ".$pass."<br>";

        function validarUsuario($user, $pass){
            $f= fopen("./usuarios.txt", "r");

            if(!$f)
                echo "No se puede abrir el fichero.";
            else{
                while(!feof($f)){
                    $linea= fgets($f);
                    //echo $linea."<br>";
                    $infoLinea= explode("_", $linea);
                    
                    $userLinea= rtrim(ltrim($infoLinea[0]));
                    $passLinea= rtrim(ltrim($infoLinea[1]));

                    //echo "usu: ".$userLinea.", pass: ".$passLinea."<br>";

                    if($user== $userLinea){
                        if($pass== $passLinea){
                            header("Location: charla.php?userValidador=$user");
                            //return "Bienvenid@<br>";
                        }else{
                            header("Location: login.php?falloValidador=true&userValidador=$user");
                        }
                    }
                        
                }
            }
            fclose($f);
            return "El nombre <strong>".$user."</strong> no existe<br>";
            //header("Location: alta.php?userValidador=$user");
        }
        
        echo validarUsuario($user, $pass);

    ?>

</body>
</html>
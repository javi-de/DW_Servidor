<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pedido.php</title>
</head>
<body>
    <?php
        //ini_set("session.use_cookie", "0");
        session_start();
        //unset($_SESSION["login"]);
        
        if(isset($_GET["usu"])){
            $strUsu= $_GET["usu"];
            echo "Usuario: ".$_GET["usu"];
            //$strPass= $_GET["pass"];
            //echo $strPass;
            $_SESSION["login"]= $strUsu;
        }      
    ?>
    
    <p><a href="pedidoplato.php?tipo=Primero">PRIMER PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Segundo">SEGUNDO PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Postre">POSTRE</a></p>
    <p><a href="pedidoplato.php?tipo=Bebida">BEBIDA</a></p>
        
    <form name="input" action="finpedido.php" method="get">
        
        <h2>SU PEDIDO: </h2>
        
        <?php
            $pedidoListo= false;
            
            if(!isset($_SESSION["menu"])){
                $_SESSION["menu"]= ["Primero" => "unknown",
                                    "Segundo" => "unknown",
                                    "Postre" => "unknown",
                                    "Bebida" => "unknown"
                                   ];
            }else{
                if( isset($_GET["Primero"]) )
                    $_SESSION["menu"]["Primero"]= $_GET["Primero"];   

                if( isset($_GET["Segundo"]) )
                    $_SESSION["menu"]["Segundo"]= $_GET["Segundo"];   

                if( isset($_GET["Postre"]) )
                    $_SESSION["menu"]["Postre"]= $_GET["Postre"];   

                if( isset($_GET["Bebida"]) )
                    $_SESSION["menu"]["Bebida"]= $_GET["Bebida"];   

                echo "<ul>";
                    foreach($_SESSION["menu"] as $tipo => $nomPlato) {
                        if($nomPlato!= "unknown"){
                          echo "<li>$tipo: $nomPlato</li>"; 
                          $pedidoListo= true;
                        }
                    }
                echo "</ul>";
            }
            
            if($pedidoListo)
                echo '<button type="submit" name="butPedido"><img width= 100 heigth=100 src="img/boton.jpeg"/></button>';          
        ?>
    </form>
    <p>Desconectar y <a href="entrada.php">volver al LOGIN</a></p>
</body>
</html>
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
        session_start();  
    ?>
    
    <p><a href="pedidoplato.php?tipo=Primero">PRIMER PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Segundo">SEGUNDO PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Postre">POSTRE</a></p>
    <p><a href="pedidoplato.php?tipo=Bebida">BEBIDA</a></p>
        
    <form name="input" action="finpedido.php" method="post">
        <h2>SU MENÚ: </h2>
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

                echo "<ul name='olPedido'>";
                    foreach($_SESSION["menu"] as $tipo => $nomPlato) {
                        if($nomPlato!= "unknown"){
                          echo "<li value='$nomPlato'>$tipo: $nomPlato</li>"; 
                          $pedidoListo= true;
                        }
                    }
                echo "</ul>";
            }
            
            if($pedidoListo)
                echo '<button type="button" name="butPedido"><img width= 100 heigth=100 src="img/boton.jpeg"/></button>';        ?>
    </form>
</body>
</html>
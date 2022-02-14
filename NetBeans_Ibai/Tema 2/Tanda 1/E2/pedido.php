<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            if (!isset($_SESSION['nombre'])) {
                header('Location: entrada.php');
            }
            if(isset($_POST['plato'])){
                if(isset($_GET['Primero'])){
                    $_SESSION['Primero']=$_POST['plato'];
                }
                if(isset($_GET['Segundo'])){
                    $_SESSION['Segundo']=$_POST['plato'];
                }
                if(isset($_GET['Postre'])){
                    $_SESSION['Postre']=$_POST['plato'];
                }
                if(isset($_GET['Bebida'])){
                    $_SESSION['Bebida']=$_POST['plato'];
                }
            }
            
            $eleccion="";
            if(isset($_SESSION['Primero']) || isset($_SESSION['Segundo']) || isset($_SESSION['Postre']) || isset($_SESSION['Bebida'])){
                $eleccion.="<h2>SU ELECCIÓN:</h2>";
            }
            if(isset($_SESSION['Primero'])){
                $primero=$_SESSION['Primero'];
                $eleccion.="Primer plato: $primero<br>";
            }
            if(isset($_SESSION['Segundo'])){
                $segundo=$_SESSION['Segundo'];
                $eleccion.="Segundo plato: $segundo<br>";
            }
            if(isset($_SESSION['Postre'])){
                $postre=$_SESSION['Postre'];
                $eleccion.="Postre: $postre<br>";
            }
            if(isset($_SESSION['Bebida'])){
                $bebida=$_SESSION['Bebida'];
                $eleccion.="Bebida: $bebida<br>";
            }
        ?>
        <a href="pedidoplato.php?plato=Primero">PRIMER PLATO</a><br>
        <a href="pedidoplato.php?plato=Segundo">SEGUNDO PLATO</a><br>
        <a href="pedidoplato.php?plato=Postre">POSTRE</a><br>
        <a href="pedidoplato.php?plato=Bebida">BEBIDA</a><br>
        <form action="finpedido.php" method="POST" enctype="multipart/form-data">
            <?php echo $eleccion ?><br>
            <button name="pedido">
                <img src="img/pedido.png">
            </button>
        </form>
            
    </body>
</html>

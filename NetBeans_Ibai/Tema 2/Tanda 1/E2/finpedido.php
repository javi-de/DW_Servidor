<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'libmenu.php';
        session_start();
        if(!isset($_SESSION['Primero']) && !isset($_SESSION['Segundo']) && !isset($_SESSION['Postre']) && !isset($_SESSION['Bebida'])){
            header('Location: pedido.php');
        }
        $eleccion="";
        $total=0;
        if(isset($_SESSION['Primero'])){
            $primero=$_SESSION['Primero'];
            if($_SESSION['nombre']!="invitado"){
                $precio= (100-dameDcto($_SESSION['nombre']))/100*intval(damePrecio($primero));
            } else {
                $precio=intval(damePrecio($primero));
            }
            $total+=$precio;
            $eleccion.="Primer plato: $primero $precio €<br>";
        }
        if(isset($_SESSION['Segundo'])){
            $segundo=$_SESSION['Segundo'];
            if($_SESSION['nombre']!="invitado"){
                $precio= (100-dameDcto($_SESSION['nombre']))/100*intval(damePrecio($segundo));
            } else {
                $precio=intval(damePrecio($segundo));
            }
            $total+=$precio;
            $eleccion.="Segundo plato: $segundo $precio €<br>";
        }
        if(isset($_SESSION['Postre'])){
            $postre=$_SESSION['Postre'];
            if($_SESSION['nombre']!="invitado"){
                $precio= (100-dameDcto($_SESSION['nombre']))/100*intval(damePrecio($postre));
            } else {
                $precio=intval(damePrecio($postre));
            }
            $total+=$precio;
            $eleccion.="Postre: $postre $precio €<br>";
        }
        if(isset($_SESSION['Bebida'])){
            $bebida=$_SESSION['Bebida'];
            if($_SESSION['nombre']!="invitado"){
                $precio= (100-dameDcto($_SESSION['nombre']))/100*intval(damePrecio($bebida));
            } else {
                $precio=intval(damePrecio($bebida));
            }
            $total+=$precio;
            $eleccion.="Bebida: $bebida $precio €<br><br>";
        }
        $eleccion.="Total: $total €<br><br>";
        echo $eleccion;
        ?> 
        <a href="pedido.php">Otro pedido</a>
    </body>
</html>
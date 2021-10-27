<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finpedido.php</title>
    <style>
        table, tr, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        session_destroy();
        //unset($_SESSION["menu"]);

    require_once "libmenu.php";

        $arrPedido= $_SESSION["menu"];
        $arrPlatoYPrecio;

        if(isset($_SESSION["login"]))
            $descuento= dameDcto($_SESSION["login"]);
        else
            $descuento= 0;
        
        foreach ($arrPedido as $nomPlato) {
            if($nomPlato!="unknown")
                $arrPlatoYPrecio[$nomPlato]= damePrecio($nomPlato);
        }



        /*
        foreach ($arrPlatoYPrecio as $nomPlato => $precio) {
            echo $nomPlato." - ".$precio;
        }*/
    ?>
    
    <h2>Desglose del pedido</h2>
    <table>
        <?php
            $precioTotal= 0;

            foreach($arrPlatoYPrecio as $nomPlato => $precio){
                $precioTotal+= floatval($precio);
                echo "<tr>";
                    echo "<td>$nomPlato</td>";
                    echo "<td>$precio €</td>";
                echo "</tr>";
            }
        ?>    
        <tr>
            <td colspan="2"><strong>Subtotal: </strong><?php echo $precioTotal ?> €</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Descuento: </strong><?php echo $descuento ?> %</td>
        </tr>
        <tr>
            <?php
                $precioFinal= $precioTotal - ($precioTotal * floatval($descuento) / 100);
            ?>
            <td colspan="2"><strong>PRECIO FINAL: </strong><?php echo $precioFinal ?> €</td>
        </tr>
    </table>
    <p>Pedido realizado, <a href="pedido.php">pulsa aquí para realizar otro pedido</a></p>
</body>

<?php
    //unset($_SESSION["menu"]);
?>

</html>
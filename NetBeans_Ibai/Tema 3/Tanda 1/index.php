<?php
    require_once 'cabecera.php';
    if(isset($_GET['id'])){
        $items= itemsCat($con, $_GET['id']);
    } else {
        $items= items($con);
    }
    if(isset($_GET['id'])){
        $_SESSION['ultimaPag']=$_SERVER['PHP_SELF']."?id=".$_GET['id'];
    } else {
        $_SESSION['ultimaPag']=$_SERVER['PHP_SELF'];
    }
    if($items!=null){
?>
<h2>Items disponibles</h2>
<table border="1">
    <thead>
        <tr>
            <th>IMAGEN</th>
            <th>ITEM</th>
            <th>PUJAS</th>
            <th>PRECIO</th>
            <th>PUJAS HASTA</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            } else {
                echo "<h2>No hay items disponibles</h2>";
            }
            foreach ($items as $idItem) {
                echo "<tr>";
                    if(imagen($con,$idItem)!=null){
                        echo "<td><img src='".imagen($con,$idItem)."' alt='".nombreItem($con, $idItem)."' width='100' height='100'></td>";
                    } else {
                        echo "<td>SIN IMAGEN</td>";
                    }
                    echo "<td><a href=itemdetalles.php?item=$idItem>".nombreItem($con, $idItem)."</td>";
                    echo "<td>". cantPuja($con, $idItem)."</td>";
                    if(precioPujaMasAlta($con, $idItem)!=null){
                        echo "<td>". number_format(precioPujaMasAlta($con, $idItem),2,".","").MONEDA_LOCAL."</td>";
                    } else {
                        echo "<td>". number_format(precioPartida($con, $idItem),2,".","").MONEDA_LOCAL."</td>";
                    }
                    echo "<td>". fechaPuja($con,$idItem)."</td>";
                echo "</tr>";
            }
            
            
        ?>
    </tbody>
</table>

<?php
    require_once 'pie.php';
?>


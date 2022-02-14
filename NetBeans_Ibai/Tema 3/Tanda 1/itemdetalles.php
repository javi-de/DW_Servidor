<?php
    require_once 'cabecera.php';
    if(!isset($_GET['item'])){
        header("Location: index.php");
    }
    if(isset($_GET['item'])){
        $_SESSION['ultimaPag']=$_SERVER['PHP_SELF']."?item=".$_GET['item'];
    }
    $añadido="";
    if(isset($_POST['enviar'])){
        $idItem=$_GET['item'];
        if($cantidad=$_POST['cantidad']<precioPartida($con, $idItem)){
            $añadido="cantidad";
        }else{
            $id_item=$_GET['item'];
            $id_user=$_SESSION['id'];
            $cantidad=$_POST['cantidad'];
            $añadido=pujar($con, $id_item, $id_user, $cantidad);
        }
        
    }
    $err="";
    if($añadido=="cantidad"){
        $err="Puja muy baja!";
    } elseif ($añadido=="limite") {
        $err="Límite de 3 pujas por día";
    }
    $idItem = $_GET['item'];
    $imgs=imagenes($con,$idItem);
?>
<h2><?php echo nombreItem($con, $idItem) ?></h2>

<p>
    <b>Número de pujas:</b> <?php echo cantPuja($con,$idItem); ?> - 
    <b>Precio actual:</b> 
        <?php 
            if(precioPujaMasAlta($con, $idItem)!=null){
                echo  number_format(precioPujaMasAlta($con, $idItem),2,".","");
            } else {
                echo number_format(precioPartida($con, $idItem),2,".","");
            }
            echo MONEDA_LOCAL;
        ?> - 
    <b>Fecha fin para pujar:</b> <?php echo fechaPuja($con,$idItem); ?>
</p>
<?php
    foreach ($imgs as $value) {
        echo "<img src='".$value."' alt='".$value."' width='100' height='100'>";
    }
?>
<p><?php echo descripcionItem($con,$idItem) ?></p>
<h2>Pujar por este item</h2>
<?php if(!isset($_SESSION['id'])){ ?>
<p>Para pujar, debes autenticarte <a href="login.php">aquí</a></p>
<?php } else { ?>
<p>Añade tu puja en el cuadro inferior:</p>
<form action="" method="POST">
    <table border="1">
        <tr>
            <td><input type="text" name="cantidad" id="precioPuja"></td>
            <td><p style="color: red"><input type="submit" name="enviar" value="¡Puja!"> <?php echo $err ?></p></td>
        </tr>
    </table>
</form>
<h2>Historial de la puja</h2>
<ul>
    <?php 
        $pujas=pujas($con,$idItem);
        foreach ($pujas as $idItem) {
            $nombre=nombreId($con,idUsuarioPuja($con,$idItem));
            $cantidad=number_format(cantidadPuja($con,$idItem),2,".","").MONEDA_LOCAL;
            echo "<li>$nombre - $cantidad</li>";
        }
    ?>
</ul>
<?php
}
    require_once 'pie.php';
?>




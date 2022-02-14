<?php
    require_once 'cabecera.php';
    if(!isset($_GET['id'])){
        header("Location: index.php");
    }
    if(isset($_GET['id'])){
        $_SESSION['ultimaPag']=$_SERVER['PHP_SELF']."?id=".$_GET['id'];
    }
    $idItem=$_GET['id'];
    $todoItem=todoItemId($con, $idItem);
    $cantPujas=cantPuja($con,$idItem);
    $imagenes=imagenes($con,$idItem);
    
    if(isset($_GET['borrar'])){
        $img=imagen($con,$_GET['borrar']);
        borrarImagen($con, $_GET['borrar']);
        unlink($img);
    }
    if(isset($_POST['posponer1Dia'])){
        
    }
?>
<h3><?php echo nombreItem($con, $idItem) ?></h3>
<table border="1">
    <tr>
        <td>Precio de salida: <?php echo $todoItem["preciopartida"].MONEDA_LOCAL?></td>
        <td>
            <?php if ($cantPujas==0){?>
                <input type="text" name="cantidad" style="width: 50%"><input type="submit" name="bajar" value="BAJAR" style="width: 25%"><input type="submit" name="subir" value="SUBIR" style="width: 25%">
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>Fecha fin para pujar: <?php echo $todoItem["fechafin"] ?></td>
        <td><input type="submit" name="posponer1Hora" value="POSPONER 1 HORA" style="width: 50%"><input type="submit" name="posponer1Dia" value="POSPONER 1 DIA" style="width: 50%"></td>
    </tr>
</table>
<h2>Imagenes actuales</h2>
<?php if ($imagenes==null){?>
<p>No hay imagenes disponibles</p>
<?php }else{
    echo '<table border="1">';
    foreach ($imagenes as $key => $value) {
        echo '<tr>';
            echo '<td><img style="height: 100px; width: 100px" src="'.$value.'"></td>';
            echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$_GET['id']."&borrar=".$key."'>[BORRAR]</a></td>";
        echo '</tr>';
    }
    echo '</table>';
?>
<?php
    }
    require_once 'pie.php';
?>



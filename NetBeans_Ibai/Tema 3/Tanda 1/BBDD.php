<?php  
    include_once "config.php";
    function conexion(){
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
        if (mysqli_connect_errno()) {  
            echo "Imposible conectarse a la base de datos: " . mysqli_connect_error();  
        } else {
            mysqli_set_charset  ($con, "UTF8");
            return $con;
        }
    }
    
    //Select
    function todoItemId($con, $id) {
        $catsql = "SELECT * FROM item where id='$id'";
        $catresult = mysqli_query($con,$catsql);
        $catrow = mysqli_fetch_assoc($catresult);
        $items=array();
        $items["id_cat"]=$catrow['id_cat'];
        $items["id_user"]=$catrow['id_user'];
        $items["nombre"]=$catrow['nombre'];
        $items["preciopartida"]=$catrow['preciopartida'];
        $items["descripcion"]=$catrow['descripcion'];
        $items["fechafin"]=$catrow['fechafin'];
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $items;
    }
    
    function categorias($con) {
        $catsql = "SELECT id, categoria FROM categoria ORDER BY categoria ASC;";
        $catresult = mysqli_query($con,$catsql);
        $categorias=array();
        while($catrow = mysqli_fetch_assoc($catresult)) {
            $categorias[$catrow['id']]=$catrow['categoria'];
        }
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $categorias;
    }
    
    function items($con){
        $catsql = "SELECT id FROM item";
        $catresult = mysqli_query($con,$catsql);
        $items=array();
        while($catrow = mysqli_fetch_assoc($catresult)) {
            array_push($items, $catrow['id']);
        }
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $items;
    }
    
    function itemsCat($con, $cat){
        $catsql = "SELECT id FROM item WHERE id_cat=$cat";
        $catresult = mysqli_query($con,$catsql);
        $items=array();
        while($catrow = mysqli_fetch_assoc($catresult)) {
            array_push($items, $catrow['id']);
        }
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $items;
    }

    function imagen($con,$idItem) {
        $catsql = "SELECT imagen FROM imagen where id_item=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['imagen'];
    }
    
    function imagenes($con,$idItem) {
        $catsql = "SELECT * FROM imagen where id_item=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $imagenes=array();
        while($catrow = mysqli_fetch_assoc($catresult)) {
            $imagenes[$catrow['id']]=$catrow['imagen'];
        }
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $imagenes;
    }
    
    function nombreItem($con,$idItem) {
        $catsql = "SELECT nombre FROM item where id=$idItem;";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['nombre'];
    }
    
    function cantPuja($con,$idItem) {
        $catsql = "SELECT COUNT(id) AS cant FROM puja where id_item=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cant'];
    }
    
    function precioPujaMasAlta($con,$idItem) {
        $catsql = "SELECT max(cantidad) as cantidad FROM puja where id_item=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cantidad'];
    }
    
    function precioPartida($con,$idItem) {
        $catsql = "SELECT preciopartida FROM item where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['preciopartida'];
    }
    
    function fechaPuja($con,$idItem) {
        $catsql = "SELECT fechafin FROM item where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['fechafin'];
    }
    
    function nombre($con,$nombre) {
        $catsql = "SELECT count(username) as cont FROM usuario where username='$nombre';";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cont'];
    }
    
    function iniciarSesion($con, $usuario, $contraseña) {
        $catsql = "SELECT id FROM usuario where username='$usuario' and password='$contraseña';";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['id'];
    }
    
    function usuarioPorId($con, $id) {
        $catsql = "SELECT username FROM usuario where id='$id';";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['username'];
    }
    
    function descripcionItem($con,$idItem) {
        $catsql = "SELECT descripcion FROM item where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['descripcion'];
    }
    
    function pujas($con,$idItem) {
        $catsql = "SELECT id FROM puja where id_item=$idItem ORDER BY fecha DESC, cantidad DESC";
        $catresult = mysqli_query($con,$catsql);
        $items=array();
        while($catrow = mysqli_fetch_assoc($catresult)) {
            array_push($items, $catrow['id']);
        }
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $items;
    }
    
    function cantidadPuja($con,$idItem) {
        $catsql = "SELECT TRUNCATE(cantidad, 2) as cantidad FROM puja where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cantidad'];
    }
    
    function idUsuarioPuja($con,$idItem) {
        $catsql = "SELECT id_user FROM puja where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['id_user'];
    }
    
    function nombreId($con,$idItem) {
        $catsql = "SELECT nombre FROM usuario where id=$idItem";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['nombre'];
    }
    
    function maxPuja($con, $id_item){
        $catsql = "SELECT max(cantidad) as cantidad FROM puja where id_item=$id_item";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cantidad'];
    }
    
    
    
    function pujasUsuarioDia($con, $id_item, $id_user){
        $catsql = "SELECT count(id_item) as cantidad FROM puja where fecha=curdate() and id_item='$id_item' and id_user='$id_user'";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cantidad'];
    }
    
    function itemUltimoId($con){
        $catsql = "SELECT max(id) as id FROM item";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['id'];
    }
    
    //Insert
    
    function pujar($con, $id_item, $id_user, $cantidad){
        if(pujasUsuarioDia($con, $id_item, $id_user)>=3){
            return "limite";
        }
        if($cantidad<=maxPuja($con, $id_item)){
            return "cantidad";
        }
        if($cantidad>maxPuja($con, $id_item) && pujasUsuarioDia($con, $id_item, $id_user)<3){
            $catsql = "INSERT INTO puja(id_item, id_user, cantidad, fecha) values ('$id_item', '$id_user', '$cantidad', curdate())";
            $catresult = mysqli_query($con,$catsql);
            if(mysqli_errno($con)) die(mysqli_error($con));
        }     
    }
    
    function crearUsuario($con, $username, $nombre, $password, $cadenaverificacion, $email=""){
        $catsql = "INSERT INTO usuario(username, nombre, password, email, cadenaverificacion, activo, falso) values ('$username', '$nombre', '$password', '$email', '$cadenaverificacion', 1, 0)";
        $catresult = mysqli_query($con,$catsql);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return mysqli_insert_id($con);
    }
    
    function crearItem($con, $id_cat, $id_user, $nombre, $preciopartida, $descripcion, $fechafin){
        $catsql = "INSERT INTO item(id_cat, id_user, nombre, preciopartida, descripcion, fechafin) values ($id_cat, $id_user, '$nombre', $preciopartida, '$descripcion', '$fechafin')";
        $catresult = mysqli_query($con,$catsql);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return mysqli_insert_id($con);
    }
    
    //update
    function posponer1Dia($con, $id){
        $catsql = "UPDATE INTO item(id_cat, id_user, nombre, preciopartida, descripcion, fechafin) values ($id_cat, $id_user, '$nombre', $preciopartida, '$descripcion', '$fechafin')";
        $catresult = mysqli_query($con,$catsql);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return mysqli_affected_rows($con);
    }
    
    //delete
    function borrarImagen($con, $id){
        $catsql = "DELETE FROM imagen WHERE id='$id'";
        $catresult = mysqli_query($con,$catsql);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return mysqli_affected_rows($con);
    }
?>


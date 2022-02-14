<?php
    require_once "config.php";

    function conectarBD(){
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
        if (mysqli_connect_errno()) {  
            echo "Imposible conectarse a la base de datos: " . mysqli_connect_error();  
        } else {
            mysqli_set_charset($con, "UTF8");
            return $con;
        }
    }

    function cogerCategorias($con){
        $sql = "SELECT * FROM categoria";
        $query = mysqli_query($con, $sql);
        $categorias = [];
        
        while ($categoria = mysqli_fetch_assoc($query)) {
            $categorias[] = $categoria;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $categorias;
    }
    
    function cogerItemsPorCategoria($con, $idCat){
        if($idCat!= ""){
            $sql= "SELECT * FROM item WHERE id_cat=$idCat";
        }else{
            $sql= "SELECT * FROM item";
        }
        
        $query= mysqli_query($con, $sql);
        $items= [];
        
        while($item= mysqli_fetch_assoc($query)) {
            $items[]= $item;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));
        
        return $items;
    }
    
    /*
    function cogerImagen($con, $idItem){
        $imagenes = cogerImagenes($con, $idItem);

        if (count($imagenes) > 0)
            return $imagenes[0];

        return false;
    }*/
    
    function cogerImagenes($con, $idItem){
        $sql= "SELECT imagen FROM imagen WHERE id_item=$idItem";
        $query= mysqli_query($con, $sql);
        $imagenes=[];
        
        while($imagen= mysqli_fetch_assoc($query)){
            $imagenes[]= $imagen;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $imagenes;

    }
    
    function pujasPorItem($con, $idItem){
        $sql= "SELECT * FROM puja WHERE id_item=$idItem ORDER BY cantidad DESC";
        $query= mysqli_query($con, $sql);
        $pujas=[]; 
        
        while($puja= mysqli_fetch_assoc($query)){
            $pujas[]= $puja;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $pujas;
    }
    
    function existeUsuario($con, $usuario){
        $sql= "SELECT count(username) as cont FROM usuario WHERE username='$usuario'";
        $query= mysqli_query($con, $sql);
        
        $numUsuarios= mysqli_fetch_assoc($query);
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        if($numUsuarios["cont"]> 0){
            return true;
        }
        
        return false;
    }
    
    function nombre($con,$nombre) {
        $catsql = "SELECT count(username) as cont FROM usuario where username='$nombre';";
        $catresult = mysqli_query($con,$catsql);
        $catrow=mysqli_fetch_assoc($catresult);
        if(mysqli_errno($con)) die(mysqli_error($con));
        return $catrow['cont'];
    }

    function guardarUsuarioBD($con, $usuario, $nombre, $password, $email) {
        $cadena= crearCadenaVerificacion();
        $activo= false;
        $falso= false;
        
        $sql= "INSERT INTO usuario(username, nombre, password, email, cadenaverificacion, activo, falso) "
                         . "VALUES('$usuario', '$nombre', '$password', '$email', '$cadena', ".intval($active).", ".intval($falso).")";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_errno($con)) die(mysqli_error($con));
        
        return mysqli_insert_id($con);
        
    }
    
    function crearCadenaVerificacion(){
        $max = 16;
        $cadena = "";

        for ($i = 0; $i < $max; $i++) {
            $char = chr(random_int(ord('A'), ord('z')));
            $cadena .= $char;
        }

        return $cadena;
    }
    
    function cogerInfoUsuario($con, $usuario){
        $sql= "SELECT * FROM usuario WHERE username=$usuario";
        $query= mysqli_query($con, $sql);
        $usuarios=[]; 
        
        while($usuario= mysqli_fetch_assoc($query)){
            $usuarios[]= $usuario;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $usuarios;
    }
    
    function cogerInfoItem($con, $idItem){
        $sql= "SELECT * FROM item WHERE id=$idItem";
        $query= mysqli_query($con, $sql);
        $items=[]; 
        
        while($item= mysqli_fetch_assoc($query)){
            $items[]= $item;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $items;
    }
    
    
    /*************************************************************************/
    function enviarEmail($con, $usuario){
        $usuarios= cogerInfoUsuario($con, $usuario);
        
        $email= $usuarios[0]["email"];
        $cadena= $usuarios[0]["cadenaverificacion"];
 
        
        //[... ... ... ... ]
    }
    /*************************************************************************/

    function comprobarRegistro($con, $usuario, $password){
        $sql= "SELECT * FROM usuario WHERE username='$usuario' AND password='$password'";
        $query= mysqli_query($con, $sql);
        $usuarios=[]; 
        
        while($usuario= mysqli_fetch_assoc($query)){
            $usuarios[]= $usuario;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $usuarios;
    }
    
    function insertarNuevaPuja($con, $idItem, $idUser, $cantidad, $fecha){
        $sql= "INSERT INTO puja(id_item, id_user, cantidad, fecha) "
                   . "VALUES('$idItem', '$idUser', '$cantidad', '$fecha')";
         
        $result = mysqli_query($con, $sql);
        
        if(mysqli_errno($con)) die(mysqli_error($con));
        
        return mysqli_insert_id($con); 
    }  
    
    function pujasAlDia($con, $idItem, $idUser, $fecha){
        $sql= "SELECT * FROM puja WHERE id_item='$idItem' AND id_user='$idUser' AND fecha='$fecha'";
        $query= mysqli_query($con, $sql);
        $pujas=[]; 
        
        while($puja= mysqli_fetch_assoc($query)){
            $pujas[]= $puja;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return count($pujas);
    }
    
    function quienPujo($con, $idUser){
        $sql= "SELECT * FROM usuario WHERE id='$idUser'";
        $query= mysqli_query($con, $sql);
        $usuarios=[]; 
        
        while($usuario= mysqli_fetch_assoc($query)){
            $usuarios[]= $usuario;
        }
        
        if(mysqli_errno($con)) die(mysqli_error($con));

        return $usuarios;
    }
    
    function insertarItem($con, $idCat, $idUser, $nombre, $precio, $descripcion, $fecha){
        $sql= "INSERT INTO item(id_cat, id_user, nombre, precio_partida, descripcion, fechafin) "
                   . "VALUES('$idCat', '$idUser', '$nombre', '$precio', '$descripcion', '$fecha')";
         
        $result = mysqli_query($con, $sql);
        
        if(mysqli_errno($con)) die(mysqli_error($con));
        
        return mysqli_insert_id($con); 
    }
    
    
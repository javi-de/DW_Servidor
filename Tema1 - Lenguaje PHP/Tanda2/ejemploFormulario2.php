<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            function filtrado($datos){
                $datos = trim($datos);
                $datos = stripslashes($datos); // Elimina backslashes \
                $datos = htmlspecialchars($datos); // Traduce caracteres especiales en  HTML
                return $datos;
            }
            $errores=array();   
            if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){            
                if(empty($_POST["nombre"])){
                    $errores[] = "El nombre es requerido";     
                }
                if(empty($_POST["password"]) || strlen($_POST["password"]) < 5){
                    $errores[] = "La contraseña es requerida y ha de ser mayor a 5 caracteres";
                }
                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"])){
                    $errores[] = "No se ha indicado email o el formato no es correcto";
                }
                if (!isset($_POST["nacionalidad"])){
                    $errores[] = "Debes elegir nacionalidad";
                }
                if(!filter_var($_POST["sitioweb"], FILTER_VALIDATE_URL) || empty($_POST["sitioweb"])){
                    $errores[] = "No se ha indicado sitio web o el formato no es correcto";
                }

                if(empty($errores)) {
                    $campos['nombre'] = filtrado($_POST["nombre"]);
                    $campos['password']= filtrado($_POST["password"]);
                    $campos['educacion'] = filtrado($_POST["educacion"]);
                    $campos['nacionalidad'] = filtrado($_POST["nacionalidad"]);
                    $campos['idiomas'] = filtrado(implode(", ", $_POST["idiomas"]));
                    $campos['email'] = filtrado($_POST["email"]);
                    $campos['sitioweb'] = filtrado($_POST["sitioweb"]);
                }    
                if(count($errores)>0){
                    foreach ($errores as $error){
                        echo "<p> $error </p>";
                    }
                }
                else{
                     foreach ($campos as $campo => $valor){
                         echo "<p> $campo: $valor </p>";
                     }
                }    
            }
        ?>       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Nombre:    <input type="text" name="nombre" maxlength="50"><br>
            Contraseña:    <input type="password" name="password"><br>
            Educacion:    <select name="educacion">
                <option value="sin-estudios">Sin estudios</option>
                <option value="educacion-obligatoria" selected="selected">Educación Obligatoria</option>
                <option value="formacion-profesional">Formación profesional</option>
                <option value="universidad">Universidad</option>
                 </select> <br>
            Nacionalidad:    <input type="radio" name="nacionalidad" value="hispana">Hispana</input>
          <input type="radio" name="nacionalidad" value="otra">Otra</input><br>
            Idiomas:      <input type="checkbox" name="idiomas[]" value="español" checked="checked">Español</input>
            <input type="checkbox" name="idiomas[]" value="inglés">Inglés</input>
            <input type="checkbox" name="idiomas[]" value="aleman">Alemán</input><br>
            Email:    <input type="text" name="email"><br>
            Sitio Web:    <input type="text" name="sitioweb"><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>
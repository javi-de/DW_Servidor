<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $nombre="";
            $arrmodulos = array();
            
            /*Se comprueba si se ha clicado el boton Enviar y, en caso de que 
             * el campo nombre tenga un valor, se guarda en una variable  
             */
            if(isset($_POST['enviar']) && !empty($_POST['nombre'])){
                $nombre = $_POST['nombre'];
            }
            
            /*Si todos los valores han sido rellenados se muestran en pantalla.
             * Si no se dibuja el formulario.
             */
            if (isset ($_POST['modulos']) && !empty($_POST['nombre']))
            {
                 $nombre = $_POST['nombre'];
                 $arrmodulos = $_POST['modulos'];

                echo "<p>Datos introducidos correctamente</p>";
                echo "Nombre: ".$nombre."<br />";
                foreach ($arrmodulos as $modulo) {
                      echo "Modulo: ".$modulo."<br />";
                }
            }
            else 
            {
        ?>
        <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Nombre del alumno:
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
            <?php
                /*Si se ha pulsado el boton Enviar y el campo nombre no tiene
                 * ningún valor, se muestra un mensaje al lado de la caja de texto
                 */ 
                if (isset($_POST['enviar']) && empty($_POST['nombre'])){
                     echo "<span style='color:red'> Debe introducir nombre!!</span>";
                }
            ?><br />
            <p>Módulos que cursa:
            <?php
                /*Si se ha pulsado el boton Enviar y no se ha seleccionado ningún
                 * modulo, se muestra un mensaje de encima de los checkbox
                 */
                if (isset($_POST['enviar']) && (!isset($_POST['modulos']))){
                     echo "<span style='color:red'>Debe escoger al menos uno!!</span>";
                }
            ?>
            </p>
            
            <input type="checkbox" name="modulos[]" value="DWES"
                 <?php
                    /*Si se ha pulsado el boton Enviar y el modulo ha sido 
                    * seleccionado, se marca el checkbox como clicado.
                    */
                    if(isset($_POST['enviar']) && (isset($_POST['modulos'])) && in_array("DWES",$_POST['modulos'])){
                         echo 'checked="checked"';
                    }
                 ?>
            />
           Desarrollo web en entorno servidor         
           <br />
           <input type="checkbox" name="modulos[]" value="DWEC"
                 <?php
                    /*Si se ha pulsado el boton Enviar y el modulo ha sido 
                     * seleccionado, se marca el checkbox como clicado.
                     */
                    if(isset($_POST['enviar']) && (isset($_POST['modulos'])) && in_array("DWEC",$_POST['modulos'])){
                         echo 'checked="checked"';
                    }
                 ?>
            />
            Desarrollo web en entorno cliente          
            <br /><input type="submit" value="Enviar" name="enviar"/>
     </form>
    <?php
        }
    ?>
    </body>
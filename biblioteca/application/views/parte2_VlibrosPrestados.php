<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <h1>Libros prestados</h1>
    <?php
        echo form_open("/chome/prestamos");
            if(isset($libroSelecccionado))
                echo form_dropdown("selectLibroPrestado", $todosLibrosPrestados, $libroSelecccionado);
            else
                echo form_dropdown("selectLibroPrestado", $todosLibrosPrestados);

            echo form_submit("butVer", "Ver prestamos");
        echo form_close();

        if(isset($contador) and $contador > 0)
            echo "<p>Número de devoluciones: ".$contador."</p>";
    ?>
</form>
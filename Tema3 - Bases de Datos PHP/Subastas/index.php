<?php
    require_once "cabecera.php";

    if( isset($_GET["id"]) ){
        echo $_GET["id"];

    }
?>

<table>
    <tr>
        <th>IMAGEN</th> 
        <th>ITEM</th> 
        <th>PUJAS</th> 
        <th>PRECIO</th> 
        <th>PUJAS HASTA</th> 
    </tr>

    <?php
        $items= dameItems($conn);
        foreach ($items as $item) {
            
        }

        
    ?>


    <tr><!-- imagenes -->
    </tr>

    <tr><!-- nombre items -->
    </tr>

    <tr><!-- pujas -->
    </tr>

    <tr><!-- precios -->
    </tr>

    <tr><!-- pujas hasta -->
    </tr>
</table>


<?php
    require_once "pie.php";
    
?>
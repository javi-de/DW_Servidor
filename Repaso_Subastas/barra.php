<h1>CATEGORIAS</h1>
<ul>
    <?php
        if($con){
            $categorias= cogerCategorias($con);
            
            echo "<li><a href='./index.php'>Ver todas</a></li>";
            foreach ($categorias as $categoria){
                echo "<li><a href='".BASE_ROUTE."index.php?idCat=".$categoria['id']."'>". $categoria['categoria'] ."</a></li>";
            }
        }
?>
</ul>
<?php
$catsql = "SELECT * FROM categorias ORDER BY categoria ASC;";
$catresult = mysql_query($catsql);
echo "<h1>Categorias</h1>";
echo "<ul>";
echo "<li><a href='index.php'>Ver todas</a></li>";
while($catrow = mysql_fetch_assoc($catresult)) {
    echo "<li><a href='index.php?id="
        . $catrow['id'] . "'>" . $catrow['categoria']. "</a></li>";
}
echo "</ul>";
?>

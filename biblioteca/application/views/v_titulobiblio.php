<!-- Le llega un mensaje $mensaje(a colocar entre paréntesis)   -->
<?php
//para guardar la ruta del css
$css = base_url() . "style/stylesheet.css";
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Biblioteca Agora</title>
	<!-- atajo para mostrar variables php <?= $css ?> -->
	<link rel="stylesheet" href="<?= $css ?>">
</head>

<body>
	<div id="header">
		<h1>BIBLIOTECA AGORA</h1>
	</div>
	<div id="container">
		<div id="bar">
			<ul>
			<?php
				foreach($generos as $gen){
					echo "<li><a href='#'>".$gen."<a/></li>";
				}
			?>
			</ul>
		</div>
		<div id="main">
			

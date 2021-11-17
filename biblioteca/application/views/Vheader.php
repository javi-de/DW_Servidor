<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
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
	<div id="menu">
		<a href="<?= site_url() ?>">Todos los libros</a>
		<!-- <a href="<?= site_url("/chome/calendario") ?>">Calendario</a> -->
		<a href="<?= site_url("/chome/prestamos") ?>">Prestamos</a>
	</div>
	<div id="container">
		<div id="bar">
			<ul>
				<?php
					foreach($generos as $gen){
						echo "<li><a href='".site_url('Chome/genero/'.$gen)."'>".$gen."<a/></li>";
					}
				?>

				
			</ul>
		</div>
		<div id="main">
			

<?php
include "BD/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>BiblioSite SENNOVA</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="shortcut icon" href="RECURSOS/logos/sena_pestaña.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<header class="header">
		<img src="RECURSOS/logo_sin_fondo.png" class="logo">
	</header>

    <nav class="nav">
      <img class="menu_nav nombre_boton--click" src="RECURSOS/menu.svg">

      <ul class="ul"> 
        <li class="li"><a class="a" href="index.php">Inicio</a></li>
        <li class="li"><a class="a" href="#">Grupo idea</a></li>
        <li class="li"><a class="a" href="semilleros.php">Semilleros</a></li>
        <li class="li"><a class="a a_menu" href="proyectos.php">Proyectos</a></li>
      </ul>
      
    </nav>


	<div id="contenedor">
		<div id="barra_filtro">
			<label for="buscador">Buscar: </label>
			<input type="text" name="buscador" id="buscador">

			<div id="mostrar_paginas">

				<label for="num_registros">Mostrar: </label>
					<select name="num_registros" id="num_registros">
						<option class="numero_opcion" value="3">3</option>
						<option class="numero_opcion" value="5">5</option>
					</select>
				<label for="num_registros">registros </label>

			</div>

		</div>

		<h1 id="titulo_proyectos_registrados">Proyectos Registrados</h1>

		<table class="listado_proyectos">
			<thead>
				<tr class="thead">
					<th>Nombre</th>
					<th>Estado</th>
					<th>Línea programatica</th>
					<th>Línea de investigación</th>
					<th>Semillero</th>
					<th>Buscar</th>
				</tr>			
			</thead>

			<tbody id="registroProyectos">
			
			</tbody>
		</table>
		<div id="paginacion">
			<div>
				<label id="pagina_num"></label>
			</div>

			<div id=navegador_paginas>
						
			</div>
		</div>

	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>

</body>
	<script src="buscador.js"></script>
	<script src="boton.js"></script>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BiblioSite SENNOVA</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="shortcut icon" href="RECURSOS/logos/sena_pestaña.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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

					<div id="informacion_semillero">
				
						<div id="ficha">
							<img class="logo_semillero" src="">
							<h3 class="informacion_ficha"></h3>
							<h3 class="informacion_ficha"></h3>
						</div>

							<h1 class="nombre_semillero"></h1>
							<div id='redes_sociales'>
								
							</div>
	
							<p>
								
							</p>
							<h2>Objetivos:</h2>
							<p>
								
							</p>
							<div class="mision_vision">
								<div class="mision">
									<h2>Misión:</h2>
									<p>
										
									</p>
								</div>
								<div class="vision">
									<h2>Visión:</h2>
									<p>
										
									</p>	
								</div>
																
							</div>

			
			<h2>Integrantes</h2>

				<ol class="integrantes_proyectos">
					
			
				</ol>

			<h2>Proyectos</h2>
			<div class="proyectos">
				<ol class="integrantes_proyectos">
			
					</ol>
				</div>
				


	<!-- BOTON DE WHATSAPP-->
	<div class="whatsapp">
		<a href="https://wa.me/3162847262?text=Hola, tengo una (pregunta, sugerencia, reclamo o felicitacion) sobre BiblioSite SENNOVA">
			<img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia sobre el semillero de investigación?, contantate con nosotros">
		</a>	
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>
</body>
<script src="boton.js"></script>
</html>
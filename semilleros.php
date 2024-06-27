<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BiblioSite SENNOVA</title>
	<link rel="stylesheet" href="estilo.css">
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
		<h1 class="titulo_semilleros">
			Semilleros de investigación del <i>Centro Sur Colombiano de Logística Internacional</i>
		</h1>
		<?php
				include "BD/conexion.php";

				
				$cod_semillero;
				$contacto="3162847262";

				$consulta="SELECT `cod_semillero`, `nombre`, `logo` FROM `semillero`";

			
				if (!$resultado = mysqli_query($conexion, $consulta)) {
					echo "ERROR: FALLO CONSULTA";
					exit;
				}

		?>
		<div class="logos_semilleros">
			
		<?php
		
				while ($fila = mysqli_fetch_assoc($resultado)) 
				{
		?>		
			<form id="lista_semilleros" method="POST" action="informacion_semilleros.php">
					<input 
					type="image" 
					class="semillero" 
					src="data:image/jpg;base64, <?php echo base64_encode($fila['logo']); ?>" 
					title="<?php echo $fila['nombre']; ?>"
					>
					<input 
					type="hidden" 
					name="cod_semillero" 
					value="<?php echo $fila['cod_semillero']; ?>"
					>
			</form>
		<?php			
				}
		
		?>
			
		</div>
	</div>

	<!-- BOTON DE WHATSAPP-->
	<div class="whatsapp">
		<a href="https://wa.me/<?php echo $contacto;?>?text=Hola (❁´◡`❁), me gustaria obtener más información sobre los semilleros de investigación del Centro Sur Colombiano de Logistica Internacional- SENA">
			<img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia?, contantate con nosotros">
		</a>
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>

	<section class="modal">
		<div class="contenedor_modal">
						
		</div>
	</section>
</body>
<script src="boton.js"></script>
</html>
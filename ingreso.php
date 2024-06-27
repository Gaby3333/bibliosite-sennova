<?php  include "BD/conexion.php"; ?>

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

		<?php
		session_start();

		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];

		$consulta="SELECT * FROM `usuario` WHERE correo_usuario='$usuario' AND clave_usuario='$clave';";


		if (!$resultado = mysqli_query($conexion, $consulta)) {
					echo "ERROR: FALLO CONSULTA";
					exit;
				}
		$fila = mysqli_fetch_assoc($resultado);

		$usuario_principal= isset($fila['nombre_usuario']) ? $conexion-> real_escape_string($fila['nombre_usuario']) : 0;

		$_SESSION['liderSemillero']=$usuario_principal;



		$nombre_usuario="SELECT * FROM `integrantes` WHERE nombre_integrante='$usuario_principal';";

		if (!$ejecucion = mysqli_query($conexion, $nombre_usuario)) {
				echo "ERROR: FALLO CONSULTA";
				exit;
			}

		$ingreso_semillero= mysqli_fetch_assoc($ejecucion);

		$codSemillero= isset($ingreso_semillero['cod_semillero']) ? $conexion-> real_escape_string($ingreso_semillero['cod_semillero']) : 0;

		$_SESSION['codSemillero']=$codSemillero;

		if ($fila<>null)
		{

			?>
			<h1 class="titulo_ingreso_actualizacion">
				Ingreso y/o actualización de semilleros y proyectos de investigación del <i>Centro Sur Colombiano de Logística Internacional</i>
			</h1>
			<div class="logos_semilleros">


				<?php

				if ($fila['permisos']==0) {
				?>

				<a class="ingreso_actualizacion" href="ingreso_usuario.php">
					<img class="imagen_ingreso_actualizacion" src="RECURSOS/logos/registro_usuarios.jpg">
					<legend>Ingresar Usuario</legend>
				</a>

				<?php
				}

				if ($ingreso_semillero==null) {
				?>

				<a class="ingreso_actualizacion" href="ingreso_semilleros.php">
					<img class="imagen_ingreso_actualizacion" src="RECURSOS/logos/ingreso_semillero2.jpg">
					<legend>Ingresar semillero de investigación</legend>
				</a>

				<?php
				}

				?>

				<a class="ingreso_actualizacion" href="actualizar_semillero.php">
					<img class="imagen_ingreso_actualizacion" src="RECURSOS/logos/actualizacion_semillero2.jpg">
					<legend>Actualización semillero de investigación</legend>
				</a>

				<a class="ingreso_actualizacion" href="ingreso_proyectos.php">
					<img class="imagen_ingreso_actualizacion" src="RECURSOS/logos/ingreso_proyectos.jpg">
					<legend>Ingresar de proyectos de investigación</legend>
				</a>

				<a class="ingreso_actualizacion" href="actualizacion_proyectos.php">
					<img class="imagen_ingreso_actualizacion" src="RECURSOS/logos/actualizacion_proyectos.jpg">
					<legend>Actualización de proyectos de investigación</legend>
				</a>
			</div>
			<?php
		}
		else
		{

		?>
		<div class="volver_intentar">
			<h1 class="titulo_ingreso_actualizacion">
				Usuario y/o contraseña incorrectas<br>
				<i>Intenta nuevamente</i>
			</h1>
			<div class="a_volver">
				<a href="index.php" class="volver">Regresar</a>
			</div>
		</div>


	<?php

		} 

	?>
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> 
			&copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b>
		</p>
	</footer>	

</body>
</html>
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
	include "BD/conexion.php";

	$cod_semillero=$_POST['cod_semillero'];
	$confirmacion_semillero=$_POST['confirmacion_semillero'];
	$confirmacion_redes=$_POST['confirmacion_redes'];
	$nombre=$_POST['nombre'];


	/*integrantes semillero*/

	$lider_semillero=$_POST['lider_semillero'];
	$lider_proyecto=$_POST['lider_proyecto'];
	$num_integrantes=$_POST['num_integrantes'];
	$ingreso_integrante=$_POST['integrante'];


	/*consulta codigos*/

	$consulta_integrantes="SELECT cod_integrante FROM `integrantes`;";

	if (mysqli_multi_query($conexion, $consulta_integrantes)) 
	{
		if ($ejecucion_integrantes= mysqli_store_result($conexion))
		{
			while ($fila_integrante = mysqli_fetch_row($ejecucion_integrantes))
			{
				$cod_integrante=$fila_integrante[0];
			}		
		}
		$cod_integrante=$cod_integrante+1;
	}
	else
	{
		echo "Algo fallo, No fue posible asignar codigo a los semilleristas ingresados";
	}

	/*insertar datos*/


	$insertar_integrantesSemillero = "INSERT INTO `integrantes`(`cod_integrante`, `nombre_integrante`, `cod_tipo`, `cod_semillero`) VALUES ('$cod_integrante','$lider_semillero','1','$cod_semillero');";

	$cod_integrante=$cod_integrante+1;

		if (!$resultado = mysqli_query($conexion, $insertar_integrantesSemillero)) {
			echo "ERROR: FALLO INGRESO DE LIDER DEL SEMILLERO";
			$confirmacion_ingreso_lider=1;
			exit;
		}

	$insertar_integrantesProyecto = "INSERT INTO `integrantes`(`cod_integrante`, `nombre_integrante`, `cod_tipo`, `cod_semillero`) VALUES ('$cod_integrante','$lider_proyecto','2','$cod_semillero');";

	$cod_integrante=$cod_integrante+1;

		if (!$resultado = mysqli_query($conexion, $insertar_integrantesProyecto)) {
			echo "ERROR: FALLO INGRESO DE LIDER DE PROYECTOS";
			$confirmacion_ingreso_proyecto=1;
			exit;
		}

	foreach ($ingreso_integrante as $integrante)
	{
		$insertar_integrantesSemilleristas = "INSERT INTO `integrantes`(`cod_integrante`, `nombre_integrante`, `cod_tipo`, `cod_semillero`) VALUES ('$cod_integrante','$integrante','3','$cod_semillero');";

		$cod_integrante=$cod_integrante+1;

		if (!$resultado = mysqli_query($conexion, $insertar_integrantesSemilleristas)) 
		{
			echo "ERROR: FALLO INGRESO DE INTEGRANTES DEL SEMILLERO";
			$confirmacion_ingreso=1;
			exit;
		}
	}
	

	if ($confirmacion_semillero==1 and $confirmacion_redes==1 and $confirmacion_ingreso_lider==1 and $confirmacion_ingreso_proyecto==1 and $confirmacion_ingreso==1) 
	{
		echo "<h1>Ups!... No se registro la informacion, por favor intentar más tarde</h1>";		
	}
	else
	{
		echo "
		<div id='confirmacion_ingreso_semillero'>
			<h1>Formulario completo</h1>
			<img src='RECURSOS/check.svg' class='confirmacion_ingreso_semillero_logo'>
			<h2>Se ingresaron todos los datos de manera correcta</h2>
			<h3>Ya puede visualizar la informacion del semillero <i>$nombre</i></h3>
			<p>Por favor, diligenciar la informacion de los proyectos desarrollados por el semillero</p>
			<div class='a_volver'>
				<a class='volver' href='ingreso.php'>Volver</a>
			</div>
		</div>";
	}
	?>
	


	<footer id="pie-pagina" lang="es">
		<p class="footer"> 
			&copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b>
		</p>
	</footer>	

</body>
</html>
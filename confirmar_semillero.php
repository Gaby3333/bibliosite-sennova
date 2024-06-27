<?php
include "BD/conexion.php";

$ingreso=$_POST['ingreso'];
$cod_semillero=$_POST['cod_semillero'];

/*Informacion semillero*/
$nombre=$_POST['nombre'];
$año_creacion=$_POST['año_creacion'];
$linea=$_POST['linea'];
$historia=$_POST['historia'];
$objetivo=$_POST['objetivo'];
$mision=$_POST['mision'];
$vision=$_POST['vision'];
$logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));

/*integrantes semillero*/

$lider_semillero=$_POST['lider_semillero'];
$lider_proyecto=$_POST['lider_proyecto'];
$num_integrantes=$_POST['num_integrantes'];

/*redes semillero*/
$whatsapp=$_POST['whatsapp'];
$red2=$_POST['red2'];
$red3=$_POST['red3'];
$red4=$_POST['red4'];
$red5=$_POST['red5'];
$red6=$_POST['red6'];
$red2_enlace=$_POST['red2_enlace'];
$red3_enlace=$_POST['red3_enlace'];
$red4_enlace=$_POST['red4_enlace'];
$red5_enlace=$_POST['red5_enlace'];
$red6_enlace=$_POST['red6_enlace'];



/*insertar datos*/

$insertar="INSERT INTO `semillero`(`cod_semillero`, `nombre`, `año_creacion`, `historia`, `objetivo`, `linea`, `mision`, `vision`, `logo`) VALUES ('$cod_semillero','$nombre','$año_creacion','$historia','$objetivo','$linea','$mision','$vision','$logo');";

if (!$resultado = mysqli_query($conexion, $insertar))
{
	echo "ERROR: FALLO INGRESO DATOS SEMILLERO";
	$confirmacion_semillero=1;
	exit;
}


/*ingreso redes sociales*/

$insertar_redes="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','5','$whatsapp');";

if ($red2_enlace<>null) 
{
	$insertar_redes.="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','$red2','$red2_enlace');";
}

if ($red3_enlace<>null) 
{
	$insertar_redes.="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','$red3','$red3_enlace');";
}

if ($red4_enlace<>null) 
{
	$insertar_redes.="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','$red4','$red4_enlace');";
}

if ($red5_enlace<>null) 
{
	$insertar_redes.="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','$red5','$red5_enlace');";
}

if ($red6_enlace<>null) 
{
	$insertar_redes.="INSERT INTO `redes_semilleros`(`cod_semillero`, `redes_sociales`, `enlace`) VALUES 
	('$cod_semillero','$red6','$red6_enlace');";
}



if (!$resultado = mysqli_multi_query($conexion, $insertar_redes)) {
		echo "ERROR: FALLO INGRESO REDES SOCIALES";
		$confirmacion_redes=1;
		exit;
	}


?>
		

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
		<form action="ingreso_integrantes.php" method="POST">
			<input type="hidden" name="cod_semillero" value="<?php echo $cod_semillero;?>">
			<input type="hidden" name="num_integrantes" value="<?php echo $num_integrantes;?>">
			<input type="hidden" name="confirmacion_semillero" value="<?php echo $confirmacion_semillero;?>">
			<input type="hidden" name="confirmacion_redes" value="<?php echo $confirmacion_redes;?>">
			<input type="hidden" name="nombre" value="<?php echo $nombre;?>">

			<h1 class="titulo_ingreso_actualizacion">
				Ingreso de integrantes del semillero de investigación <i><?php echo $nombre;?></i>
			</h1>
			<p>
				<span class="titulo_ingreso">Lider de semillero:</span>
				<input class="ingreso_texto" type="text" name="lider_semillero" value="<?php echo $lider_semillero;?>" readonly>
			</p>
			<p>
				<span class="titulo_ingreso">Lider de Proyectos:</span>
				<input class="ingreso_texto" type="text" name="lider_proyecto" value="<?php echo $lider_proyecto;?>" readonly>
			</p>
			<span class="titulo_ingreso block">Integrantes:</span>

			<div id="ingreso_semilleristas">
				
				<?php

				$i=1;

				while ($i<=$num_integrantes)
				{
					?>
					<p>
						<?php echo $i;?>. <input class="ingreso_texto" type="text" name="integrante[]" value="">
					</p>					

					<?php
					$i++;
				}
				?>
			</div>
				
		

			<div class="a_volver">
				<input type="submit" name="enviar" class="volver formulario_ingreso">
			</div>

		</form>

	</div>


	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>
</body>
<script src="boton.js"></script>
</html>

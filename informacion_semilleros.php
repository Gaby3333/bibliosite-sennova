<?php
include "BD/conexion.php";

$cod_semillero=$_POST['cod_semillero'];
$contacto="";
$contacto_respaldo="3162847262";
?>

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

		<?php

				$consulta = "SELECT `nombre`, `año_creacion`, `historia`, `objetivo`, `linea`, `mision`, `vision`, `logo` FROM `semillero` WHERE cod_semillero='$cod_semillero';";

				$consulta .= "SELECT `nombre_integrante`, tipo_integrante.tipo FROM `integrantes` INNER JOIN tipo_integrante WHERE cod_semillero='$cod_semillero' and integrantes.cod_tipo = tipo_integrante.cod_tipo;";

				$consulta .= "SELECT `cod_proyecto`, `nombre_proyecto` FROM `proyecto` WHERE cod_semillero= '$cod_semillero';";

				$consulta_redes_sociales = "SELECT * FROM `redes_semilleros` INNER JOIN redes_sociales WHERE cod_semillero ='$cod_semillero' AND redes_sociales.redes_sociales = redes_semilleros.redes_sociales;";

					if (!$ejecucion_redes_sociales = mysqli_query($conexion, $consulta_redes_sociales)) {
						echo "ERROR: FALLO CONSULTA PROYECTOS";
						exit;
					}
					

				if (mysqli_multi_query($conexion, $consulta)) 
				{
					if ($ejecucion= mysqli_store_result($conexion))
						{

							$fila = mysqli_fetch_row($ejecucion);
		?>

			<div id="informacion_semillero">
				
						<div id="ficha">
							<img class="logo_semillero" src="data:image/jpg;base64, <?php echo base64_encode($fila[7]);?>">
							<h3 class="informacion_ficha">Año de creación: <?php echo $fila[1];?></h3>
							<h3 class="informacion_ficha">Linea: <?php echo $fila[4];?></h3>
						</div>

							<h1 class="nombre_semillero"><?php echo $nombre=$fila[0];?>...</h1>
							<div id='redes_sociales'>
								<?php
									while($redes_sociales = mysqli_fetch_row($ejecucion_redes_sociales))
									{
										if($redes_sociales[1]=="1"){

											//facebook

											echo "<a  href='$redes_sociales[2]'>
											<img id='icono_redes' src='RECURSOS/1.png' alt='$redes_sociales[4]'>
											</a>";

										} elseif ($redes_sociales[1]=="2"){

											//instagram

											echo "<a  href='$redes_sociales[2]'>
											<img id='icono_redes' src='RECURSOS/2.png' title='$redes_sociales[4]'>
											</a>";

										} elseif ($redes_sociales[1]=="3"){

											//X

											echo "<a  href='$redes_sociales[2]'>
											<img id='icono_redes' src='RECURSOS/3.png' title='$redes_sociales[4]'>
											</a>";

										} elseif ($redes_sociales[1]=="4"){

											//YouTube

											echo "<a  href='$redes_sociales[2]'>
											<img id='icono_redes' src='RECURSOS/4.png' title='$redes_sociales[4]'>
											</a>";

										} elseif ($redes_sociales[1]=="5"){

											//whatsapp

											$contacto=$redes_sociales[2];

										} elseif ($redes_sociales[1]=="6"){

											//Correo electrónico

											echo "<a  href=#>
											<img id='icono_redes' src='RECURSOS/6.png' title='$redes_sociales[4]: $redes_sociales[2]'>
											</a>";											
										}						
									}		
							

								?>
							</div>

										
							<p>
								<?php echo $fila[2];?>
							</p>
							<h2>Objetivos:</h2>
							<p>
								<?php echo $fila[3];?>
							</p>
							<div class="mision_vision">
								<div class="mision">
									<h2>Misión:</h2>
									<p>
										<?php echo $fila[5];?>
									</p>
								</div>
								<div class="vision">
									<h2>Visión:</h2>
									<p>
										<?php echo $fila[6];?>
									</p>	
								</div>
																
							</div>

			<?php
						mysqli_next_result($conexion);
						}
			?>
			<h2>Integrantes</h2>

				<ol class="integrantes_semillero">
					
			<?php
					if ($ejecucion= mysqli_store_result($conexion))
						{
							if (mysqli_num_rows($ejecucion)==0)
							{
								echo "<p>No registra integrantes actualmente</p>";
							}
							while ($fila = mysqli_fetch_row($ejecucion))
							{
								if ($fila[1]=="Líder de proyecto")
								{
									?>

									<?php echo "<b>",$fila[1],":</b> ",$fila[0];?>

									<?php
								}
								if ($fila[1]=="Semillerista")
								{
									?>
																		
										<li class="semilleristas"><?php echo $fila[0];?></li>
									

									<?php
								}

							}
							mysqli_next_result($conexion);
						}
			?>
				</ol>

			<h2>Proyectos</h2>
			<div class="proyectos">
				<ol class="integrantes_proyectos">
			<?php
						if ($ejecucion= mysqli_store_result($conexion))
						{
							if (mysqli_num_rows($ejecucion)==0)
							{
								echo "<p>No registra proyectos actualmente</p>";
							}

							while ($fila = mysqli_fetch_row($ejecucion))
							{
								?>
								<form class="formulario_proyectos" method="POST" action="informacion_proyectos.php">
									<li>
										<button class="input_proyectos">
											<?php echo $fila[1];?>
										</button>
										
									</li>
									<input type="hidden" name="cod_proyecto" value="<?php echo $fila[0];?>">
									<input type="hidden" name="contacto" value="<?php
									 if ($contacto<>null) {
									 	echo $contacto;
									 }
									 else
									 {
									 	echo $contacto_respaldo;
									 }
									 

									?>">
								</form>					
								<?php
							}
			
						} 
						?>
					</ol>
				</div>
				<?php
				}					
				else 
				{
					echo "error interno";
				}

		?>	
			<div class="a_volver">
				<a class="volver" href="semilleros.php">Volver</a>
			</div>	
		</div>			
	</div>

	<!-- BOTON DE WHATSAPP-->
	<div class="whatsapp">
		<?php
		if ($contacto<>null) 
		{
			?>
			<a href="https://wa.me/<?php echo $contacto;?>?text=Hola, me gustaría obtener más información sobre el semillero: <?php echo $nombre;?> ">
				<img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia sobre el semillero de investigación?, contantate con nosotros">
			</a>
			<?php
			
		}
		else
		{
			?>
			<a href="https://wa.me/<?php echo $contacto_respaldo;?>?text=Hola, me gustaría obtener más información sobre el semillero: <?php echo $nombre;?> ">
				<img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia sobre el semillero de investigación?, contantate con nosotros">
			</a>
			<?php

		}
		?>
			
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>
</body>
<script src="boton.js"></script>
</html>
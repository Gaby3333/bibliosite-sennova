<?php
include "BD/conexion.php";

$cod_proyecto=$_POST['cod_proyecto'];

	if ($_POST['contacto']<>null) 
	{
		$contacto=$_POST['contacto'];
	}
	else
	{
		$contacto=$_POST['contacto_respaldo'];
	}

?>
<!DOCTYPE html>
<html lang="es">
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

		$proyectos= "SELECT * FROM `proyecto` INNER JOIN estado_proyecto,linea_investigacion, linea_programatica WHERE cod_proyecto='$cod_proyecto' AND proyecto.estado = estado_proyecto.estado AND proyecto.linea_programatica = linea_programatica.linea_programatica AND proyecto.linea_investigacion = linea_investigacion.linea_investigacion;";

		
		if (!$resultado = mysqli_query($conexion, $proyectos)) {
			echo "ERROR: FALLO CONSULTA PROYECTOS";
			exit;
		}

		$fila = mysqli_fetch_assoc($resultado);
		?>
		<div id="proyectos">

			<div id="portada">
				<img class="evidencia1" src="data:image/jpg;base64, <?php echo base64_encode($fila['portada']); ?>">
			</div>

			<div id="informacion">
					<img class="evidencia2" src="data:image/jpg;base64, <?php echo base64_encode($fila['portada']); ?>">
					<h2 id="titulo"><?php echo $fila['nombre_proyecto']; ?></h2>

					<ul class="datos_proyecto"> 
						<li><strong>Fecha de inicio: </strong> <?php echo $fila['fecha_inicio']; ?></li>
						<li><strong>Estado: </strong><?php echo $fila['nombre_estado']; ?></li>
						<?php 
						if ($fila['nombre_estado']=="Finalizado") 
						{
						?>
							<li><strong>Fecha de finalización: </strong><?php echo $fila['fecha_fin']; ?></li>
							
						<?php
						}
						?>
						<li><strong>Linea programatica: </strong><?php echo $fila['nombre_programatica']; ?></li>
						<li><strong>Linea de investigación: </strong><?php echo $fila['nombre_investigacion']; ?></li>
					</ul>

				<?php
				if ($fila['resumen']<>null)
				{

				?>
					<h2>Resumen:</h2>
					<p>
						<?php echo $fila['resumen']; ?>
					</p>
				<?php
				}

				?>

				<?php
				if ($fila['obj_general']<>null)
				{
									
				?>
					<h2>Objetivo General:</h2>
					<p>
						<?php echo $fila['obj_general']; ?>
					</p>
				
				<?php
				}

				?>
				
				<?php
				if ($fila['obj_especificos']<>null)
				{
									
				?>
					<h2>Objetivo Especificos:</h2>
					<p>
						<?php echo $fila['obj_especificos']; ?>
					</p>
				<?php
				}

				$eventos = "SELECT * FROM `participaciones` WHERE cod_proyecto=$cod_proyecto;";
				$eventos.= "SELECT * FROM `publicaciones` INNER JOIN tipo_medios_publicacion WHERE publicaciones.cod_proyecto=$cod_proyecto and publicaciones.tipo_medio=tipo_medios_publicacion.tipo_medio;";

				if (mysqli_multi_query($conexion, $eventos))
				{

					if ($participaciones=mysqli_store_result($conexion))
					{
						if (mysqli_num_rows($participaciones)<>0)
						{
							echo "<h2>Eventos</h2>";
						}
				?>
						<div id="participaciones_publicaciones">
							<ul class="lista_pp">								
									<?php
									while ($registro=mysqli_fetch_row($participaciones))
									{
									?>
								<li class="lista_item lista_item--click">
									<div class="nombre_boton nombre_boton--click">
										<h3 class="titulo_evento"><?php echo $registro[1];?></h3>
										<img class="flecha" src="RECURSOS/flecha.svg">
									</div>
									
										<ul class="informacion_pp">
											<li class="datos_pp">
												<?php
													if ($registro[2]<>null)
													{
														echo "<strong>Lugar del evento: </strong>".$registro[2];
													}
													
												?>
											</li>
											<li class="datos_pp">
												<?php
													if ($registro[3]<>"0000-00-00")
													{
														echo "<strong>Fecha: </strong>".$registro[3];
													}
													
												?>
											</li>
											<li class="datos_pp">
												<?php
													if ($registro[4]<>"No aplica")
													{
														echo "<strong>Puntuación: </strong>".$registro[4];
													}
													
												?>
											</li>
											<li class="datos_pp">
												<?php
													if ($registro[5]<>"No aplica")
													{
														echo "<strong>Reconocimiento: </strong>".$registro[5];
													}
													
												?>	
											</li>							
										</ul>
								</li>							
						
						<?php
									}

						?>
						</ul>
					</div>
						<?php

					}
					else
					{
						echo "Error interno";
					}
						mysqli_next_result($conexion);
				?>
				</ul>
				<?php
					if ($participaciones=mysqli_store_result($conexion))
					{
						if (mysqli_num_rows($participaciones)<>0)
						{
							echo "<h2>Publicaciones</h2>";
						}
				?>					
						<div id="participaciones_publicaciones">
							<ul class="lista_pp">								
									<?php
									while ($registro=mysqli_fetch_row($participaciones))
									{
									?>
								<li class="lista_item lista_item--click">
									<div class="nombre_boton nombre_boton--click">
										<h3 class="titulo_evento"><?php echo $registro[1];?></h3>
										<img class="flecha" src="RECURSOS/flecha.svg">
									</div>
									
										<ul class="informacion_pp">
											<li class="datos_pp">
												<strong>Año publicación:</strong>
												<?php echo $registro[2];?>
											</li>
											<li class="datos_pp">
												<strong>Medio:</strong>
												<?php echo $registro[8];?>
											</li>
											<li class="datos_pp">
												<?php
													if ($registro[4]<>0)
													{
														echo "<strong>Categoria: </strong>".$registro[4];
													}
													
												?>
											</li>
											<li class="datos_pp">
												<?php
													if ($registro[5]<>null)
													{
														echo "<strong>Publicación:</strong><a class='link_publicacion' href='".$registro[5]."'> Enlace a artículo</a>";
													}
													
												?>
											</li>										
										</ul>
								</li>							
						
						<?php
									}

						?>
						</ul>
					</div>
						<?php

						
					}
					else
					{
						echo "Error interno";
					}				
				} 
				else
				{
					echo "Error interno";
				}

				?>
					
				<form class="a_volver" method="POST" action="informacion_semilleros.php">
					<input type="submit" value="Volver a semillero" class="volver">
					<input 
						type="hidden" 
						name="cod_semillero" 
						value="<?php echo $fila['cod_semillero']; ?>"
					>				
				</form>
			</div>
			</div>
		</div>

	<!-- BOTON DE WHATSAPP-->
	<div class="whatsapp">
		<a href="https://wa.me/<?php echo $contacto;?>?text=Hola, me gustaría obtener más información sobre el proyecto: <?php echo $fila['nombre_proyecto'];?> ">
			<img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia?, contantate con nosotros">
		</a>	
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
	</footer>

	<script type="text/javascript" src="boton.js"></script>

</body>
</html>
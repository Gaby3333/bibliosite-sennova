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

	<?php

		include "BD/conexion.php";
		session_start();
		$fecha=date('Y', time());

		$consulta="SELECT cod_semillero FROM `semillero`;";

		if (mysqli_multi_query($conexion, $consulta)) 
			{
				if ($ejecucion= mysqli_store_result($conexion))
				{
					while ($fila = mysqli_fetch_row($ejecucion))
					{
						$cod_semillero=$fila[0];
					}		
				}
				$cod_semillero=$cod_semillero+1;
			}
			else
			{
				echo "Algo fallo, No fue posible asignar codigo al semillero de investigación";
			}

	?>

	<div id="contenedor">
		<form id="formulario_ingreso_semillero" method="POST" action="confirmar_semillero.php" enctype="multipart/form-data">
			<h1 class="titulo_ingreso_actualizacion">
				Ingreso de semilleros de investigación del <i>Centro Sur Colombiano de Logística Internacional</i>
			</h1>

			<input type="hidden" name="ingreso" value="1">
			<input type="hidden" name="cod_semillero" value="<?php echo $cod_semillero;?>">
			<div id="datos_principales">

				<p id="ingreso_semillero">
					<span class="titulo_ingreso">Nombre del semillero: </span>
					<input class="ingreso_texto" type="text" name="nombre">
				</p>


				<p>
					<span class="titulo_ingreso">Año de creación: </span>

					<select class="ingreso_select" name="año_creacion">						
						<?php
							$año=2000;
							while ($año<=$fecha)
							{
							?>
								<option value="<?php echo $año;?>"><?php echo $año;?></option>
							<?php
							$año++;
							}							
						?>
					</select>

				</p>

				<p>
					<span class="titulo_ingreso">Línea: </span>
					<input class="ingreso_texto" type="text" name="linea">
				</p>
				<p>
					<span class="titulo_ingreso">Lider de semillero:</span>
					<input class="ingreso_texto" type="text" name="lider_semillero" value="<?php echo $_SESSION['liderSemillero'];?>" disabled>
				</p>
				<p>
					<span class="titulo_ingreso">Lider de Proyectos:</span>
					<input class="ingreso_texto" type="text" name="lider_proyecto">
				</p>
				<p class="">
					<span class="titulo_ingreso">Número de integrantes registrados en el semillero de investigacion:</span>					
					<input type="number" class="ingreso_texto" name="num_integrantes">
				</p>
			</div>
			<div id="datos_secundarios">
				<span class="titulo_ingreso">Historia</span>
				<p>
					<textarea class="ingreso_comentario" name="historia"></textarea>
				</p>
				<span class="titulo_ingreso">Objetivos</span>
				<p>
					<textarea class="ingreso_comentario" name="objetivo"></textarea>
				</p>
				<div class="mision_vision">
					<div class="mision">
						<span class="titulo_ingreso">Mision</span>
						<p>
							<textarea class="ingreso_comentario" name="mision"></textarea>
						</p>
					</div>
					<div class="vision">
						<span class="titulo_ingreso">Vision</span>
						<p>
							<textarea class="ingreso_comentario" name="vision"></textarea>
						</p>
					</div>
				</div>
			</div>
			
			<span class="titulo_ingreso block">Redes sociales</span>

			<div id="ingreso_redes">

				<p>
					<span class="titulo_ingreso">Whatsapp: </span>					 
					<input type="tel" class="ingreso_texto" name="whatsapp" placeholder="0000000000" pattern="[0-9]{10}" autocomplete="off" required>
				</p>

				<?php
				$red=2;
				while ($red<=6)
				{ ?>
				<p>

					<select class="ingreso_select redes" name="red<?php echo $red;?>">
						<option value="1">Facebook</option>
						<option value="2">Instagram</option>
						<option value="3">X (Twitter)</option>
						<option value="4">YouTube</option>
						<option value="6">Correo Electrónico</option>					
					</select>

					<input type="text" class="ingreso_texto" name="red<?php echo $red;?>_enlace">					
				</p>

					<?php

					$red++;			
				}
				?>
			</div>

			<span class="titulo_ingreso block">Logo de semillero</span>

			<div id="cargar_imagen">

				<img id="visualizar_imagen" src="RECURSOS/imagen.svg">			
				<input type="file" accept="image/*" id="ingreso_logo_semillero" name="logo">
			</div>				


			<div class="a_volver">
				<input type="submit" name="enviar" class="volver formulario_ingreso">
			</div>			

		</form>
		
	</div>

	<footer id="pie-pagina" lang="es">
		<p class="footer"> 
			&copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b>
		</p>
	</footer>	
 <script src="previsualizador.js"></script>
</body>
</html>
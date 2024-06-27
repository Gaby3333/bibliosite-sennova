<?php

require 'BD/conexion.php';


$columnas=['proyecto.cod_proyecto','proyecto.nombre_proyecto','estado_proyecto.nombre_estado','linea_programatica.nombre_programatica','linea_investigacion.nombre_investigacion','semillero.nombre'];

$buscador= isset($_POST['buscador']) ? $conexion-> real_escape_string($_POST['buscador']) : null;


/* filtro */

$filtro = '';

if($buscador <> null)
{
	
	$filtro .=" AND (";

	$contador= count($columnas);

	for ($i=0; $i < $contador; $i++) { 
		$filtro .= $columnas[$i] . " LIKE '%". $buscador ."%' OR ";

	}

	$filtro = substr_replace($filtro, "" , -3);
	$filtro .= ")";
}

/*limite */

$limite= isset($_POST['num_registros']) ? $conexion-> real_escape_string($_POST['num_registros']) : 3;

$numero_pagina= isset($_POST['pagina']) ? $conexion-> real_escape_string($_POST['pagina']) : 0;

if (!$numero_pagina)
{
	$inicio=0;
	$numero_pagina=1;
}
else
{
	$inicio=($numero_pagina - 1) * $limite;
}


$pagina= "LIMIT $inicio , $limite";


/*consulta*/

$consulta="SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $columnas)." FROM `proyecto`
			INNER JOIN linea_investigacion, linea_programatica, estado_proyecto,semillero
			WHERE linea_programatica.linea_programatica= proyecto.linea_programatica AND
			linea_investigacion.linea_investigacion=proyecto.linea_programatica AND
			estado_proyecto.estado=proyecto.estado AND
			semillero.cod_semillero=proyecto.cod_semillero $filtro $pagina";


$ejecucion= $conexion-> query($consulta);

$numero_filas = mysqli_num_rows($ejecucion);

/* Consultde datos filtrados para paginación*/

$consulta_pagina= "SELECT FOUND_ROWS()";
$respueta_filtro= $conexion-> query($consulta_pagina);
$fila_pagina= $respueta_filtro->fetch_array();
$paginacion= $fila_pagina[0];

/* Consultde datos filtrados para paginación*/

$pagina_total= "SELECT count('proyecto.cod_proyecto') FROM `proyecto`";
$ejecutar_pagina_total= $conexion-> query($pagina_total);
$fila_pagina_total= $ejecutar_pagina_total->fetch_array();
$paginacion_total= $fila_pagina_total[0];

/*Mostrar resultados*/
$html=[];
$html['paginacion']=$paginacion;
$html['paginacion_total']=$paginacion_total;
$html['data']='';
$html['numero_paginacion']='';

if ($numero_filas > 0)
{
	$item=1;

	while($fila = $ejecucion->fetch_assoc())			
	{
		$html['data'] .='<tr id="fila_proyecto">';
			$html['data'] .='<td id="nombre_proyecto"><label id="th">Nombre del proyecto: </label>'.$fila['nombre_proyecto'].'</td>';
			$html['data'] .='<td id="estado"><label id="th">Estado: </label>'.$fila['nombre_estado'].'</td>';
			$html['data'] .='<td id="nombre_programatica"><label id="th">Línea programatica: </label>'.$fila['nombre_programatica'].'</td>';
			$html['data'] .='<td id="nombre_investigacion"><label id="th">Línea de investigación: </label>'.$fila['nombre_investigacion'].'</td>';
			$html['data'] .='<td id="semillero_tabla"><label id="th">Semillero: </label>'.$fila['nombre'].'</td>';
			$html['data'] .='<td id="buscar_tabla">
				<form method="POST" action="informacion_proyectos.php" class="buscar">
				<label id="th">Buscar: </label>
				<input type="image" class="buscar_imagen" src="RECURSOS/buscar.png">
				<input type="hidden" name="cod_proyecto" value="'.$fila['cod_proyecto'].'">
				<input type="hidden" name="contacto" value="3162847262">
				</form>	
			</td>';
		$html['data'] .='</tr>';
	}
}
else
{
	$html['data'].='<tr>';
		$html['data'].='<td colspan="6">Sin resultados</td>';
	$html['data'].='</tr>';
}

if ($html['paginacion_total']>0)
{
	$division_paginas= ceil($html['paginacion_total'] / $limite);

	$html['numero_paginacion'] .= '<nav>';
		$html['numero_paginacion'] .= '<ul class="ul_paginacion">';

		$numero_inicio=1;

		if (($numero_pagina - 4)>1)
		{
			$numero_inicio=$numero_pagina - 4;
		}

		$numero_fin= $numero_inicio + 9;

		if ($numero_fin > $division_paginas)
		{
			$numero_fin=$division_paginas;
		}

		for ($i=$numero_inicio; $i <= $numero_fin; $i++)
		{
			if ($numero_pagina == $i)
			{
				$html['numero_paginacion'] .= '<li class="li_paginacion"><a class="item" href="#">'.$i.'</a></li>';
			}
			else
			{
				$html['numero_paginacion'] .= '<li class="li_paginacion"><a class="item" href="#" onclick="getData('.$i.')">'.$i.'</a></li>';
			}
				
		}

		$html['numero_paginacion'] .= '</ul>';
	$html['numero_paginacion'] .= '</nav>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>
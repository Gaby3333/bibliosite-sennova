<?php
	$servidor= "localhost";
	$usuario= "root";
	$clave= "";
	$basedatos= "bibliosite_sennova";

	$conexion= mysqli_connect($servidor, $usuario, $clave, $basedatos);
		if (!$conexion)
		{
		    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
		}
?>
<?php

	define("cServidor", "localhost");
	define("cUsuario", "root");
	define("cPass","");
	define("cBd","aplicaci_rmd");

	$conexion = mysqli_connect(cServidor, cUsuario, cPass, cBd);
    
    $consulta = "SELECT cliente_rut, cliente_nombre, cliente_activo, cliente_zona FROM rmd_cliente";
	$registro = mysqli_query($conexion, $consulta);

	//guardamos en un array multidimensional todos los datos de la consulta
	$i=0;
	$tabla = "";
	
	while($row = mysqli_fetch_array($registro))
	{
		$tabla.='{"Rut Cliente":"'.$row['cliente_rut'].'","Nombre Cliente":"'.$row['cliente_nombre'].'","Cliente Activo":"'.$row['cliente_activo'].'","Zona Cliente":"'.$row['cliente_zona'].'"},';		
		$i++;
	}
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
	
?>
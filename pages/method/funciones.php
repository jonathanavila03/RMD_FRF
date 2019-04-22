<?php

	define("cServidor", "localhost");
	define("cUsuario", "root");
	define("cPass","");
	define("cBd","aplicaci_rmd");

	$conexion = mysqli_connect(cServidor, cUsuario, cPass, cBd);
    
    $consulta = "SELECT proyecto_cliente, proyecto_fechaI, proyecto_fechaPD, proyecto_duracion, proyecto_estado, proyecto_vendedor FROM rmd_proyecto";
	$registro = mysqli_query($conexion, $consulta);

	//guardamos en un array multidimensional todos los datos de la consulta
	$i=0;
	$tabla = "";
	
	while($row = mysqli_fetch_array($registro))
	{
		$tabla.='{"proyecto_cliente":"'.$row['proyecto_cliente'].'","proyecto_fechaI":"'.$row['proyecto_fechaI'].'","proyecto_fechaPD":"'.$row['proyecto_fechaPD'].'","proyecto_duracion":"'.$row['proyecto_duracion'].'","proyecto_estado":"'.$row['proyecto_estado'].'","proyecto_vendedor":"'.$row['proyecto_vendedor'].'"},';		
		$i++;
	}
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
	
?>
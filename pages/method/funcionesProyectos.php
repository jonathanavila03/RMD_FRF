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
		$tabla.='{"Cliente":"'.$row['proyecto_cliente'].'","Fecha Ingreso":"'.$row['proyecto_fechaI'].'","Fecha PD":"'.$row['proyecto_fechaPD'].'","Duración":"'.$row['proyecto_duracion'].'","Estado":"'.$row['proyecto_estado'].'","Vendedor":"'.$row['proyecto_vendedor'].'"},';		
		$i++;
	}
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
	
?>
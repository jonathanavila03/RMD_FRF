<?php

require 'database.php';

$subs_obra = utf8_decode($_POST['id']);
$subs_name = utf8_decode($_POST['nombre_obra']);

$resultado=mysqli_query($conn, "SELECT * FROM  rmd_obra WHERE obra_id = '$subs_obra'");

if (mysqli_num_rows($resultado)>0)
{
echo "Proyecto Existe, favor intentar nuevamente";

} else {
    
$insert_value = "insert into rmd_obra values ('$subs_obra', '$subs_name')";

$retry_value = mysqli_query($conn, $insert_value);

echo "<script> alert('Obra Creada Correctamente'); location.href='/pages/crea-obra.php' </script>";

if (!$retry_value) {
   die('Error: ' . mysqli_error());
}
	
}
		
?>

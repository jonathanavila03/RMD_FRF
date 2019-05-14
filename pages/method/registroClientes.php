<?php
   include_once "database.php";

    $rut_in = $_POST['rut_in'];
if($rut_in != '')
   {   
    $name_cli_in  = $_POST['name_cli_in'];
    $activo= $_POST['activo'];
    $zona  = $_POST['zona'];

    if ($activo == 'on')
    {
        $activo = '1';
    }else
    {
        $activo = '0';
    }


$resultado=mysqli_query($conn, "SELECT * FROM  rmd_cliente WHERE cliente_rut = '$rut_in'");

if (mysqli_num_rows($resultado)>0)
{
    echo "<script> alert('Cliente Existe, favor intente nuevamente'); location.href='/pages/crea-clientes.php' </script>";

} else {
    
$insert_value = "CALL registroCliente('$rut_in','$name_cli_in','$activo','$zona');";

$retry_value = mysqli_query($conn, $insert_value);

echo "<script> alert('Cliente creado correctamente'); location.href='/pages/crea-clientes.php' </script>";

if (!$retry_value) {
   die('Error: ' . mysqli_error());
}
	
}
}
else
{
    echo "<script> alert('Favor ingresar todos los campos'); location.href='/pages/crea-clientes.php' </script>";

}

?>
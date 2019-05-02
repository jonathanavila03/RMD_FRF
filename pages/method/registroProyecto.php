<?php
   include_once "database.php";
    $id_proyecto= $_POST['id_proyecto'];
    $producto = $_POST['producto'];
    $m2 = $_POST['m2'];
    $costo = $_POST['costo'];
    $tiempo = $_POST['tiempo'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $total = $_POST['total'];

    $query = '';
    for($count = 0; $count<count($total); $count++)
    {
     $id_proyecto_clean = mysqli_real_escape_string($conn, $id_proyecto[$count]);
     $producto_clean = mysqli_real_escape_string($conn, $producto[$count]);
     $m2_clean = mysqli_real_escape_string($conn, $m2[$count]);
     $costo_clean = mysqli_real_escape_string($conn, $costo[$count]);
     $tiempo_clean = mysqli_real_escape_string($conn, $tiempo[$count]);
     $fecha_entrega_clean = mysqli_real_escape_string($conn, $fecha_entrega[$count]);
     $fecha_devolucion_clean = mysqli_real_escape_string($conn, $fecha_devolucion[$count]);
     $total_clean = mysqli_real_escape_string($conn, $total[$count]);
     if($id_proyecto_clean != '' && $total_clean != '' )
     {
        $date1 = str_replace('/', '-', $fecha_entrega_clean );
        $newDate1 = date("Y-m-d", strtotime($date1));
    
        $date2 = str_replace('/', '-', $fecha_devolucion_clean );
        $newDate2 = date("Y-m-d", strtotime($date2));

      $query .= "CALL insertaDetalle('$id_proyecto_clean','$producto_clean', $m2_clean, $costo_clean, $tiempo_clean, '$newDate1', '$newDate2', $total_clean); ";
     }
    }
    if($query != '')
    {
     if(mysqli_multi_query($conn, $query))
     {
      echo 'Proyecto Insertado Correctamente';
      echo $query;
     }
     else
     {
      echo 'Error';
     }
    }

?>
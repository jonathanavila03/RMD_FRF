<?php
   include_once "database.php";

    $producto = $_POST['producto'];
    $m2 = $_POST['m2'];
    $costo = $_POST['costo'];
    $tiempo = $_POST['tiempo'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $total = $_POST['total'];

    $fecha_entrega1 = date_format($fecha_entrega, 'Y-m-d');
    $fecha_devolucion1 = date_format($fecha_devolucion, 'Y-m-d');

    $sql = "CALL InsertaDetalle('$producto', $m2, $costo, $tiempo, '$fecha_entrega1', '$fecha_devolucion2', $total); ";
    if (mysqli_query($conn, $sql)) {
            // header('Location: ../loans.php?registrationstatus=true');
        echo "Si registro";
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "No registro";
    }

?>
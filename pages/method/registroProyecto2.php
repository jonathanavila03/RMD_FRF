<?php
   include_once "database.php";

    $id_proyecto= $_POST['id_proyecto'];
    $obra  = $_POST['obra'];
    $cliente = $_POST['cliente'];
    $estado = $_POST['estado'];
    $fecha_entrega = $_POST['fecha_entrega1'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_primer = $_POST['fecha_primer'];
    $duracion = $_POST['duracion'];
    $tipo = $_POST['tipo'];
    $vendedor = $_POST['vendedor'];
    $nombre_proyecto = $_POST['nombre_proyecto'];

    $date1 = str_replace('/', '-', $fecha_entrega );
    $newDate1 = date("Y-m-d", strtotime($date1));

    $date2 = str_replace('/', '-', $fecha_ingreso );
    $newDate2 = date("Y-m-d", strtotime($date2));

    $date3 = str_replace('/', '-', $fecha_primer );
    $newDate3 = date("Y-m-d", strtotime($date3));





    $sql = "CALL InsertarEncabezado($id_proyecto, '$obra', '$cliente', '$estado', '$newDate1', '$newDate2', '$newDate3', $duracion, '$tipo', '$vendedor','$nombre_proyecto'); ";
    if (mysqli_query($conn, $sql)) {
            // header('Location: ../loans.php?registrationstatus=true');
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "No registro encabezado";
    }

?>
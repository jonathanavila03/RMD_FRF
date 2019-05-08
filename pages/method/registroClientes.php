<?php
   include_once "database.php";

    $rut = $_POST['rut'];
    $nombre  = $_POST['nombre'];
    $activo= $_POST['activo'];
    $zona  = $_POST['zona'];


    $sql = "CALL registroCliente('$rut','$nombre','$activo','$zona')";
    if (mysqli_query($conn, $sql)) {

        echo "Cliente registrado exitosamente!";
            // header('Location: ../loans.php?registrationstatus=true');
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "Error";

    }

?>
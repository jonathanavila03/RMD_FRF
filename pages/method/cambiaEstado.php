<?php
   include_once "database.php";

    $idpro= $_POST['idpro'];
    $estadopro  = $_POST['estadopro'];


    $sql = "UPDATE rmd_proyecto SET proyecto_estado = $estadopro WHERE proyecto_id = $idpro";
    if (mysqli_query($conn, $sql)) {
            // header('Location: ../loans.php?registrationstatus=true');
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "No registro encabezado";
        echo $sql;
    }

?>
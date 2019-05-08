<?php
if(!empty($_GET['id'])){
    
    require 'database.php';
  

    $query = "SELECT proyecto_nombre, proyecto_id FROM rmd_proyecto WHERE id = {$_GET['id']}";
    
        $cmsData = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($cmsData);
        echo '<h4>'.$row[0].'</h4>';
        echo '<p>'.$row[0].'</p>';

}
?>
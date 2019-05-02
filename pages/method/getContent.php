<?php
if(!empty($_GET['id'])){
    
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'aplicaci_rmd';
    
    
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("No se puede conectar a la BD: " . $db->connect_error);
    }
  

    $query = $db->query("SELECT * FROM rmd_proyecto WHERE id = {$_GET['id']}");
    
    if($query->num_rows > 0){
        $cmsData = $query->fetch_assoc();
        echo '<h4>'.$cmsData['title'].'</h4>';
        echo '<p>'.$cmsData['content'].'</p>';
    }else{
        echo 'Contenido no encontrado....';
    }
}else{
    echo 'Contenido no encontrado....';
}
?>
<?php
require_once __DIR__ . '/../../../config.php'; 
include BASE_DIR . '/includes/db.php';

 $municipio=$_POST['municipio'];
 $querys = "SELECT * FROM localidades WHERE municipio_id='$municipio'";
 $searchs = mysqli_query($db,$querys); 
 echo '<option value="0">Selecciona una opción... </option>';
 while ($valores = mysqli_fetch_array($searchs)) {
    echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
 } 

?>
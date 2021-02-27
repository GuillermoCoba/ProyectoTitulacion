<?php
require_once __DIR__ . '/../../../config.php'; 
include BASE_DIR . '/includes/db.php';


$estado=$_POST['estado'];
$query = "SELECT * FROM municipios WHERE estado_id='$estado'";
$search = mysqli_query($db,$query); 

echo '<option value="0">Selecciona una opción... </option>';
 while ($valores = mysqli_fetch_array($search)) {
    echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
 } 




?>
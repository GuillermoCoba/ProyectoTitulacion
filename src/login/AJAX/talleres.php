<?php
require_once __DIR__ . '/../../../config.php'; 
include BASE_DIR . '/includes/db.php';

 $tipotaller=$_POST['tipotaller'];
 $estado = $_POST['estado'];
 $localidad=$_POST['localidad'];
 $municipio = $_POST['municipio'];
 $querys = "SELECT * FROM talleres AS T
 INNER JOIN usuarios AS U ON U.id_empresa = T.id_empresa 
 WHERE T.id_tipo_taller='$tipotaller' AND T.id_estado = '$estado' AND T.id_municipio = '$municipio' AND T.id_localidad = '$localidad' AND U.activa = '1'   ";
 $searchs = mysqli_query($db,$querys); 
 echo '<option value="0">Selecciona una opción... </option>';
 while ($valores = mysqli_fetch_array($searchs)) {
    echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
 } 

?>
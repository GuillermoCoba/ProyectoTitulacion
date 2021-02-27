<?php
session_start();
date_default_timezone_set('America/Mexico_City');
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
$De = $_POST['de'];
$Para = $_POST['para'];
$Mensaje = $_POST['mensaje'];
$Fecha = date("Y-m-d H:i:s");

$insertar = "INSERT into chat (id_usuario_envia,id_usuario_recibe,mensaje,fecha,activo) values ('$De','$Para','$Mensaje','$Fecha',1)";        
mysqli_query($db,$insertar)
        or die ("ERROR AL CONECTAR");
        mysqli_close($db);
        
?>
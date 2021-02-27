<?php 
function user(){
require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/db.php';
    $ID = $_COOKIE['ID'];
$query = "SELECT S.id_servicio,T.nombre_taller AS Taller,S.fecha,S.hora,S.descripcion, S.codigo, 
          IF(S.status=0, 'En proceso',IF(S.status=1,'Cancelado','Terminado')) AS Status
          FROM servicios AS S 
          INNER JOIN talleres AS T ON T.id_empresa = S.id_taller
          WHERE id_usuario = '$ID'";
$search = mysqli_query($db,$query); 
$queryS = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID'";
$searchS = mysqli_query($db,$queryS);
$rowS = mysqli_fetch_array($searchS);
$querySC = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '2'";
$searchSC = mysqli_query($db,$querySC);
$rowSC = mysqli_fetch_array($searchSC);
$querySCA = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '1'";
$searchSCA = mysqli_query($db,$querySCA);
$rowSCA = mysqli_fetch_array($searchSCA);
$querySP = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '0'";
$searchSP = mysqli_query($db,$querySP);
$rowSP = mysqli_fetch_array($searchSP);
}

function taller(){
require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/db.php';
    $ID = $_COOKIE['ID'];
$querys = "SELECT * FROM usuarios WHERE id_usuario='$ID'";
$searchs = mysqli_query($db,$querys); 
while ($valoress = mysqli_fetch_array($searchs)) {
$Taller = $valoress[1]; 
$query = "SELECT S.id_servicio, CONCAT(U.nombre_usuario,' ',U.apellidos_usuario) AS Cliente,S.fecha,S.hora,S.descripcion, S.codigo, 
        IF(S.status=0, 'En proceso',IF(S.status=1,'Cancelado','Terminado')) AS Status
        FROM servicios AS S 
        INNER JOIN usuarios AS U ON U.id_usuario = S.id_usuario
        WHERE id_taller = '$Taller'";
$search = mysqli_query($db,$query); 

$queryS = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller'";
$searchS = mysqli_query($db,$queryS);
$rowS = mysqli_fetch_array($searchS);
$querySC = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '2'";
$searchSC = mysqli_query($db,$querySC);
$rowSC = mysqli_fetch_array($searchSC);
$querySCA = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '1'";
$searchSCA = mysqli_query($db,$querySCA);
$rowSCA = mysqli_fetch_array($searchSCA);
$querySP = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '0'";
$searchSP = mysqli_query($db,$querySP);
$rowSP = mysqli_fetch_array($searchSP);}
}
?>
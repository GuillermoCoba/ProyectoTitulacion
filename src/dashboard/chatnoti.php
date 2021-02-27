<?php require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$query = "SELECT * FROM usuarios  WHERE id_usuario = '$ID' ";
$search = mysqli_query($db,$query); 
 while ($valores = mysqli_fetch_array($search)) {
   $Taller = $valores[1];
 }
$queryS = "SELECT COUNT(*) FROM chat WHERE id_usuario_recibe = '$Taller' AND activo = 1";
$searchS = mysqli_query($db,$queryS);
$rowS = mysqli_fetch_array($searchS);
$output="";
$output.=(($rowS[0]>0)?'<span style="height: 25px;width: 25px;background-color: red;border-radius: 50%;
display: inline-block;text-align: -webkit-center;color:white">'.$rowS[0].' 
</span>':"");
echo $output;
?>
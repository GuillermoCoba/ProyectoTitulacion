<?php require_once __DIR__ . '/../config.php'; 
$title = 'Mapa';
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/geocoding.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
$Nombres = array();
$lngs = array();
$lats = array();
$Calles = array();
$CPS = array();
$Colonias = array();
$Delegaciones = array();

$queryCOUNTS = "SELECT COUNT(*) FROM direccion_usuario WHERE id_usuario = '$ID'";
$searchCOUNTS = mysqli_query($db,$queryCOUNTS);
$rowCOUNTS = mysqli_fetch_array($searchCOUNTS);
if($rowCOUNTS[0]>0)
{
$query = "SELECT * FROM direccion_usuario AS D INNER JOIN municipios AS M ON M.id = D.id_municipio WHERE id_usuario = '$ID' ";
$search = mysqli_query($db,$query); 
 while ($valores = mysqli_fetch_array($search)) {
   $IdMun = $valores[4];
   $Calle = $valores[6];
   $CP = $valores[7];
   $Colonia = $valores[8];
   $Delegacion = $valores[12];
 }
$geo = new Geocoding("AIzaSyCsLQ-jYaXy626uxqnFtyqK9HhPVk8lvxs");
$address = $geo->getCoordinates(''.$Calle.','.$Colonia.','.$Delegacion.','.$CP.' Ciudad de México');

$queryCOUNT = "SELECT COUNT(*) FROM talleres WHERE id_municipio = '$IdMun'";
$searchCOUNT = mysqli_query($db,$queryCOUNT);
$rowCOUNT = mysqli_fetch_array($searchCOUNT);

$queryT = "SELECT * FROM talleres AS D INNER JOIN municipios AS M ON M.id = D.id_municipio WHERE id_municipio = '$IdMun' ";
$searchT = mysqli_query($db,$queryT); 
 while ($valoresT = mysqli_fetch_array($searchT)) {
   $Nombre = $valoresT[1];
   array_push($Nombres, $Nombre);
   $IdMun = $valoresT[5];
   $CalleT = $valoresT[7];
   array_push($Calles, $CalleT);
   $CPT = $valoresT[8];
   array_push($CPS, $CPT);
   $ColoniaT = $valoresT[9];
   array_push($Colonias, $ColoniaT);
   $DelegacionT = $valoresT[15];
   array_push($Delegaciones, $DelegacionT);
   $addressT = $geo->getCoordinates(''.$CalleT.','.$ColoniaT.','.$DelegacionT.','.$CPT.' Ciudad de México');
   array_push($lngs, $addressT['latitude']);
   array_push($lats, $addressT['longitude']);
 }
}
?>  
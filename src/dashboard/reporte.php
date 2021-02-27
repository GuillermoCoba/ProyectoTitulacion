<?php

require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$anio = $_POST['valor'];

$querys = "SELECT * FROM usuarios WHERE id_usuario='$ID'";
$searchs = mysqli_query($db,$querys); 
while ($valoress = mysqli_fetch_array($searchs)) {
$Taller = $valoress[1]; 
}
$queryA = "SELECT SUM(CASE WHEN ((YEAR(fecha) = '$anio' AND status = 2) AND id_taller='$Taller') THEN 1 ELSE 0 END) AS Completados,
SUM(CASE WHEN ((YEAR(fecha) = '$anio' AND status = 1) AND id_taller='$Taller') THEN 1 ELSE 0 END) AS Cancelados,
SUM(CASE WHEN ((YEAR(fecha) = '$anio' AND status = 0) AND id_taller='$Taller') THEN 1 ELSE 0 END) AS Procesados
FROM servicios";
$searchA = mysqli_query($db,$queryA); 
while ($valoreA = mysqli_fetch_array($searchA)) {
$Completados = $valoreA[0]; 
$Cancelados = $valoreA[1]; 
$Procesados = $valoreA[2]; 
}
echo $Completados;
echo $Cancelados;
echo $Procesados;
$queryM = "SELECT SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=01 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleENE,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=01 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanENE,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=01 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProENE,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=02 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleFEB,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=02 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanFEB,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=02 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProFEB,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=03 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleMAR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=03 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanMAR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=03 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProMAR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=04 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleABR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=04 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanABR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=04 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProABR,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=05 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleMAY,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=05 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanMAY,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=05 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProMAY,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=06 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleJUN,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=06 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanJUN,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=06 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProJUN,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=07 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleJUL,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=07 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanJUL,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=07 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProJUL,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=08 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleAGO,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=08 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanAGO,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=08 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProAGO,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=09 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleSEP,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=09 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanSEP,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=09 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProSEP,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=10 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleOCT,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=10 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanOCT,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=10 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProOCT,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=11 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleNOV,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=11 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanNOV,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=11 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProNOV,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 2 AND MONTH(fecha)=12 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CompleDIC,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 1 AND MONTH(fecha)=12 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS CanDIC,
SUM(CASE WHEN YEAR(fecha) = '$anio' AND status = 0 AND MONTH(fecha)=12 AND id_taller='$Taller' THEN 1 ELSE 0 END) AS ProDIC
FROM servicios";
$searchM = mysqli_query($db,$queryM); 
while ($valoreM = mysqli_fetch_array($searchM)) {
    $ComEne = $valoreM[0];
    $CanEne = $valoreM[1];
    $ProEne = $valoreM[2];
    $ComFeb = $valoreM[3];
    $CanFeb = $valoreM[4];
    $ProFeb = $valoreM[5];
    $ComMar = $valoreM[6];
    $CanMar = $valoreM[7];
    $ProMar = $valoreM[8];
    $ComAbr = $valoreM[9];
    $CanAbr = $valoreM[10];
    $ProAbr = $valoreM[11];
    $ComMay = $valoreM[12];
    $CanMay = $valoreM[13];
    $ProMay = $valoreM[14];
    $ComJun = $valoreM[15];
    $CanJun = $valoreM[16];
    $ProJun = $valoreM[17];
    $ComJul = $valoreM[18];
    $CanJul = $valoreM[19];
    $ProJul = $valoreM[20];
    $ComAgo = $valoreM[21];
    $CanAgo = $valoreM[22];
    $ProAgo = $valoreM[23];
    $ComSep = $valoreM[24];
    $CanSep = $valoreM[25];
    $ProSep = $valoreM[26];
    $ComOct = $valoreM[27];
    $CanOct = $valoreM[28];
    $ProOct = $valoreM[29];
    $ComNov = $valoreM[30];
    $CanNov = $valoreM[31];
    $ProNov = $valoreM[32];
    $ComDic = $valoreM[33];
    $CanDic = $valoreM[34];
    $ProDic = $valoreM[35];
}

echo $ComEne;
echo $CanEne;
echo $ProEne;
echo $ComFeb;
echo $CanFeb;
echo $ProFeb;
echo $ComMar;
echo $CanMar;
echo $ProMar;
echo $ComAbr;
echo $CanAbr;
echo $ProAbr;
echo $ComMay;
echo $CanMay;
echo $ProMay;
echo $ComJun;
echo $CanJun;
echo $ProJun;
echo $ComJul;
echo $CanJul;
echo $ProJul;
echo $ComAgo;
echo $CanAgo;
echo $ProAgo;
echo $ComSep;
echo $CanSep;
echo $ProSep;
echo $ComOct;
echo $CanOct;
echo $ProOct;
echo $ComNov;
echo $CanNov;
echo $ProNov;
echo $ComDic;
echo $CanDic;
echo $ProDic;

?>
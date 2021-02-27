<?php
session_start();
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
if($Nivel == 'adminempresa'){
    $NomTaller = $_POST['nomtaller'];
    $Tipo = $_POST['tipotaller'];
}
$Telefono = $_POST['telefono'];
$Municipio = $_POST['municipio'];
$Estado = $_POST['estado'];
$Calle = $_POST['calle'];
$Localidad = $_POST['localidad'];
$Colonia= $_POST['colonia'];
$CP = $_POST['CP'];

if($Nivel != 'adminempresa'){
$querys = "SELECT * FROM direccion_usuario WHERE id_usuario= $ID";
$searchs = mysqli_query($db,$querys); 
$match  = mysqli_num_rows($searchs);
    if($match > 0){
        $update = "UPDATE direccion_usuario SET id_usuario='$ID',telefono='$Telefono',id_estado='$Estado',id_municipio='$Municipio',id_localidad='$Localidad',calle='$Calle',cp='$CP',colonia='$Colonia' WHERE id_usuario='$ID'";
        mysqli_query($db,$update)
        or die ("ERROR AL CONECTAR");
        mysqli_close($db);
    }else{
        $insertar = "INSERT into direccion_usuario (id_usuario,telefono,id_estado,id_municipio,id_localidad,calle,cp,colonia) values ('$ID','$Telefono','$Estado','$Municipio', '$Localidad','$Calle','$CP','$Colonia')";
        mysqli_query($db,$insertar)
        or die ("ERROR AL CONECTAR");
        mysqli_close($db);
    }
}else{
    $query = "SELECT * FROM usuarios WHERE id_usuario='$ID'";
    $search = mysqli_query($db,$query); 
    while ($valores = mysqli_fetch_array($search)) {
    $Taller = $valores[1];  
 } 
    $querys = "SELECT * FROM talleres WHERE id_empresa= $Taller";
    $searchs = mysqli_query($db,$querys); 
    $match  = mysqli_num_rows($searchs);
        if($match > 0){
            $update = "UPDATE talleres SET nombre_taller='$NomTaller',id_tipo_taller='$Tipo',mob='$Telefono',id_estado='$Estado',id_municipio='$Municipio',id_localidad='$Localidad',calle='$Calle',cp='$CP',colonia='$Colonia' WHERE id_empresa= '$Taller'";
            mysqli_query($db,$update)
            or die ("ERROR AL CONECTAR");
            mysqli_close($db);
        }
}

?> 
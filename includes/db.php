<?php
// Conexión LOCAL
/*$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'automotriz';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);*/
//CONEXION SERVER
$servidor = 'localhost';
$usuario = 'id15895395_proyectoautomotriz2020';
$password = 'Upiics@20202';
$basededatos = 'id15895395_automotriz';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);
// Iniciar la sesión
if($db){
}else{
}
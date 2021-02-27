<?php
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
session_start();
if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['pw']) && !empty($_POST['pw'])){
    $email = $_POST['email']; // Set variable for the username
    $password = md5($_POST['pw']); // Set variable for the password and convert it to an MD5 hash.
    $q = "SELECT * FROM usuarios WHERE email_usuario='$email' AND password_usuario='$password' AND activa=1";
    $search = mysqli_query($db,$q);
    $valores = mysqli_fetch_array($search);  
    $match  = mysqli_num_rows($search);
    if($match > 0){
        $_SESSION["logeado"] = true;
        if(isset($_POST['remember-me']) && !empty($_POST['remember-me'])){
            setcookie('ID', $valores[0] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('reloginID', 'recordar', time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Nombre', $valores[2] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Apellidos', $valores[3] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Correo', $valores[4] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Password', $valores[5] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Nivel', $valores[7] , time() + (10 * 365 * 24 * 60 * 60), '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            }else
            {
            setcookie('ID', $valores[0] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('reloginID', 'recordar', time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Nombre', $valores[2] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Apellidos', $valores[3] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Correo', $valores[4] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Password', $valores[5] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            setcookie('Nivel', $valores[7] , time()+60*60, '/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
            }
            echo"<script language='javascript'>
            window.location='https://proyectoautomotriz20202.000webhostapp.com/Dashboard'
            </script>;";
        }else{
        echo"<script language='javascript'>
        alert('Correo y/o password incorrectos');
        window.location='https://proyectoautomotriz20202.000webhostapp.com/Login'
        </script>";
        exit();?>
<?php    
}
}

?>
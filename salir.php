<?php
session_start();
if (isset($_COOKIE['reloginID'])&& isset($_SESSION['logeado'])) { 
    unset($_COOKIE['reloginID']); 
    setcookie('reloginID', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
    unset($_COOKIE['Nombre']); 
    setcookie('Nombre', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
    unset($_COOKIE['Apellidos']); 
    setcookie('Apellidos', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
    unset($_COOKIE['Correo']); 
    setcookie('Correo', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
    unset($_COOKIE['Password']); 
    setcookie('Password', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
    unset($_COOKIE['Nivel']); 
    setcookie('Nivel', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
session_destroy();
echo"<script language='javascript'>
window.location='https://proyectoautomotriz20202.000webhostapp.com/'
</script>;";
}else{
    echo"<script language='javascript'>
    window.location='https://proyectoautomotriz20202.000webhostapp.com/'
    </script>;";  
}
?>
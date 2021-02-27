<?php
session_start();
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/sendmail.php';
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email']; // Set variable for the username
    $q = "SELECT * FROM usuarios WHERE email_usuario='$email' AND activa=1";
    $search = mysqli_query($db,$q);
    $valores = mysqli_fetch_array($search);  
    $match  = mysqli_num_rows($search);
    $_SESSION["email"] = $_POST['email'];
    if($match > 0){
        $mail_username="proyectoautomotriz2020@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
        $mail_userpassword="proyecto2020";//Tu contraseña de gmail
        $mail_addAddress=$email;//correo electronico que recibira el mensaje
        $template="../../views/login/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
        
        /*Inicio captura de datos enviados por $_POST para enviar el correo */
        $mail_setFromEmail = $_POST['email'];
        $mail_setFromName = "Automotriz";            
        $mail_subject = 'Recuperacion'; // Give the email a subject 
        $txt_message = '
        
Se ha solicitado una recuperación de contraseña de tu cuenta,
<br>Por favor sigue el siguiente link para la recuperación de tu contraseña:
<a style=" display: block;
width: 120px;
height: 25px;
background: #3498db;
padding: 10px;
text-align: center;
border-radius: 5px;
color: white;
font-weight: bold;
line-height: 25px;" href="https://proyectoautomotriz20202.000webhostapp.com/Cambiar" class="btn btn-success">Recuperar</a>'; // Our message above including the link
        sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
    }else{
        echo 1;
    }
}
?> 
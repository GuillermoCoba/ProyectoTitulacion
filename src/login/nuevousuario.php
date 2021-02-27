<?php
session_start();
$activa = !empty($_SESSION["activo"]);
$insert = !empty($_SESSION["insert"]);
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/sendmail.php';

if($activa=="si" && $insert =="si"){
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$pwe = $_POST['pw'];
$hash = md5( rand(0,1000) ); 
$pw= md5($pwe);
$fecha = date('Y-m-d H:i:s');

$insertar = "INSERT into usuarios (id_empresa,nombre_usuario,apellidos_usuario,email_usuario,password_usuario,hash,tipo_usuario,fecha_registro,activa) values (0,'$nombre','$apellidos','$email', '$pw','$hash','cliente','$fecha',0)";
$resultado = mysqli_query($db,$insertar)
or die ("ERROR AL CONECTAR");
mysqli_close($db);
if($resultado){
				/*Configuracion de variables para enviar el correo*/
				$mail_username="proyectoautomotriz2020@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="proyecto2020";//Tu contraseña de gmail
				$mail_addAddress=$email;//correo electronico que recibira el mensaje
				$template="../../views/login/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
				$mail_setFromEmail = $_POST['email'];
				$mail_setFromName = "Automotriz";            
                $mail_subject = 'Registro | Verificacion'; // Give the email a subject 
                $txt_message = '
 ¡Gracias por Registrarte! Tu cuenta ha sido creada, a continuacion se muestran tus credenciales de acceso: Usuario: '.$email.'<br> Contraseña: '.$pwe.'
<br>Por favor sigue el siguiente link para verificar tu correo:
	<a style=" display: block;
width: 120px;
height: 25px;
background: #3498db;
padding: 10px;
text-align: center;
border-radius: 5px;
color: white;
font-weight: bold;
line-height: 25px;" href="https://proyectoautomotriz20202.000webhostapp.com/verify.php?email='.$email.'&hash='.$hash.'" class="btn btn-success">Validar</a>'; // Our message above including the link
				$_SESSION["insert"] ="";
				$_SESSION["correo"] ="si";
				sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
				echo"<script language='javascript'>window.location='https://proyectoautomotriz20202.000webhostapp.com/Exito'</script>;";
                exit();
			}
		}else{
			echo 'error';
		}
?> 
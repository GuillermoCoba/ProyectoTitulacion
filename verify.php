<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['logeado']))
{
require_once __DIR__ . '/config.php'; 
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/header.php';
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    $q = "SELECT email_usuario, hash, activa FROM usuarios WHERE email_usuario= '$email' AND hash='$hash' AND activa= 0";
    $search = mysqli_query($db,$q); 
    $match  = mysqli_num_rows($search);
if($match > 0){
    // We have a match, activate the account
    $q = "UPDATE usuarios SET activa='1' WHERE email_usuario= '$email' AND hash='$hash' AND activa= 0";
    mysqli_query($db,$q);
session_unset();?>
    <section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
   <h2>Haz validado tu correo. Ya puedes disfrutar de los servicios.</h2>   
  </div>
  <center>
  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
</svg>
</center>
</div>
</section>
    <?php
}else{
   ?>
        <section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
   <h2>La URL es invalida o ya haz activado tu cuenta.</h2>   
  </div>
  <center>
  <svg class="checkmarkred" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
  <circle class="checkmark__circlered" cx="26" cy="26" r="25" fill="#none"/>
  <path class="checkmark__check" fill="none" d="M16 16 36 36 M36 16 16 36"/>
</svg>
</center>
</div>
</section>
    <?php
}
   
}else{
    ?>
    <section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
   <h2>La URL es invalida, debes ingresar con el link que llego a tu correo.</h2>   
  </div>
  <center>
  <svg class="checkmarkred" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
  <circle class="checkmark__circlered" cx="26" cy="26" r="25" fill="#none"/>
  <path class="checkmark__check" fill="none" d="M16 16 36 36 M36 16 16 36"/>
</svg>
</center>
</div>
</section>
<?php
}
include BASE_DIR . '/includes/footer.php';
}else{
  echo"<script language='javascript'>
  window.location='https://proyectoautomotriz20202.000webhostapp.com/'
  </script>;";  
}
?>
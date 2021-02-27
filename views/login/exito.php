<?php 
session_start();
error_reporting(0);
$activa = !empty($_SESSION["activo"]);
$correo = !empty($_SESSION["correo"]);
$recu = !empty( $_SESSION["recu"]);
require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/header.php';

if($activa=="si" && $correo=="si"){
$_SESSION["insert"] ="";
?>
 <section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
    <?php 
    if($recu == "si")
    {?>
   <h2>Se ha enviado tu recuperación de contraseña. Revisa tu correo.</h2>  
   <?php
   }
   else
   {?>
        <h2>Tu registro ha sido completado. Revisa tu correo para validarlo.</h2>  
     <?php
     }?> 
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
}else{?>
<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
   <h1>ERROR</h1>   
  </div>
</div>
</section>
<?php
} 
include BASE_DIR . '/includes/footer.php'; ?>
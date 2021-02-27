<?php 
error_reporting(0);
session_start();
require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/header.php';
include BASE_DIR . '/includes/db.php';
?>

<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
  <div class="container">
  <h2>Ingresa tu correo para enviar el link de recuperacion de contraseña: </h2>
  <form id="formu">
  <div class="form-group">
  <center>
  <label for="email"></label>
  <input style="width:400px;height:30px" type="email" name="email" id="email" placeholder="Email" required/><br><br>
  <button id="enviar" type="button" class="btn btn-primary">Enviar</button>
 </center>
 </div>
  </form>
  </div>
</div>
</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
  $('#enviar').click(function(){
    var datos=$('#formu').serialize();
     $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/login/recuperar.php?",
      data:datos,
      success:function(r){
          if(r==1){
            swal({
        title: "¡ERROR!",
        text: "Este correo no esta en nuestra base.",
        type: "error",
        });}
          else{
            <?php
             $_SESSION["activo"]="si";
             $_SESSION["correo"]="si";
             $_SESSION["recu"]="si";
             
              ?>
            window.location='https://proyectoautomotriz20202.000webhostapp.com/Exito';
          }
      }
    });
    return false
  });
});
</script>
<?php 
include BASE_DIR . '/includes/footer.php'; ?>
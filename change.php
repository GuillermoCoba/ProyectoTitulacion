<?php 
error_reporting(0);
session_start();
require_once __DIR__ . '/config.php';
include BASE_DIR . '/includes/header.php';
include BASE_DIR . '/includes/db.php';
$recu =  $_SESSION["recu"];
?>
 <?php 
    if($recu == "si")
    {?>
<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
  <div class="container">
  <h2>Ingresa la nueva contraseña: </h2>
  <form id="formu" >
  <div class="form-group">
  <center>
  <input style="width:400px;height:30px" type="password" name="pw" id="pw" placeholder="Contraseña"  required /><label style="color:red;"  id = "pwaux"></label><br><br>
  <input style="width:400px;height:30px" type="password" name="repw" id="repw" placeholder="Repertir Contraseña" required /><label style="color:red;"  id = "repwaux"></label><br><br>
  <div class="form-group form-button">
  <button  id="enviar" name="signup" type="submit" class="btn btn-primary btn-round">Cambia</button>
  </div>
  <!--<button id="enviar" type="button" class="btn btn-primary">Enviar</button>-->
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
    if($('#pw').val()!= "" || $('#repw').val()!=""){
    if($('#pw').val()==$('#repw').val()){
    var datos=$('#formu').serialize();
     $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/login/actualizarpw.php?",
      data:datos,
      success:function(r){
          if(r==1){
            swal({
        title: "¡ERROR!",
        text: "",
        type: "error",
      });}
          else{
                swal({
      title: "EXITO!",
      text: "Contraseña actualizada.",
      type: "success"
                }).then(
      function(isConfirm) {
          if (isConfirm) {
            window.location='https://proyectoautomotriz20202.000webhostapp.com';
          }
      });          
          }
      }
    });
  }else{
    swal({
   title: "¡ERROR!",
   text: "Las Contraseñas no son iguales.",
   type: "error",
 });
  }
}else{
  swal({
   title: "¡ERROR!",
   text: "Las Contraseñas no pueden estar vacias",
   type: "error",
 });
}
    return false
  });
});
</script>
<?php 
}
else
{
?>
<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
   <h1>ERROR</h1>   
  </div>
</div>
</section>
<script src="/assets/js/login.js"></script>
<?php
}
include BASE_DIR . '/includes/footer.php'; 
?>
<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['logeado']))
{
require_once __DIR__ . '/../../config.php';
include BASE_DIR . '/includes/header.php';
include BASE_DIR . '/includes/db.php';
$_SESSION["activo"] = "si";
?>
<style type="text/css">
  #regiration_form fieldset:not(:first-of-type){
    display: none;
  }
  .wi{
      width:290px;
      height: 23.4px;
  }
  .red{
    color:red;
  }
</style>

<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
  <div class="container">
<div class="progress">
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<form action=" /../../src/login/nuevaempresa.php" name="fvalida" id="regiration_form" method="post">
<fieldset>
<h2>Paso 1: Crear su cuenta</h2>
<div class="form-group col-sm-6">
<label for="nombre">Nombres</label><label class="red" id = "nomaux"></label>
<input type="text" class="form-control wi" name="nombre" id="nombre" placeholder="Nombres" required onBlur="val();"> 
</div>
<div class="form-group col-sm-6">
<label for="apellidos">Apellidos</label><label class="red"  id = "apeaux"></label>
<input type="text" class="form-control wi" name="apellidos" id="apellidos" placeholder="Apellidos" required onBlur="val();">
</div>
<div class="form-group col-sm-4">
<label for="email">Email</label><label class="red"  id = "emailaux"></label>
<input type="email" class="form-control wi" id="email" name="email" placeholder="Email" required onBlur="Validaciones();">

</div>
<div class="form-group col-sm-4">
<label for="pw">Password</label><label class="red"  id = "pwaux"></label>
<input type="password" class="form-control wi" id="pw" name="pw" placeholder="Password" required onBlur="val();">
</div>
<div class="form-group col-sm-4">
<label for="repw">Repetir Password</label><label class="red"  id = "repwaux"></label>
<input type="password" class="form-control wi" id="repw" placeholder="Password" required onBlur="val();">
</div>

<br><br>
<input type="button" name="data[password]" class="next btn btn-info" value="Siguiente"/>

</fieldset>
<fieldset>
<h2>Paso 2: Información del taller</h2>
<div class="form-group col-sm-4">
<label for="nombretaller">Nombre del taller</label>
<input type="text" class="form-control wi" id="nombretaller" name="nombretaller" placeholder="Nombre" required>
</div>
<div class="form-group col-sm-4">
<label for="tipotaller">Tipo de taller</label>
<select id="tipotaller" name="tipotaller" class="form-control wi" required;>
  <option value="0"selected>Seleccione una opcion: </option>
  <?php
         $query = "SELECT * FROM tipo_talleres";
         $search = mysqli_query($db,$query); 
          while ($valores = mysqli_fetch_array($search)) {
            echo '<option value="'.$valores[id_tipo_taller].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
          }
          
        ?>
</select>
</div>
<div class="form-group col-sm-4">
<label for="mob">Numero Contacto</label>
<input type="text" class="form-control wi" id="mob" name="mob" placeholder="Numero Celular" required>
</div>
<div class="form-group col-sm-4">
<label for="estado">Estado</label>
<select id="estado" name="estado" class="form-control wi" required onclick="CargarMunicipios(this.value)";>
  <option value="0"selected>Seleccione una opcion: </option>
  <?php
         $query = "SELECT * FROM estados WHERE id = '9'";
         $search = mysqli_query($db,$query); 
          while ($valores = mysqli_fetch_array($search)) {
            echo '<option value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
          }
          
        ?>
</select>
</div>
<div class="form-group col-sm-4">
<label for="municipio">Municipio/Localidad</label>
<select id="municipio" name="municipio" class="form-control wi" required onclick="CargarLocalidad(this.value)";>
  <option value="0"selected>Seleccione una opcion: </option>
  </select>
</div>
<div class="form-group col-sm-4">
<label for="localidad">Localidad</label>
<select id="localidad" name="localidad" class="form-control wi" required>
  <option value="0"selected>Seleccione una opcion: </option>
  </select>
</div>
<div class="form-group col-sm-4">
<label for="calle">Calle</label>
<input type="text" class="form-control wi" id="calle" name="calle" placeholder="Calle" required>    
</div>
<div class="form-group col-sm-4">
<label for="cp">CP</label>
<input type="text" class="form-control wi" id="cp" name="cp" placeholder="CP" required>
</div>
<div class="form-group col-sm-4">
<label for="colonia">Colonia</label>
<input type="text" class="form-control wi" id="colonia" name="colonia" placeholder="Colonia" required>
</div>
<input type="button" name="previous" class="previous btn btn-default" value="Previo" />
<input  <?php $_SESSION["insert"] = "si" ?> type="submit" name="submit" class="submit btn btn-success" value="Enviar" id="submit_data" />
</fieldset>
</form>
</div>
</div>
</div>
</section>


<script src="../../assets/js/login.js"></script>
<script>
$(document).ready(function(){
var current = 1,current_step,next_step,steps;
steps = $("fieldset").length;
$(".next").click(function(){
  val();  
	if (vala !=0){
    Validaciones();
    if(t==1){
current_step = $(this).parent();
next_step = $(this).parent().next();
next_step.show();
current_step.hide();
setProgressBar(++current);}}
});
$(".previous").click(function(){
current_step = $(this).parent();
next_step = $(this).parent().prev();
next_step.show();
current_step.hide();
setProgressBar(--current);
});
setProgressBar(current);
// Change progress bar action
function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
.html(percent+"%");
}
});


</script>

<script type="text/javascript">

function CargarMunicipios(val)
{    $.ajax({
        type: "POST",
        url: "https://proyectoautomotriz20202.000webhostapp.com/src/login/AJAX/llenar.php?",
        data: "estado="+val,
        success: function(resp){
            $("#municipio").html(resp);
        }
    });
}
function CargarLocalidad(val)
{    $.ajax({
        type: "POST",
        url: "https://proyectoautomotriz20202.000webhostapp.com/src/login/AJAX/llenarloc.php?",
        data: "municipio="+val,
        success: function(resp){
            $("#localidad").html(resp);
        }
    });
}
function Validaciones()
{    $.ajax({
        type: "POST",
        url: "https://proyectoautomotriz20202.000webhostapp.com/src/login/AJAX/validar.php?",
        data: 'email='+$("#email").val(),
        success: function(resp){
            $("#emailaux").html(resp);
        }
    });
}
</script>
<?php 
include BASE_DIR . '/includes/footer.php'; 
}else
{
  echo"<script language='javascript'>
  window.location='https://proyectoautomotriz20202.000webhostapp.com'
  </script>;";
}
?>
<?php require_once __DIR__ . '/../../config.php'; 
$title = 'Perfil';
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];

//usuarios
$query = "SELECT * FROM usuarios WHERE id_usuario='$ID'";
$search = mysqli_query($db,$query); 
 while ($valores = mysqli_fetch_array($search)) {
  $Taller = $valores[1];  
  $Nombre = $valores[2];
    $Apellidos = $valores[3];
    $Email = $valores[4];
    
 } 

 if($Nivel != 'adminempresa')
 {
 //DIRECCION
$querys = "SELECT * FROM direccion_usuario WHERE id_usuario='$ID'";
$searchs = mysqli_query($db,$querys); 
$match  = mysqli_num_rows($searchs);
    if($match > 0){
      while ($valor = mysqli_fetch_array($searchs)) {
        if(isset($valor[2])){
          $Telefono = $valor[2];
        }else{
          $Telefono = "";
        }
        if(isset($valor[3])){
          $Estado	= $valor[3];
        }else{
          $Estado = "0";
        }
        if(isset($valor[4])){
          $Municipio	= $valor[4];
        }else{
          $Municipio = "0";
        }
        if(isset($valor[5])){
          $Localidad = $valor[5];
        }else{
          $Localidad = "0";
        }
        if(isset($valor[6])){
          $Calle	= $valor[6];
        }else{
          $Calle = "0";
        }
        if(isset($valor[7])){
          $CP	= $valor[7];
        }else{
          $CP = "0";
        }
        if(isset($valor[8])){
          $Colonia= $valor[8];
        }else{
          $Colonia = "0";
        }
     } 
    }
    else
    {
      $Telefono = "";
      $Estado = "0";
      $Municipio	= "0";
      $Localidad = "0";
      $Calle	= "";
      $CP	= "";
      $Colonia= "";
    }
  }
  else{
    $querys = "SELECT * FROM talleres WHERE id_empresa='$Taller'";
$searchs = mysqli_query($db,$querys); 
$match  = mysqli_num_rows($searchs);
    if($match > 0){
      while ($valor = mysqli_fetch_array($searchs)) 
       {
        if(isset($valor[1])){
          $NombreTaller= $valor[1];
        }else{
          $NombreTaller = "0";
        }
        if(isset($valor[2])){
          $TipoTaller= $valor[2];
        }else{
          $TipoTaller = "0";
        }
        if(isset($valor[3])){
          $Telefono = $valor[3];
        }else{
          $Telefono = "";
        }
        if(isset($valor[4])){
          $Estado	= $valor[4];
        }else{
          $Estado = "0";
        }
        if(isset($valor[5])){
          $Municipio	= $valor[5];
        }else{
          $Municipio = "0";
        }
        if(isset($valor[6])){
          $Localidad = $valor[6];
        }else{
          $Localidad = "0";
        }
        if(isset($valor[7])){
          $Calle	= $valor[7];
        }else{
          $Calle = "0";
        }
        if(isset($valor[8])){
          $CP	= $valor[8];
        }else{
          $CP = "0";
        }
        if(isset($valor[9])){
          $Colonia= $valor[9];
        }else{
          $Colonia = "0";
        }
     }
  }
}

?>
      <!-- End Navbar -->
    <div  class="content">
        <div class="row">
      <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Datos Generales</h5>
              </div>
              <div class="card-body">
                <form id ="formu" >
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" disabled value="<?php echo $Nombre ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos"class="form-control" placeholder="Apellidos" disabled value="<?php echo $Apellidos ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" disabled value="<?php echo $Email ?>">
                      </div>
                    </div>
                  </div>
                  <?php  
                  if($Nivel != 'adminempresa')
                  { 
                  ?>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono" value="<?php echo $Telefono?>">
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  else
                  { 
                    ?>
                    <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nombre Taller</label>
                        <input type="text" name="nomtaller" id="nomtaller" class="form-control" placeholder="Nombre Taller"  value="<?php echo $NombreTaller ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Tipo Taller</label>
                        <select id="tipotaller" name="tipotaller" class="form-control" required>
                        <option value="0"selected>Seleccione una opcion: </option>
                        <?php
                        if($TipoTaller == "0")
                        {
                            $query = "SELECT * FROM tipo_talleres";
                            $search = mysqli_query($db,$query); 
                              while ($valores = mysqli_fetch_array($search)) {
                                echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
                              }
                            }else{
                              $query = "SELECT * FROM tipo_talleres";
                              $search = mysqli_query($db,$query); 
                              while ($valores = mysqli_fetch_array($search)) {
                              if($valores[0]==$TipoTaller){
                                echo '<option selected value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
                              }else{
                                echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
                              }
                            }
                          }
                  ?>                            
              </select>                      
            </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                      <label>Telefono</label>
                        <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono" value="<?php echo $Telefono?>">
                      </div>
                    </div>
                  </div>
                  <?php
                  } 
                  ?>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Estado</label>
                      <select id="estado" name="estado" class="form-control" required onclick="CargarMunicipios(this.value)";>
                      <?php
                      if($Estado =="0"){
                      ?>
                      <option value="0"selected>Seleccione una opcion: </option>
                      <?php
                            $query = "SELECT * FROM estados WHERE id = '9'";
                            $search = mysqli_query($db,$query); 
                              while ($valores = mysqli_fetch_array($search)) {
                                echo '<option value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                              }
                              
                            }
                            else
                            {$query = "SELECT * FROM estados WHERE id = '$Estado'";
                              $search = mysqli_query($db,$query); 
                                while ($valores = mysqli_fetch_array($search)) {
                                  echo '<option value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                                }
                            }?>                            
                    </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Delegación</label>
                        <select id="municipio" name="municipio" class="form-control wi" required onclick="CargarLocalidad(this.value)";>
                        <option value="0"selected>Seleccione una opcion: </option>
                        <?php
                      if($Municipio !="0"){
                        $query = "SELECT * FROM municipios WHERE estado_id='$Estado'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$Municipio){
                              echo '<option selected value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
                            }else{
                              echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
                            }
                          }
                      }
                      ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Localidad</label>
                        <select id="localidad" name="localidad" class="form-control wi" required>
                          <option value="0"selected>Seleccione una opcion: </option>
                          <?php
                      if($Localidad !="0"){
                        $query = "SELECT * FROM localidades WHERE municipio_id='$Municipio'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$Localidad){
                              echo '<option selected value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
                            }else{
                              echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[3])).'</option>';
                            }
                          }
                      }
                      ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Calle</label>
                        <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" value="<?php echo $Calle ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>CP</label>
                        <input type="number" name="CP" id="CP" class="form-control" placeholder="CP" value="<?php echo $CP ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Colonia</label>
                        <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia" value="<?php echo $Colonia?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button  id="guardar" type="submit" class="btn btn-primary btn-round">Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
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
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#guardar').click(function(){
    var datos=$('#formu').serialize();
     $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/perfil.php?",
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
   text: "Perfil actualizado.",
   type: "success"
             }).then(
  function(isConfirm) {
      if (isConfirm) {
        location.reload();
      }
  });
          }
      }
    });
    return false
  });
});
</script>
      <?php include BASE_DIR . '/includes/footerdash.php'; ?>
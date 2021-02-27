<?php require_once __DIR__ . '/../../config.php'; 
if(isset($_GET['view']) && isset($_GET['id'])){
  $title = 'Visualizar Servicio';
}else if(isset($_GET['id'])){
$title = 'Editar Servicio';
}else{
  $title = 'Solicitar Servicio';
}
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
if(!isset($_GET['id'])){
?>
    <!--AGREGAR-->
    <div  class="content">
    <div class="row">
      <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Selección de taller</h5>
              </div>
              <div class="card-body">
                <form id ="formu" >
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Estado</label>
                      <select id="estado" name="estado" class="form-control" required onclick="CargarMunicipios(this.value)";>
        
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
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Delegación</label>
                        <select id="municipio" name="municipio" class="form-control wi" required onclick="CargarLocalidad(this.value)";>
                        <option value="0"selected>Seleccione una opcion: </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Localidad</label>
                        <select id="localidad" name="localidad" class="form-control wi" required>
                          <option value="0"selected>Seleccione una opcion: </option>
                        </select>
                      </div>
                    </div>
                  </div>
              <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Tipo Taller</label>
                      <select id="tipotaller" name="tipotaller" class="form-control" required onclick="CargarTaller()";>
        
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
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Taller</label>
                        <select id="taller" name="taller" class="form-control wi" required>
                          <option value="0"selected>Seleccione una opcion: </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-header">
                <h5 class="card-title">Detalles del servicio</h5>
              </div>
              <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Fecha de Servicio</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder=""required >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Hora de Servicio</label>
                        <input type="time" name="hora" id="hora" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Vehículo</label>
                        <input type="text" name="vehiculo" id="vehiculo" class="form-control" placeholder="Vehiculo" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo"required >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Placas</label>
                        <input type="text" name="placas" id="placas" class="form-control" placeholder="Placas" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Año</label>
                        <input type="number" name="anio" id="anio" class="form-control" placeholder="Año"required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <label>Descripción del servicio a solicitar</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button  id="guardar" type="submit" class="btn btn-primary btn-round">Registrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
      <!--FIN AGREGAR-->
      <?php
      }
      else
      {
        $id=$_GET['id'];
        if(isset($_GET['view'])){
        $view=$_GET['view'];
      }
      $querys = "SELECT * FROM servicios AS S 
      INNER JOIN talleres AS T ON T.id_empresa = S.id_taller
      WHERE id_servicio= '$id'";
      $searchs = mysqli_query($db,$querys); 
      $match  = mysqli_num_rows($searchs);
    if($match > 0){
      while ($valor = mysqli_fetch_array($searchs)) {
        $Fecha= $valor[3];
        $Hora = $valor[4];
        $Vehiculo= $valor[5];
        $Modelo = $valor[6];
        $Placas= $valor[7];
        $Anio = $valor[8];
        $Desc= $valor[9];
        $Nombre= $valor[12];
        $Tipo = $valor[14];
        $IdEst= $valor[16];
        $IdMun= $valor[17];
        $IdLoc = $valor[18];
      }
    }
      ?>
       <div  class="content">
    <div class="row">
      <div class="col-md-12">
            <div class="card card-user">
              <?php if($Nivel != 'adminempresa')
              { ?>
              <div class="card-header">
                <h5 class="card-title">Selección de taller</h5>
              </div>
              <?php 
              } ?>
              <div class="card-body">
                <form id ="formu" >
                <?php if($Nivel != 'adminempresa')
              { ?>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Estado</label>
                      <select id="estado" name="estado" class="form-control" required onclick="CargarMunicipios(this.value)"; <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>>
                      <?php
                      if($IdEst =="0"){
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
                            {
                              $query = "SELECT * FROM estados WHERE id = '$IdEst'";
                              $search = mysqli_query($db,$query); 
                              
                                while ($valores = mysqli_fetch_array($search)) {
                                  if($valores[0]==$IdEst){
                                    echo '<option selected value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                                  }else{
                                    echo '<option value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                                  }                        
                                       
                                }
                            }?>                            
                    </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Delegación</label>
                        <select id="municipio" name="municipio" class="form-control wi" required onclick="CargarLocalidad(this.value)"; <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>>
                        <option value="0"selected>Seleccione una opcion: </option>
                        <?php
                      if($IdMun !="0"){
                        $query = "SELECT * FROM municipios WHERE estado_id='$IdEst'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$IdMun){
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
                        <select id="localidad" name="localidad" class="form-control wi" required <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>>
                          <option value="0"selected>Seleccione una opcion: </option>
                          <?php
                      if($IdLoc !="0"){
                        $query = "SELECT * FROM localidades WHERE municipio_id='$IdMun'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$IdLoc){
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
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Tipo Taller</label>
                      <select id="tipotaller" name="tipotaller" class="form-control" required onclick="CargarTaller()"; <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>>
        
                      <option value="0"selected>Seleccione una opcion: </option>
                      <?php
                      if($Tipo == "0")
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
                            if($valores[0]==$Tipo){
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
                        <label>Taller</label>
                        <select id="taller" name="taller" class="form-control wi" <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>>
                          <option value="0"selected>Seleccione una opcion: </option>
                          <?php
                      if($Nombre == "0")
                      {
                           $query =  "SELECT * FROM talleres AS T
                           INNER JOIN usuarios AS U ON U.id_empresa = T.id_empresa 
                           WHERE T.id_tipo_taller='$Tipo' AND T.id_estado = '$IdEst' AND T.id_municipio = '$IdMun' AND T.id_localidad = '$IdLoc' AND U.activa = '1'   ";
                           $search = mysqli_query($db,$query); 
                            while ($valores = mysqli_fetch_array($search)) {
                              echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
                            }
                          }else{
                            $query =  "SELECT * FROM talleres AS T
                            INNER JOIN usuarios AS U ON U.id_empresa = T.id_empresa 
                            WHERE T.id_tipo_taller='$Tipo' AND T.id_estado = '$IdEst' AND T.id_municipio = '$IdMun' AND T.id_localidad = '$IdLoc' AND U.activa = '1'   ";
                            $search = mysqli_query($db,$query); 
                            while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$Nombre){
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
                  </div>
                  <?php } ?>
                  <div class="card-header">
                <h5 class="card-title">Detalles del servicio</h5>
              </div>
              <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Fecha de Servicio</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $Fecha?>" <?php if(isset($_GET['view'])) { ?> disabled <?php } ?>  >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Hora de Servicio</label>
                        <input type="time" name="hora" id="hora" class="form-control" value="<?php echo $Hora?>" <?php if(isset($_GET['view'])) { ?> disabled <?php } ?> >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Vehículo</label>
                        <input type="text" name="vehiculo" id="vehiculo" class="form-control" value="<?php echo $Vehiculo?>" <?php if($Nivel != 'cliente' || isset($_GET['view'])) {  ?> disabled <?php  }  ?> >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo $Modelo?>" <?php if($Nivel != 'cliente' || isset($_GET['view'])) {  ?> disabled <?php  }  ?> >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Placas</label>
                        <input type="text" name="placas" id="placas" class="form-control" value="<?php echo $Placas?>" <?php if($Nivel != 'cliente' || isset($_GET['view'])) {  ?> disabled <?php  }  ?> >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Año</label>
                        <input type="number" name="anio" id="anio" class="form-control" value="<?php echo $Anio?>" <?php if($Nivel != 'cliente' || isset($_GET['view'])) {  ?> disabled <?php  }  ?> >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <label>Descripción del servicio a solicitar</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" <?php if($Nivel != 'cliente' || isset($_GET['view'])) {  ?> disabled <?php  }  ?>><?php echo $Desc?></textarea>
                      </div>
                    </div>
                  </div>
                  <?php if(($Nivel == 'adminempresa' && isset($_GET['id'])) && !isset($_GET['view']))
                  { ?>
                  <div class="card-header">
                    <h5 class="card-title">Selección de taller</h5>
                  </div>  
                  <div class="row">
                  <div class="col-md-12 pr-1" style="padding-left: 40px;">
                      <div class="form-group">
                      <input type="checkbox" class="form-check-input" id="checktaller" name="checktaller" onclick="activar()">
                      <label  for="checktaller" style="padding-left: 10px;">¿Deseas cambiar de taller?</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Estado</label>
                      <select id="estado" name="estado" class="form-control" required onclick="CargarMunicipios(this.value)"; disabled>
                      <?php
                      if($IdEst =="0"){
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
                            {
                              $query = "SELECT * FROM estados WHERE id = '$IdEst'";
                              $search = mysqli_query($db,$query); 
                              
                                while ($valores = mysqli_fetch_array($search)) {
                                  if($valores[0]==$IdEst){
                                    echo '<option selected value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                                  }else{
                                    echo '<option value="'.$valores[id].'">'.utf8_encode(utf8_decode($valores[nombre])).'</option>';
                                  }                        
                                       
                                }
                            }?>                            
                    </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Delegación</label>
                        <select id="municipio" name="municipio" class="form-control wi" required onclick="CargarLocalidad(this.value)"; disabled>
                        <option value="0"selected>Seleccione una opcion: </option>
                        <?php
                      if($IdMun !="0"){
                        $query = "SELECT * FROM municipios WHERE estado_id='$IdEst'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$IdMun){
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
                        <select id="localidad" name="localidad" class="form-control wi" required disabled>
                          <option value="0"selected>Seleccione una opcion: </option>
                          <?php
                      if($IdLoc !="0"){
                        $query = "SELECT * FROM localidades WHERE municipio_id='$IdMun'";
                        $search = mysqli_query($db,$query); 
                          while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$IdLoc){
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
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                      <label>Tipo Taller</label>
                      <select id="tipotaller" name="tipotaller" class="form-control" required onclick="CargarTaller()"; disabled>
        
                      <option value="0"selected>Seleccione una opcion: </option>
                      <?php
                      if($Tipo == "0")
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
                            if($valores[0]==$Tipo){
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
                        <label>Taller</label>
                        <select id="taller" name="taller" class="form-control wi" disabled>
                          <option value="0"selected>Seleccione una opcion: </option>
                          <?php
                      if($Nombre == "0")
                      {
                           $query =  "SELECT * FROM talleres AS T
                           INNER JOIN usuarios AS U ON U.id_empresa = T.id_empresa 
                           WHERE T.id_tipo_taller='$Tipo' AND T.id_estado = '$IdEst' AND T.id_municipio = '$IdMun' AND T.id_localidad = '$IdLoc' AND U.activa = '1'   ";
                           $search = mysqli_query($db,$query); 
                            while ($valores = mysqli_fetch_array($search)) {
                              echo '<option value="'.$valores[0].'">'.utf8_encode(utf8_decode($valores[1])).'</option>';
                            }
                          }else{
                            $query =  "SELECT * FROM talleres AS T
                            INNER JOIN usuarios AS U ON U.id_empresa = T.id_empresa 
                            WHERE T.id_tipo_taller='$Tipo' AND T.id_estado = '$IdEst' AND T.id_municipio = '$IdMun' AND T.id_localidad = '$IdLoc' AND U.activa = '1'   ";
                            $search = mysqli_query($db,$query); 
                            while ($valores = mysqli_fetch_array($search)) {
                            if($valores[0]==$Nombre){
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
                  </div>
                <?php
                  }?>
                  <?php
                  if(!isset($_GET['view'])){
                  ?>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button  id="editar" type="submit" class="btn btn-primary btn-round">Actualizar</button>
                    </div>
                  </div>
                  <?php
                  }?>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
      <?php	
      }
      ?>




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
function CargarTaller()
{ 
  var datos=$('#formu').serialize(); 
  $.ajax({
        type: "POST",
        url: "https://proyectoautomotriz20202.000webhostapp.com/src/login/AJAX/talleres.php?",
        data: datos,
        success: function(resp){
            $("#taller").html(resp);
        }
    });
}
</script>
<?php if(!isset($_GET['id'])) { ?>
<script type="text/javascript">
$(document).ready(function(){
  fecha.min = new Date().toISOString().split("T")[0];
  $('#guardar').click(function(){
    if($('#estado').val() !='0' && $('#municipio').val() !='0' &&
    $('#localidad').val() !='0' && $('#tipotaller').val() !='0'&&
    $('#taller').val() !='0' && $('#fecha').val() !=''&&
    $('#hora').val() !=''&&$('#vehiculo').val() !=''&&
    $('#modelo').val() !=''&&$('#placas').val() !=''&&
    $('#anio').val() !=''&&$('#descripcion').val() !=''){
    var datos=$('#formu').serialize();
     $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/agregarservicio.php?",
      data:datos,
      success:function(r){
          if(r==1){
            swal({
        title: "¡ERROR!",
        text: "",
        type: "error",
        });
        }
          else{
 swal({
  title: "EXITO!",
   text: "Servicio registrado.",
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
    }else{
      swal({
   title: "¡ERROR!",
   text: "Faltan datos por llenar.",
   type: "error",
 });
    }
    return false
  });
});
</script>
<?php } else { ?>
  <script type="text/javascript">
$(document).ready(function(){
  fecha.min = new Date().toISOString().split("T")[0];
  $('#editar').click(function(){
    if($('#estado').val() !='0' && $('#municipio').val() !='0' &&
    $('#localidad').val() !='0' && $('#tipotaller').val() !='0'&&
    $('#taller').val() !='0' && $('#fecha').val() !=''&&
    $('#hora').val() !=''&&$('#vehiculo').val() !=''&&
    $('#modelo').val() !=''&&$('#placas').val() !=''&&
    $('#anio').val() !=''&&$('#descripcion').val() !='')
    {
    var ids = <?php echo $_GET['id']?>;
    var datos=$('#formu').serialize();
    var da = datos.concat('&ids=',ids);
     $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/editarservicio.php?",
      data:da,
      success:function(r){
          if(r==1){
            swal({
        title: "¡ERROR!",
        text: "",
        type: "error",
        });
        }
          else{
      swal({
        title: "EXITO!",
        text: "Servicio Editado.",
        type: "success"
             }).then(
  function(isConfirm) {
      if (isConfirm) {
        <?php if($Nivel == 'cliente')
        {
        ?>
        location.reload();
        <?php } else
        {
        ?>
         window.location='https://proyectoautomotriz20202.000webhostapp.com/Dashboard'
        <?php 
        }
        ?>
      }
    });
      
          }
      }
    });
    }
    else
    {
      swal({
   title: "¡ERROR!",
   text: "Faltan datos por llenar.",
   type: "error",
    });
    }
    return false
  });
});
function activar(){
  if (document.getElementById('checktaller').checked) 
  {
    document.getElementById('estado').disabled = false;
    document.getElementById('municipio').disabled = false;
    document.getElementById('localidad').disabled = false;
    document.getElementById('tipotaller').disabled = false;
    document.getElementById('taller').disabled = false;
  }else{
    document.getElementById('estado').disabled = true;
    document.getElementById('municipio').disabled = true;
    document.getElementById('localidad').disabled = true;
    document.getElementById('tipotaller').disabled = true;
    document.getElementById('taller').disabled = true;
  }
}
</script>
  <?php } ?>  
      <?php include BASE_DIR . '/includes/footerdash.php'; ?>
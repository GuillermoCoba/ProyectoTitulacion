<?php require_once __DIR__ . '/../../config.php'; 
$title = "Chat";
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
$query = "SELECT * FROM usuarios  WHERE id_usuario = '$ID' ";
$search = mysqli_query($db,$query); 
 while ($valores = mysqli_fetch_array($search)) {
   $Taller = $valores[1];
 }
$queryT = "SELECT * FROM talleres WHERE id_empresa = '$Taller' ";
$searchT = mysqli_query($db,$queryT); 
 while ($valoresT = mysqli_fetch_array($searchT)) {
   $Mun = $valoresT[5];
 }
 if(isset($_GET["toUser"])){
    $update = "UPDATE chat SET activo=0  WHERE id_usuario_recibe='$Taller' AND id_usuario_envia = '".$_GET["toUser"]."'";
    mysqli_query($db,$update);}
?>
    <div  class="content">
    <div class="row">
      <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Chat</h5>
              </div>
              <div class="card-body">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-4" style="padding-right: 0px;">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" >
                <a data-toggle="collapse" href="#collapse1">
                <h4> Listado de talleres</h4>
                </a>
                </div>
                <div  id="collapse1" class="modal-body panel-collapse collapse in" style="height:550px; overflow-y:scroll;overflow-x:hidden;" >
                <ul class="list-group" id="list">
                <?php
                 $queryT = "SELECT * FROM talleres WHERE id_municipio = '$Mun' AND id_empresa != '$Taller'";
                $searchT = mysqli_query($db,$queryT); 
                 while ($valoresT = mysqli_fetch_array($searchT)) {
                    $queryS = "SELECT COUNT(*) FROM chat WHERE (id_usuario_recibe = '$Taller' AND activo = 1) AND id_usuario_envia = '$valoresT[0]'";
                    $searchS = mysqli_query($db,$queryS);
                    $rowS = mysqli_fetch_array($searchS);
                    if($rowS[0]>0){
                   echo '<li class="list-group-item"><a href="?toUser='.$valoresT[0].'">'.$valoresT[1].'</a> 
                   <span style="height: 25px;width: 25px;background-color: red;border-radius: 50%;
                   display: inline-block;text-align: -webkit-center;color:white">'.$rowS[0].' 
                   </span> </li>';
                }else{
                    echo '<li class="list-group-item"><a href="?toUser='.$valoresT[0].'">'.$valoresT[1].'</a></li>'; 
                }
                 }
                ?>
                </ul>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-8" style="padding-left: 0px;">
                <div class="modal-dialog" style="margin-left: 0px;">
                <div class="modal-content">
                <div class="modal-header">
                <h4>
                <?php
                if(isset($_GET["toUser"])){
                    $querys = "SELECT * FROM talleres WHERE id_empresa = '".$_GET["toUser"]."' ";
                    $searchs = mysqli_query($db,$querys); 
                      while ($valores = mysqli_fetch_array($searchs)) {
                        $user = $valores[1];
                    }  
                    echo $user;
                }
                ?>
                </h4>
                </div>
                <div class="modal-body" id="msgBody" style="height:400px; overflow-y:scroll;overflow-x:hidden;" onload="bottom()">
                <?php
                if(isset($_GET["toUser"])){
                    $update = "UPDATE chat SET activo=0  WHERE id_usuario_recibe='$Taller' AND id_usuario_envia = '".$_GET["toUser"]."'";
                    mysqli_query($db,$update);
                $queryC = "SELECT * FROM chat WHERE (id_usuario_envia = '$Taller' AND id_usuario_recibe = 
                '".$_GET["toUser"]."') OR  (id_usuario_envia = '".$_GET["toUser"]."' AND id_usuario_recibe = 
                '$Taller')";
                $searchC = mysqli_query($db,$queryC); 
                while ($valorC = mysqli_fetch_array($searchC)) {
                    if($valorC[1] == $Taller){
                        echo "
                        <div style = 'text-align:right;'>
                              <p style = 'background-color:lightblue; max-width: calc(30em * 0.5); display:inline-block;
                              padding:5px;border-radius:10px;max width:70%;'>
                              $valorC[3]
                              </p>
                              <div style='font-size:10px'>".date("d/m/Y H:i:s",strtotime($valorC[4]))."</div>
                              </div>";
                    }else{
                     echo "<div style = 'text-align:left;'>
                     <p style = 'background-color:yellow; max-width: calc(30em * 0.5); display:inline-block;
                     padding:5px;border-radius:10px;max width:70%;'>
                     $valorC[3]
                     </p>
                     <div style='font-size:10px'>".date("d/m/Y H:i:s",strtotime($valorC[4]))."</div>
                     </div>"; 
                    }
                 }
                }  
                ?>
                </div>
                <div class="modal-footer">
              <textarea id="mensaje" class="form-control" style="height: 70px;" placeholder="Escribe tu mensaje..."></textarea>
              <button id="enviar" class="btn btn-primary" style="height: 70px;">Envíar</button>
              </div>
                </div>
                </div>
                </div>
                </div>
                 </div>
                 
              </div>
            </div>
          </div>
          </div>
      </div>
<script type="text/javascript">
var objDiv = document.getElementById("msgBody");
$(document).ready(function(){
    objDiv.scrollTop = objDiv.scrollHeight;   
    
    var de = <?php echo $Taller ?>;
    var para = <?php echo $_GET['toUser']?>;
  $('#enviar').click(function(){
      $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/chat.php?",
      data:{
          de: de,
          para: para,
          mensaje: $('#mensaje').val()
      },
      dataType:"text",
      success:function(data){
        $('#mensaje').val("");
      }
      }); 
  });
  setInterval(function(){
    $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/actualizarchat.php?",
      data:{
          de: de,
          para: para
      },
      dataType:"text",
      success:function(data){
        $('#msgBody').html(data);
      }
      });
  }, 5000);
});
</script>
      <?php include BASE_DIR . '/includes/footerdash.php'; ?>
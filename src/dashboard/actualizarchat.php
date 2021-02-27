<?php
session_start();
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
$De = $_POST['de'];
$Para = $_POST['para']; 
$output="";

$queryC = "SELECT * FROM chat WHERE (id_usuario_envia = '$De' AND id_usuario_recibe = 
'$Para ') OR  (id_usuario_envia = '$Para' AND id_usuario_recibe = '$De')";
$searchC = mysqli_query($db,$queryC); 
while ($valorC = mysqli_fetch_array($searchC)) {
    if($valorC[1] == $De){
        $output.= "<div style = 'text-align:right;'>
             <p style = 'background-color:lightblue; max-width: calc(30em * 0.5);  display:inline-block;
              padding:5px;border-radius:10px;max width:70%;'>
              $valorC[3]
              </p>
              <div style='font-size:10px'>".date("d/m/Y H:i:s",strtotime($valorC[4]))."</div>
              </div>";
    }else{
        $output.= "<div style = 'text-align:left;'>
     <p style = 'background-color:yellow; max-width: calc(30em * 0.5); display:inline-block;
     padding:5px;border-radius:10px;max width:70%;'>
     $valorC[3]
     </p>
     <div style='font-size:10px'>".date("d/m/Y H:i:s",strtotime($valorC[4]))."</div>
     </div>"; 
    }
 }
 echo $output;
?>
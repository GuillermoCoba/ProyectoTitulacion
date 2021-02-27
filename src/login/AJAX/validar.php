<?php
require_once __DIR__ . '/../../../config.php'; 
include BASE_DIR . '/includes/db.php';
session_start();
$email = $_POST["email"];
if(!empty($email)) {
  $query = "SELECT * FROM usuarios WHERE email_usuario='$email'";
  $search = mysqli_query($db,$query);  
    $match  = mysqli_num_rows($search);
    if($match > 0){

      echo "<script>
      var t=0</script>
      <span class='estado-no-disponible-email'> Email no Disponible.</span>
      
      ";
  }else{
    echo "<script>var t=1</script>
    ";
  }
}

?>
<?php
session_start();
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
$email = $_SESSION['email'];
if(isset($_POST['pw']) && !empty($_POST['pw'])AND isset($_POST['repw']) && !empty($_POST['repw'])){

    $pwe = $_POST['pw'];
    $pw= md5($pwe);
    $update = "UPDATE usuarios SET password_usuario = '$pw' WHERE email_usuario = '$email'";
    $resultado = mysqli_query($db,$update)
    or die ("ERROR AL CONECTAR");
    mysqli_close($db);
    if($resultado){  
        echo 2;
        session_destroy();
    }else{
        echo 1;
    }
}else{
    echo 1;
}
?> 
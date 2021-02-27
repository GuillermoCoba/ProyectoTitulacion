<?php require_once __DIR__ . '/../../config.php';
session_start();
 if (!isset($_SESSION['logeado']))
 {
    $_SESSION["activo"] = "si";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../../assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
    <link href="../../assets/img/favicon.png" rel="icon">
  <link href= "../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registro</h2>
                        <div id="msg"></div>
                    <!-- Mensajes de Verificación -->
                    <div id="error" class="alert alert-danger ocultar" role="alert">
                        Las Contraseñas no coinciden, vuelve a intentar !
                    </div>
                        <form method="POST" class="register-form" id="register-form"  onsubmit="verificarPasswords(); return false" action="/../../src/login/nuevousuario.php" >
                            <div class="form-group">
                                <label for="nombre"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)" required/>
                            </div>
                            <div class="form-group">
                                <label for="apellidos"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Correo" required onBlur="comprobarEmail()"/>                          
                            </div>
                            <span id="estadoemail"></span>
                            <div class="form-group">
                                <label for="pw"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pw" id="pw" placeholder="Contraseña" required minlength="6" /> 
                            </div>
                            <div class="form-group">
                                <label for="repw"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repw" id="repw" placeholder="Repite tu contraseña" required minlength="6"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Acepto terminos y condiciones <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input <?php $_SESSION["insert"] = "si" ?> type="submit" name="signup" id="signup" class="form-submit" value="Registrar" disabled/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../../assets/img/signup-image.jpg" alt="sing up image"></figure>
                        <a href=" <?php echo BASE_URL . '/Login'?>" class="signup-image-link">Ya tengo un cuenta</a>
                        <a href=" <?php echo BASE_URL?>" class="signup-image-link">↵ Regresar</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?php echo BASE_URL?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE_URL?>/assets/js/login.js"></script>
    <script type="text/javascript">
    function comprobarEmail() {
	jQuery.ajax({
	url: "https://proyectoautomotriz20202.000webhostapp.com/src/login/AJAX/validar.php?",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#estadoemail").html(data);
	},
	error:function (){}
	});
} 
      </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php
      }
      else
      {
        echo"<script language='javascript'>
        window.location='https://proyectoautomotriz20202.000webhostapp.com'
        </script>;";
      }?>

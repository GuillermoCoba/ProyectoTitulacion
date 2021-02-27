<?php require_once __DIR__ . '/../../config.php'; 
session_start();
 if (!isset($_SESSION['logeado']))
 {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../../assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
    <link href="../../assets/img/favicon.png" rel="icon">
  <link href= "../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>

    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../assets/img/signin-image.jpg" alt="sing up image"></figure>
                        <a href=" <?php echo BASE_URL . '/NuevoUsuario'?>" class="signup-image-link">¿No tienes una cuenta?</a>
			<a href=" <?php echo BASE_URL . '/NuevoTaller'?>" class="signup-image-link">¿Quieres registrar tu taller?</a>
                        <a href=" <?php echo BASE_URL ?>" class="signup-image-link">↵ Regresar</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar Sesión</h2>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo BASE_URL . '/src/login/login.php'?>">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pw"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pw" id="pw" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>¿Recordar?</label>
                            </div>
                            <a href=" <?php echo BASE_URL.'/Recuperar' ?>" class="signup-image-link">¿Olvidaste tu contraseña?</a>

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Iniciar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?php echo BASE_URL?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE_URL?>js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php
      }
      else
      {
        echo"<script language='javascript'>
        window.location='https://proyectoautomotriz20202.000webhostapp.com/Dashboard'
        </script>;";
      }?>
<?php require_once __DIR__ . '/../config.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Automotriz</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="<?php echo  BASE_URL . '/assets/img/favicon.png' ?>" rel="icon">
  <link href= "<?php echo BASE_URL . '/assets/img/apple-touch-icon.png' ?>" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo BASE_URL .'/assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/icofont/icofont.min.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/remixicon/remixicon.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/boxicons/css/boxicons.min.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/owl.carousel/assets/owl.carousel.min.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/venobox/venobox.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/vendor/aos/aos.css'?>" rel="stylesheet" type="text/css">
  

  <!-- Template Main CSS File -->
  <link href="<?php echo BASE_URL .'/assets/css/style.css'?>" rel="stylesheet"type="text/css">
  <link href="<?php echo BASE_URL .'/assets/css/email.css'?>" rel="stylesheet"type="text/css">
</head>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/"><span>Automotriz</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Inicio</a></li>
          <li><a href="<?php echo BASE_URL .'/About'?>">Acerca</a></li>
          <li><a href="<?php echo BASE_URL .'/Servicios'?>">Servicios</a></li>
      <!--<li><a href="#portfolio">Portfolio</a></li>-->
    <!--<li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>-->
          <!--<li><a href="#contact">Contact</a></li>-->

<?php
if (isset($_SESSION['logeado'])&&isset($_COOKIE['reloginID']))
{?>
  <li class="drop-down" ><a>Opciones</a>
  <ul>
    <li><a href="<?php echo BASE_URL .'/Dashboard'?>">Dashboard</a></li>
    <li><a href="<?php echo BASE_URL .'/Salir'?>">Salir</a></li>
  </ul>
</li>
<?php
}else
{?>
  <li class="get-started"><a href=" <?php echo BASE_URL . '/Login'?>">Iniciar Sesión</a></li>
  <?php
}?>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
<body>
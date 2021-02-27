<?php require_once __DIR__ . '/../config.php';
include BASE_DIR . '/includes/db.php';
session_start();
$ID = $_COOKIE['ID'];
 if (!isset($_COOKIE['reloginID'])) { 
  unset($_COOKIE['reloginID']); 
  setcookie('reloginID', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
  unset($_COOKIE['Nombre']); 
  setcookie('Nombre', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
  unset($_COOKIE['Apellidos']); 
  setcookie('Apellidos', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
  unset($_COOKIE['Correo']); 
  setcookie('Correo', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
  unset($_COOKIE['Password']); 
  setcookie('Password', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
  unset($_COOKIE['Nivel']); 
  setcookie('Nivel', '', -1 ,'/', 'proyectoautomotriz20202.000webhostapp.com', false, true);
session_destroy();
echo"<script language='javascript'>
window.location='https://proyectoautomotriz20202.000webhostapp.com/'
</script>;";}
if (!isset($_SESSION['logeado']))
{
 echo"<script language='javascript'>
 window.location='https://proyectoautomotriz20202.000webhostapp.com/Login'
 </script>;";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $title?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL .'/assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL .'/assets/css/paper-dashboard.css'?>" rel="stylesheet"type="text/css">
  <link href="<?php echo BASE_URL .'/assets/css/demo.css'?>" rel="stylesheet"type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
   <script src="https://code.jquery.com/jquery.js"></script>
   <script src="https://code.highcharts.com/stock/highstock.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a class="simple-text logo-mini">
          <!-- <p>CT</p> -->
        </a>
        <a  class="simple-text logo-normal">
        Bienvenido<br><?php echo $_COOKIE['Nombre']?><br> 
        <?php echo $_COOKIE['Apellidos']?>
      </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li>
            <a href="Dashboard">
            <i class="nc-icon nc-bullet-list-67"></i>
           <p>Dashboard</p>
            </a>
          </li>
          <?php
if ($_COOKIE['Nivel']=='cliente')
{?>
          <li>
            <a href="Services">
              <i class="nc-icon nc-paper"></i>
              <p>Solicitar Servicios</p>
            </a>
          </li>
          <?php
}
if ($_COOKIE['Nivel']=='cliente')
{?>
          <li>
            <a href="Mapa">
              <i class="nc-icon nc-map-big"></i>
              <p>Buscar talleres cerca</p>
            </a>
          </li>
          <?php
          }
if ($_COOKIE['Nivel']!='cliente')
{
  ?>
          <li>
          <a href="Chat">
          <i class="nc-icon nc-bell-55"></i>
          <p>Chat
          <span id="chat"></span>
       <script>
$(document).ready(function(){
  setInterval(function(){
    $.ajax({
      type:"POST",
      url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/chatnoti.php?",
      dataType:"text",
      success:function(d){
        $("#chat").html(d);
      }
      });
  }, 5000);
});
</script>
          </p>
          </a>
          </li>
          <?php
}
if($_COOKIE['Nivel']!='cliente')
{
?>
  <li>
            <a href="Reportes">
              <i class="nc-icon nc-map-big"></i>
              <p>Reportes</p>
            </a>
          </li>
<?php
}
?>
<li>
            <a href="/">
              <i class="nc-icon nc-minimal-left"></i>
              <p>Regresar</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="<?php echo $title?>"><?php echo $title?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
  
            <ul class="navbar-nav">
            
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Herramientas</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="Perfil"> <i class="nc-icon nc-single-02"></i> Perfil</a>
                  <a class="dropdown-item" href="Salir"><i class="nc-icon nc-user-run"></i> Cerrar Sesión</a>
                </div>
              </li>
          </div>
        </div>
      </nav>
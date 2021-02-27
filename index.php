<?php require_once __DIR__ . '/config.php'; 
include BASE_DIR . '/includes/header.php';
error_reporting(0);
session_start();
if (!isset(($_COOKIE['reloginID']))){
    unset($_SESSION['logeado']); 
}
;?>
 <section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
  <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Busca al mejor taller</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">¡Para resolver tus problemas!</h2>
          <?php
          if (!isset($_SESSION['logeado']))
          {?>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="NuevoUsuario" class="btn-get-started scrollto">Registrate</a>
          </div>
          <?php
          }else
          {?>
           <div data-aos="fade-up" data-aos-delay="800">
            <a href="Dashboard" class="btn-get-started scrollto">Dashboard</a>
          </div>
          <?php
            }?>
        </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
      <img src="./assets/img/auto.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>
</section><!-- End Hero -->
<!-- Fact Start -->
<div class="fact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="./assets/img/icon-4.png" alt="Icon">
                            <h2>Equipo 100% Calificado</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="./assets/img/icon-1.png" alt="Icon">
                            <h2>Atención personalizada</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="./assets/img/icon-8.png" alt="Icon">
                            <h2>Trabajos completos</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="./assets/img/icon-6.png" alt="Icon">
                            <h2>100% de satisfacción</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->
         <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="about-img">
                            <div class="about-img-1">
                                <img src="./assets/img/acerca.png" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-header">
                            <p>Sobre nosotros</p>
                            <h2>Apoyando a las Pymes</h2>
                        </div>
                        <div class="about-text">
                            <p>
                            Actualmente con la situación que estamos viviendo en la pandemia, cualquier negocio de cualquier giro debe estar digitalizado si quiere seguir compitiendo y tener presencia en el mercado. Esto es algo muy sencillo para grandes empresas, al contrario de las micro pymes. </p>
                            <p>
                            Al ofrecerles la facilidad de obtener estas tecnologías, estas podrán seguir vigentes en el mercado, ya que les facilitamos la gestión de sus servicios y el control de datos de sus clientes, sustituyendo los talones de notas, además de que se expande el circulo de contacto y por lo tanto de colaboración y de servicios dentro de este ámbito.
                            </p>
                            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                            <a href="About" class="btn btn-primary btn-lg active btn-outline-primary" role="button" aria-pressed="true">Conoce más</a>
                        </div>
                    </div>
                    

                </div>

            </div>
        </div>
        <!-- About End -->
          <!-- Service Start -->
          <div class="service">
            <div class="container">
                <div class="section-header">
                    <p>Hacemos todo lo posible</p>
                    <h2>Para resolver tus problemas</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="./assets/img/icon-1.png" alt="Icon">
                            <h3>Servicios</h3>
                            <p>
                                Puedes solicitar cualquier servicio con tan solo un clic
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="./assets/img/icon-3.png" alt="Icon">
                            <h3>Revisar status</h3>
                            <p>
                                Revisar en tiempo real como se encuentra tu servicio
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="./assets/img/icon-4.png" alt="Icon">
                            <h3>Comunidad</h3>
                            <p>
                                Si un taller no cuenta con algún servicio puedes contactar a otro rapidamente
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="./assets/img/icon-6.png" alt="Icon">
                            <h3>Calidad</h3>
                            <p>
                                Obtendras un buen servicio a un buen costo
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
 <div class="about">
            <div class="container">
                <div class="row align-items-center">
                   <div class="col-md-6">
                        <div class="about-img">
                            <div class="about-img-1">
                                <img src="./assets/img/unete.png" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="section-header">
                            <h2>¿Eres un taller y quieres unirte?</h2>
                        </div>
                        <div class="about-text">
                            <p>
                            Actualmente con la situación que estamos viviendo en la pandemia, cualquier negocio de cualquier giro debe estar digitalizado si quiere seguir compitiendo y tener presencia en el mercado. Esto es algo muy sencillo para grandes empresas, al contrario de las micro pymes. </p>
                            <p>
                            Al ofrecerles la facilidad de obtener estas tecnologías, estas podrán seguir vigentes en el mercado, ya que les facilitamos la gestión de sus servicios y el control de datos de sus clientes, sustituyendo los talones de notas, además de que se expande el circulo de contacto y por lo tanto de colaboración y de servicios dentro de este ámbito.
                            </p>

<div class="row counters">
                            <div class="col-6">
                                <i class="fa fa-user"></i>
                                <div class="counters-text">
                                    <h2 data-toggle="counter-up">100</h2>
                                    <p>Nuestros socios</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-users"></i>
                                <div class="counters-text">
                                    <h2 data-toggle="counter-up">200</h2>
                                    <p>Nuetros clientes</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-check"></i>
                                <div class="counters-text">
                                    <h2 data-toggle="counter-up">300</h2>
                                    <p>Proyectos terminados</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-running"></i>
                                <div class="counters-text">
                                    <h2 data-toggle="counter-up">400</h2>
                                    <p>Proyectos activos</p>
                                </div>
                            </div>
                           

                        </div>
<?php
 if (!isset($_SESSION['logeado']))
 {?>
                            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                            <a href="NuevoTaller" class="btn btn-primary btn-lg active btn-outline-primary" role="button" aria-pressed="true">UNETE</a>
                            </div>
                            <?php
                        }?>
                    	</div>
                 </div>
            </div>
        </div>
        <br>
        <!-- Feature End -->
<?php	
include BASE_DIR . '/includes/footer.php';?>

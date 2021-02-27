<?php require_once __DIR__ . '/../../config.php'; 
$title = 'Mapa';
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/ubicaciones.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
if($rowCOUNTS[0]>0){
?>      <!-- End Navbar -->
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                Talleres Cerca
              </div>
              <div class="card-body ">
                <div id="map" class="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script>
      function initMap() {
//DIRECCION DEL CLIENTE
      //MAPA INICIAL

        var latlng = {lat: <?php echo $address['latitude'] ?>, lng: <?php echo $address['longitude'] ?>}
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
            zoom: 15
        });
      //DESCRIPCION
        var contentString ='<h5>Tú dirección</h5>'+
        '<?php echo ($Calle.','.$Colonia.','.$Delegacion.','.$CP.' Ciudad de México') ?>';
        var infowindow = new google.maps.InfoWindow({
        content: contentString,
      });
       
      //MARCA
        var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:"Tú dirección",
        icon: 'https://img.icons8.com/ultraviolet/30/000000/home--v2.png'
    });
      marker.addListener("click", () => {
      infowindow.open(map, marker);
    });

    let valor = [];
    let valor1 = [];
    <?php for($i = 0; $i<$rowCOUNT[0];$i++) { 
      ?>
      var latlngT = {lat: <?php echo $lngs[$i] ?>, lng: <?php echo $lats[$i] ?>}    
      //DESCRIPCION
      var contentStringT ='<h5>'+'<?php echo $Nombres[$i] ?>'+'</h5>'+
      '<?php echo ($Calles[$i].','.$Colonias[$i].','.$Delegaciones[$i].','.$CPS[$i].' Ciudad de México') ?>';

      var infowindowT = new google.maps.InfoWindow({
        content: contentStringT,
      });
      //TALLER
     var markerT = new google.maps.Marker({
          position: latlngT,
          map: map,
          title:"Taller",
          icon:'https://img.icons8.com/fluent/30/000000/car-service.png'
      });
      valor.push(infowindowT);
      valor1.push(markerT);
      <?php
      }
      ?>
      for(let i=0;i<valor.length;i++){
        valor1[i].addListener("click", () => {
          valor[i].open(map, valor1[i]);
      });
      }
    }
    </script>
      <?php include BASE_DIR . '/includes/footerdash.php'; 
      }
      else
      {
        echo"<script language='javascript'>
        swal({
          title: 'Información',
           text: 'No cuentas con una dirección registrada.',
           type: 'warning'
                     }).then(
          function(isConfirm) {
              if (isConfirm) {
                window.location='https://proyectoautomotriz20202.000webhostapp.com/Dashboard'
              }
          });
      </script>;";

      }
      ?>



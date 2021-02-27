<?php require_once __DIR__ . '/../../config.php';
$title = 'Dashboard'; 
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/db.php';
if ($_COOKIE['Nivel']=='cliente')
{
$ID = $_COOKIE['ID'];

$query = "SELECT S.id_servicio,T.nombre_taller AS Taller,S.fecha,S.hora,S.descripcion, S.codigo, 
          IF(S.status=0, 'En proceso',IF(S.status=1,'Cancelado','Terminado')) AS Status
          FROM servicios AS S 
          INNER JOIN talleres AS T ON T.id_empresa = S.id_taller
          WHERE id_usuario = '$ID'";
$search = mysqli_query($db,$query); 
$queryS = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID'";
$searchS = mysqli_query($db,$queryS);
$rowS = mysqli_fetch_array($searchS);
$querySC = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '2'";
$searchSC = mysqli_query($db,$querySC);
$rowSC = mysqli_fetch_array($searchSC);
$querySCA = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '1'";
$searchSCA = mysqli_query($db,$querySCA);
$rowSCA = mysqli_fetch_array($searchSCA);
$querySP = "SELECT COUNT(*) FROM servicios WHERE id_usuario = '$ID' AND status = '0'";
$searchSP = mysqli_query($db,$querySP);
$rowSP = mysqli_fetch_array($searchSP);
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-settings text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Solicitados</p>
                      <p class="card-title"><?php echo $rowS[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-check-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Terminados</p>
                      <p class="card-title"><?php echo $rowSC[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-simple-remove text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Cancelados</p>
                      <p class="card-title"><?php echo $rowSCA[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-ruler-pencil"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios En Proceso</p>
                      <p class="card-title"><?php echo $rowSP[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
</div>
        <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Listado de Servicios</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Taller
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Hora
                      </th>
                      <th>
                        Servicio
                      </th>
                      <th>
                        Codigo
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                      Ver
                      </th>
                      <th>
                      Editar
                      </th>
                      <th>
                      Cancelar
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     while ($valores = mysqli_fetch_array($search)) {                   
                    ?>
                      <tr>
                        <td>
                          <?php echo $valores[1]; ?>
                        </td>
                        <td>
                        <?php echo $valores[2]; ?>
                        </td>
                        <td>
                        <?php echo $valores[3]; ?>
                        </td>
                        <td>
                        <?php echo $valores[4]; ?>
                        </td>
                        <td>
                        <?php echo $valores[5]; ?>
                        </td>
                        <?php
                        if($valores[6]=="En proceso"){
                        ?>
                        <td style="color:orange">
                        <?php
                        }
                        else if($valores[6]=="Cancelado")
                        {
                        ?>
                        <td style="color:red">
                        <?php
                        }
                        else
                        {
                        ?>
                        <td style="color:green">
                        <?php
                        }
                       ?>
                        <?php echo $valores[6]; ?>
                        </td>
                        <td>
                      <a href="Services?id=<?php echo $valores[0]; ?>&&view=true"><button id="id" name="id" class="btn btn-info glyphicon glyphicon-eye-open" ></button></a>
                        </td>
                        <td>
                        <?php
                        if($valores[6]!="Cancelado" && $valores[6]!="Terminado" )
                        {
                        ?>
                        <a href="Services?id=<?php echo $valores[0]; ?>"><button id="id" name="id" class="btn btn-warning glyphicon glyphicon-pencil"></button></a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <button id="id" name="id" class="btn btn-warning glyphicon glyphicon-pencil" 
                        disabled></button>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <?php
                        if($valores[6]!="Cancelado" && $valores[6]!="Terminado" )
                        {
                        ?>
                        <button style="background-color:red" id="id" name="id" class="btn btn-danger glyphicon glyphicon-remove" 
                        onclick="preguntar(<?php echo $valores[0]; ?>)">
                        <?php
                        }
                        else
                        {
                        ?>
                        <button style="background-color:red" id="id" name="id" class="btn btn-danger glyphicon glyphicon-remove" 
                        disabled>
                          <?php
                        }
                        ?>
				                	</button>
                        </td>
                        
                      </tr> 
                      <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
<?php
}
else
{
  $ID = $_COOKIE['ID'];
  $querys = "SELECT * FROM usuarios WHERE id_usuario='$ID'";
  $searchs = mysqli_query($db,$querys); 
  while ($valoress = mysqli_fetch_array($searchs)) {
  $Taller = $valoress[1]; 
$query = "SELECT S.id_servicio, CONCAT(U.nombre_usuario,' ',U.apellidos_usuario) AS Cliente,S.fecha,S.hora,S.descripcion, S.codigo, 
          IF(S.status=0, 'En proceso',IF(S.status=1,'Cancelado','Terminado')) AS Status
          FROM servicios AS S 
          INNER JOIN usuarios AS U ON U.id_usuario = S.id_usuario
          WHERE id_taller = '$Taller'";
$search = mysqli_query($db,$query); 

$queryS = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller'";
$searchS = mysqli_query($db,$queryS);
$rowS = mysqli_fetch_array($searchS);
$querySC = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '2'";
$searchSC = mysqli_query($db,$querySC);
$rowSC = mysqli_fetch_array($searchSC);
$querySCA = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '1'";
$searchSCA = mysqli_query($db,$querySCA);
$rowSCA = mysqli_fetch_array($searchSCA);
$querySP = "SELECT COUNT(*) FROM servicios WHERE id_taller = '$Taller' AND status = '0'";
$searchSP = mysqli_query($db,$querySP);
$rowSP = mysqli_fetch_array($searchSP);}?>
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-settings text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Solicitados</p>
                      <p class="card-title"><?php echo $rowS[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-check-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Terminados</p>
                      <p class="card-title"><?php echo $rowSC[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-simple-remove text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios Cancelados</p>
                      <p class="card-title"><?php echo $rowSCA[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-ruler-pencil"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Servicios En Proceso</p>
                      <p class="card-title"><?php echo $rowSP[0];?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Listado de Servicios</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Cliente
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Hora
                      </th>
                      <th>
                        Servicio
                      </th>
                      <th>
                        Codigo
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                      Terminar
                      </th>
                      <th>
                      Ver
                      </th>
                      <th>
                      Editar
                      </th>
                      <th>
                      Cancelar
                      </th>
                    </thead>
                    <tbody>
                    <?php
                     while ($valores = mysqli_fetch_array($search)) {                   
                    ?>
                      <tr>
                        <td>
                          <?php echo $valores[1]; ?>
                        </td>
                        <td>
                        <?php echo $valores[2]; ?>
                        </td>
                        <td>
                        <?php echo $valores[3]; ?>
                        </td>
                        <td>
                        <?php echo $valores[4]; ?>
                        </td>
                        <td>
                        <?php echo $valores[5]; ?>
                        </td>
                        <?php
                        if($valores[6]=="En proceso"){
                        ?>
                        <td style="color:orange">
                        <?php
                        }
                        else if($valores[6]=="Cancelado")
                        {
                        ?>
                        <td style="color:red">
                        <?php
                        }
                        else
                        {
                        ?>
                        <td style="color:green">
                        <?php
                        }
                       ?>
                        <?php echo $valores[6]; ?>
                        </td>
                        <td>
                        <?php
                        if($valores[6]!="Cancelado" && $valores[6]!="Terminado" )
                        {
                        ?>
                        <button style="background-color:green" id="id" name="id" class="btn btn-danger glyphicon glyphicon-check" 
                        onclick="preguntarA(<?php echo $valores[0]; ?>)">
                        <?php
                        }
                        else
                        {
                        ?>
                        <button style="background-color:green" id="id" name="id" class="btn btn-danger glyphicon glyphicon-check" 
                        disabled>
                          <?php
                        }
                        ?>
				                	</button>
                        </td>
                        <td>
                      <a href="Services?id=<?php echo $valores[0]; ?>&&view=true"><button id="id" name="id" class="btn btn-info glyphicon glyphicon-eye-open" ></button></a>
                        </td>

                        <td>
                        <?php
                        if($valores[6]!="Cancelado" && $valores[6]!="Terminado" )
                        {
                        ?>
                        <a href="Services?id=<?php echo $valores[0]; ?>"><button id="id" name="id" class="btn btn-warning glyphicon glyphicon-pencil"></button></a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <button id="id" name="id" class="btn btn-warning glyphicon glyphicon-pencil" 
                        disabled></button>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <?php
                        if($valores[6]!="Cancelado" && $valores[6]!="Terminado" )
                        {
                        ?>
                        <button style="background-color:red" id="id" name="id" class="btn btn-danger glyphicon glyphicon-remove" 
                        onclick="preguntar(<?php echo $valores[0]; ?>)">
                        <?php
                        }
                        else
                        {
                        ?>
                        <button style="background-color:red" id="id" name="id" class="btn btn-danger glyphicon glyphicon-remove" 
                        disabled>
                          <?php
                        }
                        ?>
				                	</button>
                        </td>
                        
                      </tr> 
                      <?php
                    }
                    ?>
                    </tbody>
                  </table>
</div>

<?php
}
?>
<script src="<?php echo BASE_URL ?>/assets/js/dashboard.js"></script>
<?php include BASE_DIR . '/includes/footerdash.php'; ?>
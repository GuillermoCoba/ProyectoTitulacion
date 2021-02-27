<?php
date_default_timezone_set('America/Mexico_City');
session_start();
$ID = $_COOKIE['ID'];
$email = $_COOKIE['Correo'];
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/sendmail.php';
//VARIABLES
$Taller = $_POST['taller'];
$Fecha = $_POST['fecha'];
$Hora = $_POST['hora'];
$Vehiculo = $_POST['vehiculo'];
$Modelo = $_POST['modelo'];
$Placas = $_POST['placas'];
$Anio = $_POST['anio'];
$Descripcion = $_POST['descripcion'];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$rand = substr(str_shuffle($permitted_chars), 0, 16);
$Fechareg = date('d/m/Y H:i:s');
$FechaAct = date("d/m/Y",strtotime($Fecha));
$status = '0';

$query = "SELECT T.id_empresa, T.nombre_taller,T.mob, EST.nombre,MUN.nombre,LOC.nombre,T.calle,T.colonia,T.cp FROM talleres AS T
INNER JOIN estados AS EST ON EST.id = T.id_estado
INNER JOIN municipios AS MUN ON MUN.id = T.id_municipio
INNER JOIN localidades AS LOC ON LOC.id = T.id_localidad WHERE  T.id_empresa = '$Taller'";
$search = mysqli_query($db,$query); 
while ($valores = mysqli_fetch_array($search)) { 
    $NombreT = $valores[1];
    $Mob = $valores[2];
    $Est = $valores[3];
    $Mun = $valores[4];
    $Loc = $valores[5];
    $Calle = $valores[6];
    $Col = $valores[7];
    $CP = $valores[8];
}

$queryC = "SELECT * FROM usuarios WHERE id_empresa = '$Taller'";
$searchC = mysqli_query($db,$queryC); 
while ($valoresC = mysqli_fetch_array($searchC)) { 
    $CorreoE = $valoresC[4];
}

$insertar = "INSERT into servicios (id_usuario,id_taller,fecha,hora,vehiculo,modelo,placas,anio,descripcion,codigo,status) values ('$ID','$Taller','$Fecha','$Hora', '$Vehiculo','$Modelo','$Placas','$Anio','$Descripcion','$rand','$status')";        
mysqli_query($db,$insertar)
        or die ("ERROR AL CONECTAR");
        mysqli_close($db);
        if($insertar){
	/*Configuracion de variables para enviar el correo*/
    $mail_username="proyectoautomotriz2020@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
    $mail_userpassword="proyecto2020";//Tu contraseña de gmail
    $mail_addAddress=$email;//correo electronico que recibira el mensaje
    $template="../../views/dashboard/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
    
    /*Inicio captura de datos enviados por $_POST para enviar el correo */
    $mail_setFromEmail = $email;
    $mail_setFromName = "Automotriz";            
    $mail_subject = 'Servicio | Registro'; // Give the email a subject 
        
    $mail_addAddresss=$CorreoE;
    $mail_setFromEmails = $CorreoE;
    $mail_subjects = 'Servicio | Registrado'; // Give the email a subject 

  
	$txt_message = '<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td>
        <![endif]-->     
        <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%;max-width: 730px;">
          <tr>
            <td class="header" style="padding: 40px 30px 0px 30px; background-color: aliceblue;">
              <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
                <tr>
                  <td height="70" style="padding: 0 20px 20px 26px;">
                  </td>
                </tr>
              </table>
              <!--[if (gte mso 9)|(IE)]>
                <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td>
              <![endif]-->
              <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
                <tr>
                  <td height="70" style="padding: 0 20px 20px 26px;">
                    </td><td class="h1" style="padding: 5px 0 0 90px;color: #3498db;font-family: sans-serif;font-size: 33px;line-height: 38px;font-weight: bold;">Automotriz</td>
                  </tr>
              </table>
    
              
              <table width="70" align="right" border="0" cellpadding="0" cellspacing="0">  
                <tr>
                  <td height="70" style="padding: 0 20px 20px 26px;">
                  </td>
                </tr>
              </table>
              
              <!--[if (gte mso 9)|(IE)]>
                    </td>
                  </tr>
              </table>
              <![endif]-->
            </td>
          </tr>
          
          <tr>
            <td class="innerpadding bodycopy" style="text-align: justify;padding: 30px 30px 30px 30px;color: #153643;font-family: sans-serif;font-size: 16px;line-height: 22px;">
              <center>
                <p>
                <span>Estimad@:'.$_COOKIE['Nombre'].' '.$_COOKIE['Apellidos'].' </span> <br>
                <span>A continuación se te muestra toda la información:</span> 
                </p>
                <div>
              
                <table  style="border-spacing: inherit;border-collapse: collapse; ">  
                <tr>
                  <td style="padding: 0 2.5em; text-align: center;">
                    <div class="row" >
                          <div class="col-md-6 pl-1">
                              <div class="form-group">
                              <label for="delegacion" style="color:#3498db">Fecha de registro: </label><br>
                              <label name="delegacion" id="delegacion" class="text">'.$Fechareg.'</label>
                              </div>
                            </div>
                            <div class="col-md-6 px-1">
                              <div class="form-group">
                              <label for="localidad" style="color:#3498db">Código: </label><br>
                              <label name="localidad" id="localidad" class="text">'.$rand.'</label>
                              </div>
                            </div>
                        </div>
              
                        
                      </td>        
                </tr> 
                <tr>
                  <td style="padding: 0 2.5em; text-align: center;">
                    <hr>
                    <div class="row" >
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                            <label for="estado" style="color:#3498db">Nombre del taller: </label><br>
                            <label name="estado" id="est" class="text">'.$NombreT.'</label>
                            </div>
                          </div>
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                          <label for="estado" style="color:#3498db">Estado: </label><br>
                          <label name="estado" id="est" class="text">'.$Est.' </label>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                            <label for="delegacion" style="color:#3498db">Delegacion: </label><br>
                            <label name="delegacion" id="delegacion" class="text">'.$Mun.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 px-1">
                            <div class="form-group">
                            <label for="localidad" style="color:#3498db">Localidad: </label><br>
                            <label name="localidad" id="localidad" class="text">'.$Est.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 pr-1">
                            <div class="form-group">
                            <label for="estado" style="color:#3498db">Calle: </label><br>
                            <label name="estado" id="est" class="text">'.$Calle.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                              <div class="form-group">
                              <label for="delegacion" style="color:#3498db">Colonia: </label><br>
                              <label name="delegacion" id="delegacion" class="text">'.$Col.'</label>
                              </div>
                            </div>
                            <div class="col-md-4 px-1">
                              <div class="form-group">
                              <label for="localidad" style="color:#3498db">CP: </label><br>
                              <label name="localidad" id="localidad" class="text">'.$CP.'</label>
                              </div>
                            </div>
                      </div>
                </td>       
                </tr>
                <tr>
                  <td style="padding: 0 2.5em; text-align: center;">
                    <hr>
                    <div class="row" >
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                          <label for="estado" style="color:#3498db">Fecha del Servicio: </label><br>
                          <label name="estado" id="est" class="text">'.$FechaAct.' </label>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                            <label for="delegacion" style="color:#3498db">Hora del servicio: </label><br>
                            <label name="delegacion" id="delegacion" class="text">'.$Hora.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 px-1">
                            <div class="form-group">
                            <label for="localidad" style="color:#3498db">Vehiculo: </label><br>
                            <label name="localidad" id="localidad" class="text">'.$Vehiculo.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 pr-1">
                            <div class="form-group">
                            <label for="estado" style="color:#3498db">Modelo: </label><br>
                            <label name="estado" id="est" class="text">'.$Modelo.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                              <div class="form-group">
                              <label for="delegacion" style="color:#3498db">Placas: </label><br>
                              <label name="delegacion" id="delegacion" class="text">'.$Placas.'</label>
                              </div>
                            </div>
                            <div class="col-md-4 px-1">
                              <div class="form-group">
                              <label for="localidad" style="color:#3498db">Año: </label><br>
                              <label name="localidad" id="localidad" class="text">'.$Anio.'</label>
                              </div>
                            </div>
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                <label for="estado" style="color:#3498db">Descripcion del servicio: </label><br>
                                <label name="estado" id="est" class="text">'.$Descripcion. '</label>
                                </div>
                              </div>
                      </div>
                </td>       
                </tr>
               
               
          <tr>
            <td class="footer" style="padding: 20px 30px 15px 30px; background-color: aliceblue;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" style="padding: 20px 0 0 0;">
                    <div class="credits ml-auto">
                      <span><strong>Correo del taller:</strong>'.$CorreoE.'</span><br>
                      <span><strong>Telefono del taller:</strong>'.$Mob.'</span><br>
                      <span class="copyright">
                        © <script>
                          document.write(new Date().getFullYear())
                        </script> Copyright <strong>Proyecto Automotriz</strong>. All Rights Reserved
                      </span><br>
                  </td>
                </tr>         
              </table>
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
              </td>
            </tr>
        </table>
        <![endif]-->
        </td>
      </tr>
    </table>'; 
    
	$txt_messages = '<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td>
      <![endif]-->     
      <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%;max-width: 730px;">
        <tr>
          <td class="header" style="padding: 40px 30px 0px 30px; background-color: aliceblue;">
            <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
              <tr>
                <td height="70" style="padding: 0 20px 20px 26px;">
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
              <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
            <![endif]-->
            <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
              <tr>
                <td height="70" style="padding: 0 20px 20px 26px;">
                  </td><td class="h1" style="padding: 5px 0 0 90px;color: #3498db;font-family: sans-serif;font-size: 33px;line-height: 38px;font-weight: bold;">Automotriz</td>
                </tr>
            </table>
  
            
            <table width="70" align="right" border="0" cellpadding="0" cellspacing="0">  
              <tr>
                <td height="70" style="padding: 0 20px 20px 26px;">
                </td>
              </tr>
            </table>
            
            <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
        
        <tr>
          <td class="innerpadding bodycopy" style="text-align: justify;padding: 30px 30px 30px 30px;color: #153643;font-family: sans-serif;font-size: 16px;line-height: 22px;">
            <center>
              <p>
              <span>Estimad@</span> <br>
              <span>A continuación se te muestra toda la información del servicio solitado por el cliente '.$_COOKIE['Nombre'].' '.$_COOKIE['Apellidos'].':</span> 
              </p>
              <div>
            
              <table  style="border-spacing: inherit;border-collapse: collapse; ">  
              <tr>
                <td style="padding: 0 2.5em; text-align: center;">
                  <div class="row" >
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                            <label for="delegacion" style="color:#3498db">Fecha de registro: </label><br>
                            <label name="delegacion" id="delegacion" class="text">'.$Fechareg.'</label>
                            </div>
                          </div>
                          <div class="col-md-6 px-1">
                            <div class="form-group">
                            <label for="localidad" style="color:#3498db">Código: </label><br>
                            <label name="localidad" id="localidad" class="text">'.$rand.'</label>
                            </div>
                          </div>
                      </div>
            
                      
                    </td>        
              </tr> 
              <tr>
                <td style="padding: 0 2.5em; text-align: center;">
                  <hr>
                  <div class="row" >
                      <div class="col-md-12 pr-1">
                          <div class="form-group">
                          <label for="estado" style="color:#3498db">Nombre del taller: </label><br>
                          <label name="estado" id="est" class="text">'.$NombreT.'</label>
                          </div>
                        </div>
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                        <label for="estado" style="color:#3498db">Estado: </label><br>
                        <label name="estado" id="est" class="text">'.$Est.' </label>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                          <div class="form-group">
                          <label for="delegacion" style="color:#3498db">Delegacion: </label><br>
                          <label name="delegacion" id="delegacion" class="text">'.$Mun.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                          <label for="localidad" style="color:#3498db">Localidad: </label><br>
                          <label name="localidad" id="localidad" class="text">'.$Est.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                          <label for="estado" style="color:#3498db">Calle: </label><br>
                          <label name="estado" id="est" class="text">'.$Calle.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                            <label for="delegacion" style="color:#3498db">Colonia: </label><br>
                            <label name="delegacion" id="delegacion" class="text">'.$Col.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 px-1">
                            <div class="form-group">
                            <label for="localidad" style="color:#3498db">CP: </label><br>
                            <label name="localidad" id="localidad" class="text">'.$CP.'</label>
                            </div>
                          </div>
                    </div>
              </td>       
              </tr>
              <tr>
                <td style="padding: 0 2.5em; text-align: center;">
                  <hr>
                  <div class="row" >
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                        <label for="estado" style="color:#3498db">Fecha del Servicio: </label><br>
                        <label name="estado" id="est" class="text">'.$FechaAct.' </label>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                          <div class="form-group">
                          <label for="delegacion" style="color:#3498db">Hora del servicio: </label><br>
                          <label name="delegacion" id="delegacion" class="text">'.$Hora.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                          <label for="localidad" style="color:#3498db">Vehiculo: </label><br>
                          <label name="localidad" id="localidad" class="text">'.$Vehiculo.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                          <label for="estado" style="color:#3498db">Modelo: </label><br>
                          <label name="estado" id="est" class="text">'.$Modelo.'</label>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                            <label for="delegacion" style="color:#3498db">Placas: </label><br>
                            <label name="delegacion" id="delegacion" class="text">'.$Placas.'</label>
                            </div>
                          </div>
                          <div class="col-md-4 px-1">
                            <div class="form-group">
                            <label for="localidad" style="color:#3498db">Año: </label><br>
                            <label name="localidad" id="localidad" class="text">'.$Anio.'</label>
                            </div>
                          </div>
                          <div class="col-md-12 pr-1">
                              <div class="form-group">
                              <label for="estado" style="color:#3498db">Descripcion del servicio: </label><br>
                              <label name="estado" id="est" class="text">'.$Descripcion. '</label>
                              </div>
                            </div>
                    </div>
              </td>       
              </tr>
             
             
        <tr>
          <td class="footer" style="padding: 20px 30px 15px 30px; background-color: aliceblue;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" style="padding: 20px 0 0 0;">
                  <div class="credits ml-auto">
                    <span class="copyright">
                      © <script>
                        document.write(new Date().getFullYear())
                      </script> Copyright <strong>Proyecto Automotriz</strong>. All Rights Reserved
                    </span><br>
                </td>
              </tr>         
            </table>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
            </td>
          </tr>
      </table>
      <![endif]-->
      </td>
    </tr>
  </table>'; 
    sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
    sendemail($mail_username,$mail_userpassword,$mail_setFromEmails,$mail_setFromName,$mail_addAddresss,$txt_messages,$mail_subjects,$template);//Enviar el mensaje        
    
    echo 2;
        }
        else{
            echo 1;
        }

?> 
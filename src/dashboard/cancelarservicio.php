<?php
date_default_timezone_set('America/Mexico_City');
session_start();
$email = $_COOKIE['Correo'];
require_once __DIR__ . '/../../config.php'; 
include BASE_DIR . '/includes/db.php';
include BASE_DIR . '/includes/sendmail.php';
//VARIABLES
$Id = $_POST['id'];
$Nivel = $_COOKIE['Nivel'];

$querys = "SELECT * FROM servicios WHERE id_servicio= '$Id'";
$searchs = mysqli_query($db,$querys); 
$match  = mysqli_num_rows($searchs);
    if($match > 0){
        while ($valores = mysqli_fetch_array($searchs)) { 
          if($Nivel == 'cliente')
          {
          $Taller = $valores[2];  
          }
          else
          {
          $Cliente = $valores[1];  
          }
          $Fecha = $valores[3];
          $Codigo = $valores[10];
        }
        if($Nivel == 'cliente')
        {
        $queryC = "SELECT * FROM usuarios WHERE id_empresa = '$Taller'";
        }
        else
        {
          $queryC = "SELECT * FROM usuarios WHERE id_usuario = '$Cliente'";
        }
        $searchC = mysqli_query($db,$queryC); 
        while ($valoresC = mysqli_fetch_array($searchC)) { 
            $Nombre = $valoresC[2];
            $Apellidos = $valoresC[3];
            $CorreoE = $valoresC[4];
        }
        $FechaAct = date("d/m/Y",strtotime($Fecha));
        $update = "UPDATE servicios SET status='1' WHERE id_servicio='$Id'";
        mysqli_query($db,$update)
        or die ("ERROR AL CONECTAR");
        mysqli_close($db);
        //CORREO USUARIO
        $mail_username="proyectoautomotriz2020@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
        $mail_userpassword="proyecto2020";//Tu contraseña de gmail
        $mail_addAddress=$email;//correo electronico que recibira el mensaje
        $template="../../views/dashboard/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
        
        /*Inicio captura de datos enviados por $_POST para enviar el correo */
        $mail_setFromEmail = $email;
        $mail_setFromName = "Automotriz";            
        $mail_subject = 'Servicio | Cancelar'; // Give the email a subject 
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
                    <span>Acabas de cancelar el servicio con el siguiente ID:</span> 
                    </p>
                    <div>
                  
                    <table  style="border-spacing: inherit;border-collapse: collapse; ">  
                    <tr>
                      <td style="padding: 0 2.5em; text-align: center;">
                        <div class="row" >
                              <div class="col-md-6 pl-1">
                                  <div class="form-group">
                                  <label for="delegacion" style="color:#3498db">Fecha de servicio: </label><br>
                                  <label name="delegacion" id="delegacion" class="text">'.$FechaAct.'</label>
                                  </div>
                                </div>
                                <div class="col-md-6 px-1">
                                  <div class="form-group">
                                  <label for="localidad" style="color:#3498db">Código: </label><br>
                                  <label name="localidad" id="localidad" class="text">'.$Codigo.'</label>
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
          //CORREO EMPRESA
          $mail_usernames="proyectoautomotriz2020@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
          $mail_userpasswords="proyecto2020";//Tu contraseña de gmail
          $mail_addAddresss = $CorreoE;//correo electronico que recibira el mensaje
          $templates="../../views/dashboard/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
          
          /*Inicio captura de datos enviados por $_POST para enviar el correo */
          $mail_setFromEmails = $CorreoE;
          $mail_setFromNames = "Automotriz";            
          $mail_subjects = 'Servicio | Cancelado'; // Give the email a subject 
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
                      <span>Estimad@: '.$Nombre.' '.$Apellidos.' </span> <br>
                      <span>A continuación se muestra el servicio que fue cancelado con el siguiente ID:</span> 
                      </p>
                      <div>
                    
                      <table  style="border-spacing: inherit;border-collapse: collapse; ">  
                      <tr>
                        <td style="padding: 0 2.5em; text-align: center;">
                          <div class="row" >
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                    <label for="delegacion" style="color:#3498db">Fecha de servicio: </label><br>
                                    <label name="delegacion" id="delegacion" class="text">'.$FechaAct.'</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6 px-1">
                                    <div class="form-group">
                                    <label for="localidad" style="color:#3498db">Código: </label><br>
                                    <label name="localidad" id="localidad" class="text">'.$Codigo.'</label>
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
          sendemail($mail_usernames,$mail_userpasswords,$mail_setFromEmails,$mail_setFromNames,$mail_addAddresss,$txt_messages,$mail_subjects,$templates);//Enviar el mensaje
                echo 2;
            }
            else{
                echo 1;
            }


?> 
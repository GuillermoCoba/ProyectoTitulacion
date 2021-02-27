function verificarPasswords() {
 
  // Ontenemos los valores de los campos de contraseñas 
  pass1 = document.getElementById('pw');
  pass2 = document.getElementById('repw');

  // Verificamos si las constraseñas no coinciden 
  if (pass1.value != pass2.value) {

      // Si las constraseñas no coinciden mostramos un mensaje 
      document.getElementById("error").classList.add("mostrar");

      return false;
  } else {
    if(t == 0){return false;}else{
      // Si las contraseñas coinciden ocultamos el mensaje de error
      document.getElementById("error").classList.remove("mostrar");

      // Mostramos un mensaje mencionando que las Contraseñas coinciden 
      document.getElementById("ok").classList.remove("ocultar");

      // Desabilitamos el botón de login 
      document.getElementById("login").disabled = true;

      // Refrescamos la página (Simulación de envío del formulario) 
      setTimeout(function() {
          location.reload();
      }, 3000);

      return true;}
  }
  
}

var check = document.getElementById('agree-term'); 
var habilitar = document.getElementById('signup'); 
check.addEventListener("change", hab, false);
function hab (){
  if(check.checked){
    habilitar.disabled = false;
  }
  else{
    habilitar.disabled = true;
  }
}
var vala;
  function val(){
    vala = 1;
    document.getElementById('nomaux').innerHTML='';
    document.getElementById('apeaux').innerHTML='';
    document.getElementById('emailaux').innerHTML='';
    document.getElementById('pwaux').innerHTML='';
    document.getElementById('repwaux').innerHTML='';
    pass1 = document.getElementById('pw');
    pass2 = document.getElementById('repw');

    if (document.fvalida.nombre.value.length==0){
      document.getElementById('nomaux').innerHTML=' (Tiene que escribir su nombre)';
          vala = 0;
     }
     if (document.fvalida.apellidos.value.length==0){
      document.getElementById('apeaux').innerHTML=' (Tiene que escribir sus apellidos)';
          vala = 0;
     }
     if (document.fvalida.email.value.length==0){
      document.getElementById('emailaux').innerHTML=' (Tiene que escribir su email)';
          vala = 0;
     }else{
      emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i ;
      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
      if (emailRegex.test(document.fvalida.email.value)) {
  
      } else {
        document.getElementById('emailaux').innerHTML=' (email incorrecto)';
        vala = 0;
      }
     }
     if (document.fvalida.pw.value.length==0){
      document.getElementById('pwaux').innerHTML=' (Tiene que escribir su contraseña)';
          vala = 0;
     }
     
     if (document.fvalida.repw.value.length==0){
      document.getElementById('repwaux').innerHTML=' (Tiene que escribir su contraseña)';
          vala = 0;
          
     }
  
     if ((pass1.value != pass2.value)&&(pass1.value1!=""&&pass2.value!="")) {
      document.getElementById('repwaux').innerHTML=' (No son iguales sus contraseñas)';
      vala = 0;
      }   

    if(vala == 0){
      return 0;
    }
  }
  
     
  


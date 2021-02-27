function preguntar(val){
    swal({
      title: "Cancelación",
    text: "¿Estas seguro que quieres cancelar?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Sí",
    cancelButtonText: 'No',
    closeOnConfirm: false,
          }).then(
    function(isConfirm) {
        if (isConfirm) {
          $.ajax({
        type:"POST",
        url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/cancelarservicio.php?",
        data:"id="+val,
        success:function(r){
          if(r==1){
              swal({
          title: "¡ERROR!",
          text: "",
          type: "error",
        });}
            else{
                  swal({
        title: "EXITO!",
        text: "Servicio cancelado",
        type: "success"
                  }).then(
        function(isConfirm) {
            if (isConfirm) {
              window.location.reload();
            }
        });          
            }
        }
    });
    }
  });
  }
  function preguntarA(val){
    swal({
      title: "Conclusión",
    text: "¿Estas seguro que desear concluir el servicio?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-check",
    confirmButtonText: "Sí",
    cancelButtonText: 'No',
    closeOnConfirm: false,
          }).then(
    function(isConfirm) {
        if (isConfirm) {
          $.ajax({
        type:"POST",
        url:"https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/terminarservicio.php?",
        data:"id="+val,
        success:function(r){
          if(r==1){
              swal({
          title: "¡ERROR!",
          text: "",
          type: "error",
        });}
            else{
                  swal({
        title: "EXITO!",
        text: "Servicio Concluido",
        type: "success"
                  }).then(
        function(isConfirm) {
            if (isConfirm) {
              window.location.reload();
            }
        });          
            }
        }
    });
    }
  });
  }
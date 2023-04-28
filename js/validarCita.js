$(document).ready(function () {
    $("#btnAceptarHabilApr").click(function () {
        var fechaUno=$("#fechaini").val();
        var fechaDos=$("#fechafin").val();
       
        if (fechaUno<=fechaDos) {
           $.ajax({
            url: '../../../controlador/agenda_controlador.php?action=habilitarAgenda',
             data: $("#frmHabilitar").serialize(),
            type: 'POST',
            success: function (resultado) {
              
                if (resultado == 1) {
                  $("#notificarHabilitarAge").modal("show");  
                 $("#btnCerrarHabil").click(function () {

                     window.location = "consultarAprendiz_vista.php";                    
                   }); 
                }
                if (resultado == 0) {
                   
                   $("#notificarErrorFinde").modal("show");  
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
        }
        else{
             $("#notificarErrorFechaMal").modal("show");  

        }

    });

  $("#btnAceptarAgendar").click(function () {    
    var agenda=$("#CitasDis").val();
    if(agenda!=0 &&agenda!=null){

$.ajax({
url:'../../../controlador/agenda_controlador.php?action=agendarcita',
data:$("#frmAgendarCita").serialize(),
type:'POST',
success: function (resultado) {
if(resultado==1){

   $("#notificarAgendarcita").modal("show");  
    $("#btnCerrarAgendarCita").click(function () {

   window.location = "Aprendices_vista.php";                    
           }); 
}
else{

    $("#notificarErrorAgendarCita").modal("show");  
}

},
 error: function (error) {
  console.log(error);
            }

});
    }else{
     $("#notificarErrorfrmCita").modal("show");  

    }

      
      });
});
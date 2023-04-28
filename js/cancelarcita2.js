function citaId(cita){
$('#cancelarCita').modal('show');
$('#idcita').val(cita);
//$("input[name='correo']").val(cita);
//$("input[name='idcita']").value(cita);

//$("input[name='idcita']").val(cita);
}
function alertcita(){

	var idcita=$('#idcita').val();
	var cuerpot=$('#motivo').val();

	 $.ajax({
            url: '../../../controlador/citas_controlador.php?action=cancelarCita',
            data: {idcita:idcita,cuerpo:cuerpot},
            type: 'POST',
            success: function (resultado) {

                alert("Buena");
            },
            error: function (error) {
                console.log(error);
            }
        })
}

function enviarCita(cita){

    var idcita=$('#idcita').val();
    //var cuerpot=$('#motivo').val();

     $.ajax({
            url: '../../../controlador/citas_controlador2.php?action=listarJefe',
            data: {idcita:idcita},
            type: 'POST',
            success: function (resultado) {
                $("input[name='correo']").val(resultado);

                alert("Buena");
            },
            error: function (error) {
                console.log(error);
            }
        })
}

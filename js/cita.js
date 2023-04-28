function agendarcita(){


$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/departamentos_modelo.php',
	data: {'peticion':'departamentos_modelo'}
})
.done(function(){
alert('se ha agendado la cita exitosamente');

})
.fail(function(){

alert('No se ha podido agendar la cita')
})




}
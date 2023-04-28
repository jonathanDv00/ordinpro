$(document).ready(function(){


$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/departamentos_modelo.php',
	data: {'peticion':'departamentos_modelo'}
})
.done(function(listas_departamentos){
$('#cbx_dep').html(listas_departamentos)

})
.fail(function(){

alert('hubo un error a cargar los departamentos')
})

$('#cbx_dep').on('change', function(){

var id= $('#cbx_dep').val()
$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/municipios_modelo.php',
	data: {'id_dep':id}
})
.done(function(listas_municipios){
$('#cbx_mun').html(listas_municipios)

})
.fail(function(){

alert('hubo un error a cargar los municipios')
})

})

$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/tipoDocumento_modelo.php',
	data: {'peticion':'tipoDocumento_modelo'}
})
.done(function(lista_documentos){
$('#cbx_tipodoc').html(lista_documentos)

})
.fail(function(){

alert('hubo un error a cargar los documnetos')
})
$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/coordinacion_modelo.php',
	data: {'peticion':'coordinacion_modelo'}
})
.done(function(lista_coordinacion){
$('#cbx_coordi').html(lista_coordinacion)

})
.fail(function(){

alert('hubo un error a cargar las coordinaciones')
})

$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/tipoDeCarreras_modelo.php',
	data: {'peticion':'tipoDeCarreras_modelo'}
})
.done(function(lista_carreras){
$('#cbx_carrera').html(lista_carreras)

})
.fail(function(){

alert('hubo un error a cargar las Carreras')
})

$('#cbx_carrera,#cbx_coordi').on('change', function(){
	var idCarrera= $('#cbx_carrera').val()
var idCoordinacion= $('#cbx_coordi').val()

$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/ProgramasDeFormacion_modelo.php',
	data: {'id_carrera':idCarrera,'idCoordinacion':idCoordinacion}
	
})
.done(function(listas_programas){
$('#cbx_programa').html(listas_programas)

})
.fail(function(){

alert('hubo un error a cargar los programas')
})
})
$('#cbx_mun').on('change', function(){

var idmun= $('#cbx_mun').val()

$.ajax({

	type: 'post',
	url: '../../../modelo/combobox/zonas_modelo.php',
	data: {'id_mun':idmun}
})
.done(function(listas_zonas){
$('#cbx_zona').html(listas_zonas)

})
.fail(function(){

alert('hubo un error a cargar las zonas')
})
})

$('#cbx_zona').on('change', function(){

var idzona= $('#cbx_zona').val()

$.ajax({

	type: 'post',
	url: '../../../modelo/combobox/barrios_modelo.php',
	data: {'id_zona':idzona}
})
.done(function(listas_barrios){
$('#cbx_barrio').html(listas_barrios)

})
.fail(function(){

alert('hubo un error a cargar las zonas')
})
})

$('#cbx_barrio').on('change', function(){

var idbarrio= $('#cbx_barrio').val()

$.ajax({

	type: 'post',
	url: '../../../modelo/combobox/empresas_modelo.php',
	data: {'id_barrio':idbarrio}
})
.done(function(listas_empresas){
$('#cbx_enteCof').html(listas_empresas)

})
.fail(function(){

alert('hubo un error a cargar las zonas')
})
})

$('#cbx_enteCof').on('change', function(){

var id_empresa= $('#cbx_enteCof').val()

$.ajax({

	type: 'post',
	url: '../../../modelo/combobox/jefeInmediatos_modelo.php',
	data: {'id_ente':id_empresa}
})
.done(function(listas_jefes){
$('#cbx_jefeInme').html(listas_jefes)

})
.fail(function(){

alert('hubo un error a cargar las zonas')
})
})

$.ajax({
	type: 'post',
	url: '../../../modelo/combobox/estadoDelAprendiz_modelo.php',
	data: {'peticion':'estadoDelAprendiz_modelo'}
})
.done(function(listas_estadoDelAprendiz){
$('#cbx_estado').html(listas_estadoDelAprendiz)

})
.fail(function(){

alert('hubo un error a cargar los estados')
})

 
})







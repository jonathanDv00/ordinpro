
function validarConMayus(inputText) {
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out.toUpperCase();
}

function validarNumeros(inputText) {
    var out = '';
    var filtro = '1234567890';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out;
}
function validarDrcion(inputText) {
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890#-. ';
    for (var i = 0; i < inputText.length; i++) {
        if (filtro.indexOf(inputText.charAt(i)) != -1) {
            out += inputText.charAt(i);
        }
    }
    return out.toUpperCase();
}
function validarDocumento(documento) {
    validando = 0;
    $.ajax({
        url: '../../../controlador/aprendiz_controlador.php',
        data: {documentoEnvi: documento, action: "consultarAprDocumento"},
        type: 'POST',
        success: function (resultado) {

            if (resultado == 1) {
                validando = 1;
                document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un aprendiz con ese documento';
                alert(validando);
            }
        }
    })
    return validando;
}
$(document).ready(function () {
    $("#btnCrearAprendiz").click(function () {
        var nombreAprendiz = $('#nombre').val();
        var departamento = $('#cbx_dep').val();
        var apellido = $('#apellido').val();
        var email = $('#correo').val();
        var documento = $('#documento').val();
        var fechaNa = $('#fechaNa').val();
        var telefeno = $('#telefeno').val();
        var celular = $('#celular').val();
        var ficha = $('#ficha').val();
        var direccion = $('#direccion').val();
        var tipoDoc = $('#cbx_tipodoc').val();
        var municipio = $('#cbx_mun').val();
        var zona = $('#cbx_zona').val();
        var barrio = $('#cbx_barrio').val();
        var carrera = $('#cbx_carrera').val();
        var coordinacion = $('#cbx_coordi').val();
        var programa = $('#cbx_programa').val();
        var empresa = $('#cbx_enteCof').val();
        var jefeIn = $('#cbx_jefeInme').val();
        var validando = 0;

/*
        $.ajax({
            url: '../../../controlador/aprendiz_controlador.php',
            data: {CorreoEnvi: email, action: "consultarAprCorreo"},
            type: 'POST',
            success: function (resultado) {

                if (resultado == 1) {
                    document.getElementById('mensajeCorreo').innerHTML = 'Error ya existe un aprendiz con ese correo';
                }
                if (resultado == 0) {
                    document.getElementById('mensajeCorreo').innerHTML = '';
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
        $.ajax({
            url: '../../../controlador/aprendiz_controlador.php',
            data: {documentoEnvi: documento, action: "consultarAprDocumento"},
            type: 'POST',
            success: function (resultado) {

                if (resultado == 1) {

                    document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un aprendiz con ese documento';
                }
                if (resultado == 0) {
                    document.getElementById('mensajeDocumento').innerHTML = '';
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
*/
        if (nombreAprendiz == 0 || apellido == 0 || email == 0 || departamento == 0 || documento == 0 || fechaNa == 0 || telefeno == 0 ||
                celular == 0 || ficha == 0 || direccion == 0 || tipoDoc == 0 || municipio == 0 || zona == 0 || barrio == 0 ||
                carrera == 0 || coordinacion == 0 || programa == 0 || empresa == 0 || jefeIn == 0 ) {
         
    $("#aprendizCreadoErrorModal").modal("show");  

            if (nombreAprendiz == 0) {
                document.getElementById('mensajeNombre').innerHTML = 'Falta ingresar el campo nombre';
            } else {
                document.getElementById('mensajeNombre').innerHTML = '';
            }
            if (departamento == 0) {
                document.getElementById('mensajeDepartamento').innerHTML = 'Falta seleccionar un departamento';
            } else {
                document.getElementById('mensajeDepartamento').innerHTML = '';
            }
            if (apellido == 0) {
                document.getElementById('mensajeApellidos').innerHTML = 'Falta ingresar el campo apellidos';
            } else {
                document.getElementById('mensajeApellidos').innerHTML = '';
            }
            if (email == 0||email==null) {
                document.getElementById('mensajeCorreo').innerHTML = 'Falta ingresar el campo correo';
            } else {
                document.getElementById('mensajeCorreo').innerHTML = '';
            }
            if (documento == 0||documento==null) {
                document.getElementById('mensajeDocumento').innerHTML = 'Falta ingresar el campo Documento';
            } else {
                document.getElementById('mensajeDocumento').innerHTML = '';
            }
            if (fechaNa == 0) {
                document.getElementById('mensajeFechaNa').innerHTML = 'Falta ingresar la fecha de nacimiento';
            } else {
                document.getElementById('mensajeFechaNa').innerHTML = '';
            }
            if (telefeno == 0) {
                document.getElementById('mensajeTelefeno').innerHTML = 'Falta el telefeno';
            } else {
                document.getElementById('mensajeTelefeno').innerHTML = '';
            }
            if (celular == 0) {
                document.getElementById('mensajeCelular').innerHTML = 'Falta el celular';
            } else {
                document.getElementById('mensajeCelular').innerHTML = '';
            }
            if (ficha == 0) {
                document.getElementById('mensajeFicha').innerHTML = 'Falta el numero de ficha';
            } else {
                document.getElementById('mensajeFicha').innerHTML = '';
            }
            if (direccion == 0) {
                document.getElementById('mensajeDireccion').innerHTML = 'Falta el direccion';
            } else {
                document.getElementById('mensajeDireccion').innerHTML = '';
            }
            if (tipoDoc == 0) {
                document.getElementById('mensajeTipodocumento').innerHTML = 'Falta seleccionar un tipo de documento';
            } else {
                document.getElementById('mensajeTipodocumento').innerHTML = '';
            }
            if (municipio == 0 || municipio == null) {
                document.getElementById('mensajeMunicipio').innerHTML = 'Falta seleccionar un municipio';
            } else {
                document.getElementById('mensajeMunicipio').innerHTML = '';
            }
            if (zona == 0 || zona == null) {
                document.getElementById('mensajeZona').innerHTML = 'Falta seleccionar una zona';
            } else {
                document.getElementById('mensajeZona').innerHTML = '';
            }
            if (barrio == 0 || barrio == null) {
                document.getElementById('mensajeBarrio').innerHTML = 'Falta seleccionar un barrio';
            } else {
                document.getElementById('mensajeBarrio').innerHTML = '';
            }
            if (carrera == 0) {
                document.getElementById('mensajeCarrera').innerHTML = 'Falta seleccionar una carrera';
            } else {
                document.getElementById('mensajeCarrera').innerHTML = '';
            }
            if (coordinacion == 0) {
                document.getElementById('mensajeCoordinacion').innerHTML = 'Falta seleccionar una coordinacion';
            } else {
                document.getElementById('mensajeCoordinacion').innerHTML = '';
            }
            if (programa == 0 || programa == null) {
                document.getElementById('mensajePrograma').innerHTML = 'Falta seleccionar un programa de formación';
            } else {
                document.getElementById('mensajePrograma').innerHTML = '';
            }
            if (empresa == 0 || empresa == null) {
                document.getElementById('mensajeEmpresa').innerHTML = 'Falta seleccionar un entecoformador';
            } else {
                document.getElementById('mensajeEmpresa').innerHTML = '';
            }
            if (jefeIn == 0 || jefeIn == null) {
                document.getElementById('mensajeJefe').innerHTML = 'Falta seleccionar un jefe inmediato';
            } else {
                document.getElementById('mensajeJefe').innerHTML = '';
            }

        } else {

            if (nombreAprendiz.length > 25) {
                document.getElementById('mensajeNombre').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            else {
                document.getElementById('mensajeNombre').innerHTML = '';
            }

            if (apellido.length > 25) {
                document.getElementById('mensajeApellidos').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeApellidos').innerHTML = '';
            }

            if (documento.length > 25) {
                document.getElementById('mensajeDocumento').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeDocumento').innerHTML = '';
            }

            if (telefeno.length > 15) {
                document.getElementById('mensajeTelefeno').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeTelefeno').innerHTML = '';
            }

            if (celular.length > 15) {
                document.getElementById('mensajeCelular').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeCelular').innerHTML = '';
            }

            if (ficha.length > 10) {
                document.getElementById('mensajeFicha').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeFicha').innerHTML = '';
            }

            if (direccion.length > 25) {
                document.getElementById('mensajeDireccion').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeDireccion').innerHTML = '';
            }

            if (email.length > 45) {
                document.getElementById('mensajeCorreo').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }else {
                document.getElementById('mensajeCorreo').innerHTML = '';
            }
            document.getElementById('mensajeJefe').innerHTML = '';
            document.getElementById('mensajeEmpresa').innerHTML = '';
            document.getElementById('mensajePrograma').innerHTML = '';
            document.getElementById('mensajeCoordinacion').innerHTML = '';
            document.getElementById('mensajeBarrio').innerHTML = '';
            document.getElementById('mensajeZona').innerHTML = '';
            document.getElementById('mensajeTipodocumento').innerHTML = '';
            document.getElementById('mensajeDepartamento').innerHTML = '';
            document.getElementById('mensajeCarrera').innerHTML = '';
            document.getElementById('mensajeMunicipio').innerHTML = '';
            if (validando == 0) {
            
                $.ajax({
                    url: '../../../controlador/aprendiz_controlador.php',
                    data: {CorreoEnvi: email, action: "consultarAprCorreo"},
                    type: 'POST',
                    success: function (resultado) {

                        if (resultado == 1) {
                            validandoR = 1;
                    document.getElementById('mensajeCorreo').innerHTML = 'Error ya existe un aprendiz con ese correo';

                        }
                        if (resultado == 0) {
                            validandoR = 0;
                    document.getElementById('mensajeCorreo').innerHTML = '';

                        }
                        $.ajax({
                            url: '../../../controlador/aprendiz_controlador.php',
                            data: {documentoEnvi: documento, action: "consultarAprDocumento"},
                            type: 'POST',
                            success: function (resultado) {

                                if (resultado == 1) {
                                    validar2 = 2;
                    		document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un aprendiz con ese documento';

                                }
                                if (resultado == 0) {
                                    validar2 = 0;
                    		document.getElementById('mensajeDocumento').innerHTML = '';

                                }

                                
                                if (validandoR == 0 && validar2 == 0) {

                                    $.ajax({
                                        url: '../../../controlador/aprendiz_controlador.php?action=crearAprendiz',
                                        data: $("#frmCrearAprendiz").serialize(),
                                        type: 'POST',
                                        success: function (resultado) {
                                            if (resultado == 1) {
                                                $("#aprendizCreadoExitosoModal").modal("show"); 
                                               	  $("#btnCerrarAprX").click(function () {
                                               	  	window.location = "formatoManual.php";
                                             	  })
                                             	   $("#btnCerrarApr").click(function () {
                                             	   	window.location = "formatoManual.php";
                                             	  })
                                            } else {
                                                $("#aprendizCreadoErrorModal").modal("show");  
                                            }
                                        },
                                        error: function (error) {
                                            console.log(error)
                                        }

                                    })
                                } else {
                                    $("#aprendizCreadoErrorModal").modal("show");  
                                }
                            }
                        })


                    }

                })



            } else {
                $("#aprendizCreadoErrorModal").modal("show");  
            }
        }
     
    })


})



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

function validarDocumento(documento) {
    validando = 0;
    $.ajax({
        url: '../../../controlador/jefesInmediato_controlador.php',
        data: {documentoEnvi: documento, action: "consultarJefeDocumento"},
        type: 'POST',
        success: function (resultado) {

            if (resultado == 1) {
                validando = 1;
                document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un Jefe inmediato con ese documento';
                alert(validando);
            }
        }
    })
    return validando;
}
$(document).ready(function () {
    $("#btnCrearJefes").click(function () {
       
        var nombre = $('#NdocJefe').val();
        var departamento = $('#cbx_dep').val();
        var apellido = $('#apellidos').val();
        var email = $('#correo').val();
        var documento = $('#NdocJefe').val();
        var celular = $('#CelularJefe').val();
        var tipoDoc = $('#cbx_tipodoc').val();
        var municipio = $('#cbx_mun').val();
        var zona = $('#cbx_zona').val();
        var barrio = $('#cbx_barrio').val();
        var empresa = $('#cbx_enteCof').val();
        

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
        if (nombre == 0 || apellido == 0 || email == 0 || departamento == 0 || documento == 0 ||
                celular == 0 || tipoDoc == 0 || municipio == 0 || zona == 0 || barrio == 0 ||
                empresa == 0) {

            $("#jefeCreadoErrorModal").modal("show");

            if (nombre == 0) {
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
                document.getElementById('mensajeApellido').innerHTML = 'Falta ingresar el campo apellidos';
            } else {
                document.getElementById('mensajeApellido').innerHTML = '';
            }
            if (email == 0 || email == null) {
                document.getElementById('mensajeCorreo').innerHTML = 'Falta ingresar el campo correo';
            } else {
                document.getElementById('mensajeCorreo').innerHTML = '';
            }
            if (documento == 0 || documento == null) {
                document.getElementById('mensajeDocumento').innerHTML = 'Falta ingresar el campo Documento';
            } else {
                document.getElementById('mensajeDocumento').innerHTML = '';
            }


            if (celular == 0) {
                document.getElementById('mensajeCelular').innerHTML = 'Falta el celular';
            } else {
                document.getElementById('mensajeCelular').innerHTML = '';
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


            if (empresa == 0 || empresa == null) {
                document.getElementById('mensajeEmpresa').innerHTML = 'Falta seleccionar un entecoformador';
            } else {
                document.getElementById('mensajeEmpresa').innerHTML = '';
            }
        } else {
            
            var validando = 0;
            if (nombre.length > 25) {
                document.getElementById('mensajeNombre').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (apellido.length > 25) {
                document.getElementById('mensajeApellidos').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }        

            if (celular.length > 15) {
                document.getElementById('mensajeCelular').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
                if (email.length > 45) {
                    document.getElementById('mensajeCorreo').innerHTML = "Ingresaste mas caracteres de lo permitido";
                    validando = 1;
                }

          
                if (validando == 0) {
                       
                    $.ajax({
                        url: '../../../controlador/jefesInmediato_controlador.php',
                        data: {CorreoEnvi: email, action: "consultarJefeCorreo"},
                        type: 'POST',
                        success: function (resultado) {
                           var  validandoR =-1;
                           var validar2 =-1;
                            if (resultado == 1) {
                                validandoR = 1;
                                document.getElementById('mensajeCorreo').innerHTML = 'Error ya existe un usuario  con ese correo';

                            }
                            if (resultado == 0) {
                                validandoR = 0;
                                document.getElementById('mensajeCorreo').innerHTML = '';

                            }
                            $.ajax({
                                url: '../../../controlador/jefesInmediato_controlador.php',
                                data: {documentoEnvi: documento, action: "consultarJefeDocumento"},
                                type: 'POST',
                                success: function (resultado) {

                                    if (resultado == 1) {
                                        validar2 = 2;
                                        document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un jefe inmediato con ese documento';

                                    }
                                    if (resultado == 0) {
                                        validar2 = 0;
                                        document.getElementById('mensajeDocumento').innerHTML = '';

                                    }


                                    if (validandoR == 0 && validar2 == 0) {

                                        $.ajax({
                                            url: '../../../controlador/jefesInmediato_controlador.php?action=crearjefeimediato',
                                            data: $("#frmCrearjefe").serialize(),
                                            type: 'POST',
                                            success: function (resultado) {
                                                                                                if (resultado == 1) {
                                                    $("#JefeinmediatoCreadoExitosoModal").modal("show");
                                                    $("#btnCerrarjefer").click(function () {
                                                        window.location = "jefeInmediato_vista.php";
                                                    })
                                                    }
                                                    else {
                                                    $("#jefeCreadoErrorModal").modal("show");
                                                }
                                            },
                                            error: function (error) {
                                                console.log(error)
                                            }

                                        })
                                    } else {
                                        $("#jefeCreadoErrorModal").modal("show");
                                    }
                                }
                            })


                        }

                    })



                } else {
                    $("#jefeCreadoErrorModal").modal("show");
                }
            
        }

    })


})
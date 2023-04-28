
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
        url: '../../../controlador/instructor_controlador.php',
        data: {documentoEnvi: documento, action: "consultarInsDocumento"},
        type: 'POST',
        success: function (resultado) {

            if (resultado == 1) {
                validando = 1;
                document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un Instructor Con ese numero de documento con ese documento';
                alert(validando);
            }
        }
    })
    return validando;
}
$(document).ready(function () {
    $("#btnCrearinstructor").click(function () {
        var nombre = $('#Nomins').val();
        var apellido1 = $('#apellido1').val();
        var apellido2 = $('#apellido2').val();
        var email = $('#correo').val();
        var documento = $('#NdocInstructor').val();
        var celular = $('#celular').val();
        var tipoDoc = $('#cbx_tipodoc').val();
        var coordinacion = $('#cbx_coordi').val();


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
        if (nombre == 0 || apellido1 == 0 || email == 0 || apellido2 == 0 || documento == 0 ||
                celular == 0 || tipoDoc == 0 || coordinacion == 0) {

            $("#instructorCreadoErrorModal").modal("show");

            if (nombre == 0) {
                document.getElementById('mensajeNombre').innerHTML = 'Falta ingresar el campo nombre';
            } else {
                document.getElementById('mensajeNombre').innerHTML = '';
            }
            if (apellido1 == 0) {
                document.getElementById('mensajeApellido1').innerHTML = 'Falta ingresar el campo apellidos';
            } else {
                document.getElementById('mensajeApellido1').innerHTML = '';
            }
            if (apellido2 == 0) {
                document.getElementById('mensajeApellido2').innerHTML = 'Falta ingresar el campo apellidos';
            } else {
                document.getElementById('mensajeApellido2').innerHTML = '';
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
            if (coordinacion == 0 || coordinacion == null) {
                document.getElementById('mensajeCoordinacion').innerHTML = 'Falta seleccionar una coordinacion';
            } else {
                document.getElementById('mensajeCoordinacion').innerHTML = '';
            }



        } else {
            var validando = 0;
            if (nombre.length > 25) {
                document.getElementById('mensajeNombre').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (apellido1.length > 25) {
                document.getElementById('mensajeApellidos1').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (apellido2.length > 25) {
                document.getElementById('mensajeApellidos2').innerHTML = "Ingresaste mas caracteres de lo permitido";
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
                    url: '../../../controlador/instructor_controlador.php',
                    data: {CorreoEnvi: email, action: "consultarinsCorreo"},
                    type: 'POST',
                    success: function (resultado) {


                        if (resultado == 1) {
                            validandoR = 1;
                            document.getElementById('mensajeCorreo').innerHTML = 'Error ya existe un usuario  con ese correo';

                        }
                        if (resultado == 0) {
                            validandoR = 0;
                            document.getElementById('mensajeCorreo').innerHTML = '';

                        }
                        $.ajax({
                            url: '../../../controlador/instructor_controlador.php',
                            data: {documentoEnvi: documento, action: "consultarInsDocumento"},
                            type: 'POST',
                            success: function (resultado) {

                                if (resultado == 1) {
                                    validar2 = 2;
                                    document.getElementById('mensajeDocumento').innerHTML = 'Error ya existe un instructor  con ese documento';

                                }
                                if (resultado == 0) {
                                    validar2 = 0;
                                    document.getElementById('mensajeDocumento').innerHTML = '';

                                }


                                if (validandoR == 0 && validar2 == 0) {


                                    $.ajax({
                                        url: '../../../controlador/instructor_controlador.php?action=crearinstructor',
                                        data: $("#frmCrearinstructor").serialize(),
                                        type: 'POST',
                                        success: function (resultado) {
                                        
                                            if (resultado == 1) {
                                               
                                                $("#instructorCreadoExitosoModal").modal("show");
                                                $("#btnCerrarinstr").click(function () {
                                                    window.location = "RegistroInstructorDeSeguimiento.php";
                                                })

                                            } else {
                                               
                                                $("#instructorCreadoErrorModal").modal("show");
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
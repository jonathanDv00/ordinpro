
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

function validarNit(nit) {
    validando = 0;
    $.ajax({
        url: '../../../controlador/enteconformador_controlador.php',
        data: {nitEnvi: nit, action: "consultarnit"},
        type: 'POST',
        success: function (resultado) {

            if (resultado == 1) {
                validando = 1;
                document.getElementById('mensajeNit').innerHTML = 'Error ya existe un ente conformador con ese nit';
                alert(validando);
            }
        }
    })
    return validando;
}
$(document).ready(function () {
    $("#btnCrearEnte").click(function () {
        var nit = $('#NitEmpresa').val();
        var nombre = $('#NomEmpresa').val();
        var departamento = $('#cbx_dep').val();
        var telefono = $('#Telefono').val();
        var email = $('#correo').val();
        var celular = $('#CelularEnte').val();
        var municipio = $('#cbx_mun').val();
        var zona = $('#cbx_zona').val();
        var barrio = $('#cbx_barrio').val();
        var direccion = $('#DireccionEmpresa').val();
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
        if (nombre == 0 || nit == 0 || email == 0 || departamento == 0 || telefono == 0 ||
                celular == 0 || direccion == 0 || municipio == 0 || zona == 0 || barrio == 0 
                ) {

            $("#enteCreadoErrorModal").modal("show");

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
            if (nit == 0) {
                document.getElementById('mensajeNit').innerHTML = 'Falta ingresar el campo nit';
            } else {
                document.getElementById('mensajeNit').innerHTML = '';
            }
            if (email == 0 || email == null) {
                document.getElementById('mensajeCorreo').innerHTML = 'Falta ingresar el campo correo';
            } else {
                document.getElementById('mensajeCorreo').innerHTML = '';
            }
            if (telefono == 0 || telefono == null) {
                document.getElementById('mensajeTelefono').innerHTML = 'Falta ingresar el campo Telefono';
            } else {
                document.getElementById('mensajeTelefono').innerHTML = '';
            }


            if (celular == 0) {
                document.getElementById('mensajeCelular').innerHTML = 'Falta el celular';
            } else {
                document.getElementById('mensajeCelular').innerHTML = '';
            }

            if (direccion == 0) {
                document.getElementById('mensajeDireccion').innerHTML = 'Falta ingresar el campo direccion';
            } else {
                document.getElementById('mensajeDireccion').innerHTML = '';
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


            


        } else {
             var validando = 0;
            if (nombre.length > 25) {
                document.getElementById('mensajeNombre').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (nit.length > 25) {
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
                        url: '../../../controlador/enteconformador_controlador.php',
                        data: {CorreoEnvi: email, action: "consultarentecorreo"},
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
                                url: '../../../controlador/enteconformador_controlador.php',
                                data: {nitEnvi: nit, action: "consultarnit"},
                                type: 'POST',
                                success: function (resultado) {

                                    if (resultado == 1) {
                                        validar2 = 2;
                                        document.getElementById('mensajeNit').innerHTML = 'Error ya existe un ente conformador con ese nit';

                                    }
                                    if (resultado == 0) {
                                        validar2 = 0;
                                        document.getElementById('mensajeNit').innerHTML = '';

                                    }


                                    if (validandoR == 0 && validar2 == 0) {

                                        $.ajax({
                                            url: '../../../controlador/enteconformador_controlador.php?action=crearenteconformador',
                                            data: $("#frmCrearente").serialize(),
                                            type: 'POST',
                                            success: function (resultado) {
                                                if (resultado == 1) {
                                                    $("#enteCreadoExitoModal").modal("show");
                                                    $("#btnCerrarente").click(function () {
                                                        window.location = "enteCoformador_vista.php";
                                                    })
                                                    $("#btnCerrarente").click(function () {
                                                        window.location = "enteCoformador_vista.php";
                                                    })
                                                } else {
                                                    $("#enteCreadoErrorModal").modal("show");
                                                }
                                            },
                                            error: function (error) {
                                                console.log(error)
                                            }

                                        })
                                    } else {
                                        $("#enteCreadoErrorModal").modal("show");
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
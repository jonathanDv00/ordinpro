$(document).ready(function () {
    $("#btnAceptarActuaApr").click(function () {

        var idaprendiz = $('#idap').val();
        var nombreAprendiz = $('#nombre_aprACT').val();
        var apellido = $('#apellidos_aprACT').val();
        var email = $('#txtCorreo').val();
        var documento = $('#documento_aprACT').val();
        var celular = $('#celular_aprACT').val();
        var direccion = $('#direccion_aprACT').val();
        var validando = 0;
        
        if (nombreAprendiz == 0 || apellido == 0 || email == 0 || documento == 0 ||
                celular == 0 || direccion == 0) {

            alert("El formulario debe llenarse completo");
            if (nombreAprendiz == 0) {
                document.getElementById('mensajeNombre').innerHTML = 'Falta ingresar el campo nombre';
            } else {
                document.getElementById('mensajeNombre').innerHTML = '';
            }
            if (apellido == 0) {
                document.getElementById('mensajeApellidos').innerHTML = 'Falta ingresar el campo apellidos';
            } else {
                document.getElementById('mensajeApellidos').innerHTML = '';
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

            if (direccion == 0) {
                document.getElementById('mensajeDireccion').innerHTML = 'Falta el direccion';
            } else {
                document.getElementById('mensajeDireccion').innerHTML = '';
            }

        } else {
            if (nombreAprendiz.length > 25) {
                document.getElementById('mensajeNombre').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (apellido.length > 25) {
                document.getElementById('mensajeApellidos').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (documento.length > 25) {
                document.getElementById('mensajeDocumento').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (celular.length > 15) {
                document.getElementById('mensajeCelular').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (direccion.length > 25) {
                document.getElementById('mensajeDireccion').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (email.length > 45) {
                document.getElementById('mensajeCorreo').innerHTML = "Ingresaste mas caracteres de lo permitido";
                validando = 1;
            }
            if (validando == 0) {
            	var validandoR=-1;
            	var validar2=-1

                $.ajax({
                    url: '../../../controlador/aprendiz_controlador.php',
                    data: {CorreoEnvia: email,idapren:idaprendiz ,action: "consultarAprCorreoActualizar"},
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
                            data: {documentoEnvia: documento,idapren:idaprendiz , action: "consultarAprDocumentoActualizar"},
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
                                        url: '../../../controlador/aprendiz_controlador.php?action=actualizarAprendiz',
                                        data: $("form").serialize(),
                                        type: 'POST',
                                        success: function (resultado) {
                                            if (resultado >0) {
                                                $("#notificarActualizarApr").modal("show");
                                            } else {
                                                $("#notificarErrorActualizarApr").modal("show");  
                                            }
                                        },
                                        error: function (error) {
                                            console.log(error)
                                        }

                                    })
                                } else {
                                    $("#notificarErrorActualizarApr").modal("show");                                  
                                }
                            }
                        })


                    }

                })

            }

        }
        /*
         $.ajax({
         url: '../../../controlador/aprendiz_controlador.php?action=actualizarAprendiz',
         data: $("#frmActualizarApr").serialize(),
         type: 'POST',
         success: function (resultado) {
         if (resultado > 0) {                                        	
         $("#notificarActualizarApr").modal("show");                                              	  
         } else {
         //  $("#aprendizCreadoErrorModal").modal("show");  
         alert('no se actualizo');
         }
         },
         error: function (error) {
         console.log(error)
         }
         
         })*/


    })

})


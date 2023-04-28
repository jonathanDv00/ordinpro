function logear() {

    var correo = $('#email').val();
    var contra = $('#password').val();

    if (contra == 0 || correo == 0) {
        document.getElementById('mensajeErrorLogin').innerHTML = 'Debes ingresar Correo y contraseña';
    } else {

        $.ajax({
            url: '../controlador/usuario_controlador.php?action=loginUser',
            data: $("#frmLogin").serialize(),
            type: 'POST',
            success: function (resultado) {

                if (resultado == 0) {

                    document.getElementById('mensajeErrorLogin').innerHTML = 'Correo o contraseña incorrectos';
                }
                if (resultado == 1) {


                    window.location = "Administrador/paginaPrincipal.php";
                }
                if (resultado == 2) {

                    window.location = "html/Jefe inmediato/paginaJefe.php";
                }
                if (resultado == 3) {

                    window.location = "Instructor de seguimiento/perfilInstructor.php";
                }
                if (resultado == 4) {

                    window.location = "cambioContrasena.php";
                }

            }
        });

    }
    return false;
}

function cambiarContraseñaPri() {



    var contrasenaUno = $('#contrasenaNueva').val();
    var contrasenaDos = $('#contrasenaConfirmar').val();
    var id = $('#hdnId').val();

    if (contrasenaUno == 0 || contrasenaDos == 0) {

    } else {

        if (contrasenaUno != contrasenaDos) {
            alert("contraseñas no coinciden");
        } else {

            if (contrasenaUno.length < 8) {
                alert("debes ingresar una contraseña con mas de 7 caracteres");

            } else {
                var caracteres = 0;
                var numeros = 0;
                var validando = 0;

                for (var x = 0; x < contrasenaUno.length; x++) {


                    if (!isNaN(contrasenaUno.charAt(x))) {
                        numeros = 1;

                    }
                    if (isNaN(contrasenaUno.charAt(x))) {
                        caracteres = 1;

                    }
                }
                validando = numeros + caracteres;

                if (validando == 2) {

                    
                    $.ajax({
                        url: '../controlador/usuario_controlador.php',
                        data: {contrasena:contrasenaUno, iduser:id, action:"CambioPass"},
                        type: 'POST',
                        success: function (resultado) {
                            
                            if (resultado == 1) {
                                alert("se ha cambiado la contraseña exitosamente");
                                window.location = "login.php";
                            }
                            if (resultado == 0) {
                                alert("Error no se pudo cambiar la contraseña");
                            }

                        }
                    });


                } else {
                    alert("la contraseña debe incluir caracteres y numeros");

                }
            }

        }

    }
    return false;
}


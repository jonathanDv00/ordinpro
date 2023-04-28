<?php
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 
$idaprendiz=$_GET['idap'];

require_once("../../../controlador/aprendiz_controlador.php");
$datos=new aprendiz_controlador();
//$datos->actualizarAprendiz($idaprendiz);


foreach ($datos->llenarcampo($idaprendiz) as $ape) {
   $nombre=$ape['nombre_apr'];
   $apellidos=$ape['apellidos_apr'];
   $numdoc=$ape['num_doc_apr'];
   $celular=$ape['celular_apr'];
   $direccion=$ape['direccion_apr'];
   $correo=$ape["correo_institucional_apr"];
}

?>


<?php 
//require '../../../modelo/database.php';


/*
$sqlNombre_ap="SELECT nombre_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtNombre_ap=$conn->prepare($sqlNombre_ap);
$stmtNombre_ap->execute();

$sqlTipoDoc_ap="SELECT `tipo de documento_id_tipodoc` FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtTipoDoc_ap=$conn->prepare($sqlTipoDoc_ap);
$stmtTipoDoc_ap->execute();

$sqlApellidos_ap="SELECT apellidos_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtApellidos_ap=$conn->prepare($sqlApellidos_ap);
$stmtApellidos_ap->execute();

$sqlNumDoc_ap="SELECT num_doc_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtNumDoc_ap=$conn->prepare($sqlNumDoc_ap);
$stmtNumDoc_ap->execute();


$sqlCelular_ap="SELECT celular_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtCelular_ap=$conn->prepare($sqlCelular_ap);
$stmtCelular_ap->execute();

$sqlDireccion_ap="SELECT direccion_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtDireccion_ap=$conn->prepare($sqlDireccion_ap);
$stmtDireccion_ap->execute();
*/

?>
<!DOCTYPE html>
<html>

<head>

    <title>Ordinpro-pagina-principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento2.css">

    <link rel="stylesheet" href="../../../img/fonts/style.css">
</head>

<body background="../../../img/fondoabs.jpg">

    <div class="container-fluid ">
        <div class="row align-items-center bg-blue ">
            <div class="col-lg-3">
                <img class="imagen" src="../../../img/logo.jpg " alt="">
            </div>
            <div class=" menuPerfil col-lg-4 offset-5  ">
                <div class="row">
                    <h6 class="mt-2"><span class="icon-user-circle-o"></span> David Julian Perez Fernandez</h6>
                    <span class="icon-bell1 ml-4 mt-2"></span>
                    <ul class="nav mb-4">
                        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle"
                                data-toggle="dropdown"><span class="icon-cog ml-4"></span></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Ver cuenta</a>               
                                <a href="../../../controlador/usuario_controlador.php?action=desconectarse" class="dropdown-item">Cerrar seccion</a>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="main row">
            <div class="menuDesplegable col-sm-2">
                <div>
                 <li><a href="../paginaPrincipal.php"><span class="icon-home"></span>Inicio</a></li>
                <li><a href=""><span class="icon-calendar"></span>Calendario</a></li>
                <div id="acordion">
                    
                    <li><a href="#uno" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-calendar-check-o"></span>Habilitar
                            agenda</a></li>
                    <div id="uno" class="collapse ">
                        
                        <li><a href=""><span class="icon-building"></span>Buscar empresa</a></li>
                        <li><a href=""><span class="icon-location-pin"></span>Zona empresarial</a></li>
                    </div>
                </div>
                <div id="acordion">

                    <li><a href="#dos" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-o"></span>Aprendices</a>
                    </li>
                    <div id="dos" class="collapse ">
                        <div id="acordion">
                                <li><a href="consultarAprendiz_vista.php"><span class="icon-search"></span>Consultar aprendiz</a></li>
                            <li><a href="#tres" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-plus"></span>Crear
                                    registro</a></li>
                            <div id="tres" class="collapse ">
                                <li><a href="formatoManual.php"><span class="icon-edit1"></span>Manual</a></li>
                                <li><a href="formatoplano.html"><span class="icon-share-alternitive"></span>Formato plano</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <li><a href=""><span class="icon-envelope-o"></span>Mensajes</a></li>
                <div id="acordion">
                    <li><a href="#cuatro" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-users1"></span>Usuarios</a>
                    </li>
                    <div id="cuatro" class="collapse ">
                        <li><a href="#subcuatro" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-add-user"></span>Crear
                                usuario</a></li>
                        <div id="subcuatro" class="collapse ">
                            <li><a href="../usuario/jefeInmediato_vista.php"><span class=""></span>Jefe Inmediato</a></li>
                            <li><a href="../usuario/RegistroInstructorDeSeguimiento.php"><span class=""></span>Instructor</a></li>
                        </div>
                    </div>
                    <div id="cuatro" class="collapse ">
                            <li><a href="#subcuatro1" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-search"></span>consultar
                                    usuario</a></li>
                            <div id="subcuatro1" class="collapse ">
                                <li><a href="../usuario/consultarjefeimediato.php"><span class="icon-address-book-o"></span>Jefe Inmediato</a></li>
                                <li><a href="../usuario/consultarinstructor_vista.php"><span class="icon-address-book-o"></span>Instructor</a></li>
                            </div>
                        </div>
                </div>
                <div id="acordion">
                    
                    <li><a href="#cinco" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-building"></span>Ente
                            coformador</a></li>
                    <div id="cinco" class="collapse ">
                        <li><a href="../entecoformador/enteCoformador_vista.php"><span class=" icon-plus-square"></span>Registrar Ente </a></li>
                        <li><a href="../entecoformador/consultarenteconformador.php"><span class=" icon-search"></span>Consultar Ente </a></li>
                    </div>
                </div>
                <li><a href=""><span class="icon-wpforms"></span>Reportes</a></li>
            </div>
            <div class="VentanaProcesos col-lg-10 shadow-lg p-4 mb-5  ">
                <div class="row mensaje">
                    <div class="offset-lg-4  ">
                        <h4>Actualizar datos del aprendiz</h4>
                    </div>

                </div>
                <div class="row linea2 ">

                </div >
                <br>

                <div class="row">
                    <div class="col-12">
<!--action="../../../controlador/aprendiz_controlador.php?action=actualizarAprendiz"-->
                        <form  id="frmActualizarApr" method="POST" class="actualizarInstructor  col-12">
                            <div class="row">
                                <div class="col-4">
                                    <br>
                                    <input type="hidden" name="idap" id="idap" value="<?php echo $idaprendiz; ?>">
                                    <div ><span class="icon-search"></span>
                                        Tipo de documento:
                                        <select class="custom-select" id="cbx_tipodoc" name="tipoDoc">

                                        </select>
                                    </div>
                                    <br>
                                    <span class="icon-user-circle-o"></span>
                                    <label for="nombre_aprACT">Nombre del aprendiz:</label>
                                    <input type="text" id="nombre_aprACT" name="nombre_aprACT" 
                                        class="form-control" value="<?php echo $nombre;?>" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeNombre" style="color: red"></p>
                                        <br>

                                    <label for="apellidos_aprACT">Apellidos aprendiz:</label>
                                    <input type="text" id="apellidos_aprACT" name="apellidos_aprACT" 
                                        class="form-control" value="<?php echo $apellidos;?>" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeApellidos" style="color: red"></p>
                                        <br>
                                        <span class="icon-credit-card"></span>

                                        <label for="documento_aprACT">Correo del aprendiz:</label>
                                    <input type="text" id="txtCorreo" name="txtCorreo" 
                                        class="form-control" value="<?php echo $correo;?>" maxlength="45" ><p id="mensajeCorreo" style="color: red"></p>

                                    <label for="documento_aprACT">Documento del aprendiz:</label>
                                    <input type="text" id="documento_aprACT" name="documento_aprACT" 
                                        class="form-control" value="<?php echo $numdoc?>" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeDocumento" style="color: red"></p>
                                </div>
                              
                                <div class="col-4">
                                   <br>
                                   <div class="">
                                            Estado:
                                            <select class="custom-select" id="cbx_estado" name="estado">
                                            </select>
                                        </div>
                                        <br>
                                        <span class="icon-old-mobile"></span>

                                    <label for="celular_aprACT">Celular:</label>
                                    <input type="text" id="celular_aprACT" name="celular_aprACT" value="<?php echo $celular ?>"
                                        class="form-control" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeCelular" style="color: red"></p>
                                   
                                    
                                        <br>

                                        <div class=""> <span class="icon-building"></span>
                                                Ente coformador:
                                                <select class="custom-select" id="cbx_enteCof" name="ente">
                                                </select>
                                        </div>
                                        <br>
                                        <div class=""> <span class="icon-building"></span>
                                                Jefe inmediato:
                                                <select class="custom-select" id="cbx_jefeInme" name="jefe">
                                                </select>
                                        </div>
                                            <br>
                                            <label for="direccion_aprACT">Direccion:</label><input type="text" id="direccion_aprACT" name="direccion_aprACT" value="<?php echo $direccion ?>"
                                                class="form-control" onkeyup="this.value=validarDrcion(this.value)" maxlength="25"><br><p id="mensajeDireccion"></p>

                                       
                                    </div>


                                    <div class="col-4">
                                    <br>
                                    
                                    <div class="">
                                            Departamento:
                                            <select class="custom-select" id="cbx_dep" name="departamento">
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="">
                                            Municipio:
                                            <select class="custom-select" id="cbx_mun" name="municipio">
                                            </select>
                                        </div>
                                        <br>
                                    <div>
                                        Zona/localidad:
                                        <select class="custom-select" id="cbx_zona" name="zona">
                                        </select>
                                    </div>
                                    <br>
                                
                                    <div>
                                        Barrio:
                                        <select class="custom-select" id="cbx_barrio" name="barrio">
                                        </select>
                                    </div>
                              
                                    <div class="offset-2">

                              
                                    </div>
                                    
                                </div>
                               
                            </div>
                            </form>
                            <br>
                            <br>
                            <div class="row">
                                <div class="offset-4">
                                        <button class="btn btn-info" id="btnActualizarApr" data-toggle="modal" data-target="#preguntarActualizarApr">Actualizar</button>           
                                </div>
                                <div class="offset-2">
                                        <input type="submit" value="Cancelar" class="btn btn-danger" id="btnActualizarAprendiz">
                                </div>
                                   
                            </div>
                            <br>
                            
                        

                    </div>
                </div>

            </div>
        </div>
        <footer class="">
            <div class="offset-4 col-5 ">
                <p class="text-center">.:: Servicio Nacional de Aprendizaje SENA – Dirección General Calle 57 No. 8-69,
                    Bogotá D.C
                    PBX (57 1) 5461500
                    Línea gratuita de atención al ciudadano Bogotá 5925555 – Resto del país 018000 910270
                    Horario de atención: lunes a viernes de 8:00 am a 5:30 pm
                    Correo electrónico para notificaciones judiciales: servicioalciudadano@sena.edu.co
                    Todos los derechos reservados © 2019 ::.</p>
            </div>
        </footer>
    <?php require "../../modales/modales.php";?>
    
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  -->    
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script type="text/javascript" src="../../../js/index.js"></script>
    <script type="text/javascript" src="../../../js/validar.js"></script>
    <script type="text/javascript" src="../../../js/validarActualizarApr.js"></script>

</body>

</html>
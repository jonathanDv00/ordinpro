<?php
//error_reporting(0);
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 
require_once("../../../controlador/jefesInmediato_controlador.php");
$idjefe=$_GET['idjf'];
$datos=new jefesInmediato_controlador();
$datos->actualizarJefeInmediato();

foreach ($datos->llenarcampo($idjefe) as $jefe) {
   $numDocJf=$jefe['num_doc_jef'];
   $nombreJf=$jefe['nombre_jef'];
   $apellidosJf=$jefe['apellidos_jef'];
   $celularJf=$jefe['celular_jef'];
}
?>

<?php
/*$sqlNumDoc_jf="SELECT num_doc_jef FROM `jefe inmediato` WHERE id_jef='$idjefe'";
$stmtNumDoc_jf=$conn->prepare($sqlNumDoc_jf);
$stmtNumDoc_jf->execute();

$sqlNombre_jf="SELECT nombre_jef FROM `jefe inmediato` WHERE id_jef='$idjefe'";
$stmtNombre_jf=$conn->prepare($sqlNombre_jf);
$stmtNombre_jf->execute();

$sqlApellido_jf="SELECT apellidos_jef FROM `jefe inmediato` WHERE id_jef='$idjefe'";
$stmtApellido_jf=$conn->prepare($sqlApellido_jf);
$stmtApellido_jf->execute();

$sqlCelular_jf="SELECT celular_jef FROM `jefe inmediato` WHERE id_jef='$idjefe'";
$stmtCelular_jf=$conn->prepare($sqlCelular_jf);
$stmtCelular_jf->execute();*/
?>

<!DOCTYPE html>
<html>

<head>

  <title>Ordinpro-pagina-principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento2.css">
  
  <link rel="stylesheet" href="../../img/fonts/style.css">
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
        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="icon-cog ml-4"></span></a>
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
                                <li><a href="../aprendiz/consultarAprendiz_vista.php"><span class="icon-search"></span>Consultar aprendiz</a></li>
                            <li><a href="#tres" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-plus"></span>Crear
                                    registro</a></li>
                            <div id="tres" class="collapse ">
                                <li><a href="../aprendiz/formatoManual.php"><span class="icon-edit1"></span>Manual</a></li>
                                <li><a href="../aprendiz/formatoplano.html"><span class="icon-share-alternitive"></span>Formato plano</a></li>
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
                            <li><a href="jefeInmediato_vista.php"><span class=""></span>Jefe Inmediato</a></li>
                            <li><a href="RegistroInstructorDeSeguimiento.php"><span class=""></span>Instructor</a></li>
                        </div>
                    </div>
                    <div id="cuatro" class="collapse ">
                            <li><a href="#subcuatro1" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-search"></span>consultar
                                    usuario</a></li>
                            <div id="subcuatro1" class="collapse ">
                                <li><a href="consultarjefeimediato.php"><span class="icon-address-book-o"></span>Jefe Inmediato</a></li>
                                <li><a href="consultarinstructor_vista.php"><span class="icon-address-book-o"></span>Instructor</a></li>
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
          <div class="offset-lg-4 " >
            <h4>Actualizar datos del jefe Inmediato</h4>
                    </div>
                  
                </div>
                <div class="row linea ">

                    </div >
                <br>
                
                    <div class="row">
                            
                        <form action="" method="POST" class="actualizarInstructor offset-1 col-8">
                                <div class="row ">

                                        <div class="col-6">
                                          <br>
                                          <div class="">
                                            Tipo de documento:
                                            <select class="custom-select" id="cbx_tipodoc" name="tipoDoc">
                                
                                            </select>
                                          </div>
                                          <br>
                                          <label for="numDoc">Nùmero de documento:</label>
                                          <input type="text" id="numDoc" name="numDoc" class="form-control" value="<?php echo $numDocJf ?>">
                                          
                                          <label for="nomJefe">Nombre:</label>
                                          <input type="text" id="nomJefe" name="nomJefe" class="form-control" value="<?php echo $nombreJf ?>">
                                          
                                          <label for="apellidos">Apellidos:</label>
                                          <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $apellidosJf  ?>">
                                          
                                          <label for="cel">Celular:</label>
                                          <input type="text" id="cel" name="cel" class="form-control" value="<?php echo $celularJf ?>">
                                
                                          <br>
                                        </div>
                                        <div class="col-6">
                                          <br>
                                          <div class="">
                                            Departamento:
                                            <select class="custom-select" id="cbx_dep" name="departamento">
                                            </select>
                                          </div>
                                          <br>
                                          <div class="">
                                            Municipio:
                                            <select class="custom-select" id="cbx_mun" name="municipio">
                                            </select>
                                          </div>
                                          <br>
                                          <div>
                                            Zona/Localidad:
                                            <select  name="zona" id="cbx_zona" class="custom-select"></select>
                                          </div>
                                          <br>
                                          <div>
                                            Barrio:
                                            <select class="custom-select" id="cbx_barrio" name="barrio">
                                            </select>
                                          </div>
                                          <br>
                                          <div class="">
                                            ente coformador:
                                            <select class="custom-select" id="cbx_enteCof" name="enteCof">
                                            </select>
                                          </div>
                                          
                                          <br>
                                
                                        </div>
                    <br>
                  
                                     
                    </div>
                    <div class="row">
                      <div class="offset-4">
                          <input type="submit" value="Actualizar " class="btn btn-info mr-2">
                        </div>
                          <div class="offset-1">
                              <input type="submit" value="Cancelar" class="btn btn-danger">
                          </div>
                          
                         
                  </div>
                  <BR></BR>
                                     
                                      
                                    </form>
                                    <div class="col-3">
                                      <img src="../../../img/jefe.png" alt="" style="width: 200px; ">
                                                              </div>

                </div>
      </div>

    </div>
  </div>
<footer class="">
<div class="offset-4 col-5 ">
  <p class="text-center">.:: Servicio Nacional de Aprendizaje SENA – Dirección General Calle 57 No. 8-69, Bogotá D.C 
    PBX (57 1) 5461500 
      Línea gratuita de atención al ciudadano Bogotá 5925555 – Resto del país 018000 910270
      Horario de atención: lunes a viernes de 8:00 am a 5:30 pm
      Correo electrónico para notificaciones judiciales: servicioalciudadano@sena.edu.co
      Todos los derechos reservados © 2019 ::.</p>
    </div>
</footer>
    <script src="../../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../../js/index.js"></script>

</body>

</html>
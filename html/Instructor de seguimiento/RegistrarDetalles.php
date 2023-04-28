<?php $idcita=$_GET['idcita']; ?>
<!DOCTYPE html>
<html>

    <head>

        <title>Ordinpro-pagina-principal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/EstiloAgendamiento.css">
        <link rel="stylesheet" type="text/css" href="../../css/EstiloAgendamiento2.css">

        <link rel="stylesheet" href="../../img/fonts/style.css">
    </head>

    <body background="../img/fondoabs.jpg">

        <div class="container-fluid ">
            <div class="row align-items-center bg-blue ">
                <div class="col-lg-3">
                    <img class="imagen" src="../../img/logo.jpg " alt="">
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
                                    <a href="../../controlador/usuario_controlador.php?action=desconectarse" class="dropdown-item">Cerrar seccion</a>
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
                            <h4>Registrar de talles</h4>
                        </div>

                    </div>
                    <div class="row linea2 ">

                    </div >
                    <br>
                    <form>

                    </form>

                    <div class="row">
                        <div class="col-12">

                            <form action="../../controlador/detallesdelacita_controlador.php?action=crearDetalles" method="post" class="">
                                <div class="registar   col-11" style="margin-left: 25px;">

                                    <div class="row " style="margin: 2px; ">

                            <input type="hidden" name="idcita" id="idcita" value="<?php echo $idcita; ?>">

                                        <div class=" col-4" style="margin-top: 50px">
                                            <div class="form-group row">
                                                <label for="" class="col-5">N# de acta :</label>
                                                <div class="col-6"><input type="text" class="form-control form-control-sm" name="numeroacta" id="numeroacta"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-5">Hora de inicio :</label>
                                                <div class="col-6"><input type="time" class="form-control form-control-sm" name="horainicio" id="horainicio"></div>
                                            </div>

                                        </div>


                                        <div class="col-4" style="margin-top: 50px">

                                            <div class="form-group row">
                                                <label for="" class="col-4">Hora final :</label>
                                                <div class="col-5"><input type="time" class="form-control form-control-sm"name="horafin" id="horafin"></div>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="col-4" style="margin-top: 50px">
                                            <div class="form-group row">
                                                <label for="" class="col-4">Fecha :</label>
                                                <div class="col-12">
                                                    <input class="form-control" type="date" name="fecha" step="1" min="1950-01-01"
                                                           max="2019-12-31" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                            </div>


                                        </div>




                                    </div>
                                    <div class="row" style="margin: 2px; ">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="" class="col-3">Tema de la reunion :</label>
                                                <textarea class=" form-control" id="" rows="2" name="tema" id="tema"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row " style="margin: 2px;">
                                        <div class=" col-12 ">
                                            <div class=" form-group green-border-focus ">
                                                <label for="">Objetivo(s) de la reunion</label>
                                                <textarea class=" form-control" id="objectivo" name="objectivo" rows="2"></textarea>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row " style="margin: 2px;">
                                        <div class=" col-12 ">
                                            <div class=" form-group green-border-focus">

                                                <center><h5 style="color: rgb(78, 78, 78)">Desarrollo de la reunion</h5></center>


                                                <br>

                                                <textarea class="form-control" id="desarrollo" name="desarrollo" rows="4"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row " style="margin: 2px;">
                                        <div class=" col-12 ">
                                            <div class=" form-group green-border-focus">
                                                <div class="">
                                                    <center><h5 style="color:  rgb(78, 78, 78)">Conclusiones</h5></center>



                                                </div>
                                                <textarea class="form-control" id="conclusiones" rows="4" name="conclusiones"></textarea>
                                            </div>


                                            <div class="card-header ">
                                                <a href="#dos" class="card-link Compromisos " data-toggle="collapse"   data-parent="#acordion"><center><h5>Compromisos</h5></center></a>
                                            </div>
                                            <div id="dos" class="collapse show " >
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Actividad</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="actividad" name="actividad" rows="4"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Responsable</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="comresponsable" rows="4" name="comresponsable"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Fecha</h6>
                                                                </center>
                                                            </div>
                                                            <br>	
                                                            <br>	

                                                            <div class="col-12">
                                                                <input class="form-control" type="date" name="fechacompro" step="1" min="1950-01-01"
                                                                       max="2019-12-31" value="<?php echo date('Y-m-d');?>">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>


                                            <div class="card-header ">
                                                <a href="#dos" class="card-link Compromisos " data-toggle="collapse"   data-parent="#acordion"><center><h5>Asistentes</h5></center></a>
                                            </div>
                                            <div id="dos" class="collapse show " >
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Nombres</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="nombreasistente" rows="4" name="nombreasistente"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Cargo/Dependencia</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="cargoasis" name="cargoasis" rows="4"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Entidad</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="entidadasis" name="entidadasis" rows="4"></textarea>

                                                        </div>
                                                    </div>

                                                </div>




                                            </div>

                                            <div class="card-header ">
                                                <a href="#dos" class="card-link Compromisos " data-toggle="collapse"   data-parent="#acordion"><center><h5>Invitados</h5></center></a>
                                            </div>
                                            <div id="dos" class="collapse show " >
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Nombre</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="nombreinvi" rows="4" name="nombreinvi"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Cargo</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="cargoinvi" name="cargoinvi" rows="4"></textarea>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mensaje">
                                                                <center>
                                                                    <h6 style="color: white">Entidad</h6>
                                                                </center>
                                                            </div>
                                                            <textarea class="form-control" id="entidadinvi" name="entidadinvi" rows="4"></textarea>

                                                        </div>
                                                    </div>

                                                </div>

                                                <hr>

                                                <input type="submit" value="Registrar" class="btn btn-success">				</div>
                                            <br>
                                            <br>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <br>
                                </div>



                                </div>

                                </div>
                                </div>
                                </div>
                                <footer class="col-12">
                                    <div class="offset-4 col-5 " >
                                        <p class="text-center">.:: Servicio Nacional de Aprendizaje SENA – Dirección General Calle 57 No. 8-69,
                                            Bogotá D.C
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



<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 


?>
<html>

<head>

	<title>Ordinpro-pagina-principal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
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
			<div class="VentanaProcesos col-md-10 shadow-lg p-3 mb-5  rounded">
					<div class="row">
							<div class="offset-5 mensaje">
							<h5>Registro formulario Intructor de seguimiento</h5>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="offset-2 col-5">
								<div>
										<form method="POST" id="frmCrearinstructor">
								       
								        
                                             Tipo de documento:<select name="tipodocumento" id="cbx_tipodoc">
                                             </select><p id="mensajeTipodocumento" style="color: red"></p> 
                                             <br><br>
									
                                      
								       	<br>
										<label for="NdocInstructor">Numero de documento:</label><input type="text" id="NdocInstructor" name="documento" 
										class="form-control" value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeDocumento" style="color: red"></p>      

										<label for="NomInstructor">Nombre(s):</label><input type="text" id="Nomins"
										class="form-control" name="nombre" value="" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeNombre" style="color: red" ></p>   

										<label for="PrimerApellidoInstructor">Primer apellido:</label><input type="text"
										id="apellido1" class="form-control" name="primerapellido" value="" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeApellido1" style="color: red"></p>   

										<label for="SegundoApellidoInstructor">Segundo apellido:</label><input type="text"
										id="apellido2" class="form-control" name="segundoapellido2" value="" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeApellido2" style="color: red"></p>  

										<label for="CorreoElectronicoInstructor">Correo electronico:</label><input type="text"
										id="correo" class="form-control" name="email"><p id="mensajeCorreo" value="" maxlength="45"  style="color: red"></p>

										<label for="CelularInstructor">Celular:</label><input type="text" id="celular"
										class="form-control" name="celular" value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeCelular" style="color: red"></p>   
										<br>
					    
                                         Coordinacion:<select name="coordinacion" id="cbx_coordi">
                                         </select><p id="mensajeCoordinacion" style="color: red"></p>  
                                        <br>
                                        <br>
									<div>
									
								
										</div>
									
										</form>
                                    <button class="btn btn-success" id="btnCrearinstructor">Crear Instructor de seguimiento</button>

									</div>
									
								</div>
							</div>
					</div>
			</div>

		</div>
	</div>
	    <?php require "../../modales/modales.php";?>
    
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  -->    
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script type="text/javascript" src="../../../js/index.js"></script>
<script type="text/javascript" src="../../../js/validarinstructor.js"></script>

</body>

</html>
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
						<h5>Formulario registro jefe Inmediato</h5>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="offset-1 col-6">

						<div class="formularioJefe">
							<div>
								<form method="POST" id="frmCrearjefe">

							        <div>
									Tipo de documento:
									<select class="custom-select" name="tipoDoc"  id="cbx_tipodoc">
										
									</select><p id="mensajeTipodocumento" style="color: red"></p> 
								</div>
								
									<br>
							        <div>
							        	<label for="NdocJefe">Numero de documento:</label>
									    <input type="text" id="NdocJefe" name="numDoc" class="form-control"value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeDocumento" style="color: red"></p>      
									    
							        </div>
									
									<div>
										<label for="NomJefe">Nombre(s) :</label>
									    <input type="text" id="NomJefe" name="nomJefe" class="form-control" value="" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeNombre" style="color: red" ></p>   
									    
									</div>

									<div>
										<label for="apellidos">Apellidos:</label>
									    <input type="text" id="apellidos"  name="apellidos" class="form-control"value="" onkeyup="this.value=validarConMayus(this.value)" maxlength="25"><p id="mensajeApellido" style="color: red"></p>   
									  
									</div>
									
									
									<div>
										<label for="CorreoElectronicoJefe">Correo electronico:</label>
									    <input type="text" id="correo" name="email" class="form-control"><p id="mensajeCorreo" value="" maxlength="45"  style="color: red"></p>
									  
									</div>

									<div>
										<label for="Celularjefe">Celular:</label>
									    <input type="text" id="CelularJefe" name="cel" class="form-control" value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="15"><p id="mensajeCelular" style="color: red"></p>   
									    
									</div>									
									<br>
								<div>	
									 Departamento:
                                    <select class="custom-select" name="departamento" id="cbx_dep">
                                
                                    </select><p id="mensajeDepartamento" style="color: red"></p>
                                   
                                </div>
                                <br>
                                <div>
                                    Municipio:
                                    <select class="custom-select" name="municipio" id="cbx_mun">
                                    
                                    </select><p id="mensajeMunicipio" style="color: red"></p>  
                                    
                                </div>
                                <br>

                                <div>
                                    Zona/Localidad:
                                    <select class="custom-select" name="zona" id="cbx_zona"></select>
                                    <p id="mensajeZona" style="color: red"></p>    
                                        
                                </div>
                                <br>
                                <div>
                                    Barrio:
                                    <select class="custom-select" name="barrio" id="cbx_barrio">
                                    
                                    </select><p id="mensajeBarrio" style="color: red"></p>
                                   
                                    <br>
                                     
                                    <br>

                                </div>
                                <br>
                                <div>
									Ente coformador:
									<select class="custom-select" name="enteCof" id="cbx_enteCof">
									
									</select><p id="mensajeEmpresa" style="color: red"></p>
								</div>
                                <br>
								 
							       

							        <div>
									
		
								</div>

								</form>
                                    <button class="btn btn-success" id="btnCrearJefes">Crear Jefe inmediato</button>
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
<script type="text/javascript" src="../../../js/validarjefe.js"></script>
</body>

</body>

</html>
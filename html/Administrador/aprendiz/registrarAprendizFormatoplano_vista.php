<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 
else{
$idus=$_SESSION['users_id'];/*
require_once'../../controlador/usuario_controlador.php';
$validar=new usuario_controlador();
$validar->DetectarIn($idus);*/

}


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
				<li><a href="paginaPrincipal.php"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="calendario/calendario.php"><span class="icon-calendar"></span>Calendario</a></li>
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
								<li><a href="aprendiz/consultarAprendiz_vista.php"><span class="icon-search"></span>Consultar aprendiz</a></li>
							<li><a href="#tres" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-plus"></span>Crear
									registro</a></li>
							<div id="tres" class="collapse ">
								<li><a href="aprendiz/formatoManual.php"><span class="icon-edit1"></span>Manual</a></li>
								<li><a href="aprendiz/formatoplano.html"><span class="icon-share-alternitive"></span>Formato plano</a></li>
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
							<li><a href="usuario/jefeInmediato_vista.php"><span class=""></span>Jefe Inmediato</a></li>
							<li><a href="usuario/RegistroInstructorDeSeguimiento.php"><span class=""></span>Instructor</a></li>
						</div>
					</div>
					<div id="cuatro" class="collapse ">
							<li><a href="#subcuatro1" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-search"></span>consultar
									usuario</a></li>
							<div id="subcuatro1" class="collapse ">
								<li><a href="usuario/consultarjefeimediato.php"><span class="icon-address-book-o"></span>Jefe Inmediato</a></li>
								<li><a href="usuario/consultarinstructor_vista.php"><span class="icon-address-book-o"></span>Instructor</a></li>
							</div>
						</div>
				</div>
				<div id="acordion">
					
					<li><a href="#cinco" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-building"></span>Ente
							coformador</a></li>
					<div id="cinco" class="collapse ">
						<li><a href="entecoformador/enteCoformador_vista.php"><span class=" icon-plus-square"></span>Registrar Ente </a></li>
						<li><a href="entecoformador/consultarenteconformador.php"><span class=" icon-search"></span>Consultar Ente </a></li>
					</div>
				</div>
				<li><a href=""><span class="icon-wpforms"></span>Reportes</a></li>
			</div>
			<div class="VentanaProcesos col-lg-10 shadow-lg p-3 mb-5  ">
				<div class="row mensaje">
					<div class="offset-lg-5 ">
						<h4>Formato Plano</h4>
					</div>
				</div>
				<div class="row linea3 ">
					<form id="frmFormatoPlano" method="POST" action="../../../controlador/aprendiz_controlador.php?action=registrarformatoPlano" enctype="multipart/form-data">
						<label>Seleccione su archivo excel</label><input type="file" name="excelApr" id="excelApr">

					<button type="submit">Cargar</button>

					</form>

					
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

</body>

</html>
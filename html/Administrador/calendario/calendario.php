<?php 
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
}
//$ida=$_GET['idap']; 
//$_SESSION['idaprendiz']=$ida;
$iduser=$_SESSION['users_id'];
//require_once'../../../controlador/citas_controlador.php';
//$cita=new citas_controlador();
//echo $cita->tabla();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Calendario Interectivo</title>

	<link rel="stylesheet" type="text/css" href="../../../css/calendar.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
				<li><a href="calendario.php"><span class="icon-calendar"></span>Calendario</a></li>
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
			<div class="VentanaProcesos col-lg-10 shadow-lg p-3 mb-5  ">
				<div class="row mensaje">
					<div class="offset-lg-5 ">
						<h4>Calendario</h4>
					</div>
				</div>
				<div class="row linea2 ">

                </div>

                
  <div class="container-fluid">
  
  <br>
  
        <div class="row calendar1 " style="margin:20px;">
          
        <!-- ----------codigo del calendario---------- -->
      
  <!-- 
      tiene que agregar la clase calendar1 que esta en EstiloAgendamiento -->
  
  
  <br>
  <br>
  <div class="col-12">
      <div class="mr-8">
  <div class="calendar">
      <div class="calendar info">
          <div class="calendar prev" id="prev-month"><span class="icon-chevron-left mr-4"></span></div>
          <div class="calendar month" id="month"></div>
          <div class="calendar year" id="year"></div>
          <div class="calendar next" id="next-month"><span class="icon-chevron-right mr-4"></span></div>
  
      </div>
  
  <div class="calendar week">
      <div class="calendar day calendar_ _ item">Lu</div>
      <div class="calendar day calendar_ _ item">Ma</div>
      <div class="calendar day calendar_ _ item">Mi</div>
      <div class="calendar day calendar_ _ item">Ju</div>
      <div class="calendar day calendar_ _ item">Vi</div>
      <div class="calendar day calendar_ _ item">Sa</div>
      <div class="calendar day calendar_ _ item">Do</div>
  </div>
  <div class="calendar dates" id="dates"></div>
  
  </div>
  </div>
  <br>
  <br>
      <?php 
  //echo '<input type="hidden" name"idaprendiz" id="idaprendiz" value="'.$ida.'"/>';
   ?>
   <form method="POST" action="">
   
  
  
  
   <div class="offset-1">
  
   </div>
  
  
  </div>
  <br>

 
  <div class=" col-12">
  <table class="table">
    <thead class="" style="  	background: #312f2e; color: azure ">
      <tr>
      	<th>id</th>
        <th>Fecha de la cita</th>
        <th>Hora inicio</th>
        <th>Hora final</th>
        <th>Aprendiz</th>
        <th>Jefe inmediato</th>
        <th>Empresa</th>
        <th>Direccion</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody id="tabla">
    	
      
    </tbody>
  </table>
  
  
  </div>
  
  
  </div>
  
  
  
          
  
  <!-- ----------fin del codigo calendario ---------------- -->
  
  
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




</div>
  



<?php require"../../modales/modal.php"?>
	<script src="../../../js/jquery-3.4.1.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  -->    
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/popper.min.js"></script>
<script type="text/javascript" src="../../../js/calendarioCancelarCita.js"></script>
<script type="text/javascript" src="../../../js/cancelarcita2.js"></script>
</body>
</html>
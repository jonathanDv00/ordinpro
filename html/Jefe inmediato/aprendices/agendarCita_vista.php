<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
}
$ida=$_GET['idap']; 
//$_SESSION['idaprendiz']=$ida;

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
    <div class="row align-items-center bg-blue  ">
      <div class="col-lg-3">
        <img class="imagen" src="../../../img/logoOrdinpro.png " alt="">
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


  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ordinpro</a>
    <div class="navbar-nav text-center mr-auto ml-auto">
      <a class="nav-item nav-link " href="../paginaJefe.php">Inicio </a>
      <a class="nav-item nav-link " href="#">Calendario</a>
      <a class="nav-item nav-link " href="Aprendices_vista.php">Aprendices</a>
      <a class="nav-item nav-link " href="#">Notificacion</a>
    </div>
  </nav>

  <br>
  <br>

  <div class="container-fluid">
  <div class="row">
	<div class=" col-11 linea4" style="margin-left:60px;">
<center><h4 style="color: white;"><span class="icon-calendar-check-o mr-4"></span>Agendamiento de citas</h4></center>
	</div>

</div>
<br>

      <div class="row " style="margin-left:60px;">
        
	  <!-- ----------codigo del calendario---------- -->
    
<!--     
    tiene que agregar la clase calendar1 que esta en EstiloAgendamiento -->


<br>
<br>
<div class=" calendar1  offset-2 col-7">
	<div class="mr-8">
<div class="calendar">
	<div class="calendar info">
		<div class="calendar prev" id="prev-month">&#9664;</div>
		<div class="calendar month" id="month"></div>
		<div class="calendar year" id="year"></div>
		<div class="calendar next" id="next-month">&#9654;</div>

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
echo '<input type="hidden" name"idaprendiz" id="idaprendiz" value="'.$ida.'"/>';
 ?>

 
<div class=" row ">
 <form method="POST" id="frmAgendarCita">
<div class="col-6"><label>Hora</label><select class="custom-select" name="CitasDis" id="CitasDis"></select>
<br>
<br>
 <input type="hidden" name="idaprendiz" id="idaprendiz" value="<?php echo $ida; ?>"/>;
 </form>
</div>


<br>
<br>
 
 <div class="offset-1">

 </div>
 <br>
 <br>

</div>
 <button class="btn btn-primary " value="Agendar cita " data-toggle="modal" data-target="#preguntarAgendarCita">Agendar cita</button>
</div>
	
<!-- ----------fin del codigo calendario ---------------- -->


</div>


</div>
 
<?php require "../../modales/modales.php";?>

<script src="../../../js/jquery-3.4.1.min.js"></script>
<script src="../../../js/popper.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>   
<script type="text/javascript" src="../../../js/calendar.js"></script>
<script src="../../../js/validarCita.js"></script>
</body>
</html>
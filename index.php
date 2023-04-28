<?php 
session_start();
if (isset($_SESSION['users_id'])) {


if (isset($_SESSION['id_rol'])) {
switch ($_SESSION['id_rol']) {
	case 3:
				header('Location: ./html/Instructor de seguimiento/perfilInstructor.php');
					break;
				
				case 1:
					

					header('Location: ./html/Administrador/paginaPrincipal.php');
							
				break;

					case 2:
				header('Location: ./html/Jefe inmediato/paginaJefe.php');
					break;
	
	
}


}


}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Ordinpro-inicio </title>
<script language="javascript" scr="js/jquery-3.4.1.min.js"></script>

</head>


<body>
	<center>
		<div class="contenedor">
	<div class="medio" id="logo">
		 <img class="Tamano" src="img/logo.jpg">
	</div>
</div>
	<div class="medio2">
		<a href="html/login.php">Iniciar Sesion</a> O 
		
		<a href="signup.php">Modo Consulta</a>
	</div>
	</center>

		


<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/index.js"></script>

</body>
</html>
<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../index.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Bienvenido al perfil de Instructor de seguimiento</h1>
<br>
<a href="../../controlador/usuario_controlador.php?action=desconectarse">Desconectarse</a>
</body>
</html>
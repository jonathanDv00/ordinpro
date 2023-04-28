<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<title>Login-Ordinpro</title>
	<script language="javascript" scr="../js/jquery-3.4.1.min.js"></script>

</head>
<body background="../img/fondoabs.jpg">

	<div class="medio1" class="logo2">

		 <img class="Tamano" src="../img/logo.jpg">

	</div>

</div>
<br>
<center>
	<form method="POST" id="frmLogin" onsubmit="return logear();">

<input class="form-control" type="email" name="email" placeholder="Ingrese su correo electronico" value="" id="email" required>
<br>
<input class="form-control" type="password" name="password" placeholder="ingrese su contraseña" value="" id="password" required>


<input type="submit" value="Ingresar">
	<p id="mensajeErrorLogin" style="color: red"></p>
<p>Olvidaste tu contraseña</p>
</form>

</center>	
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/login.js"></script>
</body>
</html>
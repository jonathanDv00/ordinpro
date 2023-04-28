<?php 
session_start();
require("../../modelo/database.php");
$idus=$_SESSION['users_id'];

echo $idus;
$message=null;
$cont="ordinproinstructor";
if (!empty($_POST['contrasenaNueva'])&& !empty($_POST['contrasenaConfirmar'])) {
	

	if ($_POST['contrasenaNueva']==$_POST['contrasenaConfirmar']){
	$sql="UPDATE usuario SET contrasenia=:passwordC WHERE id_usuario=:idusuario";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':passwordC',$_POST['contrasenaConfirmar']);
	$stmt->bindParam(':idusuario',$idus);
	if($stmt->execute()){

	$message="se ha cambiado la contraseña";	
	}
	

	
	
	
}
else{
$message="No se ha cambiado la contraseña";

	
	}
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
	<title>Login-Ordinpro</title>
	<script language="javascript" scr="../js/jquery-3.4.1.min.js"></script>

</head>
<body background="../../img/fondoabs.jpg">

	<div class="medio1" class="logo2">

		 <img class="Tamano" src="../../img/logo.jpg">

	</div>

</div>
<br>
<center>
	<form action="muestra.php" method="POST">

<input class="form-control" type="password" name="contrasenaNueva" placeholder="ingresa tu contraseña nueva">
<br>
<input class="form-control" type="password" name="contrasenaConfirmar" placeholder="confira tu contraseña">


<input type="submit" value="Guardar">

</form>

<?php if (!empty($message)):?> 
		
	<br><p><?=$message ?></p>

	 <?php endif;?>
</center>

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>
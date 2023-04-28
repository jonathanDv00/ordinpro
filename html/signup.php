<?php 
require '../controlador/database.php';

$message='';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$sql = "INSERT INTO users (email,password) VALUES ( :email, :password)"; 
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email',$_POST['email']);	
	$stmt->bindParam(':password',$_POST['password']);

	if ($stmt->execute()) {
		$message='Se ha creado un nuevo usuario';
	}else{
		$message='Error no se ha podido crear el usuario';
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<?php require 'partials/header.php' ?>

<?php if (!empty($message)): ?>
<p><?= $message ?></p>	
<?php endif; ?>


 
<h1>SignUp</h1>
<span>or <a href="login.php">Iniciar sesion</a></span>
<form action="signup.php" method="post">

<input type="text" name="email" placeholder="Ingrese su documento">
<input type="password" name="password" placeholder="ingrese su contraseña">
<input type="password" name="confirmar_contraseña" placeholder="confirma tu contraseña">
<input type="submit" value="Registrar">

</form>
</body>
</html>
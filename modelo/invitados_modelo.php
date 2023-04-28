<?php 

class invitados_modelo{
private $invitados;


public function _contructor(){


}
public function get_invitado(){
require 'database.php';
	

	$records= $conn->prepare('SELECT * FROM invitados WHERE nombre=:nombre');
	$records->bindParam(':nombre',$_POST['nombreinvi']);
	$records->execute();
	$invitados = $records->fetch(PDO::PARAM_STR);



	return $invitados;
}


public function Insertar_invitados(){
	require 'database.php';

	$sql="INSERT INTO invitados(nombre,cargo,entidad) VALUES
	(:nombre,:cargo,:entidad)";

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':nombre',$_POST['nombreinvi']);
	$stmt->bindParam(':cargo',$_POST['cargoinvi']);
	$stmt->bindParam(':entidad',$_POST['entidadinvi']);	

	$stmt->execute();
}

}
?>
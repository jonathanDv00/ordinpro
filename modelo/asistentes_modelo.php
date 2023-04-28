<?php 

class asistentes_modelo{
private $asistentes;


public function _contructor(){


}
public function get_asistente(){
require 'database.php';
	

	$records= $conn->prepare('SELECT * FROM asistentes WHERE cargo_asist=:cargo');
	$records->bindParam(':cargo',$_POST['cargoasis']);
	$records->execute();
	$asistente = $records->fetch(PDO::PARAM_STR);



	return $asistente;
}

public function Insertar_asistentes(){
	require 'database.php';

	$sql="INSERT INTO asistentes(cargo_asist,nombre_asist,entidad) VALUES
	(:cargoasistente,:nomresasistente,:entidad)";

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':cargoasistente',$_POST['cargoasis']);
	$stmt->bindParam(':nomresasistente',$_POST['nombreasistente']);
	$stmt->bindParam(':entidad',$_POST['entidadasis']);	

	$stmt->execute();
}

}
?>
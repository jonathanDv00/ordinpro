<?php 

class compromiso_modelo{
private $compromiso;


public function _contructor(){


}
public function get_compromiso(){
require 'database.php';
	

	$records= $conn->prepare('SELECT * FROM compromisos WHERE Nombreactividad=:nombre');
	$records->bindParam(':nombre',$_POST['actividad']);
	$records->execute();
	$compromisos = $records->fetch(PDO::PARAM_STR);



	return $compromisos;
}



public function Insertar_compromiso(){
	require 'database.php';

	$sql="INSERT INTO compromisos(Nombreactividad,responsable,fecha) VALUES
	(:nomactividad,:nomresposable,:fecha)";

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':nomactividad',$_POST['actividad']);
	$stmt->bindParam(':nomresposable',$_POST['comresponsable']);
	$stmt->bindParam(':fecha',$_POST['fechacompro']);	

	$stmt->execute();
}

}
?>
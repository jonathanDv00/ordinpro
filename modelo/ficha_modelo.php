<?php 

class ficha_modelo{
private $ficha;


public function _contructor(){


}


public function get_ficha(){
require 'database.php';
	

	$records= $conn->prepare('SELECT * FROM ficha WHERE numero_ficha=:ficha1');
	$records->bindParam(':ficha1',$_POST['ficha']);
	$records->execute();
	$ficha = $records->fetch(PDO::PARAM_STR);



	return $ficha;
}

public function Insertar_ficha(){
	require 'database.php';

	$sql="INSERT INTO ficha(numero_ficha,`programa de formacion_id_prog`) VALUES
	(:numficha,:programa)";

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':numficha',$_POST['ficha']);
	$stmt->bindParam(':programa',$_POST['programa']);	
	$stmt->execute();
}

}
?>
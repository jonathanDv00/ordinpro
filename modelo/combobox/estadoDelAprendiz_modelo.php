<?php 
function get_estados(){
	require '../database.php';
	$responde=$conn->prepare('SELECT * From `estadoaprendiz`');
	$responde->execute();

	$estados='<option value="0">Seleccione un estado</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$estados.="<option value=".$row['id_est_apr'].">".$row['nombre_est_apr']."</option>";
	   		
     }
	return $estados;
}
echo get_estados();


 ?>
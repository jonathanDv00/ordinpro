<?php 
function get_coordinacion(){
	require '../database.php';
	
	$responde=$conn->prepare('SELECT * From `Coordinacion`');
	$responde->execute();


	$coordinaciones='<option value="0">Seleccione una coordinacion</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$coordinaciones.="<option value=".$row['id_coord'].">".$row['nombre_coord']."</option>";
	   		
     }
	return $coordinaciones;
}
echo get_coordinacion();

?>
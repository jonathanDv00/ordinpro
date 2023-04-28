<?php 
function get_barrios(){
	require '../database.php';
	$id=$_POST['id_zona'];
	$responde=$conn->prepare("SELECT * From `barrio`WHERE zona_id_zon=$id");
	$responde->execute();

	$barrios='<option value="0">Seleccione un barrio</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$barrios.="<option value=".$row['id_bar'].">".$row['nombre_bar']."</option>";
	   		
     }
	return $barrios;
}
echo get_barrios();

 ?>
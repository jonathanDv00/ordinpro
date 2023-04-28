<?php 
function get_jefesInmediatos(){
	require '../database.php';
	$id=$_POST['id_ente'];
	$responde=$conn->prepare("SELECT * From `jefe inmediato`WHERE `ente coformador_id_cof`=$id");
	$responde->execute();

	$jefes='<option value="0">Seleccione un jefe inmediato</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$jefes.="<option value=".$row['id_jef'].">".$row['nombre_jef']." ".$row['apellidos_jef']."</option>";
	   		
     }
	return $jefes;
}
echo get_jefesInmediatos();



 ?>
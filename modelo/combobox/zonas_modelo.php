<?php 
function get_zonas(){
	require '../database.php';	
	$id=$_POST['id_mun'];
	$responde=$conn->prepare("SELECT * From `zona`WHERE municipio_id_mun=$id");
	$responde->execute();

	$zonas='<option value="0">Seleccione una zona </option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$zonas.="<option value=".$row['id_zon'].">".$row['nombre_zon']."</option>";
	   		
     }
	return $zonas;
}
echo get_zonas();



 ?>
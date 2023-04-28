<?php 
function get_municipios(){
	require '../database.php';
	$id=$_POST['id_dep'];
	$responde=$conn->prepare("SELECT * From `municipio`WHERE departamento_id_dep=$id");
	$responde->execute();

	$municipios='<option value="0">Seleccione un municipio</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$municipios.="<option value=".$row['id_mun'].">".$row['nombre_mun']."</option>";
	   		
     }
	return $municipios;
}
echo get_municipios();



 ?>
<?php 
function get_departamentos(){
	require '../database.php';
	$responde=$conn->prepare('SELECT * From `Departamento`');
	$responde->execute();

	$departamentos='<option value="0">Seleccione un departamento</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$departamentos.="<option value=".$row['id_dep'].">".$row['nombre_dep']."</option>";
	   		
     }
	return $departamentos;
}
echo get_departamentos();

?>
<?php 
function get_empresas(){
	require '../database.php';
	$id=$_POST['id_barrio'];
	$responde=$conn->prepare("SELECT * From enteCoformador WHERE barrio_idbarrio=$id");
	$responde->execute();

	$empresa='<option value="0">Seleccione un empresa</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$empresa.="<option value=".$row['id_cof'].">".$row['nombre_cof']."</option>";
	   		
     }
	return $empresa;
}
echo get_empresas();



 ?>
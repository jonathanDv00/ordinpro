<?php 
function get_tipoDecarreras(){
	require '../database.php';
	$responde=$conn->prepare('SELECT * From Tipocarrera');
	$responde->execute();

	$documentos='<option value="0">Seleccione tipo de carrera</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$documentos.="<option value=".$row['id_tip_car'].">".$row['nombre_tipcar']."</option>";
	   		
     }
	return $documentos;
}
echo get_tipoDecarreras();

 ?>
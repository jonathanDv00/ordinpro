<?php 
function get_documentos(){
	require '../database.php';
	$responde=$conn->prepare('SELECT * From TipoDocumento');
	$responde->execute();

	$documentos='<option value="0">Seleccione un tipo de documento</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$documentos.="<option value=".$row['id_tipodoc'].">".$row['nombre_tipodoc']."</option>";
	   		
     }
	return $documentos;
}
echo get_documentos();



 ?>
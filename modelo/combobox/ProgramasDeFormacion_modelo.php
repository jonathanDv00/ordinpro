<?php 
function get_programasDeFormacion(){
	require '../database.php';
	$idCarr=$_POST['id_carrera'];
	$idCoord=$_POST['idCoordinacion'];
	$responde=$conn->prepare("SELECT * From `programa de formacion`WHERE `tipo carrera_id_tip_car` =$idCarr AND `coordinacion_idcoor` =$idCoord");
	$responde->execute();

	$programas='<option value="0">Seleccione un programa de formacion</option>';
	while ($row=$responde->fetch(PDO::FETCH_ASSOC)) {
	 	$programas.="<option value=".$row['id_prog'].">".$row['nombre_prog']."</option>";
	   		
     }
	return $programas;
}
echo get_programasDeFormacion();


 ?>
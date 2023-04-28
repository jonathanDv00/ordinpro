<?php 
class citas_modelo{

public function listarCitasApr($idaprendiz){

require("database.php");

$sql="SELECT ci.id_cit,ci.lugar,a.fechaAgenda,a.horaInicio,a.horaFin,ins.nombre_ins,ins.primer_apellido_ins,ins.segundo_apellido_ins FROM 
agenda AS a INNER JOIN cita AS ci ON a.idagenda=ci.id_agendaid INNER JOIN`instructor de seguimiento` AS ins ON a.idinstructor_id=ins.id_inst WHERE idaprendiz_id=$idaprendiz";

 $stmt=$conn->prepare($sql);
 $stmt->execute();
return $citas=$stmt->fetchAll();
}


public function agendarcita(){

require("database.php");
$validar=0;
$sql="INSERT INTO cita(`estado de cita_id_est_cit`,id_agendaid)
VALUES (1,:idagenda)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':idagenda',$_POST['CitasDis']);

  if ($stmt->execute()) {
    $validar=1;
  }
  else{
    
  }
  return $validar;
}


public function ultimacitaAprendiz($idaprendiz){

require("database.php");
$sql="SELECT MAX(id_cit) FROM cita ci INNER JOIN agenda  AS a ON ci.id_agendaid=a.idagenda
WHERE idaprendiz_id=$idaprendiz";
$stmt=$conn->prepare($sql);
$stmt->execute();
return $citas=$stmt->fetchAll();
}

public function CitaSalvar($idcita){

require("database.php");
$sql="SELECT * FROM cita ci INNER JOIN agenda  AS a ON ci.id_agendaid=a.idagenda
WHERE ci.id_cit=:idcita ";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':idcita',$idcita);
$stmt->execute();

return $citas=$stmt->fetchAll();

}

public function validarCitas($fecha,$horaIni,$instructor){
$validar=0;
require("database.php");
$sql="SELECT * FROM cita as ci INNER JOIN agenda as a ON ci.id_agendaid=a.idagenda WHERE a.fechaAgenda=:fechaI AND a.horaInicio=:hora AND a.idinstructor_id=:idinstruc AND a.estado=1";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":fechaI",$fecha);
$stmt->bindParam(":hora",$horaIni);
$stmt->bindParam(":idinstruc",$instructor);
$stmt->execute();

if($stmt->fetchColumn()>0){
	$validar=1;
}

return $validar;
}

 public function actualizarCita(){

    require 'database.php';
    
    
    //if(!empty($_POST['id_cof'])){
      $nose=$_POST['idcita'];
      $sql_cit="UPDATE cita SET `estado de cita_id_est_cit`=3 WHERE id_cit=$nose;";
      $stmtCit = $conn->prepare($sql_cit);
      //$stmtCit->bindParam(':id',$_GET['idCit']);
      $stmtCit->execute();
    
  }

}

?>
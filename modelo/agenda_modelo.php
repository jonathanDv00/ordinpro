<?php 

class agenda_modelo{


public function habilitarAgenda($id_ins,$id_apr,$id_je,$fecha,$hora,$hora2){

require'database.php';

$validar=0;
  $sql2="INSERT INTO agenda(fechaAgenda,horaInicio,horaFin,idinstructor_id,idaprendiz_id,idjefeinmediato_id,estado)
	VALUES (:fecha,:horaOne,:horaTwo,:idinst,:idapr,:idjef,0)";
	$stmt=$conn->prepare($sql2);
	$stmt->bindParam(':fecha',$fecha);
	$stmt->bindParam(':horaOne',$hora);
    $stmt->bindParam(':horaTwo',$hora2);
    $stmt->bindParam(':idinst',$id_ins);
    $stmt->bindParam(':idapr',$id_apr);
    $stmt->bindParam(':idjef',$id_je);
    $validar=0;
   	if($stmt->execute()){
$validar=1;
   	}
return $validar;

}

public function modificarEstadoAgenda($idaprendiz,$idagenda){

require'database.php';
$sql=" UPDATE  agenda SET estado=1 WHERE `idaprendiz_id`=:idaprendiz AND `idagenda`=:idagenda";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':idaprendiz',$idaprendiz);
$stmt->bindParam(':idagenda',$idagenda);
if($stmt->execute()){




    }
    else{


    }

}
public function desabilitarAgendaAprendiz($idaprendiz,$idagenda){

require'database.php';
$sql=" DELETE FROM agenda WHERE estado=0 AND  `idaprendiz_id`=:idaprendiz AND `idagenda`!=:idagenda";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':idaprendiz',$idaprendiz);
$stmt->bindParam(':idagenda',$idagenda);
if($stmt->execute()){




    }
    else{


    }
  
}

public function desabilitarUnaHora($idinst,$fechaAgenda,$horaInicio){
  require'database.php';
  $sql="DELETE FROM agenda WHERE idinstructor_id=:idinst AND fechaAgenda=:fechaAgenda AND horaInicio=:horaInicio AND estado=0 ";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':idinst',$idinst);
  $stmt->bindParam(':fechaAgenda',$fechaAgenda);
  $stmt->bindParam(':horaInicio',$horaInicio);
    if($stmt->execute()){




    }
    else{


    }

}


}

?>
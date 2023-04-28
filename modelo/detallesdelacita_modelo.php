<?php 

class detallesdelacita_modelo{

      public function _contructor(){


      }
 
   
 public function Insertar_detalles(){

  require 'database.php';
    

  require_once("asistentes_modelo.php");
  $Asistente=new asistentes_modelo();
  $resultado_asistente=$Asistente->get_asistente();
  $Asistente=$resultado_asistente['idasistente'];
  
  require_once("invitados_modelo.php");
  $Invitado=new invitados_modelo();
  $resultado_invitado=$Invitado->get_invitado();
  $Invitado=$resultado_invitado['idinvitado'];
  
  require_once("compromiso_modelo.php");

  $Compromiso=new compromiso_modelo();
  $resultado_compromiso=$Compromiso->get_compromiso();
  $Compromiso=$resultado_compromiso['idcompromiso'];
 
  
  $sql = "INSERT INTO citasdetalles (Numeroacta,fecha,horaInicial,horaFinal,Temareunion,objectivos,Desarrolloreunion,ConclusionesReunion,idcompromisos,idasistentes,idinvitados,idcita) VALUES (:numeroacta, :fecha, :horaini,:horafin,:tema,:objectivo,:desarrollo,:concluciones,$Compromiso,$Asistente,$Invitado,:idcita)"; 

  $stmt = $conn->prepare($sql);   
  $stmt->bindParam(':numeroacta',$_POST['numeroacta']);
  $stmt->bindParam(':fecha',$_POST['fecha']);
  $stmt->bindParam(':horaini',$_POST['horainicio']);
  $stmt->bindParam(':horafin',$_POST['horafin']);
  $stmt->bindParam(':tema',$_POST['tema']);
  $stmt->bindParam(':objectivo',$_POST['objectivo']);
  $stmt->bindParam(':desarrollo',$_POST['desarrollo']);
  $stmt->bindParam(':concluciones',$_POST['conclusiones']);
  $stmt->bindParam(':idcita',$_POST['idcita']);
 if ($stmt->execute()) {
    $validar++;
  }
  else{
    
  }
  return $validar;
}

public function reportes(){

  $idcita=$_GET['idcita'];


require'database.php';

$sql="SELECT cd.`Numeroacta`,cd.`fecha`,cd.`horaInicial`,cd.`horaFinal`,cd.`Temareunion`,cd.`objectivos`,cd.`Desarrolloreunion`,cd.`ConclusionesReunion`,
com.`Nombreactividad`,com.`responsable`,com.`fecha`,asis.`nombre_asist`,asis.`cargo_asist`,asis.`entidad`,invi.`nombre`,invi.`cargo`,invi.`entidad`,ap.`nombre_apr`

FROM citasdetalles AS cd INNER JOIN compromisos AS com ON cd.`idcompromisos`=com.`idcompromiso` INNER JOIN asistentes AS asis ON cd.`idasistentes`=asis.`idasistente`
INNER JOIN  invitados AS invi ON cd.`idinvitados`=invi.`idinvitado` INNER JOIN cita AS cita ON cd.`idcita`=cita.`id_cit`INNER JOIN agenda

AS ag ON cita.`id_agendaid`= ag.`idagenda` INNER  JOIN aprendiz AS ap ON ag.`idaprendiz_id`=ap.`id_apr`

WHERE cita.`id_cit`= $idcita";

$stmt=$conn->prepare($sql);
$stmt->execute();


;
//print_r($resultado);

return $resultado=$stmt->fetchAll();
 


}


}
?>
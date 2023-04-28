<?php 

class citas_controlador{

public function listarCitasAp($id){

require_once'../../../modelo/citas_modelo.php';
$citas=new citas_modelo();
return $citas->listarCitasApr($id);


}

public function tabla(){
  //$_SESSION['users_id'];
	$dia=$_POST['diaS'];
require'../modelo/database.php';
//$dia=$_POST['diaS'];
$consulta="SELECT id_cit,DAY(fechaAgenda),horaInicio,horaFin,nombre_apr,nombre_jef,`nombre_cof`,lugar
FROM cita INNER JOIN agenda ON cita.id_agendaid=agenda.idagenda
INNER JOIN aprendiz ON aprendiz.id_apr=agenda.idaprendiz_id
INNER JOIN `jefe inmediato` ON `jefe inmediato`.id_jef=agenda.idjefeinmediato_id
INNER JOIN `entecoformador` ON `entecoformador`.id_cof=`jefe inmediato`.`ente coformador_id_cof`
INNER JOIN `estadocita` ON `estadocita`.id_est_cit=cita.`estado de cita_id_est_cit`
WHERE `estado de cita_id_est_cit`=1 AND DAY(fechaAgenda)=$dia";

$stmt=$conn->prepare($consulta);
$stmt->execute();


foreach($stmt as $consultar) {
  echo'
  <tr>
  <td>'.$consultar['id_cit'].'</td>
  <td>'.$consultar['DAY(fechaAgenda)'].'</td>
  <td>'.$consultar['horaInicio'].'</td>
  <td>'.$consultar['horaFin'].'</td>
  <td>'.$consultar['nombre_apr'].'</td>
  <td>'.$consultar['nombre_jef'].'</td>
  <td>'.$consultar['nombre_cof'].'</td>
  <td>'.$consultar['lugar'].'</td>
  <td class="btn-group">
  
<button  class="btn icon-edit " id="prueba" onclick="citaId('.$consultar['id_cit'].')"></button></td>
  </tr>
  ';
  };

  /*<a href="../../../modelo/citas_modelo.php?action=actualizarCita&idCit='.$consultar['id_cit'].'" class="btn icon-edit " id="prueba">Cancelar</a></td>*/
  /*<a href="../../../html/Administrador/aprendiz/calendario.php" class="btn icon-edit " id="prueba">Cancelar</a></td>*/
  //echo $resultado;
  //return $jues;
  //<button  class="btn icon-edit " id="prueba" onclick="citaId('.$consultar['id_cit'].')"></button></td>
}

public function cancelarCita(){
require_once'../modelo/citas_modelo.php';
$citas=new citas_modelo();
$citas->actualizarCita();
    
}


}

if (isset($_GET['action'])) {
$action = $_GET['action'];
$citas_controlador = new citas_controlador();
$citas_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$citas_controlador = new citas_controlador();
$citas_controlador->$action();
}
?>
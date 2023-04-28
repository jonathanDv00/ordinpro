<?php 
 function llenarSelet(){

$dia=$_POST['diaS'];
$mes=$_POST['mesS'];
$year=$_POST['yearS'];
$apren=$_POST['aprenS'];
$sql="SELECT * FROM agenda WHERE YEAR(fechaAgenda)=:year AND MONTH(fechaAgenda)=:mes AND DAY(fechaAgenda)=:day AND idaprendiz_id=:idap AND estado=0";
require '../database.php';
$stmt=$conn->prepare($sql);
$stmt->bindParam(':year',$year);
$stmt->bindParam(':mes',$mes);
$stmt->bindParam(':day',$dia);
$stmt->bindParam(':idap',$apren);
$stmt->execute();

$agenda='<option value="0">Seleccione una hora</option>';
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$agenda.="<option value=".$row['idagenda'].">".$row['horaInicio']."-".$row['horaFin']."</option>";
	   		
     }
	return $agenda;
}
echo llenarSelet();



 ?>
<?php
 
class jefeInmediato_modelo{

private $validar=0;


public function _contructor(){


}


public function consultar_listarjefe($where){

require'database.php';

$sql="SELECT jefe.`id_jef`, jefe.`nombre_jef`,jefe.`apellidos_jef`,jefe.`celular_jef`,jefe.`num_doc_jef`,td.`nombre_tipodoc`,us.`correo_us`,ente.`nombre_cof` 
FROM `jefe inmediato` AS jefe 
INNER JOIN usuario AS us ON jefe.`usuario_id_usuario`=us.`id_usuario`
INNER JOIN enteCoformador AS ente ON jefe.`ente coformador_id_cof`=ente.`id_cof`
INNER JOIN tipodocumento AS td ON jefe.`tipo de documento_id_tipodoc`=td.id_tipodoc
$where";

$stmt=$conn->prepare($sql);
$stmt->execute();


;
//print_r($resultado);

return $resultado=$stmt->fetchAll();
 

}

public function Insertar_JefeInmediato(){
  $validar=0;
  require 'database.php';
  require_once("usuario_modelo.php");
  $usuario=new usuario_modelo();
  $resultado_usuario=$usuario->get_usuario();
  $usuario=$resultado_usuario['id_usuario'];
  
  $sql = "INSERT INTO `jefe inmediato` (num_doc_jef,nombre_jef,apellidos_jef,celular_jef,`usuario_id_usuario`,`ente coformador_id_cof`,`tipo de documento_id_tipodoc`)
   VALUES (:documentoJefe, :nombreJefe,:apellidosJefe,:celJefe,$usuario,:enteJefe ,:tipoDocumentoJefe)"; 
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':documentoJefe',$_POST['numDoc']); 
  $stmt->bindParam(':nombreJefe',$_POST['nomJefe']);
  $stmt->bindParam(':apellidosJefe',$_POST['apellidos']);
  $stmt->bindParam(':celJefe',$_POST['cel']);
  $stmt->bindParam(':enteJefe',$_POST['enteCof']);
  $stmt->bindParam(':tipoDocumentoJefe',$_POST['tipoDoc']);


  if ($stmt->execute()) {
    $validar=1;
  }
  
  return $validar;
}

public function actualizarJefeInmediato(){

    require 'database.php';
    
    
    //if(!empty($_POST['id_jef'])){
      if(!empty($_POST['numDoc'])){
      $sql_documento="UPDATE `jefe inmediato` SET num_doc_jef=:numDoc WHERE id_jef=:idJef;";
      $stmtDocumento = $conn->prepare($sql_documento);
      $stmtDocumento->bindParam(':idJef',$_GET['idjf']);
      $stmtDocumento->bindParam(':numDoc',$_POST['numDoc']);
      $stmtDocumento->execute();
      }

      if(!empty($_POST['nomJefe'])){
      $sql_nomJef="UPDATE `jefe inmediato` SET nombre_jef=:nomJefe WHERE id_jef=:idJef;";
      $stmtNombreJef = $conn->prepare($sql_nomJef);
      $stmtNombreJef->bindParam(':idJef',$_GET['idjf']);
      $stmtNombreJef->bindParam(':nomJefe',$_POST['nomJefe']);
      $stmtNombreJef->execute();
      }

      if(!empty($_POST['tipoDoc'])){
      $sql_tipoDoc="UPDATE `jefe inmediato` SET `tipo de documento_id_tipodoc`=:tipoDoc WHERE id_jef=:idJef;";
      $stmtTipoDoc = $conn->prepare($sql_tipoDoc);
      $stmtTipoDoc->bindParam(':idJef',$_GET['idjf']);
      $stmtTipoDoc->bindParam(':tipoDoc',$_POST['tipoDoc']);
      $stmtTipoDoc->execute();
      }

      if(!empty($_POST['apellidos'])){
      $sql_apellidosJef="UPDATE `jefe inmediato` SET `apellidos_jef`=:apellidosJef WHERE id_jef=:idJef;";
      $stmtApellidosJef = $conn->prepare($sql_apellidosJef);
      $stmtApellidosJef->bindParam(':idJef',$_GET['idjf']);
      $stmtApellidosJef->bindParam(':apellidosJef',$_POST['apellidos']);
      $stmtApellidosJef->execute();
      }

      if(!empty($_POST['cel'])){
      $sql_celJef="UPDATE `jefe inmediato` SET `celular_jef`=:celJef WHERE id_jef=:idJef;";
      $stmtCelJef = $conn->prepare($sql_celJef);
      $stmtCelJef->bindParam(':idJef',$_GET['idjf']); 
      $stmtCelJef->bindParam(':celJef',$_POST['cel']);
      $stmtCelJef->execute();
      }

      if(!empty($_POST['enteCof'])){
      $sql_enteCof="UPDATE `jefe inmediato` SET `ente coformador_id_cof`=:enteCof WHERE id_jef=:idJef;";
      $stmtEnteCof = $conn->prepare($sql_enteCof);
      $stmtEnteCof->bindParam(':idJef',$_GET['idjf']);
      $stmtEnteCof->bindParam(':enteCof',$_POST['enteCof']);
      $stmtEnteCof->execute();
      }


      


    //}
    
    
  }

    public function llenarcampos($id){
      
require 'database.php';/*
$sqlNombre_ap="SELECT nombre_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtNombre_ap=$conn->prepare($sqlNombre_ap);
$stmtNombre_ap->execute();

$sqlTipoDoc_ap="SELECT `tipo de documento_id_tipodoc` FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtTipoDoc_ap=$conn->prepare($sqlTipoDoc_ap);
$stmtTipoDoc_ap->execute();

$sqlApellidos_ap="SELECT apellidos_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtApellidos_ap=$conn->prepare($sqlApellidos_ap);
$stmtApellidos_ap->execute();

$sqlNumDoc_ap="SELECT num_doc_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtNumDoc_ap=$conn->prepare($sqlNumDoc_ap);
$stmtNumDoc_ap->execute();


$sqlCelular_ap="SELECT celular_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtCelular_ap=$conn->prepare($sqlCelular_ap);
$stmtCelular_ap->execute();

$sqlDireccion_ap="SELECT direccion_apr FROM aprendiz WHERE id_apr='$idaprendiz'";
$stmtDireccion_ap=$conn->prepare($sqlDireccion_ap);
$stmtDireccion_ap->execute();*/

$sql="SELECT * FROM `jefe inmediato` WHERE id_jef=:idjef";

$aprendiz=$conn->prepare($sql);
$aprendiz->bindParam(':idjef',$id);
$aprendiz->execute();
return $resultado=$aprendiz->fetchAll();

}
public function consultarjefeDocumento($documentoJ){
$validar=0;
require'database.php';
$sql="SELECT * FROM `jefe inmediato` WHERE num_doc_jef=:documento";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":documento",$documentoJ);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}



}
?>

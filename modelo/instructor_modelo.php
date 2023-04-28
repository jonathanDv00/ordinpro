<?php 

class instructor_modelo{



public function _contructor(){


}

public function consultar_listarinstructor($where){

require'database.php';

$sql="SELECT ins.`id_inst`, ins.`nombre_ins`,ins.`primer_apellido_ins`,ins.`segundo_apellido_ins`,ins.`celular`,ins.`num_doc_inst`,td.nombre_tipodoc,cor.`nombre_coord`,us.`correo_us` FROM `instructor de seguimiento` AS ins INNER JOIN `tipodocumento` AS td 
ON ins.`tipo de documento_id_tipodoc`= td.id_tipodoc 
INNER JOIN `coordinacion`AS cor ON ins.`coordinacion_id_coord`=cor.`id_coord`
INNER JOIN usuario AS us ON ins.`usuario_id_usuario`=us.`id_usuario`
$where";

$stmt=$conn->prepare($sql);
$stmt->execute();


;
//print_r($resultado);

return $resultado=$stmt->fetchAll();
 


}

public function Insertar_instructor(){
  $validar=0;
	require 'database.php';
	require_once("usuario_modelo.php");
	$usuario=new usuario_modelo();
	$resultado_usuario=$usuario->get_usuario();
	$usuario=$resultado_usuario['id_usuario'];
	
	
	$sql = "INSERT INTO `instructor de seguimiento` (num_doc_inst,nombre_ins,primer_apellido_ins,segundo_apellido_ins,celular,`tipo de documento_id_tipodoc`,coordinacion_id_coord,usuario_id_usuario)
	 VALUES (:documento, :nombre,:primerapellido,:segundoapellido,:celular,:tipodocumento ,:coordinacion,$usuario)"; 
      $stmt = $conn->prepare($sql);
         $stmt->bindParam(':documento',$_POST['documento']);	
        $stmt->bindParam(':nombre',$_POST['nombre']);
	       $stmt->bindParam(':primerapellido',$_POST['primerapellido']);
	       $stmt->bindParam(':segundoapellido',$_POST['segundoapellido2']);
	      $stmt->bindParam(':celular',$_POST['celular']);
	        $stmt->bindParam(':tipodocumento',$_POST['tipodocumento']);
	          $stmt->bindParam(':coordinacion',$_POST['coordinacion']);
     if ($stmt->execute()) {
    $validar=1;
  }
  
  return $validar;
}
public function actualizarInstructor(){

    require 'database.php';
    
    
    //if(!empty($_POST['id_inst'])){
      if(!empty($_POST['documento'])){
      $sql_documento="UPDATE `instructor de seguimiento` SET num_doc_inst=:documentoInstructor WHERE id_inst=:idInst;";
      $stmtDocumento = $conn->prepare($sql_documento);
      $stmtDocumento->bindParam(':idInst',$_GET['idins']);
      $stmtDocumento->bindParam(':documentoInstructor',$_POST['documento']);
      $stmtDocumento->execute();
      }

      if(!empty($_POST['nombre'])){
      $sql_nombreInst="UPDATE `instructor de seguimiento` SET nombre_ins=:nombreInst WHERE id_inst=:idInst;";
      $stmtNombreInst = $conn->prepare($sql_nombreInst);
      $stmtNombreInst->bindParam(':idInst',$_GET['idins']);
      $stmtNombreInst->bindParam(':nombreInst',$_POST['nombre']);
      $stmtNombreInst->execute();
      }

      if(!empty($_POST['primerapellido'])){
      $sql_prapellidoInst="UPDATE `instructor de seguimiento` SET primer_apellido_ins=:prapellidoInst WHERE id_inst=:idInst;";
      $stmtPrapellidoInst = $conn->prepare($sql_prapellidoInst);
      $stmtPrapellidoInst->bindParam(':idInst',$_GET['idins']);
      $stmtPrapellidoInst->bindParam(':prapellidoInst',$_POST['primerapellido']);
      $stmtPrapellidoInst->execute();
      }

      if(!empty($_POST['segundoapellido'])){
      $sql_sgapellidoInst="UPDATE `instructor de seguimiento` SET segundo_apellido_ins=:sgapellidoInst WHERE id_inst=:idInst;";
      $stmtSgapellidoInst = $conn->prepare($sql_sgapellidoInst);
      $stmtSgapellidoInst->bindParam(':idInst',$_GET['idins']);
      $stmtSgapellidoInst->bindParam(':sgapellidoInst',$_POST['segundoapellido']);
      $stmtSgapellidoInst->execute();
      }

      if(!empty($_POST['tipodocumento'])){
      $sql_tipodocumento="UPDATE `instructor de seguimiento` SET `tipo de documento_id_tipodoc`=:tipodocumento WHERE id_inst=:idInst;";
      $stmtTipodocumento = $conn->prepare($sql_tipodocumento);
      $stmtTipodocumento->bindParam(':idInst',$_GET['idins']);
      $stmtTipodocumento->bindParam(':tipodocumento',$_POST['tipodocumento']);
      $stmtTipodocumento->execute();
      }

      if(!empty($_POST['coordinacion'])){
      $sql_coordinacion="UPDATE `instructor de seguimiento` SET `coordinacion_id_coord`=:coordinacion WHERE id_inst=:idInst;";
      $stmtCoordinacion = $conn->prepare($sql_coordinacion);
      $stmtCoordinacion->bindParam(':idInst',$_GET['idins']);
      $stmtCoordinacion->bindParam(':coordinacion',$_POST['coordinacion']);
      $stmtCoordinacion->execute();
      }

      if(!empty($_POST['celular'])){
      $sql_celular="UPDATE `instructor de seguimiento` SET celular=:celular WHERE id_inst=:idInst;";
      $stmtcelular = $conn->prepare($sql_celular);
      $stmtcelular->bindParam(':idInst',$_GET['idins']);
      $stmtcelular->bindParam(':celular',$_POST['celular']);
      $stmtcelular->execute();
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

$sql="SELECT * FROM `instructor de seguimiento` WHERE id_inst=:idinst";

$aprendiz=$conn->prepare($sql);
$aprendiz->bindParam(':idinst',$id);
$aprendiz->execute();
return $resultado=$aprendiz->fetchAll();

}
public function consultarinsDocumento($documentoi){
$validar=0;
require'database.php';
$sql="SELECT * FROM `instructor de seguimiento` WHERE num_doc_inst=:documento";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":documento",$documentoi);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}



}


?>
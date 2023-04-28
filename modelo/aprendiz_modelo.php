<?php 

class aprendiz_modelo{




public function _contructor(){


}

public function Insertar_aprendiz(){

  require 'database.php';
  require_once("ficha_modelo.php");
  $Noficha=new ficha_modelo();
  $resultado_ficha=$Noficha->get_ficha();
  $Noficha=$resultado_ficha['id_ficha'];
  
  $validar=0;
  $sql = "INSERT INTO aprendiz (num_doc_apr,nombre_apr,apellidos_apr,fecha_nacimiento_apr,correo_institucional_apr,telefono_fijo_apr,celular_apr,direccion_apr,`estado aprendiz_id_est_apr`,`tipo de documento_id_tipodoc`,ficha_id_ficha,`jefe inmediato_id_jef`,lugar_trabajo_idbarrio) VALUES (:documento, :nombre, :apellidos,:fechaNa,:correo,:telefeno,:celular,:direccion,1,:tipodocumento,$Noficha,:jefe,:barrio)"; 

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':documento',$_POST['documento']); 
    
  $stmt->bindParam(':nombre',$_POST['nombre']);
  $stmt->bindParam(':apellidos',$_POST['apellidos']);
  $stmt->bindParam(':fechaNa',$_POST['fechaNa']);
  $stmt->bindParam(':correo',$_POST['correo']);
  $stmt->bindParam(':celular',$_POST['celular']);
  $stmt->bindParam(':telefeno',$_POST['telefeno']);
  $stmt->bindParam(':tipodocumento',$_POST['tipodocumento']);
  $stmt->bindParam(':direccion',$_POST['direccion']);
  $stmt->bindParam(':jefe',$_POST['jefe']);
  $stmt->bindParam(':barrio',$_POST['barrio']);

  if ($stmt->execute()) {
    $validar=1;
  }
  else{
    
  }
  return $validar;
}

public function consultar_listarAprendiz($where){

require'database.php';

$sql="SELECT ap.`id_apr`,ap.`nombre_apr`,ap.`apellidos_apr`,td.`nombre_tipodoc`,ap.`num_doc_apr`,ap.`correo_institucional_apr`
,ap.`celular_apr`,ap.`direccion_apr`,coor.`nombre_coord`,tc.`nombre_tipcar`,fc.`numero_ficha`,pf.`nombre_prog`,
ea.`nombre_est_apr`,ji.`nombre_jef`,ji.`apellidos_jef`,
dep.`nombre_dep`,mun.`nombre_mun`,zo.`nombre_zon`,ba.`nombre_bar`,
ec.`nombre_cof`,ec.`direccion_cof`,`jefe inmediato_id_jef`  
FROM aprendiz AS ap INNER JOIN`tipodocumento` AS td ON ap.`tipo de documento_id_tipodoc`=td.`id_tipodoc` 
INNER JOIN estadoaprendiz AS ea ON ap.`estado aprendiz_id_est_apr`=ea.`id_est_apr` 
INNER JOIN ficha AS fc ON ap.`ficha_id_ficha`=fc.`id_ficha`
INNER JOIN `programa de formacion` AS pf ON pf.`id_prog`=fc.`programa de formacion_id_prog` 
INNER JOIN tipocarrera AS tc ON pf.`tipo carrera_id_tip_car`=tc.`id_tip_car`
INNER JOIN `coordinacion` AS coor ON pf.`coordinacion_idcoor`=coor.`id_coord`
INNER JOIN `jefe inmediato` AS ji ON ji.`id_jef`=ap.`jefe inmediato_id_jef`
INNER JOIN entecoformador AS ec ON ji.`ente coformador_id_cof`=ec.`id_cof`
INNER JOIN barrio AS ba ON ec.`barrio_idbarrio`=ba.`id_bar`
INNER JOIN `zona` AS zo ON zo.`id_zon`=ba.`zona_id_zon`
INNER JOIN `municipio` AS mun ON mun.`id_mun`=zo.`municipio_id_mun`
INNER JOIN `departamento` AS dep ON dep.`id_dep`=mun.`departamento_id_dep`
INNER JOIN usuario AS u ON ji.usuario_id_usuario=u.id_usuario
$where";
$resultado=
$stmt=$conn->prepare($sql);
$stmt->execute();


;
//print_r($resultado);

return $resultado=$stmt;
 


}

public function actualizarAprendiz(){

  require 'database.php';
      $validar=0;
      //if(!empty($_POST['id_consulta'])){
      
      if(!empty($_POST['nombre_aprACT'])){
      $sql_nombre="UPDATE `aprendiz` SET nombre_apr=:nombreAprendiz WHERE id_apr=:idConsulta;";
      $stmtNombre = $conn->prepare($sql_nombre);
      $stmtNombre->bindParam(':idConsulta',$_POST['idap']); 
      $stmtNombre->bindParam(':nombreAprendiz',$_POST['nombre_aprACT']);
      if($stmtNombre->execute()){
        $validar=$validar+1;
      }
      

      }

      if(!empty($_POST['apellidos_aprACT'])){
      $sql_apellidos="UPDATE `aprendiz` SET apellidos_apr=:apellidosAprendiz WHERE id_apr=:idConsulta;";
      $stmtApellidos = $conn->prepare($sql_apellidos);
      $stmtApellidos->bindParam(':idConsulta',$_POST['idap']); 
      $stmtApellidos->bindParam(':apellidosAprendiz',$_POST['apellidos_aprACT']);
      if($stmtApellidos->execute()){
        $validar=$validar+1;
      }$stmtApellidos->execute();
      $validar=$validar+1;
      }   
      if(!empty($_POST['tipoDoc'])){
      $sql_tipo_doc="UPDATE `aprendiz` SET `tipo de documento_id_tipodoc`=:tipoDoc WHERE id_apr=:idConsulta;";
      $stmtTipDoc = $conn->prepare($sql_tipo_doc);
      $stmtTipDoc->bindParam(':idConsulta',$_POST['idap']);
      $stmtTipDoc->bindParam(':tipoDoc',$_POST['tipoDoc']);
      if($stmtTipDoc->execute()){
        $validar=$validar+1;
      }

      } 


      if(!empty($_POST['documento_aprACT'])){
      $sql_documento="UPDATE `aprendiz` SET `num_doc_apr`=:documentoAprendiz WHERE id_apr=:idConsulta;";
      $stmtDocumento = $conn->prepare($sql_documento);
      $stmtDocumento->bindParam(':idConsulta',$_POST['idap']); 
      $stmtDocumento->bindParam(':documentoAprendiz',$_POST['documento_aprACT']);
      if($stmtDocumento->execute()){
        $validar=$validar+1;
      }
      } 



      if(!empty($_POST['celular_aprACT'])){
      $sql_celular="UPDATE `aprendiz` SET `celular_apr`=:celularAprendiz WHERE id_apr=:idConsulta;";
      $stmtCelular = $conn->prepare($sql_celular);
      $stmtCelular->bindParam(':idConsulta',$_POST['idap']);
      $stmtCelular->bindParam(':celularAprendiz',$_POST['celular_aprACT']);
      if($stmtCelular->execute()){
        $validar=$validar+1;
      }
      } 
      if(!empty($_POST['txtCorreo'])){
      $sql_celular="UPDATE `aprendiz` SET `correo_institucional_apr`=:correoAprendiz WHERE id_apr=:idConsulta;";
      $stmtCelular = $conn->prepare($sql_celular);
      $stmtCelular->bindParam(':idConsulta',$_POST['idap']);
      $stmtCelular->bindParam(':correoAprendiz',$_POST['txtCorreo']);
      if($stmtCelular->execute()){
        $validar=$validar+1;
      }
      } 

      if(!empty($_POST['direccion_aprACT'])){
      $sql_direccion="UPDATE `aprendiz` SET `direccion_apr`=:direccionAprendiz WHERE id_apr=:idConsulta;";
      $stmtDireccion = $conn->prepare($sql_direccion);
      $stmtDireccion->bindParam(':idConsulta',$_POST['idap']);
      $stmtDireccion->bindParam(':direccionAprendiz',$_POST['direccion_aprACT']);
      if($stmtDireccion->execute()){
        $validar=$validar+1;
      }
      } 


      if(!empty($_POST['estado'])){
      $sql_estado="UPDATE `aprendiz` SET `estado aprendiz_id_est_apr`=:estado WHERE id_apr=:idConsulta;";
      $stmtEstado = $conn->prepare($sql_estado);
      $stmtEstado->bindParam(':idConsulta',$_POST['idap']);
      $stmtEstado->bindParam(':estado',$_POST['estado']);
      if($stmtEstado->execute()){
        $validar=$validar+1;
      }
      } 

      if(!empty($_POST['jefe'])){
      $sql_jefe="UPDATE `aprendiz` SET `jefe inmediato_id_jef`=:jefeAprendiz WHERE id_apr=:idConsulta;";
      $stmtJefe = $conn->prepare($sql_jefe);
      $stmtJefe->bindParam(':idConsulta',$_POST['idap']);
      $stmtJefe->bindParam(':jefeAprendiz',$_POST['jefe']);
      if($stmtJefe->execute()){
        $validar=$validar+1;
      }
      }
return $validar;
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

$sql="SELECT * FROM aprendiz WHERE id_apr=:iduser";

$aprendiz=$conn->prepare($sql);
$aprendiz->bindParam(':iduser',$id);
$aprendiz->execute();
return $resultado=$aprendiz->fetchAll();

}

public function consultarAprDocumento($documentoA){
$validar=0;
require'database.php';
$sql="SELECT * FROM aprendiz WHERE num_doc_apr=:documento";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":documento",$documentoA);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}

public function consultarAprCorreo($correoA){
$validar=0;
require'database.php';
$sql="SELECT * FROM aprendiz WHERE correo_institucional_apr=:correo";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":correo",$correoA);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;

}

public function consultarAprActuaCorreo($idapr,$correoA){
$validar=0;
require'database.php';
$sql="SELECT * FROM aprendiz WHERE id_apr!=:idaprendiz AND correo_institucional_apr=:correo";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":idaprendiz",$idapr);
$stmt->bindParam(":correo",$correoA);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;

}
public function consultarAprActuaDocumento($idapr,$documentoA){
$validar=0;
require'database.php';
$sql="SELECT * FROM aprendiz WHERE id_apr!=:idaprendiz AND num_doc_apr=:documento";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":idaprendiz",$idapr);
$stmt->bindParam(":documento",$documentoA);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}
public function consultarAgenda($idApren){
$validar=0;
require'database.php';
$sql="SELECT * FROM agenda WHERE idaprendiz_id=:idaprendiz AND estado=0";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":idaprendiz",$idApren);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}

public function consultarCitasProg($idApren){
$validar=0;
require'database.php';
$sql="SELECT * FROM agenda as a inner join cita as ci on a.idagenda=ci.id_agendaid WHERE idaprendiz_id=:idaprendiz AND `estado de cita_id_est_cit`=1";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":idaprendiz",$idApren);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=2;
}
return $validar;

}
public function consultarCitasInclo($idApren){
$validar=0;
require'database.php';
$sql="SELECT * FROM agenda as a inner join cita as ci on a.idagenda=ci.id_agendaid WHERE a.idaprendiz_id=:idaprendiz AND `estado de cita_id_est_cit`=4";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":idaprendiz",$idApren);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=3;
}
return $validar;

}

}
?>
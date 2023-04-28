<?php

class enteCoformador_modelo{

private $validar=0;

public function _contructor(){



}

public function consultar_listarenteconformador($where){
require'database.php';
$sql="SELECT ente.`id_cof`, ente.`NIT_cof`,ente.`nombre_cof`,ente.`direccion_cof`,ente.`tel_fijo_cof`,ente.`cel_cof`,ente.`correo_cof`,ba.`nombre_bar`,
zo.`nombre_zon`,muni.`nombre_mun`,dep.`nombre_dep`
 FROM enteCoformador AS ente INNER JOIN `barrio` AS ba ON ente.`barrio_idbarrio`=ba.id_bar 
INNER JOIN barrio AS bar ON ente.`barrio_idbarrio`=bar.id_bar
INNER JOIN zona AS zo ON bar.zona_id_zon=zo.id_zon
INNER JOIN `municipio` AS muni ON zo.municipio_id_mun= muni.id_mun
INNER JOIN departamento AS dep ON muni.`departamento_id_dep`=dep.id_dep
$where";

$stmt=$conn->prepare($sql);
$stmt->execute();
;
return $resultado=$stmt->fetchAll();
 }

public function Insertar_enteCoformador(){
$validar=0;
$repetido=0;
  require 'database.php';
  if(!empty($_POST['nit'])){

        $sqlNIT="SELECT Nit_cof FROM enteCoformador WHERE NIT_cof='$_POST[nit]'";
            $validarNIT=$conn->query($sqlNIT);    
            while ($row=$validarNIT->fetch(PDO::FETCH_NUM)) {
              if ($_POST['nit']==$row[0]) {
              $repetido=$row[0];
                }
            }
          }

        

        if($_POST['nit']!=$repetido){
            $sql = "INSERT INTO enteCoformador (NIT_cof,nombre_cof,direccion_cof,tel_fijo_cof,cel_cof,correo_cof,barrio_idbarrio) 
            VALUES (:nit,:nombre,:direccion, :tel,:cel,:email,:barrio)"; 

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nit',$_POST['nit']); 
            $stmt->bindParam(':nombre',$_POST['nombre']);
            $stmt->bindParam(':direccion',$_POST['direccion']);
            $stmt->bindParam(':tel',$_POST['tel']);
            $stmt->bindParam(':cel',$_POST['cel']);
            $stmt->bindParam(':email',$_POST['email']);
            $stmt->bindParam(':barrio',$_POST['barrio']);


            if ($stmt->execute()) {
              $validar=1;
            }

            return $validar;
          }

          }

public function actualizarEnteCoformador(){

    require 'database.php';
    
    
    //if(!empty($_POST['id_cof'])){
      if(!empty($_POST['nit'])){
      $sql_nit="UPDATE enteCoformador SET NIT_cof=:nitEnte WHERE id_cof=:idCof;";
      $stmtNit = $conn->prepare($sql_nit);
      $stmtNit->bindParam(':idCof',$_GET['ident']);
      $stmtNit->bindParam(':nitEnte',$_POST['nit']);
      $stmtNit->execute();
      }

      if(!empty($_POST['nombre'])){
      $sql_nombre="UPDATE enteCoformador SET nombre_cof=:nombreEnte WHERE id_cof=:idCof;";
      $stmtNombre = $conn->prepare($sql_nombre);
      $stmtNombre->bindParam(':idCof',$_GET['ident']);
      $stmtNombre->bindParam(':nombreEnte',$_POST['nombre']);
      $stmtNombre->execute();
      }

      if(!empty($_POST['tel'])){
      $sql_tel="UPDATE enteCoformador SET tel_fijo_cof=:telEnte WHERE id_cof=:idCof;";
      $stmtTel = $conn->prepare($sql_tel);
      $stmtTel->bindParam(':idCof',$_GET['ident']);
      $stmtTel->bindParam(':telEnte',$_POST['tel']);
      $stmtTel->execute();
      }

      if(!empty($_POST['email'])){
      $sql_email="UPDATE enteCoformador SET correo_cof=:correoEnte WHERE id_cof=:idCof;";
      $stmtEmail = $conn->prepare($sql_email);
      $stmtEmail->bindParam(':idCof',$_GET['ident']);
      $stmtEmail->bindParam(':correoEnte',$_POST['email']);
      $stmtEmail->execute();
      }

      if(!empty($_POST['cel'])){
      $sql_cel="UPDATE enteCoformador SET cel_cof=:celEnte WHERE id_cof=:idCof;";
      $stmtCel = $conn->prepare($sql_cel);
      $stmtCel->bindParam(':idCof',$_GET['ident']);
      $stmtCel->bindParam(':celEnte',$_POST['cel']);
      $stmtCel->execute();
      }

      if(!empty($_POST['direccion'])){
      $sql_direccion="UPDATE enteCoformador SET direccion_cof=:direccionEnte WHERE id_cof=:idCof;";
      $stmtDireccion = $conn->prepare($sql_direccion);
      $stmtDireccion->bindParam(':idCof',$_GET['ident']);
      $stmtDireccion->bindParam(':direccionEnte',$_POST['direccion']);
      $stmtDireccion->execute();
      }

      if(!empty($_POST['barrio'])){
      $sql_barrio="UPDATE enteCoformador SET barrio_idbarrio=:barrioEnte WHERE id_cof=:idCof;";
      $stmtBarrio = $conn->prepare($sql_barrio);
      $stmtBarrio->bindParam(':idCof',$_GET['ident']);
      $stmtBarrio->bindParam(':barrioEnte',$_POST['barrio']);
      $stmtBarrio->execute();
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

$sql="SELECT * FROM enteCoformador WHERE id_cof=:idcof";

$aprendiz=$conn->prepare($sql);
$aprendiz->bindParam(':idcof',$id);
$aprendiz->execute();
return $resultado=$aprendiz->fetchAll();

}
public function consultarenteNit($nit){
$validar=0;
require'database.php';
$sql="SELECT * FROM entecoformador WHERE NIT_cof=:nit";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":nit",$nit);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}

}

  



                


?>
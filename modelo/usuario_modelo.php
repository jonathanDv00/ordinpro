<?php 

class usuario_modelo{

private $results;
public $idusuario;

public function _contructor(){


}
public function get_usuario(){
	require 'database.php';
	$records= $conn->prepare('SELECT * FROM usuario WHERE correo_us=:email');
	$records->bindParam(':email',$_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::PARAM_STR);


	return $results;
}
public function consultarLogin($correo){
	require 'database.php';
	$records= $conn->prepare('SELECT * FROM usuario WHERE correo_us=:email');
	$records->bindParam(':email',$correo);
	$records->execute();
	$results = $records->fetch(PDO::PARAM_STR);
	return $results;

}

public function Insertar_usuarioInstructor(){
	require 'database.php';
	$pasword= 'ordinproinstructor';

	$sql1="INSERT INTO usuario(correo_us,contrasenia,rol_id_rol) VALUES(:email,'$pasword',3)";

	$stmt1=$conn->prepare($sql1);
	$stmt1->bindParam(':email',$_POST['email']);	
	$stmt1->execute();


}


public function Insertar_usuarioJefeInmediato(){
	require 'database.php';
	$pasword= 'ordinprojefe';

	$sql1="INSERT INTO usuario(correo_us,contrasenia,rol_id_rol) VALUES(:email,'$pasword',2)";

	$stmt1=$conn->prepare($sql1);
	$stmt1->bindParam(':email',$_POST['email']);	
	$stmt1->execute();


}


public function actualizar_usuarioJefeInmediato(){

    require 'database.php';
    
    
    if(!empty($_POST['id_jef'])){

      if(!empty($_POST['email'])){
      $sql_emailJef="UPDATE `jefe inmediato` SET `correo_us`=:emailJef WHERE id_jef=:idJef;";
      $stmtEmailJef = $conn->prepare($sql_emailJef);
      $stmtEmailJef->bindParam(':idJef',$_POST['id_jef']); 
      $stmtEmailJef->bindParam(':emailJef',$_POST['email']);
      $stmtEmailJef->execute();
      }
    }
    
    
  }

public function primerInicio($idusuario){
require 'database.php';
$cont="ordinproinstructor";
$stmt=$conn->prepare('SELECT * FROM usuario WHERE id_usuario=:idusuario AND contrasenia=:password');
$stmt->bindParam(':password',$cont);
$stmt->bindParam(':idusuario',$idusuario);
$stmt->execute();
$results = $stmt->fetch(PDO::PARAM_STR);
$validar=0;
if (count($results) > 0){
$validar=$validar+1;

}
return $validar;
	}


public function actualizarCon($idus){
	$validacion=0;
 	$sql="UPDATE usuario SET contrasenia=:passwordC WHERE id_usuario=:idusuario";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':passwordC',$_POST['contrasenaConfirmar']);
	$stmt->bindParam(':idusuario',$idus);
	if($stmt->execute()){
		$validacion=$validacion+1;

		}
		return $validacion;
	}
public function consultarCorreo($correo){
$validar=0;
require'database.php';
$sql="SELECT * FROM usuario WHERE correo_us=:correo";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":correo",$correo);
$stmt->execute();
if($stmt->fetchColumn()>0){
  $validar=1;
}
return $validar;
}

public function modificarContraseñaPri($idus,$cont){
	require'database.php';
	$validar=0;
 $sql="UPDATE usuario SET contrasenia=:passwordC WHERE id_usuario=:idusuario";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':passwordC',$cont);
  $stmt->bindParam(':idusuario',$idus);
  if($stmt->execute()){
  	$validar=1;
  }
return $validar;
}	
}

?>
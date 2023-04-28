<?php 


class usuario_controlador{


public function loginUser(){
session_start();
require_once("../modelo/usuario_modelo.php");
$retorno=0;
$user=new usuario_modelo();
$email=$_POST['email'];
$contras=$_POST['password'];
$resultado=$user->consultarLogin($email);
$cont="ordinproinstructor";
$cont1="ordinprojefe";
	if (count($resultado) > 0&& $resultado['contrasenia']==$contras ) {
		$_SESSION['users_id']=$resultado['id_usuario'];
		$_SESSION['id_rol']=$resultado['rol_id_rol'];
		if ($_POST['password']==$cont||$_POST['password']==$cont1) {			
			$retorno =4;
			}
			else{
			switch ($resultado['rol_id_rol']) {
			case 3:				
			$retorno =3;
					break;			
				case 1:								
					$retorno =1;						
				break;
					case 2:
					$retorno =2;
					break;
			}		
	}

}
echo $retorno;

} 


public function desconectarse(){
session_start();

session_unset();

session_destroy();

header('Location: /ordinpro');
	
} 

public function DetectarIn($id){

require_once'../../modelo/usuario_modelo.php';
$resul=new usuario_modelo();
$resul->primerInicio($id);

if ($resul==1) {
	header('Location: muestra.php');
}	
}
public function CambioPass(){
$retorno=0;	
require_once'../modelo/usuario_modelo.php';
$Cambio=new usuario_modelo();
$pass=$_POST['contrasena'];
$id=$_POST['iduser'];
$retorno=$Cambio->modificarContraseñaPri($id,$pass);		
echo $retorno;
}

}

if (isset($_GET['action'])) {
$action = $_GET['action'];
$usuario_controlador = new usuario_controlador();
$usuario_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$usuario_controlador = new usuario_controlador();
$usuario_controlador->$action();
}
?>
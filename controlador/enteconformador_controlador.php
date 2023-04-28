<?php 

class enteconformador_controlador{
  


public function crearenteconformador(){

  
if (!empty($_POST['nit']) && !empty($_POST['nombre'])&& !empty($_POST['direccion'])&& !empty($_POST['tel'])&& !empty($_POST['cel'])&& !empty($_POST['email'])&& !empty($_POST['barrio'])) {

  
  require_once('../modelo/enteCoformador_modelo.php');
  $ente=new enteCoformador_modelo();
  $validacion=$ente->Insertar_enteCoformador();
  
 echo $validacion;
}

}
public function consultarenteconformador(){
  
require_once('../../../modelo/enteCoformador_modelo.php');
$enteconformadorRespuesta=new enteCoformador_modelo();

$nombre=null;
$correo=null;
$nit=null;

$where='';

if(isset($_POST['buscar'])){
    if(!empty($_POST['nombre'])){
      $nombre=$_POST['nombre'];  
    }
     if(!empty($_POST['correo'])){
      $correo=$_POST['correo'];  
    }
     if(!empty($_POST['nit'])){
      $nit=$_POST['nit'];  
    }
     

    if (!empty($_POST['nombre'])) {
        $where="where nombre_cof='".$nombre."'";        
    }
    if (!empty($_POST['correo'])) {
        $where="where correo_cof='".$correo."'";        
    }
    
    if (!empty($_POST['nit'])) {
        $where="where NIT_cof='".$nit."'";      
    }
    
}

$resultado=$enteconformadorRespuesta->consultar_listarenteconformador($where);

return $resultado;
} 
public function consultarnit(){
require_once('../modelo/enteCoformador_modelo.php');
$nit=$_POST['nitEnvi'];
$consultarnit= new enteCoformador_modelo();
$validacion=$consultarnit->consultarenteNit($nit);
echo $validacion;

}
public function consultarentecorreo(){
require_once('../modelo/usuario_modelo.php');
$correo=$_POST['CorreoEnvi'];
$consultarJefe= new usuario_modelo();
$validacion=$consultarJefe->consultarCorreo($correo);
echo $validacion;
}


public function actualizarEnteCoformador(){

    //$idCof=$id;
    require_once('../../../modelo/enteCoformador_modelo.php');
      $actualizarEnteCoformador= new enteCoformador_modelo();
      $validacion=$actualizarEnteCoformador->actualizarEnteCoformador();
      
      if($validacion>0){

        //header('location: ../html/Administrador/aprendiz/actualizarAprendiz_vista.php');

      }
      else{
        //header('location: ../html/Administrador/paginaPrinciapl.php');

      }


}

public function llenarcampo($id){

require_once'../../../modelo/enteCoformador_modelo.php';
$consultalle=new enteCoformador_modelo();

return $consultalle->llenarcampos($id);
}

}


if (isset($_GET['action'])) {
$action = $_GET['action'];
$enteconformador_controlador = new enteconformador_controlador();
$enteconformador_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$enteconformador_controlador = new enteconformador_controlador();
$enteconformador_controlador->$action();
}

?>


<?php
 class jefesInmediato_controlador{
  


public function crearjefeimediato(){

if (!empty($_POST['numDoc']) && !empty($_POST['nomJefe'])&& !empty($_POST['apellidos'])&& !empty($_POST['cel'])&& !empty($_POST['enteCof'])&& !empty($_POST['tipoDoc'])) {


  require_once("../modelo/usuario_modelo.php");
  $usuario=new usuario_modelo();
  $crearusuario=$usuario->Insertar_usuarioJefeInmediato();
  

  
  
  require_once('../modelo/jefeInmediato_modelo.php');
  $jefe=new jefeInmediato_modelo();
  $validacion=$jefe->Insertar_JefeInmediato();
    
    echo $validacion;
   
}

}


public function consultarjefe(){
  
require_once('../../../modelo/jefeInmediato_modelo.php');
$jefeRespuesta=new jefeInmediato_modelo();
$nombre=null;
$nombreempresa=null;
$correo=null;
$documento=null;
$where='';

if(isset($_POST['buscar'])){

     if(!empty($_POST['nombreempresa'])){
      $nombreempresa=$_POST['nombreempresa'];  
    }
    if(!empty($_POST['documento'])){
      $documento=$_POST['documento'];  
    }
    if(!empty($_POST['nombre'])){
      $nombre=$_POST['nombre'];  
    }
    if(!empty($_POST['correo'])){
      $correo=$_POST['correo'];  
    }
   
    if (!empty($_POST['documento'])) {
        $where="where num_doc_jef='".$documento."'";        
    }
    
    if (!empty($_POST['nombreempresa'])) {
        $where="where nombre_cof='".$nombreempresa."'";     
    }
    if (!empty($_POST['nombre'])) {
        $where="where nombre_jef='".$nombre."'";        
    }
    if (!empty($_POST['correo'])) {
        $where="where correo_us='".$correo."'";     
    }
    
}
$resultado=$jefeRespuesta->consultar_listarjefe($where);

return $resultado;

} 

public function llenarcampo($id){

require_once'../../../modelo/JefeInmediato_modelo.php';
$consultalle=new jefeInmediato_modelo();

return $consultalle->llenarcampos($id);
}
public function consultarJefeDocumento(){
require_once('../modelo/JefeInmediato_modelo.php');
$documento=$_POST['documentoEnvi'];
$consultarJefe= new JefeInmediato_modelo();
$validacion=$consultarJefe->consultarJefeDocumento($documento);
echo $validacion;

}
public function consultarJefeCorreo(){
require_once('../modelo/usuario_modelo.php');
$correo=$_POST['CorreoEnvi'];
$consultarJefe= new usuario_modelo();
$validacion=$consultarJefe->consultarCorreo($correo);
echo $validacion;
}


public function actualizarJefeInmediato(){
    require_once('../../../modelo/JefeInmediato_modelo.php');
      $actualizarJefe= new jefeInmediato_modelo();
      $validacion=$actualizarJefe->actualizarJefeInmediato();
      
      if($validacion>0){

        //header('location: ../html/Administrador/aprendiz/actualizarAprendiz_vista.php');

      }
      else{
        //header('location: ../html/Administrador/paginaPrinciapl.php');

      }
    
}

}
  
if (isset($_GET['action'])) {
$action = $_GET['action'];
$jefesInmediato_controlador = new jefesInmediato_controlador();
$jefesInmediato_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$jefesInmediato_controlador = new jefesInmediato_controlador();
$jefesInmediato_controlador->$action();
}

?>
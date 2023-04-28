
 <?php

 class instructor_controlador{
	


public function crearinstructor(){


   

             require_once("../modelo/usuario_modelo.php");
             $usuario=new usuario_modelo();            
              $resultado_usuario=$usuario->Insertar_usuarioInstructor();
            
             require_once('../modelo/instructor_modelo.php');
              $instructor=new instructor_modelo();
              $validacion=$instructor->Insertar_instructor();
              

             echo $validacion;

   

}


public function consultarinstructor($idnst=null){
  
require_once('../../../modelo/instructor_modelo.php');
$instructorRespuesta=new instructor_modelo();
$nombre=null;
$coordinacion=null;
$correo=null;
$documento=null;
$where='';

if(isset($_GET['idapr'])){
$where="WHERE  usuario_id_usuario='".$idnst."'";  

}

if(isset($_POST['buscar'])){

     if(!empty($_POST['coordinacion'])){
      $coordinacion=$_POST['coordinacion'];  
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
        $where="where num_doc_inst='".$documento."'";       
    }
    
    if (!empty($_POST['coordinacion'])) {
        $where="where id_coord='".$coordinacion."'";        
    }
    if (!empty($_POST['nombre'])) {
        $where="where nombre_ins='".$nombre."'";        
    }
    if (!empty($_POST['correo'])) {
        $where="where correo_us='".$correo."'";     
    }
    
}
$resultado=$instructorRespuesta->consultar_listarinstructor($where);

return $resultado;

}	

public function llenarcampo($id){

require_once'../../../modelo/instructor_modelo.php';
$consultalle=new instructor_modelo();

return $consultalle->llenarcampos($id);
}
public function consultarInsDocumento(){
require_once('../modelo/instructor_modelo.php');
$documento=$_POST['documentoEnvi'];
$consultarins= new instructor_modelo();
$validacion=$consultarins->consultarinsDocumento($documento);
echo $validacion;

}

public function consultarinsCorreo(){
require_once('../modelo/usuario_modelo.php');
$correo=$_POST['CorreoEnvi'];
$consultarins= new usuario_modelo();
$validacion=$consultarins->consultarCorreo($correo);
echo $validacion;
}

public function actualizarInstructor(){
    require_once('../../../modelo/instructor_modelo.php');
      $actualizarInstructor= new instructor_modelo();
      $validacion=$actualizarInstructor->actualizarInstructor();
      
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
$instructor_controlador = new instructor_controlador();
$instructor_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$instructor_controlador = new instructor_controlador();
$instructor_controlador->$action();
}
?>
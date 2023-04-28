 <?php 

class aprendiz_controlador{
	


public function crearAprendiz(){
	
if (!empty($_POST['nombre']) && !empty($_POST['apellidos'])&& !empty($_POST['correo'])&& !empty($_POST['documento'])&& !empty($_POST['fechaNa'])&& !empty($_POST['telefeno'])&& !empty($_POST['ficha'])
&& !empty($_POST['direccion'])&& !empty($_POST['tipodocumento'])&& !empty($_POST['departamento'])
&& !empty($_POST['municipio'])&& !empty($_POST['coordinacion'])&& !empty($_POST['empresa'])&& !empty($_POST['programa'])&& !empty($_POST['carrera'])&& !empty($_POST['barrio'])&& !empty($_POST['celular'])&& !empty($_POST['jefe'])) {

	require_once("../modelo/ficha_modelo.php");
	$Noficha=new ficha_modelo();
	$resultado_ficha=$Noficha->get_Ficha();

	if (count($resultado_ficha) > 0 && ($_POST['ficha']== $resultado_ficha['numero_ficha'])) {
		
	}
	else{

	$crearFicha=$Noficha->Insertar_ficha();

	}

	
	
	require_once('../modelo/aprendiz_modelo.php');
	$aprendiz=new aprendiz_modelo();
	$validacion=$aprendiz->Insertar_aprendiz();
	

	echo $validacion;
}
else{
	
header('Location: paginaPrinciapl.php');

}

}
public function consultarAprendiz($idap=null){
  
require_once('../../../modelo/aprendiz_modelo.php');
$aprendizRespuesta=new aprendiz_modelo();

$ficha=null;
$carrera=null;
$departamento=null;
$municipio=null;
$zona=null;
$barrio=null;
$coordinacion=null;
$programa=null;
$empresa=null;
$estado=null;
$documento=null;
$where='';

if(isset($_GET['idapr'])){
$where="WHERE  id_apr='".$idap."'";  

}

if(isset($_POST['buscar'])){
    if(!empty($_POST['ficha'])){
      $ficha=$_POST['ficha'];  
    }
     if(!empty($_POST['carrera'])){
      $carrera=$_POST['carrera'];  
    }
     if(!empty($_POST['departamento'])){
      $departamento=$_POST['departamento'];  
    }
     if(!empty($_POST['municipio'])){
      $municipio=$_POST['municipio'];  
    }
     if(!empty($_POST['zona'])){
      $zona=$_POST['zona'];  
    }
     if(!empty($_POST['barrio'])){
      $barrio=$_POST['barrio'];  
    }
     if(!empty($_POST['coordinacion'])){
      $coordinacion=$_POST['coordinacion'];  
    }
     if(!empty($_POST['programa'])){
      $programa=$_POST['programa'];  
    }
     if(!empty($_POST['empresa'])){
      $empresa=$_POST['empresa'];  
    }
     if(!empty($_POST['estado'])){
      $estado=$_POST['estado'];  
    }
     if(!empty($_POST['documento'])){
      $documento=$_POST['documento'];  
    }

    if (!empty($_POST['documento'])) {
        $where="where num_doc_apr='".$documento."'";        
    }
    if (!empty($_POST['departamento'])) {
        $where="where id_dep='".$departamento."'";
    }
    if (!empty($_POST['estado'])) {
        $where="where id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."'";
    }
    if (!empty($_POST['zona'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."'";
    }
    if (!empty($_POST['barrio'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."' and id_bar='".$barrio."'";
    }
    if (!empty($_POST['empresa'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."' and id_bar='".$barrio."' and id_cof='".$empresa."'";
    }
    if (!empty($_POST['ficha'])) {
        $where="where numero_ficha='".$ficha."'";       
    }
    if (!empty($_POST['coordinacion'])) {
        $where="where id_coord='".$coordinacion."'";        
    }
    if (!empty($_POST['carrera'])) {
        $where="where id_tip_car='".$carrera."'";       
    }
    if (!empty($_POST['programa'])) {
        $where="where id_coord='".$coordinacion."' and id_tip_car='".$carrera."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['coordinacion'])) {
        $where="where id_dep='".$departamento."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['programa'])) {
        $where="where id_dep='".$departamento."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['estado'])) {
        $where="where id_dep='".$departamento."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['coordinacion'])) {
        $where="where id_mun='".$municipio."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['programa'])) {
        $where="where id_mun='".$municipio."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['estado'])) {
        $where="where id_mun='".$municipio."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['coordinacion'])) {
        $where="where id_zon='".$zona."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['programa'])) {
        $where="where id_zon='".$zona."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['estado'])) {
        $where="where id_zon='".$zona."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['coordinacion'])) {
        $where="where id_bar='".$barrio."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['programa'])) {
        $where="where id_bar='".$barrio."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['estado'])) {
        $where="where id_bar='".$barrio."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['coordinacion'])) {
        $where="where id_cof='".$empresa."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])) {
        $where="where id_cof='".$empresa."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['programa'])) {
        $where="where id_cof='".$empresa."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_cof='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['estado'])) {
        $where="where id_cof='".$empresa."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_cof='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['coordinacion'])) {
        $where="where id_est_apr='".$empresa."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['carrera'])) {
        $where="where id_est_apr='".$empresa."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['programa'])) {
        $where="where id_est_apr='".$empresa."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_est_apr='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }  


}
$resultado=$aprendizRespuesta->consultar_listarAprendiz($where);

return $resultado;

}	
public function consultarAprendizJefe($idjefe=null){
  
require_once('../../../modelo/aprendiz_modelo.php');
$aprendizRespuesta=new aprendiz_modelo();

$ficha=null;
$carrera=null;
$departamento=null;
$municipio=null;
$zona=null;
$barrio=null;
$coordinacion=null;
$programa=null;
$empresa=null;
$estado=null;
$documento=null;
$where="WHERE `id_usuario`='".$idjefe."'";

if(isset($_POST['buscar'])){
    if(!empty($_POST['ficha'])){
      $ficha=$_POST['ficha'];  
    }
     if(!empty($_POST['carrera'])){
      $carrera=$_POST['carrera'];  
    }/*
     if(!empty($_POST['departamento'])){
      $departamento=$_POST['departamento'];  
    }
     if(!empty($_POST['municipio'])){
      $municipio=$_POST['municipio'];  
    }
     if(!empty($_POST['zona'])){
      $zona=$_POST['zona'];  
    }
     if(!empty($_POST['barrio'])){
      $barrio=$_POST['barrio'];  
    }
     if(!empty($_POST['coordinacion'])){
      $coordinacion=$_POST['coordinacion'];  
    }*/
     if(!empty($_POST['programa'])){
      $programa=$_POST['programa'];  
    }
     if(!empty($_POST['empresa'])){
      $empresa=$_POST['empresa'];  
    }
     if(!empty($_POST['estado'])){
      $estado=$_POST['estado'];  
    }
     if(!empty($_POST['documento'])){
      $documento=$_POST['documento'];  
    }

    if (!empty($_POST['documento'])) {
        $where=+"AND num_doc_apr='".$documento."'";        
    }/*
    if (!empty($_POST['departamento'])) {
        $where="where id_dep='".$departamento."'";
    }
    if (!empty($_POST['estado'])) {
        $where="where id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."'";
    }
    if (!empty($_POST['zona'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."'";
    }
    if (!empty($_POST['barrio'])) {
        $where="where id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."' and id_bar='".$barrio."'";
    }*/
    if (!empty($_POST['empresa'])) {
        $where=+"AND id_dep='".$departamento."' and id_mun='".$municipio."' and id_zon='".$zona."' and id_bar='".$barrio."' and id_cof='".$empresa."'";
    }
    if (!empty($_POST['ficha'])) {
        $where=+"AND numero_ficha='".$ficha."'";       
    }/*
    if (!empty($_POST['coordinacion'])) {
        $where="where id_coord='".$coordinacion."'";        
    }*/
    if (!empty($_POST['carrera'])) {
        $where=+"AND id_tip_car='".$carrera."'";       
    }
    if (!empty($_POST['programa'])) {
        $where=+"AND id_coord='".$coordinacion."' and id_tip_car='".$carrera."' and id_prog='".$programa."'";
    }/*
    if (!empty($_POST['departamento'])&&!empty($_POST['coordinacion'])) {
        $where="where id_dep='".$departamento."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['programa'])) {
        $where="where id_dep='".$departamento."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['estado'])) {
        $where="where id_dep='".$departamento."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['departamento'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_dep='".$departamento."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['coordinacion'])) {
        $where="where id_mun='".$municipio."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['programa'])) {
        $where="where id_mun='".$municipio."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['estado'])) {
        $where="where id_mun='".$municipio."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['municipio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_mun='".$municipio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['coordinacion'])) {
        $where="where id_zon='".$zona."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['programa'])) {
        $where="where id_zon='".$zona."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['estado'])) {
        $where="where id_zon='".$zona."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['zona'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_zon='".$zona."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['coordinacion'])) {
        $where="where id_bar='".$barrio."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['programa'])) {
        $where="where id_bar='".$barrio."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['estado'])) {
        $where="where id_bar='".$barrio."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['barrio'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where="where id_bar='".$barrio."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }*/
    if (!empty($_POST['empresa'])&&!empty($_POST['coordinacion'])) {
        $where=+"AND id_cof='".$empresa."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])) {
        $where=+"AND id_cof='".$empresa."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['programa'])) {
        $where=+"AND id_cof='".$empresa."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where=+"AND id_cof='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['estado'])) {
        $where=+"AND id_cof='".$empresa."' and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['empresa'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])&&!empty($_POST['estado'])) {
        $where.="AND id_cof='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'and id_est_apr='".$estado."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['coordinacion'])) {
        $where.="AND id_est_apr='".$empresa."' and id_coord='".$coordinacion."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['carrera'])) {
        $where.="AND id_est_apr='".$empresa."' and id_tip_car='".$carrera."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['programa'])) {
        $where.="AND id_est_apr='".$empresa."' and id_prog='".$programa."'";
    }
    if (!empty($_POST['estado'])&&!empty($_POST['carrera'])&&!empty($_POST['coordinacion'])) {
        $where=+"AND id_est_apr='".$empresa."' and id_tip_car='".$carrera."'and id_coord='".$coordinacion."'";
    }  


}
$resultado=$aprendizRespuesta->consultar_listarAprendiz($where);

return $resultado;

}   
public function llenarcampo($id){

require_once'../../../modelo/aprendiz_modelo.php';
$consultalle=new aprendiz_modelo();

return $consultalle->llenarcampos($id);
}

public function consultarAprDocumento(){
require_once('../modelo/aprendiz_modelo.php');
$documento=$_POST['documentoEnvi'];
$consultarApr= new aprendiz_modelo();
$validacion=$consultarApr->consultarAprDocumento($documento);
echo $validacion;

}
public function consultarAprCorreo(){
require_once('../modelo/aprendiz_modelo.php');
$correo=$_POST['CorreoEnvi'];
$consultarApr= new aprendiz_modelo();
$validacion=$consultarApr->consultarAprCorreo($correo);
echo $validacion;

}
public function consultarAprDocumentoActualizar(){
require_once('../modelo/aprendiz_modelo.php');
$idAprendiz=$_POST['idapren'];
$documento=$_POST['documentoEnvia'];
$consultarApr= new aprendiz_modelo();
$validacion=$consultarApr->consultarAprActuaDocumento($idAprendiz,$documento);
echo $validacion;
}
public function consultarAprCorreoActualizar(){

require_once('../modelo/aprendiz_modelo.php');
$idAprendiz=$_POST['idapren'];
$correo=$_POST['CorreoEnvia'];
$consultarApr= new aprendiz_modelo();
$validacion=$consultarApr->consultarAprActuaCorreo($idAprendiz,$correo);
echo $validacion;
}

public function actualizarAprendiz(){
    require_once('../modelo/aprendiz_modelo.php');
      $actualizarAprendiz= new aprendiz_modelo();
      $validacion=$actualizarAprendiz->actualizarAprendiz();
      echo $validacion;
}

public function desabilitarBoton(){

        require_once('../modelo/aprendiz_modelo.php');
        $idapren=$_POST['idapren'];
        $validar=0;
        $validarAgenda= new aprendiz_modelo();
        $validarAg=$validarAgenda->consultarAgenda($idapren);
        $validarCitaPro=$validarAgenda->consultarCitasProg($idapren);
        $validarCitaInclo=$validarAgenda->consultarCitasInclo($idapren);
        $validar=$validarAg+$validarCitaPro+$validarCitaInclo;
        echo $validar;

}

public function registrarformatoPlano(){
$validar=0;
var_dump( $_FILES["excelApr"]);
 $informacionDelArchivo=$_FILES["excelApr"];
$nombre=$informacionDelArchivo["tmp_name"];
require '../librerias/Classes/PHPExcel/IOFactory.php';
require '../modelo/database.php';

$objPHPExcel = PHPExcel_IOFactory::load($nombre);
$objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
echo '<br>numero de columnas= '.$numRows.'<br>';
echo '<table border=1><tr><td>numeroDocumento</td><td>nombre</td><td>apellido</td><td>fecha</td><td>correo</td><td>telefeno</td><td>celular</td><td>direccion</td><td>estado</td><td>tipodocumento</td><td>ficha</td><td>jefe</td></tr>';
for ($i = 1; $i <= $numRows; $i++) {
        
        $documento = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $apellidos = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $fecha = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue();
        $timestamp = PHPExcel_Shared_Date::ExcelToPHP($fecha);
        $fecha_php = date("Y-m-d H:i:s",$timestamp);
        $correo = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $telefeno = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $celular = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
        $direccion = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        $estado= $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
        $tipodocumento= $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
        $ficha= $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
        $jefe= $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getFormattedValue();



        $sql="SELECT id_est_apr FROM `estadoaprendiz` WHERE nombre_est_apr=:estad";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':estad',$estado);
        $stmt->execute();
        $resultado=$stmt->fetch(PDO::PARAM_STR);

         $sql2="SELECT id_tipodoc FROM `tipodocumento` WHERE nombre_tipodoc=:tipoDoc";
        $stmt2=$conn->prepare($sql2);
        $stmt2->bindParam(':tipoDoc',$tipodocumento);
        $stmt2->execute();
        $resultadotipoDoc=$stmt2->fetch(PDO::PARAM_STR);

         $sql3="SELECT id_ficha FROM `ficha` WHERE numero_ficha=:ficha";
        $stmt3=$conn->prepare($sql3);
        $stmt3->bindParam(':ficha',$ficha);
        $stmt3->execute();
        $resultadoficha=$stmt3->fetch(PDO::PARAM_STR);

         $sql4="SELECT id_jef FROM `jefe inmediato` WHERE num_doc_jef=:Numdoc";
        $stmt4=$conn->prepare($sql4);
        $stmt4->bindParam(':Numdoc',$jefe);
        $stmt4->execute();
        $resultadojefe=$stmt4->fetch(PDO::PARAM_STR);
        
        echo '<tr>';
        echo '<td>'. $documento.'</td>';
        echo '<td>'. $nombre.'</td>';
        echo '<td>'. $apellidos.'</td>';
        echo '<td>'. $fecha_php.'</td>';
        echo '<td>'. $correo.'</td>';
        echo '<td>'. $telefeno.'</td>';
        echo '<td>'. $celular.'</td>';  
        echo '<td>'. $direccion.'</td>';     
        echo '<td>'. $resultado['id_est_apr'].'</td>';
        echo '<td>'. $resultadotipoDoc['id_tipodoc'].'</td>';
        echo '<td>'. $resultadoficha['id_ficha'].'</td>';
        echo '<td>'.  $resultadojefe['id_jef'].'</td>';
        echo '</tr>';
        

        $sqlInsert="INSERT INTO aprendiz (num_doc_apr,nombre_apr,apellidos_apr,fecha_nacimiento_apr,correo_institucional_apr,telefono_fijo_apr,celular_apr,direccion_apr,`estado aprendiz_id_est_apr`,`tipo de documento_id_tipodoc`,ficha_id_ficha,`jefe inmediato_id_jef`,lugar_trabajo_idbarrio) VALUES (:documento, :nombre, :apellidos,:fechaNa,:correo,:telefeno,:celular,:direccion,:estadoApr,:tipodocumento,:Noficha,:jefe,null)";
            $stmtInsert=$conn->prepare($sqlInsert);
             $stmtInsert->bindParam(":documento",$documento);
            $stmtInsert->bindParam(":nombre",$nombre);
            $stmtInsert->bindParam(":apellidos",$apellidos);
            $stmtInsert->bindParam(":fechaNa",$fecha_php);
            $stmtInsert->bindParam(":correo",$correo);
            $stmtInsert->bindParam(":telefeno",$telefeno);
            $stmtInsert->bindParam(":celular",$celular);
            $stmtInsert->bindParam(":direccion",$direccion);
            $stmtInsert->bindParam(":estadoApr",$resultado['id_est_apr']);
            $stmtInsert->bindParam(":tipodocumento",$resultadotipoDoc['id_tipodoc']);
            $stmtInsert->bindParam(":Noficha",$resultadoficha['id_ficha']);
            $stmtInsert->bindParam(":jefe",$resultadojefe['id_jef']);
            if($stmtInsert->execute()){$validar+=1;}
    }
    
    echo '<table>';

   if($numRows==$validar){
        echo 'exito se ha registrado los '.$numRows.'registros';
    }
    else{
        echo 'registros registros= '.$numRows-$validar;
    }

}

}


if (isset($_GET['action'])) {
$action = $_GET['action'];
$aprendiz_controlador = new aprendiz_controlador();
$aprendiz_controlador->$action();
}
if (isset($_POST['action'])) {
$action = $_POST['action'];
$aprendiz_controlador = new aprendiz_controlador();
$aprendiz_controlador->$action();
}
?>


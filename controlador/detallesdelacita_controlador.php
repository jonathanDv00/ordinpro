<?php 

class detallesdelacita_controlador
{
	
	
    public function crearDetalles(){

        

         if (!empty($_POST['numeroacta']) && !empty($_POST['horainicio'])&& !empty($_POST['horafin'])&& !empty($_POST['fecha'])&& !empty($_POST['tema'])&& !empty($_POST['objectivo'])&& !empty($_POST['desarrollo'])
         && !empty($_POST['conclusiones'])&& !empty($_POST['actividad'])&& !empty($_POST['comresponsable'])
         && !empty($_POST['fechacompro'])&& !empty($_POST['nombreasistente'])&& !empty($_POST['cargoasis'])&& !empty($_POST['entidadasis'])&& !empty($_POST['nombreinvi'])&& !empty($_POST['cargoinvi'])&& !empty($_POST['entidadinvi'])) {




	
	          require_once("../modelo/asistentes_modelo.php");

                 $Asistente=new asistentes_modelo();
	               $resultado_asistente=$Asistente->get_asistente();
	              if (count($resultado_asistente) > 0 && ($_POST['cargoasis']== $resultado_asistente['cargo_asist'])) {
		
	             }
	            else{

	            $crearAsistente=$Asistente->Insertar_asistentes();

	              }

	                  require_once("../modelo/compromiso_modelo.php");
	               $Compromiso=new compromiso_modelo();
	              $resultado_compromiso=$Compromiso->get_compromiso();
	               if (count($resultado_compromiso) > 0 && ($_POST['actividad']== $resultado_asistente['Nombreactividad'])) {
		
	               }
	               else{

	                $crearCompromiso=$Compromiso->Insertar_compromiso();

	                }

	                 require_once("../modelo/invitados_modelo.php");

	               $Invitados=new invitados_modelo();
	             $resultado_invitados=$Invitados->get_invitado();
	             if (count($resultado_invitados) > 0 && ($_POST['nombreinvi']== $resultado_asistente['nombre'])) {
		
	               }
	             else{

	                 $crearInvitado=$Invitados->Insertar_invitados();

	              }
	
	            require_once('../modelo/detallesdelacita_modelo.php');
	             $detalles=new detallesdelacita_modelo();
	            $validacion=$detalles->Insertar_detalles();
	

	            if ($validacion==1) {
		
		
                header('Location: ../html/Instructor de seguimiento/RegistrarDetalles.php');

	            }else{
			
                header('Location: ../html/Administrador/paginaPrinciapl.php');

	             }
         
            }else{
	

                header('Location:../html/Administrador/paginaPrincipal.php');
            }
        }
              public function generalreporte(){
  
	   require_once('../../../modelo/detallesdelacita_modelo.php');
                $detallesreporte=new detallesdelacita_modelo();

                   $resultado=$detallesreporte->reportes();

                    return $resultado;
         } 

    }


            if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $detalles = new detallesdelacita_controlador();
            $detalles->$action();
            }
            else if (isset($_POST['action'])) {
            $action = $_POST['action'];
            $detalles = new detallesdelacita_controlador();
            $detalles->$action();
            }

?>
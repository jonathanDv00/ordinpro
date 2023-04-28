<?php

class agenda_controlador {

    public function habilitarAgenda() {
       
        $validar=0;
        $id_user = $_POST['txtIduser'];

        $idapr = $_POST['txtAprendiz'];

        require_once'../modelo/instructor_modelo.php';
        $instructor = new instructor_modelo();
        $where = "WHERE  usuario_id_usuario='" . $id_user . "'";

        foreach ($instructor->consultar_listarinstructor($where) as $i) {
            $idins = $i['id_inst'];
        }

        require_once'../modelo/aprendiz_modelo.php';
        $apr = new aprendiz_modelo();

        $whereApr = "WHERE id_apr='" . $idapr . "'";
        foreach ($apr->consultar_listarAprendiz($whereApr) as $a) {
            $idj = $a["jefe inmediato_id_jef"];
        }

        require_once'../modelo/agenda_modelo.php';
        $agenda = new agenda_modelo();

        $jefe = $idj;
        $instruc = $idins;

        $fecha1 = $_POST['fechaini'];


        $fecha2 = $_POST['fechafin'];

        $fechaInicio = strtotime($fecha1);
        $fechaFin = strtotime($fecha2);
        $val = 0;
        require_once'../modelo/citas_modelo.php';
        $citaValidar = new citas_modelo();
        for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
            $fechaInsert = date("Y-m-d", $i);
            $dia = date("w", strtotime($fechaInsert));
           
            if ($dia == 0 || $dia == 6) {
                
            } else {
                for ($u = 1; $u <= 7; $u++) {
                    switch ($u) {
                        case 1:
                            $hora = date("08:00:00");
                            $hora2 = date("08:40:00");
                            break;
                        case 2:
                            $hora = date("09:00:00");
                            $hora2 = date("09:40:00");
                            break;
                        case 3:
                            $hora = date("09:50:00");
                            $hora2 = date("10:20:00");
                            break;
                        case 4:
                            $hora = date("10:40:00");
                            $hora2 = date("11:10:00");
                            break;
                        case 5:
                            $hora = date("11:30:00");
                            $hora2 = date("12:00:00");
                            break;
                        case 6:
                            $hora = date("14:00:00");
                            $hora2 = date("14:40:00");
                            break;
                        case 7:
                            $hora = date("15:00:00");
                            $hora2 = date("15:40:00");
                            break;
                    }
                    $validarcita = $citaValidar->validarCitas($fechaInsert, $hora, $instruc);

                    if ($validarcita == 0) {
                        $validar = $agenda->habilitarAgenda($instruc, $idapr, $jefe, $fechaInsert, $hora, $hora2);
                        
                    }
                }
            }
        }/*
          switch ($val) {
          case 0:
          header('location: ../html/Administrador/aprendiz/habilitarAgenda_vista.php?idapr='.$idapr.'');
          break;

          case 1:
          header('location: ../html/Administrador/aprendiz/consultarAprendiz_vista.php');
          break;
          } */
       
          echo $validar;
    }

    public function agendarcita() {
      
        $ida = $_POST['idaprendiz'];
        $val=0;
            require'../modelo/citas_modelo.php';
            $agendarcita = new citas_modelo();

            $val = $agendarcita->agendarcita();
            if ($val == 1) {

                
                foreach ($agendarcita->ultimacitaAprendiz($ida) as $ultci) {
                    $idcita = $ultci["MAX(id_cit)"];
                }
                foreach ($agendarcita->CitaSalvar($idcita) as $ci) {
                    $idagenda = $ci['idagenda'];
                    $fechaAgenda = $ci['fechaAgenda'];
                    $horaInicio = $ci['horaInicio'];
                    $horaFin = $ci['horaFin'];
                    $idinstructor_id = $ci['idinstructor_id'];
                }
                require_once'../modelo/agenda_modelo.php';
                $agenda = new agenda_modelo();

                $agenda->modificarEstadoAgenda($ida, $idagenda);
                $agenda->desabilitarAgendaAprendiz($ida, $idagenda);
                $agenda->desabilitarUnaHora($idinstructor_id, $fechaAgenda, $horaInicio);
            } 

        echo $val;
    }

    public function devolverAgenda($idapren){
        require_once('../../../modelo/aprendiz_modelo.php');
        $validarAgenda= new aprendiz_modelo();
        $validarAg=$validarAgenda->consultarAgenda($idapren);
        $validarCitaPro=$validarAgenda->consultarCitasProg($idapren);
        $validarCitaInclo=$validarAgenda->consultarCitasInclo($idapren);
        $validar=$validarAg+$validarCitaPro+$validarCitaInclo;
        return $validar;
    }

}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $agenda = new agenda_controlador();
    $agenda->$action();
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $agenda = new agenda_controlador();
    $agenda->$action();
}
?>
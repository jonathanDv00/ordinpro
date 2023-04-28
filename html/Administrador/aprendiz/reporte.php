<?php 
require("../../../controlador/detallesdelacita_controlador.php");
$stmt=new detallesdelacita_controlador();
       require_once('../../../lib/pdf/mpdf.php');
        require '../../../modelo/database.php';

       foreach ($stmt->generalreporte() as $reporte) {

       $html=' <header class="clearfix">
      <div id="logo">
        <img src="../../../img/logo.jpg" >
      </div>
      <h1>Reporte de detalle de la cita</h1>
      <div id="company" class="clearfix">
        <div><p>
              Este es el registro del detalle de la cita que se le realiza al aprendiz 
         </p></div>
        
      </div>
      <div id="project">
        <div><span>PROJECT</span> Ordinpro</div>
        <div><span>CLIENT</span> Aprendices</div>
        
      </div>
    </header>
    <main>
      <table> 


                    <tr><th colspan="">Detalles de la cita</th></tr>
                     <tr>
                        <td>Nombre Apendiz</td>
                        <td>'.$reporte['nombre_apr'].'</td>
                    </tr>
                    <tr>
                        <td>Nuemro Acta</td>
                        <td>'.$reporte['Numeroacta'].'</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>'.$reporte['fecha'].'</td>
                    </tr>
                    
                    <tr>
                        <td>Hora inicio</td>
                        <td>'.$reporte['horaInicial'].'</td>
                    </tr>
                    <tr>
                        <td>Hora fin</td>
                        <td>'.$reporte['horaFinal'].'</td>
                    </tr>
              
                    <tr>
                        <td>Tema de la reunion</td>
                        <td>'.$reporte['Temareunion'].'</td>
                    </tr>
                     <tr>
                        <td>Objectivos de la reunion</td>
                        <td>'.$reporte['objectivos'].'</td>
                    </tr>
                    <tr>
                        <td>Desarrollo de la reunion</td>
                        <td>'.$reporte['Desarrolloreunion'].'</td>
                    </tr>
                     <tr>
                        <td>Concluciones</td>
                        <td>'.$reporte['ConclusionesReunion'].'</td>
                    </tr>
                       <tr><th colspan="">Datos sobre compromiso</th></tr>
                    <tr>
                        <td> Nombre Compromisos</td>
                        <td>'.$reporte['Nombreactividad'].'</td>
                    </tr>
                    <tr>
                        <td> Fecha Compromisos</td>
                        <td>'.$reporte['fecha'].'</td>
                    </tr>
                     <tr>
                        <td>Responsable compromisos</td>
                        <td>'.$reporte['responsable'].'</td>
                    </tr>
                       <tr><th colspan="">Datos del Asistentes</th></tr>
                    <tr>
                        <td>Nombre Asistentes</td>
                        <td>'.$reporte['nombre_asist'].'</td>
                    </tr>
                     <tr>
                        <td> Cargo Asistentes</td>
                        <td>'.$reporte['cargo_asist'].'</td>
                    </tr>
                     <tr>
                        <td> Entidad </td>
                        <td>'.$reporte['entidad'].'</td>
                    </tr>
                       <tr><th colspan="">Datos de Invitados</th></tr>
                     <tr>
                        <td> Nombre Invitados</td>
                        <td>'.$reporte['nombre'].'</td>
                    </tr>
                     <tr>
                        <td> Cargo Invitados</td>
                        <td>'.$reporte['cargo'].'</td>
                    </tr>
                     <tr>
                        <td> Entidad Invitados</td>
                        <td>'.$reporte['entidad'].'</td>
                    </tr>
                </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Este registro tiene validez hasta que el aprendiz  termine su programa de formacion</div>
      </div>
    </main>';
  }
        $mpdf= new mPDF('c','A4');
        $css=file_get_contents('../../../css/reporte.css');
        $mpdf->writeHTML($css,1);
          $mpdf-> writeHTML($html);
            $mpdf->Output('reporte.pdf','I');

 ?>
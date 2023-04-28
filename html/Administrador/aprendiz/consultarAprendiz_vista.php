<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 
require_once ("../../../controlador/aprendiz_controlador.php");
$stmt = new aprendiz_controlador();
?>
<html>

<head>

  <title>Ordinpro-pagina-principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
    <link rel="stylesheet" href="../../../img/fonts/style.css">
</head>

<body background="../../../img/fondoabs.jpg">

   <div class="container-fluid ">
        <div class="row align-items-center bg-blue ">
          <div class="col-lg-3">
            <img class="imagen" src="../../../img/logo.jpg " alt="">
          </div>
          <div class=" menuPerfil col-lg-4 offset-5  ">
            <div class="row">
              <h6 class="mt-2"><span class="icon-user-circle-o"></span> David Julian Perez Fernandez</h6>
              <span class="icon-bell1 ml-4 mt-2"></span>
              <ul class="nav mb-4">
              <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="icon-cog ml-4"></span></a>
                <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">Ver cuenta</a>               
                  <a href="../../../controlador/usuario_controlador.php?action=desconectarse" class="dropdown-item">Cerrar seccion</a>
                </div>
    
              </li>
            </ul>
            </div>
          </div>
        </div>
      </div>


    <div class="container-fluid">
        <div class="main row">
                <div class="menuDesplegable col-sm-2">
                <div>
                <li><a href="../paginaPrincipal.php"><span class="icon-home"></span>Inicio</a></li>
                <li><a href=""><span class="icon-calendar"></span>Calendario</a></li>
                <div id="acordion">
                    
                    <li><a href="#uno" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-calendar-check-o"></span>Habilitar
                            agenda</a></li>
                    <div id="uno" class="collapse ">
                        
                        <li><a href=""><span class="icon-building"></span>Buscar empresa</a></li>
                        <li><a href=""><span class="icon-location-pin"></span>Zona empresarial</a></li>
                    </div>
                </div>
                <div id="acordion">

                    <li><a href="#dos" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-o"></span>Aprendices</a>
                    </li>
                    <div id="dos" class="collapse ">
                        <div id="acordion">
                                <li><a href="consultarAprendiz_vista.php"><span class="icon-search"></span>Consultar aprendiz</a></li>
                            <li><a href="#tres" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-plus"></span>Crear
                                    registro</a></li>
                            <div id="tres" class="collapse ">
                                <li><a href="formatoManual.php"><span class="icon-edit1"></span>Manual</a></li>
                                <li><a href="formatoplano.html"><span class="icon-share-alternitive"></span>Formato plano</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <li><a href=""><span class="icon-envelope-o"></span>Mensajes</a></li>
                <div id="acordion">
                    <li><a href="#cuatro" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-users1"></span>Usuarios</a>
                    </li>
                    <div id="cuatro" class="collapse ">
                        <li><a href="#subcuatro" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-add-user"></span>Crear
                                usuario</a></li>
                        <div id="subcuatro" class="collapse ">
                            <li><a href="../usuario/jefeInmediato_vista.php"><span class=""></span>Jefe Inmediato</a></li>
                            <li><a href="../usuario/RegistroInstructorDeSeguimiento.php"><span class=""></span>Instructor</a></li>
                        </div>
                    </div>
                    <div id="cuatro" class="collapse ">
                            <li><a href="#subcuatro1" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-search"></span>consultar
                                    usuario</a></li>
                            <div id="subcuatro1" class="collapse ">
                                <li><a href="../usuario/consultarjefeimediato.php"><span class="icon-address-book-o"></span>Jefe Inmediato</a></li>
                                <li><a href="../usuario/consultarinstructor_vista.php"><span class="icon-address-book-o"></span>Instructor</a></li>
                            </div>
                        </div>
                </div>
                <div id="acordion">
                    
                    <li><a href="#cinco" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-building"></span>Ente
                            coformador</a></li>
                    <div id="cinco" class="collapse ">
                        <li><a href="../entecoformador/enteCoformador_vista.php"><span class=" icon-plus-square"></span>Registrar Ente </a></li>
                        <li><a href="../entecoformador/consultarenteconformador.php"><span class=" icon-search"></span>Consultar Ente </a></li>
                    </div>
                </div>
                <li><a href=""><span class="icon-wpforms"></span>Reportes</a></li>
            </div>
            <div class="VentanaProcesos col-md-10 shadow-lg p-3 mb-5  rounded my-custom-scrollbar">
                <div class="row mensaje">
                    <div class="offset-5 mensaje">
                        <h5>Consultar aprendiz</h5>
                    </div>

                </div>
                   <div class="row linea2 ">

                </div>
                <br>
                <div class="aprendices row shadow p-4   ">
                    <div class="  col-3 ">
                        <form method="POST">

                            <div id="acordion">

                                <li><a href="#doc" class=" card-link" data-toggle="collapse"
                                        data-parent="#acordion">Informacion del aprendiz
                                        <span class="icon-caret-down"> </a></li>
                                <div id="doc" class="collapse ">
                                    <label for="nombre">Documento del aprendiz:</label><input type="text" id="nombre"
                                        class="form-control" name="documento" value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="15">
                                        <br>
                                    <div>
                                         Estado
                                        <select name="estado" id="cbx_estado" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-4">
                        <div id="acordion">

                            <li><a href="#cor" class=" card-link" data-toggle="collapse"
                                    data-parent="#acordion">Informacion de ficha
                                    <span class="icon-caret-down"></span></a></li>
                            <div id="cor" class="collapse ">
                                <div>
                                    <label for="nombre">No.ficha :</label><input type="text" id="nombre"
                                        class="form-control" name="ficha" value="" onkeyup="this.value=validarNumeros(this.value)" maxlength="10">
                                </div>
                                <div>
                                  
                                Coordinacion:
                                <select  name="coordinacion" id="cbx_coordi" class="form-control">
                                                                        
                                </select>
                                </div>
                                <br>
                                <div>
                                   Tipo de carrera:
                                    <select  name="carrera" id="cbx_carrera" class="form-control"></select>
                                </div>
                                <br>
                                <div>
                                Programa de formacion:
                                <select  name="programa" id="cbx_programa" class="form-control">
                                </select>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>

                    </div>
                    <div class="col-5">
                        <div id="acordion">

                            <li><a href="#ubi" class=" card-link" data-toggle="collapse"
                                    data-parent="#acordion">Ubicacion del aprendiz
                                    <span class="icon-caret-down"> </a></li>
                            <div id="ubi" class="collapse ">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                           Departamento:
                                        <select  name="departamento" id="cbx_dep" class="form-control">
                                                                        
                                        </select>
                                        </div>
                                        <br>
                                        <div>
                                          Municipio:
                                        <select  name="municipio" id="cbx_mun" class="form-control">
                                        </select>
                                        </div>
                                        <br>
                                        <div>
                                          Zona/Localidad:
                                        <select  name="zona" id="cbx_zona" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div>                                           
                                         Barrio:
                                        <select  name="barrio" id="cbx_barrio" class="form-control">                                 
                                        </select>
                                        </div>
                                        <br>
                                        <div>
                                            Empresa:
                                            <select class="custom-select" name="empresa" id="cbx_enteCof">
                                             
                                            </select>
                                        </div>
                                        <br>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offset-5 col-2">
                    <button type="submit" name="buscar" class="btn btn-info">Buscar</button>
                    </div>
                    </form>
                </div>

                <br>
                <br>
                <br>

                <div class="row">

                    <div id="main-container">
                        <table class="table-bordered">
                            <thead>
                                
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Correo </th>
                                <th>Celular </th>
                                <th>Direccion </th>
                                <th>N· de ficha</th>
                                <th>Coordinacion</th>
                                <th>Tipo de carrera</th>
                                <th>Programa de formacion </th>
                                <th>Estado </th>
                                <th>Jefe inmediato </th>
                                <td>lugar_de_trabajo</td>
                                <th>Ente coformador </th>
                                <th>Direccion Entecoformador </th>
                                <th>Accion</th>


                            </thead>
                             <?php 
                             $idapren=0;
                             $veces=0;
                            foreach ($stmt->consultarAprendiz() as $aprendiz) {
                                $veces=$veces+1;
                               $idapren=$aprendiz['id_apr'];      
                            echo'
                            <tr>                         
                            <td>'.$aprendiz['nombre_apr'].'</td>
                            <td>'.$aprendiz['apellidos_apr'].'</td>
                            <td>'.$aprendiz['nombre_tipodoc'].'</td>
                            <td>'.$aprendiz['num_doc_apr'].'</td>
                            <td>'.$aprendiz['correo_institucional_apr'].'</td>
                            <td>'.$aprendiz['celular_apr'].'</td>
                            <td>'.$aprendiz['direccion_apr'].'</td>
                            <td>'.$aprendiz['numero_ficha'].'</td>
                            <td>'.$aprendiz['nombre_coord'].'</td>
                            <td>'.$aprendiz['nombre_tipcar'].'</td>
                            <td>'.$aprendiz['nombre_prog'].'</td>
                            <td>'.$aprendiz['nombre_est_apr'].'</td>
                            <td>'.$aprendiz['nombre_jef'].$aprendiz['apellidos_jef'].'</td>
                            <td>'.$aprendiz['nombre_dep'].'-'.$aprendiz['nombre_mun'].'-'.$aprendiz['nombre_zon'].'-'.$aprendiz['nombre_bar'].'</td>
                            <td>'.$aprendiz['nombre_cof'].'</td>
                            <td>'.$aprendiz['direccion_cof'].'</td>
                            <td>'.'<a href="actualizarAprendiz_vista.php?idap='.$aprendiz['id_apr'].'" class="btn btn-outline-info " id="prueba">Actualizar</a>'.
                            '<a href="HistorialCitas.php?idap='.$aprendiz['id_apr'].'" class="btn btn-outline-info " id="prueba">historial </a>'.'<button class="btn btn-outline-info" id="bntHabilitarAge'.$veces.'" onclick="redirigirHabilitar('.$idapren.')" value="'.$idapren.'">Habilitar</button>'.'</td>
                            </tr>
                            ';
                            }                                                   
                            ?>  
                            <input type="hidden" name="hdnVeces" id="hdnVeces" value="<?php echo $veces; ?>">
                                      <form action="proceso.php" method="POST">
                                    <div class="modal fade" id="modal1">
                                        <div class="modal-dialog  modal-lg">
                                            <div class="modal-content">
                                                <!-- header de la ventana -->
                                                <div class="modal-header colorModal" style="background:#f37812;color:white;">

                                                    <h4 class="modal-title">Fecha habilitacion de agenda</h4>
                                                    <?php echo $_GET['idg'];?>
                                                    <button tyle="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                        &times;
                                                    </button>
                                                </div>
                                                <!-- contenido de la ventana -->
                                                <div class="modal-body">
                                                    <div class="form-group row">

                                                        <label for="example-date-input" class=" offset-1 col-2 col-form-label">Dia
                                                            inicial </label>
                                                        <span class="icon-calendar-plus-o ml-4 mt-2"></span>
                                                        <div class="col-5">
                                                            <input class="form-control" type="date" name="fechaNa"
                                                                step="1" min="1950-01-01" max="2019-12-31"
                                                                value="<?php echo date('Y-m-d');?>">
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">

                                                        <label for="example-date-input" class="offset-1 col-2 col-form-label">Dia
                                                            inicial</label>
                                                        <span class="icon-calendar-check-o ml-4 mt-2"></span>
                                                        <div class="col-5">
                                                            <input class="form-control" type="date" name="fechaNa"
                                                                step="1" min="1950-01-01" max="2019-12-31"
                                                                value="<?php echo date('Y-m-d');?>">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- contenido del footer -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-dark" data-dismiss="modal">
                                                        Cerrar
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        Habilitar agenda
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                                                                                                                                                                                                                
                        </table>

                    </div>


                </div>


            </div>

        </div>
    </div>
    <footer class="">
        <div class="offset-4 col-5 ">
            <p class="text-center">.:: Servicio Nacional de Aprendizaje SENA – Dirección General Calle 57 No. 8-69,
                Bogotá D.C
                PBX (57 1) 5461500
                Línea gratuita de atención al ciudadano Bogotá 5925555 – Resto del país 018000 910270
                Horario de atención: lunes a viernes de 8:00 am a 5:30 pm
                Correo electrónico para notificaciones judiciales: servicioalciudadano@sena.edu.co
                Todos los derechos reservados © 2019 ::.</p>
        </div>
    </footer>
  <?php require "../../modales/modales.php";?>
   <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../js/index.js"></script>
<script type="text/javascript" src="../../../js/validar.js"></script>
<script type="text/javascript">
    
function noMostrarBotones(){
/*
var vuelas=$("#hdnVeces").val();
var u=1;
for (var i = 1; i <=vuelas; i++) {
 idApren=$("#bntHabilitarAge"+i).val();
 //alert(idApren);
   $.ajax({     
    url:'../../../controlador/aprendiz_controlador.php',
    data:{idapren:idApren,action:"desabilitarBoton"},
    type:'POST',
     success: function (resultado) {
    //alert("vuela= "+u);
    // alert("resultado= "+resultado);
    var buttonHabi=document.getElementById("bntHabilitarAge"+u);
    var buttonDesa=document.getElementById("bntDesabilitar"+u);
    var buttonDetalle=document.getElementById("bntDetalleCi"+u);
        if(resultado==1){ 
       // alert('1');       
        buttonHabi.hidden=true; 
        buttonDetalle.hidden=true; 
        }
        if(resultado==2){     
      //  alert('2');   
        buttonHabi.hidden=true; 
        buttonDetalle.hidden=true;
        buttonDesa.hidden=true; 
        }if (resultado==3) {
        // alert('3');   
          buttonDesa.hidden=true;   
          buttonHabi.hidden=true; 
        }if (resultado==0) {
        // alert('0'); 
        buttonDesa.hidden=true; 
        buttonDetalle.hidden=true; 
               
        } 
        u=u+1;  
            }
   })  
}*/
}
//noMostrarBotones();


function redirigirHabilitar(idApr){

$.ajax({     
    url:'../../../controlador/aprendiz_controlador.php',
    data:{idapren:idApr,action:"desabilitarBoton"},
    type:'POST',
     success: function (resultado) {
    //alert("vuela= "+u);
    // alert("resultado= "+resultado);
 
        if(resultado==1){ 
             
     $("#desabilitarAgendaModal").modal("show");  
        }
        if(resultado==2){     
          $("#cancelarCitaM").modal("show"); 
       
        }if (resultado==3) {         
         $("#detalleCitaM").modal("show");  
        }if (resultado==0) {
        
     window.location = "habilitarAgenda_vista.php?idapr="+idApr+"";             
        }  

        }
   })  



}
</script>
</body>

</html>

<?php /*
.'<button class="btn btn-outline-info" id="bntDesabilitar'.$veces.'" value="'.$idapren.'">Desabilitar</button>'.'<button class="btn btn-outline-info" id="bntDetalleCi'.$veces.'" value="'.$idapren.'">Detalles Cita</button>'

*/ ?>
<?php
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 
require_once("../../../controlador/enteconformador_controlador.php");

$idcof=$_GET['ident'];
$datos=new enteconformador_controlador();
$datos->actualizarEnteCoformador();

foreach ($datos->llenarcampo($idcof) as $ente) {
   $nitCof=$ente['NIT_cof'];
   $nombreCof=$ente['nombre_cof'];
   $direccionCof=$ente['direccion_cof'];
   $telCof=$ente['tel_fijo_cof'];
   $celCof=$ente['cel_cof'];
   $correoCof=$ente['correo_cof'];
}

?>
<?php 


/*$sqlNit_cof="SELECT NIT_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtNit_cof=$conn->prepare($sqlNit_cof);
$stmtNit_cof->execute();


$sqlNombre_cof="SELECT nombre_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtNombre_cof=$conn->prepare($sqlNombre_cof);
$stmtNombre_cof->execute();

$sqlTelefono_cof="SELECT tel_fijo_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtTelefono_cof=$conn->prepare($sqlTelefono_cof);
$stmtTelefono_cof->execute();

$sqlCelular_cof="SELECT cel_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtCelular_cof=$conn->prepare($sqlCelular_cof);
$stmtCelular_cof->execute();

$sqlCorreo_cof="SELECT correo_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtCorreo_cof=$conn->prepare($sqlCorreo_cof);
$stmtCorreo_cof->execute();

$sqlDireccion_cof="SELECT direccion_cof FROM `ente coformador` WHERE id_cof='$idcof'";
$stmtDireccion_cof=$conn->prepare($sqlDireccion_cof);
$stmtDireccion_cof->execute();*/
?>



<!DOCTYPE html>
<html>

<head>

	<title>Ordinpro-pagina-principal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
    <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento2.css">
	
	<link rel="stylesheet" href="../../../img/fonts/style.css">
</head>

<body background="../../../img/fondoabs.jpg">

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
                                <li><a href="../aprendiz/consultarAprendiz_vista.php"><span class="icon-search"></span>Consultar aprendiz</a></li>
                            <li><a href="#tres" class="card-link" data-toggle="collapse" data-parent="#acordion"><span class="icon-user-plus"></span>Crear
                                    registro</a></li>
                            <div id="tres" class="collapse ">
                                <li><a href="../aprendiz/formatoManual.php"><span class="icon-edit1"></span>Manual</a></li>
                                <li><a href="../aprendiz/formatoplano.html"><span class="icon-share-alternitive"></span>Formato plano</a></li>
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
                        <li><a href="enteCoformador_vista.php"><span class=" icon-plus-square"></span>Registrar Ente </a></li>
                        <li><a href="consultarenteconformador.php"><span class=" icon-search"></span>Consultar Ente </a></li>
                    </div>
                </div>
                <li><a href=""><span class="icon-wpforms"></span>Reportes</a></li>
			</div>
			<div class="VentanaProcesos col-lg-10 shadow-lg p-4 mb-5  ">
				<div class="row mensaje">
					<div class="offset-lg-4  " style="color: rgb(245, 245, 245)">
						<h4>Actualizar Ente coformador</h4>
                    </div>
				</div>
				<div class="row linea2 ">

                </div>
                <br>

                
                    <div class="row">
                            
                        <form action="" method="POST" class="actualizarInstructor offset-1 col-8">
                            <div class="row">
                            <div class="col-6">
<br>
                                <label for="nit">Nit:</label>
                                <input type="text" id="nombre" name="nit" class="form-control" value="<?php echo $nitCof?>">
                                <label for="nombre">Nombre de la empresa:</label>
                                <input type="text" id="nombre" class="form-control" name="nombre" value="<?php echo $nombreCof?>">
                                <label for="tel">Telefono:</label>
                                <input type="text" id="nombre" class="form-control" name="tel" value="<?php echo $telCof?>">
                                <label for="cel">Celular:</label>
                                <input type="text" id="nombre" class="form-control" name="cel" value="<?php echo $celCof?>">
                                <label for="email">Correo:</label>
                                <input type="text" id="nombre" name="email" class="form-control" value="<?php echo $correoCof?>">
                                <br>
            
                                    <br>
                                </div> 
                                <div class="col-6">
                                    <br>
                                    <div class="">
                                            Departamento:
                                            <select id="cbx_dep" name="departamento" class="custom-select">
                                            </select>
                                        </div>   
                                        <br>
                                    <div class="">
                                            Municipio:
                                            <select id="cbx_mun" name="municipio" class="custom-select">
                                            </select>
                                        </div>  
                                        <br>
                                     <div>
                                                    Zona:
                                                    <select id="cbx_zona" class="custom-select">
                                                    </select>
                                                </div>
                                                <br>
                                        <div>
                                                Barrio:
                                                <select id="cbx_barrio" name="barrio" class="custom-select">
                                                </select>
                                            </div>
                                            

                                                <br>

                                                <label for="direccion">Direccion:</label>
                                                <input type="text" id="nombre" name="direccion" class="form-control" value="<?php echo $direccionCof?>">
                                            <br>
                                            <div class="offset-2">
                                                   
                                                <input type="submit" value="Actualizar " class="btn btn-info">
                                                <input type="submit" value="Cancelar" class="btn btn-danger">
                                                </div>
                                                <br>
                                        </div>
                                    </div>
                         </form>
                         <div class="col-3">
                                <img src="../../../img/empresa.png" alt="" style="width: 250px; ">
                                                        </div>
                </div>
			</div>

		</div>
	</div>
<footer class="">
<div class="offset-4 col-5 ">
	<p class="text-center">.:: Servicio Nacional de Aprendizaje SENA – Dirección General Calle 57 No. 8-69, Bogotá D.C 
		PBX (57 1) 5461500 
			Línea gratuita de atención al ciudadano Bogotá 5925555 – Resto del país 018000 910270
			Horario de atención: lunes a viernes de 8:00 am a 5:30 pm
			Correo electrónico para notificaciones judiciales: servicioalciudadano@sena.edu.co
			Todos los derechos reservados © 2019 ::.</p>
		</div>
</footer>
	<script src="../../../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../../../js/popper.min.js"></script>
	<script src="../../../js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../../js/index.js"></script>

</body>

</html>
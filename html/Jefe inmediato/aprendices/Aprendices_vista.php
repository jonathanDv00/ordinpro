<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../../login.php');
} 

$iduser=$_SESSION['users_id'];

?>

<html lang="en">

<head>
  <title>Pagina principal jefe inmediato</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento.css">
  <link rel="stylesheet" type="text/css" href="../../../css/EstiloAgendamiento2.css">
  <link rel="stylesheet" href="../../../img/fonts/style.css">
</head>

<body background="../../../img/fondoabs.jpg">
  <div class="container-fluid ">
    <div class="row align-items-center bg-blue ">
      <div class="col-lg-3">
        <img class="imagen" src="../../../img/logoOrdinpro.png " alt="">
      </div>
      <div class=" menuPerfil col-lg-4 offset-5  ">
        <div class="row">
          <h6 class="mt-2"><span class="icon-user-circle-o"></span> David Julian Perez Fernandez</h6>
          <span class="icon-bell1 ml-4 mt-2" ></span>
          <ul class="nav mb-4">
          <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="icon-cog ml-4 " style="font-size: 25px"></span></a>
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


  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ordinpro</a>
    <div class="navbar-nav text-center mr-auto ml-auto">
      <a class="nav-item nav-link " href="../paginaJefe.php">Inicio </a>
      <a class="nav-item nav-link " href="#">Calendario</a>
      <a class="nav-item nav-link " href="Aprendices_vista.php">Aprendices</a>
      <a class="nav-item nav-link " href="#">Ayuda</a>
    </div>
  </nav>

  <br>
  <br>
  <div class="container">
      <div class="row"><div class="col-9">
            <h2>Aprendices</h2>
      </div>
   <div class="  col-3">
<h6 > <span class="icon-calendar-check-o"></span> Agendar cita</h6>
<h6 > <span class="icon-calendar-minus-o"></span> No tiene proceso</h6>
<h6 > <span class="icon-calendar-times-o"></span> Cancelar cita</h6>
<h6 > <span class="icon-warning1"></span> Cambiar estado del aprendiz a compromiso</h6>



   </div>
     
        </div>
        <br>
     <br>

    <div class="row">

        <div id="main">
            <table class="">
                <thead class="tituloTabla">
                    <tr>
                     <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Correo </th>
                                <th>Celular </th>
                                <th>Direccion </th>
                                <th>N· de ficha</th>                               
                                <th>Tipo de carrera</th>
                                <th>Programa de formacion </th>
                                <th>Estado </th>                               
                                <th>Ente coformador </th>                               
                                <th>Accion</th>
                </tr>

                </thead>
                               <?php 
                            require_once ("../../../controlador/aprendiz_controlador.php");
                            $stmt = new aprendiz_controlador();
                            foreach ($stmt->consultarAprendizJefe($iduser) as $aprendiz) {
                                     
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
                            <td>'.$aprendiz['nombre_tipcar'].'</td>
                            <td>'.$aprendiz['nombre_prog'].'</td>
                            <td>'.$aprendiz['nombre_est_apr'].'</td>                                                      
                            <td>'.$aprendiz['nombre_cof'].'</td>                            
                            <td>'.'<a href="agendarCita_vista.php?idap='.$aprendiz['id_apr'].'" class="icon-calendar-check-o  " style="font-size: 25px" id="prueba"></a>'.'</td>
                            </tr>
                            ';
                            }
                                                      
                            ?>                        
            </table>

        </div>



       
  </div>
  




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
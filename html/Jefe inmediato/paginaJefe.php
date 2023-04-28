<?php 
session_start();
if (!isset($_SESSION['users_id'])) {

header('Location: ../login.php');
} 
else{
$idus=$_SESSION['users_id'];/*
require_once'../../controlador/usuario_controlador.php';
$validar=new usuario_controlador();
$validar->DetectarIn($idus);*/

}


?>

<html lang="en">

<head>
  <title>Pagina principal jefe inmediato</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/EstiloAgendamiento.css">
  <link rel="stylesheet" href="../../img/fonts/style.css">
</head>

<body background="../../img/fondoabs.jpg">
  <div class="container-fluid ">
    <div class="row align-items-center bg-blue ">
      <div class="col-lg-3">
        <img class="imagen" src="../../img/logo.jpg " alt="">
      </div>
      <div class=" menuPerfil col-lg-4 offset-5  ">
        <div class="row">
          <h6 class="mt-2"><span class="icon-user-circle-o"></span> David Julian Perez Fernandez</h6>
          <span class="icon-bell1 ml-4 mt-2"></span>
          <ul class="nav mb-4">
          <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="icon-cog ml-4"></span></a>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">Ver cuenta</a>             
               <a href="../../controlador/usuario_controlador.php?action=desconectarse" class="dropdown-item">Cerrar seccion</a>
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
      <a class="nav-item nav-link " href="PaginaPrincipal.html">Inicio </a>
      <a class="nav-item nav-link " href="#">Calendario</a>
      <a class="nav-item nav-link " href="aprendices/Aprendices_vista.php">Aprendices</a>
      <a class="nav-item nav-link " href="#">Notificacion</a>
    </div>
  </nav>

  <br>
  <br>
  <div class="container">
      <div class="row">
          <h2>bienvenido jefe </h2>
      
        </div>
  </div>
  




  <script src="../../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
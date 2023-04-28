<?php 
session_start();
require("../modelo/database.php");
$idus=$_SESSION['users_id'];
echo $idus;
//$_SESSION['users_id']=null;
/*$cont="ordinproinstructor";
if (!empty($_POST['contrasenaNueva'])&& !empty($_POST['contrasenaConfirmar'])) {
  

  if ($_POST['contrasenaNueva']==$_POST['contrasenaConfirmar']){
  $sql="UPDATE usuario SET contrasenia=:passwordC WHERE id_usuario=:idusuario";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':passwordC',$_POST['contrasenaConfirmar']);
  $stmt->bindParam(':idusuario',$idus);
  if($stmt->execute()){

  }

  header('Location: login.php');
  
}
else{
$message="Pailas";

  
  }
}*/



?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/EstiloAgendamiento.css">
  <link rel="stylesheet" href="../img/fonts/style.css">
  <title>Cambio de contraseña</title>
</head>
<!-- hay que colocar la imagen en la carpeta tanto de fondoPantalla como la de logoOrdinpro img  -->
<body>
  <div class="container-fluid">
    <div class="row">

      <div class="col-5 mt-10">
        <img src="../img/logoOrdinpro.png" alt=""
          style="width: 585px; height: 200px; margin-top: 168px; margin-left: 60px ">
      </div>
      <div class="col-1">

      </div>
      <!-- ---------------------codigo cambio de contraseña -->
      <div class="col-6 ">

        <div class="row " style="margin-top: 100px">

          <div class="offset-2 col-7 aprendices">

<!-- aqui tiene que poner en EstiloAgendamiento la clase mensaje 2 -->
            <div class="row mensaje2">
              <div class="offset-2">
                <h4>Cambio de contraseña</h4>
              </div>


            </div>

            <br>
            <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading"><span class="icon-exclamation-circle"></span></h4>
              Por razones de seguridad por favor cambia tu contraseña
            </div>
            <br>
            <form method="POST" class="actualizarInstructor" id="frmCambioPassOne" onsubmit="return cambiarContraseñaPri()">

              <label for=""> Contraseña nueva </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text  "><span class="icon-lock"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Contraseña nueva" name="contrasenaNueva" id="contrasenaNueva" maxlength="20" value="" required>
                <div class="input-group-append">
                  <input type="hidden" name="hdnId" id="hdnId" value="<?php echo $idus;?>">
                </div>
              </div>
              <label for=""> Confirme contraseña </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text  "><span class="icon-lock"></span></span>
                </div>
                <input type="text" class="form-control" placeholder=" confirmar constraseña" name="contrasenaConfirmar" id="contrasenaConfirmar" maxlength="20" value="" required>
                <div class="input-group-append">
                </div>
              </div>
              <br>
              <center><button class="btn btn-info" type="submit" id="btnOneCambioPass" name="btnOneCambioPass">Actualizar contraseña</button></center>
              <br>
            </form>
            
          </div>

        </div>
      </div>

      <!-- fin del codigo cambio de contraseña -->
    </div>


  </div>

<script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/login.js"></script>
</body>

</html>
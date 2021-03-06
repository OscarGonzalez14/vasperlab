
<?php

 require_once("config/conexion.php");     

     if(isset($_POST["enviar_dos"]) and $_POST["enviar_dos"]=="yes"){

      require_once("modelos/Usuarios.php");

       $usuario = new Usuarios();

       $usuario->login_u();

   }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login VaperLab</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<!--************************Validacines******************-->
  <div class="row">
    <div class="col-lg-12">        
      <div class="box-body">            
        <?php
          if(isset($_GET["m"])) {               
            switch($_GET["m"]){
              case "1";
               ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> El Usuario y/o Contraseña es incorrecto o no tienes permiso!</h4>                     
            </div>
            <?php
              break;
              case "2";
                ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Algún campo esta vacío</h4>                     
                </div>
                <?php
            break;
            }
          }
      ?>

             
        </div>
<!--************************ Validacines******************-->

  <div class="card">
    <div class="card-body register-card-body">
        <div class="register-logo">
    <a href="#" style="font-size:18px !important"><strong>LABORATORIOS VASPER</strong></a>
  </div>
        <div class="register-logo">
    <img src="images/vasperlogo.png" width="160" height="80"  />
  </div>
      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required="required">          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Password" required>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      <div class="form-group">
        <input type="hidden" name="enviar_dos" class="form-control" value="yes">       
      </div>

      
        <div>
          <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-power-off" aria-hidden="true"></i>  Iniciar Sesión</button>
        </div>
      </div>
      </form>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
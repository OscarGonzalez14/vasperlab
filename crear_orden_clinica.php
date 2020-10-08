<?php
require_once("config/conexion.php");

if(isset($_SESSION["usuario"])){   
    
?>

<div class="">
   <?php require_once('header2.php');?>
   <?php require_once('modals/nueva_orden_clinicas.php');?>
   <nav class="main-headers navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- SEARCH FORM --> 
    <form class="form-inline ml-3" style="">
      <div class="input-group input-group-sm">
        <span style="text-transform: uppercase; color:white">BIENVENID@:&nbsp;<?php echo $_SESSION["usuario"];?></span>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a style="color:white;text-decoration: none;padding: 6px;background: gray;border-radius: 5px" href="logout.php">
          <i class="fas fa-arrow-alt-circle-right"></i> Salir
        </a>
      </li>
    </ul>
  </nav>
<div style="margin:10px;">
 <a class="btn btn-dark" style="color:white;border-radius:0px; background:black" data-toggle="modal" data-target="#new_aro" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-square"></i> Crear Paciente</a>
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item activ"><a href="resultados_empresarial.php"><strong><i class="fas fa-arrow-left"></i> Regresar</strong></a></li>
    <li class="breadcrumb-item">Crear ordenes</li>
  </ol>
</div> 
<h5 align="center" style="text-transform: uppercase;"><strong>CREAR ORDENES DE EXAMEN-<?php echo $_SESSION["nombres"];?></strong></h5>
<div style="margin: 5px">
	<table class="table" id="data_pacientes_reg_clinicas" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center">Código</th>
            <th style="text-align:center">Nombre Paciente</th>
            <th style="text-align:center">Edad</th>
            <th style="text-align:center">Emprea</th>
            <th style="text-align:center">Agregar Orden</th>
          </tr>
        </thead>
        <tbody style="text-align:center">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>
<input type="hidden" name="" id="user_clinica" value="<?php echo $_SESSION["nombres"];?>">
<script src='js/bootbox.min.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/ordenes.js'></script>


<?php } else{
echo "Acceso denegado";
  } ?>
<?php
require_once("config/conexion.php");

if(isset($_SESSION["usuario"])){   
    
?>
<?php require_once('header.php');?>
<?php require_once('modals/resultados_examenes.php');?>

<div class="content-wrapper">
<nav class="main-headers navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- SEARCH FORM --> 
    <form class="form-inline ml-3" style="">
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
<input type="hidden" name="" id="user_clinica" value="<?php echo $_SESSION["nombres"];?>">
<div class="content" style="margin:20px" >
   <button type="button" class="btn btn-md btn-secondary btn-flat" style="margin-right: 10px"> Crear paciente</button>
   <a href="crear_orden_clinica.php"><button type="button" class="btn btn-md btn-primary btn-flat" style="margin right: 10px"> Crear ordenes</button></a>
<div style="margin: 5px">

	<table class="table table-striped" id="data_resultados_examenes_emp" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center"># Orden</th>
            <th style="text-align:center">Fecha</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Cod.Empleado</th>
            <th style="text-align:center">Examenes</th>
          </tr>
        </thead>
        <tbody style="text-align:center">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>
</div>
<script src='js/bootbox.min.js'></script>
<script src='js/resultados.js'></script>

<?php } else{
echo "Acceso denegado";
  } ?>
<?php
require_once("config/conexion.php");

if(isset($_SESSION["usuario"])){  
require_once('modals/ver_detalles_solicitud.php');
 require_once('modals/show_categorias_impresion.php'); 
    
?>
<?php require_once('header2.php');?>
<?php require_once('modals/resultados_examenes.php');?>
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
<h5 style="text-transform: uppercase;text-align: center;"><strong>PACIENTES <?php echo $_SESSION["usuario"];?></strong></h5>
<input type="hidden" name="" id="user_clinica" value="<?php echo $_SESSION["nombres"];?>">
<div class="form-group col-sm-3" style="margin: 25px">
  <label for="">Seleccione Empresa</label>
    <select class="form-control input-dark" id="consulta_ex" required="">
      <option value=''>Seleccionar...</option>
      <option value='Corrugado'>Corrugado</option>
      <option value='Flexible'>Flexible</option>
      <option value='Ecofibra'>Ecofibra</option>
      <option value='Plegadizo'>Plegadizo</option>
    </select>
</div>
<div style="margin: 25px">

	<table class="table-hover table-bordered" id="data_examenes_clinica_empresarial" width="100%" data-order='[[ 0, "desc" ]]'>
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 12px">
          <tr>
            <th style="text-align:center">#Orden</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Cod. Emp</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Departamento</th>
            <th style="text-align:center">Examenes</th>            
            <th style="text-align:center">Detalle Examenes</th>
            <th style="text-align:center">Imprimir</th>
          </tr>
        </thead>
        <tbody style="text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>
<script src='js/bootbox.min.js'></script>
<script src='js/resultados.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/ordenes.js'></script>

<?php } else{
echo "Acceso denegado";
  } ?>
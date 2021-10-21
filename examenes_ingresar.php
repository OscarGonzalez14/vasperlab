<?php 
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["numero_orden"];
require_once("modelos/Reporteria.php");
$reporteria = new Reporteria();
date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");
?>
<?php require_once('header.php');?>
<?php require_once('modals/cat_quimica_examenes.php');?>

<style type="text/css">
    .dataTables_filter {
   float: right !important;
}
</style>
<div class="content-wrapper">
<input type="hidden" id="n_orden_examen" value="<?php echo $n_orden;?>">
<input type="hidden" id="id_paciente_examen" value="<?php echo $id_paciente;?>">
<div style="margin: 5px">
    <h5 align="center"><strong>INGRESAR RESULTADOS&nbsp;-&nbsp; <span>ORDEN:&nbsp;</span><span style="color:blue"><?php echo $n_orden;?></span></strong></h5>
	<table class="table-hover table-bordered" id="data_examenes_ingreso" width="100%" data-order='[[ 0, "desc" ]]'>
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 12px">
          <tr>
            <th style="text-align:center">Fecha</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Categoria</th>            
            <th style="text-align:center">Estado</th>
            <th style="text-align:center">Ingresar</th>
          </tr>
        </thead>
        <tbody style="text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px">                                       
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>


<script src='js/bootbox.min.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/examenes.js'></script>
<script src="js/autocomplete.js"></script>

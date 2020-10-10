<?php 
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["numero_orden"];
?>
<?php require_once('header.php');?>
<?php require_once('modal_examenes.php');?>
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
	<table class="table" id="data_examenes_ingreso" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center">Fecha</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Examen</th>            
            <th style="text-align:center">Estado</th>
            <th style="text-align:center">Ingresar</th>
          </tr>
        </thead>
        <tbody style="text-align:center">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>

<script src='js/bootbox.min.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/examenes.js'></script>
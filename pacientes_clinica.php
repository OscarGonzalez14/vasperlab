<?php

 require_once('header.php');
 require_once('modals/nuevo_paciente_clinica.php');
 require_once('modals/nueva_orden.php');
 //date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y"); echo $hoy;
?>
<style type="text/css">
  .sorting, .sorting_asc, .sorting_desc {
    background : none;

}
/*div.dt-buttons {
    float: right;

}*/
.dataTables_filter {
   float: right !important;
}
.buttons-excel{
  background: green;
  color:white;
}
</style>
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
<div style="margin:10px;">

  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#new_aro" data-backdrop="static" onclick="limpiar_modal_paciente();" data-keyboard="false">CREAR PACIENTE</button>
</div> 

<div style="margin: 5px">
  <table class="table-hover table-bordered striped" id="data_pacientes_reg" width="100%" data-order='[[ 0, "desc" ]]'>
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 12px">
          <tr>
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Cód. Emp</th>
            <th style="text-align:center">Nombre Paciente</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Departamento</th>
            <th style="text-align:center">Orden</th>
            <th style="text-align:center">Editar</th>
            <th style="text-align:center">Eliminar</th>
          </tr>
        </thead>
        <tbody style="text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>

<script type="text/javascript" src="js/bootbox.min.js"></script>
<script src='js/pacientes.js'></script>
<script src='js/ordenes.js'></script>


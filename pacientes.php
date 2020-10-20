<?php

 require_once('header.php');
 require_once('modals/nuevo_paciente.php');
 require_once('modals/nueva_orden.php');
 //date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y"); echo $hoy;
?>
<style type="text/css">
  .sorting, .sorting_asc, .sorting_desc {
    background : none;
}
</style>
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
<div style="margin:10px;">
 <a class="btn btn-dark" style="color:white;border-radius:0px; background:black" data-toggle="modal" data-target="#new_aro" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-square"></i> Crear Paciente</a>

 <button data-toggle="modal" data-target="#new_aro" data-backdrop="static" data-keyboard="false">
   P
 </button>
</div> 

<div style="margin: 5px">
	<table class="table" id="data_pacientes_reg" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center">Código</th>
            <th style="text-align:center">Nombre Paciente</th>
            <th style="text-align:center">Edad</th>
            <th style="text-align:center">Agregar</th>
            <th style="text-align:center">Editar</th>
            <th style="text-align:center">Eliminar</th>
          </tr>
        </thead>
        <tbody style="text-align:center">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>

<script src='js/bootbox.min.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/ordenes.js'></script>


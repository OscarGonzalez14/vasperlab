<?php

 require_once('header.php');
 require_once('modals/ver_detalles_solicitud.php');
?>

<div class="content-wrapper" >

<div style="margin: 5px">
    <h5 align="center"><strong>SOLICITUDES DE EXAMEN DE CLÍNICA A PENDIENTES</strong></h5>
  <table class="table" id="data_examenes_laboratorio" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center">Fecha</th>
            <th style="text-align:center"># Orden</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Cod. Empleado</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Ver</th>
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
<script src='js/ordenes.js'></script>


<?php
require_once("config/conexion.php");

if(isset($_SESSION["usuario"])){
 require_once('header.php');
 require_once('modals/ver_detalles_solicitud.php');
 require_once('modals/show_categorias_impresion.php');
?>
<style type="text/css">
    .dataTables_filter {
   float: right !important;
}
</style>

<div class="content-wrapper" >

<div style="margin: 5px">
    <h5 align="center"><strong>EXAMENES Y DIAGNOSTICOS</strong></h5>
  <table class="table-hover table-bordered" id="data_diagnosticos" width="100%" data-order='[[ 0, "desc" ]]'>
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 12px">
          <tr>
            <th style="text-align:center">Fecha</th>
            <th style="text-align:center">Paciente</th>
            <th style="text-align:center">Cod. Emp</th>
            <th style="text-align:center">Empresa</th>
            <th style="text-align:center">Departamento</th>
            <th style="text-align:center">Ver Examenes</th>            

          </tr>
        </thead>
        <tbody style="text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
</div>

<script src='js/bootbox.min.js'></script>
<script src='js/pacientes.js'></script>
<script src='js/ordenes.js'></script>
<?php } else{
echo "Acceso denegado";
header("Location:index.php");
        exit();
  } ?>


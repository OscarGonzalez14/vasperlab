<?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once("encabezado.php");
require_once('modals/show_categorias_impresion.php');

//$departamentos = array()
?>
<div class="content-wrapper">

    <div class="form-group row" style="margin-top: 10px;margin-left:10px">
      <div class="col-sm-3">     
      </div>
    </div>
<div class="row"style="margin-left:3px">

  <div class="col-sm-3">
    <label>Jornada</label>
        <select class="form-control" id="empresa_act" style="border:2px solid lightblue">
          <option value="Corrugado">Jornada 2</option>
          <option value="Ecofibra">Jornada 1</option>          
        </select>   
  </div>
  <div class="col-sm-3">
    <label>EMPRESA</label>
        <select class="form-control" id="empresa_act" style="border:2px solid lightblue">
          <option value="">Seleccione...</option>
          <option value="Corrugado">Corrugado</option>
          <option value="Ecofibra">Ecofibra</option>
          <option value="Plegadizo">Plegadizo</option>
          <option value="Flexible">Flexible</option>                
        </select>         
      </div>
  </div>

  <div class="col-sm-3">
    
  </div>
  <div class="col-sm-3"></div>
</div>
<div class="card-body p-0" style="margin:1px">
  <table id="estado_pacientes_emp" class="table-hover table-bordered"
  width="100%" data-order='[[ 0, "desc" ]]' style="text-align: center;text-align:center">
        <thead class="bg-primary">
          <tr>
          <th width="20%">Nombre</th>          
          <th width="5%">#Emp.</th>
          <th width="20%">Empresa</th>
          <th width="20%">Departamento</th>
          <th width="10%">Estado</th>
          <th width="10%">Diagnostico</th>
          <th width="10%">Examenes</th>
          <th width="5%">Evaluado</th>
         </tr>
        </thead>
        <tbody style="text-align:center">                                  
        </tbody>
      </table>
    </div>

<?php require_once("foot.php");?>
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="det_diags">
  <div class="modal-dialog" style="max-width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLE DIAGNOSTICO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabla_det_diagnostico" class="table-striped table-bordered table-condensed table-hover" width="100%">
          <thead>
            <tr style="text-align: center">
            <th colspan="50">DIAGNOSTICO</th>
            <th colspan="50">TRATAMIENTO</th>
          </tr>
          </thead>
        </table>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>
<script src="js/empresarial.js"></script>
<script src="js/bootbox.min.js"></script>
<?php } else{
echo "Acceso denegado";
  } ?>














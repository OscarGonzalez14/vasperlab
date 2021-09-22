<?php
 
require_once("encabezado.php");
 require_once('modals/show_categorias_impresion.php');
?>

<div class="content-wrapper">


    <div class="form-group row" style="margin-top: 10px;margin-left:10px">
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


<div class="card-body p-0" style="margin:1px">
                <table id="estado_pacientes_emp" class="table-hover table-bordered"
width="100%" data-order='[[ 0, "desc" ]]' style="text-align: center;text-align:center">
                  <thead class="bg-primary">
                    <tr>
                    <th>Nombre</th>          
                    <th>Cod. Empleado</th>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Estado</th>
                    <th>Diagnostico</th>
                    <th>Examenes</th>
                    <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">                                  
                  </tbody>
                </table>
              </div>

<?php require_once("foot.php");?>	
</div>
<script src="js/ordenes.js"></script>
<script src="js/bootbox.min.js"></script>








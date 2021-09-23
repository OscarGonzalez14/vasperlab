<style>
  #tamModal_coles{
    max-width: 65% !important;
  }
  #head_coles{
    color: white;
    text-align: center;
  }
</style>

<div class="modal fade bd-example-modal-lg" id="ldh">
  <div class="modal-dialog" id="tamModal_coles">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark" id="head_coles">
        <h4 class="modal-title">COLESTEROL DE BAJA DENSIDAD DENSIDAD LDH</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td><br>
      <div class="form-row">
        <div class="input-group">      
        <input type="number" class="form-control" id="resultado_ldh" style="text-align: right;" placeholder="RESULTADO">
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat">mg/dl</button>
        </span>
       </div>
       <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_ldh" required="" style="text-align: right;">
      </div>
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="Guardarldh();">Guardar</button>
      </div>
    <input type="hidden" class="id_paciente_exa" id="id_pac_exa_ldh">
      <input type="hidden" class="num_orden_exa" id="num_orden_exa_ldh">
      <input type="hidden" id="fecha_hdl" value="<?php echo $hoy;?>">
    </div>
  </div>
</div>
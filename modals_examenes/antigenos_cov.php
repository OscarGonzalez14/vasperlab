<div class="modal fade bd-example-modal-lg" id="antigenos">
  <div class="modal-dialog" id="tamModal_coles">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_coles">
        <h4 class="modal-title">Antigenos para Covid-19</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td><br>
      <div class="form-row">

      <div class="form-group col-md-6">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Muestra</label>
        <select class="custom-select mr-sm-2" id="muestra_antigenos">
        <option value="Hisopado nasal">Hisopado nasal</option>
        <option value="Hisopado faringeo">Hisopado Faringeo</option>
      </select>
      </div>

      <div class="form-group col-md-6">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Resultado</label>
        <select class="custom-select mr-sm-2" id="resultado_antigenos">
        <option value="Negativo para SARS-CoV-2">Negativo para SARS-CoV-2</option>
        <option value="Positivo Debil para SARS-CoV-2">Positivo Debil para SARS-CoV-2</option>
        <option value="Positivo para SARS-CoV-2">Positivo para SARS-CoV-2</option>
      </select>
      </div>

      <div class="form-group col-md-12">
        <label for="inputEmail4">Refiere</label>
        <input type="text" class="form-control" id="observaciones_antigenos" required="" style="text-align: right;">
      </div>

      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="GuardarAntigenos();">Guardar</button>
      </div>
    <input type="hidden" class="id_paciente_exa" id="id_pac_exa_antigenos">
      <input type="hidden" class="num_orden_exa" id="num_orden_exa_antigenos">
      <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
    </div>
  </div>
</div>

 <style>
    #tamModal__trig{
      max-width: 40% !important;
    }
     #head_trig{
        color: white;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="sgot">
  <div class="modal-dialog" id="tamModal__trig">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary" id="head_trig">
        <h4 class="modal-title">SGOT</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td>
      <div class="form-row">
      <div class="form-group col-md-12">
      <label for="inputEmail4">Resultado</label>
      <div class="input-group">      
      <input type="number" class="form-control" id="resultado_sgot" style="text-align: right;" autofocus>
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="Guardarsgot();">mg/dl</button>
        </span>
    </div>
  </div>
    <div class="form-group col-md-12">
      <label for="inputEmail4">Observaciones</label>
      <input type="text" class="form-control" id="observacione_sgot" required="" style="text-align: right;">
  </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="Guardarsgot();">Guardar</button>
      </div>
    </div>
  </div>
    <input type="hidden" class="id_paciente_exa" id="id_pac_exa_sgot">
    <input type="hidden" class="num_orden_exa" id="num_orden_exa_sgot">
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
</div>
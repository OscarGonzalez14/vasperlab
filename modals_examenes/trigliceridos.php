 <style>
    #tamModal__trig{
      max-width: 40% !important;
    }
     #head_trig{
        color: white;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="Trigliceridos">
  <div class="modal-dialog" id="tamModal__trig">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_trig">
        <h4 class="modal-title">TRIGLICERIDOS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-row">
      <div class="input-group">      
      <input type="number" class="form-control" id="resultado_triglicerido" style="text-align: right;" autofocus>
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="GuardarTrigliceridos();">mg/dl</button>
        </span>
    </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="GuardarTrigliceridos();">Guardar</button>
      </div>

    </div>
  </div>
</div>
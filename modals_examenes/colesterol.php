 <style>
    #tamModal__trig{
      max-width: 40% !important;
    }
     #head_trig{
        color: white;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="Colesterol">
  <div class="modal-dialog" id="tamModal__trig">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_trig">
        <h4 class="modal-title">COLESTEROL</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-row">
        <div class="input-group">      
          <input type="number" class="form-control" id="resultado_colesterol" style="text-align: right;" autofocus>
            <span class="input-group-append">
              <button type="button" class="btn btn-info btn-flat" onClick="GuardarColesterol();">mg/dl</button>
            </span>
       </div>
       <br>
       <div class="dropdown-divider" style="width: 20%;height: 5px;background-color: #D8D8D8;margin: 0 auto;"></div>
       <div class="input-group"> 
           <span class="input-group-append">
              <button type="button" class="btn btn-secondary btn-flat" onClick="GuardarColesterol();">OBSERVACIONES</button>
            </span> 
          <input type="text" class="form-control" id="observaciones_colesterol" style="text-align: left;" autofocus>
       </div>


      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="GuardarColesterol();">Guardar</button>
      </div>

    </div>
  </div>
</div>
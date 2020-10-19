 <style>
    #tamModal_exo{
      max-width: 65% !important;
    }
     #head_exo{
        color: white;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-xl" id="exofaringeo">
  <div class="modal-dialog" id="tamModal_exo">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_exo">
        <h4 class="modal-title">CULTIVO EX.FARINGEO</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">

      <div class="form-row" autocomplete="off">

      <div class="form-group col-md-12">
       <label for="inputPassword4">SE AISLA:</label>
       <input type="text" class="form-control" id="aisla_exo" required="" onkeyup="mayus(this);" >
      </div>

    <div class="form-group col-md-12">
      <label for="inputPassword4">SENSIBLE A:</label>
      <input type="text" class="form-control" id="sensible_exo" onkeyup="mayus(this);" >
    </div>

    <div class="form-group col-md-12">
      <label for="inputPassword4">RESISTENTE A:</label>
      <input type="text" class="form-control" id="resiste_exo" required="" onkeyup="mayus(this);" >
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">REFERIDO A:</label>
      <input type="text" class="form-control" id="refiere_exo" required="" onkeyup="mayus(this);" >
    </div>
    <input type="hidden" id="id_paciente_exofarigeo" class="id_paciente_exa">
    <input type="hidden" id="n_orden_exofarigeo" class="num_orden_exa">
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block reg_examenes" onClick="GuardarExo();">Guardar</button>
      </div>

    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  function mayus(e) {
       e.value = e.value.toUpperCase();
  }
</script>
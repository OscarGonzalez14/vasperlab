 <style>
    #tamModal_coles{
      max-width: 65% !important;
    }
     #head_coles{
        color: white;
        text-align: center;
    }
</style>
<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_rpr_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_rpr").val(data.resultado);
        $("#observaciones_rpr").val(data.observacione);
      }
    });
</script>
<div class="modal fade bd-example-modal-lg" id="catvdrl">
  <div class="modal-dialog" id="tamModal_coles">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_coles">
        <h4 class="modal-title">RPR</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td><br>
      <div class="form-row">
        <div class="input-group">      
          <input type="text" class="form-control" id="resultado_rpr" style="text-align: right;" value="NO REACTIVO A LA FECHA">
            
       </div>
       <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_rpr" required="" style="text-align: right;">
      </div>
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" onClick="Guardarrpr();">Guardar</button>
      </div>
    <input type="hidden" class="id_paciente_exa" id="id_pac_exa_rpr" value="<?php echo $id_paciente;?>">
      <input type="hidden" class="num_orden_exa" id="num_orden_exa_rpr"  value="<?php echo $n_orden;?>">
      <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
    </div>
  </div>
</div>

<script type="text/javascript">
   var resrpr = ["NO REACTIVO A LA FECHA","REACTIVO",];

   autocomplete(document.getElementById("resultado_rpr"), resrpr);
</script>
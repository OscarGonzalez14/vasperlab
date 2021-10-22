<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_acido_urico_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_acido_urico").val(data.resultado);
        $("#observaciones_acido_urico").val(data.observacione);
      }
    });
</script>

<div style="margin: 8px">
  <h5 class="titulo">Ácido úrico</h5>
    <div class="form-row">
      <div class="input-group form-group  col-md-12">      
      <input type="number" class="form-control" id="resultado_acido_urico" style="text-align: right;" placeholder="RESULTADO ACIDO URICO">
      <span class="input-group-append">
        <button type="button" class="btn btn-info btn-flat" onClick="GuardarAcidoUrico();">mg/dl</button>
      </span>
      </div>
      <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_acido_urico" required="" style="text-align: right;">
      </div>
      </div>
</div> 
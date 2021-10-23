<script>
      $.ajax({
      url:"ajax/examenes.php?op=show_sgpt_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_sgpt").val(data.resultado);
        $("#observacione_sgpt").val(data.observacione);
      }
    });
</script>
<div style="margin: 8px">
  <h5 class="titulo">Sgpt</h5>

<div class="form-row">
  <div class="input-group form-group col-md-12">
    <label for="inputEmail4">Resultado</label>
      <div class="input-group">      
      <input type="number" class="form-control" id="resultado_sgpt" style="text-align: right;" autofocus placeholder="RESULTADO SGPT">
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="Guardarsgpt();">mg/dl</button>
        </span>
      </div>
  </div>
  <div class="form-group col-md-12">
    <label for="inputEmail4">Observaciones</label>
    <input type="text" class="form-control" id="observacione_sgpt" required="" style="text-align: right;">
  </div>
</div>
</div>
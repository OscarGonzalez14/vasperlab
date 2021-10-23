<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_sgot_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_sgot").val(data.resultado);
        $("#observacione_sgot").val(data.observacione);
      }
    });
</script>
<div style="margin: 8px">
  <h5 class="titulo">Sgot</h5>

<div class="form-row">
  <div class="input-group form-group col-md-12">
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
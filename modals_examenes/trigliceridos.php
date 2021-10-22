<script>
      $.ajax({
      url:"ajax/examenes.php?op=show_trigliceridos_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_triglicerido").val(data.resultado);
        $("#observaciones_trigliceridos").val(data.observacione);
      }
    });
</script>

<div style="margin: 8px">
  <h5 class="titulo">Trigliceridos</h5>
    <div class="form-row">
      <div class="input-group form-group col-md-12">      
        <input type="number" class="form-control" id="resultado_triglicerido" style="text-align: right;" placeholder="RESULTADO">
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="GuardarTrigliceridos();">mg/dl</button>
        </span>
      </div>

      <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_trigliceridos" required="" style="text-align: right;">
    </div>
  </div>
</div>
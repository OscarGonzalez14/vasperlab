<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_glucosa_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#observacione_glucosa").val(data.observacione);
        $("#resultado_glucosa").val(data.resultado);

      }
    });

</script>

<div style="margin: 8px">
  <h5 class="titulo">Glucosa</h5>
  <div class="form-row">
    <div class="input-group form-group  col-md-12">
      <input type="number" class="form-control" id="resultado_glucosa" style="text-align: right;" autofocus placeholder="RESULTADOR GLUCOSA">
      <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="GuardarGlucosa();">mg/dl</button>
      </span>
    </div>

    <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observacione_glucosa" required="" style="text-align: right;">
    </div>
  </div>
</div>   
<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_creatinina_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_creatinina").val(data.resultado);
        $("#observaciones_creatinina").val(data.observacione);
      }
    });
</script>

<div style="margin: 8px">
  <h5 class="titulo">Creatinina</h5>
    <div class="form-row">
      <div class="input-group">      
        <input type="number" class="form-control" id="resultado_creatinina" style="text-align: right;" placeholder="RESULTADO CREATININA">
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat" onClick="GuardarCreatinina();">mg/dl</button>
        </span>
       </div>
       <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_creatinina" required="" style="text-align: right;">
      </div>
      </div>

</div>
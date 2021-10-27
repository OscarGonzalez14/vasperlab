<!--<button type="button" class="btn btn-success btn-block" onClick="GuardarBaciloscopia();">Guardar</button>-->

<script>  
$.ajax({
      url:"ajax/examenes.php?op=show_baciloscopia_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_baciloscopia").val(data.resultado);
        $("#observaciones_baciloscopia").val(data.observacione);
      }
    });
</script>
<div style="margin: 8px">
  <h5 class="titulo">BACILOSCOPIA</h5>
    <div class="form-row">
        <div class="input-group">      
          <input type="text" class="form-control" id="resultado_baciloscopia" style="text-align: right;" placeholder="RESULTADO" value='No se observan Bacilos Ácido-Alcohol Resistente'>
       </div>
       <div class="form-group col-md-12">
        <label for="inputEmail4">Observaciones</label>
        <input type="text" class="form-control" id="observaciones_baciloscopia" required="" style="text-align: right;">
      </div>
    </div>

</div>


<script type="text/javascript">
   var baci = ["No se observan Bacilos Ácido-Alcohol Resistente","Positivo"];
   autocomplete(document.getElementById("resultado_baciloscopia"), baci);
</script>
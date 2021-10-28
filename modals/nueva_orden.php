  <style>
#new_order_tam{
    max-width: 95% !important;
}
    
  #head{
    background-color:#343a40;
    color: white;
    text-align: center;
  }
  .input-dark{
    border: solid 1px black;
    border-radius: 0px;
  }

  .input-dark{
    border: solid 1px black;
  }
</style>
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 
<div class="modal fade" role="dialog" id="nueva_orden">
  <div class="modal-dialog modal-lg" id="new_order_tam">

    <div class="modal-content">
     <div class="modal-header" id="head" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> CREAR NUEVA ORDEN DE EXAMENES || LABORATORIO</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>
<section style="margin:15px">

    <div class="form-group col-md-6">
      <span style="font-size:16px"><strong>Orden #&nbsp;</strong></span><strong><span style="font-size:24px" id="correlativo_orders"></span></strong><br>
    </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Paciente</label>
      <input type="text" class="form-control input-dark" id="new_orden_empleado" readonly placeholder="Click para buscar paciente">
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control input-dark" id="paciente_orden" readonly>
    </div>

    <div class="col-12 col-sm-12">
        <h5 style="background:#DCDCDC; padding: 2px; border-radius: 4px" align="center"><strong>SELECCIONAR EXAMENES DE LA ORDEN</strong></h5>          <!-- /.form-group -->
    </div>

    <div class="col-12 col-sm-12"><!--SECTION EXAMENES SELECTED-->
      <table width="100%" class="">
        <tr>
          <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">QUIMICA SANGUINEA</td>
        </tr>
        <tr>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="glucosa"> Glucosa</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Glucosa Post-Prandial"> Glucosa Post-Prandial</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Tolerancia a la glucosa"> Tolerancia a la glucosa</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Colesterol"> Colesterol</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="hdl"> Colesterol de Alta Densidad HDL</td>               
        </tr>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="ldh"> Colesterol de Baja Densidad LDH</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Trigliceridos"> Trigliceridos</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="acido_urico"> Ácido Urico</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Creatinina"> Creatinina</td>
          <td colspan="20" style="padding: 0px"><input class="quimica" type="checkbox" name="check_box" value="Depuración de creatinina"> Depuración de creatinina</td>
        </tr>
        <tr>
          <td colspan="20"><input class="quimica" type="checkbox" name="check_box" value="Nitrogeno Ureico">Nitrogeno Ureico</td>
          <td colspan="20"><input class="quimica" type="checkbox" name="check_box" value="Bilirubina"> Bilirubina</td>
          <td colspan="20"><input class="quimica" type="checkbox" name="check_box" value="sgot"> S.G.O.T</td>
          <td colspan="20"><input class="quimica" type="checkbox" name="check_box" value="sgpt"> S.G.P.T</td>
          <td colspan="20"><input class="quimica" type="checkbox" name="check_box" value="Proteinas Sericas"> Proteinas Sericas</td>
        </tr>

        <tr>
          <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">HECES</td>
        </tr>
        <tr>
          <td colspan="20"><input class="heces" type="checkbox" name="check_box" value="heces">Examen General Heces</td>
          <td colspan="20"><input class="heces" type="checkbox" name="check_box" value="Sangre Oculta"> Sangre Oculta</td>
          <td colspan="20"><input class="heces" type="checkbox" name="check_box" value="Coprocultivo"> Coprocultivo</td>
          <td colspan="20"><input class="heces" type="checkbox" name="check_box" value="Sustancias Reductoras"> Sustancias Reductoras</td>
          <td colspan="20"><input class="heces" type="checkbox" name="check_box" value="P. Azul de metileno"> P. Azul de metileno</td>
        </tr>

        <tr>
          <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">HEMATOLOGIA</td>
        </tr>
        <tr>
          <td colspan="20"><input class="hemograma" type="checkbox" name="check_box" value="hemograma">Hemograma</td>
          <td colspan="20"><input class="hematologia" type="checkbox" name="check_box" value="hematocrito_emoglobina"> Hematocrito-Hemoglobina</td>
          <td colspan="20"><input class="hematologia" type="checkbox" name="check_box" value="leucograma">Leucograma</td>
          <td colspan="20"><input class="hematologia" type="checkbox" name="check_box" value="plaquetas"> Plaquetas</td>
          <td colspan="20"><input class="hematologia" type="checkbox" name="check_box" value="reticulocitos">Reticulocitos</td>
        </tr>

        <tr>
          <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">ORINA</td>
        </tr>
        <tr>
          <td colspan="40"><input class="orina" type="checkbox" name="check_box" value="orina">Examen general de orina</td>
          <td colspan="40"><input class="orina" type="checkbox" name="check_box" value="Urocultivo"> U2rocultivo</td>
          <td colspan="20"><input class="orina" type="checkbox" name="check_box" value="Prueba de embarazo"> Prueba de embarazo</td>
        </tr>
      <tr>
          <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">BACTERIOLOGIA</td>
        </tr>
        <tr>
          <td colspan="40"><input class="bacteriologia" type="checkbox" name="check_box" value="baciloscopia">Baciloscopia</td>
          <td colspan="40"><input class="bacteriologia" type="checkbox" name="check_box" value="exofaringeo">C. Ex.Faringeo</td>
         </tr>
           <td style="background:#034f84;color:white;text-align: center;border-radius: 2px;font-size: 14px;padding: 1px;" colspan="100">INMUNOLOGIA</td>
        </tr>
        <tr>
          <td colspan="40"><input class="vdrl" type="checkbox" name="check_box" value="vdrl">V.D.R.L</td>
          <td colspan="40"><input class="inmunologia" type="checkbox" name="check_box" value="antigenos">Antigenos para Covid-19</td>
        </tr>
      </table>
    </div><!--FIN SECTION EXAMENES SELECTED--><span style="color: white">H</span>
</div>
    
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y"); ?>
<input type="hidden" id="fecha_orden" value="<?php echo $hoy;?>">
<input type="hidden" id="id_paciente_orden">
<input type="hidden" id="tipo_orden" value="laboratorio">
<input type="hidden" id="estado_orden" value="1">
<button class="btn btn-primary btn-block" style="border-radius:0px" onClick="agregarOrdenLab();"><i class="fas fa-save"></i> Guardar</button>
</section>
    </div>
  </div>
</div>


<script src="plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
  function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  var medidas = new Cleave('#medidas_aro', {
    delimiter: '-',
    blocks: [2,2,3],
    uppercase: true
});   
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  
})
</script>
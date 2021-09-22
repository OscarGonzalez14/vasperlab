 <style>
    
  #head{
    background-color: black;
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

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="new_aro" style="border-radius:0px !important;">
  <div class="modal-dialog modal-lg" role="document" id="tamModal">

    <div class="modal-content">
     <div class="modal-header" id="head" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> CREAR PACIENTE</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>
<section style="margin:15px">
  <div class="form-row">

    <div class="form-group col-md-5">
    <label for="exampleFormControlSelect2">Nombre del Paciente</label>
      <input type="text" class="form-control input-dark" id="nombrePaciente" placeholder="Escriba el nombre del Paciente"  onkeyup="mayus(this);" >
    </div>

    <div class="form-group col-md-2">
      <label for="inputPassword4">Género</label>
      <select class="form-control input-dark" id="tipo_paciente" required="">
        <option value="">Seleccionar genero</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
    </div>

    <div class="form-group col-md-2">
       <label for="inputPassword4">Edad</label>
    <div class="input-group">      
      <input type="number" class="form-control input-dark" id="edad_paciente">
        <span class="input-group-append">
          <button type="button" class="btn btn-info btn-flat">Años</button>
        </span>
    </div>
  </div>

  <div class="form-group col-md-3">
    <label for="exampleFormControlSelect2">Fecha Nac.</label>
      <input type="date" class="form-control input-dark" id="fecha_nac">
  </div>  

  <div class="form-group col-md-4">
      <label for="inputPassword4">Empresa</label>
      <select class="form-control input-dark" id="empresa_paciente" required>
        <option value="">Seleccionar...</option>
        <option value="McCormick">McCormick</option>
        <option value="Alimentos MOR">Alimentos MOR</option>
        <option value="Corrugado">Corrugado</option>
        <option value="Plegadizo">Plegadizo</option>
        <option value="Ecofibra">Ecofibra</option>
        <option value="Flexible">Flexible</option>
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="inputPassword4">Departamento</label>
      <select class="form-control input-dark" id="departamento_paciente" required>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="inputEmail4">#Cod. Empleado</label>
      <input type="text" class="form-control input-dark" id="codigo_emp" placeholder="Código de empleado" required="" onkeyup="mayus(this);" >
    </div>
  <button class="btn btn-primary btn-block" style="border-radius:0px" onClick="agregarPaciente();"><i class="fas fa-save"></i> Guardar</button>
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
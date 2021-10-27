 <style>
    #tamModal_exo{
      max-width: 65% !important;
    }
     #head_exo{
        color: white;
        text-align: center;
    }
</style>

<script>
  $.ajax({
      url:"ajax/examenes.php?op=show_exofaringeo_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#aisla_exo_data").html(data.aisla);
        $("#sensible_exo_data").html(data.sensible);
        $("#resiste_exo_data").html(data.resiste);
        $("#refiere_exo").val(data.refiere);
      }
    });

</script>

<div style="margin: 8px">
  <h5 class="titulo">Exofaringeo</h5>
  <div class="form-row card-default">

      <div class="form-group col-md-12">
       <label for="inputPassword4">SE AISLA:</label>&nbsp;<span id="aisla_exo_data" class="bg-secondary"></span>
          <select class="form-control select2" multiple="multiple" id="aisla_exo" style="width: 100%;color: blue"  data-dropdown-css-class="select2-purple">
            <option style="color: #F00" data-color="#F00">NO SE AISLAN PATOGENOS, CRECIMIENTOS DE BACTERIAS DE LA MICROBIOTA NORMAL</option>
            <option style="color: #F00" data-color="#F00">KLEBSIELLA PNEUMONAE</option>
          </select>
      </div>


      <div class="form-group col-md-12">
       <label for="inputPassword4">SENSIBLE A:</label>&nbsp;<span id="sensible_exo_data" class="bg-secondary"></span>
          <select class="form-control select2" multiple="multiple" id="sensible_exo" style="width: 100%;color: blue"  data-dropdown-css-class="select2-purple">
            <option style="color: #F00" data-color="#F00">AMOXICILINA/ACIDO CLAVULANICO</option>
            <option style="color: #F00" data-color="#F00">IMIPENEM</option>
            <option style="color: #F00" data-color="#F00">TRIMETROPRIM/SULFAMETOXALE</option>
            <option style="color: #F00" data-color="#F00">CIPROFLAXACINA</option>
            <option style="color: #F00" data-color="#F00">CEFIXIME</option>
            <option style="color: #F00" data-color="#F00">FOSFOMICINA</option>
            <option style="color: #F00" data-color="#F00">CEFADROXIL</option>
            <option style="color: #F00" data-color="#F00">CEFTAZIDIMA</option>
            <option style="color: #F00" data-color="#F00">CEFOTAXIMA</option>
            <option style="color: #F00" data-color="#F00">CEFOXITIN</option>
            <option style="color: #F00" data-color="#F00">CEFEPIME</option>
            <option style="color: #F00" data-color="#F00">CEFTRIAXONA</option>
            <option style="color: #F00" data-color="#F00">LEVOFLAXACINA</option>
            <option style="color: #F00" data-color="#F00">CEFOTAXIN</option>
            <option style="color: #F00" data-color="#F00">CEFUROXIME</option>
            <option style="color: #F00" data-color="#F00">AUGMENTIN</option>
            <option style="color: #F00" data-color="#F00">GENTAMICINA</option>
            <option style="color: #F00" data-color="#F00">AMIKIN</option>
            <option style="color: #F00" data-color="#F00">CEFTRIAXONE</option>
            <option style="color: #F00" data-color="#F00">CLARITROMICINA</option>
            <option style="color: #F00" data-color="#F00">AMOXICICILINA</option>
            <option style="color: #F00" data-color="#F00">TMP+SMT</option>
            <option style="color: #F00" data-color="#F00">GENTAMICINA</option>
            <option style="color: #F00" data-color="#F00">AMPICILINA</option>
          </select>
      </div>


      <div class="form-group col-md-12">
       <label for="inputPassword4">RESISTENTE A:</label>&nbsp;<span id="resiste_exo_data" class="bg-secondary"></span>
          <select class="form-control select2" multiple="multiple" id="resiste_exo" style="width: 100%;color: blue"  data-dropdown-css-class="select2-purple">
            <option style="color: #F00" data-color="#F00">AMOXICILINA/ACIDO CLAVULANICO</option>
            <option style="color: #F00" data-color="#F00">IMIPENEM</option>
            <option style="color: #F00" data-color="#F00">TRIMETROPRIM/SULFAMETOXALE</option>
            <option style="color: #F00" data-color="#F00">CIPROFLAXACINA</option>
            <option style="color: #F00" data-color="#F00">CEFIXIME</option>
            <option style="color: #F00" data-color="#F00">FOSFOMICINA</option>
            <option style="color: #F00" data-color="#F00">CEFADROXIL</option>
            <option style="color: #F00" data-color="#F00">CEFTAZIDIMA</option>
            <option style="color: #F00" data-color="#F00">CEFOTAXIMA</option>
            <option style="color: #F00" data-color="#F00">CEFOXITIN</option>
            <option style="color: #F00" data-color="#F00">CEFEPIME</option>
            <option style="color: #F00" data-color="#F00">CEFTRIAXONA</option>
            <option style="color: #F00" data-color="#F00">LEVOFLAXACINA</option>
            <option style="color: #F00" data-color="#F00">CEFOTAXIN</option>
            <option style="color: #F00" data-color="#F00">CEFUROXIME</option>
            <option style="color: #F00" data-color="#F00">AUGMENTIN</option>
            <option style="color: #F00" data-color="#F00">GENTAMICINA</option>
            <option style="color: #F00" data-color="#F00">AMIKIN</option>
            <option style="color: #F00" data-color="#F00">CEFTRIAXONE</option>
            <option style="color: #F00" data-color="#F00">CLARITROMICINA</option>
            <option style="color: #F00" data-color="#F00">AMOXICICILINA</option>
            <option style="color: #F00" data-color="#F00">TMP+SMT</option>
            <option style="color: #F00" data-color="#F00">GENTAMICINA</option>
            <option style="color: #F00" data-color="#F00">AMPICILINA</option>
          </select>
      </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">REFERIDO A:</label>
      <input type="text" class="form-control" id="refiere_exo" required="" onkeyup="mayus(this);" >
    </div>
    <input type="hidden" id="id_paciente_exofarigeo" class="id_paciente_exa">
    <input type="hidden" id="n_orden_exofarigeo" class="num_orden_exa">
      </div>
</div>


<script type="text/javascript">
  function mayus(e) {
       e.value = e.value.toUpperCase();
  }

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
      })
</script>

<script type="text/javascript">

  var aisla = ["NO SE AISLAN PATOGENOS, CRECIMIENTO DE BACTERIAS DE LA MICROBIOTA NORMAL","KLEBSIELLA PNEUMONIAE"];
  var sens = ["AMOXICILINA/ÁCIDO CLAVULINICO,","IMIPENEN,","TRIMETROPIN/SULFAMETOXALE,","CIPROFLAXACINA,","CEFTAZIDIMA,","CEFOTAXAMINA,","CEFOXITIN,","CEFEPIME,","CEFTRIAXONA,","LEVOF"];
  var ref =["LABORATORIO ULTRALAB"];
  var resiste = ["GENTAMICINA","AMPICILINA"];

  autocomplete(document.getElementById("aisla_exo"), aisla);
  autocomplete(document.getElementById("sensible_exo"), sens);
  autocomplete(document.getElementById("refiere_exo"), ref);
  autocomplete(document.getElementById("resiste_exo"), resiste);
</script>

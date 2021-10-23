 <style>
    #tamModal_orina{
      max-width: 80% !important;
    }
     #head_orina{
        background: #D27D2D;
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

<script>  

    $.ajax({
      url:"ajax/examenes.php?op=show_orina_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#color_orina").val(data.color);
        $("#olor_orina").val(data.olor);
        $("#aspecto_orina").val(data.aspecto);
        $("#densidad_orina").val(data.densidad);
        $("#esterasas_orina").val(data.est_leuco);
        $("#nitritos_orina").val(data.nitritos_orina);
        $("#ph_orina").val(data.ph);
        $("#proteinas_orina").val(data.proteinas);
        $("#glucosa_orina").val(data.glucosa);
        $("#cetonas_orina").val(data.cetonas);
        $("#urobilinogeno_orina").val(data.urobigilogeno);
        $("#bilirrubina_orina").val(data.bilirrubina);
        $("#sangre_oculta_orina").val(data.sangre_oculta);
        $("#cilindros_orina").val(data.cilindros);
        $("#leucocitos_orina").val(data.leucocitos);
        $("#hematies_orina").val(data.hematies);
        $("#epiteliales_orina").val(data.cel_epiteliales);
        $("#filamentos_orina").val(data.filamentos_muco);
        $("#bacterias_orina").val(data.bacterias);
        $("#cristales_orina").val(data.cristales);
        $("#observaciones_orina").val(data.observaciones);
        $("#id_pac_exa_orina").val(data.id_paciente);
        $("#num_orden_exa_orina").val(data.numero_orden);
      }
    });
</script>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="catorina" style="border-radius:0px !important;">
  <div class="modal-dialog" id="tamModal_orina">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header" id="head_orina">
        <h5 class="modal-title">EXAMEN GENERAL DE ORINA</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

  <div style="text-align: center;background: #343a40;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN QUIMICO - ORINA</strong></div>
      <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">
  <div class="form-group col-md-2">
    <label for="inputEmail4">Color</label>
    <input type="text" class="form-control" id="color_orina" value="Amarillo">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Olor</label>
    <input type="text" class="form-control" id="olor_orina" required="" style="text-align: right;" value="suigeneris">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Aspecto</label>
    <input type="text" class="form-control" id="aspecto_orina" value="Limpio">
  </div> 

  <div class="form-group col-md-2">
    <label for="inputEmail4">Densidad</label>
    <input type="text" class="form-control" id="densidad_orina" value="1.020">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Esterasas</label>
    <input type="text" class="form-control" id="esterasas_orina" value="75 leu/ul">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Nitritos</label>
    <input type="text" class="form-control" id="nitritos_orina" value="Negativo">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">PH</label>
    <input type="text" class="form-control" id="ph_orina" value="6.0">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Proteinas</label>
    <input type="text" class="form-control" id="proteinas_orina" value="Negativo">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Glucosa</label>
    <input type="text" class="form-control" id="glucosa_orina" value="Negativo">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Cetonas</label>
    <input type="text" class="form-control" id="cetonas_orina" value="Negativos">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Urobilinógeno</label>
    <input type="text" class="form-control" id="urobilinogeno_orina"  value="Negativo">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Bilirrubina</label>
    <input type="text" class="form-control" id="bilirrubina_orina"  value="Negativo">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Sangre Oculta</label>
    <input type="text" class="form-control" id="sangre_oculta_orina" value="Negativo">
  </div>
</div><!--fin row 1-->

<div style="text-align: center;background: #343a40;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN MICROSCOPICO</strong></div>
<!--EXAMEN ORINA SECTION 2-->
<div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">
  
  <div class="form-group col-md-1">
    <label for="inputEmail4">Cilidros</label>
    <input type="text" class="form-control" id="cilindros_orina" value="No se observan">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Leucocitos</label>
    <input type="text" class="form-control" id="leucocitos_orina" value="0-1 x campo">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Hematíes</label>
    <input type="text" class="form-control" id="hematies_orina" value="No se observan">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Cel. Epiteliales</label>
    <input type="text" class="form-control" id="epiteliales_orina" value="Escamosas escasas">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Filamentos</label>
    <input type="text" class="form-control" id="filamentos_orina" value="No se observan">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Bacterias</label>
    <input type="text" class="form-control" id="bacterias_orina"  value="No se observan">
  </div>


  <div class="form-group col-md-2">
    <label for="inputEmail4">Cristales</label>
    <input type="text" class="form-control" id="cristales_orina" value="No se observan">
  </div>

  <div class="form-group col-md-10">
    <label for="inputEmail4">Observaciones</label>
    <input type="text" class="form-control" id="observaciones_orina"  value="">
  </div>
</div>


  <div class="row" id="edit_exa_orina" style="margin-bottom: 8px" style="display:none">
    <div class="col-md-1"></div>
    <div class="col-md-4" style="margin-left: 10px"><button type="button" class="btn btn-block btn-danger btn-flat pull-left" onClick="finalizar_orina();">Finalizar</button></div>
    <div class="col-md-3" style="width: 100%"></div>
    <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat pull-left" onClick="GuardarExamenOrina();">Agregar</button></div>
    <div class="col-md-1"></div>
  </div>

<!--FIN EXAMEN ORINA SECTION 2-->
<input type="hidden" class="id_paciente_exa" id="id_pac_exa_orina" value="<?php echo $id_paciente;?>">
<input type="hidden" class="num_orden_exa" id="num_orden_exa_orina" value="<?php echo $n_orden;?>">

</div><!--FIN MODAL BODY-->

<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
<!-- Modal footer -->
<div class="modal-footer">
<button class="btn btn-dark btn-block" style="border-radius:0px" data-toggle="modal" data-target="#modalProveedores" onClick="GuardarExamenOrina();" id="guarda_orina">Guardar Examen Orina</button>
</div>

</div>
  </div>
</div>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var color = ["Amarillo"];
var aspecto = ["Limpio","Turbio","Leve turbio"];
var densidad  = ["1.020","1.005","1.010","1.015","1.020","1.025","1.030"];
var esterasas = ["Negativo","10-25 leu/ul","75 leu/ul","125 leu/ul","500 leu/ul"];
var nitritos = ["Negativo","Positivo +","Positivo++","Positivo+++"];
var ph = ["5.0","5.5","6.0","6.5","7.0","7.5","8.0","8.5","9.0"];
var proteinas = ["Negativo","15mg/dl","30mg/dl","100mg/dl","300mg/dl","2000mg/dl"];
var glucosa = ["Negativo","100mg/dl","250mg/dl","500mg/dl","1000mg/dl","2000mg/dl"];
var cetonas = ["Negativo","5mg/dl","15mg/dl","40mg/dl","80mg/dl","160mg/dl"];
var urobilinogeno = ["Negativo","0.2mg/dl","1mg/dl","2mg/dl","4mg/dl","8mg/dl","12mg/dl"];
var bilirrubina =  ["Negativo","1mg/dl","2mg/dl","4mg/dl"];
var sangre_oculta =  ["Negativo","Trazas","5Ery/ul","10Ery/ul","50Ery/ul","250Ery/ul"];
var cilindros =  ["No se observan"];
var leucocitos =  ["6-8 x campo"];
var Epiteliales =  ["Escamosas escasas"];
var filamentos =  ["No se observa"];
var bacterias =  ["No se observa"];
var cristales =  ["No se observa"];
var cilindros =  ["No se observan"];
var hematies =  ["No se observan"];
var epiteliales = ["Escamosas escasas","Escamosas moderada cantidad","Escamosas abundantes"];
var bacterias = ["No se observan","Escasas","Moderada cantidad","Abundantes"];
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

autocomplete(document.getElementById("color_orina"), color);
autocomplete(document.getElementById("aspecto_orina"), aspecto);
autocomplete(document.getElementById("densidad_orina"), densidad);
autocomplete(document.getElementById("esterasas_orina"),esterasas );
autocomplete(document.getElementById("nitritos_orina"), nitritos);
autocomplete(document.getElementById("ph_orina"),ph );
autocomplete(document.getElementById("proteinas_orina"),proteinas );
autocomplete(document.getElementById("glucosa_orina"), glucosa);
autocomplete(document.getElementById("cetonas_orina"),cetonas );
autocomplete(document.getElementById("urobilinogeno_orina"), urobilinogeno);
autocomplete(document.getElementById("bilirrubina_orina"), bilirrubina);
autocomplete(document.getElementById("sangre_oculta_orina"),sangre_oculta );
autocomplete(document.getElementById("cilindros_orina"),cilindros );
autocomplete(document.getElementById("leucocitos_orina"),leucocitos );
autocomplete(document.getElementById("hematies_orina"), hematies);
autocomplete(document.getElementById("epiteliales_orina"), Epiteliales);
autocomplete(document.getElementById("filamentos_orina"), filamentos);
autocomplete(document.getElementById("bacterias_orina"), bacterias);
autocomplete(document.getElementById("cristales_orina"), cristales);
autocomplete(document.getElementById("epiteliales_orina"), epiteliales);
autocomplete(document.getElementById("filamentos_orina"), bacterias);
autocomplete(document.getElementById("bacterias_orina"), bacterias);


</script>

 <style>
    #tamModal_heces{
      max-width: 80% !important;
    }
    #head_heces{
        background-color:#1d1d1d;
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
      url:"ajax/examenes.php?op=show_heces_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#color_heces").val(data.color);
        $("#consistencia_heces").val(data.consistencia);
        $("#mucus_heces").val(data.mucus);
        $("#macroscopicos_heces").val(data.macroscopicos);
        $("#microscopicos_heces").val(data.microscopicos);
        $("#hematies_heces").val(data.hematies);
        $("#leucocitos_heces").val(data.leucocitos);
        $("#protozoarios_heces").val(data.protozoarios);
        $("#activos_heces").val(data.activos);
        $("#quistes_heces").val(data.quistes);
        $("#metazoarios_heces").val(data.metazoarios);
        $("#observaciones_heces").val(data.observaciones);
        $("#id_pac_exa_heces").val(data.id_paciente);
        $("#num_orden_exa_heces").val(data.numero_orden);
      }
    });
</script>
<!-- The Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="catheces">
  <div class="modal-dialog" id="tamModal_heces">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="head_heces">
        <h4 class="modal-title">EXAMEN GENERAL DE HECES</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN QUIMICO - HECES</strong></div>

      <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px" autocomplete="on">

      <div class="form-group col-md-2">
        <label for="inputEmail4">Color</label>
        <input type="text" class="form-control" id="color_heces" required="" style="text-align: right;" autocomplete="on" value="Café">
      </div>

      <div class="form-group col-md-2">
        <label for="inputEmail4">Consistencia</label>
        <input type="text" class="form-control" id="consistencia_heces" required="" style="text-align: right;" autocomplete="on" value='Pastosa'>
      </div>

      <div class="form-group col-md-2">
        <label for="inputEmail4">Mucus</label>
        <input type="text" class="form-control" id="mucus_heces" required="" style="text-align: right;" autocomplete="on" value='Negativo'>
      </div>

     <div class="form-group col-md-3">
       <label for="inputEmail4">Macroscopicos(R. Alim.)</label>
       <input type="text" class="form-control" id="macroscopicos_heces" required="" style="text-align: right;" autocomplete="on" value='Escasos'>
     </div>

     <div class="form-group col-md-3">
       <label for="inputEmail4">Microscopicos(R. Alim.)</label>
       <input type="text" class="form-control" id="microscopicos_heces" required="" style="text-align: right;" value='Escasos'>
     </div>

    </div><!--form row 1-->
    
    <div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN MICROSCOPICO</strong></div>
<!--<button onClick="show_el();">Mostar</button>-->
  <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">

  <div class="form-group col-md-2">
    <label for="inputEmail4">Hematíes</label>
    <input type="text" class="form-control" id="hematies_heces" required="" style="text-align: right;" value='No se observan'>
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Leucocitos</label>
    <input type="text" class="form-control" id="leucocitos_heces" required="" style="text-align: right;" value='No se observan'>
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Protozoarios</label>
    <input type="text" class="form-control" id="protozoarios_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Activos</label>
    <input type="text" class="form-control" id="activos_heces" required="" style="text-align: right;" value='No se observan'>
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Quistes</label>
    <input type="text" class="form-control" id="quistes_heces" required="" style="text-align: right;" value='No se observan'>
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Metazoarios</label>
    <input type="text" class="form-control" id="metazoarios_heces" required="" style="text-align: right;" value='No se observan'>
  </div>

  <div class="form-group col-md-10">
    <label for="inputEmail4">Observaciones</label>
    <input type="text" class="form-control" id="observaciones_heces" required="" style="text-align: left;">
  </div>
  </div>

    <div class="diags row" style="margin:5px;" id="diag_heces">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Diagnostico</label>
      <textarea class="form-control" id="diagnostico_heces" rows="2"></textarea>
    </div>

    <div class="form-group col-md-12">
     <label for="inputEmail4">Tratamiento</label>
     <textarea class="form-control" id="tratamiento_heces" rows="2"></textarea>
    </div>    
  </div>
  <input type="hidden" class="id_paciente_exa" id="id_pac_exa_heces" value="<?php echo $id_paciente;?>">
  <input type="hidden" class="num_orden_exa" id="num_orden_exa_heces" value="<?php echo $n_orden;?>">
  <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
  <div class="form-group col-md-12">
    <button class="btn btn-dark btn-block" style="border-radius:0px;background:#3e4444; " data-toggle="modal" data-target="#modalProveedores" onClick="GuardarExamenHeces();" id="guerda_exa_heces">Guardar Examen Heces</button>
  </div>

    </div><!--Modal body-->

    </div>
  </div>
</div>


<script type="text/javascript">

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

  var color = ["Amarillo","Café","Verde","Blanca","Roja"];
  var consistencia = ["Formada","Blanda","Pastosa","Liquida","Dura"];
  var mucus = ["Negativo","Positivo","Positivo +","Positivo ++","Positivo +++"];
  var macros = ["Escasos","Moderada cantidad","Abundantes"];
  var micros = ["Escasos","Moderada cantidad","Abundantes"];
  var hematies = ["No se observan"];
  var quistes = ["Blastocystis hominis","Endolimax nana","Giardia lamblia","Chilomastix mesnili","Iodamoeba butschlii","Entamoeba coli","Entamoeba histolica","Balantidium coli","Acanthamoeba spp"];
  var metazoarios = ["Shistosoma mansoni","Trichuris trichura","Ascaris lumbricoides","Hymendepis nana","Hymendepis nana","Strongyloides stercolaris","Taenia spp"];


  autocomplete(document.getElementById("color_heces"), color);
  autocomplete(document.getElementById("consistencia_heces"), consistencia);
  autocomplete(document.getElementById("mucus_heces"), mucus);
  autocomplete(document.getElementById("macroscopicos_heces"), macros);
  autocomplete(document.getElementById("microscopicos_heces"), micros);
  autocomplete(document.getElementById("hematies_heces"), hematies);
  autocomplete(document.getElementById("leucocitos_heces"), hematies);
  autocomplete(document.getElementById("quistes_heces"), quistes);
  autocomplete(document.getElementById("activos_heces"), hematies);
  autocomplete(document.getElementById("metazoarios_heces"), metazoarios);
  autocomplete(document.getElementById("activos_heces"), quistes);


</script>


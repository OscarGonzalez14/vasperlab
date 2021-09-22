 <style>
    #tamModal_orina{
      max-width: 80% !important;
    }
    #head{
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="heces" style="border-radius:0px !important;">
  <div class="modal-dialog modal-lg" role="document" id="tamModal_orina">
  <div class="modal-content">
  <div class="modal-header" id="head" style="justify-content:space-between">
    <span><i class="fas fa-flask"></i> EXAMEN GENERAL DE HECES</span>
  <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
</div>
 <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td>
          </tr>
  <div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN QUIMICO - HECES</strong></div>

  <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px" autocomplete="on">

  <div class="form-group col-md-2">
    <label for="inputEmail4">Color</label>
    <input type="text" class="form-control" id="color_heces" required="" style="text-align: right;" autocomplete="on">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Consistencia</label>
    <input type="text" class="form-control" id="consistencia_heces" required="" style="text-align: right;" autocomplete="on">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Mucus</label>
    <input type="text" class="form-control" id="mucus_heces" required="" style="text-align: right;" autocomplete="on">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Macroscopicos(R. Alim.)</label>
    <input type="text" class="form-control" id="macroscopicos_heces" required="" style="text-align: right;" autocomplete="on">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Microscopicos(R. Alim.)</label>
    <input type="text" class="form-control" id="microscopicos_heces" required="" style="text-align: right;">
  </div>

  </div>

<div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN MICROSCOPICO</strong></div>
<!--<button onClick="show_el();">Mostar</button>-->
  <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">

  <div class="form-group col-md-2">
    <label for="inputEmail4">Hematíes</label>
    <input type="text" class="form-control" id="hematies_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Leucocitos</label>
    <input type="text" class="form-control" id="leucocitos_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Protozoarios</label>
    <input type="text" class="form-control" id="protozoarios_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Activos</label>
    <input type="text" class="form-control" id="activos_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">Quistes</label>
    <input type="text" class="form-control" id="quistes_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Metazoarios</label>
    <input type="text" class="form-control" id="metazoarios_heces" required="" style="text-align: right;">
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

  <div class="form-group col-md-12">
    <button class="btn btn-dark btn-block" style="border-radius:0px;background:#3e4444; " data-toggle="modal" data-target="#modalProveedores" onClick="GuardarExamenHeces();" id="guerda_exa_heces">Guardar Examen Heces</button>
  </div>



  <div class="row" id="edit_exa_heces" style="margin-bottom: 8px" style="display:none">
    <div class="col-md-1"></div>
    <div class="col-md-4" style="margin-left: 10px"><button type="button" class="btn btn-block btn-danger btn-flat pull-left" onClick="finalizar_heces();">Finalizar</button></div>
    <div class="col-md-3" style="width: 100%"></div>
    <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat pull-left" onClick="GuardarExamenHeces();">Agregar</button></div>
    <div class="col-md-1"></div>
  </div>
<input type="hidden" class="id_paciente_exa" id="id_pac_exa_heces">
<input type="hidden" class="num_orden_exa" id="num_orden_exa_heces">
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
</div>


</div>
  
    </div><!--Fin modal Content-->

  </div>
</div>
<script type="text/javascript">

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


</script>


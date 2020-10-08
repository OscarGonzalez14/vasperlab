 <style>
    #tamModal_orina{
      max-width: 80% !important;
    }
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="orina" style="border-radius:0px !important;">
  <div class="modal-dialog modal-lg" role="document" id="tamModal_orina">

    <div class="modal-content">
     <div class="modal-header" id="head" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> Examen General de Orina</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>
<div style="text-align: center;background: #343a40;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN QUIMICO - ORINA</strong></div>

  <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">
  <div class="form-group col-md-2">
    <label for="inputEmail4" style="font-size: 12px">Color</label>
    <input type="text" class="form-control" id="color_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Olor</label>
    <input type="text" class="form-control" id="olor_orina" required="" style="text-align: right;" value="suigeneris">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Aspecto</label>
    <input type="text" class="form-control" id="aspecto_orina" required="" style="text-align: right;">
  </div> 

  <div class="form-group col-md-2">
    <label for="inputEmail4">Densidad</label>
    <input type="text" class="form-control" id="densidad_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Esterasas</label>
    <input type="text" class="form-control" id="esterasas_orina" required="" style="text-align: right;" placeholder="Leucocitos">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Nitritos</label>
    <input type="text" class="form-control" id="nitritos_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-1">
    <label for="inputEmail4">PH</label>
    <input type="text" class="form-control" id="ph_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Proteinas</label>
    <input type="text" class="form-control" id="proteinas_orina" required="" style="text-align: right;" value="">
  </div>

  <div class="form-group col-md-1">
    <label for="inputEmail4">Glucosa</label>
    <input type="text" class="form-control" id="glucosa_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Cetonas</label>
    <input type="text" class="form-control" id="cetonas_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Urobilinógeno</label>
    <input type="text" class="form-control" id="urobilinogeno_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Bilirrubina</label>
    <input type="text" class="form-control" id="bilirrubina_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Sangre Oculta</label>
    <input type="text" class="form-control" id="sangre_oculta_orina" required="" style="text-align: right;">
  </div>
</div> <!--FIN EXAMEN ORINA SECTION 1-->

<div style="text-align: center;background: #343a40;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN MICROSCOPICO</strong></div>
<!--EXAMEN ORINA SECTION 2-->
<div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">
  
  <div class="form-group col-md-1">
    <label for="inputEmail4">Cilidros</label>
    <input type="text" class="form-control" id="cilindros_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Leucocitos</label>
    <input type="text" class="form-control" id="leucocitos_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Hematíes</label>
    <input type="text" class="form-control" id="hematies_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Cel. Epiteliales</label>
    <input type="text" class="form-control" id="epiteliales_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Filamentos</label>
    <input type="text" class="form-control" id="filamentos_orina" required="" placeholder="Mucoides" style="text-align: right;">
  </div>

  <div class="form-group col-md-1">
    <label for="inputEmail4">Bacterias</label>
    <input type="text" class="form-control" id="bacterias_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Cristales</label>
    <input type="text" class="form-control" id="cristales_orina" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-12">
    <label for="inputEmail4">Observaciones</label>
    <input type="text" class="form-control" id="observaciones_orina" required="" style="text-align: left;">
  </div>

  <div class="form-group col-md-12">
    <button class="btn btn-dark btn-block" style="border-radius:0px" data-toggle="modal" data-target="#modalProveedores" onClick="GurdarExamenOrina();">Guardar Examen Orina</button>
  </div> 

  </div>
<!--FIN EXAMEN ORINA SECTION 2-->
<input type="text" class="form-control" id="id_pac_exa">
<input type="text" class="form-control num_orden_exa" id="num_orden_exa_orina">
</div>
  
    </div><!--Fin modal Content-->

  </div>
</div>

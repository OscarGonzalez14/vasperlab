 <style>
    #tamModal_orina{
      max-width: 80% !important;
    }
     #head{
        background-color:#8B4513;
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
  <div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN QUIMICO - HECES</strong></div>

  <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">

  <div class="form-group col-md-2">
    <label for="inputEmail4">Color</label>
    <input type="text" class="form-control" id="color_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Consistencia</label>
    <input type="text" class="form-control" id="consistencia_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Mucus</label>
    <input type="text" class="form-control" id="mucus_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Restos</label>
    <input type="text" class="form-control" id="restos_heces" required="" style="text-align: right;" placeholder="Almenticios">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Macroscopicos</label>
    <input type="text" class="form-control" id="macroscopicos_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-2">
    <label for="inputEmail4">Microscopicos</label>
    <input type="text" class="form-control" id="microscopicos_heces" required="" style="text-align: right;">
  </div>

  </div>

<div style="text-align: center;background:#347C98;color: white;border-radius: 4px;margin: 5px"><strong>EXAMEN MICROSCOPICO</strong></div>

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
    <input type="text" class="form-control" id="observaciones_heces" required="" style="text-align: right;">
  </div>

  <div class="form-group col-md-12">
    <button class="btn btn-dark btn-block" style="border-radius:0px;background:#3e4444; " data-toggle="modal" data-target="#modalProveedores" onClick="GuardarExamenHeces();">Guardar Examen Heces</button>
  </div>

  </div>
<input type="hidden" class="form-control" id="id_pac_exa">
<input type="hidden" class="form-control num_orden_exa" id="num_orden_exa_heces">
</div>


</div>
  
    </div><!--Fin modal Content-->

  </div>
</div>

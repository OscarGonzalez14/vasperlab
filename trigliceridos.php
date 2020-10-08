<?php require_once("header.php"); ?>

<div class="content-wrapper">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trigliceridos">
  Trigliceridos
</button>

<div class="" id="trigliceridos">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">TRIGLICERIDOS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-row" style="margin: 5px;border:solid 2px gray;border-radius: 5px">
          <div class="form-group col-md-10">
            <label for="inputEmail4" style="font-size: 12px">Trigliceridos</label>
            <input type="text" class="form-control" id="color_orina" required="" style="text-align: right;" value="mg/dl">
            <input type="text" class="form-control" id="color_orina" required="" style="text-align: right;" value="">
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
</div>

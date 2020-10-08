 <style>
    #tamModal{
      width: 65% !important;
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


<div class="modal fade bd-example-modal-lg" id="detalle_solicitudes" style="border-radius:0px !important;">
  <div class="modal-dialog modal-lg" role="document" id="tamModal">

    <div class="modal-content">
     <div class="modal-header" id="head" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> Detalles Solicitudes</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>

    <div class="card-body p-0">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th colspan="60"><span style="color: blue;text-transform: uppercase;">Paciente:&nbsp;</span><span id="pac_solicitud"></span></th>
            <th colspan="40"><span style="color: blue;text-transform: uppercase;">Empresa:&nbsp;</span><span id="empresa_solicitud"></span></th>
          </tr>
        </thead>
          <tr>
            <td colspan="80" style="text-align: left;"><strong>DETALLES DE SOLICITUD</strong></td>
            <td colspan="20" style="text-align: left;"><srong style="color: blue;text-transform: uppercase;">#Orden:&nbsp;</srong><span id="orden_solicitud"></span></td>

          </tr>
        <tbody style="text-align:center" id="detalles_solicitud">
      </tbody>
      </table>
    </div>

</div><!--Fin modal Content-->
</div>
</div>
<script type="text/javascript" src="js/cleave.js"></script>

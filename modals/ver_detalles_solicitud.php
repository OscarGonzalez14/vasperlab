 <style>
    #tamModal_exa_d{
      width: 85% !important;
    }
     #head_exa_d{
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


<div class="modal fade" id="detalle_solicitudes">
  <div class="modal-dialog modal-xl" role="document" id="tamModal_exa_d">

    <div class="modal-content">
     <div class="modal-header" id="head_exa_d" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> Detalles Solicitudes</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>

    <div class="card-body p-0">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th colspan="15"><span style="color: black;text-transform: uppercase;">Cod.Emp:&nbsp;</span><span id="cod_emp" style="color: blue;"></span></th>
            <th colspan="30"><span style="color: black;text-transform: uppercase;">Paciente:&nbsp;</span><span id="pac_solicitud" style="color: blue;"></span></th>
            <th colspan="25"><span style="color: black;text-transform: uppercase;">Empresa:&nbsp;</span><span id="empresa_solicitud" style="color: blue;"></span></th>
            <th colspan="30"><span style="color: black;text-transform: uppercase;">Depto:&nbsp;</span><span id="depto_solicitud" style="color: blue;"></span></th>
          </tr>
        </thead>
        <tbody style="text-align:center" id="detalles_solicitud">
      </tbody>
      </table>
    </div>

</div><!--Fin modal Content-->
</div>
</div>
<script type="text/javascript" src="js/cleave.js"></script>

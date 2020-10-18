<style>
    #tamModal_print{
      width: 85% !important;
    }
     #head_exa_print{
        background-color: black;
        color: white;
        text-align: center;
    }
</style>


<div class="modal fade" id="show_cat_print">
  <div class="modal-dialog modal-lg" role="document" id="tamModal_print">

    <div class="modal-content">
     <div class="modal-header" id="head_exa_d" style="justify-content:space-between">
       <span><i class="fas fa-plus-square"></i> Impimir Examenes</span>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
     </div>

    <div class="card-body p-0">
      <table class="table-hover table-bordered" width="100%" id="data_show_cat_print">
        <thead>
          <tr style="text-align: center;">
            <th ># Orden:</span></th>
            <th >Paciente</th>
            <th >Categoría</th>
            <th >Imprimir</th>
          </tr>
        </thead>
        <tbody style="text-align:center">
      </tbody>
      </table>
    </div>

</div><!--Fin modal Content-->
</div>
</div>
<script type="text/javascript" src="js/cleave.js"></script>
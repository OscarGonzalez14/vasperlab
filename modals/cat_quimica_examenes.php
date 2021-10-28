 <style>
    #catquimicaModal{
      max-width: 70% !important;
    }
     #head_coles{
        color: white;
        text-align: center;
    }
    .titulo{
     background: #363945;
     display: block;
     color: white;
     border-radius: 2px;
     text-align: center;
     padding: 2px;
     font-family: Helvetica, Arial, sans-serif;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="catquimica">
  <div class="modal-dialog modal-dialog-scrollable" id="catquimicaModal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info" id="head_coles">
        <h5 class="modal-title">EXAMENES QUIMICA</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <?php
      $examenes_quimica = $reporteria->get_examenes_cat_quimica($n_orden,$id_paciente);
      $c_quimica=0;
      ?>

      <table width="100%" class="table-hover table-bordered table-striped">
      <?php
      $exa_quimica = Array();
      foreach ($examenes_quimica as $value) {
         $examen = strtolower($value["examen"]);
         array_push($exa_quimica, $examen);
         if($c_quimica % 2 ==0){
            echo "<tr>";
            $color ='blue';
          }else{
            $color ='green';
          } ?>

          <td style='border: <?php echo $color;?> solid 1px'>
            <?php require("modals_examenes/".$examen.".php");?>
          </td>
          <?php
          if($c_quimica % 2 !=0){
            echo "</tr>";
          }
          $c_quimica = $c_quimica+1;
      }
      ?>
      </table>
    <script>let arrayExa=<?php echo json_encode($exa_quimica);?></script>
    <button class="btn btn-block btn-primary" style="border-radius: 0px" onClick="regExaQuim(arrayExa);"><i class="fas fa-save"></i> GUARDAR EXAMENES</button>
    </div>            
    </div>
    </div><!-- Modal body -->
      <input type="hidden" class="id_paciente_exa" id="id_pac_quimica" value="<?php echo $id_paciente;?>">
      <input type="hidden" class="num_orden_exa" id="num_orden_quimica" value="<?php echo $n_orden;?>">
      <input type="hidden" id="fecha" value="<?php echo $hoy;?>">      
    </div>

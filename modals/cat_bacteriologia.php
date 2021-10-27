<style> 
#tamModal_bacteriologia{
  max-width: 80%;
}
</style>
<!-- The Modal -->
<div class="modal fade bd-example-modal-lg" id="catbacteriologia">
  <div class="modal-dialog dialog-scrollable" id="tamModal_bacteriologia">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">BACTERIOLOGIA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <?php
      $examenes_bacteriologia = $reporteria->get_examenes_cat_bacteriologia($n_orden,$id_paciente);
      $c_bacteriologia=0;
      ?>

      <table width="100%" class="table-hover table-bordered table-striped">
      <?php
      $exa_bacteriologia = Array();
      foreach ($examenes_bacteriologia as $value) {
         $examen_bac = strtolower($value["examen"]);
         array_push($exa_bacteriologia, $examen_bac);
         if($c_bacteriologia % 2 ==0){
            echo "<tr>";
            $color_b ='blue';
          }else{
            $color_b ='green';
          } ?>

          <td style='border: <?php echo $color_b;?> solid 1px'>
            <?php echo require("modals_examenes/".$examen_bac.".php");?>
          </td>
          <?php
          if($c_bacteriologia % 2 !=0){
            echo "</tr>";
          }
          $c_quimica = $c_bacteriologia+1;
      }
      ?>
      </table>

      </div><!-- finModal body -->
    <script>let arrayBac=<?php echo json_encode($exa_bacteriologia);?></script>
    <button class="btn btn-block btn-primary" style="border-radius: 0px" onClick="regExaBact(arrayBac);"><i class="fas fa-save"></i> GUARDAR EXAMENES</button>

    <input type="hidden" class="" id="id_pac_bacteriologia" value="<?php echo $id_paciente;?>">
    <input type="hidden" class="" id="num_orden_bacteriologia" value="<?php echo $n_orden;?>">
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">


    </div>
  </div>
</div>
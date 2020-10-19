<?php
$datos_sgot = $reporteria->get_data_sgot($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
<?php

  for($i=0;$i<sizeof($datos_sgot);$i++){

?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:30%;color: red" colspan="30" class="stilot1"><strong> Aspartato de Aminotransferasa AST/SGOT</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_sgot[$i]["resultado"]." UL";?></span></td>
    <td style="text-align: center;width:45%" colspan="45" class="stilot1">8-33 U/L</td>
</tr>
<?php if ( $datos_sgot[$i]["observacione"] !=""){?>
<tr>
  <td style="text-align: center;width:100%" colspan="100" class="stilot1"><span class=""><?php echo $datos_sgot[$i]["observacione"];?></span></td>
</tr>
<?php } ?>
<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
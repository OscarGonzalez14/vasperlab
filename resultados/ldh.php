<?php
$datos_ldh = $reporteria->get_data_ldh($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
<?php

  for($i=0;$i<sizeof($datos_ldh);$i++){
?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:30%;color: red" colspan="30" class="stilot1"><strong>Colesterol de Baja Densidad LDH</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_ldh[$i]["resultado"]." mg/dl";?></span></td>
    <td style="text-align: left;width:45%" colspan="45" class="stilot1">Valores sospechosos mayores de: <b>150 mg/dl.</b><br>Valores elevados mayores de: <b>190 mg/dl.</b></td>
</tr>
<?php if ( $datos_ldh[$i]["observaciones"] !=""){?>
<tr>
  <td style="text-align: left;width:100%" colspan="100" class="stilot1"><span class=""><?php echo $datos_ldh[$i]["observaciones"];?></span></td>
</tr>
<?php } ?>
<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
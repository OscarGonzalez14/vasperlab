<?php
$datos_hdl = $reporteria->get_data_hdl($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
<?php

  for($i=0;$i<sizeof($datos_hdl);$i++){

?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:30%;color: red;text-transform: uppercase;font-size: 11px" colspan="30" class="stilot1"><strong>Colesterol de Alta Densidad HDL</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_hdl[$i]["resultado"]." mg/dl";?></span></td>
    <td style="text-align: left;width:45%" colspan="45" class="stilot1">Valores deseados mayores de: <b>65 mg/dl.</b><br>Riesgo moderado: <b>45-65 mg/dl.</b><br>Alto riesgo valores menores de: <b>45 mg/dl.</b></td>
</tr>
<?php if ( $datos_hdl[$i]["observaciones"] !=""){?>
<tr>
  <td style="text-align: left;width:100%" colspan="100" class="stilot1"><span class=""><?php echo $datos_hdl[$i]["observaciones"];?></span></td>
</tr>
<?php } ?>
<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
<?php
$datos_trigliceridos = $reporteria->get_data_trigliceridos($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
<?php

  for($i=0;$i<sizeof($datos_trigliceridos);$i++){

?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:30%;color:red" colspan="30" class="stilot1"><strong>TRIGLICERIDOS</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_trigliceridos[$i]["resultado"]." mg/dl";?></span></td>
    <td style="text-align: left;width:45%" colspan="45" class="stilot1">Valores Sospechosos mayores de: <strong>65 mg/dl</strong><br>
      Valores elevados mayores de: <strong>190 mg/dl</strong></td>
</tr>
<?php if ( $datos_trigliceridos[$i]["observacione"] !=""){?>
<tr>
  <td style="text-align: center;width:100%" colspan="100" class="stilot1"><span class=""><?php echo $datos_trigliceridos[$i]["observacione"];?></span></td>
</tr>

<?php } ?>
<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
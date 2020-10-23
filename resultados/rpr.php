<?php
$datos_rpr = $reporteria->get_data_rpr($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
	<tr>
			<td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong></td>
		</tr>
    <tr>
    <td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>MUESTRA: <strong> SANGRE</td>
    </tr>
		<tr>
    <th bgcolor="#0061a9" colspan="30" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:30%"><span class="Estilo11">EXAMEN</span></th>
    <th bgcolor="#0061a9" colspan="25" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:25%"><span class="Estilo11">RESULTADO</span></th>
    <th bgcolor="#0061a9" colspan="45" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:45%"><span class="Estilo11">VALORES NORMALES</span></th>
</tr>
<?php

  for($i=0;$i<sizeof($datos_rpr);$i++){

?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:30%;color: red" colspan="30" class="stilot1"><strong> R.P.R</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_rpr[$i]["resultado"];?></span></td>
    <td style="text-align: center;width:45%" colspan="45" class="stilot1">.</td>
</tr>
<?php if ( $datos_rpr[$i]["observacione"] !=""){?>
<tr>
  <td style="text-align: center;width:100%" colspan="100" class="stilot1"><span class=""><?php echo $datos_rpr[$i]["observacione"];?></span></td>
</tr>
<?php } ?>
<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
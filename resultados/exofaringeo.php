<?php
$datos_exofaringeo = $reporteria->get_data_exofaringeo($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<div style="margin-top: 5px">
<table class="table2" width="100%" >
<tr>
	  <th bgcolor="#0061a9" colspan="20" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:20%"><span class="Estilo11">EXAMEN</span></th>
    <th bgcolor="#0061a9" colspan="25" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:25%"><span class="Estilo11">SE AISLA</span></th>
    <th bgcolor="#0061a9" colspan="35" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:35%"><span class="Estilo11">SENSIBLE A</span></th>
    <th bgcolor="#0061a9" colspan="20" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:20%"><span class="Estilo11">RESISTENTE A</span></th>
</tr>
<?php

  for($i=0;$i<sizeof($datos_exofaringeo);$i++){

?>
<tr style="font-size:11px" class="even_row">
    <td style="text-align: center;width:20%;color: red" colspan="20" class="stilot1"><strong>EXOFARINGEO</strong></td>
    <td style="text-align: center;width:25%" colspan="25" class="stilot1"><span class=""><?php echo $datos_exofaringeo[$i]["aisla"];?></span></td>
    <td style="text-align: center;width:35%" colspan="35" class="stilot1"><span class=""><?php echo $datos_exofaringeo[$i]["sensible"];?></span></td>
    <td style="text-align: center;width:20%" colspan="20" class="stilot1"><?php echo $datos_exofaringeo[$i]["resiste"];?></td>
</tr>

<tr>
  <td style="text-align: center;width:100%" colspan="100" class="stilot1"><span class="">REFERIDO A: <?php echo $datos_exofaringeo[$i]["refiere"];?></span></td>
</tr>

<tr><td colspan="100" style="background:#B0B0B0"></td></tr>
<?php
  }
?>
</table>
</div>
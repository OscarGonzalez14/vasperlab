<div style="margin-top: 2px;">
	<table class="table2" width="100%">
		<tr>
			<td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong>&nbsp;&nbsp;&nbsp;&nbsp;COD. EMPLEADO: <?php echo $cod_emp;?><strong></td>
		</tr>
		<tr>
    <th bgcolor="#0061a9" colspan="30" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:30%"><span class="Estilo11">EXAMEN</span></th>
    <th bgcolor="#0061a9" colspan="25" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:25%"><span class="Estilo11">RESULTADO</span></th>
    <th bgcolor="#0061a9" colspan="45" style="color:white;font-size:12px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:45%"><span class="Estilo11">MUESTRA</span></th>
</tr>
</table>
<?php
$examenes_bacteriologia= $reporteria->examenes_bacteriologia_print($_GET["id_paciente"],$_GET["numero_orden"]);
  	foreach ($examenes_bacteriologia as $row) {
    require_once("resultados/".$row["examen"].".php");	
}

?>

</div>

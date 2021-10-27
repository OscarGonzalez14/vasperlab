<style>
  .round_table {                   
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 15px;
    -moz-border-radius: 20px;
    padding: 2px;
    -webkit-border-radius: 5px;
  }
  .round_table {                   
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #0275d8;        
    padding: 2px;
  }
  #watermark {
    position: fixed;
    top: 7.5%;
    margin-left: 4.5%;
    width: 100%;
    opacity: .080;    
    z-index: -1000;
  }
  #firma{
    position: fixed;
    top: 34.2%;
    margin-left: 4.5%;
  }
  #inscripcion{
    position: fixed;
    top: 33.3%;
    margin-left: 70.5%;
  }
</style>

<div id="watermark"><img src="images/vasperoficial.jpg" width="650" height="300"/></div>
<div style="margin-top: 0px;">
  <table class="round_table" width="100%" style="font-size: 14px; margin-top:0px">
    <tr>
      <td colspan="60" style="border-left:0px;width: 40%">&nbsp;&nbsp;&nbsp;&nbsp;<b><
       <span style="margin-left:8px;color:#034f84">Paciente:</span></b><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords(strtolower($paciente));?>
      </td>
      <td width="40" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Cod. Empleado</span><br> <span style="margin-left:5px;"><?php echo $cod_emp."<span style='color:white'>.</span>";?></span></td>
    </tr>
  </table>
</div>
<br>
<div style="margin-top: 2px;">
	<table class="table2" width="100%">

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

<div id="" style="text-align: center;">
  <img src="images/sello_vasper.jpg" height="160" width="300" >
</div>

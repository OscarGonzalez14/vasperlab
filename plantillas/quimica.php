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
</style>
<!--Marca de agua-->
<div id="watermark"><img src="images/vasperoficial.jpg" width="700" height="300"/></div>
<div style="margin-top: 2px;">
  <table class="round_table" width="100%" style="font-size: 14px; margin-top:2px">
    <tr>
      <td colspan="40" style="border-left:0px;width: 40%">&nbsp;&nbsp;&nbsp;&nbsp;<b><
       <span style="margin-left:8px;color:#034f84">Paciente:</span></b><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords(strtolower($paciente));?>
      </td>
      <td width="25" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Cod. Empleado</span><br> <span style="margin-left:5px;"><?php echo $cod_emp."<span style='color:white'>.</span>";?></span></td>
      <td width="25" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Muestra</span><br> <span style="margin-left:5px;"> <?php echo "Sangre";?></span></td> 
    </tr>
  </table>
</div>
<br>
<div style="margin-top: 2px;">
	<table class="table2" width="100%">
		<tr>
    <th bgcolor="#06038D" colspan="30" style="color:white;font-size:15px;font-family: Courier, monospace;width:30%;border-top-left-radius: 3px;"><span class="Estilo11" style="padding: 15px">EXAMEN</span></th>
    <th bgcolor="#06038D" colspan="25" style="color:white;font-size:15px;font-family: Courier, monospace;width:25%"><span class="Estilo11" style="padding: 15px">RESULTADO</span></th>
    <th bgcolor="#06038D" colspan="45" style="color:white;font-size:15px;font-family: Courier, monospace;width:45%"><span class="Estilo11" style="padding: 15px">VALORES NORMALES</span></th>
</tr>
</table>
<?php
$examenes_quimica= $reporteria->examenes_quimica_print($_GET["id_paciente"],$_GET["numero_orden"]);

  	foreach ($examenes_quimica as $row) {
      if ($row["examen"]!="hemograma") {
        require_once("resultados/".$row["examen"].".php");
      } 		

  	}

?>

</div>
<div id="inscripcion" style="text-align: center;">
  <img src="images/sello_vasper.jpg" height="160" width="300" >
</div>
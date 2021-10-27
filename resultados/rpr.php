<?php
$datos_rpr = $reporteria->get_data_rpr($_GET["id_paciente"],$_GET["numero_orden"]);
?>
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
    top: 4.5%;
    margin-left: 4.5%;
    width: 100%;
    opacity: .080;    
    z-index: -1000;
  }
  #firma{
    position: fixed;
    top: 24.2%;
    margin-left: 4.5%;
  }
  #inscripcion{
    position: fixed;
    top: 24.3%;
    margin-left: 70.5%;
  }
</style>

<div id="watermark"><img src="images/vasperoficial.jpg" width="550" height="220"/></div>
<div id="firma">
  <img src="images/sello_vasper_firma.jpg" height="89" width="180" >
</div>
<div id="inscripcion">
  <img src="images/sello_vasper_ninscrip.jpg" height="120" width="210" >
</div>

<div style="margin-top: 0px;">
  <table class="round_table" width="100%" style="font-size: 14px; margin-top:0px">
    <tr>
      <td colspan="40" style="border-left:0px;width: 40%">&nbsp;&nbsp;&nbsp;&nbsp;<b><
       <span style="margin-left:8px;color:#034f84">Paciente:</span></b><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords(strtolower($paciente));?>
      </td>
      <td width="25" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Cod. Empleado</span><br> <span style="margin-left:5px;"><?php echo $cod_emp."<span style='color:white'>.</span>";?></span></td>
      <td width="25" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Muestra</span><br> <span style="margin-left:5px;"> <?php echo "Sangre";?></span></td> 
    </tr>
  </table>
</div>

<div style="margin-top: 5px">
<table class="table2" width="100%" >

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
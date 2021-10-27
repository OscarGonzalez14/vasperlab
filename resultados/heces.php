<!--***************EXAMEN DE HECES-->
<?php
$items_heces = $reporteria->get_items_heces($_GET["id_paciente"],$_GET["numero_orden"]);

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
    top: 10.5%;
    margin-left: 4.5%;
    width: 100%;
    opacity: .080;    
    z-index: -1000;
  }
  #firma{
    position: fixed;
    top:40.2%;
    margin-left: 4.5%;
  }
  #inscripcion{
    position: fixed;
    top: 40.3%;
    margin-left: 70.5%;
  }
</style>

<div id="watermark"><img src="images/vasperoficial.jpg" width="710" height="300"/></div>
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
      <td width="25" style="border-left:1px solid #0275d8;width: 20%;"><span style="margin-left:5px;color:#034f84">Muestra</span><br> <span style="margin-left:5px;"> <?php echo "Heces";?></span></td> 
    </tr>
  </table>
</div>

<br>
<table class="table2" width="100%">
    <tr><td style="text-align: center;width: 100%" colspan="100">
      <span style="color: red;font-size: 15px;text-align: center"><strong>EXAMEN GENERAL DE HECES</strong></span>
    </td></tr>
	<?php for($i=0;$i<sizeof($items_heces);$i++){ ?>
  <tr>
    <th class="stilot1" colspan="50" style="background:#034f84;color: white">EXAMEN FÍSICO-QUÍMICO</th>
    <th class="stilot1" colspan="50" style="background:#034f84;border-left: 2px solid black;color: white">EXAMEN MICROSCOPICO</th>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Color:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["color"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Hematíes:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["hematies"];?></span></td>
  </tr>

  <tr>
    <td class="stilot1" colspan="20"><strong>Consistencia:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["consistencia"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Leucocitos:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["leucocitos"];?></span></td>
  </tr>

  <tr>
    <td class="stilot1" colspan="20"><strong>Mucus:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["mucus"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Protozoarios:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["protozoarios"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="50" style="text-align: center;background:#034f84;color:white;



    "><strong>Restos Alimenticios:</strong></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Activos:</strong></td>
    <td class="stilot1" colspan="30" style="font-style: italic;"><b><?php echo $items_heces[$i]["activos"];?></b></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Macroscopicos:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["macroscopicos"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Quistes:</strong></td>
    <td class="stilot1" colspan="30" style="font-style: italic;"><b><?php echo $items_heces[$i]["quistes"];?></b></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Microscopicos:</strong></td>
    <td class="stilot1" colspan="30" style="font-style: italic;"><span><?php echo $items_heces[$i]["microscopicos"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Metazoarios:</strong></td>
    <td class="stilot1" colspan="30" style="font-style: italic;"><b><?php echo $items_heces[$i]["metazoarios"];?></b></td>
  </tr>
  <tr>
  	<td class="stilot1" colspan="20"><strong>Observaciones:</strong></td>
    <td class="stilot1" colspan="80"><span><?php echo $items_heces[$i]["observaciones"];?></span></td>
  </tr>
  <?php } ?>
</table>


</div><!--Fin div Examen Orina--->
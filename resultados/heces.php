<!--***************EXAMEN DE HECES-->
<?php
$items_heces = $reporteria->get_items_heces($_GET["id_paciente"],$_GET["numero_orden"]);

?>
      



<table class="table2" width="100%">
      <tr>
      <td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong>&nbsp;&nbsp;&nbsp;&nbsp;COD. EMPLEADO: <?php echo $cod_emp;?><strong></td>
    </tr>
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
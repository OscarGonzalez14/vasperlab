<?php
$items_orina = $reporteria->get_items_orina($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<table class="table2" width="100%">
  <tr>
      <td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong></td>
    </tr>
    <tr><td style="text-align: center;width: 100%" colspan="100">
      <span style="color: red;font-size: 15px;text-align: center"><strong>EXAMEN GENERAL DE ORINA</strong></span>
    </td></tr>
	<?php for($i=0;$i<sizeof($items_orina);$i++){ ?>
  <tr>
    <th class="#table2 stilot1
       border-collapse: collapse" colspan="50" style="background:#034f84;color: white;font-size:13px">EXAMEN FÍSICO-QUÍMICO</th>
    <th class="stilot1" colspan="50" style="background:#034f84;border-left: 2px solid black;color: white;font-size:13px">EXAMEN MICROSCOPICO</th>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Color:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["color"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Cilindros:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["cilindros"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Olor</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["olor"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Leucocitos</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["leucocitos"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Aspecto</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["aspecto"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Hematíes</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["hematies"];?></span></td>
  </tr>
    <tr>
    <td class="stilot1" colspan="20"><strong>Densidad</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["densidad"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Cel. Epiteliales</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["cel_epiteliales"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Esterasas de Leucocitos</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["est_leuco"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Filamentos Mucoides</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["filamentos_muco"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Nitritos</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["nitritos_orina"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Bacterias</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["bacterias"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>PH</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["ph"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left: 2px solid black"><strong>Cristales</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["cristales"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Proteínas</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["proteinas"];?></span></td>
    <td class="stilot1" colspan="50" style="border-left: 2px solid black"><strong>Observaciones</strong></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Glucosa</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["glucosa"];?></span></td>
    <td class="stilot1" colspan="50" rowspan="5" style="border-left: 2px solid black"><strong><span><?php echo $items_orina[$i]["observaciones"];?></span></strong></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Cetonas</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["cetonas"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Urobilinogeno</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["urobigilogeno"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Bilirrubina</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["bilirrubina"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Sangre Oculta</td>
    <td class="stilot1" colspan="30"><span><?php echo $items_orina[$i]["sangre_oculta"];?></span></td>
  </tr>
  <?php } ?>
</table>
<?php
$items_hemograma = $reporteria->get_items_hemograma($_GET["id_paciente"],$_GET["numero_orden"]);

?>
<table class="table2" width="100%" style="border: 1px solid black">
  <tr>
      <td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong>&nbsp;&nbsp;&nbsp;&nbsp;COD. EMPLEADO: <?php echo $cod_emp;?><strong></td>
    </tr>
    <tr><td style="text-align: center;width: 100%" colspan="100">
      <span style="color: red;font-size: 15px;text-align: center"><strong>HEMOGRAMA</strong></span>
    </td></tr>
  
  <tr>
    <th class="#table2 stilot1
       border-collapse: collapse" colspan="33" style="background:#034f84;color: white;font-size:13px">LINEA ROJA</th>
    <th class="stilot1" colspan="33" style="background:#034f84;border-left: 2px solid black;color: white;font-size:13px">LINEA BLANCA</th>
    <th class="stilot1" colspan="34" style="background:#034f84;border-left: 2px solid black;color: white;font-size:13px">VARIOS</th>
  </tr>
<?php for($i=0;$i<sizeof($items_hemograma);$i++){ ?>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">G.R. x mm<sup>3</sup></td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["gr_hemato"];?></span></td>
    <td colspan="18" style="width: 15%" class="stilot1">G.B. x mm<sup>3</sup></td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["gb_hemato"];?></td>
    <td colspan="19" style="width: 15%" class="stilot1">Plaquetas</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["plaquetas_hemato"];?></span>/mm<sup>3</sup></td>
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">Ht %</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["ht_hemato"];?></span></td>
    <td colspan="18" style="width: 15%" class="stilot1">Linfocitos</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["linfocitos_hemato"]."%";?></td>
      <td colspan="19" style="width: 15%" class="stilot1">Reticulocitos</td>
      <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["reti_hemato"];?></td>
  </tr>
  <tr>
  <td colspan="18" style="width: 15%" class="stilot1">Hb g/dl</td>
  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["hb_hemato"];?></span></td>
  <td colspan="18" style="width: 15%" class="stilot1">Monocitos</td>
  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["monocitos_hemato"]."%";?></td>
  <td colspan="19" style="width: 15%" class="stilot1">Eritrosedimentación</td>
  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["eritro_hemato"];?></td>
  </tr>
  <tr>
   <td colspan="18" style="width: 15%" class="stilot1">V.C.M fl</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["vcm_hemato"];?></span></td>
  <td colspan="18" style="width: 15%" class="stilot1">Eosinófilos</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["eosinofilos_hemato"]."%";?></td>
      <td colspan="34" style="width: 34%;text-align: center;background:#034f84;color: white;" class="stilot1"><b>OTROS</b>
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">H.C.M Pg</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["hcm_hemato"];?></span></td>
    <td colspan="18" style="width: 15%" class="stilot1">Basinofilos</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["basinofilos_hemato"]."%";?></td>
    <td colspan="34"  rowspan="10"></td>    
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">C.M.H.C g/dl</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["cmhc_hemato"];?></span></td>
    <td colspan="33" style="width: 34%;text-align: center;background:#034f84;color: white;" class="stilot1"><b>NEUTROFILOS</b> 
  </tr>
<tr>
    <td colspan="33" style="width: 34%;text-align: center;background:#034f84;color: white;" class="stilot1"><b>GOTA GRUESA</b>
      <td colspan="18" style="width: 15%" class="stilot1">En Banda</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["banda_hemato"]."%";?></td>
  </tr>
  <tr>
    <td colspan="33"  rowspan="6" style="border: 2px solid black"></td>
    <td colspan="18" style="width: 15%" class="stilot1">Segmentados</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["segmentados_hemato"]."%";?></td>
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">Metamielo Neutro</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["metamielo_hemato"];?></td>
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">Mielocitos</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["mielocitos_hemato"];?></td>
  </tr>
  <tr>
    <td colspan="18" style="width: 15%" class="stilot1">Blastos</td>
    <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["blastos_hemato"];?></td>
  </tr>
 
  <?php } ?>
</table>

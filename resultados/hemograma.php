<?php
$items_hemograma = $reporteria->get_items_hemograma($_GET["id_paciente"],$_GET["numero_orden"]);

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
    top: 7.5%;
    margin-left: 4.5%;
    width: 100%;
    opacity: .080;    
    z-index: -1000;
  }
  #firma{
    position: fixed;
    top: 37.3%;
    margin-left: 4.5%;
  }
  #inscripcion{
    position: fixed;
    top: 33.3%;
    margin-left: 70.5%;
  }
</style>
<!--Marca de agua-->
<div id="watermark"><img src="images/vasperoficial.jpg" width="700" height="300"/></div>
<div id="firma">
  <img src="images/sello_vasper_firma.jpg" height="98" width="185" >
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
<h5 style="font-family: Helvetica, Arial, sans-serif;color: red;font-size: 14px;text-align: center;margin-top: 0px !important;margin-bottom: 0px !important;">HEMOGRAMA</h5>
<table class="table2" width="100%" style="border: 1px solid black;margin-top: 0px !important">
  <tr>
    <th class="#table2 stilot1
       border-collapse: collapse" colspan="33" style="background:#0072B5;color: white;font-size:13px">LINEA ROJA</th>
    <th class="stilot1" colspan="33" style="background:#0072B5;border-left: 2px solid black;color: white;font-size:13px">LINEA BLANCA</th>
    <th class="stilot1" colspan="34" style="background:#0072B5;border-left: 2px solid black;color: white;font-size:13px">VARIOS</th>
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
      <td colspan="34" style="width: 34%;text-align: center;background:#0072B5;color: white;" class="stilot1"><b>OTROS</b>
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
    <td colspan="33" style="width: 34%;text-align: center;background:#0072B5;color: white;" class="stilot1"><b>NEUTROFILOS</b> 
  </tr>
<tr>
    <td colspan="33" style="width: 34%;text-align: center;background:#0072B5;color: white;" class="stilot1"><b>GOTA GRUESA</b>
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

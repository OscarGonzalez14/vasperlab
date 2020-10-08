<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["numero_orden"];
$datos_orden = $reporteria->get_datos_orden($_GET["id_paciente"],$_GET["numero_orden"]);
$items_heces = $reporteria->get_items_heces($_GET["id_paciente"],$_GET["numero_orden"]);
$items_orina = $reporteria->get_items_orina($_GET["id_paciente"],$_GET["numero_orden"]);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
      html{
      	margin-top: 0;
        margin-left: 30px;
        margin-right:15px;
        margin-bottom: 0;
    }
    .stilot1{
       border: 1px solid black;
       padding: 5px;
       font-size: 12px;
    }

    #table2 {
       border-collapse: collapse;
    }
   </style>
  </head>
  <body>
<table style="width: 100%;">
   <tr>
      <td width="10%"><h1 style="text-align: left; margin-right:20px;"><img src="images/vasperlogo.png" width="100" height="50"  /></h1></td>

    <td width="60%">
       <table style="width:95%;">
           <tr>
             <td style="text-align:center; font-size:16px"><strong>LABORATORIO CLINICO VASPER</strong> || <strong>Lic. Carlos Andrés Vásquez Peraza</strong></td>
           </tr>
           <tr>
              <td style="text-align:center; font-size:12px">Calle Francisco Gavidia y Final Calle Gerardo Barrios #9-A, Ciudad Arce<span id="date"></span><span>Telefonos: 23330-9801&nbsp;&nbsp;</span><br>E-mail: labclinicovasper@gmail.com&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:center; font-size:11px"><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
            </tr>
        </table><!--fin segunda tabla-->
    </td>
    <td width="10%">

    <table>
      <tr>
        <td style="text-align:center; font-size:12px;color: red;"><strong style="text-align:center; font-size:14px"></strong></td>
     </tr>
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna-->
</tr>
</table>

<div style="height:420px;width:100%;margin-top:0px;"><!--div Examen Orina--->
	<?php for($i=0;$i<sizeof($datos_orden);$i++){ ?>
		<div>
			<span style="color:#191970;font-size: 13px"><strong>PACIENTE:&nbsp;</strong><?php echo $datos_orden[$i]["nombre"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#191970;font-size: 13px"><strong># Orden:&nbsp;</strong><?php echo $datos_orden[$i]["numero_orden"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
    <div style="margin:0 auto;text-align: center;">
      <span style="color: red;font-size: 15px;"><strong>EXAMEN GENERAL DE ORINA</strong></span>
    </div>
    <?php } ?>
    <br>

<table id="table2" width="100%">
	<?php for($i=0;$i<sizeof($items_orina);$i++){ ?>
  <tr>
    <th class="#table2 {
       border-collapse: collapse;" colspan="50" style="background:#DCDCDC;color: black">EXAMEN FÍSICO-QUÍMICO</th>
    <th class="stilot1" colspan="50" style="background:#DCDCDC;border-left: 2px solid black;color: black">EXAMEN MICROSCOPICO</th>
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


</div><!--Fin div Examen Orina--->
<span style="text-align: center">--------------------------------------------------------------------------------------------------------------------------------------------------</span>
<table style="width: 100%;">
   <tr>
      <td width="10%"><h1 style="text-align: left; margin-right:20px;"><img src="images/vasperlogo.png" width="100" height="50"  /></h1></td>

    <td width="60%">
       <table style="width:95%;">
           <tr>
             <td style="text-align:center; font-size:16px"><strong>LABORATORIO CLINICO VASPER</strong> || <strong>Lic. Carlos Andrés Vásquez Peraza</strong></td>
           </tr>
           <tr>
              <td style="text-align:center; font-size:12px">Calle Francisco Gavidia y Final Calle Gerardo Barrios #9-A, Ciudad Arce<span id="date"></span><span>Telefonos: 23330-9801&nbsp;&nbsp;</span><br>E-mail: labclinicovasper@gmail.com&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:center; font-size:11px"><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
            </tr>
        </table><!--fin segunda tabla-->
    </td>
    <td width="10%">

    <table>
      <tr>
        <td style="text-align:center; font-size:12px;color: red;"><strong style="text-align:center; font-size:14px"></strong></td>
     </tr>
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna-->
</tr>
</table>
<!--***************EXAMEN DE HECES-->
<div style="height:360px;width:100%;margin-top:10px;"><!--div Examen Heces--->
	<?php for($i=0;$i<sizeof($datos_orden);$i++){ ?>
		    <div>
      <span style="color:#191970;font-size: 13px"><strong>PACIENTE:&nbsp;</strong><?php echo $datos_orden[$i]["nombre"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#191970;font-size: 13px"><strong># Orden:&nbsp;</strong><?php echo $datos_orden[$i]["numero_orden"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="margin:0 auto;text-align: center;">
      <span style="color: red;font-size: 15px;"><strong>EXAMEN GENERAL DE HECES</strong></span>
    </div>
    <?php } ?>
    <br>

<table id="table2" width="100%">
	<?php for($i=0;$i<sizeof($items_heces);$i++){ ?>
  <tr>
    <th class="stilot1" colspan="50" style="background:#DCDCDC;color: black">EXAMEN FÍSICO-QUÍMICO</th>
    <th class="stilot1" colspan="50" style="background:#DCDCDC;border-left: 2px solid black;color: black">EXAMEN MICROSCOPICO</th>
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
    <td class="stilot1" colspan="50" style="text-align: center;background:#DCDCDC



    "><strong>Restos Alimenticios:</strong></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Activos:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["activos"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Macroscopicos:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["macroscopicos"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Quistes:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["quistes"];?></span></td>
  </tr>
  <tr>
    <td class="stilot1" colspan="20"><strong>Microscopicos:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["microscopicos"];?></span></td>
    <td class="stilot1" colspan="20" style="border-left:2px solid black"><strong>Metazoarios:</strong></td>
    <td class="stilot1" colspan="30"><span><?php echo $items_heces[$i]["metazoarios"];?></span></td>
  </tr>
  <tr>
  	<td class="stilot1" colspan="20"><strong>Observaciones:</strong></td>
    <td class="stilot1" colspan="80"><span><?php echo $items_heces[$i]["observaciones"];?></span></td>
  </tr>
  <?php } ?>
</table>


</div><!--Fin div Examen Orina--->
</body>
</html>
<?php
$salida_html = ob_get_contents();

  //$user=$_SESSION["id_usuario"];

  ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('document', array('Attachment'=>'0'));
?>

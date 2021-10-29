<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["n_orden"];

$datos_det_orden_paciente = $reporteria->get_detalle_orden_pacs($_GET["id_paciente"],$_GET["n_orden"]);
$datos_item_examenes = $reporteria->datos_item_examenes($_GET["id_paciente"],$_GET["n_orden"]);
$get_categorias = $reporteria->get_categorias($_GET["id_paciente"],$_GET["n_orden"]);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
      html{
        margin-top: 0;
        margin-left: 28px;
        margin-right:20px; 
        margin-bottom: 0;
    }
    .stilot1{
       border: 1px solid black;
       padding: 5px;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
       border-collapse: collapse;
       text-align: center;
    }

    .stilot2{
       border: 1px solid black;
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }
    .stilot3{
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .table2 {
       border-collapse: collapse;
    }
   </style>
  </head>
  <body>

<div style="margin-top:30px;height:200px" >
  <table width="100%" class="table2">
    
    <tr>
      <?php

  for($i=0;$i<sizeof($datos_det_orden_paciente);$i++){

?>
  <td colspan="10" style="color:black;font-size:11px;font-family: Helvetica, Arial, sans-serif;width: 15%" class="stilot1">
      <img src="images/vasperoficial.jpg" width="100" height="45" />
  </td>
  <td colspan="10" style="color:black;font-size:11px;font-family: Helvetica, Arial, sans-serif;width: 15%" class="stilot1"><strong>CÓDIGO:</strong> <?php echo $datos_det_orden_paciente[$i]["cod_emp"];?></td>

    <td colspan="20" style="color:black;font-family: Helvetica, Arial, sans-serif;width: 25%" class="stilot1"><strong>NOMBRE:</strong> <?php echo $datos_det_orden_paciente[$i]["nombre"];?></td>

    <td colspan="25" style="color:black;font-family: Helvetica, Arial, sans-serif;width: 25%" class="stilot1"><strong>EMPRESA:</strong> <?php echo $datos_det_orden_paciente[$i]["empresa"];?></td>
    <td colspan="35" style="color:black;font-size:11px;font-family: Helvetica, Arial, sans-serif;width: 35%;text-transform:uppercase" class="stilot1"><strong>DEPARTAMENTO:</strong> <?php echo strtoupper(($datos_det_orden_paciente[$i]["departamento"]));?></td>
    <?php
  }
?>
</tr>
<tr>
  <td colspan="100" style="text-align: center; background:#F0F0F0" class="stilot1">EXAMENES</td>
</tr>
<tr style="height:50px;">
  <td colspan="100" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center;margin:20px;height: 75px;white-space: wrap;" align="center">
 <?php 
    for ($i=0; $i < sizeof($datos_item_examenes); $i++) {
      $id=$i+1;      
     echo "<b>".$id."."."</b>".ucfirst($datos_item_examenes[$i]["examen"])."&nbsp;&nbsp;&nbsp;";
     if($i == 5){
      echo '<br />';
    }?>
     <?php } ?>     
  </td>
  <tr>
    <td colspan="100" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center;margin:20px;white-space: wrap;text-align: justify;padding: 5px" align="center">
    
    <?php
    $recomendacion = "<strong>RECOMENDACIONES PARA RECOLECCIÓN DE MUESTRAS: </strong><br><strong>Examenes sanguineos: </strong>
Cena previa normal. Presentarse con un ayuno estricto de 12 a 14 horas. 
Puede ingerir agua si lo desea.
Si toma algun medicamento este debe ser tomado luego de haberse realizado el examen.<br><br>";

    for ($i=0; $i < sizeof($get_categorias); $i++) {

$heces = "<strong>Heces</strong>: En el recipiente color verde  boca ancha colocar una pequeña cantidad de muestra.
Con ayuda de una espatula tomar la muestra y colocar en frasco, esta muestra no tiene que tener contacto ni con el inodoro y con la orina para evitar el deterioro de parasitos.<br><br>
";
$baciloscopia ="<strong> Baciloscopia (muestra de esputo o flema): </strong>
En el recipiente transparente boca ancha tome una muestra de esputo, inspirando fuertemente y expulsando con un esfuerzo dentro de tos dentro del recipiente. 
La muestra debe ser tomada en ayunas y sin cepillarse los dientes.<br><br>
";

$exo ="<strong>Exudado faringeo</strong>
Se le tomara una muestra de la garganta llamada cepillado de garganta.
No se deben usar enjuagues bucales antisepticos antes del examen.
Se realiza en ayunas y sin haberse cepillado los dientes.<br><br>";

$orina ="<strong>Orina</strong> 
Lavar el area genital con jabon y abundante agua. Secar minuciosamente.
Se recomienda que sea la primer orina del dia.
Inicie la miccion en el baño y a mitad del chorro coloque en frasco, tapar inmediatamente. No colocar plastico, papel u otro material entre la boca del frasco y la tapadera.<br><br> 

  
";

      if ($get_categorias[$i]["categoria"]=="heces") {
        $recomendacion = $recomendacion . $heces;
      }elseif ($get_categorias[$i]["examen"]=="baciloscopia") {
        $recomendacion = $recomendacion . $baciloscopia;
      }elseif ($get_categorias[$i]["categoria"]=="orina"){
        $recomendacion = $recomendacion . $orina;
      }elseif ($get_categorias[$i]["categoria"]=="bacteriologia"){
        $recomendacion = $recomendacion . $exo;
      }
    }?>
     <?php 
     echo $recomendacion;?>
  </td>
</tr>
</table>
</div>


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
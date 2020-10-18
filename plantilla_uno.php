<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
      html{
        margin-top: 0;
        margin-left: 20px;
        margin-right:20px; 
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
<div>

<?php 
$id_paciente=109;
$item_orden = $reporteria->get_detalle_orden($id_paciente);
/*$pagina ='';
  for($i=0;$i<sizeof($item_orden);$i++){
      $pagina=$item_orden[$i]["examen"];
      require_once('examenes/'.$pagina.'.php');   
  }*/
  var_dump($item_orden);
  ?>
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
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$content = file_get_contents('examenes/orina.php');
$conten2 = file_get_contents('examenes/heces.php');
$dompdf->loadHtml($content.$conten2);

//$conten = file_get_contents('examenes/heces.php');
//$dompdf->loadHtml($conten);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
$dompdf->stream('document', array('Attachment'=>'0'));
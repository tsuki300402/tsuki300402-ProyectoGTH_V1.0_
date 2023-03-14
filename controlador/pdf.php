<?php

require_once('../vendor/autoload.php');

//esta es la plantilla cargada desde otro archivo
require_once('./mpdf/pdf/plantilla/index.php');

//css
$css = file_get_contents('./mpdf/pdf/plantilla/style.css');

$mpdf = new \Mpdf\Mpdf();

$plantilla = getplantilla();

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
$pdfContent = $mpdf->Output("","S");

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="ejemplo.pdf"');
echo $pdfContent;

?>
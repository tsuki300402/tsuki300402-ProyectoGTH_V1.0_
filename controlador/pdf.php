<?php

require_once('../vendor/autoload.php');

//esta es la plantilla cargada desde otro archivo
require_once('./mpdf/pdf/plantilla/index.php');
require_once('../configuracion/controller/conexion.php');
//css
$css = file_get_contents('./mpdf/pdf/plantilla/style.css');

$mpdf = new \Mpdf\Mpdf();
//$mpdf->setBasePath('controlador\mpdf\pdf\NielRoo_logo.png');
$plantilla = getplantilla();
$imagePath = './plantilla/NielRoo_logo.png';
$html = '
<div id="logo" class"centered-img">
<img src="'.$imagePath.'">
</div>';
$mpdf->WriteHTML($html);

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
$pdfContent = $mpdf->Output("", "S");

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Prueba.pdf"');
echo $pdfContent;

?>
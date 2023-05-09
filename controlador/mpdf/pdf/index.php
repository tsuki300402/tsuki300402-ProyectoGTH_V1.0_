<?php

require_once('../../../vendor/autoload.php');

//esta es la plantilla cargada desde otro archivo
require_once('plantilla/index.php');

//css
$css = file_get_contents('plantilla/style.css');

$mpdf = new \Mpdf\Mpdf();
//$mpdf->setBasePath('controlador\mpdf\pdf\NielRoo_logo.png');

$plantilla = getplantilla();
$imagePath = 'NielRoo_logo.png';
$html = '<div id="logo">
<img src="'.$imagePath.'">
</div>';
$mpdf->WriteHTML($html);

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();


?>
<?php
if ($_GET['mes']="a" && $_GET['ano']="a") {
    /* captura los datos */
    $mes = "a";
    $ano = "a";
}else{
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
}
use Mpdf\Mpdf;

require_once('../vendor/autoload.php');

/* codigo css */
$css = file_get_contents('plantillas/reporte/style.css');
/* plantilla */
require_once('plantillas/reporte/index.php');

/* Base de datos */
require_once('conexion.php');

$mpdf = new \Mpdf\Mpdf([
    "format" => "A4"
]);
$mpdf->SetFooter('{PAGENO}');

/* obtengo la plantilla */
$plantilla = GetPlantilla($registros);

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

/*margenes */
/* $mpdf->AddPage('L','','','','',3,1,0,3,0); */
$mpdf->Output("Reporte.pdf", "I");

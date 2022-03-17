<?php

require_once('vendor/autoload.php');

//IMportamos la plantilla html
require_once('template_Eportafolio.php');

//Importamos el codigo css de la plantilla
$css = file_get_contents('EportafolioStyles.css');

//Importamos la platilla del eportafolio
$plantillaEportafolio = getEportafolio();


//Aqui definimos los formatos qeu queremos que tenga la hoja
$mpdf = new \Mpdf\Mpdf([
    "format" => "Legal-L"     
]);

//Con esta función podemos paginar el pdf
$mpdf->SetFooter('{PAGENO}');


//Imprimimos los estilos css del pdf
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

//Imprimimos codigo html en un pdf
$mpdf->writeHtml($plantillaEportafolio, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("Eporfafolio del estudiante.pdf", "D");

?>
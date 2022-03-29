<?php

require_once('vendor/autoload.php');
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/generadorDeNombres.php";

//Aqui capturamos el id del eportafolio seleccionado por el usuario enviado por el link
if($_GET['Id_Eportafolio'] != 0){

    $idEportafolioSeleccionado = (int) $_GET['Id_Eportafolio'];

    //IMportamos la plantilla html
    require_once('template_Eportafolio.php');

    //Importamos el codigo css de la plantilla
    $css = file_get_contents('templateStyles/EportafolioStyles.css');

    //Importamos la platilla del eportafolio
    $plantillaEportafolio = getEportafolio($idEportafolioSeleccionado);


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

    //Generamos un nombre para el eportafolio del estudiante
    $generador = new generadorNombres();
    $nombreParaEportafolio = $generador->generadorDeNombres().".pdf";

    //Generamos el eportafolio en pdf
    $mpdf->Output($nombreParaEportafolio, "D");

}


?>
<?php

include "controllers/EportafolioControlador.php";

$eportafolioControla = new EportafolioControlador();

//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION EPORTAFOLIOS----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el email del destinatario de las ventanas modal para compartir un evento (boton enviar - Modal Compartir Eportafolio)
if(isset($_POST['emailDestinatario'])){

    //Capturamos los datos de los campos del formulario
    $emailDestinatario = trim($_POST['emailDestinatario']);
    $confirmacionEnvioExitoso = '<p class="indicadorSatisfactorio">* E-portafolio compartido satisfactoriamente</p><br>';

    //Compartimos el eportafolio seleccionado
    $elEportafolioFueCorrectamenteCompartido = $eportafolioControla->compartirEportafolio(0,$emailDestinatario);

    if($elEportafolioFueCorrectamenteCompartido){
        echo $confirmacionEnvioExitoso;  
    }
} 

?>
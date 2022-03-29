<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/Conexion.php";
require_once "controllers/EportafolioControlador.php";

$c = new conectar();
$conexion = $c->conexion();
$eportafolioControla = new EportafolioControlador();

//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION EPORTAFOLIOS----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//

//Capturamos el evento del boton que abre el modal de compartir eporafolio con el fin de pasar el id de un eportafolio al modal
if(isset($_POST['idEportafolioEstudianteSeleccionado'])){

    //Aqui traemos el id del eportafolio estudiantil-----------------------------------
    $idEportafolioEstudianteSeleccionado = $_POST['idEportafolioEstudianteSeleccionado'];

    $sql = "select id_usuario from tbl_usuario where id_usuario=".$idEportafolioEstudianteSeleccionado;
    $resultIdEportafolios = mysqli_query($conexion, $sql);

    $emparrayIdsEportafoliosSeleccionados = array();
    while($row =mysqli_fetch_assoc($resultIdEportafolios))
    {
        $emparrayIdsEportafoliosSeleccionados[] = $row;
    }
    echo json_encode($emparrayIdsEportafoliosSeleccionados);
    exit;
    
}

//Capturamos el id del eportafolio y el email del destinatario de las ventanas modal para compartir un evento (boton enviar - Modal Compartir Eportafolio)
if(isset($_POST['idEportafolioSeleccionado']) && isset($_POST['emailDestinatario'])){

    //Capturamos los datos de los campos del formulario
    $idEportafolioSelect = trim($_POST['idEportafolioSeleccionado']);
    $emailDestinatario = trim($_POST['emailDestinatario']);
    $confirmacionEnvioExitoso = '<p class="indicadorSatisfactorio">* E-portafolio compartido satisfactoriamente</p><br>';

    //Compartimos el eportafolio seleccionado
    $elEportafolioFueCorrectamenteCompartido = $eportafolioControla->compartirEportafolio($idEportafolioSelect, $emailDestinatario);

    if($elEportafolioFueCorrectamenteCompartido){
        echo $confirmacionEnvioExitoso;  
    }
} 

?>
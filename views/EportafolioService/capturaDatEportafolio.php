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

//Capturamos el id del eportafolio y el email del destinatario de las ventanas modal para compartir un eportafolio (boton enviar - Modal Compartir Eportafolio)
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

//Capturamos el evento del boton que publica un eportafolio para que sea visible a la coordinacion de practicas
if(isset($_POST['publicarEportafolio'])){

    //Aqui traemos el id del eportafolio estudiantil-----------------------------------
    $idEportafolioAPublicar = $_POST['IdEportafolioPublicar'];

    //Publicamos el Eportafolio
    $eportafolioControla->publicarEportafolio($idEportafolioAPublicar);

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

//Capturamos el evento del boton que oculta un eportafolio para que no sea visible a la coordinacion de practicas
if(isset($_POST['ocultarEportafolio'])){

    //Aqui traemos el id del eportafolio estudiantil-----------------------------------
    $idEportafolioAOcultar = $_POST['IdEportafolioOcultar'];

    //Ocultamos el Eportafolio
    $eportafolioControla->ocultarEportafolio($idEportafolioAOcultar);

    //Consultamos el id del link del eportafolio
    $idLinkEportafolio = (string) $eportafolioControla->evaluarSiUnEportafolioTieneLink($idEportafolioAOcultar);

    //Limpiamos los datos de drive con los que se comparte un eportafolio
    $eportafolioControla->limpiarDatosDeDivulgacionEportafolio($idEportafolioAOcultar);

    //Eliminamos el archivo que se comparte del eportafolio de drive
    $eportafolioControla->eliminarEportafolioDeDrive($idLinkEportafolio); 

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

//Capturamos el evento del boton de aplicacion del eportafolio a convocatorias
if(isset($_POST['aplicarEportafolioAUnaConvocatoria'])){

    //Capturamos los datos de los campos del formulario
    $idDeConvocatoria= trim($_POST['Id']);
    $idDelEstudianteQueAplicaConvocatoria= trim($_POST['idEstudiante']);
    $fechaDeAplicacionAConvocatoria = date('Y-m-d');

    if($eportafolioControla->aplicarEportafolio(0, $idDelEstudianteQueAplicaConvocatoria, $idDeConvocatoria, $fechaDeAplicacionAConvocatoria) == 1){

        ?>
        <h3 class="indicadorSatisfactorio">* Eportafolio aplicado satisfactoriamente</h3>  
        <?php
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }  
}

//Capturamos el evento del boton que abre el modal de detalles conovcatoria conel fin de cargar la logicapara traer el id del eportafolio al modal de compartir eportafolio
if(isset($_POST['cargarLogica'])){

    $cargarLogica = $_POST['cargarLogica'];

    if($cargarLogica == 'Si'){

        $logicaParaPasarIdParaCompartirEportafolio = '<!--Script que permite pasar el id de un eportafolio de estudiante con el fin de utilizarlo como recurso en el modal de compartir eportafolios-->
                                                <script type="text/javascript">
                                                    
                                                    $(".btnCompartirEportafolio").click(function(){
                            
                                                        var idEportafolioEstudianteSeleccionado = $(this).data("id");

                                                        function consultarIdDeEportafolioEstudiante() {
                                                            return new Promise((resolve, reject) => {
                                                                // AJAX request
                                                                $.ajax({
                                                                    url: "EportafolioService/capturaDatEportafolio.php",
                                                                    type: "post",
                                                                    data: {"idEportafolioEstudianteSeleccionado": idEportafolioEstudianteSeleccionado},
                                                                    success: function(response){
                                                                        resolve(response)
                                                                    },
                                                                    error: function (error) {
                                                                    reject(error)
                                                                    },
                                                                });
                                                            })
                                                        }

                                                        consultarIdDeEportafolioEstudiante()
                                                        .then((response) => {
                                                            var data = $.parseJSON(response)[0];
                                                            var formId = "#formularioModalCompartirEportafolio";
                                                            $.each(data, function(key, value){
                                                                $("[name="+key+"]", formId).val(value);
                                                            });
                                                        })
                                                        .catch((error) => {
                                                            console.log(error)
                                                        })

                                                    });
                                                
                                                </script>';

        echo $logicaParaPasarIdParaCompartirEportafolio;

    }
    
}

?>
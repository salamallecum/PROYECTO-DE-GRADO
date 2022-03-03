<?php
include "Conexion.php";
include "../controllers/CompetenciaControlador.php";

//Este archivo se encarga de traer de base de datos los datos de los objetos del sistema (sea Eventos, Convocatorias, Eportafolios o Competencias) 
$c = new conectar();
$conexion = $c->conexion();
$competenciaControla = new CompetenciaControlador();

//Capturamos el evento del id de un evento a editar
if(isset($_POST['idEventoEdit'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idEventoEdit = $_POST['idEventoEdit'];

    $sql = "select * from tbl_evento where id_evento=".$idEventoEdit;
    $resultEvento = mysqli_query($conexion,$sql);

    $emparrayEventos = array();
    while($row =mysqli_fetch_assoc($resultEvento))
    {
        $emparrayEventos[] = $row;
    }
    echo json_encode($emparrayEventos);
    exit;
}

//Capturamos el evento del id de una convocatoria practicas a editar
if(isset($_POST['idConvPracticasEdit'])){

    //Aqui traemos los datos de las convocatorias de practicas para su edición-----------------------------------
    $idConvPracticasEdit = $_POST['idConvPracticasEdit'];

    $sql = "select * from tbl_convocatoriapracticas where Id=".$idConvPracticasEdit;
    $resultConvPracticas = mysqli_query($conexion,$sql);

    $emparrayConvPracticas = array();
    while($row =mysqli_fetch_assoc($resultConvPracticas))
    {
        $emparrayConvPracticas[] = $row;
    }
    echo json_encode($emparrayConvPracticas);
    exit;
}

//Capturamos el evento del id de una convocatoria comite a editar
if(isset($_POST['idConvComiteEdit'])){

    //Aqui traemos los datos de las convocatorias de comite para su edición-----------------------------------
    $idConvComiteEdit = $_POST['idConvComiteEdit'];

    $sql = "select * from tbl_convocatoriacomite where Id=".$idConvComiteEdit;
    $resultConvComite = mysqli_query($conexion,$sql);

    $emparrayConvComite = array();
    while($row =mysqli_fetch_assoc($resultConvComite))
    {
        $emparrayConvComite[] = $row;
    }
    echo json_encode($emparrayConvComite);
    exit;      
}

//Capturamos el evento del id de un evento a eliminar
if(isset($_POST['idEventoElim'])){

    //Aqui traemos los datos de las competencias generales para su eliminacion-----------------------------------
    $idEventoElim = $_POST['idEventoElim'];

    $sql = "select id_evento, nombre_evento from tbl_evento where id_evento=".$idEventoElim;
    $resultCompElimEvento = mysqli_query($conexion,$sql);

    $emparrayElimEvento = array();
    while($row =mysqli_fetch_assoc($resultCompElimEvento))
    {
        $emparrayElimEvento[] = $row;
    }
    echo json_encode($emparrayElimEvento);
    exit;
}

//Capturamos el evento del id de una convocatoria comite a eliminar
if(isset($_POST['idConvocatoriaComiteElim'])){

    //Aqui traemos los datos de las convocatorias comite para su eliminacion-----------------------------------
    $idConvocatoriaComiteElim = $_POST['idConvocatoriaComiteElim'];

    $sql = "select Id, nombre_convocatoria from tbl_convocatoriacomite where Id=".$idConvocatoriaComiteElim;
    $resultConvComElim = mysqli_query($conexion,$sql);

    $emparrayElimConvComite = array();
    while($row =mysqli_fetch_assoc($resultConvComElim))
    {
        $emparrayElimConvComite[] = $row;
    }
    echo json_encode($emparrayElimConvComite);
    exit;
}

//Capturamos el evento del id de una competencia general a editar
if(isset($_POST['idCompetenciaGralEdit'])){

    //Aqui traemos los datos de las competencias generales para su edición-----------------------------------
    $idCompetenciaGralEdit = $_POST['idCompetenciaGralEdit'];

    $sql = "select id_comp_gral, codigo, nombre_comp_gral, rol from tbl_competencia_general where id_comp_gral=".$idCompetenciaGralEdit;
    $resultCompGeneral = mysqli_query($conexion,$sql);

    $emparrayCompGenerales = array();
    while($row =mysqli_fetch_assoc($resultCompGeneral))
    {
        $emparrayCompGenerales[] = $row;
    }
    echo json_encode($emparrayCompGenerales);
    exit;
}

//Capturamos el evento del id de una competencia especifica a editar
if(isset($_POST['idCompetenciaEspEdit'])){

    //Aqui traemos los datos de las competencias especificas para su edición-----------------------------------
    $idCompetenciaEspEdit = $_POST['idCompetenciaEspEdit'];

    $sql = "select * from tbl_competencia_especifica where id_comp_esp=".$idCompetenciaEspEdit;
    $resultCompEspecifica = mysqli_query($conexion,$sql);

    $emparrayCompEspecificas = array();
    while($row =mysqli_fetch_assoc($resultCompEspecifica))
    {
        $emparrayCompEspecificas[] = $row;
    }
    echo json_encode($emparrayCompEspecificas);
    exit;
}

//Capturamos el evento del id de una competencia general a eliminar
if(isset($_POST['idCompetenciaGralElim'])){

    //Aqui traemos los datos de las competencias generales para su eliminacion-----------------------------------
    $idCompetenciaGralElim = $_POST['idCompetenciaGralElim'];

    $sql = "select id_comp_gral, codigo from tbl_competencia_general where id_comp_gral=".$idCompetenciaGralElim;
    $resultCompElimGeneral = mysqli_query($conexion,$sql);

    $emparrayCompElimGenerales = array();
    while($row =mysqli_fetch_assoc($resultCompElimGeneral))
    {
        $emparrayCompElimGenerales[] = $row;
    }
    echo json_encode($emparrayCompElimGenerales);
    exit;
}

//Capturamos el evento del id de una competencia especifica a eliminar
if(isset($_POST['idCompetenciaEspElim'])){

    //Aqui traemos los datos de las competencias especificas para su eliminacion-----------------------------------
    $idCompetenciaEspElim = $_POST['idCompetenciaEspElim'];

    $sql = "select id_comp_esp, codigo from tbl_competencia_especifica where id_comp_esp=".$idCompetenciaEspElim;
    $resultCompElimEspecifica = mysqli_query($conexion,$sql);

    $emparrayCompElimEspecificas = array();
    while($row =mysqli_fetch_assoc($resultCompElimEspecifica))
    {
        $emparrayCompElimEspecificas[] = $row;
    }
    echo json_encode($emparrayCompElimEspecificas);
    exit;
}

//Capturamos el evento del id de un evento a asignar y evaluar competencias
if(isset($_POST['idEventoAsigCompetencias'])){

    //Aqui traemos el id del evento para su asignacion de competencias-----------------------------------
    $idEventoAsigCompetencias = $_POST['idEventoAsigCompetencias'];

    //Query que trae los id de los eventos para su muestreo
    $sql = "select id_evento from tbl_evento where id_evento=".$idEventoAsigCompetencias;
    $resultCompAsigEvento = mysqli_query($conexion,$sql);

    $emparrayAsigCompEvento = array();

    while($row =mysqli_fetch_assoc($resultCompAsigEvento))
    {
        $emparrayAsigCompEvento[] = $row;

    }

    echo json_encode($emparrayAsigCompEvento);

    exit;
}

//Capturamos el evento del id de la convocatoria a asignar y evaluar competencias
if(isset($_POST['idConvocatoriaAsigCompetencias'])){

    //Aqui traemos el id de la convocatoria para su asignacion de competencias-----------------------------------
    $idConvocatoriaAsigCompetencias = $_POST['idConvocatoriaAsigCompetencias'];

    //Query que trae los id de las convocatorias para su muestreo
    $sql = "select Id from tbl_convocatoriacomite where Id=".$idConvocatoriaAsigCompetencias;
    $resultCompAsigConvocatoria = mysqli_query($conexion,$sql);

    $emparrayAsigCompConvocatoria = array();

    while($row =mysqli_fetch_assoc($resultCompAsigConvocatoria))
    {
        $emparrayAsigCompConvocatoria[] = $row;

    }

    echo json_encode($emparrayAsigCompConvocatoria);

    exit;
}

//Capturamos el evento que nos permite consultar las competencias generales previamente registradas como contribucion a un evento 
if(isset($_POST['idEventoParaConsultarCompGeneralesRegistradasConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene unaasignacion de competencias previa-----------------------------------
    $idEventoParaRevisionAsigCompetenciasPrevia = $_POST['idEventoParaConsultarCompGeneralesRegistradasConAnterioridad'];

    $sql = "select compAContribuir from tbl_contribcompgenerales_actividad where id_actividad=".$idEventoParaRevisionAsigCompetenciasPrevia. " and tipo_actividad='EVENTO'";
    $resultCompPrevAsigEvento = mysqli_query($conexion,$sql);

    $arrayCompPreviasAsignadasAEvento = array();

    while($row =mysqli_fetch_assoc($resultCompPrevAsigEvento))
    {
        $arrayCompPreviasAsignadasAEvento[] = $row;

    }

    echo json_encode($arrayCompPreviasAsignadasAEvento);

    exit;
    
}

//Capturamos el evento del arreglo de competencias generales a las cuales se les evaluará sus competencias específicas para un evento (boton analizar)
if(isset($_POST['arrayCompetencias']) && isset($_POST['idEvento'])){

    $dataCompetenciasGenerales = json_decode(stripslashes($_POST['arrayCompetencias']));
    $idEvento = $_POST['idEvento'];
    $arrayCompGeneralesParaEvento = implode(",", $dataCompetenciasGenerales);
    $codigoHtml = "";

    //Aqui verificamos si ya hay un registro de competencias generales con anterioridad
    $elEventoTieneRegistroDeCompGeneralesPrevio = $competenciaControla->verificarSiElEventoTieneRegistroDeCompGenerales($idEvento);

    if($elEventoTieneRegistroDeCompGeneralesPrevio){

        //Actualizamos la seleccion de competencias generales en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompgenerales_actividad SET compAContribuir= '".$arrayCompGeneralesParaEvento."' where id_actividad=".$idEvento. " and tipo_actividad='EVENTO'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }else{

        //Insertamos la seleccion de competencias generales a la BD
        $sql = "INSERT INTO tbl_contribcompgenerales_actividad VALUES (0, $idEvento, 'EVENTO', '$arrayCompGeneralesParaEvento')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    $sqlCompEspecificas = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$arrayCompGeneralesParaEvento.")";
    $resultCompEspecificasAEvaluar = mysqli_query($conexion, $sqlCompEspecificas);
    
    foreach($resultCompEspecificasAEvaluar as $ver)
    {
        $codigoHtml = $codigoHtml.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                
                                        '<table>
                                            <tr>
                                                <td><input type="radio" name='.$ver['codigo'].' value="BAJA">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><input type="radio" name='.$ver['codigo'].' value="MEDIA">
                                                <label for="Media">Media</label></td>
                                                
                                                <td class=columnaNivelContribucion><input type="radio" name='.$ver['codigo'].' value="ALTA">
                                                <label for="Alta">Alta</label></td>

                                                <td class=columnaNivelContribucion><input type="radio" name='.$ver['codigo'].' value="N/A">
                                                <label for="No aplica">No aplica</label></td>

                                            </tr>
                                        </table>
                                        <br>';           
    }
    
    echo $codigoHtml; 
}

//Capturamos el evento del boton de asignacion de los niveles de contribucion de una competencia especifica a un evento (boton guardar niveles de contribucion)
if(isset($_POST['btnGuardarNivelesContribucionEvento'])){

    //Capturamos los datos de los campos del formulario
    $idDelEventoNivelContribCompetencias = trim($_POST['id_evento']);

    //Obtenemos el id de la seleccion de competencias generales realizada
    $idSeleccionDeCompetenciasGenerales = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($arrayCompGeneralesParaEvento);

    //Obtenemos un arreglo con los codigos de las competencias específicas a evaluar
    $arrayCodigosCompEspecificas = array();
    $arrayCodigosCompEspecificas = $competenciaControla->consultarCodigosDeCompetenciasEspecificas($arrayCompGeneralesParaEvento);
    
    foreach($arrayCodigosCompEspecificas as $codigo){

        //Capturamos los datos recibidos por cada radiobutton cuyo name es el codigo de competencia especifica
        $nivelDeContribucioncompetenciaEspEvaluada = $POST[$codigo];

        if(strlen($nivelDeContribucioncompetenciaEspEvaluada) >= 1){
            //Insertamos el nivel de contribucion de la competencia especifica a la BD
            $sql = "INSERT INTO tbl_contribcompespecificas_actividad VALUES (0, $idSeleccionDeCompetenciasGenerales, $idDelEventoNivelContribCompetencias, 'EVENTO', '$codigo', '$nivelDeContribucioncompetenciaEspEvaluada')";
            mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

            header("Location: " . $_SERVER["HTTP_REFERER"]);

        }
    }
}


?>



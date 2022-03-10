<?php
include "Conexion.php";
include "../controllers/CompetenciaControlador.php";
include "../controllers/ConvocatoriaControlador.php";
include "../controllers/EventoControlador.php";


//Este archivo se encarga de traer de base de datos los datos de los objetos del sistema (sea Eventos, Convocatorias, Eportafolios o Competencias) 
$c = new conectar();
$conexion = $c->conexion();
$competenciaControla = new CompetenciaControlador();
$convocatoriaControla = new ConvocatoriaControlador();
$eventoControla = new EventoControlador();

//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION EVENTOS----------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//

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

//Capturamos el evento del id de un evento a asignar competencias
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

//Capturamos el evento del id de un evento a evaluar competencias
if(isset($_POST['idEventoEvaluacionCompetencias'])){

    //Aqui traemos el id del evento para su asignacion de competencias-----------------------------------
    $idEventoEvaluacionCompetencias = $_POST['idEventoEvaluacionCompetencias'];

    //Query que trae los id de los eventos para su muestreo
    $sql = "select id_evento from tbl_evento where id_evento=".$idEventoEvaluacionCompetencias;
    $resultCompEvaluaEvento = mysqli_query($conexion,$sql);

    $emparrayEvaluacionCompEvento = array();

    while($row =mysqli_fetch_assoc($resultCompEvaluaEvento))
    {
        $emparrayEvaluacionCompEvento[] = $row;

    }

    echo json_encode($emparrayEvaluacionCompEvento);

    exit;
}

//Capturamos el evento que nos permite consultar las competencias generales previamente registradas como contribucion a un evento 
if(isset($_POST['idEventoParaConsultarCompGeneralesRegistradasConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene unaasignacion de competencias previa-----------------------------------
    $idEventoParaConsultarCompGeneralesRegistradasConAnterioridad = $_POST['idEventoParaConsultarCompGeneralesRegistradasConAnterioridad'];

    $sql = "select compAContribuir from tbl_contribcompgenerales_actividad where id_actividad=".$idEventoParaConsultarCompGeneralesRegistradasConAnterioridad." and tipo_actividad = 'EVENTO'";
    $resultCompGeneralesPrevRegistradasEvento = mysqli_query($conexion,$sql);

    $emparrayCompGeneralesPrevRegistradasEvento = array();
    while($row =mysqli_fetch_assoc($resultCompGeneralesPrevRegistradasEvento))
    {
        $emparrayCompGeneralesPrevRegistradasEvento[] = $row;
    }
    echo json_encode($emparrayCompGeneralesPrevRegistradasEvento);
    exit;

}

//Capturamos el evento del arreglo de competencias generales a las cuales se les evaluará sus competencias específicas para un evento (boton analizar)
if(isset($_POST['arrayCompetencias']) && isset($_POST['idEvento'])){

    $dataCompetenciasGenerales = json_decode(stripslashes($_POST['arrayCompetencias']));
    $idEvento = $_POST['idEvento'];
    $arrayCompGeneralesParaEvento = implode(",", $dataCompetenciasGenerales);
    $codigoHtml = "";
    $codigoHtmlEdicion = "";

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

    //Aqui verificamos si ya hay un evaluacion de competencias especificas con anterioridad
    $elEventoTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiElEventoTieneRegistroDeCompEspecificas($idEvento);

    $arrayCodigosDeCompEspecificasImplicadas = $competenciaControla->consultarCodigosDeCompetenciasEspecificas($arrayCompGeneralesParaEvento);
    $stringCodigosDeCompEspecificasImplicadas = implode(",", $arrayCodigosDeCompEspecificasImplicadas);
    $idDeSeleccionDeCompetenciasGenerales = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idEvento, 'EVENTO');
    $stringIdesComGeneralesDeContribucionActualizadas = $competenciaControla->consultarCompetenciasGeneralesAlasQueContribuyeUnaActividad($idEvento, 'EVENTO');

    if($elEventoTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringCodigosDeCompEspecificasImplicadas."' where id_actividad=".$idEvento. " and tipo_actividad='EVENTO'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        //Consultamos la nueva seleccion de competencias especificas para su evaluacion teniendo en cuenta el array de codigos obtenido
        $sqlCompEspActualizacion = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$stringIdesComGeneralesDeContribucionActualizadas.")";
        $resultCompEspActualizacion = mysqli_query($conexion, $sqlCompEspActualizacion);
    
        foreach($resultCompEspActualizacion as $ver)
            {
                $codigoHtmlEdicion = $codigoHtmlEdicion.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                        
                                                '<table class="contenedorRespContribucionCompEsp" id="'.$ver['codigo'].'">
                                                    <tr>
                                                        <td><input type="radio" name="'.$ver['codigo'].'" value="BAJA">
                                                        <label for="Baja">Baja</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="MEDIA">
                                                        <label for="Media">Media</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="ALTA">
                                                        <label for="Alta">Alta</label></td>
        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="N/A">
                                                        <label for="No aplica">No aplica</label></td>
        
                                                    </tr>
                                                </table>
                                                <br>';           
            }
            
        echo $codigoHtmlEdicion;

    }else{

        //Cargamos el listado de competencias especificas como formulario en blanco si el evento no tiene evaluacion de comp especificas previa o con los datos de las evaluaciones de las comp especificas previamente realizadas mediante ajax
        $sqlCompEspecificas = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$arrayCompGeneralesParaEvento.")";
        $resultCompEspecificasAEvaluar = mysqli_query($conexion, $sqlCompEspecificas);

        foreach($resultCompEspecificasAEvaluar as $ver){
                $codigoHtml = $codigoHtml.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                        
                                                '<table class="contenedorRespContribucionCompEsp" id="'.$ver['codigo'].'">
                                                    <tr>
                                                        <td><input type="radio" name="'.$ver['codigo'].'" value="BAJA">
                                                        <label for="Baja">Baja</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="MEDIA">
                                                        <label for="Media">Media</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="ALTA">
                                                        <label for="Alta">Alta</label></td>
        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="N/A">
                                                        <label for="No aplica">No aplica</label></td>
        
                                                    </tr>
                                                </table>
                                                <br>';           
            }
            
        echo $codigoHtml;
        
    }
}

//Capturamos los array para el registro de la evaluacion realizada a las competencias especificas que contribuyen a un evento
if(isset($_POST['idEventoParaGuardarContribucionCompEspecificas']) && isset($_POST['arregloCodigosCompEspecificas']) && isset($_POST['arregloNivelesContribucionCompEspecificas'])) {

    //Capturamos los datos de los campos del formulario
    $idEventoParaGuardarContribucionCompEspecificas = trim($_POST['idEventoParaGuardarContribucionCompEspecificas']);
    $arregloCodigosCompEspecificas = json_decode(stripslashes($_POST['arregloCodigosCompEspecificas']));
    $arregloNivelesContribucionCompEspecificas = json_decode(stripslashes($_POST['arregloNivelesContribucionCompEspecificas']));
    
    $confirmacionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias registrada satisfactoriamente</p><br>';
    $confirmacionEdicionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias actualizada satisfactoriamente</p><br>';

    //Convertimos los arreglos de los codigos y los niveles de contribucion a string
    $stringArregloCodigosCompEspecificas = implode(",", $arregloCodigosCompEspecificas);
    $stringArregloNivelesContribucionCompEspecificas  = implode(",", $arregloNivelesContribucionCompEspecificas);

    //Aqui verificamos si ya hay un registro de competencias especificas con anterioridad
    $elEventoTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiElEventoTieneRegistroDeCompEspecificas($idEventoParaGuardarContribucionCompEspecificas);

    if($elEventoTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringArregloCodigosCompEspecificas."', nivelesDeContribucion= '".$stringArregloNivelesContribucionCompEspecificas."' where id_actividad=".$idEventoParaGuardarContribucionCompEspecificas. " and tipo_actividad='EVENTO'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
        
        echo $confirmacionEdicionEvaluacionCompetenciasExitosa;

    }else{

        //Consultamos el id del registro que contiene la seleccion de competencias generales realizada
        $idSeleccionDeCompetenciasGenerales = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idEventoParaGuardarContribucionCompEspecificas, 'EVENTO');

        //Insertamos la evaluacion de competencias especificas a la BD
        $sql = "INSERT INTO tbl_contribcompespecificas_actividad VALUES (0, $idSeleccionDeCompetenciasGenerales, $idEventoParaGuardarContribucionCompEspecificas, 'EVENTO', '$stringArregloCodigosCompEspecificas', '$stringArregloNivelesContribucionCompEspecificas')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        //Ajustamos el atributo de publicacion del evento en la tabla eventos con el fin de que este quede publicado
        $eventoControla->publicarEvento($idEventoParaGuardarContribucionCompEspecificas);

        echo $confirmacionEvaluacionCompetenciasExitosa;

    }
}

//Capturamos el evento que nos permite consultar los codigos de las competencias especificas previamente evaluadas como contribucion a un evento 
if(isset($_POST['idEventoParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idEventoParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad = $_POST['idEventoParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'];

    $sql = "select codigosCompEspecificas from tbl_contribcompespecificas_actividad where id_actividad=".$idEventoParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'EVENTO'";
    $resultCodigosCompEspecificasPrevRegistradasEvento = mysqli_query($conexion,$sql);

    $emparrayCodigosCompEspecificasPrevRegistradasEvento = array();
    while($row =mysqli_fetch_assoc($resultCodigosCompEspecificasPrevRegistradasEvento))
    {
        $emparrayCodigosCompEspecificasPrevRegistradasEvento[] = $row;
    }
    echo json_encode($emparrayCodigosCompEspecificasPrevRegistradasEvento);
    exit;

}

//Capturamos el evento que nos permite consultar los niveles de contribucion de las competencias especificas a un evento 
if(isset($_POST['idEventoParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idEventoParaConsultarNivelesContribucionACompetenciasEspecificasRegistradosConAnterioridad = $_POST['idEventoParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'];

    $sql = "select nivelesDeContribucion from tbl_contribcompespecificas_actividad where id_actividad=".$idEventoParaConsultarNivelesContribucionACompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'EVENTO'";
    $resultNivelesContribCompEspecificasPrevRegistradasEvento = mysqli_query($conexion,$sql);

    $emparrayNivelesContribCompEspecificasPrevRegistradasEvento = array();
    while($row =mysqli_fetch_assoc($resultNivelesContribCompEspecificasPrevRegistradasEvento))
    {
        $emparrayNivelesContribCompEspecificasPrevRegistradasEvento[] = $row;
    }
    echo json_encode($emparrayNivelesContribCompEspecificasPrevRegistradasEvento);
    exit;

}





//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION CONVOCATORIAS----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
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

//Capturamos el evento del id de una convocatoria para asignar competencias
if(isset($_POST['idConvocatoriaAsigCompetencias'])){

    //Aqui traemos el id del evento para su asignacion de competencias-----------------------------------
    $idConvocatoriaAsigCompetencias = $_POST['idConvocatoriaAsigCompetencias'];

    //Query que trae los id de los eventos para su muestreo
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

//Capturamos el evento del id de una convocatoria a evaluar competencias
if(isset($_POST['idConvocatoriaEvaluacionCompetencias'])){

    //Aqui traemos el id del evento para su asignacion de competencias-----------------------------------
    $idConvocatoriaEvaluacionCompetencias = $_POST['idConvocatoriaEvaluacionCompetencias'];

    //Query que trae los id de los eventos para su muestreo
    $sql = "select Id from tbl_convocatoriacomite where Id=".$idConvocatoriaEvaluacionCompetencias;
    $resultCompEvaluaConvocatoria = mysqli_query($conexion,$sql);

    $emparrayEvaluacionCompConvocatoria = array();

    while($row =mysqli_fetch_assoc($resultCompEvaluaConvocatoria))
    {
        $emparrayEvaluacionCompConvocatoria[] = $row;

    }

    echo json_encode($emparrayEvaluacionCompConvocatoria);

    exit;
}

//Capturamos el evento que nos permite consultar las competencias generales previamente registradas como contribucion a una convocatoria
if(isset($_POST['idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad'])){

    //Aqui traemos el id de la convocatoria para verificar si tiene una asignacion de competencias previa-----------------------------------
    $idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad = $_POST['idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad'];

    $sql = "select compAContribuir from tbl_contribcompgenerales_actividad where id_actividad=".$idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad." and tipo_actividad = 'CONVOCATORIA'";
    $resultCompGeneralesPrevRegistradasConvocatoria = mysqli_query($conexion,$sql);

    $emparrayCompGeneralesPrevRegistradasConvocatoria = array();
    while($row =mysqli_fetch_assoc($resultCompGeneralesPrevRegistradasConvocatoria))
    {
        $emparrayCompGeneralesPrevRegistradasConvocatoria[] = $row;
    }
    echo json_encode($emparrayCompGeneralesPrevRegistradasConvocatoria);
    exit;

}

//Capturamos el evento del arreglo de competencias generales a las cuales se les evaluará sus competencias específicas para una convocatoria (boton analizar)
if(isset($_POST['arrayCompetencias']) && isset($_POST['idConvocatoria'])){

    $dataCompetenciasGeneralesConv = json_decode(stripslashes($_POST['arrayCompetencias']));
    $idConvocatoria = $_POST['idConvocatoria'];
    $arrayCompGeneralesParaConvocatoria = implode(",", $dataCompetenciasGeneralesConv);
    $codigoHtmlConv = "";
    $codigoHtmlConvEdicion = "";

    //Aqui verificamos si ya hay un registro de competencias generales con anterioridad
    $laConvocatoriaTieneRegistroDeCompGeneralesPrevio = $competenciaControla->verificarSiLaConvocatoriaTieneRegistroDeCompGenerales($idConvocatoria);

    if($laConvocatoriaTieneRegistroDeCompGeneralesPrevio){

        //Actualizamos la seleccion de competencias generales en el registro previamente ingresado 
        $sqlConv = "UPDATE tbl_contribcompgenerales_actividad SET compAContribuir= '".$arrayCompGeneralesParaConvocatoria."' where id_actividad=".$idConvocatoria. " and tipo_actividad='CONVOCATORIA'";
        mysqli_query($conexion, $sqlConv) or die(mysqli_error($conexion));

    }else{

        //Insertamos la seleccion de competencias generales a la BD
        $sqlInsertCGConv = "INSERT INTO tbl_contribcompgenerales_actividad VALUES (0, $idConvocatoria, 'CONVOCATORIA', '$arrayCompGeneralesParaConvocatoria')";
        mysqli_query($conexion, $sqlInsertCGConv) or die(mysqli_error($conexion));
        
    }

    //Aqui verificamos si ya hay un evaluacion de competencias especificas con anterioridad
    $laConvocatoriaTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiLaConvocatoriaTieneRegistroDeCompEspecificas($idConvocatoria);

    $arrayCodigosDeCompEspecificasImplicadasConv = $competenciaControla->consultarCodigosDeCompetenciasEspecificas($arrayCompGeneralesParaConvocatoria);
    $stringCodigosDeCompEspecificasImplicadasConv = implode(",", $arrayCodigosDeCompEspecificasImplicadasConv);
    $idDeSeleccionDeCompetenciasGeneralesConv = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idConvocatoria, 'CONVOCATORIA');
    $stringIdesComGeneralesDeContribucionActualizadasConv = $competenciaControla->consultarCompetenciasGeneralesAlasQueContribuyeUnaActividad($idConvocatoria, 'CONVOCATORIA');

    if($laConvocatoriaTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sqlCEConv = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringCodigosDeCompEspecificasImplicadasConv."' where id_actividad=".$idConvocatoria. " and tipo_actividad='CONVOCATORIA'";
        mysqli_query($conexion, $sqlCEConv) or die(mysqli_error($conexion));

        //Consultamos la nueva seleccion de competencias especificas para su evaluacion teniendo en cuenta el array de codigos obtenido
        $sqlCompEspActualizacionConvocatoria = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$stringIdesComGeneralesDeContribucionActualizadasConv.")";
        $resultCompEspActualizacionConv = mysqli_query($conexion, $sqlCompEspActualizacionConvocatoria);
    
        foreach($resultCompEspActualizacionConv as $ver)
            {
                $codigoHtmlConv = $codigoHtmlConv.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                        
                                                '<table class="contenedorRespContribucionCompEsp" id="'.$ver['codigo'].'">
                                                    <tr>
                                                        <td><input type="radio" name="'.$ver['codigo'].'" value="BAJA">
                                                        <label for="Baja">Baja</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="MEDIA">
                                                        <label for="Media">Media</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="ALTA">
                                                        <label for="Alta">Alta</label></td>
        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="N/A">
                                                        <label for="No aplica">No aplica</label></td>
        
                                                    </tr>
                                                </table>
                                                <br>';           
            }
            
        echo $codigoHtmlConv;

    }else{

        //Cargamos el listado de competencias especificas como formulario en blanco si el evento no tiene evaluacion de comp especificas previa o con los datos de las evaluaciones de las comp especificas previamente realizadas mediante ajax
        $sqlCompEspecificasConvovatoria = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$arrayCompGeneralesParaConvocatoria.")";
        $resultCompEspecificasAEvaluarConv = mysqli_query($conexion, $sqlCompEspecificasConvovatoria);

        foreach($resultCompEspecificasAEvaluarConv as $ver){
                $codigoHtmlConvEdicion = $codigoHtmlConvEdicion.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                        
                                                '<table class="contenedorRespContribucionCompEsp" id="'.$ver['codigo'].'">
                                                    <tr>
                                                        <td><input type="radio" name="'.$ver['codigo'].'" value="BAJA">
                                                        <label for="Baja">Baja</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="MEDIA">
                                                        <label for="Media">Media</label></td>
                                                        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="ALTA">
                                                        <label for="Alta">Alta</label></td>
        
                                                        <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="N/A">
                                                        <label for="No aplica">No aplica</label></td>
        
                                                    </tr>
                                                </table>
                                                <br>';           
            }
            
        echo $codigoHtmlConvEdicion;
        
    }
}

//Capturamos los array para el registro de la evaluacion realizada a las competencias especificas que contribuyen a una convocatoria
if(isset($_POST['idConvocatoriaParaGuardarContribucionCompEspecificas']) && isset($_POST['arregloCodigosCompEspecificas']) && isset($_POST['arregloNivelesContribucionCompEspecificas'])) {

    //Capturamos los datos de los campos del formulario
    $idConvocatoriaParaGuardarContribucionCompEspecificas = trim($_POST['idConvocatoriaParaGuardarContribucionCompEspecificas']);
    $arregloCodigosCompEspecificasConv = json_decode(stripslashes($_POST['arregloCodigosCompEspecificas']));
    $arregloNivelesContribucionCompEspecificasConv = json_decode(stripslashes($_POST['arregloNivelesContribucionCompEspecificas']));
    
    $confirmacionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias registrada satisfactoriamente</p><br>';
    $confirmacionEdicionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias actualizada satisfactoriamente</p><br>';

    //Convertimos los arreglos de los codigos y los niveles de contribucion a string
    $stringArregloCodigosCompEspecificasConv = implode(",", $arregloCodigosCompEspecificasConv);
    $stringArregloNivelesContribucionCompEspecificasConv  = implode(",", $arregloNivelesContribucionCompEspecificasConv);

    //Aqui verificamos si ya hay un registro de competencias especificas con anterioridad
    $laConvocatoriaTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiLaConvocatoriaTieneRegistroDeCompEspecificas($idConvocatoriaParaGuardarContribucionCompEspecificas);

    if($laConvocatoriaTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sqlCompEspConvocato = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringArregloCodigosCompEspecificasConv."', nivelesDeContribucion= '".$stringArregloNivelesContribucionCompEspecificasConv."' where id_actividad=".$idConvocatoriaParaGuardarContribucionCompEspecificas. " and tipo_actividad='CONVOCATORIA'";
        mysqli_query($conexion, $sqlCompEspConvocato) or die(mysqli_error($conexion)); 
        
        echo $confirmacionEdicionEvaluacionCompetenciasExitosa;

    }else{

        //Consultamos el id del registro que contiene la seleccion de competencias generales realizada
        $idSeleccionDeCompetenciasGeneralesCnv = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idConvocatoriaParaGuardarContribucionCompEspecificas, 'CONVOCATORIA');

        //Insertamos la evaluacion de competencias especificas a la BD
        $sqlInsConv = "INSERT INTO tbl_contribcompespecificas_actividad VALUES (0, $idSeleccionDeCompetenciasGeneralesCnv, $idConvocatoriaParaGuardarContribucionCompEspecificas, 'CONVOCATORIA', '$stringArregloCodigosCompEspecificasConv', '$stringArregloNivelesContribucionCompEspecificasConv')";
        mysqli_query($conexion, $sqlInsConv) or die(mysqli_error($conexion));

        //Ajustamos el atributo de publicacion de la convocatoria en la tabla convovcatorias comite con el fin de que este quede publicado
        $convocatoriaControla->publicarConvocatoria($idConvocatoriaParaGuardarContribucionCompEspecificas);

        echo $confirmacionEvaluacionCompetenciasExitosa;

    }
}

//Capturamos el evento que nos permite consultar los codigos de las competencias especificas previamente evaluadas como contribucion a una convocatoria
if(isset($_POST['idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id de la convocatoria para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad = $_POST['idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'];

    $sqlCodConv = "select codigosCompEspecificas from tbl_contribcompespecificas_actividad where id_actividad=".$idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'CONVOCATORIA'";
    $resultCodigosCompEspecificasPrevRegistradasConvocatoriaCom = mysqli_query($conexion,$sqlCodConv);

    $emparrayCodigosCompEspecificasPrevRegistradasConvocatoria = array();
    while($row =mysqli_fetch_assoc($resultCodigosCompEspecificasPrevRegistradasConvocatoriaCom))
    {
        $emparrayCodigosCompEspecificasPrevRegistradasConvocatoria[] = $row;
    }
    echo json_encode($emparrayCodigosCompEspecificasPrevRegistradasConvocatoria);
    exit;

}

//Capturamos el evento que nos permite consultar los niveles de contribucion de las competencias especificas a una convocatoria
if(isset($_POST['idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad = $_POST['idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'];

    $sqlNivContribConv = "select nivelesDeContribucion from tbl_contribcompespecificas_actividad where id_actividad=".$idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'CONVOCATORIA'";
    $resultNivelesContribCompEspecificasPrevRegistradasConvocatoriaCom = mysqli_query($conexion, $sqlNivContribConv);

    $emparrayNivelesContribCompEspecificasPrevRegistradasConvocatoria = array();
    while($row =mysqli_fetch_assoc($resultNivelesContribCompEspecificasPrevRegistradasConvocatoriaCom))
    {
        $emparrayNivelesContribCompEspecificasPrevRegistradasConvocatoria[] = $row;
    }
    echo json_encode($emparrayNivelesContribCompEspecificasPrevRegistradasConvocatoria);
    exit;

}































































































//Capturamos el evento del id de una convocatoria practicas a eliminar
if(isset($_POST['idConvocatoriaPracticasElim'])){

    //Aqui traemos los datos de las convocatorias comite para su eliminacion-----------------------------------
    $idConvocatoriaPracticasElim = $_POST['idConvocatoriaPracticasElim'];

    $sql = "select Id, nombre_convocatoria from tbl_convocatoriapracticas where Id=".$idConvocatoriaPracticasElim;
    $resultConvPractElim = mysqli_query($conexion,$sql);

    $emparrayElimConvPracticas = array();
    while($row =mysqli_fetch_assoc($resultConvPractElim))
    {
        $emparrayElimConvPracticas[] = $row;
    }
    echo json_encode($emparrayElimConvPracticas);
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

//Capturamos el evento del id de una convocatoria practicas para ver detalles
if(isset($_POST['idConvPracticasDetalles'])){

    //Aqui traemos los datos de las convocatorias de practicas para ver su informacion-----------------------------------
    $idConvPracticasDetalles = $_POST['idConvPracticasDetalles'];

    $sql = "select * from tbl_convocatoriapracticas where Id=".$idConvPracticasDetalles;
    $resultConvPracticasDetail = mysqli_query($conexion,$sql);   
    
    $emparrayConvPracticasDetail = array();
    while($row =mysqli_fetch_assoc($resultConvPracticasDetail))
    {
        $emparrayConvPracticasDetail[] = $row;
    }

    echo json_encode($emparrayConvPracticasDetail);
    exit;
}

//Capturamos el evento del id de una convocatoria con el fin de mostrar el boton de descarga de enunciado en el modal de detalles
if(isset($_POST['idConvPracticasEnunciado'])){

    $idConvPracticasEnunciado = $_POST['idConvPracticasEnunciado'];

    //Evaluamos si la convocatoria tiene un enunciado registrado en BD
    $laConvocatoriaTieneEnunciado = $convocatoriaControla->consultarSiConvocatoriaPracticasTieneEnunciado($idConvPracticasEnunciado);

    if($laConvocatoriaTieneEnunciado != null){
        $botonDescargaEnunciado = '<a href="logic/utils/ajaxfile.php?download='.$laConvocatoriaTieneEnunciado.'" class="btn_descargarEnunciado" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciado;
    }
}

//Capturamos el nombre del enunciado de convocatoria practicas para su descarga (boton descargar enunciado)
if(isset($_REQUEST['download'])){

    $nombreEnunciadoConvPracticasDescarga = $_REQUEST['download'];

    $rutaBase = realpath($_SERVER["DOCUMENT_ROOT"]); 
    $rutaArchivo = $rutaBase."/MockupsPandora/views/convocatoriasFiles/".$nombreEnunciadoConvPracticasDescarga;
    $type = '';

    if (is_file($rutaArchivo)) {
        
        $size = filesize($rutaArchivo);

        if (function_exists('mime_content_type')) {
            $type = mime_content_type($rutaArchivo);
        } else if (function_exists('finfo_file')) {
            $info = finfo_open(FILEINFO_MIME);
            $type = finfo_file($info, $rutaArchivo);
            finfo_close($info);
        } 

        if ($type == '') {
            $type = "application/force-download";
        }

        // Definir headers
        header("Content-Type: $type");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition: attachment; filename=".$nombreEnunciadoConvPracticasDescarga."");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $size);
        // Descargar archivo
        readfile($rutaArchivo);
    } else {
        die("El archivo ".$nombreEnunciadoConvPracticasDescarga." no existe.");
    }
    
}

//Capturamos el evento del id de una convocatoria con el fin de mostrar la imagen de una convocatoria en el modal de detalles
if(isset($_POST['idConvPracticasImagen'])){

    //Aqui traemos los datos de las convocatorias de practicas para ver su informacion-----------------------------------
    $idConvPracticasImagen = $_POST['idConvPracticasImagen'];

    //Evaluamos si la convocatoria tiene un enunciado registrado en BD
    $laConvocatoriaTieneImagen = $convocatoriaControla->consultarSiConvocatoriaPracticasTieneImagen($idConvPracticasImagen);

    if($laConvocatoriaTieneImagen != null){
        $imagenGuardadaDeLaConvocatoria = '<img class="imgConvocatoriaDetalle" src="convocatoriasImages/'.$laConvocatoriaTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaConvocatoria;
    }else{
        $imagenPorDefectoDeLaConvocatoria = '<img class="imgConvocatoriaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaConvocatoria;
    }
}

//Capturamos el evento del id de una convocatoria para asignar y evaluar competencias
if(isset($_POST['idConvocatoriaAsigCompetencias'])){

    //Aqui traemos el id del evento para su asignacion de competencias-----------------------------------
    $idConvocatoriaAsigCompetencias = $_POST['idConvocatoriaAsigCompetencias'];

    //Query que trae los id de los eventos para su muestreo
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

/*
//Capturamos el evento del arreglo de competencias generales a las cuales se les evaluará sus competencias específicas para una convocatoria (boton analizar)
if(isset($_POST['arrayCompetencias']) && isset($_POST['idConvocatoria'])){

    $dataCompetenciasGenerales = json_decode(stripslashes($_POST['arrayCompetencias']));
    $idConvocatoria = $_POST['idConvocatoria'];
    $arrayCompGeneralesParaConvocatoria = implode(",", $dataCompetenciasGenerales);
    $codigoHtml = "";

    //Aqui verificamos si ya hay un registro de competencias generales con anterioridad
    $laConvocatoriaTieneRegistroDeCompGeneralesPrevio = $competenciaControla->verificarSiLaConvocatoriaTieneRegistroDeCompGenerales($idConvocatoria);

    if($laConvocatoriaTieneRegistroDeCompGeneralesPrevio){

        //Actualizamos la seleccion de competencias generales en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompgenerales_actividad SET compAContribuir= '".$arrayCompGeneralesParaConvocatoria."' where id_actividad=".$idConvocatoria. " and tipo_actividad='CONVOCATORIA'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }else{

        //Insertamos la seleccion de competencias generales a la BD
        $sql = "INSERT INTO tbl_contribcompgenerales_actividad VALUES (0, $idConvocatoria, 'CONVOCATORIA', '$arrayCompGeneralesParaConvocatoria')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    $sqlCompEspecificasConv = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$arrayCompGeneralesParaConvocatoria.")";
    $resultCompEspecificasAEvaluarConv = mysqli_query($conexion, $sqlCompEspecificasConv);
    
    foreach($resultCompEspecificasAEvaluarConv as $ver)
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
*/













































//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION COMPETENCIAS----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
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

    //Aqui traemos los datos de las competencias generales para su eliminacion-----------------------------------
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

//Capturamos el evento del id de una competencia especifica a editar
if(isset($_POST['idCompetenciaEspEdit'])){

    //Aqui traemos los datos de las competencias especificas para su edición-----------------------------------
    $idCompetenciaEspEdit = $_POST['idCompetenciaEspEdit'];

    $sql = "select * from tbl_competencia_especifica where id_comp_esp=".$idCompetenciaEspEdit;
    $resultCompEspecifica = mysqli_query($conexion,$sql);

    $emparrayCompEspecificas = array();
    while($row = mysqli_fetch_assoc($resultCompEspecifica))
    {
        $emparrayCompEspecificas[] = $row;
    }
    echo json_encode($emparrayCompEspecificas);
    exit;
}



//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION EPORTAFOLIOS----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el email del destinatario de las ventanas modal para compartir un evento (boton enviar - Modal Compartir Eportafolio)
if(isset($_POST['emailDestinatario'])){

    //Capturamos los datos de los campos del formulario
    $emailDestinatario = trim($_POST['emailDestinatario']);
    $confirmacionEnvioExitoso = '<p class="indicadorSatisfactorio">* E-portafolio compartido satisfactoriamente</p><br>';

    //Definimos el contenido del correo electronico a enviar
    $desde = "From:". "Equipo Pandora";
    $asunto = "Asunto de prueba";
    $mensaje = "Este es un correo de prueba emitido por el sistema Pandora";
    mail($emailDestinatario, $asunto, $mensaje, $desde);

    echo $confirmacionEnvioExitoso;            
    
} 

















?>



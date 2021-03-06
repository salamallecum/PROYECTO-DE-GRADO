<?php
include "Conexion.php";
include "../controllers/CompetenciaControlador.php";
include "../controllers/ConvocatoriaControlador.php";
include "../controllers/EventoControlador.php";
include "../controllers/EstudianteControlador.php";
include "../controllers/ProfesorControlador.php";
include "../controllers/DesafioControlador.php";
include "../controllers/TrabajoControlador.php";


//Este archivo se encarga de traer de base de datos los datos de los objetos del sistema (sea Eventos, Convocatorias, Eportafolios o Competencias) 
$c = new conectar();
$conexion = $c->conexion();
$competenciaControla = new CompetenciaControlador();
$convocatoriaControla = new ConvocatoriaControlador();
$eventoControla = new EventoControlador();
$estudianteControla = new EstudianteControlador();
$profesorControla = new ProfesorControlador();
$desafioControla = new DesafioControlador();
$trabajoControla = new TrabajoControlador();

$laEvaluacionTieneCompTipoNA = false;

//----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------SECCION ESTUDIANTE-----------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el id del estudiante su clave actual y su clave nueva parahacer el cambio de contraseña
if(isset($_POST['idEstudianteLogueado']) && isset($_POST['claveActual']) && isset($_POST['claveNueva'])){

    //Capturamos los datos de los campos del formulario
    $idEstudianteLogueado = trim($_POST['idEstudianteLogueado']);
    $claveActualEst = trim($_POST['claveActual']);
    $claveNuevaEst = trim($_POST['claveNueva']);

    $confirmacionActualizacionClaveExitosa = '<p class="indicadorSatisfactorio">* Contraseña actualizada satisfactoriamente</p>';
    $confirmacionActualizacionClaveFallido = '<p class="indicadorDeCamposIncompletos">* Contraseña actual no valida</p>';

    $antiguaContraseñaEstudiante = $estudianteControla->consultarAntiguaContraseña($idEstudianteLogueado);

    if($antiguaContraseñaEstudiante == $claveActualEst){

        //Actualizamos la contraseña del profesor
        $contraseñaActualizadaCorrectamenteEstudiante = $estudianteControla->actualizarContraseña($idEstudianteLogueado, $claveNuevaEst);

        if($contraseñaActualizadaCorrectamenteEstudiante){
            echo $confirmacionActualizacionClaveExitosa;  
        }

    }else{
        echo $confirmacionActualizacionClaveFallido;
    } 
} 


//----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------SECCION PROFESOR-------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el id del profesor su clave actual y su clave nueva parahacer el cambio de contraseña
if(isset($_POST['idProfeLogueado']) && isset($_POST['claveActual']) && isset($_POST['claveNueva'])){

    //Capturamos los datos de los campos del formulario
    $idProfeLogueado = trim($_POST['idProfeLogueado']);
    $claveActual = trim($_POST['claveActual']);
    $claveNueva = trim($_POST['claveNueva']);

    $confirmacionActualizacionClaveExitosa = '<p class="indicadorSatisfactorio">* Contraseña actualizada satisfactoriamente</p>';
    $confirmacionActualizacionClaveFallido = '<p class="indicadorDeCamposIncompletos">* Contraseña actual no valida</p>';

    $antiguaContraseñaProfesor = $profesorControla->consultarAntiguaContraseña($idProfeLogueado);

    if($antiguaContraseñaProfesor == $claveActual){

        //Actualizamos la contraseña del profesor
        $contraseñaActualizadaCorrectamente = $profesorControla->actualizarContraseña($idProfeLogueado, $claveNueva);

        if($contraseñaActualizadaCorrectamente){
            echo $confirmacionActualizacionClaveExitosa;  
        }

    }else{
        echo $confirmacionActualizacionClaveFallido;
    } 
} 

//----------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------SECCION DESAFIOS----------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//

//Capturamos el evento del id de un desafio a editar
if(isset($_POST['idDesafioEdit'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idDesafioEdit = $_POST['idDesafioEdit'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioEdit;
    $resultDesafio = mysqli_query($conexion,$sql);

    $emparrayDesafios = array();
    while($row =mysqli_fetch_assoc($resultDesafio))
    {
        $emparrayDesafios[] = $row;
    }
    echo json_encode($emparrayDesafios);
    exit;
}

//Capturamos el evento del id de un desafio a eliminar
if(isset($_POST['idDesafioElim'])){

    //Aqui traemos los datos de las competencias generales para su eliminacion-----------------------------------
    $idDesafioElim = $_POST['idDesafioElim'];

    $sql = "select id_desafio, nombre_desafio from tbl_desafio where id_desafio=".$idDesafioElim;
    $resultCompElimDesafio = mysqli_query($conexion,$sql);

    $emparrayElimDesafio = array();
    while($row =mysqli_fetch_assoc($resultCompElimDesafio))
    {
        $emparrayElimDesafio[] = $row;
    }
    echo json_encode($emparrayElimDesafio);
    exit;
}

//Capturamos el evento del id de un desafio a asignar competencias
if(isset($_POST['idDesafioAsigCompetencias'])){

    //Aqui traemos el id del desafio para su asignacion de competencias-----------------------------------
    $idDesafioAsigCompetencias = $_POST['idDesafioAsigCompetencias'];

    //Query que trae los id de los desafios para su muestreo
    $sql = "select id_desafio from tbl_desafio where id_desafio=".$idDesafioAsigCompetencias;
    $resultCompAsigDesafio = mysqli_query($conexion,$sql);

    $emparrayAsigCompDesafio = array();

    while($row =mysqli_fetch_assoc($resultCompAsigDesafio))
    {
        $emparrayAsigCompDesafio[] = $row;
    }

    echo json_encode($emparrayAsigCompDesafio);

    exit;
}

//Capturamos el evento del id de un desafio a evaluar competencias
if(isset($_POST['idDesafioEvaluacionCompetencias'])){

    //Aqui traemos el id del desafio para su asignacion de competencias-----------------------------------
    $idDesafioEvaluacionCompetencias = $_POST['idDesafioEvaluacionCompetencias'];

    //Query que trae los id de los desafios para su muestreo
    $sql = "select id_desafio from tbl_desafio where id_desafio=".$idDesafioEvaluacionCompetencias;
    $resultCompEvaluaDesafio = mysqli_query($conexion,$sql);

    $emparrayEvaluacionCompDesafio = array();

    while($row =mysqli_fetch_assoc($resultCompEvaluaDesafio))
    {
        $emparrayEvaluacionCompDesafio[] = $row;

    }

    echo json_encode($emparrayEvaluacionCompDesafio);

    exit;
}

//Capturamos el evento que nos permite consultar las competencias generales previamente registradas como contribucion a un desafio 
if(isset($_POST['idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad'])){

    //Aqui traemos el id del desafio para verificar si tiene una asignacion de competencias previa-----------------------------------
    $idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad = $_POST['idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad'];

    $sql = "select compAContribuir from tbl_contribcompgenerales_actividad where id_actividad=".$idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad." and tipo_actividad = 'DESAFIO'";
    $resultCompGeneralesPrevRegistradasDesafio = mysqli_query($conexion,$sql);

    $emparrayCompGeneralesPrevRegistradasDesafio = array();
    while($row =mysqli_fetch_assoc($resultCompGeneralesPrevRegistradasDesafio))
    {
        $emparrayCompGeneralesPrevRegistradasDesafio[] = $row;
    }
    echo json_encode($emparrayCompGeneralesPrevRegistradasDesafio);
    exit;

}

//Capturamos el evento del arreglo de competencias generales a las cuales se les evaluará sus competencias específicas para un desafio (boton analizar)
if(isset($_POST['arrayCompetencias']) && isset($_POST['idDesafio'])){

    $dataCompetenciasGenerales = json_decode(stripslashes($_POST['arrayCompetencias']));
    $idDesafio = $_POST['idDesafio'];
    $arrayCompGeneralesParaDesafio = implode(",", $dataCompetenciasGenerales);
    $codigoHtml = "";
    $codigoHtmlEdicion = "";

    //Aqui verificamos si ya hay un registro de competencias generales con anterioridad
    $elDesafioTieneRegistroDeCompGeneralesPrevio = $competenciaControla->verificarSiElDesafioTieneRegistroDeCompGenerales($idDesafio);

    if($elDesafioTieneRegistroDeCompGeneralesPrevio){

        //Actualizamos la seleccion de competencias generales en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompgenerales_actividad SET compAContribuir= '".$arrayCompGeneralesParaDesafio."' where id_actividad=".$idDesafio. " and tipo_actividad='DESAFIO'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }else{

        //Insertamos la seleccion de competencias generales a la BD
        $sql = "INSERT INTO tbl_contribcompgenerales_actividad VALUES (0, $idDesafio, 'DESAFIO', '$arrayCompGeneralesParaDesafio')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
        
    }

    //Aqui verificamos si ya hay un evaluacion de competencias especificas con anterioridad
    $elDesafioTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiElDesafioTieneRegistroDeCompEspecificas($idDesafio);

    $arrayCodigosDeCompEspecificasImplicadas = $competenciaControla->consultarCodigosDeCompetenciasEspecificas($arrayCompGeneralesParaDesafio);
    $stringCodigosDeCompEspecificasImplicadas = implode(",", $arrayCodigosDeCompEspecificasImplicadas);
    $idDeSeleccionDeCompetenciasGenerales = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idDesafio, 'DESAFIO');
    $stringIdesComGeneralesDeContribucionActualizadas = $competenciaControla->consultarCompetenciasGeneralesAlasQueContribuyeUnaActividad($idDesafio, 'DESAFIO');

    if($elDesafioTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringCodigosDeCompEspecificasImplicadas."' where id_actividad=".$idDesafio. " and tipo_actividad='DESAFIO'";
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
        $sqlCompEspecificas = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_gral in(".$arrayCompGeneralesParaDesafio.")";
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

//Capturamos los array para el registro de la evaluacion realizada a las competencias especificas que contribuyen a un desafio
if(isset($_POST['idDesafioParaGuardarContribucionCompEspecificas']) && isset($_POST['arregloCodigosCompEspecificas']) && isset($_POST['arregloNivelesContribucionCompEspecificas'])) {

    //Capturamos los datos de los campos del formulario
    $idDesafioParaGuardarContribucionCompEspecificas = trim($_POST['idDesafioParaGuardarContribucionCompEspecificas']);
    $arregloCodigosCompEspecificas = json_decode(stripslashes($_POST['arregloCodigosCompEspecificas']));
    $arregloNivelesContribucionCompEspecificas = json_decode(stripslashes($_POST['arregloNivelesContribucionCompEspecificas']));
    
    $confirmacionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias registrada satisfactoriamente</p><br>';
    $confirmacionEdicionEvaluacionCompetenciasExitosa = '<p class="indicadorSatisfactorio">* Evaluación de competencias actualizada satisfactoriamente</p><br>';

    //Convertimos los arreglos de los codigos y los niveles de contribucion a string
    $stringArregloCodigosCompEspecificas = implode(",", $arregloCodigosCompEspecificas);
    $stringArregloNivelesContribucionCompEspecificas  = implode(",", $arregloNivelesContribucionCompEspecificas);

    //Aqui verificamos si ya hay un registro de competencias especificas con anterioridad
    $elDesafioTieneRegistroDeCompEspecificasPrevio = $competenciaControla->verificarSiElDesafioTieneRegistroDeCompEspecificas($idDesafioParaGuardarContribucionCompEspecificas);

    if($elDesafioTieneRegistroDeCompEspecificasPrevio){

        //Actualizamos la seleccion de competencias especificas en el registro previamente ingresado 
        $sql = "UPDATE tbl_contribcompespecificas_actividad SET codigosCompEspecificas= '".$stringArregloCodigosCompEspecificas."', nivelesDeContribucion= '".$stringArregloNivelesContribucionCompEspecificas."' where id_actividad=".$idDesafioParaGuardarContribucionCompEspecificas. " and tipo_actividad='DESAFIO'";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
        
        echo $confirmacionEdicionEvaluacionCompetenciasExitosa;

    }else{

        //Consultamos el id del registro que contiene la seleccion de competencias generales realizada
        $idSeleccionDeCompetenciasGenerales = $competenciaControla->consultarIdDeSeleccionDeCompetenciasGenerales($idDesafioParaGuardarContribucionCompEspecificas, 'DESAFIO');

        //Insertamos la evaluacion de competencias especificas a la BD
        $sql = "INSERT INTO tbl_contribcompespecificas_actividad VALUES (0, $idSeleccionDeCompetenciasGenerales, $idDesafioParaGuardarContribucionCompEspecificas, 'DESAFIO', '$stringArregloCodigosCompEspecificas', '$stringArregloNivelesContribucionCompEspecificas')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        //Ajustamos el atributo de publicacion del desafio en la tabla desafios con el fin de que este quede publicado
        $desafioControla->publicarDesafio($idDesafioParaGuardarContribucionCompEspecificas);

        echo $confirmacionEvaluacionCompetenciasExitosa;

    }
}

//Capturamos el evento que nos permite consultar los codigos de las competencias especificas previamente evaluadas como contribucion a un desafio
if(isset($_POST['idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad = $_POST['idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad'];

    $sql = "select codigosCompEspecificas from tbl_contribcompespecificas_actividad where id_actividad=".$idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'DESAFIO'";
    $resultCodigosCompEspecificasPrevRegistradasDesafio = mysqli_query($conexion,$sql);

    $emparrayCodigosCompEspecificasPrevRegistradasDesafio = array();
    while($row =mysqli_fetch_assoc($resultCodigosCompEspecificasPrevRegistradasDesafio))
    {
        $emparrayCodigosCompEspecificasPrevRegistradasDesafio[] = $row;
    }
    echo json_encode($emparrayCodigosCompEspecificasPrevRegistradasDesafio);
    exit;

}

//Capturamos el evento que nos permite consultar los niveles de contribucion de las competencias especificas a un desafio
if(isset($_POST['idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'])){

    //Aqui traemos el id del evento para verificar si tiene una evaluación de competencias previa-----------------------------------
    $idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad = $_POST['idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad'];

    $sql = "select nivelesDeContribucion from tbl_contribcompespecificas_actividad where id_actividad=".$idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad." and tipo_actividad = 'DESAFIO'";
    $resultNivelesContribCompEspecificasPrevRegistradasDesafio = mysqli_query($conexion,$sql);

    $emparrayNivelesContribCompEspecificasPrevRegistradasDesafio = array();
    while($row =mysqli_fetch_assoc($resultNivelesContribCompEspecificasPrevRegistradasDesafio))
    {
        $emparrayNivelesContribCompEspecificasPrevRegistradasDesafio[] = $row;
    }
    echo json_encode($emparrayNivelesContribCompEspecificasPrevRegistradasDesafio);
    exit;

}

//Capturamos el evento del id de un desafio para ver detalles
if(isset($_POST['idDesafioDetalles'])){

    //Aqui traemos los datos de los desafios para ver su informacion-----------------------------------
    $idDesafioDetalles = $_POST['idDesafioDetalles'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioDetalles;
    $resultDesafioDetail = mysqli_query($conexion,$sql);   
    
    $emparrayDesafioDetail = array();
    while($row =mysqli_fetch_assoc($resultDesafioDetail))
    {
        $emparrayDesafioDetail[] = $row;
    }

    echo json_encode($emparrayDesafioDetail);
    exit;
}

//Capturamos el evento del id de un desafio con el fin de mostrar su imagen en el modal de detalles del mismo 
if(isset($_POST['idImagenDesafioPropuesta'])){

    //Aqui traemos los datos del desafio para ver su informacion-----------------------------------
    $idImagenDesafioPropuesta = $_POST['idImagenDesafioPropuesta'];

    //Evaluamos si el desafio tiene imagen registrada en BD
    $elDesafTieneImagen = $desafioControla->consultarNombreImagenDesafio($idImagenDesafioPropuesta);

    if($elDesafTieneImagen != null){
        $imagenGuardadaDeDesafio = '<img class="imgPropuestaDetalle" src="desafiosImages/'.$elDesafTieneImagen.'" alt="">';
        echo $imagenGuardadaDeDesafio;
    }else{
        $imagenPorDefectoDeDesafio = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeDesafio;
    }  
}

//Capturamos el evento del id de un desafio con el fin de mostrar su enunciado en el modal de detalles del mismo 
if(isset($_POST['idEnunciadoDesafioPropuesta'])){

    //Aqui traemos los datos del desafio para ver su informacion-----------------------------------
    $idEnunciadoDesafioPropuesta = $_POST['idEnunciadoDesafioPropuesta'];

    //Evaluamos si el desafio tiene enunciado registrado en BD
    $elDesafTieneEnunciado = $desafioControla->consultarNombreEnunciadoDesafio($idEnunciadoDesafioPropuesta);

    if($elDesafTieneEnunciado != null){
        $botonDescargaEnunciado = '<a href="logic/utils/ajaxfile.php?downloadEnunDesafio='.$elDesafTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciado;
    }
}

//Capturamos el nombre del enunciado de un desafio para su descarga (boton descargar enunciado)
if(isset($_REQUEST['downloadEnunDesafio'])){

    $nombreEnunciadoDesafioDescarga = $_REQUEST['downloadEnunDesafio'];

    $rutaBase = realpath($_SERVER["DOCUMENT_ROOT"]); 
    $rutaArchivo = $rutaBase."/MockupsPandora/views/desafiosFiles/".$nombreEnunciadoDesafioDescarga ;
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
        header("Content-Disposition: attachment; filename=".$nombreEnunciadoDesafioDescarga."");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $size);
        // Descargar archivo
        readfile($rutaArchivo);
    } else {
        die("El archivo ".$nombreEnunciadoDesafioDescarga ." no existe.");
    }
    
}

//Capturamos el evento del id de un desafio para ver su informacion en modal de aplicacion de desafios"
if(isset($_POST['idDesafioAAplicar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idDesafioAAplicar = $_POST['idDesafioAAplicar'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioAAplicar;
    $resultAplicacionDesafioDetail = mysqli_query($conexion,$sql);   
    
    $emparrayAplicacionDesafioDetail = array();
    while($row =mysqli_fetch_assoc($resultAplicacionDesafioDetail))
    {
        $emparrayAplicacionDesafioDetail[] = $row;
    }

    echo json_encode($emparrayAplicacionDesafioDetail);
    exit;
}

//Capturamos el evento del id de un profesor para ver su informacion personal en modal de aplicacion de desafios"
if(isset($_POST['idProfesorDesafioAAplicar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idProfesorDesafioAAplicar = $_POST['idProfesorDesafioAAplicar'];

    $sql = "select * from tbl_usuario where id_usuario=".$idProfesorDesafioAAplicar;
    $resultInfoProfesorDesafioDetail = mysqli_query($conexion,$sql);   
    
    $emparrayInfoProfesorDesafioDetail = array();
    while($row =mysqli_fetch_assoc($resultInfoProfesorDesafioDetail))
    {
        $emparrayInfoProfesorDesafioDetail[] = $row;
    }

    echo json_encode($emparrayInfoProfesorDesafioDetail);
    exit;
}

//Capturamos el evento del id de un desafio con el fin de mostrar su imagen en el modal de alicacion a un desafio
if(isset($_POST['idDesafioAAplicarImagen'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idDesafioAAplicarImagen = $_POST['idDesafioAAplicarImagen'];

    //Evaluamos si la propuesta tiene una imagen registrada en BD
    $elDesafioAplTieneImagen = $desafioControla->consultarNombreImagenDesafio($idDesafioAAplicarImagen);

    if($elDesafioAplTieneImagen != null){
        $imagenGuardadaDelDesafApl = '<img class="imgPropuestaDetalle" src="desafiosImages/'.$elDesafioAplTieneImagen.'" alt="">';
        echo $imagenGuardadaDelDesafApl;
    }else{
        $imagenPorDefectoDeLaPropApl = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaPropApl;
    }
}

if(isset($_POST['idDesafioAAplicarEnunciado'])){

    $idDesafioAAplicarEnunciado = $_POST['idDesafioAAplicarEnunciado'];

    //Evaluamos si el desafio personalizado tiene un enunciado registrado en BD
    $elDesafioAplTieneEnunciado = $desafioControla->consultarNombreEnunciadoDesafio($idDesafioAAplicarEnunciado);

    if($elDesafioAplTieneEnunciado  != null){
        $botonDescargaEnunciadoAApl = '<a href="logic/utils/ajaxfile.php?downloadEnunDesafio='.$elDesafioAplTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciadoAApl;
    }
}










//----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------SECCION DESAFIOS PERSONALIZADOS----------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el evento del id de un desafio personalizado a editar
if(isset($_POST['idPropuestaEdit'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idPropuestaEdit = $_POST['idPropuestaEdit'];

    $sql = "select * from tbl_desafiopersonal where Id=".$idPropuestaEdit;
    $resultDesafioPer = mysqli_query($conexion,$sql);

    $emparrayDesafiosPersonales = array();
    while($row =mysqli_fetch_assoc($resultDesafioPer))
    {
        $emparrayDesafiosPersonales[] = $row;
    }
    echo json_encode($emparrayDesafiosPersonales);
    exit;
}

//Capturamos el evento del id de un desafio a eliminar
if(isset($_POST['idPropuestaElim'])){

    //Aqui traemos los datos de las competencias generales para su eliminacion-----------------------------------
    $idPropuestaElim = $_POST['idPropuestaElim'];

    $sql = "select Id, nombre_desafioP from tbl_desafiopersonal where Id=".$idPropuestaElim;
    $resultElimPropuesta = mysqli_query($conexion,$sql);

    $emparrayPropuestasAEliminar = array();
    while($row =mysqli_fetch_assoc($resultElimPropuesta))
    {
        $emparrayPropuestasAEliminar[] = $row;
    }
    echo json_encode($emparrayPropuestasAEliminar);
    exit;
}

//Capturamos el evento del id de una propuesta para para ver sus detalles en estado "Por revisar"
if(isset($_POST['idPropuestaDetallesModalPorRevisar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaDetallesModalPorRevisar = $_POST['idPropuestaDetallesModalPorRevisar'];

    $sql = "select * from tbl_desafiopersonal where Id=".$idPropuestaDetallesModalPorRevisar;
    $resultPropuestaDetail = mysqli_query($conexion,$sql);   
    
    $emparrayPropuestaDetail = array();
    while($row =mysqli_fetch_assoc($resultPropuestaDetail))
    {
        $emparrayPropuestaDetail[] = $row;
    }

    echo json_encode($emparrayPropuestaDetail);
    exit;
}

//Capturamos el evento del id de una propuesta con el fin de mostrar su imagen en el modal de detalles (Estado por revisar)
if(isset($_POST['idPropuestaImagenPorRevisar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaImagenPorRevisar = $_POST['idPropuestaImagenPorRevisar'];

    //Evaluamos si la propuesta tiene una imagen registrada en BD
    $laPropTieneImagen = $desafioControla->consultarSiLaPropuestaTieneImagen($idPropuestaImagenPorRevisar);

    if($laPropTieneImagen != null){
        $imagenGuardadaDeLaProp = '<img class="imgPropuestaDetalle" src="desafiosPerImages/'.$laPropTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaProp;
    }else{
        $imagenPorDefectoDeLaProp = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaProp;
    }
}

//Capturamos el id de un estudiante que propone un desafio personalizado para ver su informacion personal en el modal de detalles
if(isset($_POST['idEstudianteQProponeParaModal'])){

    //Aqui traemos los datos del estudiante para ver su informacion-----------------------------------
    $idEstudianteQProponeParaModal = $_POST['idEstudianteQProponeParaModal'];

    $sql = "select * from tbl_usuario where id_usuario=".$idEstudianteQProponeParaModal;
    $resultEstudiantePropuestaDetail = mysqli_query($conexion,$sql);   
    
    $emparrayEstudiantePropuestaDetail = array();
    while($row =mysqli_fetch_assoc($resultEstudiantePropuestaDetail))
    {
        $emparrayEstudiantePropuestaDetail[] = $row;
    }

    echo json_encode($emparrayEstudiantePropuestaDetail);
    exit;
}

//Capturamos el id del desafio que se pretende sustituir con el desafio personalizado y ver su informacion en el modal de detalles de una propuesta en estado "Por revisar"
if(isset($_POST['idDesafioQSePretendeSustituirParaModalPorRevisar'])){

    //Aqui traemos los datos del desafio para ver su informacion-----------------------------------
    $idDesafioQSePretendeSustituirParaModalPorRevisar = $_POST['idDesafioQSePretendeSustituirParaModalPorRevisar'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioQSePretendeSustituirParaModalPorRevisar;
    $resultDesafioPropuestaDetailPR = mysqli_query($conexion,$sql);   
    
    $emparrayDesafioPropuestaDetailPR = array();
    while($row =mysqli_fetch_assoc($resultDesafioPropuestaDetailPR))
    {
        $emparrayDesafioPropuestaDetailPR[] = $row;
    }

    echo json_encode($emparrayDesafioPropuestaDetailPR);
    exit;
}

//Capturamos el id del desafio que se pretende sustituir con el desafio personalizado y ver su informacion en el modal de detalles de desafio
if(isset($_POST['idDesafioQSePretendeSustituirParaModalDetallesDesafio'])){

    //Aqui traemos los datos del desafio para ver su informacion-----------------------------------
    $idDesafioQSePretendeSustituirParaModalDetallesDesafio = $_POST['idDesafioQSePretendeSustituirParaModalDetallesDesafio'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioQSePretendeSustituirParaModalDetallesDesafio;
    $resultDetallesDesafioDetail = mysqli_query($conexion,$sql);   
    
    $emparrayDetallesDesafioDetail = array();
    while($row =mysqli_fetch_assoc($resultDetallesDesafioDetail))
    {
        $emparrayDetallesDesafioDetail[] = $row;
    }

    echo json_encode($emparrayDetallesDesafioDetail);
    exit;
}

//Capturamos el evento del id de un desafio personalizado con el fin de mostrar el boton de descarga de enunciado en el modal de detalles de una propuesta en estado "Por revisar"
if(isset($_POST['idPropuestaParaBuscarEnunciado'])){

    $idPropuestaParaBuscarEnunciado = $_POST['idPropuestaParaBuscarEnunciado'];

    //Evaluamos si el desafio personalizado tiene un enunciado registrado en BD
    $laPropuestaTieneEnunciado = $desafioControla->consultarSiLaPropuestaTieneEnunciado($idPropuestaParaBuscarEnunciado);

    if($laPropuestaTieneEnunciado != null){
        $botonDescargaEnunciado = '<a href="logic/utils/ajaxfile.php?downloadEnunPropuesta='.$laPropuestaTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciado;
    }
}

//Capturamos el nombre del enunciado de un desafio personalizado o propuesta para su descarga (boton descargar enunciado)
if(isset($_REQUEST['downloadEnunPropuesta'])){

    $nombreEnunciadoPropuestaDesPersonalizadoDescarga = $_REQUEST['downloadEnunPropuesta'];

    $rutaBase = realpath($_SERVER["DOCUMENT_ROOT"]); 
    $rutaArchivo = $rutaBase."/MockupsPandora/views/desafiosPerFiles/".$nombreEnunciadoPropuestaDesPersonalizadoDescarga;
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
        header("Content-Disposition: attachment; filename=".$nombreEnunciadoPropuestaDesPersonalizadoDescarga."");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $size);
        // Descargar archivo
        readfile($rutaArchivo);
    } else {
        die("El archivo ".$nombreEnunciadoPropuestaDesPersonalizadoDescarga." no existe.");
    }
}

//Capturamos el id de la propuesta a aprobar y sus comentarios (boton Aprobar - Modal Propuesta por revisar)
if(isset($_POST['propuestaAAprobar']) && isset($_POST['observaciones'])){

    //Capturamos los datos de los campos del formulario
    $idPropuestaAAprobarSelect = trim($_POST['propuestaAAprobar']);
    $observacionesAprobacion = trim($_POST['observaciones']);

    //Aprobamos la propuesta 
    $desafioControla->aprobarPropuesta($idPropuestaAAprobarSelect, $observacionesAprobacion);

} 

//Capturamos el id de la propuesta a rechazar y sus comentarios de realimentación (boton Rechazar - Modal Propuesta por revisar)
if(isset($_POST['propuestaARechazar']) && isset($_POST['comentariosDeMejora'])){

    //Capturamos los datos de los campos del formulario
    $idPropuestaARechazarSelect = trim($_POST['propuestaARechazar']);
    $observacionesDeMejora = trim($_POST['comentariosDeMejora']);

    //Rechazamos la propuesta 
    $desafioControla->rechazarPropuesta($idPropuestaARechazarSelect, $observacionesDeMejora);

} 

//Capturamos el evento del id de una propuesta para para ver sus detalles en estado "Aprobada"
if(isset($_POST['idPropuestaDetallesModalAprobada'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaDetallesModalAprobada = $_POST['idPropuestaDetallesModalAprobada'];

    $sql = "select * from tbl_desafiopersonal where Id=".$idPropuestaDetallesModalAprobada;
    $resultPropuestaAprobDetail = mysqli_query($conexion,$sql);   
    
    $emparrayPropuestaAprobDetail = array();
    while($row =mysqli_fetch_assoc($resultPropuestaAprobDetail))
    {
        $emparrayPropuestaAprobDetail[] = $row;
    }

    echo json_encode($emparrayPropuestaAprobDetail);
    exit;
}

//Capturamos el evento del id de una propuesta con el fin de mostrar su imagen en el modal de detalles (Estado Aprobada)
if(isset($_POST['idPropuestaImagenAprobada'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaImagenAprobada = $_POST['idPropuestaImagenAprobada'];

    //Evaluamos si la propuesta tiene una imagen registrada en BD
    $laPropTieneImagen = $desafioControla->consultarSiLaPropuestaTieneImagen($idPropuestaImagenAprobada);

    if($laPropTieneImagen != null){
        $imagenGuardadaDeLaProp = '<img class="imgPropuestaDetalle" src="desafiosPerImages/'.$laPropTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaProp;
    }else{
        $imagenPorDefectoDeLaProp = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaProp;
    }
}

//Capturamos el id del desafio que se pretende sustituir con el desafio personalizado y ver su informacion en el modal de detalles de una propuesta en estado "Aprobada"
if(isset($_POST['idDesafioQSePretendeSustituirParaModalAprobada'])){

    //Aqui traemos los datos del desafio para ver su informacion-----------------------------------
    $idDesafioQSePretendeSustituirParaModalAprobada = $_POST['idDesafioQSePretendeSustituirParaModalAprobada'];

    $sql = "select * from tbl_desafio where id_desafio=".$idDesafioQSePretendeSustituirParaModalAprobada;
    $resultDesafioPropuestaAprobadaDetail = mysqli_query($conexion,$sql);   
    
    $emparrayDesafioPropuestaAprobadaDetail = array();
    while($row =mysqli_fetch_assoc($resultDesafioPropuestaAprobadaDetail))
    {
        $emparrayDesafioPropuestaAprobadaDetail[] = $row;
    }

    echo json_encode($emparrayDesafioPropuestaAprobadaDetail);
    exit;
}

//Capturamos el evento del id de una propuesta para para ver sus detalles en estado "Rechazada"
if(isset($_POST['idPropuestaDetallesModalRechazada'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaDetallesModalRechazada = $_POST['idPropuestaDetallesModalRechazada'];

    $sql = "select * from tbl_desafiopersonal where Id=".$idPropuestaDetallesModalRechazada;
    $resultPropuestaRechazDetail = mysqli_query($conexion,$sql);   
    
    $emparrayPropuestaRechazDetail = array();
    while($row =mysqli_fetch_assoc($resultPropuestaRechazDetail))
    {
        $emparrayPropuestaRechazDetail[] = $row;
    }

    echo json_encode($emparrayPropuestaRechazDetail);
    exit;
}

//Capturamos el evento del id de una propuesta para ver su informacion en modal de aplicacion a propuestas"
if(isset($_POST['idPropuestaAAplicar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaAAplicar = $_POST['idPropuestaAAplicar'];

    $sql = "select * from tbl_desafiopersonal where Id=".$idPropuestaAAplicar;
    $resultAplicacionPropuestaDetail = mysqli_query($conexion,$sql);   
    
    $emparrayAplicacionPropuestaDetail = array();
    while($row =mysqli_fetch_assoc($resultAplicacionPropuestaDetail))
    {
        $emparrayAplicacionPropuestaDetail[] = $row;
    }

    echo json_encode($emparrayAplicacionPropuestaDetail);
    exit;
}

//Capturamos el evento del id de una propuesta con el fin de mostrar su imagen en el modal de alicacion a una propuesta
if(isset($_POST['idPropuestaAAplicarImagen'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idPropuestaAAplicarImagen = $_POST['idPropuestaAAplicarImagen'];

    //Evaluamos si la propuesta tiene una imagen registrada en BD
    $laPropAplTieneImagen = $desafioControla->consultarSiLaPropuestaTieneImagen($idPropuestaAAplicarImagen);

    if($laPropAplTieneImagen != null){
        $imagenGuardadaDeLaPropApl = '<img class="imgPropuestaDetalle" src="desafiosPerImages/'.$laPropAplTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaPropApl;
    }else{
        $imagenPorDefectoDeLaPropApl = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaPropApl;
    }
}

if(isset($_POST['idPropuestaAAplicarEnunciado'])){

    $idPropuestaAAplicarEnunciado = $_POST['idPropuestaAAplicarEnunciado'];

    //Evaluamos si el desafio personalizado tiene un enunciado registrado en BD
    $laPropuestaAplTieneEnunciado = $desafioControla->consultarSiLaPropuestaTieneEnunciado($idPropuestaAAplicarEnunciado);

    if($laPropuestaAplTieneEnunciado != null){
        $botonDescargaEnunciadoAApl = '<a href="logic/utils/ajaxfile.php?downloadEnunPropuesta='.$laPropuestaAplTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciadoAApl;
    }
}



//----------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------SECCION TRABAJOS DESTACADOS--------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//

//Capturamos el evento del id de un trabajo destacado a editar
if(isset($_POST['idTrabajoEdit'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idTrabajoEdit = $_POST['idTrabajoEdit'];

    $sql = "select * from tbl_trabajodestacado where Id_trabajo=".$idTrabajoEdit;
    $resultTrabajoDest = mysqli_query($conexion,$sql);

    $emparrayTrabajos = array();
    while($row =mysqli_fetch_assoc($resultTrabajoDest))
    {
        $emparrayTrabajos[] = $row;
    }
    echo json_encode($emparrayTrabajos);
    exit;
}

//Capturamos el evento del id de un trabajo destacado a eliminar
if(isset($_POST['idTrabajoElim'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idTrabajoElim = $_POST['idTrabajoElim'];

    $sql = "select * from tbl_trabajodestacado where Id_trabajo=".$idTrabajoElim;
    $resultTrabajoDestEl = mysqli_query($conexion,$sql);

    $emparrayTrabajos = array();
    while($row =mysqli_fetch_assoc($resultTrabajoDestEl))
    {
        $emparrayTrabajos[] = $row;
    }
    echo json_encode($emparrayTrabajos);
    exit;
}

//Capturamos el evento del id de un trabajo destacado para ver sus detalles al momento de evaluarlo
if(isset($_POST['idTrabajoAEvaluar'])){

    //Aqui traemos los datos de los eventos para su edición-----------------------------------
    $idTrabajoAEvaluar = $_POST['idTrabajoAEvaluar'];

    $sql = "select * from tbl_trabajodestacado where Id_trabajo=".$idTrabajoAEvaluar;
    $resultTrabajoDestEv = mysqli_query($conexion,$sql);

    $emparrayDatosTrabajoAEvaluar = array();
    while($row =mysqli_fetch_assoc($resultTrabajoDestEv))
    {
        $emparrayDatosTrabajoAEvaluar[] = $row;
    }
    echo json_encode($emparrayDatosTrabajoAEvaluar);
    exit;
}

//Capturamos el evento del id de un trabajo con el fin de mostrar su imagen en el modal de detalles del mismo 
if(isset($_POST['idImagenTrabajoAEvaluar'])){

    //Aqui traemos los datos del trabajo para ver su informacion-----------------------------------
    $idImagenTrabajoAEvaluar = $_POST['idImagenTrabajoAEvaluar'];

    //Evaluamos si el trabajo tiene imagen registrada en BD
    $elTrabajoTieneImagen = $trabajoControla->consultarNombreImagenTrabajoDestacado($idImagenTrabajoAEvaluar);

    if($elTrabajoTieneImagen != null){
        $imagenGuardadaDeTrabajo = '<img class="imgPropuestaDetalle" src="trabajosImages/'.$elTrabajoTieneImagen.'" alt="">';
        echo $imagenGuardadaDeTrabajo;
    }else{
        $imagenPorDefectoDeTrabajo = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeTrabajo;
    }  
}

//Capturamos el evento del id de un trabajo con el fin de mostrar sus evidencias en el modal de detalles del mismo 
if(isset($_POST['idEvidenciasTrabajoAEvaluar'])){

    //Aqui traemos los datos del trabajo para ver su informacion-----------------------------------
    $idEvidenciasTrabajoAEvaluar = $_POST['idEvidenciasTrabajoAEvaluar'];

    //Evaluamos si el trabajo tiene un link de documento registrado en BD
    $elTrabajoTieneLinkDeDocumento = $trabajoControla->consultarLinkDocumentoTrabajoDestacado($idEvidenciasTrabajoAEvaluar);

    //Evaluamos si el trabajo tiene un link de video registrado en BD
    $elTrabajoTieneLinkDeVideo = $trabajoControla->consultarLinkVideoTrabajoDestacado($idEvidenciasTrabajoAEvaluar);

    //Evaluamos si el trabajo tiene un link de repositorio registrado en BD
    $elTrabajoTieneLinkDeRepositorio = $trabajoControla->consultarLinkRepoCodigoTrabajoDestacado($idEvidenciasTrabajoAEvaluar);

    //Evaluamos si el trabajo tiene un link de presentacion registrado en BD
    $elTrabajoTieneLinkDePresentacion = $trabajoControla->consultarLinkPresentacionTrabajoDestacado($idEvidenciasTrabajoAEvaluar);

    if($elTrabajoTieneLinkDeDocumento != null){
        $linkDeDocumento = '<a href="'.$elTrabajoTieneLinkDeDocumento.'" target="_blank" title="'.$elTrabajoTieneLinkDeDocumento.'"><img src="assets/images/btn_evidenc_documento.PNG"></a>';
        echo $linkDeDocumento;
    }

    if($elTrabajoTieneLinkDeVideo != null){
        $linkDeVideo = '<a href="'.$elTrabajoTieneLinkDeVideo.'" target="_blank" title="'.$elTrabajoTieneLinkDeVideo.'"><img src="assets/images/btn_evidenc_video.png"></a>';
        echo $linkDeVideo;
    }   

    if($elTrabajoTieneLinkDeRepositorio != null){
        $linkDeRepositorio = '<a href="'.$elTrabajoTieneLinkDeRepositorio.'" target="_blank" title="'.$elTrabajoTieneLinkDeRepositorio.'"><img src="assets/images/btn_evidenc_repocodigo.png"></a>';
        echo $linkDeRepositorio;
    }

    if($elTrabajoTieneLinkDePresentacion != null){
        $linkDePresentacion = '<a href="'.$elTrabajoTieneLinkDePresentacion.'" target="_blank" title="'.$elTrabajoTieneLinkDePresentacion.'"><img src="assets/images/btn_evidenc_presentacion.png"></a>';
        echo $linkDePresentacion;
    }

}

//Capturamos el evento del id de un estudiante para ver su informacion personal en modal del trabajo aplicado"
if(isset($_POST['idEstudianteTrabajoAplicado'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idEstudianteTrabajoAplicado = $_POST['idEstudianteTrabajoAplicado'];

    $sql = "select * from tbl_usuario where id_usuario=".$idEstudianteTrabajoAplicado;
    $resultInfoEstudianteTrabajoAplicado = mysqli_query($conexion,$sql);   
    
    $emparrayInfoDelEstudianteQueAplicoTrabajo = array();
    while($row =mysqli_fetch_assoc($resultInfoEstudianteTrabajoAplicado))
    {
        $emparrayInfoDelEstudianteQueAplicoTrabajo[] = $row;
    }

    echo json_encode($emparrayInfoDelEstudianteQueAplicoTrabajo);
    exit;
}


















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

//Capturamos el evento del id de un evento para ver su informacion en modal de aplicacion de eventos"
if(isset($_POST['idEventoAAplicar'])){

    //Aqui traemos los datos del evento para ver su informacion-----------------------------------
    $idEventoAAplicar = $_POST['idEventoAAplicar'];

    $sql = "select * from tbl_evento where id_evento=".$idEventoAAplicar;
    $resultAplicacionEventoDetail = mysqli_query($conexion,$sql);   
    
    $emparrayAplicacionEventoDetail = array();
    while($row =mysqli_fetch_assoc($resultAplicacionEventoDetail))
    {
        $emparrayAplicacionEventoDetail[] = $row;
    }

    echo json_encode($emparrayAplicacionEventoDetail);
    exit;
}

//Capturamos el evento del id de un profesor para ver su informacion personal en modal de aplicacion de eventos"
if(isset($_POST['idProfesorEventoAAplicar'])){

    //Aqui traemos los datos del evento para ver su informacion-----------------------------------
    $idProfesorEventoAAplicar = $_POST['idProfesorEventoAAplicar'];

    $sql = "select * from tbl_usuario where id_usuario=".$idProfesorEventoAAplicar;
    $resultInfoProfesorEventoDetail = mysqli_query($conexion,$sql);   
    
    $emparrayInfoProfesorEventoDetail = array();
    while($row =mysqli_fetch_assoc($resultInfoProfesorEventoDetail))
    {
        $emparrayInfoProfesorEventoDetail[] = $row;
    }

    echo json_encode($emparrayInfoProfesorEventoDetail);
    exit;
}

//Capturamos el evento del id de un evento con el fin de mostrar su imagen en el modal de alicacion a un evento
if(isset($_POST['idEventoAAplicarImagen'])){

    //Aqui traemos los datos del evento para ver su informacion-----------------------------------
    $idEventoAAplicarImagen = $_POST['idEventoAAplicarImagen'];

    //Evaluamos si el evento tiene una imagen registrada en BD
    $elEventoAplTieneImagen = $eventoControla->consultarNombreImagenEvento($idEventoAAplicarImagen);

    if($elEventoAplTieneImagen != null){
        $imagenGuardadaDelEvApl = '<img class="imgPropuestaDetalle" src="eventosImages/'.$elEventoAplTieneImagen.'" alt="">';
        echo $imagenGuardadaDelEvApl;
    }else{
        $imagenPorDefectoDeLaPropApl = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaPropApl;
    }
}

//Capturamos el evento del id de un evento con el fin de mostrar su enunciado en el modal de alicacion a un evento
if(isset($_POST['idEventoAAplicarEnunciado'])){

    $idEventoAAplicarEnunciado = $_POST['idEventoAAplicarEnunciado'];

    //Evaluamos si el evento tiene un enunciado registrado en BD
    $elEventoAplTieneEnunciado = $eventoControla->consultarNombreEnunciadoEvento($idEventoAAplicarEnunciado);

    if($elEventoAplTieneEnunciado  != null){
        $botonDescargaEnunciadoAApl = '<a href="logic/utils/ajaxfile.php?downloadEnunEvento='.$elEventoAplTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciadoAApl;
    }
}

//Capturamos el nombre del enunciado de convocatoria practicas para su descarga (boton descargar enunciado)
if(isset($_REQUEST['downloadEnunEvento'])){

    $nombreEnunciadoEventoDescarga = $_REQUEST['downloadEnunEvento'];

    $rutaBase = realpath($_SERVER["DOCUMENT_ROOT"]); 
    $rutaArchivo = $rutaBase."/MockupsPandora/views/eventosFiles/".$nombreEnunciadoEventoDescarga;
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
        header("Content-Disposition: attachment; filename=".$nombreEnunciadoEventoDescarga."");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $size);
        // Descargar archivo
        readfile($rutaArchivo);
    } else {
        die("El archivo ".$nombreEnunciadoEventoDescarga." no existe.");
    }
    
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

//Capturamos el evento del id de una convocatoria con el fin de consultar los eportafolios que fueron aplicados a una convocatoria practicas
if(isset($_POST['idConvPracticasEportafoliosAplicados'])){

    $idConvPracticasEportafoliosAplicados = $_POST['idConvPracticasEportafoliosAplicados'];

    //Evaluamos si la convocatoria tiene eportafolios aplicados para su revisión
    $laConvocatoriaTieneEportafoliosPostulados = $convocatoriaControla->consultarSiConvocatoriaPracticasTieneEportafoliosPostulados($idConvPracticasEportafoliosAplicados);

    if($laConvocatoriaTieneEportafoliosPostulados){

        //Consultamos los Ids de los eportafolios de los estudiantes
        $arrayIdsEportafoliosEstudiantes = $convocatoriaControla->consultarIdsEportafoliosEstudiantilesPostuladosAUnaConvocatoria($idConvPracticasEportafoliosAplicados);
        //Pasamos el array de los id de eportafolios de los estudiantes a string
        $stringIdsEportafoliosEstudiantes = implode(",", $arrayIdsEportafoliosEstudiantes);

        $labelfotoEstudiante = "";

        //Consultamos los datos personales de los estudiantes para su muestreo en la tabla de eportafolios
        $sqlDatEstudiante = "SELECT id_usuario, nombres_usuario, apellidos_usuario, foto_usuario from tbl_usuario where id_usuario in($stringIdsEportafoliosEstudiantes)";
        $datosEstudiante = $estudianteControla->mostrarDatosEstudiante($sqlDatEstudiante);
        foreach ($datosEstudiante as $key){

            $tableEportafoliosPostuladosP1 = '<table class="filasDeDatosTablaEportafolios">
                                                <tr>';

                                                    //Aqui traemos la foto de perfil del estudiante para la tabla de eportafolios postulados
                                                    if($key['foto_usuario'] != null){
                                                        $labelfotoEstudiante = '<td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla" src="profileImages/'.$key['foto_usuario'].'"></td>';
                                                    }else{
                                                        $labelfotoEstudiante = '<td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                    }

                                                
                    $tableEportafoliosPostuladosP2 = '<td class="datoTabla">'.$key['nombres_usuario'].'</td>
                                                    <td class="datoTabla">'.$key['apellidos_usuario'].'</td>
                                                    <td class="datoTabla"><div class="compEsp-edicion">
                                                        <div class="col-botonesEdicion">
                                                            <a href="template_Eportafolio.php?Id_estudiante='.$key['id_usuario'].'" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                        </div>

                                                        <div id="col-botonesEdicion" class="col-botonesEdicion">
                                                            <a class="btnCompartirEportafolio" data-id="'.$key['id_usuario'].'" data-bs-toggle="modal" data-bs-target="#modalCompartirEportafolio" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                        </div>

                                                    </div></td>
                                                </tr>
                                            </table>';   
                                        
            echo $tableEportafoliosPostuladosP1;
            echo $labelfotoEstudiante;
            echo $tableEportafoliosPostuladosP2;
        }
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

//Capturamos el evento del id de una convocatoria comite para ver su informacion en modal de aplicacion a convocatorias"
if(isset($_POST['idConvComAAplicar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idConvComAAplicar = $_POST['idConvComAAplicar'];

    $sql = "select * from tbl_convocatoriacomite where Id=".$idConvComAAplicar;
    $resultAplicacionConvComDetail = mysqli_query($conexion,$sql);   
    
    $emparrayAplicacionConvComDetail = array();
    while($row =mysqli_fetch_assoc($resultAplicacionConvComDetail))
    {
        $emparrayAplicacionConvComDetail[] = $row;
    }

    echo json_encode($emparrayAplicacionConvComDetail);
    exit;
}

//Capturamos el evento del id de una convocatoria comite con el fin de mostrar su imagen en el modal de alicacion a una convocatoria
if(isset($_POST['idConvComAAplicarImagen'])){

    //Aqui traemos los datos de la convocatoria para ver su informacion-----------------------------------
    $idConvComAAplicarImagen = $_POST['idConvComAAplicarImagen'];

    //Evaluamos si la convocatoria tiene una imagen registrada en BD
    $laConvComAplTieneImagen = $convocatoriaControla->consultarNombreImagenConvocatoriaComite($idConvComAAplicarImagen);

    if($laConvComAplTieneImagen != null){
        $imagenGuardadaDeLaConvComApl = '<img class="imgPropuestaDetalle" src="convocatoriasImages/'.$laConvComAplTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaConvComApl;
    }else{
        $imagenPorDefectoDeLaPropApl = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaPropApl;
    }
}

if(isset($_POST['idConvComAAplicarEnunciado'])){

    $idConvComAAplicarEnunciado = $_POST['idConvComAAplicarEnunciado'];

    //Evaluamos si la convocatoria comite tiene un enunciado registrado en BD
    $laConvComAplTieneEnunciado = $convocatoriaControla->consultarNombreEnunciadoConvocatoriaComite($idConvComAAplicarEnunciado);

    if($laConvComAplTieneEnunciado != null){
        $botonDescargaEnunciadoAApl = '<a href="logic/utils/ajaxfile.php?download='.$laConvComAplTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciadoAApl;
    }
}

//Capturamos el evento del id de un profesor para ver su informacion personal en modal de aplicacion de convocatorias"
if(isset($_POST['idProfesorConvocatoriaAAplicar'])){

    //Aqui traemos los datos de la convocatoria para ver su informacion-----------------------------------
    $idProfesorConvocatoriaAAplicar = $_POST['idProfesorConvocatoriaAAplicar'];

    $sql = "select * from tbl_usuario where id_usuario=".$idProfesorConvocatoriaAAplicar;
    $resultInfoProfesorConvocatoriaDetail = mysqli_query($conexion,$sql);   
    
    $emparrayInfoProfesorConvocatoriaDetail = array();
    while($row =mysqli_fetch_assoc($resultInfoProfesorConvocatoriaDetail))
    {
        $emparrayInfoProfesorConvocatoriaDetail[] = $row;
    }

    echo json_encode($emparrayInfoProfesorConvocatoriaDetail);
    exit;
}

//Capturamos el evento del id de una convocatoria practicas para ver su informacion en modal de aplicacion a convocatorias"
if(isset($_POST['idConvPracticasAAplicar'])){

    //Aqui traemos los datos de la propuesta para ver su informacion-----------------------------------
    $idConvPracticasAAplicar = $_POST['idConvPracticasAAplicar'];

    $sql = "select * from tbl_convocatoriapracticas where Id=".$idConvPracticasAAplicar;
    $resultAplicacionConvPracDetail = mysqli_query($conexion,$sql);   
    
    $emparrayAplicacionConvPracDetail = array();
    while($row =mysqli_fetch_assoc($resultAplicacionConvPracDetail))
    {
        $emparrayAplicacionConvPracDetail[] = $row;
    }

    echo json_encode($emparrayAplicacionConvPracDetail);
    exit;
}

//Capturamos el evento del id de una convocatoria practicas con el fin de mostrar su imagen en el modal de alicacion a una convocatoria
if(isset($_POST['idConvPracticasAAplicarImagen'])){

    //Aqui traemos los datos de la convocatoria para ver su informacion-----------------------------------
    $idConvPracticasAAplicarImagen = $_POST['idConvPracticasAAplicarImagen'];

    //Evaluamos si la convocatoria tiene una imagen registrada en BD
    $laConvPracAplTieneImagen = $convocatoriaControla->consultarNombreImagenConvocatoriaPracticas($idConvPracticasAAplicarImagen);

    if($laConvPracAplTieneImagen != null){
        $imagenGuardadaDeLaConvPracApl = '<img class="imgPropuestaDetalle" src="convocatoriasImages/'.$laConvPracAplTieneImagen.'" alt="">';
        echo $imagenGuardadaDeLaConvPracApl;
    }else{
        $imagenPorDefectoDeLaPropApl = '<img class="imgPropuestaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">';
        echo $imagenPorDefectoDeLaPropApl;
    }
}

if(isset($_POST['idConvPracAAplicarEnunciado'])){

    $idConvPracAAplicarEnunciado = $_POST['idConvPracAAplicarEnunciado'];

    //Evaluamos si la convocatoria practicas tiene un enunciado registrado en BD
    $laConvPracAplTieneEnunciado = $convocatoriaControla->consultarNombreEnunciadoConvocatoriaPracticas($idConvPracAAplicarEnunciado);

    if($laConvPracAplTieneEnunciado != null){
        $botonDescargaEnunciadoAApl = '<a href="logic/utils/ajaxfile.php?download='.$laConvPracAplTieneEnunciado.'" class="btn_agregarDesafio" title="Descargar enunciado">Descargar Enunciado</a><br><br>';
        echo $botonDescargaEnunciadoAApl;
    }
}


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
//--------------------------------------------------SECCION EVALUACION DE TRABAJOS-------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------//
//Capturamos el evento del tipo de actividad para así mostrar las actividades del profesor existentes para ese tipo en la tabla de actividades
if(isset($_POST['comboTipoActividad']) && isset($_POST['idDelProfesor'])){

    $comboTipoActividad = $_POST['comboTipoActividad'];
    $idDelProfesor = $_POST['idDelProfesor'];

    //obtenemos un array con los desafios que ha creado un profesor
    $arrayDesafiosQueTieneUnProfesor = $desafioControla->consultarDesafiosCreadosPorUnProfesor($idDelProfesor);
    $stringDesafiosQueTieneUnProfesor = implode(",", $arrayDesafiosQueTieneUnProfesor);

    if($comboTipoActividad == 'desafio'){

        $tableDesafiosConTrabajosP1 = "";
        $labelImagenDelDesafio = "";
        $tableDesafiosConTrabajosP2 = "";

        //Consultamos los datos principales de los desafios para su muestreo en la tabla de actividades
        $sqlDatDesafios = "SELECT id_desafio, nombre_desafio, nombre_imagen from tbl_desafio where id_profesor=".$idDelProfesor;
        $datosDesafios = $desafioControla->mostrarDatosDesafios($sqlDatDesafios);
        foreach ($datosDesafios as $key){

            $datosConteoDesafios = $profesorControla->contadorDeAplicacionesAActividades($key['id_desafio'], 'DESAFIO');
            
            $tableDesafiosConTrabajosP1 = '<!--Aqui van los registros de la tabla de desafios eventos y convocatorias-->
                                            <table class="filasDeDatosTablaDesafios">
                                                <tr>';

                                                    //Aqui traemos la imagen del desafio para la tabla de actividades
                                                    if($key['nombre_imagen'] != null){
                                                        $labelImagenDelDesafio = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="desafiosImages/'.$key['nombre_imagen'].'"></td>';
                                                    }else{
                                                        $labelImagenDelDesafio = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                    }

                                        
                        $tableDesafiosConTrabajosP2 = '<td class="datoTabla">'.$key['nombre_desafio'].'</td>
                                                    <td class="datoTabla">'.$datosConteoDesafios.'</td>
                                                    <td class="datoTabla"><div class="compEsp-edicion">

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnDetallesDesafio" onclick="funcionesParaGestionDesafio()" data-id="'.$key['id_desafio'].'" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafio" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                        </div>

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnListarTrabajosDestacadosDesafio" data-id="'.$key['id_desafio'].'" title="Ver trabajos"><img src="assets/images/folder_trabajosPresentados.png"></a> 
                                                        </div>
                                                    </div></td>
                                                </tr>
                                            </table>';
               
            echo $tableDesafiosConTrabajosP1;
            echo $labelImagenDelDesafio;
            echo $tableDesafiosConTrabajosP2;
        }
        
    } if($comboTipoActividad == 'despersonal'){

        $tableDesafiosPersonalConTrabajosP1 = "";
        $labelImagenDelDesafioPersonal = "";
        $tableDesafiosPersonalConTrabajosP2 = "";

        //Consultamos los datos principales de los desafios personalizados para su muestreo en la tabla de actividades
        $sqlDatDesafiosPer = "SELECT Id, Id_estudiante, nombre_desafioP, nombre_imagen, idDesafioASustituir from tbl_desafiopersonal where idDesafioASustituir in ($stringDesafiosQueTieneUnProfesor) and estado='Aprobada'";
        $datosDesafiosPers = $desafioControla->mostrarDatosDesafios($sqlDatDesafiosPer);
        foreach ($datosDesafiosPers as $key){

            $datosConteoDesafiosPersonalizados = $profesorControla->contadorDeAplicacionesAActividades($key['Id'], 'DESAF PERSONAL');
            
            $tableDesafiosPersonalConTrabajosP1 = '<!--Aqui van los registros de la tabla de desafios eventos y convocatorias-->
                                                    <table class="filasDeDatosTablaDesafios">
                                                        <tr>';

                                                            //Aqui traemos la imagen del desafio para la tabla de actividades
                                                            if($key['nombre_imagen'] != null){
                                                                $labelImagenDelDesafioPersonal = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="desafiosPerImages/'.$key['nombre_imagen'].'"></td>';
                                                            }else{
                                                                $labelImagenDelDesafioPersonal = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                            }

                                                
                                $tableDesafiosPersonalConTrabajosP2 = '<td class="datoTabla">'.$key['nombre_desafioP'].'</td>
                                                            <td class="datoTabla">'.$datosConteoDesafiosPersonalizados.'</td>
                                                            <td class="datoTabla"><div class="compEsp-edicion">

                                                                <div class="col-botonesEdicion">
                                                                    <a class="btnDetallesPropuesta" onclick="funcionesParaGestionDesafiosPersonalizados()" data-id="'.$key['Id'].'" data-desafio="'.$key['idDesafioASustituir'].'" data-estudiante="'.$key['Id_estudiante'].'" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuesta" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                                </div>

                                                                <div class="col-botonesEdicion">
                                                                    <a class="btnListarTrabajosDestacadosPropuesta" data-id="'.$key['Id'].'" title="Ver trabajos"><img src="assets/images/folder_trabajosPresentados.png"></a> 
                                                                </div>
                                                            </div></td>
                                                        </tr>
                                                    </table>';
               
            echo $tableDesafiosPersonalConTrabajosP1;
            echo $labelImagenDelDesafioPersonal;
            echo $tableDesafiosPersonalConTrabajosP2;
        }
    }

    if($comboTipoActividad == 'evento'){      
    
        $tableEventosConTrabajosP1 = "";
        $labelImagenDelEvento = "";
        $tableEventosConTrabajosP2 = "";

        //Consultamos los datos principales de los eventos para su muestreo en la tabla de actividades
        $sqlDatEventos = "SELECT id_evento, nombre_evento, nombre_imagen from tbl_evento where id_usuario=".$idDelProfesor;
        $datosEventos = $eventoControla->mostrarDatosEventos($sqlDatEventos);
        foreach ($datosEventos as $key){

            $datosConteoEventos = $profesorControla->contadorDeAplicacionesAActividades($key['id_evento'], 'EVENTO');
            
            $tableEventosConTrabajosP1 = '<!--Aqui van los registros de la tabla de desafios eventos y convocatorias-->
                                            <table class="filasDeDatosTablaDesafios">
                                                <tr>';

                                                    //Aqui traemos la imagen del desafio para la tabla de actividades
                                                    if($key['nombre_imagen'] != null){
                                                        $labelImagenDelEvento = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="eventosImages/'.$key['nombre_imagen'].'"></td>';
                                                    }else{
                                                        $labelImagenDelEvento = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                    }

                                        
                        $tableEventosConTrabajosP2 = '<td class="datoTabla">'.$key['nombre_evento'].'</td>
                                                    <td class="datoTabla">'.$datosConteoEventos.'</td>
                                                    <td class="datoTabla"><div class="compEsp-edicion">

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnDetallesEvento" onclick="funcionesParaGestionEventos()" data-id="'.$key['id_evento'].'" data-bs-toggle="modal" data-bs-target="#modalDetallesEvento" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                        </div>

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnListarTrabajosDestacadosEvento" data-id="'.$key['id_evento'].'" title="Ver trabajos"><img src="assets/images/folder_trabajosPresentados.png"></a> 
                                                        </div>
                                                    </div></td>
                                                </tr>
                                            </table>';
               
            echo $tableEventosConTrabajosP1;
            echo $labelImagenDelEvento;
            echo $tableEventosConTrabajosP2;
        }

    }

    if($comboTipoActividad == 'convocatoria'){      
    
        $tableConvocatoriaConTrabajosP1 = "";
        $labelImagenDeConvocatoria = "";
        $tableConvocatoriaConTrabajosP2 = "";

        //Consultamos los datos principales de las convocatorias para su muestreo en la tabla de actividades
        $sqlDatConvocatorias = "SELECT Id, nombre_convocatoria, nombre_imagen from tbl_convocatoriacomite where id_usuario=".$idDelProfesor;
        $datosConvocatorias = $convocatoriaControla->mostrarDatosConvocatorias($sqlDatConvocatorias);
        foreach ($datosConvocatorias as $key){

            $datosConteoConvocatorias = $profesorControla->contadorDeAplicacionesAActividades($key['Id'], 'CONVOCATORIA');
            
            $tableConvocatoriaConTrabajosP1 = '<!--Aqui van los registros de la tabla de desafios eventos y convocatorias-->
                                            <table class="filasDeDatosTablaDesafios">
                                                <tr>';

                                                    //Aqui traemos la imagen del desafio para la tabla de actividades
                                                    if($key['nombre_imagen'] != null){
                                                        $labelImagenDeConvocatoria = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="convocatoriasImages/'.$key['nombre_imagen'].'"></td>';
                                                    }else{
                                                        $labelImagenDeConvocatoria = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                    }

                                        
                        $tableConvocatoriaConTrabajosP2 = '<td class="datoTabla">'.$key['nombre_convocatoria'].'</td>
                                                    <td class="datoTabla">'.$datosConteoConvocatorias.'</td>
                                                    <td class="datoTabla"><div class="compEsp-edicion">

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnDetallesConvocatoria" onclick="funcionesParaGestionConvocatorias()" data-id="'.$key['Id'].'" data-bs-toggle="modal" data-bs-target="#modalDetallesConvocatoria" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                        </div>

                                                        <div class="col-botonesEdicion">
                                                            <a class="btnListarTrabajosDestacadosConvocatoria" data-id="'.$key['Id'].'" title="Ver trabajos"><img src="assets/images/folder_trabajosPresentados.png"></a> 
                                                        </div>
                                                    </div></td>
                                                </tr>
                                            </table>';
               
            echo $tableConvocatoriaConTrabajosP1;
            echo $labelImagenDeConvocatoria;
            echo $tableConvocatoriaConTrabajosP2;
        }

    }
    
}

//Capturamos el id de un desafio con el fin de traer los trabajos destacados que fueron postulados al mismo a la tabla de trabajos
if(isset($_POST['idDesafioParaConsultarSusTrabajosAplicados'])){

    $idDesafioParaConsultarSusTrabajosAplicados = $_POST['idDesafioParaConsultarSusTrabajosAplicados'];
    $idDesafioNumerico = (int) $idDesafioParaConsultarSusTrabajosAplicados;

    //obtenemos un array con los id de los trabajos destacados que tiene postulado un desafio determinado
    $arrayTrabajosQueTieneAplicadosUnDesafio = $desafioControla->consultarTrabajosDestacadosAplicadosAUnDesafio($idDesafioParaConsultarSusTrabajosAplicados);
    $stringTrabajosQueTieneAplicadosUnDesafio = implode(",", $arrayTrabajosQueTieneAplicadosUnDesafio);

    //Consultamos los datos principales de los trabajos para su muestreo en la tabla de trabajos
    $sqlDatTrabajosDelDesafio = "SELECT * from tbl_trabajodestacado where Id_trabajo in (".$stringTrabajosQueTieneAplicadosUnDesafio.")";
    $datosTrabajosDelDesafio = $trabajoControla->mostrarDatosTrabajosDestacados($sqlDatTrabajosDelDesafio);

    if($datosTrabajosDelDesafio != null){

        foreach ($datosTrabajosDelDesafio as $key){

            $tableTrabajosDelDesafioP1 = '<!--Aqui van los registros de la tabla de trabajos para los desafios-->
                                                <table class="filasDeDatosTablaTrabajos">
                                                    <tr>';
    
                                                        //Aqui traemos la imagen del trabajo para la tabla de trabajos
                                                        if($key['nombre_imagentrabajo'] != null){
                                                            $labelImagenDelTrabajoDelDesafio = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="trabajosImages/'.$key['nombre_imagentrabajo'].'"></td>';
                                                        }else{
                                                            $labelImagenDelTrabajoDelDesafio = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                        }
                            
                          $tableTrabajosDelDesafioP2 = '<td class="datoTabla">'.$key['nombre_trabajo'].'</td>
                                                        <td class="datoTabla"><div class="compEsp-edicion">
    
                                                            <div class="col-botonesEdicion">
                                                                <a class="btnDetallesTrabajoAplicadoADesafio" onclick="funcionesParaRevisionDeTrabajosAplicadosADesafios()" data-id="'.$key['Id_trabajo'].'" data-estudiante="'.$key['Id_estudiante'].'" data-desafio="'.$idDesafioNumerico.'" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoADesafio" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                            </div>
    
                                                        </div></td>
                                                    </tr>
                                                </table>';
    
            echo $tableTrabajosDelDesafioP1;
            echo $labelImagenDelTrabajoDelDesafio;
            echo $tableTrabajosDelDesafioP2;
    
        }
    }
}


//Capturamos el id de un desafio personalizado con el fin de traer los trabajos destacados que fueron postulados al mismo a la tabla de trabajos
if(isset($_POST['idPropuestaParaConsultarSusTrabajosAplicados'])){

    $idPropuestaParaConsultarSusTrabajosAplicados = $_POST['idPropuestaParaConsultarSusTrabajosAplicados'];

    //obtenemos un array con los id de los trabajos destacados que tiene postulado un desafio personalizado determinado
    $arrayTrabajosQueTieneAplicadosUnaPropuesta= $desafioControla->consultarTrabajosDestacadosAplicadosAUnaPropuesta($idPropuestaParaConsultarSusTrabajosAplicados);
    $stringTrabajosQueTieneAplicadosUnaPropuesta = implode(",", $arrayTrabajosQueTieneAplicadosUnaPropuesta);

    //Consultamos los datos principales de los trabajos para su muestreo en la tabla de trabajos
    $sqlDatTrabajosDeLaPropuesta = "SELECT * from tbl_trabajodestacado where Id_trabajo in (".$stringTrabajosQueTieneAplicadosUnaPropuesta.")";
    $datosTrabajosDeLaPropuesta = $trabajoControla->mostrarDatosTrabajosDestacados($sqlDatTrabajosDeLaPropuesta);

    if($datosTrabajosDeLaPropuesta != null){

        foreach ($datosTrabajosDeLaPropuesta as $key){

            $tableTrabajosDePropuestaP1 = '<!--Aqui van los registros de la tabla de trabajos para los desafios-->
                                                <table class="filasDeDatosTablaTrabajos">
                                                    <tr>';
    
                                                        //Aqui traemos la imagen del trabajo para la tabla de trabajos
                                                        if($key['nombre_imagentrabajo'] != null){
                                                            $labelImagenDelTrabajoDeLaPropuesta = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="trabajosImages/'.$key['nombre_imagentrabajo'].'"></td>';
                                                        }else{
                                                            $labelImagenDelTrabajoDeLaPropuesta = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                        }
                            
                          $tableTrabajosDePropuestaP2 = '<td class="datoTabla">'.$key['nombre_trabajo'].'</td>
                                                        <td class="datoTabla"><div class="compEsp-edicion">
    
                                                            <div class="col-botonesEdicion">
                                                                <a class="btnDetallesTrabajoAplicadoAPropuesta" onclick="funcionesParaRevisionDeTrabajosAplicadosAPropuestas()" data-id="'.$key['Id_trabajo'].'" data-estudiante="'.$key['Id_estudiante'].'" data-propuesta="'.$idPropuestaParaConsultarSusTrabajosAplicados.'" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAPropuesta" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                            </div>
    
                                                        </div></td>
                                                    </tr>
                                                </table>';
    
            echo $tableTrabajosDePropuestaP1;
            echo $labelImagenDelTrabajoDeLaPropuesta;
            echo $tableTrabajosDePropuestaP2;
    
        }
    }
}

//Capturamos el id de un evento con el fin de traer los trabajos destacados que fueron postulados al mismo a la tabla de trabajos
if(isset($_POST['idEventoParaConsultarSusTrabajosAplicados'])){

    $idEventoParaConsultarSusTrabajosAplicados = $_POST['idEventoParaConsultarSusTrabajosAplicados'];

    //obtenemos un array con los id de los trabajos destacados que tiene postulado un evento determinado
    $arrayTrabajosQueTieneAplicadosUnEvento= $eventoControla->consultarTrabajosDestacadosAplicadosAUnEvento($idEventoParaConsultarSusTrabajosAplicados);
    $stringTrabajosQueTieneAplicadosUnEvento = implode(",", $arrayTrabajosQueTieneAplicadosUnEvento);

    //Consultamos los datos principales de los trabajos para su muestreo en la tabla de trabajos
    $sqlDatTrabajosDelEvento = "SELECT * from tbl_trabajodestacado where Id_trabajo in (".$stringTrabajosQueTieneAplicadosUnEvento.")";
    $datosTrabajosDelEvento = $trabajoControla->mostrarDatosTrabajosDestacados($sqlDatTrabajosDelEvento);

    if($datosTrabajosDelEvento != null){

        foreach ($datosTrabajosDelEvento as $key){

            $tableTrabajosDeEventoP1 = '<!--Aqui van los registros de la tabla de trabajos para los desafios-->
                                                <table class="filasDeDatosTablaTrabajos">
                                                    <tr>';
    
                                                        //Aqui traemos la imagen del trabajo para la tabla de trabajos
                                                        if($key['nombre_imagentrabajo'] != null){
                                                            $labelImagenDelTrabajoDelEvento = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="trabajosImages/'.$key['nombre_imagentrabajo'].'"></td>';
                                                        }else{
                                                            $labelImagenDelTrabajoDelEvento = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                        }
                            
                          $tableTrabajosDeEventoP2 = '<td class="datoTabla">'.$key['nombre_trabajo'].'</td>
                                                        <td class="datoTabla"><div class="compEsp-edicion">
    
                                                            <div class="col-botonesEdicion">
                                                                <a class="btnDetallesTrabajoAplicadoAEvento" onclick="funcionesParaRevisionDeTrabajosAplicadosAEventos()" data-id="'.$key['Id_trabajo'].'" data-estudiante="'.$key['Id_estudiante'].'" data-evento="'.$idEventoParaConsultarSusTrabajosAplicados.'" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAEvento" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                            </div>
    
                                                        </div></td>
                                                    </tr>
                                                </table>';
    
            echo $tableTrabajosDeEventoP1;
            echo $labelImagenDelTrabajoDelEvento;
            echo $tableTrabajosDeEventoP2;
    
        }
    }
}

//Capturamos el id de una convocatoria con el fin de traer los trabajos destacados que fueron postulados al mismo a la tabla de trabajos
if(isset($_POST['idConvocatoriaParaConsultarSusTrabajosAplicados'])){

    $idConvocatoriaParaConsultarSusTrabajosAplicados = $_POST['idConvocatoriaParaConsultarSusTrabajosAplicados'];

    //obtenemos un array con los id de los trabajos destacados que tiene postulada una convocatoria determinada
    $arrayTrabajosQueTieneAplicadosUnaConvocatoria = $convocatoriaControla->consultarTrabajosDestacadosAplicadosAUnaConvocatoria($idConvocatoriaParaConsultarSusTrabajosAplicados);
    $stringTrabajosQueTieneAplicadosUnaConvocatoria = implode(",", $arrayTrabajosQueTieneAplicadosUnaConvocatoria);

    //Consultamos los datos principales de los trabajos para su muestreo en la tabla de trabajos
    $sqlDatTrabajosDeLaConvocatoria = "SELECT * from tbl_trabajodestacado where Id_trabajo in (".$stringTrabajosQueTieneAplicadosUnaConvocatoria.")";
    $datosTrabajosDeLaConvocatoria = $trabajoControla->mostrarDatosTrabajosDestacados($sqlDatTrabajosDeLaConvocatoria);

    if($datosTrabajosDeLaConvocatoria != null){

        foreach ($datosTrabajosDeLaConvocatoria as $key){

            $tableTrabajosDeConvocatoriaP1 = '<!--Aqui van los registros de la tabla de trabajos para los desafios-->
                                                <table class="filasDeDatosTablaTrabajos">
                                                    <tr>';
    
                                                        //Aqui traemos la imagen del trabajo para la tabla de trabajos
                                                        if($key['nombre_imagentrabajo'] != null){
                                                            $labelImagenDelTrabajoDeLaConvocatoria = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="trabajosImages/'.$key['nombre_imagentrabajo'].'"></td>';
                                                        }else{
                                                            $labelImagenDelTrabajoDeLaConvocatoria = '<td class="datoTabla"><img class="imagenDelDesafioEnTabla" src="assets/images/imgPorDefecto.jpg"></td>';
                                                        }
                            
                          $tableTrabajosDeConvocatoriaP2 = '<td class="datoTabla">'.$key['nombre_trabajo'].'</td>
                                                        <td class="datoTabla"><div class="compEsp-edicion">
    
                                                            <div class="col-botonesEdicion">
                                                            <a class="btnDetallesTrabajoAplicadoAConvocatoria" onclick="funcionesParaRevisionDeTrabajosAplicadosAConvocatorias()" data-id="'.$key['Id_trabajo'].'" data-estudiante="'.$key['Id_estudiante'].'" data-convocatoria="'.$idConvocatoriaParaConsultarSusTrabajosAplicados.'" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAConvocatoria" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                                            </div>
    
                                                        </div></td>
                                                    </tr>
                                                </table>';
    
            echo $tableTrabajosDeConvocatoriaP1;
            echo $labelImagenDelTrabajoDeLaConvocatoria;
            echo $tableTrabajosDeConvocatoriaP2;
    
        }
    }
}


//Capturamos el id de una actividad (sea desafio, evento o convocatoria) con el fin de cargar el analisis de competencias especificas previamente asociado
if(isset($_POST['idActividadAConsultarCompetencias']) && isset($_POST['tipoDeActividad'])){

    $idActividadAConsultarCompetencias = $_POST['idActividadAConsultarCompetencias'];
    $tipoDeActividad =  $_POST['tipoDeActividad'];

    //Obtenemos el string del arreglo de los codigos de las competencias especificas y el arreglo de los niveles de contribucion de las mismas
    $stringArregloCodigosCompEspecificasDeLaActividad = $competenciaControla->consultarArregloDeCodigosDeCompetenciasEspecificasDeUnaActividad($idActividadAConsultarCompetencias, $tipoDeActividad); 
    $stringArregloNivelesDeContribucionCompEspecificasDeLaActividad = $competenciaControla->consultarArregloDeNivelesDeCompetenciasEspecificasDeUnaActividad($idActividadAConsultarCompetencias, $tipoDeActividad); 

    //Convertimos el string con los niveles de contribucion anteriormente consultados a tipo array
    $arrayArregloNivelesDeContribucionCompEspecificasDeLaActividad = explode(",", $stringArregloNivelesDeContribucionCompEspecificasDeLaActividad);
    $arrayArregloCodigosCompEspecificasDeLaActividad = explode(",", $stringArregloCodigosCompEspecificasDeLaActividad);

    //Recorremos el arreglo de codigos el fin de agregar comillas simples al inicio y al final de cada uno de sus elementos
    $arrayTransformadoCodigosCompEspecificasDeLaActividad = array();
    $itemArregloCodigosCompEspecificasDeLaActividad = "";

    for($i=0; $i<count($arrayArregloCodigosCompEspecificasDeLaActividad); $i++){

        $itemArregloCodigosCompEspecificasDeLaActividad = "'".$arrayArregloCodigosCompEspecificasDeLaActividad[$i]."'";
        $arrayTransformadoCodigosCompEspecificasDeLaActividad[$i] = $itemArregloCodigosCompEspecificasDeLaActividad;

    }

    //Convertimos el arreglo de codigos transformado a string
    $stringArrayTransformadoCodigosCompEspecificasDeLaActividad = implode(",", $arrayTransformadoCodigosCompEspecificasDeLaActividad);

    //Consultamos las descripciones de las competencias especificasque fueron evaluadas para laactividad y estructuramos el html del formulario
    $sqlCompetenciasQueFueronAnalizadas = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where codigo in(".$stringArrayTransformadoCodigosCompEspecificasDeLaActividad.")";
    $resultCompetenciasQueFueronAnalizadas = mysqli_query($conexion, $sqlCompetenciasQueFueronAnalizadas);
    $codigoHtmlEnunciadoCompAnalisis = "";

    $count = 0;
    while(@mysqli_fetch_array($resultCompetenciasQueFueronAnalizadas)){
        foreach($resultCompetenciasQueFueronAnalizadas as $ver){

            $codigoHtmlEnunciadoCompAnalisis = $codigoHtmlEnunciadoCompAnalisis.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'; 

            $codigoHtmlEnunciadoCompAnalisis = $codigoHtmlEnunciadoCompAnalisis.'<p>Valoración:'.' '.$arrayArregloNivelesDeContribucionCompEspecificasDeLaActividad[$count].'</p><br>';
            $count++;           
            
        } 
    }
    
    echo $codigoHtmlEnunciadoCompAnalisis;

}

//Capturamos el id de una actividad (sea desafio, evento o convocatoria) con el fin de cargar el formulario de competencias especificas para la evaluación del trabajo aplicado
if(isset($_POST['idActividadParaEvaluarCompetenciasTrabajo']) && isset($_POST['tipoDeActividadInvolucrada'])){

    $idActividadParaEvaluarCompetenciasTrabajo = $_POST['idActividadParaEvaluarCompetenciasTrabajo'];
    $tipoDeActividadInvolucrada = $_POST['tipoDeActividadInvolucrada'];

    //Obtenemos el string del arreglo de los codigos y niveles de contribucion de las competencias especificas 
    $stringArregloCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo = $competenciaControla->consultarArregloDeCodigosDeCompetenciasEspecificasDeUnaActividad($idActividadParaEvaluarCompetenciasTrabajo, $tipoDeActividadInvolucrada); 
    $stringArregloNivelesDeContribucionCompEspecificasDeLaActividadParaEvaluacion = $competenciaControla->consultarArregloDeNivelesDeCompetenciasEspecificasDeUnaActividad($idActividadParaEvaluarCompetenciasTrabajo, $tipoDeActividadInvolucrada); 
    
    //Convertimos el string de los arreglos anteriormente consultados a tipo array
    $arrayArregloCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo = explode(",", $stringArregloCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo);
    $arrayArregloNivelesDeContribucionCompEspecificasDeLaActividadParaEvaluacion = explode(",", $stringArregloNivelesDeContribucionCompEspecificasDeLaActividadParaEvaluacion);

    //Recorremos el arreglo de niveles de contribucion con el fin de identificar si existe un elemento de tipo N/A para eliminarlo y eliminar el codigo de competencia especifica asociado al mismo
    $arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales = array();
    $arregloDeCodigosDeCompetenciasActualizado = array();
    $contador = 0;
    
    
    for($j=0; $j<count($arrayArregloNivelesDeContribucionCompEspecificasDeLaActividadParaEvaluacion); $j++){

        if($arrayArregloNivelesDeContribucionCompEspecificasDeLaActividadParaEvaluacion[$j] == 'N/A'){
            $arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales[$contador] = $arrayArregloCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo[$j];
            $contador++;
        }else{
            $arregloDeCodigosDeCompetenciasActualizado[$j-$contador] = $arrayArregloCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo[$j];
        }
    }
   
    //Recorremos el arreglo de codigos el fin de agregar comillas simples al inicio y al final de cada uno de sus elementos
    $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo = array();
    $itemArregloCodigosCompEspecificasDeLaActividadParaEv = "";

    for($i=0; $i<count($arregloDeCodigosDeCompetenciasActualizado); $i++){

        $itemArregloCodigosCompEspecificasDeLaActividadParaEv = "'".$arregloDeCodigosDeCompetenciasActualizado[$i]."'";
        $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo[$i] = $itemArregloCodigosCompEspecificasDeLaActividadParaEv;

    }

    //Convertimos el arreglo de codigos transformado a string
    $stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo = implode(",", $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo);

    //Consultamos las descripciones de las competencias especificas que fueron seleccionadas para la evaluacion de un trabajo aplicado a la actividad y estructuramos el html del formulario
    $sqlCompetenciasQueFueronEscogidasParaEvTrabajo = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where codigo in(".$stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvaluacionTrabajo.")";
    $resultCompetenciasQueFueronEscogidasParaEvTrabajo = mysqli_query($conexion, $sqlCompetenciasQueFueronEscogidasParaEvTrabajo);
    $codigoHtmlEnunciadoCompParaEvTrabajo = "";

    foreach($resultCompetenciasQueFueronEscogidasParaEvTrabajo as $ver){
        $codigoHtmlEnunciadoCompParaEvTrabajo = $codigoHtmlEnunciadoCompParaEvTrabajo.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'.
                
                                        '<table class="contenedorRespContribucionCompEsp" id="'.$ver['codigo'].'">
                                            <tr>
                                                <td><input type="radio" name="'.$ver['codigo'].'" value="BAJA">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="MEDIA">
                                                <label for="Media">Media</label></td>
                                                
                                                <td class=columnaNivelContribucion><input type="radio" name="'.$ver['codigo'].'" value="ALTA">
                                                <label for="Alta">Alta</label></td>

                                            </tr>
                                        </table>
                                        <br>';           
    }
    
    echo $codigoHtmlEnunciadoCompParaEvTrabajo;
}

//Capturamos los array para el registro de la evaluacion realizada a las competencias especificas que certifican un trabajo aplicado a una actividad (sea desafio, desafio personalizado, evento o convocatoria)
if(isset($_POST['idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo']) && isset($_POST['idActividad']) && isset($_POST['tipoActividad']) && isset($_POST['idDelTrabajo']) && isset($_POST['arregloCodigosCompEspecificasEvaluacionTrabajo']) && isset($_POST['arregloNivelesContribucionCompEspecificasEvaluacionTrabajo'])) {

    //Capturamos los datos de los campos del formulario
    $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo = trim($_POST['idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo']);
    $idActividad = trim($_POST['idActividad']);
    $tipoActividad = trim($_POST['tipoActividad']);    
    $idDelTrabajo = trim($_POST['idDelTrabajo']);
    $arregloCodigosCompEspecificasEvaluacionTrabajo = json_decode(stripslashes($_POST['arregloCodigosCompEspecificasEvaluacionTrabajo']));
    $arregloNivelesContribucionCompEspecificasEvaluacionTrabajo = json_decode(stripslashes($_POST['arregloNivelesContribucionCompEspecificasEvaluacionTrabajo']));

    //Recorremos el arreglo de codigos el fin de agregar comillas simples al inicio y al final de cada uno de sus elementos
    $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo = array();
    $itemArregloCodigosCompEspecificDeLaActividadParaEv = "";

    for($i=0; $i<count($arregloCodigosCompEspecificasEvaluacionTrabajo); $i++){

        $itemArregloCodigosCompEspecificDeLaActividadParaEv = "'".$arregloCodigosCompEspecificasEvaluacionTrabajo[$i]."'";
        $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo[$i] = $itemArregloCodigosCompEspecificDeLaActividadParaEv;

    }

    //Convertimos los arreglos de los codigos y los niveles de contribucion a string
    $stringArregloCodigosCompEspecificasEvaluacionTrabajo = implode(",", $arregloCodigosCompEspecificasEvaluacionTrabajo);
    $stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo  = implode(",", $arrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo);
    $stringArregloNivelesContribucionCompEspecificasEvaluacionTrabajo  = implode(",", $arregloNivelesContribucionCompEspecificasEvaluacionTrabajo);

    //Construimos el arreglo con los tipos de badge ganados por el estudiante teniendo en cuenta el arreglo de niveles de contribucion obtenido en la evaluacion de competencias especificas
    $arregloTiposDeBadgeGanadosEnActividadCompEsp = array();
    for($k=0; $k<count($arregloNivelesContribucionCompEspecificasEvaluacionTrabajo); $k++){

        if($arregloNivelesContribucionCompEspecificasEvaluacionTrabajo[$k] == 'BAJA'){
            $arregloTiposDeBadgeGanadosEnActividadCompEsp[$k] = 'BRONCE'; 
        }

        if($arregloNivelesContribucionCompEspecificasEvaluacionTrabajo[$k] == 'MEDIA'){
            $arregloTiposDeBadgeGanadosEnActividadCompEsp[$k] = 'PLATA'; 
        }

        if($arregloNivelesContribucionCompEspecificasEvaluacionTrabajo[$k] == 'ALTA'){
            $arregloTiposDeBadgeGanadosEnActividadCompEsp[$k] = 'ORO'; 
        }
    }

    //Obtenemos el string del arreglo de los codigos y niveles de contribucion de las competencias especificas 
    $stringArregloCodigosCompEspDeLaActividadParaEvaluacionTrabajo = $competenciaControla->consultarArregloDeCodigosDeCompetenciasEspecificasDeUnaActividad($idActividad, $tipoActividad); 
    $stringArregloNivelesDeContribucionCompEspDeLaActividadParaEvaluacion = $competenciaControla->consultarArregloDeNivelesDeCompetenciasEspecificasDeUnaActividad($idActividad, $tipoActividad); 

    //Convertimos el string de los arreglos anteriormente consultados a tipo array
    $arrayArregloCodigosCompEspDeLaActividadParaEvaluacionTrabajo = explode(",", $stringArregloCodigosCompEspDeLaActividadParaEvaluacionTrabajo);
    $arrayArregloNivelesDeContribucionCompEspDeLaActividadParaEvaluacion = explode(",", $stringArregloNivelesDeContribucionCompEspDeLaActividadParaEvaluacion);

    //Recorremos el arreglo de niveles de contribucion con el fin de identificar si existe un elemento de tipo N/A para eliminarlo y eliminar el codigo de competencia especifica asociado al mismo
    $arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales = array();
    $count = 0;
    
    
    for($g=0; $g<count($arrayArregloNivelesDeContribucionCompEspDeLaActividadParaEvaluacion); $g++){

        if($arrayArregloNivelesDeContribucionCompEspDeLaActividadParaEvaluacion[$g] == 'N/A'){
            $arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales[$count] = "'".$arrayArregloCodigosCompEspDeLaActividadParaEvaluacionTrabajo[$g]."'";
            $count++;
        }
    }

    //Verificamos si la evaluacion realizada al trabajo destacado va a certificar o no competencias generales (Megainsignias)
    if($arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales != null){
        
        //Insertamos en base de datos la evaluacion de competencias especificas realizada al trabajo
        $sqlInsercionDeEvaluacionRealizadaTrabajo = "INSERT INTO tbl_evaluaciondetrabajos VALUES (0, $idActividad, '$tipoActividad', $idDelTrabajo, '$stringArregloCodigosCompEspecificasEvaluacionTrabajo', '$stringArregloNivelesContribucionCompEspecificasEvaluacionTrabajo')";
        mysqli_query($conexion, $sqlInsercionDeEvaluacionRealizadaTrabajo) or die(mysqli_error($conexion));

        //Consultamos los ids de las competencias especificas que se van a certificar con el trabajo aplicado
        $arregloIdsCompetenciasEspecificasACertificar = $competenciaControla->consultarIdsDeCompetenciasEspecificasACertificar($stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo);

        //Insertamos en la BD de insignias ganadas, los tipos de badge de comp especificas obtenidos por el trabajo destacado
        for($u=0; $u<count($arregloIdsCompetenciasEspecificasACertificar); $u++){

            //Insertamos en BD las insignias de competencias especificas ganadas por el trabajo
            $sqlInsercionInsigGanadas = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$arregloTiposDeBadgeGanadosEnActividadCompEsp[$u]', $arregloIdsCompetenciasEspecificasACertificar[$u], 'ESPECIFICA')";
            mysqli_query($conexion, $sqlInsercionInsigGanadas) or die(mysqli_error($conexion));

        }

        //Convertimos el arreglo de competencias especificas que no permiten la certificacion de comp generales a string
        $stringArregloDeCompetenciasEspPorLasQueNoSeCertificaranCompGenerales = implode(",", $arregloDeCompetenciasEspPorLasQueNoSeCertificaranSusCompGenerales);

        //Consultamos los ids de las competencias generales de aquellas competencias especificas que generaron inconsistencia N/A
        $arregloCompetenciasGenACertificar = $competenciaControla->consultarIdsCompetenciasGeneralesACertificar($stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo);
        $arregloIdsCompGeneralesQueNoPuedenSerCertificadas = $competenciaControla->consultarIdsCompGeneralesQueNoPuedenCertificarse($stringArregloDeCompetenciasEspPorLasQueNoSeCertificaranCompGenerales);

        //Comparamos los dos arreglos y creamos un nuevo arreglo con aquellos ids que no tengan en común
        $resultadoComparacion1 = array_diff($arregloCompetenciasGenACertificar, $arregloIdsCompGeneralesQueNoPuedenSerCertificadas);

        //Estructuramos el arreglo con el fin de que se pueda utilizar y recorrerse con facilidad
        $indiceOrdenado = 0;
        $arrayEstructurado = array();
        for($i=0; $i<=count($resultadoComparacion1); $i++){
            if(array_key_exists($i, $resultadoComparacion1)){
                $arrayEstructurado[$indiceOrdenado] = $resultadoComparacion1[$i];
                $indiceOrdenado++;
            }
        }
        
        //Consultamos las competencias generales a las que pertenecen las competencias especificas previamente certificadas
        $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig = array();
        $arregloDeNumeroDeRepeticionesDeLosTiposDeBadge = array();
        $tipoDeBadgeParaMegainsignia = "";
        
        //Consultamos el numero de competencias especificas que tiene cada competencia general 
        for($h=0; $h<count($arrayEstructurado); $h++){

            $numeroDeCompEspQueTieneLaCompGeneral = $competenciaControla->contarCantidadDeCompEspecificasDeUnaCompGeneral($arrayEstructurado[$h]);

            //Obtenemos un arreglo con los primeros n tipos de badge de la competencia general para hacer el procesamiento correspondiente
            $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig = array_slice($arregloTiposDeBadgeGanadosEnActividadCompEsp, 0, $numeroDeCompEspQueTieneLaCompGeneral);

            for($l=0; $l<count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig); $l++){
                //Eliminamos el elemento del array
                unset($arregloTiposDeBadgeGanadosEnActividadCompEsp[$l]);
            }

            if(count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig) == 1){
                $tipoDeBadgeParaMegaInsig = $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[0];

                //Generamos la certificacion de la megainsignia de lacompetencia general para el trabajo destacado
                $sqlInsercionInsigGanadas = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$tipoDeBadgeParaMegaInsig', $arrayEstructurado[$h], 'GENERAL')";
                mysqli_query($conexion, $sqlInsercionInsigGanadas) or die(mysqli_error($conexion));
            
            }else{

                //Recorremos el arreglo de tipos de badges con el fin de identificar cuantas veces se repite cada uno de sus elementos
                for($x=0; $x<count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig); $x++){
                    $arregloDeNumeroDeRepeticionesDeLosTiposDeBadge[$x] = $competenciaControla->contarCuantasVecesSeRepiteUnTipoDeBadge($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig, $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[$x]);
                }

                //Obtenemos el numero mas grande del arreglo de numero de repeticiones de los tipos de badge
                $numeroMasGrandeDeRepeticiones = max($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge);

                //Reestructuramos los indices del array de tipos de badge para determinar tipo de megainsignia
                $indexOrdenado = 0;
                $arrayEstructuradoTiposDeBadgeParaDeterminarTipoMegaInsig = array();
                for($z=0; $z<=count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig); $z++){
                    if(array_key_exists($z, $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig)){
                        $arrayEstructuradoTiposDeBadgeParaDeterminarTipoMegaInsig[$indexOrdenado] = $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[$z];
                        $indexOrdenado++;
                    }
                }
                
                //Recorremos el arreglo de repeticiones con el fin de encontrar el indice del numero mas grande ($numeroMasGrandeDeRepeticiones) para así obtener el tipo de badge que se encuentre en dicho indice en el arreglo de tipos de badges
                for($y=0; $y<count($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge); $y++){
                    
                    if($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge[$y] == $numeroMasGrandeDeRepeticiones){
                        $tipoDeBadgeParaMegainsignia = $arrayEstructuradoTiposDeBadgeParaDeterminarTipoMegaInsig[$y];
                        break;
                    }
                }

                //Generamos la certificacion de la megainsignia de lacompetencia general para el trabajo destacado
                $sqlInsercionInsigWin = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$tipoDeBadgeParaMegainsignia', $arrayEstructurado[$h], 'GENERAL')";
                mysqli_query($conexion, $sqlInsercionInsigWin) or die(mysqli_error($conexion));
            }
        }

        //Eliminamos la aplicacion del trabajo a la actividad
        $trabajoControla->eliminarAplicacionDelTrabajoParaUnaActividad($idDelTrabajo, $idActividad, $tipoActividad);

        //Indicamos que el trabajo ya tiene badges de certificacion y lo publicamos en el eportafolio del estudiante
        $trabajoControla->publicarTrabajoDestacadoCertificado($idDelTrabajo);
        
        

    }else{
        
        //Insertamos en base de datos la evaluacion de competencias especificas realizada al trabajo
        $sqlInsercionDeEvaluacionRealizadaTrabajo = "INSERT INTO tbl_evaluaciondetrabajos VALUES (0, $idActividad, '$tipoActividad', $idDelTrabajo, '$stringArregloCodigosCompEspecificasEvaluacionTrabajo', '$stringArregloNivelesContribucionCompEspecificasEvaluacionTrabajo')";
        mysqli_query($conexion, $sqlInsercionDeEvaluacionRealizadaTrabajo) or die(mysqli_error($conexion));

        //Consultamos los ids de las competencias especificas que se van a certificar con el trabajo aplicado
        $arregloIdsCompetenciasEspecificasACertificar = $competenciaControla->consultarIdsDeCompetenciasEspecificasACertificar($stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo);

        //Insertamos en la BD de insignias ganadas, los tipos de badge de comp especificas obtenidos por el trabajo destacado
        for($u=0; $u<count($arregloIdsCompetenciasEspecificasACertificar); $u++){

            //Insertamos en BD las insignias de competencias especificas ganadas por el trabajo
            $sqlInsercionInsigGanadas = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$arregloTiposDeBadgeGanadosEnActividadCompEsp[$u]', $arregloIdsCompetenciasEspecificasACertificar[$u], 'ESPECIFICA')";
            mysqli_query($conexion, $sqlInsercionInsigGanadas) or die(mysqli_error($conexion));

        }
        

        //Consultamos las competencias generales a las que pertenecen las competencias especificas previamente certificadas
        $arregloCompetenciasGeneralesACertificar = $competenciaControla->consultarIdsCompetenciasGeneralesACertificar($stringArrayTransformadoCodigosCompEspecificasDeLaActividadParaEvTrabajo);
        $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig = array();
        $arregloDeNumeroDeRepeticionesDeLosTiposDeBadge = array();
        $tipoDeBadgeParaMegainsignia = "";
        
        //Consultamos el numero de competencias especificas que tiene cada competencia general 
        for($h=0; $h<count($arregloCompetenciasGeneralesACertificar); $h++){

            $numeroDeCompEspQueTieneLaCompGeneral = $competenciaControla->contarCantidadDeCompEspecificasDeUnaCompGeneral($arregloCompetenciasGeneralesACertificar[$h]);

            //Obtenemos un arreglo con los primeros n tipos de badge de la competencia general para hacer el procesamiento correspondiente
            $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig = array_slice($arregloTiposDeBadgeGanadosEnActividadCompEsp, 0, $numeroDeCompEspQueTieneLaCompGeneral);

            for($l=0; $l<count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig); $l++){
                //Eliminamos el elemento del array
                unset($arregloTiposDeBadgeGanadosEnActividadCompEsp[$l]);
            }

            if(count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig) == 1){
                $tipoDeBadgeParaMegaInsig = $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[0];

                //Generamos la certificacion de la megainsignia de lacompetencia general para el trabajo destacado
                $sqlInsercionInsigGanadas = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$tipoDeBadgeParaMegaInsig', $arregloCompetenciasGeneralesACertificar[$h], 'GENERAL')";
                mysqli_query($conexion, $sqlInsercionInsigGanadas) or die(mysqli_error($conexion));
            
            }else{

                //Recorremos el arreglo de tipos de badges con el fin de identificar cuantas veces se repite cada uno de sus elementos
                for($x=0; $x<count($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig); $x++){
                    $arregloDeNumeroDeRepeticionesDeLosTiposDeBadge[$x] = $competenciaControla->contarCuantasVecesSeRepiteUnTipoDeBadge($arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig, $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[$x]);
                }

                //Obtenemos el numero mas grande del arreglo de numero de repeticiones de los tipos de badge
                $numeroMasGrandeDeRepeticiones = max($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge);
                
                //Recorremos el arreglo de repeticiones con el fin de encontrar el indice del numero mas grande ($numeroMasGrandeDeRepeticiones) para así obtener el tipo de badge que se encuentre en dicho indice en el arreglo de tipos de badges
                for($y=0; $y<count($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge); $y++){
                    
                    if($arregloDeNumeroDeRepeticionesDeLosTiposDeBadge[$y] == $numeroMasGrandeDeRepeticiones){
                        $tipoDeBadgeParaMegainsignia = $arregloDeTiposDeBadgeParaDeterminarTipoMegaInsig[$y];
                        break;
                    }
                }

                //Generamos la certificacion de la megainsignia de lacompetencia general para el trabajo destacado
                $sqlInsercionInsigWin = "INSERT INTO tbl_insigniasganadastrabdestacado VALUES (0, $idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo, $idDelTrabajo, '$tipoDeBadgeParaMegainsignia', $arregloCompetenciasGeneralesACertificar[$h], 'GENERAL')";
                mysqli_query($conexion, $sqlInsercionInsigWin) or die(mysqli_error($conexion));
            }
        }

        //Eliminamos la aplicacion del trabajo a la actividad
        $trabajoControla->eliminarAplicacionDelTrabajoParaUnaActividad($idDelTrabajo, $idActividad, $tipoActividad);

        //Indicamos que el trabajo ya tiene badges de certificacion y lo publicamos en el eportafolio del estudiante
        $trabajoControla->publicarTrabajoDestacadoCertificado($idDelTrabajo);
  
    }
}

























//Capturamos el evento del id de un trabajo con el fin de mostrar sus resultados en la evaluacion realizada por el profesor (MegaInsignias)
if(isset($_POST['idDelTrabajoInvolucradoMegaInsigniasObtenidas'])){

    //Aqui traemos los datos
    $idDelTrabajoInvolucradoMegaInsigniasObtenidas = $_POST['idDelTrabajoInvolucradoMegaInsigniasObtenidas'];

    //Obtenemos el arreglo de los ids de las competencias generales que tiene certificado el trabajo
    $arregloIdsCompGeneralesEvaluadasTrabajo = $competenciaControla->consultarArregloDeCompetenciasGeneralesEvaluadasParaTrabajo($idDelTrabajoInvolucradoMegaInsigniasObtenidas); 
    $arregloTiposDeMegaInsigGanadasPorElTrabajo = $competenciaControla->consultarArregloDeMegaInsigniasGanadasPorElTrabajo($idDelTrabajoInvolucradoMegaInsigniasObtenidas);
    $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo = "";
    $noSeCertificaronCompGenerales = "<p>No se otorgaron Megainsignias</p>";

    if($arregloIdsCompGeneralesEvaluadasTrabajo != null){

        //Convertimos el arreglo a string
        $stringArregloIdsCompGeneralesEvaluadasTrabajo = implode(",", $arregloIdsCompGeneralesEvaluadasTrabajo);

        //Consultamos las descripciones de las competencias generales que fueron evaluadas para el trabajo y estructuramos el html del formulario
        $sqlCompetenciasGeneralesQueFueronCertParaElTrabajo = "SELECT codigo, nombre_comp_gral from tbl_competencia_general where id_comp_gral in(".$stringArregloIdsCompGeneralesEvaluadasTrabajo.")";
        $resultCompetenciasGeneralesQueFueronCertParaElTrabajo = mysqli_query($conexion, $sqlCompetenciasGeneralesQueFueronCertParaElTrabajo);
        
        $count = 0;
        while(@mysqli_fetch_array($resultCompetenciasGeneralesQueFueronCertParaElTrabajo)){
            foreach($resultCompetenciasGeneralesQueFueronCertParaElTrabajo as $ver){

                $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo = $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo.'<textarea class="enunciadoCompEspecifica" name="nombre_comp_gral" disabled>'.$ver['codigo'].' '.$ver['nombre_comp_gral'].'</textarea><br>'; 

                $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo = $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo.'<p>MegaInsignia ganada:'.' '.$arregloTiposDeMegaInsigGanadasPorElTrabajo[$count].'</p><br>';
                $count++;           
                
            } 
        }

        echo $codigoHtmlEnunciadoCompGenEvaluadasAlTrabajo;

    }else{
        echo $noSeCertificaronCompGenerales;
    }
}

//Capturamos el evento del id de un trabajo con el fin de mostrar sus resultados en la evaluacion realizada por el profesor (Insignias)
if(isset($_POST['idDelTrabajoInvolucradoInsigniasObtenidas'])){

    //Aqui traemos los datos
    $idDelTrabajoInvolucradoInsigniasObtenidas = $_POST['idDelTrabajoInvolucradoInsigniasObtenidas'];

    //Obtenemos el arreglo de los ids de las competencias especificas que tiene certificado el trabajo
    $arregloIdsCompEspecificasEvaluadasTrabajo = $competenciaControla->consultarArregloDeCompetenciasEspecificasEvaluadasParaTrabajo($idDelTrabajoInvolucradoInsigniasObtenidas);
    $arregloTiposDeInsigGanadasPorElTrabajo = $competenciaControla->consultarArregloDeInsigniasGanadasPorElTrabajo($idDelTrabajoInvolucradoInsigniasObtenidas);
    $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo = "";
    $noSeCertificaronCompEspecificas = "<p>No se otorgaron Insignias</p>";
    
    if($arregloIdsCompEspecificasEvaluadasTrabajo != null){

        //Convertimos el arreglo a string
        $stringArregloIdsCompEspecificasEvaluadasTrabajo = implode(",", $arregloIdsCompEspecificasEvaluadasTrabajo);

        //Consultamos las descripciones de las competencias especificas que fueron evaluadas para el trabajo y estructuramos el html del formulario
        $sqlCompetenciasEspecificasQueFueronCertParaElTrabajo = "SELECT codigo, nombre_competencia_esp from tbl_competencia_especifica where id_comp_esp in(".$stringArregloIdsCompEspecificasEvaluadasTrabajo.")";
        $resultCompetenciasEspecificasQueFueronCertParaElTrabajo = mysqli_query($conexion, $sqlCompetenciasEspecificasQueFueronCertParaElTrabajo);
        
        $count = 0;
        while(@mysqli_fetch_array($resultCompetenciasEspecificasQueFueronCertParaElTrabajo)){
            foreach($resultCompetenciasEspecificasQueFueronCertParaElTrabajo as $ver){

                $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo = $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo.'<textarea class="enunciadoCompEspecifica" name="nombre_competencia_esp" disabled>'.$ver['codigo'].' '.$ver['nombre_competencia_esp'].'</textarea><br>'; 

                $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo = $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo.'<p>Insignia ganada:'.' '.$arregloTiposDeInsigGanadasPorElTrabajo[$count].'</p><br>';
                $count++;           
                
            } 
        }

        echo $codigoHtmlEnunciadoCompEspEvaluadasAlTrabajo;

    }else{
        echo $noSeCertificaronCompEspecificas;
    }
}
    
?>



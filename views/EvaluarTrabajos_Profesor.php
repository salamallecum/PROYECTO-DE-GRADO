<?php

require_once "logic/controllers/ProfesorControlador.php";

session_start();

//Validamos que haya una sesión iniciada
if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Por favor, debes iniciar sesión");
            window.location = "../index.php";
        </script>
    ';
    header("Location: ../index.php");
    session_destroy();
    die();

}else{

$profeControla = new ProfesorControlador();

//Aqui capturamos el id del profesor logueado
if(isset($_GET['Id_profesor']) != 0){

    $idProfesorLogueado = $_GET['Id_profesor'];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
                
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/ProfesorStyles.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>

    <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincProfesor.PNG"></span>
                    <span id="tituloPagPrincipal">PANDORA</span>
                </h3>
                <label for="sidebar-toggle"><i class="bi bi-menu-app"></i></label>
            </div>

            <div class="sidebar-menu">
                <ul class="menuProfesor">
                    <li>
                        <a class="link_menu-active" href="<?php echo "./DashBoard_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./PerfilDeUsuario_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="link_menu" href="<?php echo "./AdministrarDesafios_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Administrador de desafios"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">ADMINISTRAR DESAFIOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./EvaluarTrabajos_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Evaluar trabajos"><i class="bi bi-card-checklist"></i></span>
                            <span class="items_menu">EVALUAR TRABAJOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./DesafiosPersonalizados_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-content">

            <header>
                <div class="social-icons">
                    <div class="titulo-dash">
                        <span>Evaluar trabajos</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="logout.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="main-tableDesafios">
                    
                    <label class="comboDeDesafiosAEvaluar">Seleccione el tipo de actividad que desea evaluar</label>
                    <table>
                        <tr>
                            <td><select class="form-control" id="cmb_tiposDeActividades" name="cmbTipoDeActividadAEvaluar">
                                    <option value="seleccione" selected>Seleccione</option>
                                    <option value="desafio">Desafio</option>
                                    <option value="despersonal">Desafio personalizado</option>
                                    <option value="evento">Evento</option>
                                    <option value="convocatoria">Convocatoria externa</option>
                                </select>
                            
                                <input type="hidden" id="idProfesor" value="<?php echo $idProfesorLogueado;?>">
                            </td>

                            <td> <button class="btn_filtrarActividades" title="Filtrar">Filtrar</button></td>
                        </tr>
                    </table>
                    <br>                   

                    <div class="contenedorTabla">

                        <h3 class="titulo_seccion">Tabla de actividades</h3>

                        <!--ESTRUCTURA DE TABLA DE DESAFIOS EVENTOS Y CONVOCATORIAS-->
                        <div class="pnl_TablaDeDesafiosEventosYConvocatorias">
                            <table id="table_desafiosAEvaluar" class="tablaDeDesafiosAEvaluar">
                                <thead>
                                    <tr>
                                        <th class="campoTabla">Imagen</th>
                                        <th class="campoTabla">Nombre</th>
                                        <th class="campoTabla">N° trabajos</th>
                                        <th class="campoTabla">Acciones</th>
                                    </tr>
                                </thead>
                            </table>

                            <span id="resultadosDeBusquedaTablaActividades"></span>
                        </div>
                                

                    </div>
 
                    <div class="contenedorTabla">   
                        
                        <h3 class="titulo_seccion">Tabla de trabajos </h3>

                        <!--ESTRUCTURA DE TABLA DE TRABAJOS PRESENTADOS-->
                        <div class="pnl-TablaDeTrabajos">
                            <table id="table_desafiosAEvaluar" class="tablaDeActividadesAEvaluar">
                                <thead>
                                    <tr>
                                        <th class="campoTabla">Imagen</th>
                                        <th class="campoTabla">Nombre Trabajo</th>
                                        <th class="campoTabla">Nombres</th>
                                        <th class="campoTabla">Apellidos</th>
                                        <th class="campoTabla">Acciones</th>
                                    </tr>
                                </thead>
    
                                <!--Aqui van los registros de la tabla de trabajos presentados-->
                                <tr class="filasDeDatosTablaDesafios">
                                    <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                                    <td class="datoTabla">TRABAJO DE PRUEBA 1</td>
                                    <td class="datoTabla"> PEPITO </td>
                                    <td class="datoTabla"> PEREZ</td>
                                    <td class="datoTabla"><div class="col-botonesEdicion">
                                            <a name="openModal2" class="iconosAccionesEvaluacion" title="Detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS-->
                    <div class="modal fade" id="modalDetallesDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafio" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDelDesafio"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaBotonDescargaEnunciadoDesafio"></span>
                            <br>
                            <br>

                            <table>
                                <tr>
                                    <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                    <td><label class="subtitulosInfo">Fecha fin</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                </tr>

                            <form id="formularioDeGestionDesafios">
                                <input id="txt_estadoDesafio" type="hidden" name="estado">
                                <input type="hidden" id="txt_idDesafioAGestionar" name="id_desafio" value="">
                                <tr>
                                    <td><label class="subtitulosInfo">Estado de la actividad: </label></td>
                                    <td class="columnaInfoEnunciado"><div class="contenedor-switch">
                                        <input type="checkbox" id="check_estadoDesafio" name="estadoDesafio">
                                    </div></td>
                                    <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                </tr>
                            </table>                           
                            <br>
                            <br>

                                <button type="button" id="gestionarDesafio" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS PERSONALIZADOS-->
                    <div class="modal fade" id="modalDetallesDePropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDePropuestaAprobada" class="modal-body">
                            
                            <input type="hidden" id="idPropDetalles" name="Id" value="">
                            <input type="hidden" id="nombreEnunciadoPropDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenPropDetalles" name="nombre_imagen">
                            <input type="hidden" id="idEstudianteQueProponePropuestaPorRevisar" name="Id_estudiante">
                            <input type="hidden" id="txt_idDesafioASustituir" name="idDesafioASustituir">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafioP" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de la propuesta-->
                            <span id="panelParaImagenDeLaPropuesta"></span>
                            <br>
                            <br>

                            <form id="seccionDatosEstudiante">
                                
                                <table>
                                    <tr>
                                        <td><label class="subtitulosInfo">Nombres:</label><br>
                                        <input type="text" class="infoDetallePropuesta" name="nombres_usuario" disabled></td>

                                        <td><label class="subtitulosInfo">Apellidos:</label><br>
                                        <input type="text" class="infoDetallePropuesta" name="apellidos_usuario" disabled></td>
                                    </tr>
                                </table>

                                <br>

                                <label class="subtitulosInfo">Correo:</label><br>
                                <input type="text" class="infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo de la propuesta-->
                            <span id="panelParaBotonDescargaEnunciado"></span>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="fecha_propuesta" disabled></td>
                                </tr>
                            </table> 
                            <br>
                            
                            <form id="infoDesafioAReemplazar">
                                <label class="subtitulosInfo">Desafio que se quiere reemplazar:</label><br>
                                <input type="text" class="infoDetalleDesafio" name="nombre_desafio">
                            </form>
                            <br>  
                            
                            <label class="subtitulosInfo">Observaciones</label>
                            <textarea id="txt_ObservacionesALaPropuesta" name="observaciones" cols="80" placeholder="" rows="8" class="textAreaObservacionesPropuesta" maxlength="300" disabled></textarea>
                            <br>
                            <br>  
                            
                            <!--Aqui mostramos la confiramcion de quese aprobo o se rechazo la propuesta-->
                            <span id="panelConfirmacionDeJuicio"></span>
                            <br>

                            <button id="btn_detalleDesafioReferenciado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafioASustituir" title="Ver desafio">Ver desafio</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS POR UNA PROPUESTA-->
                    <div class="modal fade" id="modalDetallesDesafioASustituir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafioASustituir" class="modal-body">
                            
                            <input type="text" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDelDesafioASustituir"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaEnunciadoDelDesafioASustituir"></span>
                            <br>

                            <table>
                                <tr>
                                    <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                    <td><label class="subtitulosInfo">Fecha fin</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                </tr>
                            </table>                           
                            <br>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estado de la actividad:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="estado" disabled></td>
                                </tr>
                            </table> 
                            <br>

                            <button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuesta" title="Atras">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS EVENTOS-->
                    <div class="modal fade" id="modalDetallesEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeEvento" class="modal-body">
                            
                            <input type="hidden" id="idEventoDetalles" name="id_evento" value="">
                            <input type="hidden" id="nombreEnunciadoEventDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenEventDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_evento" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del evento-->
                            <span id="panelParaImagenDelEvento"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_evento" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del evento-->
                            <span id="panelParaEnunciadoDelEvento"></span>
                            <br>

                            <table>
                                <tr>
                                    <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                    <td><label class="subtitulosInfo">Fecha fin</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                </tr>

                            <form id="formularioDeGestionEventos">
                                <input id="txt_estadoEvento" type="hidden" name="estado">
                                <input type="hidden" id="txt_idEventoAGestionar" name="id_evento" value="">
                                <tr>
                                    <td><label class="subtitulosInfo">Estado de la actividad: </label></td>
                                    <td class="columnaInfoEnunciado"><div class="contenedor-switch">
                                        <input type="checkbox" id="check_estadoEvento" name="estadoEvento">
                                    </div></td>
                                    <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                </tr>
                            </table>                           
                            <br>
                            <br>

                                <button type="button" id="gestionarEvento" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>



                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS CONVOCATORIAS-->
                    <div class="modal fade" id="modalDetallesConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeConvocatoria" class="modal-body">
                            
                            <input type="hidden" id="idConvDetalles" name="id_evento" value="">
                            <input type="hidden" id="nombreEnunciadoConvDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenConvDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_convocatoria" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de convocatoria-->
                            <span id="panelParaImagenDeConvocatoria"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_convocatoria" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado de convocatoria-->
                            <span id="panelParaEnunciadoDeConvocatoria"></span>
                            <br>

                            <table>
                                <tr>
                                    <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                    <td><label class="subtitulosInfo">Fecha fin</label><br>
                                    <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                </tr>

                            <form id="formularioDeGestionConvocatorias">
                                <input id="txt_estadoConvocatoria" type="hidden" name="estado">
                                <input type="hidden" id="txt_idConvocatoriaAGestionar" name="Id" value="">
                                <tr>
                                    <td><label class="subtitulosInfo">Estado de la actividad: </label></td>
                                    <td class="columnaInfoEnunciado"><div class="contenedor-switch">
                                        <input type="checkbox" id="check_estadoConvocatoria" name="estadoConvocatoria">
                                    </div></td>
                                    <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                </tr>
                            </table>                           
                            <br>
                            <br>

                                <button type="button" id="gestionarConvocatoria" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>

                    

                                    
                                                                
                                
         
                </div>
            </main>
        </div>
<?php
}
}
?>
    </body>

    <!--Funcion que resetea el span de la tabla de actividades y el span de lalogica de las actividades-->
    <script>
        function resetSpanTablaActividades(){
            document.getElementById('resultadosDeBusquedaTablaActividades').innerHTML="";
        }   
        
        function resetSpanLogicaActividades(){
            document.getElementById('panelCargaLogicaDeActividades').innerHTML="";
        }

        //Asignamos elevento de reseteo al boton que hace la busqueda de las actividades existentes
        $('#btn_filtrarActividades').click(function(){
            resetSpanTablaActividades();
            resetSpanLogicaActividades();
        });
    </script>

    <!--Script que permite traer la logica relacionada con la gestion de las actividades-->
    <script type='text/javascript'>
        $(document).ready(function(){

            $('.btn_filtrarActividades').click(function(){
                    
                var comboTipoActividadParaCargarLogica = $('#cmb_tiposDeActividades').val();

                function cargarLogicaDeActividades() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'comboTipoActividadParaCargarLogica': comboTipoActividadParaCargarLogica},
                            success: function(response){
                                resolve(response)
                                $('#panelCargaLogicaDeActividades').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                cargarLogicaDeActividades();
                              
            });
        });
    </script>

    <!--Script que permite pasar un tipo de actividad para así mostrar las actividades del profesor existentes paraese tipo en la tabla de actividades-->
    <script type='text/javascript'>
        $(document).ready(function(){

            $('.btn_filtrarActividades').click(function(){
                    
                var comboTipoActividad = $('#cmb_tiposDeActividades').val();
                var idDelprofesor = document.getElementById('idProfesor').value;

                if(comboTipoActividad != 'seleccione'){

                    function consultaDeActividadesDelProfesor() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'comboTipoActividad': comboTipoActividad, 'idDelProfesor': idDelprofesor},
                                success: function(response){
                                    resolve(response)
                                    $('#resultadosDeBusquedaTablaActividades').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                
                    consultaDeActividadesDelProfesor();
                
                }else{
                    alert('Por favor seleccione un tipo de actividad.');
                }
                                       
            });
        });
    </script>

    <!--Aqui cargamos la logica de las actividades-->
    <span id="panelCargaLogicaDeActividades"></span>

    
    <!--Script que permite activar o inactivar un desafio-->
    <script type='text/javascript'>
        $(document).ready(function(){

            $('#gestionarDesafio').click(function(){
                    
                var idDesafioGestionar= document.getElementById('txt_idDesafioAGestionar').value;
                var estadoDelDesafio = '';
                var checkEstadoDesafio = document.getElementById('check_estadoDesafio');

                if(checkEstadoDesafio.checked){
                    estadoDelDesafio = 'Activo'
                }else{
                    estadoDelDesafio = 'Inactivo';
                }

                function enviarEstadoDelDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/capturaDatDesafio.php',
                            type: 'post',
                            data: {'idDesafioAGestionar': idDesafioGestionar, 'estadoDelDesafio': estadoDelDesafio},
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                enviarEstadoDelDesafio();
                              
            });
        });
    </script>

    <!--Script que permite activar o inactivar un evento-->
    <script type='text/javascript'>
        $(document).ready(function(){

            $('#gestionarEvento').click(function(){
                    
                var idEventoGestionar= document.getElementById('txt_idEventoAGestionar').value;
                var estadoDelEvento = '';
                var checkEstadoEvento = document.getElementById('check_estadoEvento');

                if(checkEstadoEvento.checked){
                    estadoDelEvento = 'Activo'
                }else{
                    estadoDelEvento = 'Inactivo';
                }

                function enviarEstadoDelEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/capturaDatEvento.php',
                            type: 'post',
                            data: {'idEventoAGestionar': idEventoGestionar, 'estadoDelEvento': estadoDelEvento},
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                enviarEstadoDelEvento();
                              
            });
        });
    </script>

    <!--Script que permite activar o inactivar una convocatoria-->
    <script type='text/javascript'>
        $(document).ready(function(){

            $('#gestionarConvocatoria').click(function(){
                    
                var idConvocatoriaGestionar= document.getElementById('txt_idConvocatoriaAGestionar').value;
                var estadoDeConvocatoria = '';
                var checkEstadoConvocatoria = document.getElementById('check_estadoConvocatoria');

                if(checkEstadoConvocatoria.checked){
                    estadoDeConvocatoria = 'Activo'
                }else{
                    estadoDeConvocatoria = 'Inactivo';
                }

                function enviarEstadoDeConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/capturaDatConvocatoria.php',
                            type: 'post',
                            data: {'idConvocatoriaAGestionar': idConvocatoriaGestionar, 'estadoDeConvocatoria': estadoDeConvocatoria},
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                enviarEstadoDeConvocatoria();
                              
            });
        });
    </script>


    


















    

</html>
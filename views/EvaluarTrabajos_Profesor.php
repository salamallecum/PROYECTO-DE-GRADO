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
                                        <th class="campoTabla">Acciones</th>
                                    </tr>
                                </thead>
                            </table> 

                            <span id="resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar"></span>
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
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
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


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS TRABAJOS DESTACADOS APLICADOS A DESAFIOS-->
                    <div class="modal fade" id="modalDetallesDeTrabajoAplicadoADesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeTrabDestacadoDesafio" class="modal-body">
                            
                            <input type="hidden" name="Id" value="">
                            <input type="hidden" name="nombre_imagentrabajo">
                            <input type="hidden" name="Id_estudiante">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_trabajo" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del trabajo-->
                            <span id="panelParaImagenDelTrabajoAplicadoDesafio"></span>
                            <br>
                            <br>

                            <form id="seccionDatosDelEstudianteAplicaDesafio">
                                
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
                                <input type="text" class="email_infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <label class="subtitulosInfo">Evidencias</label><br>
                            <span id="panelDeEvidenciasTrabajoAplicadoADesafio"></span>
                            <br>
                            <br>
                           
                            <button id="btn_evaluarTrabajoAplicadoADesafio" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesEvaluarTrabajoDesafio" title="Evaluar trabajo">Evaluar</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS TRABAJOS DESTACADOS APLICADOS A DESAFIOS PERSONALIZADOS-->
                    <div class="modal fade" id="modalDetallesDeTrabajoAplicadoAPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeTrabDestacadoPropuesta" class="modal-body">
                            
                            <input type="hidden" name="Id" value="">
                            <input type="hidden" name="nombre_imagentrabajo">
                            <input type="hidden" name="Id_estudiante">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_trabajo" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del trabajo-->
                            <span id="panelParaImagenDelTrabajoAplicadoPropuesta"></span>
                            <br>
                            <br>

                            <form id="seccionDatosDelEstudianteAplicaPropuesta">
                                
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
                                <input type="text" class="email_infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <label class="subtitulosInfo">Evidencias</label><br>
                            <span id="panelDeEvidenciasTrabajoAplicadoAPropuesta"></span>
                            <br>
                            <br>
                           
                            <button id="btn_evaluarTrabajoAplicadoPropuesta" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesEvaluarTrabajoPropuesta" title="Evaluar trabajo">Evaluar</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS TRABAJOS DESTACADOS APLICADOS A EVENTOS-->
                    <div class="modal fade" id="modalDetallesDeTrabajoAplicadoAEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeTrabDestacadoEvento" class="modal-body">
                            
                            <input type="hidden" name="Id" value="">
                            <input type="hidden" name="nombre_imagentrabajo">
                            <input type="hidden" name="Id_estudiante">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_trabajo" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del trabajo-->
                            <span id="panelParaImagenDelTrabajoAplicadoEvento"></span>
                            <br>
                            <br>

                            <form id="seccionDatosDelEstudianteAplicaEvento">
                                
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
                                <input type="text" class="email_infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <label class="subtitulosInfo">Evidencias</label><br>
                            <span id="panelDeEvidenciasTrabajoAplicadoAEvento"></span>
                            <br>
                            <br>
                           
                            <button id="btn_evaluarTrabajoAplicado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesEvaluarTrabajoEvento" title="Evaluar trabajo">Evaluar</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </div>
                        </div>
                    </div>
                    </div>



                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS TRABAJOS DESTACADOS APLICADOS A CONVOCATORIAS-->
                    <div class="modal fade" id="modalDetallesDeTrabajoAplicadoAConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeTrabDestacadoConvocatoria" class="modal-body">
                            
                            <input type="hidden" name="Id" value="">
                            <input type="hidden" name="nombre_imagentrabajo">
                            <input type="hidden" name="Id_estudiante">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_trabajo" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del trabajo-->
                            <span id="panelParaImagenDelTrabajoAplicadoConvocatoria"></span>
                            <br>
                            <br>

                            <form id="seccionDatosDelEstudianteAplicaConvocatoria">
                                
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
                                <input type="text" class="email_infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <label class="subtitulosInfo">Evidencias</label><br>
                            <span id="panelDeEvidenciasTrabajoAplicadoAConvocatoria"></span>
                            <br>
                            <br>
                           
                            <button id="btnEvaluarTrabajoAplicadoADesafio" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesEvaluarTrabajoConvocatoria" title="Evaluar trabajo">Evaluar</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </div>
                        </div>
                    </div>
                    </div>



                    <!--POPUP PARA LA EVALUACION DE LOS TRABAJOS QUE FUERON APLICADOS A UN DESAFIO-->
                    <div class="modal fade" id="modalDetallesEvaluarTrabajoDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de Trabajo</h3>
                            </div>
                            <div class="modal-body">
                                
                                <form id="infoDesafio">
                                    <label class="subtitulosInfo">Nombre del desafio:</label><br>
                                    <input type="hidden" id="idDesafioCarguecontribCompetencias" name="id_desafio" value="">
                                    <input type="text" class="infoDetalleDesafio" name="nombre_desafio">
                                </form>
                                <br>                             
                            
                                <p class="enunciadoModalCompetencias">Análisis de competencias específicas realizado para el desafio. </p>
                                <br>                                 

                                <!--Este es el código que contiene las competencias específicas con su valoracion realizada para el desafio-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                    <span id="panelListaCompetenciasAnalizadasDelDesafio"></span>                                            
                                    <br>
                                        
                                </div>  
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeTrabajoAplicadoADesafio">
                                        <input type="hidden" id="txt_idDelEstudianteEvaluadoDesafio" name="Id_estudiante" value="">
                                        <input type="hidden" id="txt_idDesafioAEvaluar" name="id_desafio" value="">
                                        <input type="hidden" id="txt_idTrabajoAEvaluarDesafio" name="Id_trabajo" value="">
                                        <br>
                                        
                                        <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia alcanzado por el trabajo presentado para cada una de las siguientes competencias: </p>
                                        <br>

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluarDesafio"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>

                                        <button type="button" id="btnGuardarEvaluacionDeTrabajoAplicadoADesafio" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalResultadosEvaluacionTrabajo" title="Guardar">Guardar</button> 
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoADesafio" title="Cerrar">Cerrar</button>
                                   </form>
                                        
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>



                    <!--POPUP PARA LA EVALUACION DE LOS TRABAJOS QUE FUERON APLICADOS A UN EVENTO-->
                    <div class="modal fade" id="modalDetallesEvaluarTrabajoEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de Trabajo</h3>
                            </div>
                            <div class="modal-body">
                                
                                <form id="infoEvento">
                                    <label class="subtitulosInfo">Nombre del evento:</label><br>
                                    <input type="hidden" id="idEventoCarguecontribCompetencias" name="id_evento" value="">
                                    <input type="text" class="infoDetalleDesafio" name="nombre_evento">
                                </form>
                                <br>                             
                            
                                <p class="enunciadoModalCompetencias">Análisis de competencias específicas realizado para el evento. </p>
                                <br>                                 

                                <!--Este es el código que contiene las competencias específicas con su valoracion realizada para el evento-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                    <span id="panelListaCompetenciasAnalizadasDelEvento"></span>                                            
                                    <br>
                                        
                                </div>  
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeTrabajoAplicadoAEvento">
                                        <input type="hidden" id="txt_idDelEstudianteEvaluadoEvento" name="Id_estudiante" value="">
                                        <input type="hidden" id="txt_idEventoAEvaluar" name="id_evento" value="">
                                        <input type="hidden" id="txt_idTrabajoAEvaluarEvento" name="Id_trabajo" value="">
                                        <br>
                                        
                                        <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia alcanzado por el trabajo presentado para cada una de las siguientes competencias: </p>
                                        <br>

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluarEvento"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>

                                        <button type="button" id="btnGuardarEvaluacionDeTrabajoAplicadoAEvento" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalResultadosEvaluacionTrabajo" title="Guardar">Guardar</button> 
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAEvento" title="Cerrar">Cerrar</button>
                                   </form>
                                        
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>



                    <!--POPUP PARA LA EVALUACION DE LOS TRABAJOS QUE FUERON APLICADOS A UNA CONVOCATORIA-->
                    <div class="modal fade" id="modalDetallesEvaluarTrabajoConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de Trabajo</h3>
                            </div>
                            <div class="modal-body">
                                
                                <form id="infoConvocatoria">
                                    <label class="subtitulosInfo">Nombre de convocatoria:</label><br>
                                    <input type="hidden" id="idConvocatoriaCarguecontribCompetencias" name="Id" value="">
                                    <input type="text" class="infoDetalleDesafio" name="nombre_convocatoria">
                                </form>
                                <br>                             
                            
                                <p class="enunciadoModalCompetencias">Análisis de competencias específicas realizado para la convocatoria. </p>
                                <br>                                 

                                <!--Este es el código que contiene las competencias específicas con su valoracion realizada para la convocatoria-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                    <span id="panelListaCompetenciasAnalizadasDeLaConvocatoria"></span>                                            
                                    <br>
                                        
                                </div>  
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeTrabajoAplicadoAConvocatoria">
                                        <input type="hidden" id="txt_idDelEstudianteEvaluadoConvocatoria" name="Id_estudiante" value="">
                                        <input type="hidden" id="txt_idConvocatoriaAEvaluar" name="Id" value="">
                                        <input type="hidden" id="txt_idTrabajoAEvaluarConvocatoria" name="Id_trabajo" value="">
                                        <br>
                                        
                                        <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia alcanzado por el trabajo presentado para cada una de las siguientes competencias: </p>
                                        <br>

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluarConvocatoria"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>

                                        <button type="button" id="btnGuardarEvaluacionDeTrabajoAplicadoAConvocatoria" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalResultadosEvaluacionTrabajo" title="Guardar">Guardar</button> 
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAConvocatoria" title="Cerrar">Cerrar</button>
                                   </form>
                                        
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>



                    <!--POPUP PARA LA EVALUACION DE LOS TRABAJOS QUE FUERON APLICADOS A UNA PROPUESTA-->
                    <div class="modal fade" id="modalDetallesEvaluarTrabajoPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de Trabajo</h3>
                            </div>
                            <div class="modal-body">
                                
                                <form id="infoPropuesta">
                                    <label class="subtitulosInfo">Nombre de propuesta:</label><br>
                                    <input type="hidden" id="idPropuestaCarguecontribCompetencias" name="Id" value="">
                                    <input type="hidden" id="idDesafioQueSustituyePropuesta" name="idDesafioASustituir" value="">
                                    <input type="text" class="infoDetalleDesafio" name="nombre_desafioP">
                                </form>
                                <br>                             
                            
                                <p class="enunciadoModalCompetencias">Análisis de competencias específicas realizado para la propuesta. </p>
                                <br>                                 

                                <!--Este es el código que contiene las competencias específicas con su valoracion realizada para la propuesta (es decir del desafio que sustituye)-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                    <span id="panelListaCompetenciasAnalizadasDeLaPropuesta"></span>                                            
                                    <br>
                                        
                                </div>  
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeTrabajoAplicadoAPropuesta">
                                        <input type="hidden" id="txt_idDelEstudianteEvaluadoPropuesta" name="Id_estudiante" value="">
                                        <input type="hidden" id="txt_idPropuestaAEvaluar" name="Id" value="">
                                        <input type="hidden" id="txt_idTrabajoAEvaluarPropuesta" name="Id_trabajo" value="">
                                        <br>
                                        
                                        <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia alcanzado por el trabajo presentado para cada una de las siguientes competencias: </p>
                                        <br>

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluarPropuesta"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>

                                        <button type="button" id="btnGuardarEvaluacionDeTrabajoAplicadoAPropuesta" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalResultadosEvaluacionTrabajo" title="Guardar">Guardar</button> 
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesDeTrabajoAplicadoAPropuesta" title="Cerrar">Cerrar</button>
                                   </form>
                                        
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>






                    <!--POPUP PARA LA PRESENTACION DE LOS RESULTADOS OBTENIDO EN LA EVALUACION DE COMPETENCIAS REALIZADA AL TRABAJO-->
                    <div class="modal fade" id="modalResultadosEvaluacionTrabajo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Resultados de Evaluación</h3>
                            </div>
                            <div class="modal-body">

                                <form id="informacionGeneral">
                                    <label class="subtitulosInfo">Nombre del trabajo:</label><br>
                                    <input type="hidden" id="idTrabajoInvolucrado" name="Id_trabajo" value="">
                                    <input type="text" class="infoDetalleDesafio" name="nombre_trabajo">
                                </form>
                                <br>  
                                                            
                                <p class="enunciadoModalCompetencias">MegaInsignias obtenidas: </p>
                                <br>                                 

                                <!--Este es el código que contiene las competencias generales con su tipo de insignia obtenida por el trabajo en la evaluacion-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                         
                                    <span id="panelListaMegaInsigniasGanadasEnEvaluacion"></span>                                            
                                    <br>
                                </div>  
                                <br>

                                <p class="enunciadoModalCompetencias">Insignias obtenidas: </p>
                                <br> 

                                <!--Este es el código que contiene las competencias especificas con su tipo de insignia obtenida por el trabajo en la evaluacion-->
                                <div class="contenedorCompeEspeciasAEvaluar">                                         
                                    <span id="panelListaInsigniasGanadasEnEvaluacion"></span>                                            
                                    <br>
                                </div>  
                                <br>

                                <button id="btn_finalizarEvaluacion" onclick="limpiarComponentesYRecargarPagina()" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Finalizar">Finalizar</button>
                                         
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

    <!--Funcion que resetea el span de la tabla de actividades y el span de la logica de las actividades-->
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

    <!--Funcion que recarga la pagina-->
    <script>
        function limpiarComponentesYRecargarPagina(){
            document.getElementById('panelListaMegaInsigniasGanadasEnEvaluacion').innerHTML="";
            document.getElementById('panelListaInsigniasGanadasEnEvaluacion').innerHTML="";
            window.location.reload(true);
        }
    </script>


    <!--Funcion que resetea el span de la tabla de trabajos aplicados-->
    <script>
        function resetSpanTablaTrabajosDestacados(){
            document.getElementById('resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar').innerHTML="";
        }   
        
        //Asignamos el evento de reseteo a los botones que hacen la busqueda de los trabajos destacados aplicados de los desafios, propuestas, eventos y convocatorias
        $('.btnListarTrabajosDestacadosDesafio').click(function(){
            resetSpanTablaTrabajosDestacados();
        });

        $('.btnListarTrabajosDestacadosPropuesta').click(function(){
            resetSpanTablaTrabajosDestacados();
        });

        $('.btnListarTrabajosDestacadosEvento').click(function(){
            resetSpanTablaTrabajosDestacados();
        });

        $('.btnListarTrabajosDestacadosConvocatoria').click(function(){
            resetSpanTablaTrabajosDestacados();
        });

    </script>


    <!-----------------------------------------------------TABLA DE ACTIVIDADES------------------------------------------------------------------------------>

    <!--Aqui declaramos las funciones para la visualizacion y gestion de los desafios en la tabla actividades-->
    <script>
        function funcionesParaGestionDesafio(){

            $(".btnDetallesDesafio").click(function(){
                                            
                var idDesafioAAplicar = $(this).data("id");
                                
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioAAplicar": idDesafioAAplicar },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeDesafio";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);

                        var desafioActivo = document.getElementById("txt_estadoDesafio").value;

                        if(desafioActivo == "Activo"){
                            $("#check_estadoDesafio").prop("checked", true);
                        }else{
                            $("#check_estadoDesafio").prop("checked", false);
                        }

                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
    
            $(".btnDetallesDesafio").click(function(){
                    
                var idDesafioAAplicarImagen = $(this).data("id");
                
                function verificacionDeImagenParaDesafioAAplicar() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioAAplicarImagen": idDesafioAAplicarImagen},
                            success: function(response){
                                resolve(response)
                                $("#panelParaImagenDelDesafio").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaDesafioAAplicar();
                        
            });
                    

            $(".btnDetallesDesafio").click(function(){
                    
                var idDesafioAAplicarEnunciado = $(this).data("id");
                
                function verificacionDeEnunciadoParaDesafioAAplicar() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioAAplicarEnunciado": idDesafioAAplicarEnunciado},
                            success: function(response){
                                resolve(response)
                                $("#panelParaBotonDescargaEnunciadoDesafio").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEnunciadoParaDesafioAAplicar();                            
            });
                     
            
            $(".btnListarTrabajosDestacadosDesafio").click(function(){
                    
                var idDesafioParaConsultarSusTrabajosAplicados = $(this).data("id");

                function consultaDeTrabajosDestacadosAplicadosAUnDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioParaConsultarSusTrabajosAplicados": idDesafioParaConsultarSusTrabajosAplicados},
                            success: function(response){
                                resolve(response)
                                $("#resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                consultaDeTrabajosDestacadosAplicadosAUnDesafio();
                                        
            });
        }
    </script>


    <!--Aqui declaramos las funciones para la visualizacion y gestion de las propuestas en la tabla actividades-->
    <script>
        function funcionesParaGestionDesafiosPersonalizados(){

            $(".btnDetallesPropuesta").click(function(){
                                                
                var idPropuestaDetallesModalAprobada = $(this).data("id");
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idPropuestaDetallesModalAprobada": idPropuestaDetallesModalAprobada },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDePropuestaAprobada";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
    
       
            //Script que permite pasar el id de una propuesta aprobada con el fin de identificar si tiene imagen almacenada o no
            $(".btnDetallesPropuesta").click(function(){
                    
                var idPropuestaImagenAprobada = $(this).data("id");
                
                function verificacionDeImagenParaPropuestaModalAprobada() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idPropuestaImagenAprobada": idPropuestaImagenAprobada},
                            success: function(response){
                                resolve(response)
                                $("#panelParaImagenDeLaPropuesta").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaPropuestaModalAprobada();
                        
            });
    

            //Script que permite traer el nombre del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles de la misma en estado "Aprobada"-->
            $(".btnDetallesPropuesta").click(function(){
                
                var idDesafioQSePretendeSustituirParaModalAprobada = $(this).data("desafio");
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioQSePretendeSustituirParaModalAprobada": idDesafioQSePretendeSustituirParaModalAprobada },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#infoDesafioAReemplazar";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
            
            //Script que permite pasar el id de un desafio personalizado con el fin de identificar si tiene enunciado almacenado o no-->
            $(".btnDetallesPropuesta").click(function(){
                    
                var idPropuestaParaBuscarEnunciado = $(this).data("id");
                
                function verificacionDeEnunciadoParaPropuesta() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idPropuestaParaBuscarEnunciado": idPropuestaParaBuscarEnunciado},
                            success: function(response){
                                resolve(response)
                                $("#panelParaBotonDescargaEnunciado").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEnunciadoParaPropuesta();
                        
            });
        
    
            //Script que permite traer los datos del estudiante que propuso el desafio personalizado a la ventana modal de detalles de la misma"--> 
            $(".btnDetallesPropuesta").click(function(){
                
                var idEstudianteQProponeParaModal = $(this).data("estudiante");
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEstudianteQProponeParaModal": idEstudianteQProponeParaModal},
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#seccionDatosEstudiante";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });

    
            //Script que permite traer el Id del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles del mismo para el estado "Aprobada"-->    
            $(".btnDetallesPropuesta").click(function(){
                
                var idDesafioQSePretendeSustituirParaModalDetallesDesafio = $(this).data("desafio");
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioQSePretendeSustituirParaModalDetallesDesafio": idDesafioQSePretendeSustituirParaModalDetallesDesafio },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeDesafioASustituir";

                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
    
            //Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene imagen almacenada o no (Cuando la propuesta esta en estado por revisar)-->
            $(".btnDetallesPropuesta").click(function(){
                    
                var idImagenDesafioPropuesta = $(this).data("desafio");
                
                function verificacionDeImagenParaDesafioAfectadoPorPropuesta() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idImagenDesafioPropuesta": idImagenDesafioPropuesta},
                            success: function(response){
                                resolve(response)
                                $("#panelParaImagenDelDesafioASustituir").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaDesafioAfectadoPorPropuesta();
                        
            });
            

            //Script que permite pasar el id de un desafio a contribuir por una propuesta con el fin de identificar si tiene enunciado almacenado o no -->
            $(".btnDetallesPropuesta").click(function(){
                    
                var idEnunciadoDesafioPropuesta = $(this).data("desafio");
                
                function verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEnunciadoDesafioPropuesta": idEnunciadoDesafioPropuesta},
                            success: function(response){
                                resolve(response)
                                $("#panelParaEnunciadoDelDesafioASustituir").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta();
                        
            });

            //Script que permite mostrar en la tabla de trabajos los trabajos destacados que fueron aplicados a un desafio personalizado
            $(".btnListarTrabajosDestacadosPropuesta").click(function(){
                    
                    var idPropuestaParaConsultarSusTrabajosAplicados = $(this).data("id");
    
                    function consultaDeTrabajosDestacadosAplicadosAUnDesafioPersonalizado() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: "logic/utils/ajaxfile.php",
                                type: "post",
                                data: {"idPropuestaParaConsultarSusTrabajosAplicados": idPropuestaParaConsultarSusTrabajosAplicados},
                                success: function(response){
                                    resolve(response)
                                    $("#resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar").html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                
                    consultaDeTrabajosDestacadosAplicadosAUnDesafioPersonalizado();
                                            
                });

        }
    </script>

    
    <!--Aqui declaramos las funciones para la visualizacion y gestion de los eventos en la tabla actividades-->
    <script>
        function funcionesParaGestionEventos(){

            //Script que permite pasar los datos de un evento a la ventana modal Aplicacion a un evento-->                         
            $(".btnDetallesEvento").click(function(){
                
                var idEventoAAplicar = $(this).data("id");
                                                        
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEventoAAplicar": idEventoAAplicar },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var modalShare = "#detallesDeEvento";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", modalShare).val(value);

                        var eventoActivo = document.getElementById("txt_estadoEvento").value;

                        if(eventoActivo == "Activo"){
                            $("#check_estadoEvento").prop("checked", true);
                        }else{
                            $("#check_estadoEvento").prop("checked", false);
                        }
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });                      
                                
            //Script que permite pasar el id de un evento con el fin de identificar si tiene imagen almacenada o no-->
            $(".btnDetallesEvento").click(function(){
                            
                var idEventoAAplicarImagen = $(this).data("id");
                
                function verificacionDeImagenParaEventoAAplicar() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEventoAAplicarImagen": idEventoAAplicarImagen},
                            success: function(response){
                                resolve(response)
                                $("#panelParaImagenDelEvento").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaEventoAAplicar();
                        
            });
                                 
            //Script que permite pasar el id de un evento con el fin de identificar si tiene enunciado almacenado o no-->                 
            $(".btnDetallesEvento").click(function(){
                    
                var idEventoAAplicarEnunciado = $(this).data("id");
                
                function verificacionDeEnunciadoParaEventoAAplicar() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEventoAAplicarEnunciado": idEventoAAplicarEnunciado},
                            success: function(response){
                                resolve(response)
                                $("#panelParaEnunciadoDelEvento").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEnunciadoParaEventoAAplicar();                            
            });

            //Script que permite consultar los trabajos destacados que han sido aplicados a un desafio personalizado
            $(".btnListarTrabajosDestacadosPropuesta").click(function(){
                    
                var idPropuestaParaConsultarSusTrabajosAplicados = $(this).data("id");
                console.log(idDesafioParaConsultarSusTrabajosAplicados);

                function consultaDeTrabajosDestacadosAplicadosAUnDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idDesafioParaConsultarSusTrabajosAplicados": idDesafioParaConsultarSusTrabajosAplicados},
                            success: function(response){
                                console.log(response);
                                resolve(response)
                                $("#resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                consultaDeTrabajosDestacadosAplicadosAUnDesafio();
                                        
            });

            //Script que permite mostrar en la tabla de trabajos los trabajos destacados que fueron aplicados a un evento
            $(".btnListarTrabajosDestacadosEvento").click(function(){
                    
                var idEventoParaConsultarSusTrabajosAplicados = $(this).data("id");

                function consultaDeTrabajosDestacadosAplicadosAUnEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idEventoParaConsultarSusTrabajosAplicados": idEventoParaConsultarSusTrabajosAplicados},
                            success: function(response){
                                resolve(response)
                                $("#resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                consultaDeTrabajosDestacadosAplicadosAUnEvento();
                                        
            });
                          
        }
    </script>












    <!--Aqui declaramos las funciones para la visualizacion y gestion de las convocatorias en la tabla actividades-->
    <script>
        function funcionesParaGestionConvocatorias(){

            //Script que permite pasar los datos de una convocatoria comite  a la ventana modal Aplicacion a una convocatoria-->                        
            $(".btnDetallesConvocatoria").click(function(){
                
                var idConvComAAplicar = $(this).data("id");
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idConvComAAplicar": idConvComAAplicar },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeConvocatoria";
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);

                        var convActiva = document.getElementById("txt_estadoConvocatoria").value;

                        if(convActiva == "Activo"){
                            $("#check_estadoConvocatoria").prop("checked", true);
                        }else{
                            $("#check_estadoConvocatoria").prop("checked", false);
                        }
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
                                        
                                    
            //Script que permite pasar el id de una convocatoria comite con el fin de identificar si tiene imagen almacenada o no-->
            $(".btnDetallesConvocatoria").click(function(){
                    
                var idConvComAAplicarImagen = $(this).data("id");
                
                function verificacionDeImagenParaConvocatoriaComiteAAplicar() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idConvComAAplicarImagen": idConvComAAplicarImagen},
                            success: function(response){
                                resolve(response)
                                $("#panelParaImagenDeConvocatoria").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaConvocatoriaComiteAAplicar();
                        
            });
                                        
            //Script que permite pasar el id de una convocatoria comite con el fin de identificar si tiene enunciado almacenado o no-->
            $(".btnDetallesConvocatoria").click(function(){
                    
                var idConvComAAplicarEnunciado = $(this).data("id");
                
                function verificacionDeEnunciadoParaConvocatoriaComiteAAplicar() {
                    return new Promise((resolve, reject) => {
                            // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idConvComAAplicarEnunciado": idConvComAAplicarEnunciado},
                            success: function(response){
                                resolve(response)
                                $("#panelParaEnunciadoDeConvocatoria").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEnunciadoParaConvocatoriaComiteAAplicar();                            
            });

            //Script que permite mostrar en la tabla de trabajos los trabajos destacados que fueron aplicados a una convocatoria
            $(".btnListarTrabajosDestacadosConvocatoria").click(function(){
                    
                var idConvocatoriaParaConsultarSusTrabajosAplicados = $(this).data("id");

                function consultaDeTrabajosDestacadosAplicadosAUnaConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idConvocatoriaParaConsultarSusTrabajosAplicados": idConvocatoriaParaConsultarSusTrabajosAplicados},
                            success: function(response){
                                resolve(response)
                                $("#resultadosDeBusquedaTablaTrabajosDestacadosPorEvaluar").html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
            
                consultaDeTrabajosDestacadosAplicadosAUnaConvocatoria();
                                        
            });
                                        
        }
    </script>









    <!-----------------------------------------------------TABLA DE TRABAJOS------------------------------------------------------------------------------>

    <!--Aqui declaramos las funciones para la visualizacion y gestion de los trabajos que son aplicados a un desafio determinado en la tabla de trabajos-->
    <script>
        function funcionesParaRevisionDeTrabajosAplicadosADesafios(){

            //Este script permite cargar la informacion de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoADesafio").click(function(){
                                            
                var idTrabajoAEvaluarDesafio = $(this).data("id");
                                
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idTrabajoAEvaluar": idTrabajoAEvaluarDesafio },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeTrabDestacadoDesafio";
                    var formEvaluacion = "#formularioDeEvaluacionDeTrabajoAplicadoADesafio"
                    var formResultadosEvaluacion = "#informacionGeneral"
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                        $("[name="+key+"]", formEvaluacion).val(value);
                        $("[name="+key+"]", formResultadosEvaluacion).val(value);
                        
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });

           
            //Este script permite cargar la imagen de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoADesafio").click(function(){
                                            
                var idImagenTrabajoAEvaluarDesafio = $(this).data("id");
                    
                function verificacionDeImagenParaTrabajoAplicadoDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idImagenTrabajoAEvaluar': idImagenTrabajoAEvaluarDesafio},
                            success: function(response){
                                resolve(response)
                                $('#panelParaImagenDelTrabajoAplicadoDesafio').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaTrabajoAplicadoDesafio();
                    
            });

            //Este script permite cargar las evidencias de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoADesafio").click(function(){
                                            
                var idEvidenciasTrabajoAEvaluarDesafio = $(this).data("id");
                    
                function verificacionDeEvidenciasParaTrabajoAplicadoDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEvidenciasTrabajoAEvaluar': idEvidenciasTrabajoAEvaluarDesafio},
                            success: function(response){
                                resolve(response)
                                $('#panelDeEvidenciasTrabajoAplicadoADesafio').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEvidenciasParaTrabajoAplicadoDesafio();
                    
            });

            //Script que permite traer los datos del estudiante al modal de un trabajo destacado aplicado a un desafio y al modal de evaluacion
            $('.btnDetallesTrabajoAplicadoADesafio').click(function(){
                    
                var idEstudianteTrabajoAplicadoDesafio = $(this).data('estudiante');
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEstudianteTrabajoAplicado': idEstudianteTrabajoAplicadoDesafio },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = '#seccionDatosDelEstudianteAplicaDesafio';
                    var modalEvaluacion = '#formularioDeEvaluacionDeTrabajoAplicadoADesafio';
                    $.each(data, function(key, value){
                        $('[name='+key+']', formId).val(value);
                        $('[name='+key+']', modalEvaluacion).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });

            //Script que permite pasar el id del desafio con el fin de cargar su informacion en el modal de evaluacion de trabajos aplicados a un desafio
            $('.btnDetallesTrabajoAplicadoADesafio').click(function(){

                var infoDesafioAlQueFueAplicado = $(this).data('desafio');

                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idDesafioQSePretendeSustituirParaModalAprobada': infoDesafioAlQueFueAplicado },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    console.log()
                    var data = $.parseJSON(response)[0];
                    var informacionDeDesafio = '#infoDesafio';
                    var formularioDeEvaluacionDeTrabajoAplicadoADesafio = '#formularioDeEvaluacionDeTrabajoAplicadoADesafio';
                    $.each(data, function(key, value){
                        $('[name='+key+']', informacionDeDesafio).val(value);
                        $('[name='+key+']', formularioDeEvaluacionDeTrabajoAplicadoADesafio).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
            }); 

            //Script que permite cargar el analisis de competencias específicas realizado a un desafio en el modal de evaluacion de trabajos aplicados a un desafio
            $('.btnDetallesTrabajoAplicadoADesafio').click(function(){

                var idDelDesafioAConsultarAnalisis = $(this).data('desafio');
                var tipoActividad = "DESAFIO";

                function obtenerAnalisisDeCompetenciasRealizadoAUnDesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadAConsultarCompetencias': idDelDesafioAConsultarAnalisis, 'tipoDeActividad': tipoActividad},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAnalizadasDelDesafio').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerAnalisisDeCompetenciasRealizadoAUnDesafio();

            });

            //Script que permite cargar el formulario de evaluacion de competencias para la certificacion de un trabajo aplicado a un desafio
            $('.btnDetallesTrabajoAplicadoADesafio').click(function(){

                var idDelDesafioAConsultarCompetenciasParaEvaluacion = $(this).data('desafio');
                var tipoActividadInvolucrada = "DESAFIO";

                function obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoADesafio() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadParaEvaluarCompetenciasTrabajo': idDelDesafioAConsultarCompetenciasParaEvaluacion, 'tipoDeActividadInvolucrada': tipoActividadInvolucrada},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAEvaluarDesafio').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoADesafio();

            }); 

        }
    </script>

    <!--Script que permite el registro de la evaluación realizada a un trabajo que fue aplicado a un desafio--> 
    <script type='text/javascript'>

        $(document).ready(function(){
                       
            $('#btnGuardarEvaluacionDeTrabajoAplicadoADesafio').click(function() {
                    
                //En este bloque pasamos el id del desafio para tener el cuenta en la insercion de datos
                var idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoDesafio = document.getElementById('txt_idDelEstudianteEvaluadoDesafio').value;
                var idDelTrabajoEvaluadoDesafio = document.getElementById('txt_idTrabajoAEvaluarDesafio').value;
                var idDelDesafioAEvaluar = document.getElementById('txt_idDesafioAEvaluar').value;
                var tipoActividadDesafio = "DESAFIO";
                var contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoDesafio = document.getElementsByClassName('contenedorRespContribucionCompEsp');
                var arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio = []; 
                var arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio = []; 

                var idDelTrabajoAConsultarMegaInsigObtenidasDesafio = document.getElementById('idTrabajoInvolucrado').value;
                var idDelTrabajoAConsultarInsigObtenidasDesafio = document.getElementById('idTrabajoInvolucrado').value;
            
                for (let item of contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoDesafio) {
                    arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio.push(item.id)  
                }
                
                //Recogemos lo marcado por el usario en los radiobuttons
                for (let item of arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio) {
                    var radioButtonsCmpEspecifica = document.getElementsByName(item);
                    
                    for (var i = 0, length = radioButtonsCmpEspecifica.length; i < length; i++) {
                        if (radioButtonsCmpEspecifica[i].checked) {
                            arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio.push(radioButtonsCmpEspecifica[i].value);
                            break;
                        }
                    }
                }

                var numeroDeCompEspecificas = arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio.length;

                if(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio.length > 0 && arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio.length == numeroDeCompEspecificas){

                    function evaluarTrabajoAplicadoAUnDesafio() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo': idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoDesafio, 'idActividad':idDelDesafioAEvaluar, 'tipoActividad':tipoActividadDesafio, 'idDelTrabajo': idDelTrabajoEvaluadoDesafio, 'arregloCodigosCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio), 'arregloNivelesContribucionCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoDesafio)},
                                success: function(response){
                                    resolve(response) 
                                },
                                error: function (error) {
                                reject(error)
                                console.log(error);
                                },
                            });
                        })
                    }

                    function obtenerMegaInsigniasDeUnTrabajoAplicadoADesafio() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoMegaInsigniasObtenidas': idDelTrabajoAConsultarMegaInsigObtenidasDesafio},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaMegaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    function obtenerInsigniasDeUnTrabajoAplicadoADesafio() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoInsigniasObtenidas': idDelTrabajoAConsultarInsigObtenidasDesafio},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }
                
                    evaluarTrabajoAplicadoAUnDesafio()
                    .then((response) => {

                        obtenerMegaInsigniasDeUnTrabajoAplicadoADesafio();
                        obtenerInsigniasDeUnTrabajoAplicadoADesafio();

                    })
                    .catch((error) => {
                        console.log(error)
                    })
               
                }else{
                    alert('Debe evaluar todas las competencias específicas propuestas.');
                    return false;
                }                     
                
            });
        });
    
    </script>




    <!--Aqui declaramos las funciones para la visualizacion y gestion de los trabajos que son aplicados a un desafio personalizado determinado en la tabla de trabajos-->
    <script>
        function funcionesParaRevisionDeTrabajosAplicadosAPropuestas(){

            //Este script permite cargar la informacion de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAPropuesta").click(function(){
                                            
                var idTrabajoAEvaluarPropuesta = $(this).data("id");
                                
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idTrabajoAEvaluar": idTrabajoAEvaluarPropuesta },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeTrabDestacadoPropuesta";
                    var formEvaluacion = "#formularioDeEvaluacionDeTrabajoAplicadoAPropuesta"
                    var formResultadosEvaluacion = "#informacionGeneral"
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                        $("[name="+key+"]", formEvaluacion).val(value);
                        $("[name="+key+"]", formResultadosEvaluacion).val(value);
                        
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
                                                       
            //Este script permite cargar la imagen de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAPropuesta").click(function(){
                                            
                var idImagenTrabajoAEvaluarPropuesta = $(this).data("id");
                    
                function verificacionDeImagenParaTrabajoAplicadoPropuesta() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idImagenTrabajoAEvaluar': idImagenTrabajoAEvaluarPropuesta},
                            success: function(response){
                                resolve(response)
                                $('#panelParaImagenDelTrabajoAplicadoPropuesta').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaTrabajoAplicadoPropuesta();
                    
            });
                            
            //Este script permite cargar las evidencias de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAPropuesta").click(function(){
                                            
                var idEvidenciasTrabajoAEvaluarPropuesta = $(this).data("id");
                    
                function verificacionDeEvidenciasParaTrabajoAplicadoPropuesta() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEvidenciasTrabajoAEvaluar': idEvidenciasTrabajoAEvaluarPropuesta},
                            success: function(response){
                                resolve(response)
                                $('#panelDeEvidenciasTrabajoAplicadoAPropuesta').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEvidenciasParaTrabajoAplicadoPropuesta();
                    
            });
                            
            //Script que permite traer los datos del estudiante al modal de un trabajo destacado aplicado a un desafio personalizado
            $('.btnDetallesTrabajoAplicadoAPropuesta').click(function(){
                    
                var idEstudianteTrabajoAplicadoPropuesta = $(this).data('estudiante');
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEstudianteTrabajoAplicado': idEstudianteTrabajoAplicadoPropuesta },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = '#seccionDatosDelEstudianteAplicaPropuesta';
                    $.each(data, function(key, value){
                        $('[name='+key+']', formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
        
            //Script que permite pasar el id del desafio con el fin de cargar su informacion en el modal de evaluacion de trabajos aplicados a una propuesta
            $('.btnDetallesTrabajoAplicadoAPropuesta').click(function(){

                var infoPropuestaAlQueFueAplicado = $(this).data('propuesta');

                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idPropuestaEdit': infoPropuestaAlQueFueAplicado },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    console.log()
                    var data = $.parseJSON(response)[0];
                    var informacionDePropuesta = '#infoPropuesta';
                    $.each(data, function(key, value){
                        $('[name='+key+']', informacionDePropuesta).val(value);
                        $('[name='+key+']', formularioDeEvaluacionDeTrabajoAplicadoAPropuesta).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })

            });

            //Script que permite cargar el analisis de competencias específicas realizado a un desafio en el modal de evaluacion de trabajos aplicados a un desafio
            $('#btn_evaluarTrabajoAplicadoPropuesta').click(function(){

                //Obtenemos el id del desafio al que contribuye la propuesta, no el de la propuesta en si, para así traer sus competencias
                var idDePropuestaParaConsultarAnalisis = document.getElementById('idDesafioQueSustituyePropuesta').value; 
                var tipoActividad = "DESAFIO";

                function obtenerAnalisisDeCompetenciasRealizadoAUnaPropuesta() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadAConsultarCompetencias': idDePropuestaParaConsultarAnalisis, 'tipoDeActividad': tipoActividad},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAnalizadasDeLaPropuesta').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerAnalisisDeCompetenciasRealizadoAUnaPropuesta();

            });

            //Script que permite cargar el formulario de evaluacion de competencias para la certificacion de un trabajo aplicado a un desafio
            $('#btn_evaluarTrabajoAplicadoPropuesta').click(function(){           

                //Obtenemos el id del desafio al que contribuye la propuesta, no el de la propuesta en si, para así traer sus competencias
                var idDePropuestaAConsultarCompetenciasParaEvaluacion = document.getElementById('idDesafioQueSustituyePropuesta').value; 
                var tipoActividadInvolucrada = "DESAFIO";

                function obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAPropuesta() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadParaEvaluarCompetenciasTrabajo': idDePropuestaAConsultarCompetenciasParaEvaluacion, 'tipoDeActividadInvolucrada': tipoActividadInvolucrada},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAEvaluarPropuesta').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAPropuesta();

            }); 

        }
    </script>
        
    <!--Script que permite el registro de la evaluación realizada a un trabajo que fue aplicado a una propuesta-->
    <script type='text/javascript'>

        $(document).ready(function(){
            
            $('#btnGuardarEvaluacionDeTrabajoAplicadoAPropuesta').click(function() {
            
                //En este bloque pasamos el id del desafio para tener el cuenta en la insercion de datos
                var idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoPropuesta = document.getElementById('txt_idDelEstudianteEvaluadoPropuesta').value;
                var idDelTrabajoEvaluadoPropuesta = document.getElementById('txt_idTrabajoAEvaluarPropuesta').value;
                var idDePropuestaAEvaluar = document.getElementById('txt_idPropuestaAEvaluar').value;
                var tipoActividadPropuesta = "DESAF PERSONAL";
                var contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoPropuesta = document.getElementsByClassName('contenedorRespContribucionCompEsp');
                var arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta = []; 
                var arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta = []; 

                var idDelTrabajoAConsultarMegaInsigObtenidasPropuesta = document.getElementById('idTrabajoInvolucrado').value;
                var idDelTrabajoAConsultarInsigObtenidasPropuesta = document.getElementById('idTrabajoInvolucrado').value;

                for (let item of contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoPropuesta) {
                    arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta.push(item.id)  
                }

                //Recogemos lo marcado por el usario en los radiobuttons
                for (let item of arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta) {
                    var radioButtonsCmpEspecifica = document.getElementsByName(item);
                    
                    for (var i = 0, length = radioButtonsCmpEspecifica.length; i < length; i++) {
                        if (radioButtonsCmpEspecifica[i].checked) {
                            arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta.push(radioButtonsCmpEspecifica[i].value);
                            break;
                        }
                    }
                }

                var numeroDeCompEspecificas = arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta.length;

                if(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta.length > 0 && arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta.length == numeroDeCompEspecificas){

                    function evaluarTrabajoAplicadoAUnaPropuesta() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo': idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoPropuesta, 'idActividad':idDePropuestaAEvaluar, 'tipoActividad':tipoActividadPropuesta, 'idDelTrabajo': idDelTrabajoEvaluadoPropuesta, 'arregloCodigosCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta), 'arregloNivelesContribucionCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoPropuesta)},
                                success: function(response){
                                    resolve(response) 
                                },
                                error: function (error) {
                                reject(error)
                                console.log(error);
                                },
                            });
                        })
                    }

                    function obtenerMegaInsigniasDeUnTrabajoAplicadoAPropuesta() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoMegaInsigniasObtenidas': idDelTrabajoAConsultarMegaInsigObtenidasPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaMegaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    function obtenerInsigniasDeUnTrabajoAplicadoAPropuesta() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoInsigniasObtenidas': idDelTrabajoAConsultarInsigObtenidasPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    evaluarTrabajoAplicadoAUnaPropuesta()
                    .then((response) => {

                        obtenerMegaInsigniasDeUnTrabajoAplicadoAPropuesta();
                        obtenerInsigniasDeUnTrabajoAplicadoAPropuesta();

                    })
                    .catch((error) => {
                        console.log(error)
                    })

                }else{
                    alert('Debe evaluar todas las competencias específicas propuestas.');
                    return false;
                }                     

            });
        });
    
    </script>






    <!--Aqui declaramos las funciones para la visualizacion y gestion de los trabajos que son aplicados a un evento determinado en la tabla de trabajos-->
    <script>
        function funcionesParaRevisionDeTrabajosAplicadosAEventos(){

            //Este script permite cargar la informacion de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAEvento").click(function(){
                                            
                var idTrabajoAEvaluarEvento = $(this).data("id");
                                
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idTrabajoAEvaluar": idTrabajoAEvaluarEvento },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeTrabDestacadoEvento";
                    var formEvaluacion = "#formularioDeEvaluacionDeTrabajoAplicadoAEvento"
                    var formResultadosEvaluacion = "#informacionGeneral"
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                        $("[name="+key+"]", formEvaluacion).val(value);
                        $("[name="+key+"]", formResultadosEvaluacion).val(value);
                        
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
                                                                                   
            //Este script permite cargar la imagen de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAEvento").click(function(){
                                            
                var idImagenTrabajoAEvaluarEvento = $(this).data("id");
                    
                function verificacionDeImagenParaTrabajoAplicadoEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idImagenTrabajoAEvaluar': idImagenTrabajoAEvaluarEvento},
                            success: function(response){
                                resolve(response)
                                $('#panelParaImagenDelTrabajoAplicadoEvento').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaTrabajoAplicadoEvento();
                    
            });
                                                        
            //Este script permite cargar las evidencias de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAEvento").click(function(){
                                            
                var idEvidenciasTrabajoAEvaluarEvento = $(this).data("id");
                    
                function verificacionDeEvidenciasParaTrabajoAplicadoEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEvidenciasTrabajoAEvaluar': idEvidenciasTrabajoAEvaluarEvento},
                            success: function(response){
                                resolve(response)
                                $('#panelDeEvidenciasTrabajoAplicadoAEvento').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEvidenciasParaTrabajoAplicadoEvento();
                    
            });
                                                        
            //Script que permite traer los datos del estudiante al modal de un trabajo destacado aplicado a un evento
            $('.btnDetallesTrabajoAplicadoAEvento').click(function(){
                    
                var idEstudianteTrabajoAplicadoEvento = $(this).data('estudiante');
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEstudianteTrabajoAplicado': idEstudianteTrabajoAplicadoEvento },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = '#seccionDatosDelEstudianteAplicaEvento';
                    $.each(data, function(key, value){
                        $('[name='+key+']', formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
        
            //Script que permite pasar el id del evento con el fin de cargar su informacion en el modal de evaluacion de trabajos aplicados a un evento
            $('.btnDetallesTrabajoAplicadoAEvento').click(function(){

                var infoEventoAlQueFueAplicado = $(this).data('evento');

                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEventoEdit': infoEventoAlQueFueAplicado },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    console.log()
                    var data = $.parseJSON(response)[0];
                    var informacionDeEvento = '#infoEvento';
                    var formularioDeEvaluacionDeTrabajoAplicadoAEvento = '#formularioDeEvaluacionDeTrabajoAplicadoAEvento';
                    $.each(data, function(key, value){
                        $('[name='+key+']', informacionDeEvento).val(value);
                        $('[name='+key+']', formularioDeEvaluacionDeTrabajoAplicadoAEvento).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })

            }); 

            //Script que permite cargar el analisis de competencias específicas realizado a un evento en el modal de evaluacion de trabajos aplicados a un evento
            $('.btnDetallesTrabajoAplicadoAEvento').click(function(){

                var idDelEventoAConsultarAnalisis = $(this).data('evento');
                var tipoActividad = "EVENTO";

                function obtenerAnalisisDeCompetenciasRealizadoAUnEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadAConsultarCompetencias': idDelEventoAConsultarAnalisis, 'tipoDeActividad': tipoActividad},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAnalizadasDelEvento').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerAnalisisDeCompetenciasRealizadoAUnEvento();

            });

            //Script que permite cargar el formulario de evaluacion de competencias para la certificacion de un trabajo aplicado a un evento
            $('.btnDetallesTrabajoAplicadoAEvento').click(function(){

                var idDelEventoAConsultarCompetenciasParaEvaluacion = $(this).data('evento');
                var tipoActividadInvolucrada = "EVENTO";

                function obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAEvento() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadParaEvaluarCompetenciasTrabajo': idDelEventoAConsultarCompetenciasParaEvaluacion, 'tipoDeActividadInvolucrada': tipoActividadInvolucrada},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAEvaluarEvento').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAEvento();

            }); 
            
        }
    </script>

    <!--Script que permite el registro de la evaluación realizada a un trabajo que fue aplicado a un evento--> 
    <script type='text/javascript'>

        $(document).ready(function(){
                       
            $('#btnGuardarEvaluacionDeTrabajoAplicadoAEvento').click(function() {
                    
                //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                var idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoEvento = document.getElementById('txt_idDelEstudianteEvaluadoEvento').value;
                var idDelTrabajoEvaluadoEvento = document.getElementById('txt_idTrabajoAEvaluarEvento').value;
                var idDelEventoAEvaluar = document.getElementById('txt_idEventoAEvaluar').value;
                var tipoActividadEvento = "EVENTO";
                var contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoEvento = document.getElementsByClassName('contenedorRespContribucionCompEsp');
                var arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento = []; 
                var arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento = []; 

                var idDelTrabajoAConsultarMegaInsigObtenidasEvento = document.getElementById('idTrabajoInvolucrado').value;
                var idDelTrabajoAConsultarInsigObtenidasEvento = document.getElementById('idTrabajoInvolucrado').value;
            
                for (let item of contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoEvento) {
                    arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento.push(item.id)  
                }
                
                //Recogemos lo marcado por el usario en los radiobuttons
                for (let item of arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento) {
                    var radioButtonsCmpEspecifica = document.getElementsByName(item);
                    
                    for (var i = 0, length = radioButtonsCmpEspecifica.length; i < length; i++) {
                        if (radioButtonsCmpEspecifica[i].checked) {
                            arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento.push(radioButtonsCmpEspecifica[i].value);
                            break;
                        }
                    }
                }

                var numeroDeCompEspecificas = arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento.length;

                if(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento.length > 0 && arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento.length == numeroDeCompEspecificas){

                    function evaluarTrabajoAplicadoAUnEvento() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo': idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoEvento, 'idActividad':idDelEventoAEvaluar, 'tipoActividad':tipoActividadEvento, 'idDelTrabajo': idDelTrabajoEvaluadoEvento, 'arregloCodigosCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento), 'arregloNivelesContribucionCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoEvento)},
                                success: function(response){
                                    resolve(response) 
                                },
                                error: function (error) {
                                reject(error)
                                console.log(error);
                                },
                            });
                        })
                    }

                    function obtenerMegaInsigniasDeUnTrabajoAplicadoAEvento() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoMegaInsigniasObtenidas': idDelTrabajoAConsultarMegaInsigObtenidasEvento},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaMegaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    function obtenerInsigniasDeUnTrabajoAplicadoAEvento() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoInsigniasObtenidas': idDelTrabajoAConsultarInsigObtenidasEvento},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }
                
                    evaluarTrabajoAplicadoAUnEvento()
                    .then((response) => {

                        obtenerMegaInsigniasDeUnTrabajoAplicadoAEvento();
                        obtenerInsigniasDeUnTrabajoAplicadoAEvento();

                    })
                    .catch((error) => {
                        console.log(error)
                    })
               
                }else{
                    alert('Debe evaluar todas las competencias específicas propuestas.');
                    return false;
                }                     
                
            });
        });
    
    </script>
    



    <!--Aqui declaramos las funciones para la visualizacion y gestion de los trabajos que son aplicados a una convocatoria determinado en la tabla de trabajos-->
    <script>
        function funcionesParaRevisionDeTrabajosAplicadosAConvocatorias(){

            //Este script permite cargar la informacion de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAConvocatoria").click(function(){
                                            
                var idTrabajoAEvaluarConvocatoria = $(this).data("id");
                                
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: "logic/utils/ajaxfile.php",
                            type: "post",
                            data: {"idTrabajoAEvaluar": idTrabajoAEvaluarConvocatoria },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = "#detallesDeTrabDestacadoConvocatoria";
                    var formEvaluacion = "#formularioDeEvaluacionDeTrabajoAplicadoAConvocatoria"
                    var formResultadosEvaluacion = "#informacionGeneral"
                    $.each(data, function(key, value){
                        $("[name="+key+"]", formId).val(value);
                        $("[name="+key+"]", formEvaluacion).val(value);
                        $("[name="+key+"]", formResultadosEvaluacion).val(value);
                        
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });
                                                                                                               
            //Este script permite cargar la imagen de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAConvocatoria").click(function(){
                                            
                var idImagenTrabajoAEvaluarConvocatoria = $(this).data("id");
                    
                function verificacionDeImagenParaTrabajoAplicadoConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idImagenTrabajoAEvaluar': idImagenTrabajoAEvaluarConvocatoria},
                            success: function(response){
                                resolve(response)
                                $('#panelParaImagenDelTrabajoAplicadoConvocatoria').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeImagenParaTrabajoAplicadoConvocatoria();
                    
            });
                                                                                    
            //Este script permite cargar las evidencias de un trabajo destacado en el modal de detalles 
            $(".btnDetallesTrabajoAplicadoAConvocatoria").click(function(){
                                            
                var idEvidenciasTrabajoAEvaluarConvocatoria = $(this).data("id");
                    
                function verificacionDeEvidenciasParaTrabajoAplicadoConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEvidenciasTrabajoAEvaluar': idEvidenciasTrabajoAEvaluarConvocatoria},
                            success: function(response){
                                resolve(response)
                                $('#panelDeEvidenciasTrabajoAplicadoAConvocatoria').html(response);
                            },
                            error: function (error) {
                                reject(error)
                            },
                        });
                    })
                }
                
                verificacionDeEvidenciasParaTrabajoAplicadoConvocatoria();
                    
            });
                                                                                    
            //Script que permite traer los datos del estudiante al modal de un trabajo destacado aplicado a un evento
            $('.btnDetallesTrabajoAplicadoAConvocatoria').click(function(){
                    
                var idEstudianteTrabajoAplicadoConvocatoria = $(this).data('estudiante');
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idEstudianteTrabajoAplicado': idEstudianteTrabajoAplicadoConvocatoria },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    var data = $.parseJSON(response)[0];
                    var formId = '#seccionDatosDelEstudianteAplicaConvocatoria';
                    $.each(data, function(key, value){
                        $('[name='+key+']', formId).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
                    
            });

            //Script que permite pasar el id de una convocatoria con el fin de cargar su informacion en el modal de evaluacion de trabajos aplicados a una convocatoria
            $('.btnDetallesTrabajoAplicadoAConvocatoria').click(function(){

                var infoConvocatoriaAlQueFueAplicada = $(this).data('convocatoria');

                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idConvComiteEdit': infoConvocatoriaAlQueFueAplicada },
                            success: function(response){
                                resolve(response)
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }
                getFormInfo()
                .then((response) => {
                    console.log()
                    var data = $.parseJSON(response)[0];
                    var informacionDeConvocatoria = '#infoConvocatoria';
                    var formularioDeEvaluacionDeTrabajoAplicadoAConvocatoria = '#formularioDeEvaluacionDeTrabajoAplicadoAConvocatoria';
                    $.each(data, function(key, value){
                        $('[name='+key+']', informacionDeConvocatoria).val(value);
                        $('[name='+key+']', formularioDeEvaluacionDeTrabajoAplicadoAConvocatoria).val(value);
                    });
                })
                .catch((error) => {
                    console.log(error)
                })

            }); 

            //Script que permite cargar el analisis de competencias específicas realizado a un desafio en el modal de evaluacion de trabajos aplicados a un desafio
            $('.btnDetallesTrabajoAplicadoAConvocatoria').click(function(){

                var idDeConvocatoriaAConsultarAnalisis = $(this).data('convocatoria');
                var tipoActividad = "CONVOCATORIA";

                function obtenerAnalisisDeCompetenciasRealizadoAUnaConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadAConsultarCompetencias': idDeConvocatoriaAConsultarAnalisis, 'tipoDeActividad': tipoActividad},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAnalizadasDeLaConvocatoria').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerAnalisisDeCompetenciasRealizadoAUnaConvocatoria();

            });
            
            //Script que permite cargar el formulario de evaluacion de competencias para la certificacion de un trabajo aplicado a un desafio
            $('.btnDetallesTrabajoAplicadoAConvocatoria').click(function(){

                var idDeConvocatoriaAConsultarCompetenciasParaEvaluacion = $(this).data('convocatoria');
                var tipoActividadInvolucrada = "CONVOCATORIA";

                function obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAConvocatoria() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idActividadParaEvaluarCompetenciasTrabajo': idDeConvocatoriaAConsultarCompetenciasParaEvaluacion, 'tipoDeActividadInvolucrada': tipoActividadInvolucrada},
                            success: function(response){
                                resolve(response)
                                $('#panelListaCompetenciasAEvaluarConvocatoria').html(response);
                            },
                            error: function (error) {
                            reject(error)
                            },
                        });
                    })
                }

                obtenerCompetenciasParaEvaluacionDeTrabajoAplicadoAConvocatoria();

            });

        }

    </script>

    <!--Script que permite el registro de la evaluación realizada a un trabajo que fue aplicado a una convocatoria-->
    <script type='text/javascript'>
        $(document).ready(function(){
        
            $('#btnGuardarEvaluacionDeTrabajoAplicadoAConvocatoria').click(function() {
                    
                //En este bloque pasamos el id de la convocatoria para tener el cuenta en la insercion de datos
                var idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoConvocatoria = document.getElementById('txt_idDelEstudianteEvaluadoConvocatoria').value;
                var idDelTrabajoEvaluadoConvocatoria = document.getElementById('txt_idTrabajoAEvaluarConvocatoria').value;
                var idDeConvocatoriaAEvaluar = document.getElementById('txt_idConvocatoriaAEvaluar').value;
                var tipoActividadConvocatoria = "CONVOCATORIA";
                var contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoConvocatoria = document.getElementsByClassName('contenedorRespContribucionCompEsp');
                var arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria = []; 
                var arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria = []; 

                var idDelTrabajoAConsultarMegaInsigObtenidasConvocatoria = document.getElementById('idTrabajoInvolucrado').value;
                var idDelTrabajoAConsultarInsigObtenidasConvocatoria = document.getElementById('idTrabajoInvolucrado').value;

                for (let item of contenedoresDeRespuestasNivelContribCompetenciaATrabajoAplicadoConvocatoria) {
                    arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria.push(item.id)  
                }

                //Recogemos lo marcado por el usario en los radiobuttons
                for (let item of arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria) {
                    var radioButtonsCmpEspecifica = document.getElementsByName(item);
                    
                    for (var i = 0, length = radioButtonsCmpEspecifica.length; i < length; i++) {
                        if (radioButtonsCmpEspecifica[i].checked) {
                            arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria.push(radioButtonsCmpEspecifica[i].value);
                            break;
                        }
                    }
                }

                var numeroDeCompEspecificas = arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria.length;

                if(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria.length > 0 && arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria.length == numeroDeCompEspecificas){

                    function evaluarTrabajoAplicadoAUnaConvocatoria() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelEstudianteParaGuardarEvaluacionRealizadaATrabajo': idDelEstudianteParaGuardarEvaluacionRealizadaATrabajoConvocatoria, 'idActividad':idDeConvocatoriaAEvaluar, 'tipoActividad':tipoActividadConvocatoria, 'idDelTrabajo': idDelTrabajoEvaluadoConvocatoria, 'arregloCodigosCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloCodigosCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria), 'arregloNivelesContribucionCompEspecificasEvaluacionTrabajo': JSON.stringify(arregloNivelesContribucionCompEspecificasUsadasEvaluacionDeTrabajoAplicadoConvocatoria)},
                                success: function(response){
                                    resolve(response) 
                                },
                                error: function (error) {
                                reject(error)
                                console.log(error);
                                },
                            });
                        })
                    }

                    function obtenerMegaInsigniasDeUnTrabajoAplicadoAConvocatoria() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoMegaInsigniasObtenidas': idDelTrabajoAConsultarMegaInsigObtenidasConvocatoria},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaMegaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    function obtenerInsigniasDeUnTrabajoAplicadoAConvocatoria() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDelTrabajoInvolucradoInsigniasObtenidas': idDelTrabajoAConsultarInsigObtenidasConvocatoria},
                                success: function(response){
                                    resolve(response)
                                    $('#panelListaInsigniasGanadasEnEvaluacion').html(response);
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }

                    evaluarTrabajoAplicadoAUnaConvocatoria()
                    .then((response) => {

                        obtenerMegaInsigniasDeUnTrabajoAplicadoAConvocatoria();
                        obtenerInsigniasDeUnTrabajoAplicadoAConvocatoria();

                    })
                    .catch((error) => {
                        console.log(error)
                    })

                }else{
                    alert('Debe evaluar todas las competencias específicas propuestas.');
                    return false;
                }                     

            });
        });

    </script>
        







    <!--Script que permite pasar un tipo de actividad para así mostrar las actividades del profesor existentes para ese tipo en la tabla de actividades-->
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
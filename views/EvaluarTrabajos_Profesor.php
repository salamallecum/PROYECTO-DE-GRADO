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
        <script src="assets/js/dom/funcionesBasicasPopUpEvaluacionDeDesafioOEventoOConvocatoria.js" type="module"></script>
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
                            <td><select class="form-control" id="cmb_tipoDeActividadAEvaluar" name="cmbTipoDeActividadAEvaluar">
                                    <option value="" selected>Seleccione</option>
                                    <option value="">Desafio</option>
                                    <option value="">Desafio personalizado</option>
                                    <option value="">Evento</option>
                                    <option value="">Convocatoria externa</option>
                                </select></td>

                            <td> <a id="btn_filtrarActividades" class="btn_agregarDesafio" title="Filtrar">Filtrar</a></td>
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
        
                                <!--Aqui van los registros de la tabla de desafios eventos y convocatorias-->
                                <tr class="filasDeDatosTablaDesafios">
                                    <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                                    <td class="datoTabla">DESAFIO DE PRUEBA 1</td>
                                    <td class="datoTabla">1</td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
    
                                        <div class="col-botonesEdicion">
                                            <a name="openModal" class="iconosAccionesEvaluacion" title="Detalles"><img src="assets/images/verDetallesActividad.png"></a> 
                                        </div>
    
                                        <div class="col-botonesEdicion">
                                            <a name="btn_listarTrabajos" class="iconosAccionesEvaluacion" title="Ver trabajos"><img src="assets/images/folder_trabajosPresentados.png"></a> 
                                        </div>
                                    </div></td>
                                </tr>
                            </table>
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


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS Y EVENTOS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDelDesafioOEvento" class="imgEncabezadoInfoActividad" src="assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDelDesafioOEvento" class="titulo_seccion">DESAFIO DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">
            
                                    <label class="subtitulosInfo">Descripción</label>
                                    <p id="lbl_descripcionDelDesafioOEvento" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciado" class="btn-fill pull-right btn btn-info" title="Descargar enunciado">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha inicio:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                                
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha fin:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="subtitulosInfo">Estado de la actividad:</label>  </td>
                                            <td class="columnaInfoEnunciado"><div class="contenedor-switch">
                                                <input type="checkbox" id="check_estadoActividad" name="openModal4">
                                            </div></td>
                                            <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                        </tr>

                                    </table>
                                                                
                                    <br>
                                    <br>    
                                    <a id="btn_cancelar1" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS TRABAJOS DESTACADOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelTrabajo">
                                <img id=img_imagenDelTrabajo" class="imgEncabezadoInfoTrabajo" src="assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDelTrabajo" class="titulo_seccion">TRABAJO DE PRUEBA 1</h3>
                                <br>
                                
                                <div class="informacionDelTrabajo">
            
                                    <label class="subtitulosInfo">Descripción</label>
                                    <p id="lbl_descripcionDelTrabajo" class="descripcionDelTrabajo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <!-- Tabla con las evidencias del trabajo-->
                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Evidencias:</label></td>
                                        </tr>

                                        <tr>
                                            <td><a id="link_evidenciaDocumento" href="" target="_blank"><img src="assets/images/btn_evidenc_documento.PNG"></a></td>
                                            <td class="columnaInfoEnunciado"><a id="link_evidenciaVideo" href="" target="_blank"><img src="assets/images/btn_evidenc_video.png"></a></td>
                                            <td class="columnaInfoEnunciado"><a id="link_evidenciaRepoCodigo" href="" target="_blank"><img src="assets/images/btn_evidenc_repocodigo.png"></a></td>
                                            <td class="columnaInfoEnunciado"><a id="link_evidenciaPresentacion" href="" target="_blank"><img src="assets/images/btn_evidenc_presentacion.png"></a></td>                           
                                            <td><label class="explicacionEvidencias">Haga click sobre todos los iconos antes de iniciar la evaluación...</label></td>
                                        </tr>
                                    </table>
                                                        
                                    <br>
                                    <br>   
                                    <a id="openModal3" class="btn_agregarDesafio" title="Evaluar trabajo">Evaluar</a> 
                                    <a id="btn_cancelar2" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--POPUP PARA LA EVALUACIÓN DE COMPETENCIAS EN UN TRABAJO-->
                    <div id="modal_container3" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Evaluación de competencias</h3>
                            <br>
                            <p>Evalúe el nivel de competencia alcanzado por el trabajo presentado para las siguientes competencias específicas: </p>
                            <br>


                            <div class="contenedor_compEspecificas">

                                <form class="">
                                    <!--Este es el código que contiene las competencias específicas a evaluar-->
                                    <div class="contenedorCompeEspeciasAEvaluar">
                                        <p id="lbl_enunciadoCompetenciaEspecíficaAEvaluar" name="enunciadoCompetenciaEspecíficaAEvaluar" class="enunciadoCompetenciaEspecíficaAEvaluar">1. Competencia específica 1.</p>
                                        
                                        <!--Tabla de radiobuttons para evaluar competencia específica-->
                                        <table>
                                            <tr>
                                                <td><input type="radio" id="radio_contribucionBaja" name="contribucionBaja" value="">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionMedia" name="contribucionMedia" value="">
                                                <label for="Media">Media</label></td></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionAlta" name="contribucionAlta" value="">
                                                <label for="Alta">Alta</label></td></td>
                                               
                                            </tr>
                                        </table>

                                        <br>

                                        <p id="lbl_enunciadoCompetenciaEspecíficaAEvaluar" name="enunciadoCompetenciaEspecíficaAEvaluar" class="enunciadoCompetenciaEspecíficaAEvaluar">2. Competencia específica 2.</p>

                                        <!--Tabla de radiobuttons para evaluar competencia específica-->
                                        <table>
                                            <tr>
                                                <td><input type="radio" id="radio_contribucionBaja" name="contribucionBaja" value="">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionMedia" name="contribucionMedia" value="">
                                                <label for="Media">Media</label></td></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionAlta" name="contribucionAlta" value="">
                                                <label for="Alta">Alta</label></td></td>
                                            </tr>
                                        </table>
                                    </div>  

                                    <br>
                                    <br>
                                    <a id="btn_guardarEvaluacion" class="btn_agregarDesafio" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar3" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>

                                </form>
                            </div>                            
                        </div>
                    </div>  

                    
                    <!--POPUP PARA EL OTORGAMIENTO DE INSIGNIAS A UN TRABAJO QUE ES DESTACADO-->
                    <div id="modal_container4" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Resultado de la evaluación:</h3>
                            <br>
                            <p>Insignias otorgadas al trabajo calificado: </p>
                            <br>

                            <!--En esta sección se muestran las Megainsignias que se obtuvo en la evaluación -->
                            <p class="subtitulo_certificacion">MegaInsignias:</p>
                            <div class="seccionMegaInsignia">

                                <div class="megaInsigOtorgada">
                                    <img class="imgMegaInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>
            
                            </div>

                            <br>

                            <!--En esta sección se muestran las Insignias que se obtuvo en la evaluación -->
                            <p class="subtitulo_certificacion">Insignias:</p>
                            <div class="seccionInsignias">

                                <div class="insigOtorgada">
                                    <img class="imgInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>
            
                                <div class="insigOtorgada">
                                    <img class="imgInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>

                                <div class="insigOtorgada">
                                    <img class="imgInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>

                                <div class="insigOtorgada">
                                    <img class="imgInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>

                                <div class="insigOtorgada">
                                    <img class="imgInsigniaOtorgada" src="assets/images/badge_prueba muestreo.png" alt="">
                                </div>

                            </div> 
                            <br>  
                            <br>                       

                            <form id="formularioDeOtrogamientoInsignias"class="">
                                <a id="btn_finalizarEvaluacion" class="btn_agregarDesafio" title="Finalizar evaluación">Finalizar</a>
                                <a id="btn_cancelar4" class="btn_agregarDesafio" title="Atrás">Atrás</a>
                            </form>
                                                    
                        </div>
                    </div>  
                </div>
            </main>
        </div>
    </body>
</html>
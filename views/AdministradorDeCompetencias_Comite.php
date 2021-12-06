<!--IMPORTANTE-->
<!--Los botones que tienen la palabra openModal, modal-container o btn_cancelar como nombre o id, son botones de navegación y por lo tanto no se deben tocar porque si función es interactiva-->
<!-- Los botones o componentes que tienen el prefijo lbl_ , txt_, date_ o btn_ son los que tu programas porque requieren manejo de datos con el backend-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/ComiteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpCompetencias.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincComite.PNG"></span>
                    <span>PANDORA</span>
                </h3>
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Comite.php">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./RegistroDeProfesores_Comite.php">
                            <span class="ti-user" title="Profesores"></span>
                            <span class="items_menu">PROFESORES</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeMaterias_Comite.php">
                            <span class="ti-clipboard" title="Materias"></span>
                            <span class="items_menu">MATERIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeCompetencias_Comite.php">
                            <span class="ti-archive" title="Competencias"></span>
                            <span class="items_menu">COMP.PROGRAMA</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeEventos_Comite.php">
                            <span class="ti-flag" title="Eventos"></span>
                            <span class="items_menu">EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Comite.php">
                            <span class="ti-hand-point-up" title="Convocatorias"></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-content">

            <header>
                
                <div class="social-icons">
                    <div class="titulo-dash">
                        <span>Administrador de competencias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="card-header">
                    <a id="openModal" class="btn_agregarCompetencia" title="Nueva Competencia">Nueva competencia</a>                   
                </div>

                <!-- Estructura de targeta de la competencia-->
                <div class="dash-cards">
                    
                    <!--CODIGO TARGETA DE COMPETENCIA 1-->
                    <div class="card-competencia">
                        <div class="card-competenciaBody">
                            <div>
                                <span><img id="lbl_imgTrabajoDestacado" class="imgCompetencia" src="assets/images/imgPorDefecto.jpg"></span>
                            
                                <div>
                                    <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloCompetenciaGeneral">A. COMPETENCIA GENERAL DE PRUEBA 1</h4>
                                </div>
    
                                <div class="contenedorBotones">
                                    <div class="filaBotonesCompGeneral">
                                        <div class="columnaBotonesEdicion">
                                            <a name="openModa5" href="" title="Editar"><img src="/assets/images/btn_editar.PNG">Editar</a>
                                        </div>
        
                                        <div class="columnaBotonesEdicion">
                                            <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG">Eliminar</a>
                                        </div>
                                    </div>
                                </div>                          
                            </div>                            
                        </div>
                        
                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>
                    </div>

                    <!--CODIGO TARGETA DE COMPETENCIA 2-->
                    <div class="card-competencia">
                        <div class="card-competenciaBody">
                            <div>
                                <span><img id="lbl_imgTrabajoDestacado" class="imgCompetencia" src="assets/images/imgPorDefecto.jpg"></span>
                            
                                <div>
                                    <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloCompetenciaGeneral">A. COMPETENCIA GENERAL DE PRUEBA 2</h4>
                                </div>
    
                                <div class="contenedorBotones">
                                    <div class="filaBotonesCompGeneral">
                                        <div class="columnaBotonesEdicion">
                                            <a name="openModa5" href="" title="Editar"><img src="/assets/images/btn_editar.PNG">Editar</a>
                                        </div>
        
                                        <div class="columnaBotonesEdicion">
                                            <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG">Eliminar</a>
                                        </div>
                                    </div>
                                </div>                          
                            </div>                            
                        </div>
                        
                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>

                        <ul name="targetaCompetenciaEspecífica" class="card-compEspecifica">
                            <div class="competencia-especifica">
                                <div class="compEsp-rol">
                                    <p class="rol_compEsp">1. Maestro de los procesos</p>
                                </div>

                                <div class="compEsp-rol">
                                    <!--El badge debe ser 32 x 32px-->
                                    <img src="/assets/images/badge_prueba.png" alt="">
                                </div>
                            </div>

                            <div class="competencia-especifica">
                                <div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal6" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal4" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div>
                            </div>                  
                        </ul>
                    </div>

                    
                  













































            
                    <!--ESTRUCTURA DEL POPUP PARA ELEGIR EL TIPO DE COMPETENCIA A CREAR-->
                    <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva competencia</h3>
                            <br>
                            <a id="openModal1" class="btn_agregarCompetencia" title="Competencia general">Competencia general</a>
                            <a id="openModal2" class="btn_agregarCompetencia" title="Competencia específica">Competencia específica</a>
                            <br>
                            <br>
                            <a id="btn_cancelar" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS GENERALES-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Competencia general</h3>
                            <br>
                            
                            <div class="formulario-registroCompetencia">
                                <form id="formularioDeRegistroDeCompetenciasGenerales" class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    <option value="J">J</option>
                                                    <option value="K">K</option>
                                                    <option value="L">L</option>
                                                    <option value="M">M</option>
                                                    <option value="N">N</option>
                                                    <option value="Ñ">Ñ</option>
                                                    <option value="O">O</option>
                                                    <option value="P">P</option>
                                                    <option value="Q">Q</option>
                                                    <option value="R">R</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                    <option value="U">U</option>
                                                    <option value="V">V</option>
                                                    <option value="W">W</option>
                                                    <option value="X">X</option>
                                                    <option value="Y">Y</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                            </td>
    
                                            <td class="column-form-rolCompGeneral">
                                                <label class="camposFormulario">Rol al que contribuye</label><br>
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                        
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>
    
                                    <a id="btn_guardarCompetenciaGeneral" name="registrarCompetencia" class="btn_agregarCompetencia" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar1" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE COMPETENCIA GENERAL-->
                    <div id="modal_container3" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Competencia general</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarCompetenciaGeneral" name="eliminarCompetencia" class="btn_agregarCompetencia" title="Si">Si</a>
                            <a id="btn_cancelar3" class="btn_agregarCompetencia" title="No">No</a>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA GENERAL-->
                    <div id="modal_container5" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Competencia general</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    <option value="J">J</option>
                                                    <option value="K">K</option>
                                                    <option value="L">L</option>
                                                    <option value="M">M</option>
                                                    <option value="N">N</option>
                                                    <option value="Ñ">Ñ</option>
                                                    <option value="O">O</option>
                                                    <option value="P">P</option>
                                                    <option value="Q">Q</option>
                                                    <option value="R">R</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                    <option value="U">U</option>
                                                    <option value="V">V</option>
                                                    <option value="W">W</option>
                                                    <option value="X">X</option>
                                                    <option value="Y">Y</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                            </td>
    
                                            <td class="column-form-rolCompGeneral">
                                                <label class="camposFormulario">Rol al que contribuye</label><br>
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                        
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>

                                    <a id="btn_actualizarCompetenciaGeneral" name="actualizarCompetencia" class="btn_agregarCompetencia" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar5" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
            
                    




















                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS ESPECIFICAS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Competencia específica</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form id="formularioDeRegistroDeCompetenciasEspecificas" class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <input id="txt_codigoCompEspecífic" name="txtCodigoCompEspecífic" placeholder="" type="text" class="form-control">
                                            </td>
    
                                            <td class="column-form-rolCompGeneral">
                                                <label class="camposFormulario">Rol al que contribuye</label><br>
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>

                                    <label class="camposFormulario">Competencia general a la que pertenece</label><br>
                                    <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                        <option value="" selected>Seleccione</option>
                                    </select>
                            
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>
    
                                    <a id="btn_guardarCompetenciaEspecifica" name="registrarCompetencia" class="btn_agregarCompetencia" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar2" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div> 
                    
                    <!--ESTRUCTURA DEL POPUP DE ELIMINACION DE COMPETENCIA ESPECIFICA-->
                    <div id="modal_container4" class="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Competencia específica</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarCompetenciaEspecifica" name="eliminarCompetencia" class="btn_agregarCompetencia" title="Si">Si</a>
                            <a id="btn_cancelar4" class="btn_agregarCompetencia" title="No">No</a>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA ESPECÍFICA-->
                    <div id="modal_container6" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Competencia específica</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    <option value="J">J</option>
                                                    <option value="K">K</option>
                                                    <option value="L">L</option>
                                                    <option value="M">M</option>
                                                    <option value="N">N</option>
                                                    <option value="Ñ">Ñ</option>
                                                    <option value="O">O</option>
                                                    <option value="P">P</option>
                                                    <option value="Q">Q</option>
                                                    <option value="R">R</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                    <option value="U">U</option>
                                                    <option value="V">V</option>
                                                    <option value="W">W</option>
                                                    <option value="X">X</option>
                                                    <option value="Y">Y</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                            </td>
    
                                            <td class="column-form-rolCompGeneral">
                                                <label class="camposFormulario">Rol al que contribuye</label><br>
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                        
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="/assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>
    
                                    <a id="btn_actualizarCompetenciaEspecifica" name="actualizarCompetencia" class="btn_agregarCompetencia" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar6" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
















                    <!--POPUP DE REGISTRO DE COMPETENCIA SATISFACTORIO-->
                    <div id="modal_container7" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Competencia registrada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar1" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                     <!--POPUP DE ACTUALIZACION DE COMPETENCIA SATISFACTORIO-->
                     <div id="modal_container8" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Competencia actualizada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar2" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                     <!--POPUP DE ELIMINACION DE COMPETENCIA SATISFACTORIO-->
                     <div id="modal_container9" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Competencia eliminada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar3" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                </div>      
            </main>
        </div>
    </body>
</html>
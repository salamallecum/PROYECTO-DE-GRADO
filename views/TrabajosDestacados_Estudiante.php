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
        <link rel="stylesheet" href="/assets/css/EstudianteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpTrabajosDestacados.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>

    </head>

    <body>

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="/assets/images/ico_pandMenuPrincEstudiante.PNG"></span>
                    <span>PANDORA</span>
                </h3>
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a class="link_menu-active" href="/DashBoard_Estudiante.html">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/PerfilDeUsuario_Estudiante.html">
                            <span class="ti-user" title="Perfil de usuario"></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/TrabajosDestacados_Estudiante.html">
                            <span class="ti-clipboard" title="Trabajos Destacados"></span>
                            <span class="items_menu">TRABAJOS DESTACADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/E-portafolio_Estudiante.html">
                            <span class="ti-archive" title="E-portafolio"></span>
                            <span class="items_menu">E-PORTAFOLIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="DesafiosYEventos_Estudiante.html">
                            <span class="ti-flag" title="Desafios y eventos"></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/Insignias_Estudiante.html">
                            <span class="ti-medall" title="Insignias"></span>
                            <span class="items_menu">INSIGNIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/DesafiosPersonalizados_Estudiante.html">
                            <span class="ti-light-bulb" title="Desafíos personalizados"></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/ConvocatoriasExternas_Estudiante.html">
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
                        <span>Trabajos destacados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="card-header">
                    <a id="openModal" class="btn_agregarTrabajo" title="Agregar trabajo destacado">Agregar trabajo</a>                   
                </div>

                <!--Estructura de targeta de trabajo destacado-->
                <div class="dash-cards">
                    <div class="card-trabajo">
                        <div class="card-trabDestacadobody">
                            <span><img id="lbl_imgTrabajoDestacado" class="imgTrabajoDestacado" src="assets/images/ImgTrabDestacadoPorDefecto.jpg"></span>
                            <div>
                                <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloTrabDestacado">TRABAJO DESTACADO 1</h4>
                            </div>

                            <div class="contenedorEstadoTrabDestacado">
                                <div class="justificadorDeEstados filaEstadoTrabDestacado">
                                    <div class="columna">
                                        <h6>Se puede postular:</h6>
                                    </div>

                                    <!--En la carpeta images esta el icono de no se puede postular tambien-->
                                    <div class="columna">
                                        <img id="img_sePuedePostularTrabDestacado" src="/assets/images/indic_trabDestacado_sePuedePostular.PNG" alt="">
                                    </div>
                                </div>                                
                            </div>

                            <p id="lbl_descripcionTrabDestacado" name="lblDescripcionTrabajoDestacado" class="descripcionTrabDestacado">Este en un trabajo destacado</p>
                            <br>
                            
                            <div class="contenedorBotones">
                                <div class="filaBotonesTrabDestacado">
                                    <div class="columnaBotonesEdicion">
                                        <a name="openModal1" href="" title="Editar"><img src="/assets/images/btn_editar.PNG">Editar</a>
                                    </div>
    
                                    <div class="columnaBotonesEdicion">
                                        <a name="openModal2" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG">Eliminar</a>

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="card-evidencias">
                            <li><a id="link_evidenciaDocumento" href="" target="_blank"><img src="/assets/images/btn_evidenc_documento.PNG"></a></li>
                            <li><a id="link_evidenciaVideo" href="" target="_blank"><img src="/assets/images/btn_evidenc_video.png"></a></li>
                            <li><a id="link_evidenciaRepoCodigo" href="" target="_blank"><img src="/assets/images/btn_evidenc_repocodigo.png"></a></li>
                            <li><a id="link_evidenciaPresentacion" href="" target="_blank"><img src="/assets/images/btn_evidenc_presentacion.png"></a></li>                            
                        </ul>
                    </div>



                    <!--Estructura de targeta de trabajo destacado 2-->
                    <div class="card-trabajo">
                        <div class="card-trabDestacadobody">
                            <span><img id="lbl_imgTrabajoDestacado" class="imgTrabajoDestacado" src="assets/images/ImgTrabDestacadoPorDefecto.jpg"></span>
                            <div>
                                <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloTrabDestacado">TRABAJO DESTACADO 2</h4>
                            </div>

                            <div class="contenedorEstadoTrabDestacado">
                                <div class="justificadorDeEstados filaEstadoTrabDestacado">
                                    <div class="columna">
                                        <h6>Se puede postular:</h6>
                                    </div>

                                    <!--En la carpeta images esta el icono de no se puede postular tambien-->
                                    <div class="columna">
                                        <img id="img_sePuedePostularTrabDestacado" src="/assets/images/indic_trabDestacado_sePuedePostular.PNG" alt="">
                                    </div>
                                </div>                                
                            </div>

                            <p id="lbl_descripcionTrabDestacado" name="lblDescripcionTrabajoDestacado" class="descripcionTrabDestacado">Este en un trabajo destacado</p>
                            <br>
                            
                            <div class="contenedorBotones">
                                <div class="filaBotonesTrabDestacado">
                                    <div class="columnaBotonesEdicion">
                                        <a name="openModal1" href="" title="Editar"><img src="/assets/images/btn_editar.PNG">Editar</a>
                                    </div>
    
                                    <div class="columnaBotonesEdicion">
                                        <a name="openModal2" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG">Eliminar</a>

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="card-evidencias">
                            <li><a id="link_evidenciaDocumento" href="" target="_blank"><img src="/assets/images/btn_evidenc_documento.PNG"></a></li>
                            <li><a id="link_evidenciaVideo" href="" target="_blank"><img src="/assets/images/btn_evidenc_video.png"></a></li>
                            <li><a id="link_evidenciaRepoCodigo" href="" target="_blank"><img src="/assets/images/btn_evidenc_repocodigo.png"></a></li>
                            <li><a id="link_evidenciaPresentacion" href="" target="_blank"><img src="/assets/images/btn_evidenc_presentacion.png"></a></li>                            
                        </ul>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE REGISTRO DE TRABAJOS DESTACADOS-->
                    <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nuevo trabajo destacado</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <label>Titulo</label>
                                    <input id="txt_tituloTrabDestacado" name="txtTituloTrabDestacado" placeholder="" type="text" class="form-control">
                                    <br>
                                    <input type="checkbox" id="check_publicarTrabajoEnEportafolio" value="check_trabajoEnEportafolio"> <label for="check_publicarTrabajoEnEportafolio">Publicar en E-portafolio</label>
                                    <br>
                                    <br>
                                    <p>Opcional* - Seleccione una imagen que represente su trabajo destacado.</p>
                                    <br>
                                    <input  id="btn_fotoDeTrabDestacado" name="imgTrabDestacado" accept=".jpeg, .jpg, .png" type="file" id="foto" class="form-control">
                                    <br>
                                    <label>Descripción</label>
                                    <textarea id="txt_descripcionTrabDestacado" name="descripcionTrabDestacado" cols="80" rows="8" name="about" class="form-control"></textarea>
                                    <br>
                                    <br>
                                    <p>A continuación, ponga los enlaces en los cuales tiene las siguientes evidencias:</p>
                                    <br>
                                    <label>Documento</label>
                                    <input id="txt_linkDocumento" name="linkDocumento" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Video</label>
                                    <input id="txt_linkVideo" name="linkVideo" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Repositorio de código</label>
                                    <input id="txt_linkRepoCodigo" name="linkRepoCodigo" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Presentación</label>
                                    <input id="txt_linkPresentacion" name="linkPresentacion" placeholder="" type="text" class="form-control">
                                    <br>

                                    <a id="btn_guardarTrabajoDestacado" class="btn_agregarTrabajo" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar" class="btn_agregarTrabajo" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                            
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ACTUALIZACION DE TRABAJOS DESTACADOS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar trabajo destacado</h3>
                            <br>
                            <p>Diligencie la información propuesta:</p>
                            <br>

                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <label>Titulo</label>
                                    <input id="txt_tituloTrabDestacado" name="txtTituloTrabDestacado" disabled placeholder="" type="text" class="form-control">
                                    <br>
                                    <p>Opcional* - Seleccione una imagen que represente su trabajo destacado.</p>
                                    <input  id="btn_fotoDeTrabDestacado" name="imgTrabDestacado" accept=".jpeg, .jpg, .png" type="file" id="foto" class="form-control">
                                    <br>
                                    <label>Descripción</label>
                                    <textarea id="txt_descripcionTrabDestacado" name="descripcionTrabDestacado" cols="80" rows="8" name="about" class="form-control"></textarea>
                                    <br>
                                    <p>A continuación, ponga los enlaces en los cuales tiene las siguientes evidencias:</p>
                                    <br>
                                    <label>Documento</label>
                                    <input id="txt_linkDocumento" name="linkDocumento" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Video</label>
                                    <input id="txt_linkVideo" name="linkVideo" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Repositorio de código</label>
                                    <input id="txt_linkRepoCodigo" name="linkRepoCodigo" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Presentación</label>
                                    <input id="txt_linkPresentacion" name="linkPresentacion" placeholder="" type="text" class="form-control">
                                    <br>

                                    <a id="btn_actualizarTrabajoDestacado" class="btn_agregarTrabajo" title="Guardar">Actualizar</a>
                                    <a id="btn_cancelar1" class="btn_agregarTrabajo" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP DE ELIMINACION DE TRABAJOS DESTACADOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar trabajo destacado</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarTrabajo" class="btn_agregarTrabajo" title="Si">Si</a>
                            <a id="btn_cancelar2" class="btn_agregarTrabajo" title="No">No</a>
                        </div>
                    </div>
                </div>            
            </main>
        </div>
    </body>
</html>
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
        <script src="assets/js/dom/funcionesBasicasPopUpEportafolio_Estudiante.js" type="module"></script>
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
                        <span>E-portafolio</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>

                <!--ENCABEZADO DEL E-PORTAFOLIO-->                
                <div class="perfil-card">
                    
                    <div class="card-header">
                        <button id="openModal" class="btn_publicarEportafolio" disabled title="Publicar E-portafolio">Publicar e-portafolio</button>
                        <button id="openModal3" class="btn_publicarEportafolio" title="Ocultar E-portafolio">Ocultar e-portafolio</button>                   
                    </div>
                    
                    <div class="card-user card">
                        <div class="card-image">
                            <img class="imgEncabezadoInfoEstudiante" src="/assets/images/uebAerea.jpg" alt="">
                        </div>
                        <div class="card-centerProfile">
                            
                            <div class="author">
                                <a href="">
                                    <img alt="..." class="avatar border-gray" src="/assets/images/imgPorDefecto.jpg">
                                    <h5 class="nombreDelEstudiante">Luis Alejandro Amaya Torres</h5>
                                    <br>
                                </a>
                                <p class="description">Perfil profesional</p>
                                <br>
                            </div>
                            <p class="description-text-center">Estudiante de último semestre de Ingeniería de Sistemas</p>
                        <br>
                                                                  
                    </div>                            
                </div>

                <!--SECCIÓN DE EVIDENCIAS-->
                <label class="lbl-titulosEportafolio">Mis trabajos</label>
                <br>

                <!--Estructura de targeta de trabajo destacado-->
                <div class="dash-cards">
                    <div class="card-trabajo">
                        <div class="card-trabDestacadobody">
                            <span><img id="lbl_imgTrabajoDestacado" class="imgTrabajoDestacado" src="assets/images/ImgTrabDestacadoPorDefecto.jpg"></span>
                            <div>
                                <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloTrabDestacado">TRABAJO DESTACADO 1</h4>
                            </div>

                            <p id="lbl_descripcionTrabDestacado" name="lblDescripcionTrabajoDestacado" class="descripcionTrabDestacado">Este en un trabajo destacado</p>
                            <br>
                        
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
                                <h4 id="lbl_tituloTrabDestacado" name="nombreTrabajoDestacado" class="tituloTrabDestacado">TRABAJO DESTACADO 1</h4>
                            </div>

                            <p id="lbl_descripcionTrabDestacado" name="lblDescripcionTrabajoDestacado" class="descripcionTrabDestacado">Este en un trabajo destacado</p>
                            <br>
                        
                        </div>
                        <ul class="card-evidencias">
                            <li><a id="link_evidenciaDocumento" href="" target="_blank"><img src="/assets/images/btn_evidenc_documento.PNG"></a></li>
                            <li><a id="link_evidenciaVideo" href="" target="_blank"><img src="/assets/images/btn_evidenc_video.png"></a></li>
                            <li><a id="link_evidenciaRepoCodigo" href="" target="_blank"><img src="/assets/images/btn_evidenc_repocodigo.png"></a></li>
                            <li><a id="link_evidenciaPresentacion" href="" target="_blank"><img src="/assets/images/btn_evidenc_presentacion.png"></a></li>                            
                        </ul>
                    </div>
                </div>

                <!--SECCIÓN DE INSIGNIAS-->
                <br>
                <br>
                <label class="lbl-titulosEportafolio">Mis insignias</label>
                <br>
                <br>
                <h4 class="subtitulosE-portafolio">Megainsignias obtenidas</h4>
                <!--CODIGO DEL CONTENEDOR DE MEGAINSIGNIAS-->
                <div class="contenedorMegaInsignias">

                    <!--Asi se mostraria la insignia-->
                    <div class="card-megaInsig">
                        <a name="openModal2"><img class="imgMegaInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a> 
                    </div>
                

                    <!--Este texto aparece cuando no hay ninguna insignia en el contenedor-->
                   <p id="lbl_contenedorMegaInsigniasVacio" class="contenedorVacio">Aún no tiene ninguna MegaInsignia para mostrar...</p>
                </div>

                <br>
                <br>
                <h4 class="subtitulosE-portafolio">Insignias obtenidas</h4>
                <!--CODIGO DEL CONTENEDOR DE MEGAINSIGNIAS-->
                <div class="contenedorInsignias">

                    <div class="card-Insig">
                        <a name="openModal2"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>

                    <div class="card-Insig">
                        <a name="openModal2"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>

                    <div class="card-Insig">
                        <a name="openModal2"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>
                    
                    <!--Este texto aparece cuando no hay ninguna insignia en el contenedor-->
                    <p id=lbl_contenedorMegaInsigniasVacio" class="contenedorVacio">Aún no tiene ninguna Insignia para mostrar...</p>
                </div>


                <!--ESTRUCTURA DEL POPUP DE PUBLICACION DE E-PORTAFOLIO-->
                 <div id="modal_container1" class="modal_container" name="modal_container">
                    <div class="modal">
                        <h3 class="titulo_seccion">Publicar e-portafolio</h3>
                        <br>
                        <p>¿Desea publicar su E-portafolio?</p>
                        <br>
                        <br>
                        <a id="btn_publicarEportafolio" class="btn_publicarEportafolio" title="Si">Si</a>
                        <a id="btn_cancelar1" class="btn_publicarEportafolio" title="No">No</a>
                    </div>
                </div>

                <!--ESTRUCTURA DEL POPUP DE OCULTAR E-PORTAFOLIO-->
                <div id="modal_container3" class="modal_container" name="modal_container">
                    <div class="modal">
                        <h3 class="titulo_seccion">Ocultar e-portafolio</h3>
                        <br>
                        <p>¿Desea ocultar su E-portafolio?</p>
                        <br>
                        <br>
                        <a id="btn_ocultarEportafolio" class="btn_publicarEportafolio" title="Si">Si</a>
                        <a id="btn_cancelar3" class="btn_publicarEportafolio" title="No">No</a>
                    </div>
                </div>

                <!--ESTRUCTURA DEL POPUP PARA VER INFORMACION DEL TRABAJO CON EL QUE SE OBTUVO ESA MEGAINSIGNIA O INSIGNIA-->
                <!--En esta ventana aparecerá la informacion del trabajo destacado que respalda la obtención de la insignia o Megainsignia-->
                <div id="modal_container2" class="modal_container" name="modal_container">
                    <div class="modal">
                        
                        <div class="imagenDelTrabajo">
                            <img id=img_imagenDelTrabajo" class="imgEncabezadoInfoTrabajo" src="/assets/images/imgPorDefecto.jpg" alt="">
                        </div>
                        <br>

                        <div class="modalBody">
                            <h3 id="lbl_NombreDelTrabajo" class="titulo_seccion">TRABAJO RECONOCIDO DE PRUEBA 1</h3>
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
                                        <td><a id="link_evidenciaDocumento" href="" target="_blank"><img src="/assets/images/btn_evidenc_documento.PNG"></a></td>
                                        <td class="columnaInfoEnunciado"><a id="link_evidenciaVideo" href="" target="_blank"><img src="/assets/images/btn_evidenc_video.png"></a></td>
                                        <td class="columnaInfoEnunciado"><a id="link_evidenciaRepoCodigo" href="" target="_blank"><img src="/assets/images/btn_evidenc_repocodigo.png"></a></td>
                                        <td class="columnaInfoEnunciado"><a id="link_evidenciaPresentacion" href="" target="_blank"><img src="/assets/images/btn_evidenc_presentacion.png"></a></td>                           
                                        <td><label class="explicacionEvidencias">Haga click sobre cada uno de los iconos...</label></td>
                                    </tr>
                                </table>
                                                    
                                <br>
                                <br>   
                                <a id="btn_cancelar2" class="btn_agregarTrabajo" title="Evaluar trabajo">Atrás</a> 
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>
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
        <script src="assets/js/dom/funcionesBasicasPopUpInsignias_Estudiante.js" type="module"></script>
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
                        <span>Insignias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <br>
                <h3 class="titulo_seccion">Mis Megainsignias </h3>
                <br>

                <!--CODIGO DEL CONTENEDOR DE MEGAINSIGNIAS-->
                <div class="contenedorMegaInsignias">

                    <!--Asi se mostraria la insignia-->
                    <div class="card-megaInsig">
                        <a name="openModal"><img class="imgMegaInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a> 
                    </div>
                

                    <!--Este texto aparece cuando no hay ninguna insignia en el contenedor-->
                   <p id=lbl_contenedorMegaInsigniasVacio" class="contenedorVacio">Aún no tiene ninguna MegaInsignia para mostrar...</p>
                </div>

                <br>
                <br>
                <h3 class="titulo_seccion">Mis Insignias </h3>
                <br>
                <!--CODIGO DEL CONTENEDOR DE MEGAINSIGNIAS-->
                <div class="contenedorInsignias">

                    <div class="card-Insig">
                        <a name="openModal"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>

                    <div class="card-Insig">
                        <a name="openModal"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>

                    <div class="card-Insig">
                        <a name="openModal"><img class="imgInsignia" src="/assets/images/badge_prueba muestreo.png" alt=""></a>
                    </div>
                    
                    <!--Este texto aparece cuando no hay ninguna insignia en el contenedor-->
                    <p id=lbl_contenedorMegaInsigniasVacio" class="contenedorVacio">Aún no tiene ninguna Insignia para mostrar...</p>
                </div>


                <!--ESTRUCTURA DEL POPUP PARA VER INFORMACION DEL TRABAJO CON EL QUE SE OBTUVO ESA MEGAINSIGNIA O INSIGNIA-->
                <!--En esta ventana aparecerá la informacion del trabajo destacado que respalda la obtención de la insignia o Megainsignia-->
                <div id="modal_container1" class="modal_container" name="modal_container">
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
                                <a id="btn_cancelar1" class="btn_agregarTrabajo" title="Evaluar trabajo">Atrás</a> 
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>
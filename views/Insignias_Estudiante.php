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
        <link rel="stylesheet" href="assets/css/EstudianteStyles.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpInsignias_Estudiante.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincEstudiante.PNG"></span>
                    <span id="tituloPagPrincipal">PANDORA</span>
                </h3>
                <label for="sidebar-toggle"><i class="bi bi-menu-app"></i></label>
            </div>

            <div class="sidebar-menu">
                <ul class="menuEstudiante">
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Estudiante.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./PerfilDeUsuario_Estudiante.php?Id_estudiante=38">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./TrabajosDestacados_Estudiante.php?Id_estudiante=38">
                            <span title="Trabajos destacados"><i class="bi bi-clipboard-check"></i></span>
                            <span class="items_menu">TRABAJOS DESTACADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./E-portafolio_Estudiante.php?Id_estudiante=38">
                            <span title="E-portafolio"><i class="bi bi-folder-check"></i></span>
                            <span class="items_menu">E-PORTAFOLIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosYEventos_Estudiante.php">
                            <span title="Desafios y eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./Insignias_Estudiante.php?Id_estudiante=38">
                            <span title="Insignias"><i class="bi bi-award"></i></span>
                            <span class="items_menu">INSIGNIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosPersonalizados_Estudiante.php?Id_estudiante=38">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./ConvocatoriasExternas_Estudiante.php">
                            <span title="Convocatorias"><i class="bi bi-hand-index"></i></span>
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
                        <span><a href="../index.php">Log out</a></span>
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
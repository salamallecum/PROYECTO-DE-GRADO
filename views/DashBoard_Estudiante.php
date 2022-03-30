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
        <script src="assets/js/dom/dashBoard_estudiante.js" type="module"></script>
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
                        <span>Dashboard</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="dash-cards">
                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_trabajosDestacados.PNG"></span>
                            <div>
                                <h5>Trabajos Destacados</h5>
                                <h4  id="lbl_noTrabajosDestacados" name="noTrabajosDestacados">2</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="ti-reload"></span>
                            <span>Actualizar</span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_insignias.PNG"></span>
                            <div>
                                <h5>Insignias</h5>
                                <h4 id="lbl_noInsignias" name="noInsignias">0</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="ti-calendar"></span>
                            <span>Last day</span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_eportafolios.PNG" alt=""></span>
                            <div>
                                <h5>E-portafolios</h5>
                                <h4 id="lbl_noEportafolios" name="noEportafolios">0</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span>En la última hora</span>
                        </div>
                    </div>
    
                    <div class="card-single">
                            <div class="card-body">
                                <span><img src="assets/images/student_profile.png"></span>
                                <div>
                                    <h5>Perfil</h5>
                                    <h4>Estudiante</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="img_rol">
                        
                        <div class="perfPandora">
                            <!--Linea de codigo que invoca el grafico de perfilamiento-->
                            <canvas id="grafPerfPandora"></canvas>
                        </div>

                        <div class="perfPandora">
                            <img id="img_rolDelEstudiante" class="img_perfRol" src="/assets/images/roles/noblider2.jpg" alt="">
                        </div>
                    </div>
                </div>   
            </main>
        </div>
    </body>
</html>
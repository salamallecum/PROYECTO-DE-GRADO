<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="/assets/css/PracticasStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/dashboard_practicas.js" type="module"></script>
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
                        <a class="link_menu-active" href="/DashBoard_Practicas.html">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/AdministradorDeConvocatoriasExternas_Practicas.html">
                            <span class="ti-hand-point-up" title="Convocatorias"></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="/AdministradorDeEportafolios_Practicas.html">
                            <span class="ti-archive" title="E-portafolios"></span>
                            <span class="items_menu">E-PORTAFOLIOS</span>
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
                            <span><img src="assets/images/ico_eportafolios.PNG"></span>
                            <div>
                                <h5>E-portafolios públicos</h5>
                                <h4>1</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="ti-reload"></span>
                            <span>Actualizar</span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_convocatoria.png"></span>
                            <div>
                                <h5>Convocatorias</h5>
                                <h4>2</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="ti-calendar"></span>
                            <span>Last day</span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_evento.png" alt=""></span>
                            <div>
                                <h5>Eventos</h5>
                                <h4>4</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span>En la última hora</span>
                        </div>
                    </div>
    
                    <div class="card-single">
                            <div class="card-body">
                                <span><img src="assets/images/practicas_profile.png"></span>
                                <div>
                                    <h5>Perfil</h5>
                                    <h4>Coordinación prácticas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <!--AQUI PARA ABAJO ESTÁN LAS GRAFICAS-->
                    <div class="graficasActividades">

                        <div class="grafCompYActividades">                               
                            <br>
                            <p class="tituloGrafico">Balance general de actividades</p>
                            <br>
                            <canvas id="graficaCompGeneralVsActividades"></canvas> 
                            <p class="etiqueta">Competencias generales (CG)</p>                               
                        </div>

                        <div class="grafCompYActividades">    
                            <br>
                            <br>                           
                            <canvas id="graficaCompEspecificaVsActividades"></canvas> 
                            <p class="etiqueta">Competencias específicas (CE)</p>                               
                        </div>
                    
                        <br>
                        <br>

                        <div class="grafBalanceConsolidado">
                            <br>
                            <p class="tituloGrafico">Consolidado - Roles Pandora</p>
                            <br>
                            <canvas id="graficaPorcentajeRolesPandora"></canvas>
                            <br>   
                        </div>
                        
                        <div class="grafBalanceConsolidado">
                            <br>
                            <p class="tituloGrafico">Balance de e-portafolios</p>
                            <br>
                            <canvas id="graficaBalanceDeEportafolios"></canvas>      
                            <br>
                        </div>
        
                    </div>
                </div>   
            </main>
        </div>
    </body>
</html>
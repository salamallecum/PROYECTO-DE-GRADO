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
        <script src="assets/js/dom/dashboard_profesor.js" type="module"></script>
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
                        <a class="link_menu-active" href="./DashBoard_Profesor.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./PerfilDeUsuario_Profesor.php?Id_profesor=29">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="link_menu" href="./AdministrarDesafios_Profesor.php?Id_profesor=29">
                            <span title="Administrador de desafios"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">ADMINISTRAR DESAFIOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./EvaluarTrabajos_Profesor.php?Id_profesor=29">
                            <span title="Evaluar trabajos"><i class="bi bi-card-checklist"></i></span>
                            <span class="items_menu">EVALUAR TRABAJOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosPersonalizados_Profesor.php?Id_profesor=29">
                            <span title="Profesores"><i class="bi bi-lightbulb"></i></span>
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
                        <span>Dashboard</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="dash-cards">
                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_trabajosPorEvaluar.png"></span>
                            <div>
                                <h5 class="tituloBloque">Trabajos por evaluar</h5>
                                <h4 class="resultadoBloque">1</h4>
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
                                <h5 class="tituloBloque">MegaInsignias otorgadas</h5>
                                <h4 class="resultadoBloque">3</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="ti-calendar"></span>
                            <span>Last day</span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_insigniasEspecific.png" alt=""></span>
                            <div>
                                <h5 class="tituloBloque">Insignias otorgadas</h5>
                                <h4 class="resultadoBloque">2</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span>En la última hora</span>
                        </div>
                    </div>
    
                    <div class="card-single">
                            <div class="card-body">
                                <span><img src="assets/images/teacher_profile.PNG"></span>
                                <div>
                                    <h5 class="tituloBloque">Perfil</h5>
                                    <h4 class="resultadoBloque">Profesor</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="pnl_graficas">

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
                        
                        </div>

                        <br>
                        <div class="graficasEstudiantes">

                            <div class="grafCompYEstudiantes">
                                <br>
                                <p class="tituloGrafico">Balance general de estudiantes</p>
                                <br>
                                <canvas id="graficaCompGeneralVsEstudiantes"></canvas>
                                <p class="etiqueta">Competencias generales (CG)</p>
                            </div>

                            <div class="grafCompYEstudiantes">
                                <br>
                                <br>
                                <canvas id="graficaCompEspecificaVsEstudiantes"></canvas>
                                <p class="etiqueta">Competencias específicas (CE)</p>
                            </div>

                        </div>
                    </div>
                </div>   
            </main>
        </div>
    </body>
</html>
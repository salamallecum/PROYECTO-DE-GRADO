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
        <script src="assets/js/dom/dashBoard_estudiante.js" type="module"></script>
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
                        <a class="link_menu" href="./DesafiosYEventos_Estudiante.php?Id_estudiante=38">
                            <span title="Desafios y eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosPersonalizados_Estudiante.php?Id_estudiante=38">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./ConvocatoriasExternas_Estudiante.php?Id_estudiante=38">
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
                            <span><img src="assets/images/ico_trabajosDestacados.PNG"></span>
                            <div>
                                <h5 class="tituloBloque">Trabajos Destacados</h5>
                                <h4 class="resultadoBloque">2</h4>
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
                                <h5 class="tituloBloque">Insignias</h5>
                                <h4 class="resultadoBloque">0</h4>
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
                                <h5 class="tituloBloque">E-portafolios</h5>
                                <h4 class="resultadoBloque">1</h4>
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
                                    <h5 class="tituloBloque">Perfil</h5>
                                    <h4 class="resultadoBloque">Estudiante</h4>
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
                            <img id="img_rolDelEstudiante" class="img_perfRol" src="assets/images/roles/virtTecnologico1.png" alt="">
                        </div>
                    </div>
                </div>   
            </main>
        </div>
    </body>
</html>
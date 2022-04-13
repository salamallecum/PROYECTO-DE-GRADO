<?php
require_once "logic/utils/Conexion.php";
require_once "logic/controllers/EventoControlador.php";
require_once "logic/controllers/ConvocatoriaControlador.php";
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/controllers/Eportafoliocontrolador.php";

session_start();

//Validamos que haya una sesión iniciada
if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Por favor, debes iniciar sesión");
            window.location = "../index.php";
        </script>
    ';
    header("Location: ../index.php");
    session_destroy();
    die();

}else{

    $objEventoControla = new EventoControlador();
    $objConvocatoriaControla = new ConvocatoriaControlador();
    $objEportafolioControla = new EportafolioControlador();
?>

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
        <link rel="stylesheet" href="assets/css/PracticasStyles.css">
        
        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/dashboard_practicas.js" type="module"></script>
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
                <ul class="menuPracticas">
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Practicas.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Practicas.php">
                            <span title="Convocatorias"><i class="bi bi-hand-index"></i></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="./AdministradorDeEportafolios_Practicas.php">
                            <span title="E-portafolios"><i class="bi bi-archive"></i></span>
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
                        <span><a href="logout.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="dash-cards">
                    <div class="card-single">
                        <div class="card-body">
                            <span><img src="assets/images/ico_eportafolios.PNG"></span>
                            <div>
                                <h5 class="tituloBloque">E-portafolios públicos</h5>
                                <h4 class="resultadoBloque"><?php echo $objEportafolioControla->contadorDeEportafoliosPublicos();?></h4>
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
                                <h5 class="tituloBloque">Convocatorias</h5>
                                <h4 class="resultadoBloque"><?php echo $objConvocatoriaControla->contadorDeConvocatorias();?></h4>
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
                                <h5 class="tituloBloque">Eventos</h5>
                                <h4 class="resultadoBloque"><?php echo $objEventoControla->contadorDeEventos();?></h4>
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
                                    <h5 class="tituloBloque">Perfil</h5>
                                    <h4 class="resultadoBloque">Coordinación prácticas</h4>
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
<?php
}
?>
</html>
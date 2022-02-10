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
        <link rel="stylesheet" href="assets/css/PracticasStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpVisualizacionDeEportafolios.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>
        

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincEstudiante.PNG"></span>
                    <span>PANDORA</span>
                </h3>
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Practicas.php">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Practicas.php">
                            <span class="ti-hand-point-up" title="Convocatorias"></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="./AdministradorDeEportafolios_Practicas.php">
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
                        <span>Administrador de e-portafolios</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                
                <div class="main-tableEportafolios">
                   <br>
                    <h3 class="titulo_seccion">E-portafolios publicados</h3>
                    <br>
                    <br>

                    <!--ESTRUCTURA DE TABLA DE EPORTAFOLIOS-->
                    <table id="table_eportafolios" class="tablaDeEportafolios">
                        <thead>
                            <tr>
                                <th class="campoTabla">Foto</th>
                                <th class="campoTabla">Nombres</th>
                                <th class="campoTabla">Apellidos</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                        <tr class="filasDeDatosTablaEportafolios">
                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                            <td class="datoTabla">LUIS ALEJANDRO</td>
                            <td class="datoTabla">AMAYA TORRES</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a name="openModal2" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                </div>

                            </div></td>
                        </tr>
                    </table>
                </div>               

                <!--ESTRUCTURA DEL POPUP PARA COMPARTIR UN E-PORTAFOLIO-->
                <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Compartir E-portafolio</h3>
                            <br>
                            <p>Ingrese el correo electrónico del usuario con el que desea compartir este e-portafolio.</p>
                            <br>

                            <div class="formulario-comparitEportafolio">
                                <form id="formularioParaCompartirEportafolio" action="logic/capturaDatEportafolio.php" method="POST">
                                    <label class="camposFormulario">Correo electrónico</label>
                                    <input name="correoDestino" placeholder="" type="email" class="form-control" required="true">
                                    <br>
                                    <br>
                                    <br>
                                    <button type="submit" name="enviarEportafolio" class="btn_agregarConvocatoria" title="Enviar E-portafolio">Enviar</button>
                                    <a id="btn_cancelar2" class="btn_agregarConvocatoria" title="Cerrar">Cerrar</a>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatEportafolio.php") ?>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                
            </main>
        </div>
    </body>
</html>
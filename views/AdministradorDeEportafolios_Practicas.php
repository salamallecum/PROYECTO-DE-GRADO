
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
        <script src="assets/js/dom/funcionesBasicasPopUpVisualizacionDeEportafolios.js" type="module"></script>
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
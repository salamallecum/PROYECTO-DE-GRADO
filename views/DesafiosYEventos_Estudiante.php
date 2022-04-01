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
        
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/EstudianteStyles.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpDesafiosOEventos.js" type="module"></script>
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
                        <a class="link_menu" href="./PerfilDeUsuario_Estudiante.php?Id_profesor=29">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./TrabajosDestacados_Estudiante.php?Id_profesor=29">
                            <span title="Trabajos destacados"><i class="bi bi-clipboard-check"></i></span>
                            <span class="items_menu">TRABAJOS DESTACADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./E-portafolio_Estudiante.php?Id_profesor=29">
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
                        <a class="link_menu" href="./Insignias_Estudiante.php?Id_profesor=29">
                            <span title="Insignias"><i class="bi bi-award"></i></span>
                            <span class="items_menu">INSIGNIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosPersonalizados_Estudiante.php?Id_profesor=29">
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
                        <span>Desafios y Eventos</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="dash-cards">
                    <div class="card-desafioOEvento">
                        <div class="card-desafioOEventobody">
                            <span class="imgContent"><img class="imgDesafioOEvento" src="assets/images/imgPorDefecto.jpg"></span>
                            <div>
                                <h4 class="tituloDesafioOEvento">DESAFIO DE PRUEBA</h4>
                                <br>
                                <div class="contenedor_boton">
                                    <a name="openModal" class="btn_agregarTrabajo" title="Ver detalles">Detalles</a>    
                                </div>                             
                            </div>
                        </div>
                    </div>

                    <div class="card-desafioOEvento">
                        <div class="card-desafioOEventobody">
                            <span class="imgContent"><img class="imgDesafioOEvento" src="assets/images/imgPorDefecto.jpg"></span>
                            <div>
                                <h4 class="tituloDesafioOEvento">EVENTO DE PRUEBA</h4>
                                <br>
                                <div class="contenedor_boton">
                                    <a name="openModal" class="btn_agregarTrabajo" title="Ver detalles">Detalles</a>    
                                </div>                             
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE DESAFIOS O EVENTOS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDelDesafioOEvento" class="imgEncabezadoInfoActividad" src="/assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDelDesafioOEvento" class="titulo_seccion">DESAFIO DE PRUEBA</h3>
                             
                                <div class="informacionDelDesafioOEvento">

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Profesor:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_nombreDelEstudiante" class="enunciadoDesafioOEvento">PEPITO PEREZ</p></td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Correo:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_nombreDelEstudiante" class="enunciadoDesafioOEvento">pperez@unbosque.edu.co</p></td>
                                        </tr>

                                    </table>
                                    <br>
            
                                    <label class="subtitulosInfo">Descripción</label>
                                    <p id="lbl_descripcionDelDesafioOEvento" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciado" class="btn-fill pull-right btn btn-info" title="Descargar enunciado">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha inicio:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                                
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha fin:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="subtitulosInfo">Estado de la actividad:</label>  </td>
                                            <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                        </tr>

                                    </table>
                                                                
                                    <br>
                                    <br>    
                                    <a id="btn_cancelar1" class="btn_agregarTrabajo" title="Atrás">Atrás</a>
                                    <a id="openModal2" class="btn_agregarTrabajo" title="Aplicar">Aplicar</a>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    
                    
                    <!--ESTRUCTURA DEL POPUP DE APLICACION A DESAFIOS O EVENTOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Aplicación a un Desafío o Evento</h3>
                            <br>
                            <p>Seleccione el trabajo destacado con el cual desea aplicar.</p>
                            <br>
                            <form class="">
                                <select id="cmb_trabajosDestacadosDisponiblesParaAplicación" name="trabDispParaAplicación" class="form-control" name="cmb_semestre">
                                    <option value="" selected>Seleccione</option>
                                </select>
                            </form>
                            <br>
                            <a id="btn_aplicarTrabajo" class="btn_agregarTrabajo" title="Aplicar trabajo">Aplicar</a>
                            <a id="btn_cancelar2" class="btn_agregarTrabajo" title="Cancelar">Cancelar</a>
                        </div>
                    </div>
                </div> 
            </main>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/ComiteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpRegistroProfesor_Comite.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincComite.PNG"></span>
                    <span>PANDORA</span>
                </h3>
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Comite.php">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./RegistroDeProfesores_Comite.php">
                            <span class="ti-user" title="Profesores"></span>
                            <span class="items_menu">PROFESORES</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeMaterias_Comite.php">
                            <span class="ti-clipboard" title="Materias"></span>
                            <span class="items_menu">MATERIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeCompetencias_Comite.php">
                            <span class="ti-archive" title="Competencias"></span>
                            <span class="items_menu">COMP.PROGRAMA</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeEventos_Comite.php">
                            <span class="ti-flag" title="Eventos"></span>
                            <span class="items_menu">EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Comite.php">
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
                        <span>Registro de profesores</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="titulo_seccion">Nuevo profesor</h3>
                        </div>

                        <div class="card-center">
                            <form action="../controllers/comite/registroDeProfesor.php" method="POST" class="">
                                <div class="row">
                                    <div class="pr-1 col-md-6">
                                        <div>
                                            <label>Email</label>
                                            <input id="txt_email" name="email" maxlength="50" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="pr-1 col-md-6">
                                        <div>
                                            <label>Usuario</label>
                                            <input id="txt_usuario" name="usuario" maxlength="10"  type="text" class="form-control">
                                        </div>
                                    </div>
                              
                                </div>

                                <br>

                                <div class="row">
                                    <div class="pr-1 col-md-4">
                                        <div>
                                            <label>Contraseña</label>
                                            <input id="txt_contraseña" name="contraseña" maxlength="10" type="text" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="pr-1 col-md-4">
                                        <div>
                                            <label>Nombres</label>
                                            <input id="txt_nombres" name="nombres" maxlength="30" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="pr-1 col-md-4">
                                        <div>
                                            <label>Apellidos</label>
                                            <input id="txt_apellidos" name="apellidos" maxlength="30" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br> 
                                <br>                    
                                <div class="justify-content-md-center row">
                                    <div class="col">
                                        <!--Este boton tu lo programas-->
                                        <button type="submit" name="registrarProfesor" class="btn-fill pull-right btn btn-info" title="Crear profesor">Crear profesor</a>
                                    </div>
                                </div>
                            </form>
                            <!--Incluios el archivo con la logica del formulario-->
                            <?php include("logic/registrarProfesor.php") ?>

                        </div>

                        <!--POPUP DE REGISTRO DE PROFESOR SATISFACTORIO-->
                        <div id="modal_container" class="modal_container" name="modal_container">
                            <div class="modalSuccesful">
                                <div class="respuestaok">
                                    <img src="/assets/images/satisfactorio.png" alt="">
                                </div>

                                <div class="respuestaok">
                                    <h3 class="titulo_seccion">Profesor registrado satisfactoriamente.</h3>
                                </div>                               
                                
                                <br>
                                <br>
                                <a id="btn_aceptar" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
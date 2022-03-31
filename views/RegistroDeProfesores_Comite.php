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
        <link rel="stylesheet" href="assets/css/ComiteStyles.css">

    </head>

    <body>

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincComite.PNG"></span>
                    <span id="tituloPagPrincipal">PANDORA</span>
                </h3>
                <label for="sidebar-toggle"><i class="bi bi-menu-app"></i></label>
            </div>

            <div class="sidebar-menu">
            <ul class="menuComite">
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Comite.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./RegistroDeProfesores_Comite.php">
                            <span title="Profesores"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PROFESORES</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeMaterias_Comite.php">
                            <span title="Materias"><i class="bi bi-clipboard-check"></i></span>
                            <span class="items_menu">MATERIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeCompetencias_Comite.php">
                            <span title="Competencias"><i class="bi bi-archive"></i></span>
                            <span class="items_menu">COMP.PROGRAMA</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeEventos_Comite.php?Id=0">
                            <span title="Eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Comite.php">
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
                        <span>Registro de profesores</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
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
                            <form method="post">
                                <div class="row">
                                    <div class="pr-1 col-md-6">
                                        <div>
                                            <label>Email</label>
                                            <input id="txt_email" name="email" maxlength="50" type="email" class="form-control">
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
                                        <button type="submit" name="registroDeProfesor" class="btn-fill pull-right btn btn-info" title="Crear profesor">Crear profesor</a>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <?php include("logic/capturaDatProfesor.php") ?>
                        </div>  
                    
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
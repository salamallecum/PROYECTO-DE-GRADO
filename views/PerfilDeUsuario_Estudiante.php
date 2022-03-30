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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
        <link rel="stylesheet" href="/assets/css/EstudianteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpPerfilDeUsuario.js" type="module"></script>
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
                        <span>Perfil del estudiante</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="main-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="titulo_seccion">Editar perfil</h3>
                                </div>

                                <div class="card-center">
                                    <form class="">
                                        <div class="row">
                                            <div class="pr-1 col-md-5">
                                                <div>
                                                    <label>Programa (disabled)</label>
                                                    <input id="txt_programa" name="programa" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="px-1 col-md-3">
                                                <div>
                                                    <label>Usuario</label>
                                                    <input id="txt_usuario" name="usuario" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="pl-1 col-md-4">
                                                <div>
                                                    <label for="exampleInputEmail1">Correo Electrónico</label>
                                                    <input id="txt_email" name="email" placeholder="" type="email" class="form-control">
                                                </div>
                                            </div>                                 
                                        </div>

                                        <div class="row">
                                            <div class="pr-1 col-md-6">
                                                <div>
                                                    <label>Nombres</label>
                                                    <input id="txt_nombres" name="nombres" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="pl-1 col-md-6">
                                                <div>
                                                    <label>Apellidos</label>
                                                    <input id="txt_apellidos" name="apellidos" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <label>Dirección</label>
                                                    <input id="txt_apellidos" name="apellidos" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="pr-1 col-md-4">
                                                <div>
                                                    <label>Ciudad</label>
                                                    <input id="txt_ciudad" name="ciudad" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="px-1 col-md-4">
                                                <div>
                                                    <label>País</label>
                                                    <input  id="txt_pais" name="pais" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="px-1 col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="foto">Seleccione una foto de perfil</label>
                                                    <input  id="btn_fotoDePerfil" name="fotoDePerfil" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <label>Perfil profesional</label>
                                                    <textarea id="txt_perfilProfesional" name="perfilProfesional" cols="80" placeholder="Agregue información sobre usted" rows="8" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="justify-content-md-center row">
                                            <div class="col">
                                                <a id="btn_actualizarPerfil" class="btn-fill pull-right btn btn-info" title="Actualizar perfil">Actualizar Perfil</a>
                                            </div>

                                            <div class="col">
                                                <a id="openModal" class="btn-fill pull-right btn btn-info" title="Cambiar contraseña">Cambiar Contraseña</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-user card">
                                <div class="card-image">
                                    <img class="imgEncabezadoInfoEstudiante" src="/assets/images/uebAerea.jpg" alt="">
                                </div>
                                <div class="card-centerProfile">
                                    
                                    <div class="author">
                                        <a href="">
                                            <img id="lbl_fotoDePerfil" alt="..." class="avatar border-gray" src="/assets/images/imgPorDefecto.jpg">
                                            <h5 id=lbl_nombreDelEstudiante name="lblnombreEstudiante" class="nombreDelEstudiante"></h5>
                                            <br>
                                        </a>
                                        <p class="description">Perfil profesional</p>
                                    </div>
                                    <p id="lbl_perfilProfesional" class="description text-center"></p>
                                </div>
                                
                                <hr>

                                <div class="button-container mr-auto ml-auto">
                                    <table>
                                        <tr>
                                            <td><a href="" ><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a></td>                                           
                                            <td><table><tr><td></td></tr><tr><td></td></tr></table></td>
                                            <td><a href="#"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a></td>
                                        </tr>
                                    </table> 
                                </div>                          
                            </div>                            
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP DE CAMBIO DE CONTRASEÑA-->
                    <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Cambiar contraseña</h3>
                            <br>

                            <div class="formulario-cambioDeContraseña">
                                <form class="">
                                    <label>Contraseña actual</label>
                                    <input id="txt_contraseñaActual" name="txtContraseñaActual" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label>Contraseña nueva</label>
                                    <input id="txt_contraseñaNueva" name="txtContraseñaNueva" placeholder="" type="text" class="form-control">
                                    <br>
                                </form>
                            </div>
                           
                            <a id="btn_guardarContraseña" class="btn_agregarTrabajo" title="Guardar">Guardar</a>
                            <a id="btn_cancelar" class="btn_agregarTrabajo" title="Cancelar">Cancelar</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
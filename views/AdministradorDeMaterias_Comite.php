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
        <script src="assets/js/dom/funcionesBasicasPopUpRegistroAsigMaterias_Comite.js" type="module"></script>
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
                        <span>Administrador de materias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
               <div class="contenedor">
                   
                    <div class="lbl-menu">
                        <span class="ti-plus"><label for="radio1"> Nueva Materia</label></span>
                        <span id="menu" class="ti-arrows-horizontal"><label for="radio2">Asignar Materia</label></span>
                   </div>

                   <div class="content">
                        <input type="radio" name="radio" id="radio1" checked>
                        <div class="tab1">
                            
                            <h3 class="titulo_seccion">Nueva materia</h3>
                            <br>
                            
                            <form class="">

                                <label class="camposFormulario">Materia</label>
                                <input id="txt_materia" name="materia" placeholder="" type="text" class="form-control">

                                <table>
                                    <tr>
                                        <td class="column-form-regMaterias">
                                            <label class="camposFormulario">Código</label>
                                            <input id="txt_codigo" name="codigo" placeholder="" type="text" class="form-control">
                                        </td>

                                        <td class="column-form-regMaterias">
                                            <label class="camposFormulario">Semestre</label><br>
                                            <select class="form-control" id="cmb_semestres" name="cmbSemestres">
                                                <option value="" selected>Seleccione</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="camposFormulario">Tipo</label><br>
                                            <select class="form-control" id="cmb_tipoMaterias" name="cmbtipoMaterias">
                                                <option value="" selected>Seleccione</option>
                                                <option value="obligatoria">Obligatoria</option>
                                                <option value="electiva">Electiva</option>
                                            </select>
                                        </td>

                                        <td>
                                            <label class="camposFormulario">Jornada</label><br>
                                            <select  class="form-control" id="cmb_jornadas" name="cmbJornadas">
                                                <option value="" selected>Seleccione</option>
                                                <option value="diurna">Diurna</option>
                                                <option value="nocturna">Nocturna</option>
                                            </select>
                                        </td>
                                    </tr>

                                </table>
                                                
                                <br>                     
                                <!--Este boton tu lo programas-->
                                <a id="btn_crearMateria" class="btn-fill pull-right btn btn-info" title="Crear materia">Crear materia</a>

                            </form>
                        </div>
                            
                        <input type="radio" name="radio" id="radio2">
                        <div class="tab2">
                            <h3 class="titulo_seccion">Asignar materia</h3>
                            <br>

                            <form class="">

                                <label class="camposFormulario">Materia</label><br>
                                <!--Este boton tu lo programas-->
                                <select class="form-control" id="cmb_materias" name="cmbMaterias">
                                    <option value="" selected>Seleccione</option>
                                </select>

                                <br>

                                <label class="camposFormulario">Profesor</label><br>
                                <!--Este boton tu lo programas-->
                                <select  class="form-control" id="cmb_profesores" name="cmbProfesores">
                                    <option value="" selected>Seleccione</option>
                                </select>

                                <br>                     
                                <!--Este boton tu lo programas-->
                                <a id="btn_AsignarMateria" class="btn-fill pull-right btn btn-info" title="Asignar materia">Asignar materia</a>

                            </form>
                        </div>
                   </div>

                   <!--POPUP DE REGISTRO DE MATERIA SATISFACTORIO-->
                   <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Materia registrada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>
                    
                   <!--POPUP DE ASIGNACION DE MATERIA SATISFACTORIO-->
                   <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Materia asignada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar2" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>
               </div>
            </main>
        </div>
    </body>
</html>
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
         <script src="assets/js/dom/funcionesBasicasPopUpDesafios.js" type="module"></script>
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
                        <span>Administrador de Desafios</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="card-header">
                    <button type="button" class="btn_agregarDesafio" data-bs-toggle="modal" data-bs-target="#modalRegistrarDesafio" title="Nuevo Desafio">Nuevo desafio</button>                   
                </div>

                <div class="main-tableDesafios">
                   <br>
                    <h3 class="titulo_seccion">Desafios existentes </h3>

                    <!--ESTRUCTURA DE TABLA DE DESAFIOS-->
                    <table id="table_desafios" class="tablaDeDesafios">
                        <thead>
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre desafio</th>
                                <th class="campoTabla">Descripción</th>
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <!--Aqui van los registros de la tabla de desafios-->
                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">DESAFIO DE PRUEBA 1</td>
                            <td class="datoTabla">Desafio creado para la construcción de la tabla</td>
                            <td class="datoTabla"> 01/01/2021</td>
                            <td class="datoTabla">31/12/2021</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal2" href="" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a name="openModal3" href="" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">DESAFIO DE PRUEBA 2</td>
                            <td class="datoTabla">Desafio creado para la construcción de la tabla</td>
                            <td class="datoTabla"> 01/01/2021</td>
                            <td class="datoTabla">31/12/2021</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal2" href="" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a name="openModal3" href="" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                </div>
                            </div></td>
                        </tr>
                    </table>



                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE DESAFIOS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nuevo Desafio</h3>
                            <br>
                            
                            <div class="formulario-registroDesafio">
                                <form class="">
                                    
                                    <label class="camposFormulario">Materia</label><br>
                                    <select class="form-control" id="cmb_materiasDelProfesor" name="cmbMateriasDelProfesor">
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Nombre del desafio</label><br>
                                    <input id="txt_nombreDesafio" name="nombreDesafio" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionDesafio" name="descripcionDesafio" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info del desafio</label><br>
                                    <input  id="btn_cargaArchivoInfoDelDesafio" name="btnCargaArchivoInfoDelDesafio" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="date_fechaInicioDesafio" name="dateFechaInicioDesafio" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="date_fechaFinDesafio" name="dateFechaFinDesafio" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para el desafio</label><br>
                                    <input  id="btn_imgParaElDesafio" name="imgParaElDesafio" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Comp. generales a las cuales contribuye el desafio</label><br>
                                                <select class="form-control" id="cmb_competenciasGenerales" name="cmbCompetenciasGenerales">
                                                    <option value="" selected>Seleccione</option>
                                                </select>
                                            </td>
                                            <td><a name="openModal4" class="btn-fill pull-right btn btn-info" title="Analizar competencias">Analizar</a></td>
                                        </tr>
                                    </table>                                   
                                    <br>
                                    <br>    
                                    <a id="btn_guardarDesafio" class="btn_agregarDesafio" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar1" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE DESAFIOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Desafio</h3>
                            <br>
                            
                            <div class="formulario-registroDesafio">
                                <form class="">

                                    <label class="camposFormulario">Materia</label><br>
                                    <select class="form-control" id="cmb_materiasDelProfesor" name="cmbMateriasDelProfesor">
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Nombre del desafio</label><br>
                                    <input id="txt_nombreDesafio" name="nombreDesafio" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionDesafio" name="descripcionDesafio" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info del desafio</label><br>
                                    <input  id="btn_cargaArchivoInfoDelDesafio" name="btnCargaArchivoInfoDelDesafio" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="date_fechaInicioDesafio" name="dateFechaInicioDesafio" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="date_fechaFinDesafio" name="dateFechaFinDesafio" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para el desafio</label><br>
                                    <input  id="btn_imgParaElDesafio" name="imgParaElDesafio" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Comp. generales a las cuales contribuye el desafio</label><br>
                                                <select class="form-control" id="cmb_competenciasGenerales" name="cmbCompetenciasGenerales">
                                                    <option value="" selected>Seleccione</option>
                                                </select>
                                            </td>
                                            <td><a name="openModal4" class="btn-fill pull-right btn btn-info" title="Analizar competencias">Analizar</a></td>
                                        </tr>
                                    </table>                                   
                                    <br>
                                    <br>    
                                    <a id="btn_actualizarDesafio" class="btn_agregarDesafio" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar2" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE DESAFIOS-->
                    <div id="modal_container3" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Desafio</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarDesafio" class="btn_agregarDesafio" title="Si">Si</a>
                            <a id="btn_cancelar3" class="btn_agregarDesafio" title="No">No</a>
                        </div>
                    </div>
                   

                    <!--POPUP PARA LA EVALUACIÓN DE COMPETENCIAS QUE CONTRIBUYEN A UN DESAFIO-->
                    <div id="modal_container4" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Evaluación de competencias</h3>
                            <br>
                            <p>Evalúe el nivel de competencia propuesto por el desafio para las siguientes competencias específicas: </p>
                            <br>


                            <div class="contenedor_compEspecificas">

                                <form class="">
                                    <!--Este es el código que contiene las competencias específicas a evaluar-->
                                    <div class="contenedorCompeEspeciasAEvaluar">
                                        <p id="lbl_enunciadoCompetenciaEspecíficaAEvaluar" name="enunciadoCompetenciaEspecíficaAEvaluar" class="enunciadoCompetenciaEspecíficaAEvaluar">1. Competencia específica 1.</p>
                                        
                                        <!--Tabla de radiobuttons para evaluar competencia específica-->
                                        <table>
                                            <tr>
                                                <td><input type="radio" id="radio_contribucionBaja" name="contribucionBaja" value="">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionMedia" name="contribucionMedia" value="">
                                                <label for="Media">Media</label></td></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionAlta" name="contribucionAlta" value="">
                                                <label for="Alta">Alta</label></td></td>

                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_NoContribucion" name="noContribucion" value="">
                                                <label for="No aplica">No aplica</label></td></td>
                    
                                            </tr>
                                        </table>

                                        <br>

                                        <p id="lbl_enunciadoCompetenciaEspecíficaAEvaluar" name="enunciadoCompetenciaEspecíficaAEvaluar" class="enunciadoCompetenciaEspecíficaAEvaluar">2. Competencia específica 2.</p>

                                        <!--Tabla de radiobuttons para evaluar competencia específica-->
                                        <table>
                                            <tr>
                                                <td><input type="radio" id="radio_contribucionBaja" name="contribucionBaja" value="">
                                                <label for="Baja">Baja</label></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionMedia" name="contribucionMedia" value="">
                                                <label for="Media">Media</label></td></td>
                                                
                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_contribucionAlta" name="contribucionAlta" value="">
                                                <label for="Alta">Alta</label></td></td>

                                                <td class=columnaNivelContribucion><td><input type="radio" id="radio_NoContribucion" name="noContribucion" value="">
                                                <label for="No aplica">No aplica</label></td></td>
                        
                                            </tr>
                                        </table>
                                    </div>  

                                    <br>
                                    <br>
                                    <a id="btn_guardarAnálisis" class="btn_agregarDesafio" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar4" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>

                                </form>
                            </div>                            
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
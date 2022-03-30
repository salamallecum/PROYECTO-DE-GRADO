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
        <script src="assets/js/dom/funcionesBasicasPopUpDesafiosPersonalizados_Profesor.js" type="module"></script>
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
                        <span>Administrador de desafios personalizados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="main-tableDesafios">
                   
                    <br>
                    <h3 class="titulo_seccion">Tabla de Propuestas</h3>

                    <!--ESTRUCTURA DE TABLA DE DESAFIOS PERSONALIZADOS PARA APROBACION DEL PROFESOR-->
                    <table id="table_desafosPersonalizadosProfesor" class="tablaDeDesafios">
                        <thead class="encab_tablaPropuestas">
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre propuesta</th>
                                <th class="campoTabla">Descripción</th>
                                <th class="campoTabla">Desafio que reemplaza</th>
                                <th class="campoTabla">Estado</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <!--Aqui van los registros de la tabla de propuestas presentadas por los estudiantes para que el docente las revise-->
                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 1</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Aprobada</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                
                                <div class="col-botonesEdicion">
                                    <a name="openModal6" href="" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 2</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Rechazada</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal8" href="" title="Ver propuesta"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 3</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Por revisar</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal9" href="" title="Ver propuesta"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Por revisar</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal9" href="" title="Ver propuesta"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Por revisar</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal9" href="" title="Ver propuesta"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>
                            </div></td>
                        </tr>

                        <tr class="filasDeDatosTablaDesafios">
                            <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                            <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                            <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                            <td class="datoTabla">Por revisar</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a name="openModal9" href="" title="Ver propuesta"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>
                            </div></td>
                        </tr>
                    </table>
                

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS RECHAZADAS-->
                     <div id="modal_container8" class="modal_container" name="modal_container">
                         <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDeLaPropuesta" class="imgEncabezadoInfoActividad" src="assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDeLaPropuesta" class="titulo_seccion">PROPUESTA DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estudiante:</label></td>
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
                                    <p id="lbl_descripcionDeLaPropuesta" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciadoPropuesta" class="btn-fill pull-right btn btn-info" title="Descargar enunciado propuesta">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                            <td class="columnaInfoEnunciado"><label id="lbl_fechaDePropuesta">01/01/2021</label></td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Desafio al que reemplaza:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_desafioAReemplazar" class="enunciadoDesafioOEvento">DESAFIO SUSTITUTO DE PRUEBA 1</p></td>
                                        </tr>
                                    </table>
                                                             
                                    <br>  

                                    <form class="">
                                        <label class="subtitulosInfo">Observaciones</label>
                                        <textarea disabled id="txt_ObservacionesALaPropuesta" name="observacionesAPropuesta" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    </form>
                                    <br>
                                                                            
                                    <br>
                                    <br>    
                                    <a id="btn_detalleDesafioReferenciado" name="btnDetalleDesafioReferenciado" class="btn_agregarDesafio" title="Ver desafio">Ver desafio</a>   
                                    <a id="btn_cancelar8" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS POR REVISAR-->
                    <div id="modal_container9" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDeLaPropuesta" class="imgEncabezadoInfoActividad" src="/assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDeLaPropuesta" class="titulo_seccion">PROPUESTA DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">

                                   <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estudiante:</label></td>
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
                                    <p id="lbl_descripcionDeLaPropuesta" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciadoPropuesta" class="btn-fill pull-right btn btn-info" title="Descargar enunciado propuesta">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                            <td class="columnaInfoEnunciado"><label id="lbl_fechaDePropuesta">01/01/2021</label></td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Desafio al que reemplaza:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_desafioAReemplazar" class="enunciadoDesafioOEvento">DESAFIO SUSTITUTO DE PRUEBA 1</p></td>
                                        </tr>
                                    </table> 
                                    <br>

                                    <form class="">
                                        <label class="subtitulosInfo">Observaciones</label>
                                        <textarea id="txt_ObservacionesALaPropuesta" name="observacionesAPropuesta" cols="80" placeholder="Escriba sus comentarios aquí" rows="8" class="form-control"></textarea>
                                    </form>
                                    <br>
                                    
                                                                
                                    <br>
                                    <br> 
                                    <a id="btn_detalleDesafioReferenciado" name="btnDetalleDesafioReferenciado" class="btn_agregarDesafio" title="Ver desafio">Ver desafio</a>   
                                    <a id="btn_aprobarPropuesta" class="btn_agregarDesafio" title="Aprobar propuesta">Aprobar</a>
                                    <a id="btn_rechazarPropuesta" class="btn_agregarDesafio" title="Rechazar propuesta">Rechazar</a>
                                    <a id="btn_cancelar9" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE PROPUESTAS DE DESAFIOS-->
                    <div id="modal_container6" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Propuesta</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarPropuesta" class="btn_agregarDesafio" title="Si">Si</a>
                            <a id="btn_cancelar6" class="btn_agregarDesafio" title="No">No</a>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS-->
                    <!--LA IDEA ES QUE EN ESTE POPUP SE CARGUE LA INFO DEL DESAFIO QUE ESTA SIENJDO REFERENCIADO EN LA PROPUESTA PRESENTADA POR EL ESTUDIANTE-->
                    <div id="modal_container7" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDelDesafioOEvento" class="imgEncabezadoInfoActividad" src="/assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDelDesafioOEvento" class="titulo_seccion">DESAFIO SUSTITUTO DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">
            
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
                                    <a id="btn_cancelar7" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </main>
        </div>
    </body>
</html>
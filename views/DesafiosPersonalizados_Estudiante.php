<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="/assets/css/EstudianteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpDesafiosPersonalizados_Estudiante.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
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
                        <span>Administrador de desafios personalizados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="card-header">
                    <a id="openModal" class="btn_agregarPropuesta" title="Nuevo Propuesta">Nueva propuesta</a>                   
                </div>

                <div class="main-tableDesafios">
                   <br>
                    <h3 class="titulo_seccion">Mis Propuestas</h3>
                    <br>

                   <!--ESTRUCTURA DE TABLA DE DESAFIOS PERSONALIZADOS PROPUESTOS POR EL ESTUDIANTE-->
                   <table id="table_desafosPersonalizadosEstudiante" class="tablaDeDesafios">
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

                    <!--Aqui van los registros de la tabla de propuestas creadas por el estudiante -->
                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 1</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Aprobada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>

                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 2</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Rechazada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                            </div>

                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>

                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 3</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Entregada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                            </div>

                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>

                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Entregada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                            </div>

                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>

                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Entregada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                            </div>

                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>

                    <tr class="filasDeDatosTablaDesafios">
                        <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                        <td class="datoTabla">PROPUESTA DE PRUEBA 4</td>
                        <td class="datoTabla">Propuesta creada para la construcción de la tabla</td>
                        <td class="datoTabla">DESAFIO SUSTITUTO DE PRUEBA</td>
                        <td class="datoTabla">Entregada</td>
                        <td class="datoTabla"><div class="compEsp-edicion">
                            <div class="col-botonesEdicion">
                                <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                            </div>

                            <div class="col-botonesEdicion">
                                <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                            </div>
                        </div></td>
                    </tr>
                </table>

                <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE PROPUESTAS-->
                <div id="modal_container1" class="modal_container" name="modal_container">
                    <div class="modal">
                        <h3 class="titulo_seccion">Nueva Propuesta</h3>
                        <br>
                        
                        <div class="formulario-registroPropuesta">
                            <form class="">

                                <label class="camposFormulario">Nombre de la propuesta</label><br>
                                <input id="txt_nombrePropuesta" name="nombrePropuesta" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcionPropuesta" name="descripcionPropuesta" cols="80" placeholder="Agregue una descripción de su propuesta" rows="8" class="form-control"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de propuesta</label><br>
                                <input  id="btn_cargaArchivoInfoDePropuesta" name="btnCargaArchivoInfoDePropuesta" accept=".pdf" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la propuesta</label><br>
                                <input  id="btn_imgParaPropuesta" name="imgParaPropuesta" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Desafio que desea reemplazar</label><br>
                                <select class="form-control" id="cmb_Desafios" name="cmbDesafios">
                                    <option value="" selected>Seleccione</option>
                                </select>                                                             
                                
                                <br>
                                <br>    
                                <a id="btn_guardarPropuesta" class="btn_agregarPropuesta" title="Guardar">Guardar</a>
                                <a id="btn_cancelar1" class="btn_agregarPropuesta" title="Cancelar">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>

                <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACION DE PROPUESTAS-->
                <div id="modal_container2" class="modal_container" name="modal_container">
                    <div class="modal">
                        <h3 class="titulo_seccion">Actualizar Propuesta</h3>
                        <br>
                        
                        <div class="formulario-registroPropuesta">
                            <form class="">

                                <label class="camposFormulario">Nombre de la propuesta</label><br>
                                <input id="txt_nombrePropuesta" name="nombrePropuesta" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcionPropuesta" name="descripcionPropuesta" cols="80" placeholder="Agregue una descripción de su propuesta" rows="8" class="form-control"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de propuesta</label><br>
                                <input  id="btn_cargaArchivoInfoDePropuesta" name="btnCargaArchivoInfoDePropuesta" accept=".pdf" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la propuesta</label><br>
                                <input  id="btn_imgParaPropuesta" name="imgParaPropuesta" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Desafio que desea reemplazar</label><br>
                                <select class="form-control" id="cmb_Desafios" name="cmbDesafios">
                                    <option value="" selected>Seleccione</option>
                                </select>                                                             
                                
                                <br>
                                <br>    
                                <a id="btn_actualizarPropuesta" class="btn_agregarPropuesta" title="Actualizar">Actualizar</a>
                                <a id="btn_cancelar2" class="btn_agregarPropuesta" title="Cancelar">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>


               <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE PROPUESTAS DE DESAFIOS-->
               <div id="modal_container3" class="modal_container" name="modal_container">
                    <div class="modal">
                        <h3 class="titulo_seccion">Eliminar Propuesta</h3>
                        <br>
                        <p>¿Está seguro de que desea eliminar?</p>
                        <br>
                        <br>
                        <a id="btn_eliminarPropuesta" class="btn_agregarPropuesta" title="Si">Si</a>
                        <a id="btn_cancelar3" class="btn_agregarPropuesta" title="No">No</a>
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>
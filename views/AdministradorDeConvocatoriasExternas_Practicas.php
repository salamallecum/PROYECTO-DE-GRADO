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
        <link rel="stylesheet" href="/assets/css/PracticasStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpConvocatorias_Practicas.js" type="module"></script>
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
                        <a class="link_menu-active" href="/DashBoard_Practicas.html">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="/AdministradorDeConvocatoriasExternas_Practicas.html">
                            <span class="ti-hand-point-up" title="Convocatorias"></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="AdministradorDeEportafolios_Practicas.html">
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
                        <span>Administrador de convocatorias externas</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="/index.html">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                <div class="card-header">
                    <a id="openModal" class="btn_agregarConvocatoria" title="Nueva Convocatoria">Nueva convocatoria</a>                   
                </div>

                <div class="main-tableEventos">
                   <br>
                    <h3 class="titulo_seccion">Convocatorias existentes </h3>
                    <br>
                    <br>

                    <!--ESTRUCTURA DE TABLA DE CONVOCATORIAS-->
                    <table id="table_eventos" class="tablaDeConvocatorias">
                        <thead>
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre convocatoria</th>
                                <th class="campoTabla">Descripción</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <!--Aqui van los registros de la tabla de convocatorias-->
                        <tr class="filasDeDatosTablaConvocatorias">
                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="/assets/images/imgPorDefecto.jpg"></td>
                            <td class="datoTabla">CONVOCATORIA DE PRUEBA 1</td>
                            <td class="datoTabla">Convocatoria creada para la construcción de la tabla</td>
                            <td class="datoTabla"><div class="compEsp-edicion">

                                <div class="col-botonesEdicion">
                                    <a name="openModal4" href="" title="Detalles"><img src="/assets/images/verDetallesActividad.png"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a name="openModal2" href="" title="Editar"><img src="/assets/images/btn_editar.PNG"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a name="openModal3" href="" title="Eliminar"><img src="/assets/images/btn_eliminar.PNG"></a>
                                </div>
                            </div></td>
                        </tr>
                      
                    </table>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE CONVOCATORIAS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Convocatoria</h3>
                            <br>
                            
                            <div class="formulario-registroConvocatoria">
                                <form id="formularioDeRegistroDeConvocatorias_Practicas" class="form_nuevaConvocatoria">

                                    <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                    <input id="txt_nombreConvocatoria" name="nombreConvocatoria" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionConvocatoria" name="descripcionConvocatoria" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                    <input  id="btn_cargaArchivoInfoDeConvocatoria" name="btnCargaArchivoInfoDeConvocatoria" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                    <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoria" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>   
                                                                      
                                    <br>
                                    <br>    
                                    <a id="btn_guardarConvocatoria" class="btn_agregarConvocatoria" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar1" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LA CONVOCATORIA-->
                    <div id="modal_container4" class="modal_container" name="modal_container">
                        <div class="modalConvocatoria">
                            <div class="modalBody">
                                <h3 id="lbl_tituloDeConvocatoria" class="titulo_seccion">TITULO DE CONVOCATORIA</h3>
                                <br>  

                                <div class="pnl-imgConvocatoria">
                                    <img class="imgConvocatoriaDetalle" src="/assets/images/imgPorDefecto.jpg" alt="">
                                </div>
                                <br>
                                                                
                                <div class="perfilprof">
                                    <label class="subtitulosInfo">Descripción</label><br>
                                    <p id="lbl_descripcionDeConvocatoria" class="descripcionDelTrabajo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>
                                </div>

                                <br>
                                <a id="btn_descargarEnunciado" class="btn_agregarConvocatoria" title="DescargarEnunciado">Enunciado</a>
                                <br>
                                <br>
                                <br>

                                <div class="panel-trabDesacadosEInsignias">
                                    
                                    <label class="subtitulosInfo">E-portafolios postulados</label><br>
                                    
                                    <div class="pnlTabla-eportafolios">

                                        <!--ESTRUCTURA DE TABLA DE EPORTAFOLIOS-->
                                        <table id="table_eportafoliosPostuladosConv" class="tablaDeEportafoliosPostuladosConv">
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
                                                <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="/assets/images/team/alejo.jpeg"></td>
                                                <td class="datoTabla">LUIS ALEJANDRO</td>
                                                <td class="datoTabla">AMAYA TORRES</td>
                                                <td class="datoTabla"><div class="compEsp-edicion">
                                                    <div class="col-botonesEdicion">
                                                        <a name="" href="" target="_blank" title="Ver E-portafolio"><img src="/assets/images/verDetallesActividad.png"></a>
                                                    </div>

                                                    <div class="col-botonesEdicion">
                                                        <a name="openModal5" href="" title="Compartir E-portafolio"><img src="/assets/images/compartirEportafolio.png"></a>
                                                    </div>

                                                </div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>              
                                <a id="btn_cancelar4" class="btn_agregarConvocatoria" title="Atrás">Atrás</a>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE CONVOCATORIAS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Convocatoria</h3>
                            <br>
                            
                            <div class="formulario-registroConvocatoria">
                                <form class="">

                                    <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                    <input id="txt_nombreConvocatoria" name="nombreConvocatoria" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionConvocatoria" name="descripcionConvocatoria" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                    <input  id="btn_cargaArchivoInfoDeConvocatoria" name="btnCargaArchivoInfoDeConvocatoria" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                    <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoria" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>   
                                                                        
                                    <br>
                                    <br>    
                                    <a id="btn_actualizarConvocatoria" class="btn_agregarConvocatoria" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar2" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE CONVOCATORIAS-->
                    <div id="modal_container3" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Convocatoria</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarConvocatoria" class="btn_agregarConvocatoria" title="Si">Si</a>
                            <a id="btn_cancelar3" class="btn_agregarConvocatoria" title="No">No</a>
                        </div>
                    </div>

                     <!--ESTRUCTURA DEL POPUP PARA COMPARTIR UN E-PORTAFOLIO-->
                    <div id="modal_container5" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Compartir E-portafolio</h3>
                            <br>
                            <p>Ingrese el correo electrónico del usuario con el que desea compartir este e-portafolio.</p>
                            <br>

                            <div class="formulario-comparitEportafolio">
                                <form id="formularioParaCompartirEportafolio" class="">
                                    <label class="camposFormulario">Correo electrónico</label>
                                    <input id="txt_correo" name="txtCorreo" placeholder="" type="text" class="form-control">
                                    <br>
                                </form>
                            </div>
                            <br>
                        
                            <a id="btn_guardarContraseña" class="btn_agregarConvocatoria" title="Enviar E-portafolio">Enviar</a>
                            <a id="btn_cancelar5" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>
                        </div>
                    </div>

                    <!--POPUP DE REGISTRO DE CONVOCATORIA SATISFACTORIO-->
                    <div id="modal_container6" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Convocatoria registrada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar1" class="btn_agregarConvocatoria" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                    <!--POPUP DE ACTUALIZACION DE CONVOCATORIA SATISFACTORIO-->
                    <div id="modal_container7" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Convocatoria actualizada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar2" class="btn_agregarConvocatoria" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                    <!--POPUP DE ELIMINACION DE CONVOCATORIA SATISFACTORIO-->
                    <div id="modal_container8" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Convocatoria eliminada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar3" class="btn_agregarConvocatoria" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </body>
</html>
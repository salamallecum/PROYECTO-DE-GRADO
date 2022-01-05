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
        <link rel="stylesheet" href="assets/css/ComiteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpEventos.js" type="module"></script>
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
                        <span>Administrador de eventos</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                <div class="card-header">
                    <a id="openModal" class="btn_agregarEvento" title="Nuevo Evento">Nuevo evento</a>                   
                </div>

                <div class="main-tableEventos">
                   <br>
                    <h3 class="titulo_seccion">Eventos existentes </h3>
                    <br>
                    <br>

                    <!--Script para cargar datos en tabla de Eventos-->           
                    <?php
                       include("logic/conexionDB.php");

                        $query = "SELECT * FROM tbl_evento";
                        $query_run = mysqli_query(conectar(), $query);
                    ?>

                    <!--ESTRUCTURA DE TABLA DE EVENTOS-->
                    <table id="table_eventos" class="tablaDeEventos">
                        <thead>
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre evento</th>
                                <th class="campoTabla">Descripción</th>
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                    <?php
                        if($query_run){
                            foreach($query_run as $row){           
                    ?>

                        <tbody>
                            <tr class="filasDeDatosTablaEventos">
                                <?php 
                                //Aqui se traen las imagenes de cada evento
                                $nombreDeImg = $row['nombre_imagen'];

                                if($nombreDeImg != null){

                                ?>

                                    <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='<?php echo "eventosImages/".$nombreDeImg?>'></td>

                                <?php
                                }else{
                                ?>
                                
                                    <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='assets/images/imgPorDefecto.jpg'></td> 

                                <?php    
                                }                       
                                ?>
                                
                                <td class="datoTabla"><?php echo $row['nombre_evento'];  ?></td>
                                <td class="datoTabla"><?php echo $row['descripcion_evento'];  ?></td>
                                <td class="datoTabla"><?php echo $row['fecha_inicio'];  ?></td>
                                <td class="datoTabla"><?php echo $row['fecha_fin'];  ?></td>
                                <td class="datoTabla"><div class="compEsp-edicion">
                                    <div class="col-botonesEdicion">
                                        <a name="openModal2" href="" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                    </div>

                                    <div class="col-botonesEdicion">
                                        <a name="openModal3" href="" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                    </div>
                                </div></td>                                   
                            </tr>   
                        </tbody>

                    <?php
                            }
                        }else{
                            echo "No hay ningún evento registrado...";
                        }
                    ?>

                    </table>

                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE EVENTOS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nuevo Evento</h3>
                            <br>
                            
                            <div class="formulario-registroEvento">
                                <form id="formularioDeRegistroDeEventos" action="logic/EventoControlador.php" method="POST" enctype="multipart/form-data" >

                                    <label class="camposFormulario">Nombre del evento</label><br>
                                    <input id="txt_nombreEvento" name="nombreEvento" placeholder="" maxlength="30" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionEvento" name="descripcionEvento" cols="80" maxlength="250" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                    <input  id="btn_cargaArchivoInfoDelEvento" name="archivoInfoDelEvento" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="date_fechaInicioEvento" name="dateFechaInicioEvento" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="date_fechaFinEvento" name="dateFechaFinEvento" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Profesor encargado</label>
                                    <select  class="form-control" id="cbx_profesor" name="cbx_profesor">
                                        <option value="seleccione">Seleccione</option>

                                        <!--Codigo que llena el combobox de profesores con lo de la tabla de usuarios de la bd-->
                                        <?php
                                            include("logic/conexionDB.php");

                                            $consulta = "SELECT * FROM tbl_usuario WHERE id_rol = 2";
                                            $ejecutaConsulta = mysqli_query($conex, $consulta) or die(mysqli_error($conex));

                                        ?>

                                        <?php foreach($ejecutaConsulta as $opciones): ?>

                                            <option value="<?php echo $opciones['id_usuario']?>"><?php echo $opciones['nombres_usuario']?></option>

                                        <?php endforeach  ?>                                    
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para el evento</label><br>
                                    <input  id="btn_imgParaElEvento" name="imgParaElEvento" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>
                                    
                                    <label class="camposFormulario">Comp. generales a las cuales contribuye el evento</label>
                                    <br>

                                    <table>
                                        <tr class="filaSelectCompetencias">
                                            <td class="columnSelectCompetencias">
                                                
                                                <!--AQUI DEFINIMOS EL PANEL QUE CONTIENE LAS COMPETENCIAS GENERALES-->
                                                <div class="compentenciasContent">

                                                    <!--Codigo que llena el combobox de competencias con lo de la tabla de competencias generales de la bd-->
                                                    <?php
                                                        include("logic/conexionDB.php");

                                                        $consulta = "SELECT * FROM tbl_competencia_general";
                                                        $ejecutaConsulta = mysqli_query($conex, $consulta) or die(mysqli_error($conex));

                                                    ?>

                                                    <?php foreach($ejecutaConsulta as $opciones): ?>

                                                        <label>
                                                        <input type="checkbox" name="competencias[]" class="checkCompetenciaGeneral" value="<?php echo $opciones['id_comp_gral']?>" title="<?php echo $opciones['nombre_comp_gral']?>"> <?php echo $opciones['nombre_comp_gral']?> 
                                                        </label>
                                                        <br>

                                                    <?php endforeach  ?>

                                                </div>
                                            </td>
                                                    
                                            <td><input type="submit" name="btn_analizar"  id="btn_analizarComp"  class="btn-fill pull-right btn btn-info" value="Analizar"></td>
                                        </tr>
                                    </table>  
                                     
                                                                                                                           
                                    <br>
                                    <br>    
                                    <button type="submit" name="btn_guardarEvento" class="btn_agregarEvento" title="Guardar">Guardar</button>
                                    <button id="btn_cancelar1" name="btn_cancelarRegistro" class="btn_agregarEvento" title="Cancelar">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE EVENTOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Evento</h3>
                            <br>
                            
                            <div class="formulario-registroEvento">
                                <form class="">

                                    <label class="camposFormulario">Nombre del evento</label><br>
                                    <input id="txt_nombreEvento" name="nombreEvento" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_perfilProfesional" name="perfilProfesional" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                    <input  id="btn_cargaArchivoInfoDelEvento" name="btnCargaArchivoInfoDelEvento" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="date_fechaInicioEvento" name="dateFechaInicioEvento" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="date_fechaFinEvento" name="dateFechaFinEvento" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Profesor encargado</label>
                                    <select class="form-control" id="cmb_profesoresResponsables" name="cmbProfesoresResponsables">
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para el evento</label><br>
                                    <input  id="btn_imgParaElEvento" name="imgParaElEvento" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Comp. generales a las cuales contribuye el evento</label><br>
                                                <select class="form-control" id="cmb_competenciasGenerales" name="cmbCompetenciasGeneraless">
                                                    <option value="" selected>Seleccione</option>
                                                </select>
                                            </td>
                                            <td><button type="submit" name="analisiscomp" class="btn-fill pull-right btn btn-info" placeholder="Analizar Competencias">Analizar</button></td>
                                        </tr>
                                    </table>         
                                                              
                                    <br>
                                    <br>   
                                    <a id="btn_actualizarEvento" class="btn_agregarEvento" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar2" class="btn_agregarEvento" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE EVENTOS-->
                    <div id="modal_container3" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Evento</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarEvento" class="btn_agregarEvento" title="Si">Si</a>
                            <a id="btn_cancelar3" class="btn_agregarEvento" title="No">No</a>
                        </div>
                    </div>

                   

                    <!--POPUP PARA LA EVALUACIÓN DE COMPETENCIAS QUE CONTRIBUYEN A UN EVENTO-->
                    <div id="modal_container4" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Evaluación de competencias</h3>
                            <br>
                            <p>Evalúe el nivel de competencia propuesto por el evento para las siguientes competencias específicas: </p>
                            <br>


                            <div class="contenedor_compEspecificas">

                                <form class="">
                                    
                                    <!--Script para cargar datos en tabla de Eventos-->           
                                    <?php
                                        
                                        
                                        
                                    

                                    
                                    
                                    
                                    

                                    

                                        
                                    ?>
                                
                                
                                
                                
                                    <!--Este es el código que contiene las competencias específicas a evaluar
                                    <div class="contenedorCompeEspeciasAEvaluar">
                                        <p id="lbl_enunciadoCompetenciaEspecíficaAEvaluar" class="enunciadoCompetenciaEspecíficaAEvaluar">1. Competencia específica 1.</p>
                                        
                                        -Tabla de radiobuttons para evaluar competencia específica
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
                                    -->
                                    <br>
                                    <br>
                                    <a id="btn_guardarAnalisis" class="btn_agregarEvento" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar4" class="btn_agregarEvento" title="Cancelar">Cancelar</a>

                                </form>
                            </div>                            
                        </div>
                    </div>


                    <!--POPUP DE REGISTRO DE EVENTO SATISFACTORIO-->
                    <div id="modal_container5" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Evento registrado satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar1" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                     <!--POPUP DE ACTUALIZACION DE EVENTO SATISFACTORIO-->
                     <div id="modal_container6" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Evento actualizado satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar2" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                    <!--POPUP DE ELIMINACION DE EVENTO SATISFACTORIO-->
                     <div id="modal_container7" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Evento eliminado satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar3" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>

                    <!--POPUP DE EVALUACION DE COMPETENCIAS SATISFACTORIO-->
                    <div id="modal_container8" class="modal_container">
                        <div class="modalSuccesful">
                            <div class="respuestaok">
                                <img src="/assets/images/satisfactorio.png" alt="">
                            </div>

                            <div class="respuestaok">
                                <h3 class="titulo_seccion">Evalución de competencias guardada satisfactoriamente.</h3>
                            </div>                               
                            
                            <br>
                            <br>
                            <a id="btn_aceptar4" class="btn_agregarCompetencia" title="Aceptar">Aceptar</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
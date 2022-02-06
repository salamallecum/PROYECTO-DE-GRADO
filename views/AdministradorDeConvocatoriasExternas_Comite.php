<!--IMPORTANTE-->
<!--Los botones que tienen la palabra openModal, modal-container o btn_cancelar como nombre o id, son botones de navegación y por lo tanto no se deben tocar porque si función es interactiva-->
<!-- Los botones o componentes que tienen el prefijo lbl_ , txt_, date_ o btn_ son los que tu programas porque requieren manejo de datos con el backend-->
<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/ConvocatoriaControlador.php";
    require_once "logic/controllers/ProfesorControlador.php";
    require_once "logic/controllers/CompetenciaControlador.php";

    //Capturamos la variable id de la convocatoria para la eliminacion de la misma
    if(isset($_GET['Id'])){
        $idConvocatoria = $_GET['Id'];

        if($idConvocatoria > 0){
            
            $objConvocatoria = new ConvocatoriaControlador();

            if($objConvocatoria->eliminarConvocatoriaComite($idConvocatoria) == 1){}
        }
    }
   
?>


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
        <script src="assets/js/dom/funcionesBasicasPopUpConvocatorias_Comite.js" type="module"></script>
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
                        <a class="link_menu" href="./AdministradorDeEventos_Comite.php?Id=0">
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
                        <span>Administrador de convocatorias externas</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
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
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <!--Script para cargar datos en tabla de Convocatorias-->      
                        <?php
                            $obj = new ConvocatoriaControlador();
                            $sql = "SELECT Id, nombre_convocatoria, descripcion_convocatoria, fecha_inicio, fecha_fin, nombre_imagen from tbl_convocatoriacomite";
                            $datos = $obj->mostrarDatosConvocatorias($sql);
                            foreach ($datos as $key){
                        ?>

                                <!--Aqui van los registros de la tabla de convocatorias-->
                                <tr class="filasDeDatosTablaEventos">
                                    <?php 
                                    //Aqui se traen las imagenes de cada convocatorias
                                    $nombreDeImg = $key['nombre_imagen'];

                                    if($nombreDeImg != null){

                                    ?>

                                        <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='<?php echo "convocatoriasImages/".$nombreDeImg?>'></td>

                                    <?php
                                    }else{
                                    ?>
                                    
                                        <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='assets/images/imgPorDefecto.jpg'></td> 

                                    <?php    
                                    }                       
                                    ?>
                                            
                                    <td class="datoTabla"><input type="text" name="nombreEventoSeleccionado" value="<?php echo $key['nombre_convocatoria'];?>"><?php echo $key['nombre_convocatoria'];  ?></td>
                                    <td class="datoTabla"><input type="text" name="descripcionEventoSeleccionado" value="<?php echo $key['descripcion_convocatoria'];?>"><?php echo $key['descripcion_convocatoria'];  ?></td>
                                    <td class="datoTabla"><input type="text" name="fechaIniEventoSeleccionado" value="<?php echo $key['fecha_inicio'];?>"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><input type="text" name="fechaFinEventoSeleccionado" value="<?php echo $key['fecha_fin'];?>"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a name="btn_asignarCompetencias" href="" title="Asignar competencias"><img src="assets/images/btn_asignarCompetencias.png"></a>
                                        </div>
                                        
                                        <div class="col-botonesEdicion">
                                            <input type="texto" name="dato[]" class="idConvocatoriaInput" value="<?php echo $key['Id'];?>">
                                            <a name="openModal2" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                            
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a href="?Id=<?php echo $key['Id'] ?>" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                        </div>
                                    
                                    </div></td> 
                                                                    
                                </tr>    
                        <?php
                            }
                        ?>
                        </tbody>

                    </table>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE CONVOCATORIAS-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Convocatoria</h3>
                            <br>
                            
                            <div class="formulario-registroConvocatoria">
                                <form id="formularioDeRegistroDeConvocatorias" action="logic/capturaDatConvocatoria.php" method="POST" enctype="multipart/form-data">

                                    <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                    <input name="nombreConvocatoria" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea name="descripcionConvocatoria" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                    <input  id="btn_cargaArchivoInfoDeConvocatoria" name="archivoInfoDeConvocatoria" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="dateFechaInicioConvocatoria" name="dateFechaInicioConvocatoria" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="dateFechaFinConvocatoria" name="dateFechaFinConvocatoria" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Profesor encargado</label>
                                    <select class="form-control" id="cmb_profesoresResponsables" name="cmbProfesor">
                                        <option value="seleccione">Seleccione</option>

                                        <?php
                                            $obj = new ProfesorControlador();
                                            $sql = "SELECT id_usuario, nombres_usuario FROM tbl_usuario WHERE id_rol = 2";
                                            $datos = $obj->mostrarProfesoresRegistrados($sql);

                                            foreach ($datos as $key){
                                        ?>

                                                <option value="<?php echo $key['id_usuario']?>"><?php echo $key['nombres_usuario']?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                    <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoria" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>                            
                                    <br>
                                    <br> 
                                    <button type="submit" name="guardarConvocatoriaComite" id="btn_guardarConvocatoria"  class="btn_agregarConvocatoria" title="Guardar">Guardar</button>   
                                    <a id="btn_cancelar1" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatConvocatoria.php") ?>
                            </div>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE EVENTOS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Convocatoria</h3>
                            <br>
                            
                            <div class="formulario-registroConvocatoria">
                                <form id="formularioDeActualizacionDeConvocatorias" class="">

                                    <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                    <input id="txt_nombreConvocatoria" name="nombreConvocatoria" placeholder="" type="text" class="form-control">
                                    <br>

                                    <label class="camposFormulario">Descripción</label>
                                    <textarea id="txt_descripcionEvento" name="descripcionConvocatoria" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                    <input  id="btn_cargaArchivoInfoDeConvocatoria" name="btnCargaArchivoInfoDeConvocatoria" accept=".pdf" type="file" class="form-control">
                                    <br>

                                    <!--Espacio para colocar campos tipo calendar-->
                                    <table>
                                        <tr>
                                            <td><label class="camposFormulario">Fecha inicio</label>
                                                <input type="date" id="date_fechaInicioConvocatoria" name="dateFechaInicioConvocatoria" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                                
                                                <td><label class="camposFormulario">Fecha fin</label><br>
                                                <input type="date" id="date_fechaFinConvocatoria" name="dateFechaFinConvocatoria" class="form-control" min="2000-01-01" max="2040-12-31"></td>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <label class="camposFormulario">Profesor encargado</label>
                                    <select class="form-control" id="cmb_profesoresResponsables" name="cmbProfesoresResponsables">
                                        <option value="" selected>Seleccione</option>
                                    </select>
                                    <br>

                                    <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                    <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoria" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                    <br>
                                    <br>
                                    <br>    
                                    <a id="btn_actualizarConvocatoria" class="btn_agregarConvocatoria" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar2" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--POPUP PARA LA ASIGNACION DE COMPETENCIAS QUE CONTRIBUYEN A UN EVENTO-->
                    <div id="modal_container4" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Asignación de competencias</h3>
                            <br>
                            
                            <p>Seleccione las competencias generales a las cuales contribuye el evento.</p>
                            <br>
                            <br>

                            <table>
                                <tr>
                                    <td class="columnSelectCompetencias">
                                        <!--AQUI DEFINIMOS EL PANEL QUE CONTIENE LAS COMPETENCIAS ESPECÍFICAS-->
                                        <div class="compentenciasContent">

                                            <?php
                                                $obj = new CompetenciaControlador();
                                                $sql = "SELECT id_comp_gral, nombre_comp_gral FROM tbl_competencia_general";
                                                $datos = $obj->mostrarDatosCompetencias($sql);

                                                foreach ($datos as $key){
                                            ?>

                                            <input class="checkCompetenciaGeneral" type="checkbox" name="competenciasGenerales[]" value="<?php echo $key['id_comp_gral']?>" title="<?php echo $key['nombre_comp_gral']?>"> <?php echo $key['nombre_comp_gral']?>
                                            <br>

                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>                       
                            
                            <br>
                            <br>
                            <a id="btn_evaluarCompetencias" class="btn_agregarEvento" title="Analizar competencias">Analizar</a>
                            <a id="btn_cancelar4" class="btn_agregarEvento" title="Cancelar">Cancelar</a>
                         
                        </div>
                    </div>

                    <!--POPUP PARA LA EVALUACIÓN DE COMPETENCIAS QUE CONTRIBUYEN A UN EVENTO-->
                    <div id="modal_container5" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Evaluación de competencias</h3>
                            <br>
                            <p>Evalúe el nivel de competencia propuesto por la convocatoria para las siguientes competencias específicas: </p>
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
                                    <a id="btn_guardarAnalisis" class="btn_agregarConvocatoria" title="Guardar">Guardar</a>
                                    <a id="btn_cancelar5" class="btn_agregarConvocatoria" title="Cancelar">Cancelar</a>

                                </form>
                            </div>                            
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <script>
            function cambiarAMayuscula(elemento){
                let texto = elemento.value;
                elemento.value = texto.toUpperCase();
            }            

        </script>
    </body>
</html>
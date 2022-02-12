<!--IMPORTANTE-->
<!--Los botones que tienen la palabra openModal, modal-container o btn_cancelar como nombre o id, son botones de navegación y por lo tanto no se deben tocar porque si función es interactiva-->
<!-- Los botones o componentes que tienen el prefijo lbl_ , txt_, date_ o btn_ son los que tu programas porque requieren manejo de datos con el backend-->

<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/EventoControlador.php";
    require_once "logic/controllers/ProfesorControlador.php";
    require_once "logic/controllers/CompetenciaControlador.php";

    //Capturamos la variable id de la competencia general y el id de la competencia específica
    if(isset($_GET['Id'])){

        //Capturamos la variable id del evento para la eliminacion de un evento
        $idEvento = $_GET['Id'];

        if($idEvento > 0){
            
            $objEvento = new EventoControlador();

            if($objEvento->eliminarEvento($idEvento) == 1){}
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

        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                    <!--<a id="openModal" class="btn_agregarEvento" title="Nuevo Evento">Nuevo evento</a>-->
                    <button type="button" class="btn_agregarEvento" data-bs-toggle="modal" data-bs-target="#modalRegistrarEvento" title="Nuevo Evento">Nuevo evento</button>
                </div>

                <div class="main-tableEventos">
                   <br>
                    <h3 class="titulo_seccion">Eventos existentes </h3>

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

                        <tbody>

                        <!--Script para cargar datos en tabla de Eventos-->      
                        <?php
                            $obj = new EventoControlador();
                            $sql = "SELECT id_evento, nombre_evento, descripcion_evento, fecha_inicio, fecha_fin, nombre_imagen from tbl_evento";
                            $datos = $obj->mostrarDatosEventos($sql);
                            foreach ($datos as $key){
                        ?>
                                <tr class="filasDeDatosTablaEventos">
                                    <?php 
                                    //Aqui se traen las imagenes de cada evento
                                    $nombreDeImg = $key['nombre_imagen'];

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
                                    
                                    <td class="datoTabla"><input type="hidden" name="nombreEventoSeleccionado" value="<?php echo $key['nombre_evento'];?>"><?php echo $key['nombre_evento'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="descripcionEventoSeleccionado" value="<?php echo $key['descripcion_evento'];?>"><?php echo $key['descripcion_evento'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="fechaIniEventoSeleccionado" value="<?php echo $key['fecha_inicio'];?>"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="fechaFinEventoSeleccionado" value="<?php echo $key['fecha_fin'];?>"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a class="" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Asignar competencias"><img src="assets/images/btn_asignarCompetencias.png"></a>
                                        </div>
                                        
                                        <div class="col-botonesEdicion">
                                            <input type="texto" name="dato[]" class="idEventoInput" value="<?php echo $key['id_evento'];?>">
                                            <a class="" data-bs-toggle="modal" data-bs-target="#modalEditarEvento" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                            
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a href="?Id=<?php echo $key['id_evento'] ?>" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                        </div>
                                    
                                    </div></td> 
                                                                    
                                </tr>    
                        <?php
                            }
                        ?>
                                               
                        </tbody>  
                    </table>

                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE EVENTOS-->
                    <div class="modal fade" id="modalRegistrarEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nuevo Evento</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeRegistroDeEventos" action="logic/capturaDatEvento.php" method="POST" enctype="multipart/form-data">
                                    
                                <label class="camposFormulario">Nombre del evento</label><br>
                                <input name="nombreEvento" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea name="descripcionEvento" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                <input  id="btn_cargaArchivoInfoDelEvento" name="archivoInfoDelEvento" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" name="dateFechaInicioEvento" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" name="dateFechaFinEvento" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Profesor encargado</label>
                                <select class="form-control" id="cmb_profesoresResponsables" name="cmbProfesor" required="true">
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

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el evento</label><br>
                                <input  id="btn_imgParaElEvento" name="imgParaElEvento" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>                    
                                <br>
                                <br>    
                                <button type="submit" name="guardarEvento" id="btn_guardarEvento"  class="btn_agregarEvento" title="Guardar">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                                  
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatEvento.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE EVENTOS-->
                    <div class="modal fade" id="modalEditarEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar Evento</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeRegistroDeEventos" action="logic/capturaDatEvento.php" method="POST" enctype="multipart/form-data">

                                <input type="text" id="idEvento" value="">

                                <label class="camposFormulario">Nombre del evento</label><br>
                                <input id="txt_nombreEvento" name="nombreEventoEditado" id="nombreEventoEdit" onblur="cambiarAMayuscula(this)" placeholder="" type="text" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcionEvento" name="descripcionActualizada" id="descripcionEdit" cols="80" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                <input  id="btn_cargaArchivoInfoDelEvento" name="enunciadoActualizado" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="date_fechaInicioEvento" name="dateFechaInicioActualizada" id="fechaInicioEdit" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="date_fechaFinEvento" name="dateFechaFinActualizada" id="fechaFinEdit" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Profesor encargado</label>
                                <select class="form-control" id="cmb_profesoresResponsables" name="cbx_profesorEdit" id="profeEdit" required="true">
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

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el evento</label><br>
                                <input  id="btn_imgParaElEvento" name="imagenActualizada" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>
                                <br>                                                                                             
                                <button type="submit" name="actualizarEvento" id="btn_actualizarEvento"  class="btn_agregarEvento" title="Actualizar">Actualizar</button> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatEvento.php") ?>
                        </div>
                        </div>
                    </div>
                    </div>

                    <?php
                        $objEventoSelect = new EventoControlador();
                    ?>
                
                    <!--POPUP PARA LA ASIGNACION DE COMPETENCIAS QUE CONTRIBUYEN A UN EVENTO-->
                    <div class="modal fade" id="modalAsignarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Asignación de competencias</h3>
                        </div>
                        <div class="modal-body">
                            
                            <p>Seleccione las competencias generales a las cuales contribuye el evento.</p>
                            <br>
                            
                            <form id="formularioDeAsignacionDeCompetencias" action="AdministradorDeEventos_Comite.php" method="POST">

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
                                <!--<a id="btn_evaluarCompetencias" class="btn_agregarEvento" title="Analizar competencias">Analizar</a>-->
                                <button type="submit" name="asignarCompetenciasGenerales" class="btn_agregarEvento" title="AnalizarComeptencias">Analizar</button>
                            </form>
                            <br>
                            <h3 class="titulo_seccion">Evaluación de competencias</h3>
                            <p>Evalúe el nivel de competencia propuesto por la convocatoria para las siguientes competencias específicas: </p>
                            <br>

                            <div class="contenedorEvaluacionCompetencias">

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
                                    <a id="btn_guardarAnalisis" class="btn_agregarConvocatoria" title="Guardar">Guardar</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>

        <script>
            function cambiarAMayuscula(elemento){
                let texto = elemento.value;
                elemento.value = texto.toUpperCase();
            }            

        </script>
    </body>
</html>
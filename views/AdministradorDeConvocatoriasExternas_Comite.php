
<?php
require_once "logic/utils/Conexion.php";
require_once "logic/controllers/ConvocatoriaControlador.php";
require_once "logic/controllers/ProfesorControlador.php";
require_once "logic/controllers/CompetenciaControlador.php";

session_start();

//Validamos que haya una sesión iniciada
if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Por favor, debes iniciar sesión");
            window.location = "../index.php";
        </script>
    ';
    header("Location: ../index.php");
    session_destroy();
    die();

}else{
   
?>

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
                        <span>Administrador de convocatorias externas</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="logout.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                <div class="card-header">
                    <button type="button" class="btn_agregarConvocatoria" data-bs-toggle="modal" data-bs-target="#modalRegistrarConvComite" title="Nueva Convocatoria">Nueva convocatoria</button>                  
                </div>

                <div class="main-tableEventos">
                   <br>
                    <h3 class="titulo_seccion">Convocatorias existentes </h3>

                    <!--ESTRUCTURA DE TABLA DE CONVOCATORIAS-->
                    <table id="table_eventos" class="tablaDeConvocatorias">
                        <thead>
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre convocatoria</th>
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <!--Script para cargar datos en tabla de Convocatorias-->      
                        <?php
                            $obj = new ConvocatoriaControlador();
                            $sql = "SELECT Id, nombre_convocatoria, fecha_inicio, fecha_fin, nombre_imagen from tbl_convocatoriacomite";
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
                                            
                                    <td class="datoTabla"><?php echo $key['nombre_convocatoria'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a class="btnAsignarCompetencias" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Asignar competencias"><img src="assets/images/btn_asignarCompetencias.png"></a>
                                        </div>
                                        
                                        <div class="col-botonesEdicion">
                                            <a class="btnEditarConvComite" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarConvocatoria" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a class="btnEliminarConvComite" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarConvocatoria" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                        </div>
                                    
                                    </div></td> 
                                                                    
                                </tr>    
                        <?php
                            }
                        ?>
                        </tbody>

                    </table>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE CONVOCATORIAS-->
                    <div class="modal fade" id="modalRegistrarConvComite" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva Convocatoria</h3>
                        </div>
                        <div class="modal-body">
                            
                        <form id="formularioDeRegistroDeConvocatorias" action="logic/capturaDatConvocatoria.php" method="POST" enctype="multipart/form-data">

                            <label class="camposFormulario">Nombre de la convocatoria</label><br>
                            <input name="nombreConvocatoria" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                            <br>

                            <label class="camposFormulario">Descripción</label>
                            <textarea id="txt_descripcion" name="descripcionConvocatoria" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
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
                            <button type="submit" name="guardarConvocatoriaComite" class="btn_agregarConvocatoria" title="Guardar">Guardar</button>   
                            <button id="btnCancelarRegistroConvComite" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatConvocatoria.php") ?>                              

                        </div>
                        </div>
                    </div>
                    </div>
                    

                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE CONVOCATORIAS-->
                    <div class="modal fade" id="modalEditarConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar Convocatoria</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeActualizacionDeConvocatorias" action="logic/capturaDatConvocatoria.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="Id" value="">

                                <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                <input name="nombre_convocatoria" placeholder=""  maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion_convocatoria" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                <input  id="btn_cargaArchivoInfoDeConvocatoria" name="archivoInfoDeConvocatoriaEdit" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="date_fechaInicioConvocatoria" name="fecha_inicio" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="date_fechaFinConvocatoria" name="fecha_fin" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Profesor encargado</label>
                                <select class="form-control" id="cmb_profesoresResponsables" name="id_usuario" required="true">
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
                                <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoriaEdit" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>
                                <br>
                                <br>    
                                <button type="submit" name="actualizarConvocatoriaComite" class="btn_agregarConvocatoria" title="Actualizar">Actualizar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatConvocatoria.php") ?>                            

                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UNA CONVOCATORIA -->
                    <div class="modal fade" id="modalEliminarConvocatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar convocatoria</h3>
                        </div>
                        <form id="formularioDeEliminacionDeConvocatorias" action="logic/capturaDatConvocatoria.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="Id" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarConvComite" class="btn_agregarConvocatoria" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatConvocatoria.php") ?>
                        </div>
                    </div>
                    </div>

                                     
                    <!--POPUP PARA LA ASIGNACION DE COMPETENCIAS GENERALES QUE CONTRIBUYEN A UN EVENTO-->
                    <div class="modal fade" id="modalAsignarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Asignación de competencias generales</h3>
                        </div>
                        <div class="modal-body">
                            
                            <p class="enunciadoModalCompetencias">Seleccione las competencias generales a las cuales contribuye la convocatoria.</p>
                            <br>
                            
                            <form id="formularioDeAsignacionDeCompetencias">

                                <input type="hidden" id="txt_idConvocatoriaAsigCompetencias" name="Id" value="">

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

                                                <input class="checkCompetenciaGeneral" type="checkbox" name="compAContribuir" value="<?php echo $key['id_comp_gral']?>" title="<?php echo $key['nombre_comp_gral']?>"> <?php echo $key['nombre_comp_gral']?>
                                                <br>

                                                <?php
                                                    }
                                                ?>

                                            </div>
                                        </td>
                                    </tr>
                                </table>                       
                                <br>
                                <button id="btn_analizarCompetencias" class="btn_agregarConvocatoria" data-bs-toggle="modal" data-bs-target="#modalEvaluarCompetencias" title="Analizar Competencias">Analizar</button>
                                <button id="btn_cancelarAsigCompetencias" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cerrar">Cerrar</button>
                            </form>                           
                        </div>
                        </div>
                        </div>
                    </div>

                    <!--POPUP PARA LA EVALUACION DE LAS COMPETENCIAS ESPECIFICAS QUE CONTRIBUYEN A UN EVENTO-->
                    <div class="modal fade" id="modalEvaluarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de competencias específicas</h3>
                            </div>
                            <div class="modal-body">
                                <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia propuesto por la convocatoria para las siguientes competencias específicas: </p>
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeCompetenciasEspecificas">
                                        <input type="hidden" id="txt_idConvocatoriaEvaluacionCompetencias" name="Id" value="">
                                        <br> 

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluar"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>

                                        <span id="panelIndicadorDeRegistroDeEvaluacion"></span> 
                                        <br>
                                   </form>
                                        
                                    <button type="button" id="btnGuardarNivelesContribucionConvocatoria" class="btn_agregarConvocatoria" title="Guardar">Guardar</button> 
                                    <button type="button" class="btn btn-secondary" onclick="resetSpanEvaluacionCompEspecificas()" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Cerrar">Cerrar</button>
     
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </main>
        </div>

        <!--Funcion que cambia a mayuscula lo ingresado en un input-->
        <script>
            function cambiarAMayuscula(elemento){
                let texto = elemento.value;
                elemento.value = texto.toUpperCase();
            }            

        </script>

        <!--Funcion que resetea el span de confirmacion de evaluacion de competencias especificas-->
        <script>
            function resetSpanEvaluacionCompEspecificas(){
                document.getElementById('panelIndicadorDeRegistroDeEvaluacion').innerHTML="";
            }            

        </script>

        <!--Script que permite pasar los datos de una convocatoria comite a la ventana modal de edicion de la misma-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnEditarConvComite').click(function(){
                    console.log("here")
                    
                    var idConvComiteEdit = $(this).data('id');
                    console.log(idConvComiteEdit)
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvComiteEdit': idConvComiteEdit},
                                success: function(response){
                                    resolve(response)
                                },
                                error: function (error) {
                                reject(error)
                                },
                            });
                        })
                    }
                    getFormInfo()
                    .then((response) => {
                        var data = $.parseJSON(response)[0];
                        var formId = '#formularioDeActualizacionDeConvocatorias';
                        $.each(data, function(key, value){
                            console.log(key);
                            console.log(value);
                            $('[name='+key+']', formId).val(value);
                        });
                    })
                    .catch((error) => {
                        console.log(error)
                    })     
                });
            });
            </script>

            <!--Script que permite pasar los datos de una convocatoria comite desde la BD a su ventana modal de eliminacion correspondiente-->
            <script type='text/javascript'>

                //Aqui se pasan los datos para el caso de la competencia general
                $(document).ready(function(){
                    
                    $('.btnEliminarConvComite').click(function(){
                        console.log("here")
                        
                        var idConvocatoriaComiteElim = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idConvocatoriaComiteElim': idConvocatoriaComiteElim},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                    reject(error)
                                    },
                                });
                            })
                        }
                        getFormInfo()
                        .then((response) => {
                            console.log(response);
                            var data = $.parseJSON(response)[0];
                            var formId = '#formularioDeEliminacionDeConvocatorias';
                            $.each(data, function(key, value){
                                console.log(key);
                                console.log(value);
                                $('[name='+key+']', formId).val(value);
                            });
                        })
                        .catch((error) => {
                            console.log(error)
                        })
                        
                    });
                });
            </script>

            <!--Script que permite pasar el Id de la convocatoria comite para que sea tenida en cuenta en la insercion de los datos para la asignacion de competencias -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id de la convocatoria para tener el cuenta en la insercion de datos
                        var idConvocatoriaAsigCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idConvocatoriaAsigCompetencias': idConvocatoriaAsigCompetencias},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                    reject(error)
                                    },
                                });
                            })
                        }
                        getFormInfo()
                        .then((response) => {
                            var data = $.parseJSON(response)[0];
                            var formId = '#formularioDeAsignacionDeCompetencias';
                            $.each(data, function(key, value){
                                $('[name='+key+']', formId).val(value);
                            });
                        })
                        .catch((error) => {
                            console.log(error)
                        }) 
                    });
                    
                });
            </script>
            
            <!--Script que permite pasar el Id de la convocatoria comite para que sea tenido en cuenta en la insercion de los datos para la Evaluacion de las competencias especificas--> 
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id de la convocatoria para tener el cuenta en la insercion de datos
                        var idConvocatoriaEvaluacionCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idConvocatoriaEvaluacionCompetencias': idConvocatoriaEvaluacionCompetencias},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                    reject(error)
                                    },
                                });
                            })
                        }
                        getFormInfo()
                        .then((response) => {
                            var data = $.parseJSON(response)[0];
                            var formId = '#formularioDeEvaluacionDeCompetenciasEspecificas';
                            $.each(data, function(key, value){
                                $('[name='+key+']', formId).val(value);
                            });
                        })
                        .catch((error) => {
                            console.log(error)
                        }) 
                    });
                    
                });
            </script>

            <!--Script que permite pasar el array de competencias generales seleccionadas para que puedan ser evaluadas sus competencias especificas y determinar el nivel de contribucion de cada una -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#btn_analizarCompetencias').click(function() {
                        // defines un arreglo
                        var compGenSeleccionadas = [];

                        var idConvocatoria = document.getElementById('txt_idConvocatoriaAsigCompetencias').value;

                        //En este bloque pasamos el id de la convocatoria para tener el cuenta en la insercion de datos
                        var idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad = document.getElementById('txt_idConvocatoriaEvaluacionCompetencias').value;
                        var idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad = document.getElementById('txt_idConvocatoriaEvaluacionCompetencias').value;

                        $(":checkbox[name=compAContribuir]").each(function() {
                            if (this.checked) {
                            // agregas cada elemento.
                            compGenSeleccionadas.push($(this).val());
                            }
                        });

                        if (compGenSeleccionadas.length) {
                    
                            function envioCompGenerales(){
                                return new Promise((resolve, reject) => {

                                    $.ajax({
                                        type: 'post', 
                                        data: {'arrayCompetencias': JSON.stringify(compGenSeleccionadas), 'idConvocatoria': idConvocatoria}, 
                                        url: 'logic/utils/ajaxfile.php',
                                        success: function(response){
                                            resolve(response)
                                            $('#panelListaCompetenciasAEvaluar').html(response);
                                        },
                                        error: function (error) {
                                            reject(error)
                                        },
                                    });
                                })
                            }

                            function obtenerArrayCodigosEvaluacionCompEspecificasRegistradasConAnterioridad() {
                                return new Promise((resolve, reject) => {
                                    // AJAX request
                                    $.ajax({
                                        url: 'logic/utils/ajaxfile.php',
                                        type: 'post',
                                        data: {'idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad': idConvocatoriaParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad},
                                        success: function(response){
                                            resolve(response)
                                            //console.log('Trajo los codigos de la BD - Convocatoria');
                                        },
                                        error: function (error) {
                                            reject(error)
                                            //console.log('No trajo los codigos de la BD - Convocatoria', error);
                                        },
                                    });
                                })
                            }   
                        
                            function obtenerArrayNivelesContribEvaluacionCompEspecificasRegistradasConAnterioridad() {
                                return new Promise((resolve, reject) => {
                                    // AJAX request
                                    $.ajax({
                                        url: 'logic/utils/ajaxfile.php',
                                        type: 'post',
                                        data: {'idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad': idConvocatoriaParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad},
                                        success: function(response){
                                            resolve(response)
                                            //console.log('Trajo los niveles de la BD - Convocatoria');
                                        },
                                        error: function (error) {
                                            reject(error)
                                            //console.log('No trajo los niveles de la BD - Convocatoria', error);
                                        },
                                    });
                                })
                            } 

                            envioCompGenerales();

                            obtenerArrayCodigosEvaluacionCompEspecificasRegistradasConAnterioridad()
                            .then((response) => {
                                var dataCodigos = $.parseJSON(response)[0];
                                let arrayCodigosCompEsp = [];

                                $.each(dataCodigos, function(key, value){
                                    arrayCodigosCompEsp = value.split(',');
                                                                        
                                    obtenerArrayNivelesContribEvaluacionCompEspecificasRegistradasConAnterioridad()
                                    .then((response) => {
                                        var dataNivContrib = $.parseJSON(response)[0];
                                        let arrayNivelesContribCompEsp = [];
                                        var formId = '#formularioDeEvaluacionDeCompetenciasEspecificas';
                                        $.each(dataNivContrib, function(key, value){
                                            arrayNivelesContribCompEsp = value.split(',');
                                            
                                            for(i=0; i<arrayCodigosCompEsp.length; i++){
                                                $('input[name="'+arrayCodigosCompEsp[i]+'"][value="'+arrayNivelesContribCompEsp[i]+'"', formId).prop("checked", true);
                                            }
                                        
                                        });   
                                    })
                                    .catch((error) => {
                                        console.log(error)
                                    }) 
                                }); 
                                    
                            })
                            .catch((error) => {
                                console.log(error)
                            })
                                                        
                        } else
                            alert('Debes seleccionar al menos una competencia general.');
                    
                        return false;

                    });
                });
            </script>
            
            <!--Script que permite pasar el Id de la convocatoria para que sea tenido en cuenta en la consulta de la asignacion de competencias registrada previamente en BD-->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id de la convocatoria para tener el cuenta en la insercion de datos
                        var idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad: idConvocatoriaParaConsultarCompGeneralesRegistradasConAnterioridad},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                    reject(error)
                                    },
                                });
                            })
                        }
                        getFormInfo()
                        .then((response) => {
                            var data = $.parseJSON(response)[0];
                            var formId = '#formularioDeAsignacionDeCompetencias';
                            $.each(data, function(key, value){
                                let arrayCompetencias = value.split(',');
                                $('[name='+key+']', formId).val(arrayCompetencias);
                            });
                        })
                        .catch((error) => {
                            console.log(error)
                        }) 
                    });
                    
                });
            </script>

            <!--Script que permite el registro de la evaluación de competencias específicas para una convocatoria-->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#btnGuardarNivelesContribucionConvocatoria').click(function() {
                        
                        //En este bloque pasamos el id de laconvocatoria para tener el cuenta en la insercion de datos
                        var idConvocatoriaParaGuardarContribucionCompEspecificas = document.getElementById('txt_idConvocatoriaEvaluacionCompetencias').value;
                        var contenedoresDeRespuestasNivelContribCompetencia = document.getElementsByClassName('contenedorRespContribucionCompEsp');
                        var arregloCodigosCompEspecificas = []; 
                        var arregloNivelesContribucionCompEspecificas = []; 
                 

                        for (let item of contenedoresDeRespuestasNivelContribCompetencia) {
                            arregloCodigosCompEspecificas.push(item.id)  
                        }
                        
                        //Recogemos lo marcado por el usario en los radiobuttons
                        for (let item of arregloCodigosCompEspecificas) {
                            var radioButtonsCmpEspecifica = document.getElementsByName(item);
                            
                            for (var i = 0, length = radioButtonsCmpEspecifica.length; i < length; i++) {
                                if (radioButtonsCmpEspecifica[i].checked) {
                                    arregloNivelesContribucionCompEspecificas.push(radioButtonsCmpEspecifica[i].value);
                                    break;
                                }
                            }
                        }

                        var numeroDeCompEspecificas = arregloCodigosCompEspecificas.length;

                        if(arregloNivelesContribucionCompEspecificas.length > 0 && arregloNivelesContribucionCompEspecificas.length == numeroDeCompEspecificas){

                            function getFormEvaluacionDeCompetenciasEspecificas() {
                                return new Promise((resolve, reject) => {
                                    // AJAX request
                                    $.ajax({
                                        url: 'logic/utils/ajaxfile.php',
                                        type: 'post',
                                        data: {'idConvocatoriaParaGuardarContribucionCompEspecificas': idConvocatoriaParaGuardarContribucionCompEspecificas, 'arregloCodigosCompEspecificas': JSON.stringify(arregloCodigosCompEspecificas), 'arregloNivelesContribucionCompEspecificas': JSON.stringify(arregloNivelesContribucionCompEspecificas)},
                                        success: function(response){
                                            resolve(response)
                                            $('#panelIndicadorDeRegistroDeEvaluacion').html(response);
                                            
                                        },
                                        error: function (error) {
                                        reject(error)
                                        console.log(error);
                                        },
                                    });
                                })
                            }
                        
                            getFormEvaluacionDeCompetenciasEspecificas();
                                            
                        }else{
                            alert('Debe evaluar todas las competencias específicas propuestas');
                            return false;
                        }                     
                        
                    });
                });
            </script>
            
    </body>
<?php
}
?>
</html>
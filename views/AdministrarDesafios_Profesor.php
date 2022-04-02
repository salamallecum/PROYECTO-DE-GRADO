<?php
require_once "logic/utils/Conexion.php";
require_once "logic/controllers/DesafioControlador.php";
require_once "logic/controllers/MateriaControlador.php";
require_once "logic/controllers/CompetenciaControlador.php";



    //Capturamos el id del profesor logueado
    $idProfesorLogueado = $_GET['Id_profesor'];

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
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                            $obj = new DesafioControlador();
                            $sql = "SELECT id_desafio, nombre_desafio, fecha_inicio, fecha_fin, nombre_imagen from tbl_desafio where id_profesor=".$idProfesorLogueado;
                            $datos = $obj->mostrarDatosDesafios($sql);
                            foreach ($datos as $key){

                                $idDelDesafio = $key['id_desafio'];
                        ?>

                        </tbody>

                                <!--Aqui van los registros de la tabla de desafios-->
                                <tr class="filasDeDatosTablaDesafios">
                                <?php 
                                    //Aqui se traen las imagenes de cada desafio
                                    $nombreDeImg = $key['nombre_imagen'];

                                    if($nombreDeImg != null){

                                    ?>

                                        <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='<?php echo "desafiosImages/".$nombreDeImg?>'></td>

                                    <?php
                                    }else{
                                    ?>
                                    
                                        <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='assets/images/imgPorDefecto.jpg'></td> 

                                    <?php    
                                    }                       
                                    ?>

                                    <td class="datoTabla"><?php echo $key['nombre_desafio'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a class="btnAsignarCompetencias" data-id="<?php echo $idDelDesafio;?>" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Asignar competencias"><img src="assets/images/btn_asignarCompetencias.png"></a>
                                        </div>
                                        
                                        <div class="col-botonesEdicion">
                                            <a class="btnEditarDesafio" data-id="<?php echo $idDelDesafio;?>" data-bs-toggle="modal" data-bs-target="#modalEditarDesafio" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a class="btnEliminarDesafio" data-id="<?php echo $idDelDesafio;?>" data-bs-toggle="modal" data-bs-target="#modalEliminarDesafio" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                        </div>
                                    </div></td>
                                </tr>

                        <?php
                            }
                        ?>

                        </tbody>
                    </table>

                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE DESAFIOS-->
                    <div class="modal fade" id="modalRegistrarDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nuevo desafio</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeRegDesafios" action="logic/capturaDatDesafio.php" method="POST" enctype="multipart/form-data">
                                    
                                <input type="hidden" name="idProf" value="<?php echo $idProfesorLogueado;?>">
                            
                                <label class="camposFormulario">Nombre del desafio</label><br>
                                <input name="nombreDesafio" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcionDesafio" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info del desafio</label><br>
                                <input  id="btn_cargaArchivoInfoDelDesafio" name="archivoInfoDelDesafio" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" name="dateFechaInicioDesafio" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" name="dateFechaFinDesafio" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Asignatura</label>
                                <select class="form-control" id="cmb_asignaturas" name="cmbAsignaturas" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new MateriaControlador();
                                        $sql = "SELECT id_asignatura, nombre_asignatura FROM tbl_asignatura WHERE id_profesor=".$idProfesorLogueado;
                                        $datos = $obj->mostrarMateriasRegistradas($sql);

                                        foreach ($datos as $key){
                                    ?>

                                            <option value="<?php echo $key['id_asignatura']?>"><?php echo $key['nombre_asignatura']?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el desafio</label><br>
                                <input  id="btn_imgParaElDesafio" name="imgParaElDesafio" accept=".jpeg, .jpg, .png" type="file" class="form-control">                   
                                <br>
                                <br>    
                                <button type="submit" name="guardarDesafio" id="btn_guardarDesafio"  class="btn_agregarDesafio" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroDesafio" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                                  
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatDesafio.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE DESAFIOS-->
                    <div class="modal fade" id="modalEditarDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar desafio</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeActualizacionDeDesafios" action="logic/capturaDatDesafio.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id_desafio" value="">
                                <input type="hidden" name="id_profEdit" value="<?php echo $idProfesorLogueado;?>">

                                <label class="camposFormulario">Nombre del evento</label><br>
                                <input id="txt_nombreDesafio" name="nombre_desafio" maxlength="30" onblur="cambiarAMayuscula(this)" placeholder="" type="text" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion_desafio" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                <input  id="btn_cargaArchivoInfoDelDesafio" name="enunciadoActualizado" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="date_fechaInicioDesafio" name="fecha_inicio"  class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="date_fechaFinDesafio" name="fecha_fin"  class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Asignatura</label>
                                <select class="form-control" id="cmb_asignaturas" name="id_asignatura" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new MateriaControlador();
                                        $sql = "SELECT id_asignatura, nombre_asignatura FROM tbl_asignatura WHERE id_profesor=".$idProfesorLogueado;
                                        $datos = $obj->mostrarMateriasRegistradas($sql);

                                        foreach ($datos as $key){
                                    ?>

                                            <option value="<?php echo $key['id_asignatura']?>"><?php echo $key['nombre_asignatura']?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el desafio</label><br>
                                <input  id="btn_imgParaElDesafio" name="imagenActualizada" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>
                                <br>                                                                                             
                                <button type="submit" name="actualizarDesafio" class="btn_agregarDesafio" title="Actualizar">Actualizar</button> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatDesafio.php") ?>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UN DESAFIO -->
                    <div class="modal fade" id="modalEliminarDesafio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar desafio</h3>
                        </div>
                        <form id="formularioDeEliminacionDeDesafios" action="logic/capturaDatDesafio.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id_desafio" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarDesafio" class="btn_agregarDesafio" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatDesafio.php") ?>
                        </div>
                    </div>
                    </div>
                   

                    <!--POPUP PARA LA ASIGNACION DE COMPETENCIAS GENERALES QUE CONTRIBUYEN A UN DESAFIO-->
                    <div class="modal fade" id="modalAsignarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Asignación de competencias generales</h3>
                        </div>
                        <div class="modal-body">
                            
                            <p class="enunciadoModalCompetencias">Seleccione las competencias generales a las cuales contribuye el desafio.</p>
                            <br>
                            
                            <form id="formularioDeAsignacionDeCompetencias">

                                <input type="hidden" id="txt_idDesafioAsigCompetencias" name="id_desafio" value="">

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
                            </form>        
                            <br>
                            <button id="btn_analizarCompetencias" class="btn_agregarDesafio" data-bs-toggle="modal" data-bs-target="#modalEvaluarCompetencias" title="Analizar Competencias">Analizar</button>
                            <button id="btn_cancelarAsigCompetencias" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cerrar">Cerrar</button>                   
                        </div>
                        </div>
                        </div>
                    </div>

                    <!--POPUP PARA LA EVALUACION DE LAS COMPETENCIAS ESPECIFICAS QUE CONTRIBUYEN A UN DESAFIO-->
                    <div class="modal fade" id="modalEvaluarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de competencias específicas</h3>
                            </div>
                            <div class="modal-body">
                                <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia propuesto por el desafio para las siguientes competencias específicas: </p>
                                <br>

                                <div class="contenedorEvaluacionCompetencias">
                                    <form id="formularioDeEvaluacionDeCompetenciasEspecificas">
                                        <input type="hidden" id="txt_idDesafioEvaluacionCompetencias" name="id_desafio" value="">
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
                                        
                                    <button type="button" id="btnGuardarNivelesContribucionDesafio" class="btn_agregarDesafio" title="Guardar">Guardar</button> 
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

        <!--Script que permite pasar los datos de un desafio a la ventana modal de edicion del mismo-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnEditarDesafio').click(function(){
                                        
                    var idDesafioEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioEdit': idDesafioEdit},
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
                        var formId = '#formularioDeActualizacionDeDesafios';
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

            <!--Script que permite pasar los datos de un desafio desde la BD a su ventana modal de eliminacion correspondiente-->
            <script type='text/javascript'>

                //Aqui se pasan los datos para el caso de la competencia general
                $(document).ready(function(){
                    
                    $('.btnEliminarDesafio').click(function(){
                        
                        var idDesafioElim = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idDesafioElim': idDesafioElim},
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
                            var formId = '#formularioDeEliminacionDeDesafios';
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

            <!--Script que permite pasar el Id del desafio para que sea tenido en cuenta en la insercion de los datos para la asignacion de competencias -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        
                        var idDesafioAsigCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idDesafioAsigCompetencias': idDesafioAsigCompetencias},
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

            <!--Script que permite pasar el Id del desafio para que sea tenido en cuenta en la insercion de los datos para la Evaluacion de las competencias especificas-->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del desafio para tener el cuenta en la insercion de datos
                        
                        var idDesafioEvaluacionCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idDesafioEvaluacionCompetencias': idDesafioEvaluacionCompetencias},
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
                            //console.log(response);
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

                        var idDesafio = document.getElementById('txt_idDesafioAsigCompetencias').value;

                        //En este bloque pasamos el id del desafio para tener el cuenta en la insercion de datos
                        var idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad = document.getElementById('txt_idDesafioEvaluacionCompetencias').value;
                        var idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad = document.getElementById('txt_idDesafioEvaluacionCompetencias').value;

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
                                        data: {'arrayCompetencias': JSON.stringify(compGenSeleccionadas), 'idDesafio': idDesafio}, 
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
                                        data: {'idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad': idDesafioParaConsultarCodigosCompetenciasEspecificasRegistradosConAnterioridad},
                                        success: function(response){
                                            resolve(response)
                                            //console.log('Trajo los codigos de la BD - Desafios');
                                        },
                                        error: function (error) {
                                            reject(error)
                                            //console.log('No trajo los codigos de la BD - Desafios', error);
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
                                        data: {'idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad': idDesafioParaConsultarNivelesContribCompetenciasEspecificasRegistradosConAnterioridad},
                                        success: function(response){
                                            resolve(response)
                                            //console.log('Trajo los niveles de la BD - Desafios');
                                        },
                                        error: function (error) {
                                            reject(error)
                                            //console.log('No trajo los niveles de la BD - Desafios', error);
                                        },
                                    });
                                })
                            } 

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

                            envioCompGenerales();
                                                        
                        } else
                            alert('Debes seleccionar al menos una competencia general.');
                    
                        return false;

                    });
                });
            </script>

            <!--Script que permite pasar el Id del desafio para que sea tenido en cuenta en la consulta de la asignacion de competencias registrada previamente en BD -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        var idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad': idDesafioParaConsultarCompGeneralesRegistradasConAnterioridad},
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

            <!--Script que permite el registro de la evaluación de competencias específicas para un desafio-->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#btnGuardarNivelesContribucionDesafio').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        var idDesafioParaGuardarContribucionCompEspecificas = document.getElementById('txt_idDesafioEvaluacionCompetencias').value;
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
                                        data: {'idDesafioParaGuardarContribucionCompEspecificas': idDesafioParaGuardarContribucionCompEspecificas, 'arregloCodigosCompEspecificas': JSON.stringify(arregloCodigosCompEspecificas), 'arregloNivelesContribucionCompEspecificas': JSON.stringify(arregloNivelesContribucionCompEspecificas)},
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
</html>


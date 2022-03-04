
<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/EventoControlador.php";
    require_once "logic/controllers/ProfesorControlador.php";
    require_once "logic/controllers/CompetenciaControlador.php";

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
        <script src="assets/js/dom/funcionesBasicasPopUpEventos.js" type="module"></script>
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
                                    
                                    <td class="datoTabla"><?php echo $key['nombre_evento'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['descripcion_evento'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a class="btnAsignarCompetencias" data-id="<?php echo $key['id_evento'];?>" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Asignar competencias"><img src="assets/images/btn_asignarCompetencias.png"></a>
                                        </div>
                                        
                                        <div class="col-botonesEdicion">
                                            <a class="btnEditarEvento" data-id="<?php echo $key['id_evento'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarEvento" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a class="btnEliminarEvento" data-id="<?php echo $key['id_evento'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarEvento" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
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
                            
                            <form id="formularioDeRegEventos" action="logic/capturaDatEvento.php" method="POST" enctype="multipart/form-data">
                                    
                                <label class="camposFormulario">Nombre del evento</label><br>
                                <input name="nombreEvento" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcionEvento" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
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
                                <button type="submit" name="guardarEvento" id="btn_guardarEvento"  class="btn_agregarEvento" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroEvento" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                                  
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
                            
                            <form id="formularioDeActualizacionDeEventos" action="logic/capturaDatEvento.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id_evento" value="">

                                <label class="camposFormulario">Nombre del evento</label><br>
                                <input id="txt_nombreEvento" name="nombre_evento" onblur="cambiarAMayuscula(this)" placeholder="" type="text" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion_evento" cols="80" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info del evento</label><br>
                                <input  id="btn_cargaArchivoInfoDelEvento" name="enunciadoActualizado" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="date_fechaInicioEvento" name="fecha_inicio"  class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="date_fechaFinEvento" name="fecha_fin"  class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Profesor encargado</label>
                                <select class="form-control" id="cmb_profesoresResponsables" name="id_usuario" id="profeEdit" required="true">
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
                                <button type="submit" name="actualizarEvento" class="btn_agregarEvento" title="Actualizar">Actualizar</button> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatEvento.php") ?>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UN EVENTO -->
                    <div class="modal fade" id="modalEliminarEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar evento</h3>
                        </div>
                        <form id="formularioDeEliminacionDeEventos" action="logic/capturaDatEvento.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id_evento" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarEvento" class="btn_agregarEvento" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatEvento.php") ?>
                        </div>
                    </div>
                    </div>

                                    
                    <!--POPUP PARA LA ASIGNACION DE COMPETENCIAS GENERALES QUE CONTRIBUYEN A UN EVENTO-->
                    <div class="modal fade" id="modalAsignarCompetencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Asignación de competencias</h3>
                        </div>
                        <div class="modal-body">
                            
                            <p class="enunciadoModalCompetencias">Seleccione las competencias generales a las cuales contribuye el evento.</p>
                            <br>
                            
                            <form id="formularioDeAsignacionDeCompetencias">

                                <input type="hidden" id="txt_idEventoAsigCompetencias" name="id_evento" value="">

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
                                <button id="btn_analizarCompetencias" class="btn_agregarEvento" data-bs-toggle="modal" data-bs-target="#modalEvaluarCompetencias" title="AnalizarComeptencias">Analizar</button>
                                <button id="btn_cancelarAsigCompetencias" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
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
                                <h3 class="titulo_seccion" id="staticBackdropLabel">Evaluación de competencias</h3>
                            </div>
                            <div class="modal-body">
                                <p class="enunciadoModalCompetencias">Evalúe el nivel de competencia propuesto por el evento para las siguientes competencias específicas: </p>
                                <br>

                                <div class="contenedorEvaluacionCompetencias">

                                    <form id="formularioDeEvaluacionDeCompetenciasEspecificas">
                                    
                                        <input type="hidden" id="txt_idEventoEvaluacionCompetencias" name="id_evento" value="">
                                        <br> 

                                        <!--Este es el código que contiene las competencias específicas a evaluar-->
                                        <div class="contenedorCompeEspeciasAEvaluar">                                 
                                            
                                            <span id="panelListaCompetenciasAEvaluar"></span>                                            
                                            <br>
                                                
                                        </div>  
                                        <br>
                                        <button id="btnGuardarNivelesContribucionEvento" class="btn_agregarEvento" title="Guardar">Guardar</button> 
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalAsignarCompetencias" title="Cancelar">Cancelar</button>

                                    </form>
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

        <!--Script que permite pasar los datos de un evento a la ventana modal de edicion del mismo-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnEditarEvento').click(function(){
                                        
                    var idEventoEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idEventoEdit: idEventoEdit},
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
                        var formId = '#formularioDeActualizacionDeEventos';
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

            <!--Script que permite pasar los datos de un evento desde la BD a su ventana modal de eliminacion correspondiente-->
            <script type='text/javascript'>

                //Aqui se pasan los datos para el caso de la competencia general
                $(document).ready(function(){
                    
                    $('.btnEliminarEvento').click(function(){
                        
                        var idEventoElim = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {idEventoElim: idEventoElim},
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
                            var formId = '#formularioDeEliminacionDeEventos';
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

            <!--Script que permite pasar el Id del evento para que sea tenido en cuenta en la insercion de los datos para la asignacion de competencias -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        
                        var idEventoAsigCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {idEventoAsigCompetencias: idEventoAsigCompetencias},
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

            <!--Script que permite pasar el Id del evento para que sea tenido en cuenta en la insercion de los datos para la Evaluacion de las competencias especificas -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        
                        var idEventoAsigCompetencias = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {idEventoAsigCompetencias: idEventoAsigCompetencias},
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

                        var idEvento = document.getElementById('txt_idEventoAsigCompetencias').value;

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
                                        data: {'arrayCompetencias': JSON.stringify(compGenSeleccionadas), 'idEvento': idEvento}, 
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

                            envioCompGenerales();
                                                       
                        } else
                            alert('Debes seleccionar al menos una competencia general.');
                    
                        return false;
                    });
                });

            </script>

            <!--Script que permite pasar el Id del evento para que sea tenido en cuenta en la consulta de la asignacion de competencias registrada previamente en BD -->
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.btnAsignarCompetencias').click(function() {
                        
                        //En este bloque pasamos el id del evento para tener el cuenta en la insercion de datos
                        
                        var idEventoParaConsultarCompGeneralesRegistradasConAnterioridad = $(this).data('id');
                    
                        function getFormInfo() {
                            return new Promise((resolve, reject) => {
                                // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {idEventoParaConsultarCompGeneralesRegistradasConAnterioridad: idEventoParaConsultarCompGeneralesRegistradasConAnterioridad},
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

    </body>
</html>
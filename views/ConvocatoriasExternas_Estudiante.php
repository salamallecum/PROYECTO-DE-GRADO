<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/ConvocatoriaControlador.php";
require_once "logic/controllers/TrabajoControlador.php";

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

$convocatoriaControla = new ConvocatoriaControlador();
$trabajoControla = new TrabajoControlador();

//Aqui capturamos el id del estudiante logueado
if(isset($_GET['Id_estudiante']) != 0){

    $idEstudianteLogueado = $_GET['Id_estudiante'];

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
        <link rel="stylesheet" href="assets/css/EstudianteStyles.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/jquery-3.6.0.js"></script>

    </head>

    <body>

    <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincEstudiante.PNG"></span>
                    <span id="tituloPagPrincipal">PANDORA</span>
                </h3>
                <label for="sidebar-toggle"><i class="bi bi-menu-app"></i></label>
            </div>

            <div class="sidebar-menu">
                <ul class="menuEstudiante">
                    <li>
                        <a class="link_menu-active" href="<?php echo "./DashBoard_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./PerfilDeUsuario_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./TrabajosDestacados_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="Trabajos destacados"><i class="bi bi-clipboard-check"></i></span>
                            <span class="items_menu">TRABAJOS DESTACADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./E-portafolio_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="E-portafolio"><i class="bi bi-folder-check"></i></span>
                            <span class="items_menu">E-PORTAFOLIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./DesafiosYEventos_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="Desafios y eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./DesafiosPersonalizados_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./ConvocatoriasExternas_Estudiante.php?Id_estudiante=".$idEstudianteLogueado?>">
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
                        <span>Convocatorias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="logout.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="container mt-3">
                    <div class="row">
                
                        <!--Script para cargar datos de las convocatorias comite en cards-->      
                        <?php
                            $sqlConvCom = "SELECT Id, nombre_convocatoria, nombre_imagen, id_usuario from tbl_convocatoriacomite where estado = 'Activo'";
                            $resultDatosConvComite = $convocatoriaControla->mostrarDatosConvocatoriasComiteEnCards($sqlConvCom);
                            while ($row = mysqli_fetch_row($resultDatosConvComite)){
                        ?>
                                <?php
                                    $convocatoriaEnCuestion = $row[0];

                                    //Consultamos si el estudiante ya aplicó con anterioridad a una convocatoria comite para no mostrarselo otra vez
                                    $laConvocatoriaComiteYaTieneUnaAplicacionPrevia = $convocatoriaControla->verificarSiElEstudianteYaAplicoAUnaConvocatoriaComite($idEstudianteLogueado, $convocatoriaEnCuestion );
                                    
                                    if($laConvocatoriaComiteYaTieneUnaAplicacionPrevia == null){     
                                ?>                      
                                        
                                        <div class="col-lg-6 col-md-4 col-sm-12">
                                            <div class="separador"></div>
                                            <div class="tarjetaConvocatoria">
                                                
                                                <?php 
                                                //Aqui se traen las imagenes de cada convocatoria
                                                $nombreDeImgConvCom = $row[2];

                                                if($nombreDeImgConvCom != null){

                                                ?>

                                                    <img src='<?php echo "convocatoriasImages/".$nombreDeImgConvCom?>' class="imgCard" alt="..."> 

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <img src="assets/images/imgPorDefecto.jpg" class="imgCard" alt="..."> 

                                                <?php    
                                                }                       
                                                ?>                                
                                                
                                                <h5 class="tituloTrabajo"><?php echo $row[1];?></h5>
                                                
                                                <div class="contentbtnDetalles">
                                                    <button class="btn_detallesConvocatoria" data-id="<?php echo $row[0];?>" data-profesor="<?php echo $row[3];?>" type="button" data-bs-toggle="modal" data-bs-target="#modalDetallesConvComite" title="Ver detalles">Detalles</button>
                                                </div>
                                                
                                            </div>
                                            <div class="separador"></div>
                                        </div>
                                                
                            <?php                    
                                }
                            }                    
                            ?>

                            <!--Script para cargar datos de las convocatorias practicas en cards-->      
                            <?php
                                $sqlConvPrac = "SELECT Id, nombre_convocatoria, nombre_imagen from tbl_convocatoriapracticas";
                                $resultDatosConvPracticas = $convocatoriaControla->mostrarDatosConvocatoriasPracticasEnCards($sqlConvPrac);
                                while ($lex = mysqli_fetch_row($resultDatosConvPracticas)){
                            ?>
                                    <?php
                                        $convocatoriaPracEnCuestion = $lex[0];

                                        //Consultamos si el estudiante ya aplicó con anterioridad a una convocatoria practicas para no mostrarsela otra vez
                                        $laConvocatoriaPracticasYaTieneUnaAplicacionPrevia = $convocatoriaControla->verificarSiElEstudianteYaAplicoAUnaConvocatoriaPracticas($idEstudianteLogueado, $convocatoriaPracEnCuestion );
                                        
                                        if($laConvocatoriaPracticasYaTieneUnaAplicacionPrevia == null){     
                                    ?>                      
                                            
                                            <div class="col-lg-6 col-md-4 col-sm-12">
                                                <div class="separador"></div>
                                                <div class="tarjetaConvocatoria">
                                                    
                                                    <?php 
                                                    //Aqui se traen las imagenes de cada convocatoria
                                                    $nombreDeImgConvPrac = $lex[2];

                                                    if($nombreDeImgConvPrac != null){

                                                    ?>

                                                        <img src='<?php echo "convocatoriasImages/".$nombreDeImgConvPrac?>' class="imgCard" alt="..."> 

                                                    <?php
                                                    }else{
                                                    ?>
                                                    
                                                        <img src="assets/images/imgPorDefecto.jpg" class="imgCard" alt="..."> 

                                                    <?php    
                                                    }                       
                                                    ?>                                
                                                    
                                                    <h5 class="tituloTrabajo"><?php echo $lex[1];?></h5>
                                                    
                                                    <div class="contentbtnDetalles">
                                                        <button class="btn_detallesConvocatoriaPrac" data-id="<?php echo $lex[0];?>" type="button" data-bs-toggle="modal" data-bs-target="#modalDetallesConvPracticas" title="Ver detalles">Detalles</button>
                                                    </div>
                                                    
                                                </div>
                                                <div class="separador"></div>
                                            </div>
                                                
                                <?php                    
                                    }
                                }                    
                                ?>

                    

                        <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE LAS CONVOCATORIAS DE COMITE-->
                        <div class="modal fade" id="modalDetallesConvComite" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                
                                <div id="detallesDeConvComAAplicar" class="modal-body">
                                    
                                    <input type="hidden" id="idConvocatoriaDetalles" name="Id" value="">
                                    <input type="hidden" id="idprofeConvCom" name="id_usuario" value="">
                                    <input type="hidden" id="nombreEnunciadoConvDetalles" name="nombre_enunciado">
                                    <input type="hidden" id="nombreImagenConvDetalles" name="nombre_imagen">
                                    
                                    <input type="text" class="detalleNombrePropuesta" name="nombre_convocatoria" disabled>
                                    <br>

                                    <!--Aqui colocamos la imagen de la convocatoria-->
                                    <span id="panelParaImagenDeConvocatoriaComite"></span>
                                    <br>
                                    <br>

                                    <form id="seccionDatosProfesorConvocatoria">
                                        
                                        <label class="subtitulosInfo">Datos del profesor</label>
                                        <table>
                                            <tr>
                                                <td><label class="subtitulosInfo">Nombres:</label><br>
                                                <input type="text" class="infoDetallePropuesta" name="nombres_usuario" disabled></td>

                                                <td><label class="subtitulosInfo">Apellidos:</label><br>
                                                <input type="text" class="infoDetallePropuesta" name="apellidos_usuario" disabled></td>
                                            </tr>
                                        </table>

                                        <br>

                                        <label class="subtitulosInfo">Correo:</label><br>
                                        <input type="text" class="email_infoDetallePropuesta" name="correo_usuario" disabled>

                                    </form>                       
                                    <br>
                                                                    
                                    <label class="subtitulosInfo">Descripción</label><br>
                                    <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_convocatoria" disabled></textarea>
                                    <br>
                                    <br>

                                    <!--Aqui construimos el link para la descarga del archivo con el enunciado de la convocatoria-->
                                    <span id="panelParaBotonDescargaEnunciadoConvocatoria"></span>
                                    <br>
                                    
                                    <table>
                                        <tr>
                                            <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                            <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                            <td><label class="subtitulosInfo">Fecha fin</label><br>
                                            <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                        </tr>
                                    </table>                           
                                    <br>
                                    
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atras">Atras</button> 
                                    <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalAplicarAConvocatoriaComite" title="Aplicar">Aplicar</button>

                                </div>
                                </div>
                            </div>
                        </div>

                        
                        <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE LAS CONVOCATORIAS DE COORD PRACTICAS-->
                        <div class="modal fade" id="modalDetallesConvPracticas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                
                                <div id="detallesDePropuestaAAplicar" class="modal-body">
                                    
                                    <input type="hidden" name="Id" value="">
                                    <input type="hidden" name="nombre_archivo" value="">
                                    <input type="hidden" name="nombre_imagen" value="">
                                    
                                    <input type="text" class="detalleNombrePropuesta" name="nombre_convocatoria" value="" disabled>
                                    <br>

                                    <!--Aqui colocamos la imagen de la convpracticas-->
                                    <span id="panelParaImagenDeLaConvPracticas"></span>
                                    <br>
                                    <br>
                                                                    
                                    <label class="subtitulosInfo">Descripción</label><br>
                                    <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" value="" disabled></textarea>
                                    <br>
                                    <br>

                                    <!--Aqui colocamos el enunciado de la convpractcas-->
                                    <span id="panelParaEnunciadoDeLaConvPracticas"></span>
                                    <br>


                                    <table>
                                        <tr id="formFechasDeDesafioSustituido">
                                            <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                            <input type="text" class="infoDetallePropuesta" name="fecha_inicio" value="" disabled></td>

                                            <td><label class="subtitulosInfo">Fecha fin</label><br>
                                            <input type="text" class="infoDetallePropuesta" name="fecha_fin" value="" disabled></td>
                                        </tr>
                                    </table>                           
                                    <br>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atras">Atras</button> 
                                    <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalAplicarAConvPracticas" title="Aplicar">Aplicar</button>
                                
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--ESTRUCTURA DEL POPUP DE APLICACION A CONVOCATORIAS COMITE -->
                        <div class="modal fade" id="modalAplicarAConvocatoriaComite" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="titulo_seccion" id="staticBackdropLabel">Aplicación a Convocatoria</h3>
                                </div>
                                <div class="modal-body">
                                    <p>Seleccione el trabajo destacado con el cual desea aplicar.</p>

                                    <div class="formulario-comparitEportafolio">
                                    
                                        <form id="formularioModalAplicarConvocatoriaComite" action="logic/capturaDatTrabajo.php" method="POST">
                                            <input type="hidden" name="Id" value="">
                                            <input type="hidden" name="idEstudiante" value="<?php echo $idEstudianteLogueado;?>"> 
                                        
                                            <select class="form-control" id="cmb_trabajosDestacados" name="cmbTrabajos" id="cmbtrabDestacados" required="true">
                                                <option value="seleccione" selected>Seleccione</option>

                                                <?php
                                                    
                                                    $obj = new TrabajoControlador();
                                                    $sql = "SELECT Id, nombre_trabajo FROM tbl_trabajodestacado WHERE Id_estudiante = $idEstudianteLogueado and fueAplicadoAActividad = 'No' and trabajoTieneBadge = 'No'";
                                                    $datosTrab = $trabajoControla->mostrarDatosTrabajosDestacados($sql);

                                                    foreach ($datosTrab as $key){
                                                ?>

                                                        <option value="<?php echo $key['Id']?>"><?php echo $key['nombre_trabajo']?></option>

                                                <?php
                                                    }
                                                ?>
                                                
                                            </select>                                    
                                            <br>
                                            
                                            <button type="submit" name="aplicarAUnaConvocatoria" class="btn_agregarPropuesta" title="Aplicar">Aplicar</button>
                                            <button id="btnCerrarModalAplicarAConvocatoria" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesConvComite" title="Cerrar">Cerrar</button>
                                        </form> 
                                        <!--Incluimos el archivo con la logica del formulario-->
                                        <?php include("logic/capturaDatTrabajo.php") ?>                                   
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--ESTRUCTURA DEL POPUP DE APLICACION A CONVOCATORIAS PRACTICAS -->
                        <div class="modal fade" id="modalAplicarAConvPracticas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="titulo_seccion" id="staticBackdropLabel">Aplicación a Convocatoria</h3>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea aplicar su eportafolio a esta convocatoria?</p>

                                    <div class="formulario-comparitEportafolio">
                                    
                                        <form id="formularioModalAplicarConvocatoriaPracticas" action="EportafolioService/capturaDatEportafolio.php" method="POST">
                                            <input type="hidden" name="Id" value="">
                                            <input type="hidden" name="idEstudiante" value="<?php echo $idEstudianteLogueado;?>"> 
                                                                           
                                            <br>
                                            
                                            <button type="submit" name="aplicarEportafolioAUnaConvocatoria" class="btn_agregarPropuesta" title="Si">Si</button>
                                            <button id="btnCerrarModalAplicarAConvocatoria" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesConvPracticas" title="No">No</button>
                                        </form> 
                                        <!--Incluimos el archivo con la logica del formulario-->
                                        <?php include("EportafolioService/capturaDatEportafolio.php") ?>                                   
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
             
            </main>
        </div>
<?php
}}
?>
    </body>

        <!--Script que permite pasar los datos de una convocatoria comite  a la ventana modal Aplicacion a una convocatoria-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesConvocatoria').click(function(){
                    
                    var idConvComAAplicar = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvComAAplicar': idConvComAAplicar },
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
                        var formId = '#detallesDeConvComAAplicar';
                        var modalShare = '#formularioModalAplicarConvocatoriaComite';
                        $.each(data, function(key, value){
                            $('[name='+key+']', formId).val(value);
                            $('[name='+key+']', modalShare).val(value);
                        });
                    })
                    .catch((error) => {
                        console.log(error)
                    })
                        
                });
            });
        </script>

        <!--Script que permite pasar el id de una convocatoria comite con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesConvocatoria').click(function(){
                        
                    var idConvComAAplicarImagen = $(this).data('id');
                    
                    function verificacionDeImagenParaConvocatoriaComiteAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvComAAplicarImagen': idConvComAAplicarImagen},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeConvocatoriaComite').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaConvocatoriaComiteAAplicar();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de una convocatoria comite con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesConvocatoria').click(function(){
                        
                    var idConvComAAplicarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaConvocatoriaComiteAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvComAAplicarEnunciado': idConvComAAplicarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciadoConvocatoria').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaConvocatoriaComiteAAplicar();                            
                });
            });
        </script>

         <!--Script que permite traer los datos del profesor al modal de una convocatoria a aplicar-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesConvocatoria').click(function(){
                    
                    var idProfesorConvocatoriaAAplicar = $(this).data('profesor');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idProfesorConvocatoriaAAplicar': idProfesorConvocatoriaAAplicar },
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
                        var formId = '#seccionDatosProfesorConvocatoria';
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








        <!--Script que permite pasar los datos de una convocatoria practicas  a la ventana modal Aplicacion a una convocatoria practicas-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesConvocatoriaPrac').click(function(){
                    
                    var idConvPracticasAAplicar = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvPracticasAAplicar': idConvPracticasAAplicar },
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
                        var formId = '#detallesDePropuestaAAplicar';
                        var modalShare = '#formularioModalAplicarConvocatoriaPracticas';
                        $.each(data, function(key, value){
                            $('[name='+key+']', formId).val(value);
                            $('[name='+key+']', modalShare).val(value);
                        });
                    })
                    .catch((error) => {
                        console.log(error)
                    })
                        
                });
            });
        </script>

        <!--Script que permite pasar el id de una convocatoria practicas con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesConvocatoriaPrac').click(function(){
                        
                    var idConvPracticasAAplicarImagen = $(this).data('id');
                    
                    function verificacionDeImagenParaConvPracticasAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvPracticasAAplicarImagen': idConvPracticasAAplicarImagen},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeLaConvPracticas').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaConvPracticasAAplicar();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de una convocatoria practicas con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesConvocatoriaPrac').click(function(){
                        
                    var idConvPracAAplicarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaConvPracticasAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idConvPracAAplicarEnunciado': idConvPracAAplicarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaEnunciadoDeLaConvPracticas').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaConvPracticasAAplicar();                            
                });
            });
        </script>

         
</html>
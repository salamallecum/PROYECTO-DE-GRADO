
<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/TrabajoControlador.php";

$trabajoDestControla = new TrabajoControlador();


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
        <script src="assets/js/dom/funcionesBasicasPopUpTrabajosDestacados.js" type="module"></script>
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
                        <a class="link_menu-active" href="./DashBoard_Estudiante.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./PerfilDeUsuario_Estudiante.php?Id_estudiante=38">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./TrabajosDestacados_Estudiante.php?Id_estudiante=38">
                            <span title="Trabajos destacados"><i class="bi bi-clipboard-check"></i></span>
                            <span class="items_menu">TRABAJOS DESTACADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./E-portafolio_Estudiante.php?Id_estudiante=38">
                            <span title="E-portafolio"><i class="bi bi-folder-check"></i></span>
                            <span class="items_menu">E-PORTAFOLIO</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosYEventos_Estudiante.php?Id_estudiante=38">
                            <span title="Desafios y eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./DesafiosPersonalizados_Estudiante.php?Id_estudiante=38">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
                            <span class="items_menu">DES. PERSONALIZADOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./ConvocatoriasExternas_Estudiante.php?Id_estudiante=38">
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
                        <span>Trabajos destacados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="card-header">
                    <button type="button" class="btn_agregarTrabajo" data-bs-toggle="modal" data-bs-target="#modalRegistrarTrabajoDestacado" title="Nuevo trabajo destacado">Nuevo trabajo</button>                  
                </div>

                <div class="container mt-3">
                    <div class="row">
                    
                        <!--Script para cargar datos de los trabajos destacados en cards-->      
                        <?php
                            $sql = "SELECT Id, nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion, fueAplicadoAActividad from tbl_trabajodestacado where trabajoTieneBadge = 'No' and Id_estudiante=".$idEstudianteLogueado;
                            $resultDatosTrabDestacados = $trabajoDestControla->mostrarDatosTrabajosDestacados($sql);
                            while ($row = mysqli_fetch_row($resultDatosTrabDestacados)){
                        ?>
                                                         
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="separador"></div>
                                    <div class="tarjeta">
                                        
                                        <?php 
                                        //Aqui se traen las imagenes de cada trabajo destacado
                                        $nombreDeImg = $row[3];

                                        if($nombreDeImg != null){

                                        ?>

                                            <img src='<?php echo "trabajosImages/".$nombreDeImg?>' class="imgCard" alt="..."> 

                                        <?php
                                        }else{
                                        ?>
                                        
                                            <img src="assets/images/ImgTrabDestacadoPorDefecto.jpg" class="imgCard" alt="..."> 

                                        <?php    
                                        }                       
                                        ?>                                
                                        
                                        <table>
                                            <tr>
                                                <td><h5 class="tituloTrabajo"><?php echo $row[1];?></h5></td>
                                            </tr>

                                            <tr>
                                                <td class="campoTabla"><textarea class="descripcionTrabDestacado" disabled><?php echo $row[2];?></textarea></td>
                                            </tr>
                                        </table>

                                        <table>
                                            <tr class="filaDePostulacion">
                                                <td><label class="textoPostulacion">SE PUEDE POSTULAR:</label></td>

                                                    <?php 
                                                    //Aqui se traen las imagenes de cada trabajo destacado
                                                    $disponibilidad = $row[8];

                                                    if($disponibilidad == 'Si'){

                                                    ?>

                                                        <td><img src='assets/images/indic_trabDestacado_noSePuedePostular.PNG' title="Este trabajo destacado no se puede postular" alt="..."></td>

                                                    <?php
                                                    }else{
                                                    ?>
                                                    
                                                        <td><img src="assets/images/indic_trabDestacado_sePuedePostular.PNG" title="Este trabajo destacado esta disponible para postular" alt="..."></td>

                                                    <?php    
                                                    }                       
                                                    ?>
                                            </tr>
                                        </table>
                                            
                                        <table class="tablabotonesEdicion">
                                            <tr>
                                                <td class="colBotonesEdicion"><a class="btnEditarTrabajoDestacado" data-id="<?php echo $row[0];?>" data-bs-toggle="modal" data-bs-target="#modalEditarTrabajo" title="Editar"><img src="assets/images/btn_editar.PNG"></a></td>
                                                <td class="colBotonesEdicion"><a class="btnEliminarTrabajoDestacado" data-id="<?php echo $row[0];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarTrabajo" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a></td>
                                            </tr>
                                        </table> 
                                        
                                        <label class="textoPostulacion">Evidencias:</label>

                                        <div class="card-evidencias">

                                            <?php
                                                //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                                $linkDocumento = $row[4];
                                                $linkVideo = $row[5];
                                                $linkRepoCodigo = $row[6];
                                                $linkPresentacion = $row[7];

                                                if($linkDocumento != null){
                                            ?>
                                                    <a href="<?php echo $linkDocumento; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumento; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a>

                                            <?php
                                                }if($linkVideo != null){
                                            ?>
                                                    <a href="<?php echo $linkVideo; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideo; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a>

                                            <?php
                                                }if($linkRepoCodigo != null){
                                            ?>
                                                    <a href="<?php echo $linkRepoCodigo; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigo; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a>

                                            <?php
                                                }if($linkPresentacion != null){
                                            ?>
                                                    <a href="<?php echo $linkPresentacion; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacion; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a>

                                            <?php
                                                }
                                            ?>  
                                                                       
                                        </div>

                                    </div>
                                    <div class="separador"></div>
                                </div>

                        <?php
                                    
                            }
}
                        ?>
 
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE REGISTRO DE TRABAJOS DESTACADOS-->
                    <div class="modal fade" id="modalRegistrarTrabajoDestacado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nuevo Trabajo destacado</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeRegTrabajos" action="logic/capturaDatTrabajo.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="idEst" value="<?php echo $idEstudianteLogueado;?>">
                            
                                <label class="camposFormulario">Nombre del trabajo</label><br>
                                <input name="nombreTrabajo" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <input type="checkbox" name="publicarEnEportafolio"> <label for="check_publicarTrabajoEnEportafolio">Publicar en E-portafolio</label>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el trabajo</label><br>
                                <input  id="btn_imgParaElEvento" name="imgParaElTrabajo" accept=".jpeg, .jpg, .png" type="file" class="form-control">                   
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcionTrabajo" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <p>Indique los enlaces en los cuales tiene las siguientes evidencias:</p>

                                <label class="camposFormulario">Documento</label><br>
                                <input id="txt_linkDocumento" name="linkDocumento" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Video</label><br>
                                <input id="txt_linkVideo" name="linkVideo" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Repositorio de codigo</label><br>
                                <input id="txt_linkRepoCodigo" name="linkRepoCodigo" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Presentación</label><br>
                                <input id="txt_linkPresentacion" name="linkPresentacion" placeholder="" type="text" class="form-control">
                                <br>
                                <br>
                                <button type="submit" name="guardarTrabajoDestacado" class="btn_agregarTrabajo" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroTrabajo" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatTrabajo.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ACTUALIZACION DE TRABAJOS DESTACADOS-->
                    <div class="modal fade" id="modalEditarTrabajo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar Trabajo destacado</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeActualizacionDeTrabajos" action="logic/capturaDatTrabajo.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="Id">
                            
                                <label class="camposFormulario">Nombre del trabajo</label><br>
                                <input name="nombre_trabajo" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <input id="txt_eportafolioPublicado" type="hidden" name="publicadoeneportafolio">
                                <input type="checkbox" id="check_publicarTrabajoEnEportafolio" name="publicadoeneportafolioEdit" value="Si"> <label for="check_publicarTrabajoEnEportafolio">Publicar en E-portafolio</label>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para el trabajo</label><br>
                                <input  id="btn_imgParaElEvento" name="imgParaElTrabajoEdit" accept=".jpeg, .jpg, .png" type="file" class="form-control">                   
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <p>Indique los enlaces en los cuales tiene las siguientes evidencias:</p>

                                <label class="camposFormulario">Documento</label><br>
                                <input id="txt_linkDocumento" name="link_documento" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Video</label><br>
                                <input id="txt_linkVideo" name="link_video" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Repositorio de codigo</label><br>
                                <input id="txt_linkRepoCodigo" name="link_repocodigo" placeholder="" type="text" class="form-control">
                                <br>

                                <label class="camposFormulario">Presentación</label><br>
                                <input id="txt_linkPresentacion" name="link_presentacion" placeholder="" type="text" class="form-control">
                                <br>
                                <br>
                                <button type="submit" name="actualizarTrabajoDestacado" class="btn_agregarTrabajo" title="Actualizar">Actualizar</button>
                                <button id="btn_cancelar" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatTrabajo.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP DE ELIMINACION DE TRABAJOS DESTACADOS-->
                    <div class="modal fade" id="modalEliminarTrabajo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar Trabajo</h3>
                        </div>
                        <form id="formularioDeEliminacionDeTrabajos" action="logic/capturaDatTrabajo.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="Id" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarTrabajo" class="btn_agregarTrabajo" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatTrabajo.php") ?>
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

        <!--Script que permite pasar los datos de un trabajo destacado a la ventana modal de edicion del mismo-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnEditarTrabajoDestacado').click(function(){
                                        
                    var idTrabajoEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idTrabajoEdit': idTrabajoEdit},
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
                        var formId = '#formularioDeActualizacionDeTrabajos';
                        $.each(data, function(key, value){
                            $('[name='+key+']', formId).val(value);

                            var eportPublicado = document.getElementById('txt_eportafolioPublicado').value;
                            console.log(eportPublicado);

                            if(eportPublicado == 'Si'){
                                $("#check_publicarTrabajoEnEportafolio").prop("checked", true);
                            }else{
                                $("#check_publicarTrabajoEnEportafolio").prop("checked", false);
                            }
                            
                        });
                    })
                    .catch((error) => {
                        console.log(error)
                    })
                    
                        
                });
            });
        </script>

        <!--Script que permite pasar los datos de un trabajo destacado desde la BD a su ventana modal de eliminacion correspondiente-->
        <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la competencia general
            $(document).ready(function(){
                
                $('.btnEliminarTrabajoDestacado').click(function(){
                    
                    var idTrabajoElim = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idTrabajoElim': idTrabajoElim},
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
                        var formId = '#formularioDeEliminacionDeTrabajos';
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
    </body>
</html>
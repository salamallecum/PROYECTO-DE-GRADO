<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/DesafioControlador.php";

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

$desafioPerControla = new DesafioControlador();


//Aqui capturamos el id del profesor logueado
if(isset($_GET['Id_profesor']) != 0){

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
                        <a class="link_menu-active" href="<?php echo "./DashBoard_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./PerfilDeUsuario_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Perfil de usuario"><i class="bi bi-person-circle"></i></span>
                            <span class="items_menu">PERFIL DE USUARIO</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="link_menu" href="<?php echo "./AdministrarDesafios_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Administrador de desafios"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">ADMINISTRAR DESAFIOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./EvaluarTrabajos_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Evaluar trabajos"><i class="bi bi-card-checklist"></i></span>
                            <span class="items_menu">EVALUAR TRABAJOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="<?php echo "./DesafiosPersonalizados_Profesor.php?Id_profesor=".$idProfesorLogueado;?>">
                            <span title="Desafios personalizados"><i class="bi bi-lightbulb"></i></span>
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
                        <span>Administrador de desafios personalizados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="logout.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="main-tableDesafios">
                   
                    <br>
                    <h3 class="titulo_seccion">Tabla de Propuestas</h3>

                    <!--ESTRUCTURA DE TABLA DE DESAFIOS PERSONALIZADOS PARA APROBACION DEL PROFESOR-->
                    <table id="table_desafosPersonalizadosProfesor" class="tablaDeDesafios">
                        <thead class="encab_tablaPropuestas">
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre propuesta</th>
                                <th class="campoTabla">Desafio que reemplaza</th>
                                <th class="campoTabla">Estado</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <!--Script para cargar datos en tabla de Desafios personalizados-->  
                        <!--Consultamos los id de los desafios que tiene el profesor -->    
                        <?php
                            $sql = "SELECT id_desafio from tbl_desafio where id_profesor=".$idProfesorLogueado;
                            $datosDesafios = $desafioPerControla->mostrarDatosDesafios($sql);
                            foreach ($datosDesafios as $key){
                        ?>
                            <!--Consultamos los datos los desafios personalizados que apuntan a esos desafios que tiene el profesor --> 
                            <?php
                                $sqlDF = "SELECT Id, Id_estudiante, nombre_desafioP, nombre_imagen, idDesafioASustituir, estado from tbl_desafiopersonal where idDesafioASustituir=".$key['id_desafio'];
                                $datosDesPersonal = $desafioPerControla->mostrarDatosDesafios($sqlDF);
                                foreach ($datosDesPersonal as $point){
                            ?>
                                <!--Consultamos el nombre de los desafios del profesor que son contribuidos por las propuestas --> 
                                <?php
                                    $sqlNomDes = "SELECT nombre_desafio from tbl_desafio where id_desafio=".$point['idDesafioASustituir'];
                                    $datosDesaf = $desafioPerControla->mostrarDatosDesafios($sqlNomDes);
                                    foreach ($datosDesaf as $lex){
                                ?>
                                    <!--Aqui van los registros de la tabla de propuestas presentadas por los estudiantes para que el docente las revise-->
                                    <?php
                                        //Aqui hacemos el muestreo independiente para cada uno de los diferentes estados de un desafio personalizado
                                        $estadoDesafioPer = $point['estado'];

                                        if($estadoDesafioPer == 'Aprobada'){
                                    ?>
                                            <tr class="filasDeDatosTablaDesafios">

                                                <?php 
                                                //Aqui se traen las imagenes de cada desafio personalizado
                                                $nombreDeImgAprob = $point['nombre_imagen'];

                                                if($nombreDeImgAprob != null){

                                                ?>

                                                    <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='<?php echo "desafiosPerImages/".$nombreDeImgAprob?>'></td>

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>

                                                <?php    
                                                }                       
                                                ?>
                                                <td class="datoTabla"><?php echo $point['nombre_desafioP'];  ?></td>
                                                <td class="datoTabla"><?php echo $lex['nombre_desafio'];  ?></td>
                                                <td class="datoTabla">Aprobada</td>
                                                <td class="datoTabla"><div class="compEsp-edicion">

                                                    <div class="col-botonesEdicion">
                                                        <a class="btnDetallesPropuestaAprobada" data-id="<?php echo $point['Id'];?>" data-estudiante="<?php echo $point['Id_estudiante'];?>" data-desafio="<?php echo $point['idDesafioASustituir'];?>" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaAprobada" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a>
                                                    </div>
                                                    
                                                    <div class="col-botonesEdicion">
                                                        <a class="btnEliminarPropuesta" data-id="<?php echo $point['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarPropuesta" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>    
                                                    </div>
                                                </div></td>
                                            </tr>
                                    
                                    <?php
                                        }else if($estadoDesafioPer == 'Rechazada'){
                                    ?>
                                            <tr class="filasDeDatosTablaDesafios">
                                                
                                                <?php 
                                                //Aqui se traen las imagenes de cada desafio personalizado
                                                $nombreDeImgRechaz = $point['nombre_imagen'];

                                                if($nombreDeImgRechaz != null){

                                                ?>

                                                    <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='<?php echo "desafiosPerImages/".$nombreDeImgRechaz?>'></td>

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>

                                                <?php    
                                                }                       
                                                ?>
                                                <td class="datoTabla"><?php echo $point['nombre_desafioP'];  ?></td>
                                                <td class="datoTabla"><?php echo $lex['nombre_desafio'];  ?></td>
                                                <td class="datoTabla">Rechazada</td>
                                                <td class="datoTabla"><div class="compEsp-edicion">
                                                    <div class="col-botonesEdicion">
                                                        <a class="btnDetallesPropuestaRechazada" data-id="<?php echo $point['Id'];?>" data-estudiante="<?php echo $point['Id_estudiante'];?>" data-desafio="<?php echo $point['idDesafioASustituir'];?>" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaRechazada" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a>
                                                    </div>
                                                </div></td>
                                            </tr>

                                    <?php
                                        }else if($estadoDesafioPer == 'Entregada'){
                                    ?>
                                            <tr class="filasDeDatosTablaDesafios">
                                                <?php 
                                                //Aqui se traen las imagenes de cada desafio personalizado
                                                $nombreDeImgRechaz = $point['nombre_imagen'];

                                                if($nombreDeImgRechaz != null){

                                                ?>

                                                    <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='<?php echo "desafiosPerImages/".$nombreDeImgRechaz?>'></td>

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>

                                                <?php    
                                                }                       
                                                ?>
                                                <td class="datoTabla"><?php echo $point['nombre_desafioP'];  ?></td>
                                                <td class="datoTabla"><?php echo $lex['nombre_desafio'];  ?></td>
                                                <td class="datoTabla">Por revisar</td>
                                                <td class="datoTabla"><div class="compEsp-edicion">
                                                    <div class="col-botonesEdicion">
                                                        <a class="btnDetallesPropuestaPorRevisar" data-id="<?php echo $point['Id'];?>" data-estudiante="<?php echo $point['Id_estudiante'];?>" data-desafio="<?php echo $point['idDesafioASustituir'];?>" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaPorRevisar" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a>
                                                    </div>
                                                </div></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                }
                            }
}}
                                    ?>

                        </tbody>
  
                    </table>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS POR REVISAR-->
                    <div class="modal fade" id="modalDetallesDePropuestaPorRevisar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDePropuestaPorRevisar" class="modal-body">
                            
                            <input type="hidden" id="idPropDetalles" name="Id" value="">
                            <input type="hidden" id="nombreEnunciadoPropDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenPropDetalles" name="nombre_imagen">
                            <input type="hidden" id="idEstudianteQueProponePropuestaPorRevisar" name="Id_estudiante">
                            <input type="hidden" id="txt_idDesafioASustituir" name="idDesafioASustituir">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafioP" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de la propuesta-->
                            <span id="panelParaImagenDeLaPropuesta"></span>
                            <br>
                            <br>

                            <form id="seccionDatosEstudiante">
                                
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
                                <input type="text" class="infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo de la propuesta-->
                            <span id="panelParaBotonDescargaEnunciado"></span>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="fecha_propuesta" disabled></td>
                                </tr>
                            </table> 
                            <br>
                            
                            <form id="infoDesafioAReemplazar">
                                <label class="subtitulosInfo">Desafio que se quiere reemplazar:</label><br>
                                <input type="text" class="infoDetalleDesafio" name="nombre_desafio">
                            </form>
                            <br>  
                            
                            <label class="subtitulosInfo">Observaciones</label>
                            <textarea id="txt_ObservacionesALaPropuesta" name="observaciones" cols="80" placeholder="Escriba sus comentarios aquí" rows="8" class="textAreaObservacionesPropuesta" maxlength="300"></textarea>
                            <br>
                            <br>  

                            <button id="btn_detalleDesafioReferenciado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafioASustituirPR" title="Ver desafio">Ver desafio</button>   
                            <button id="btn_aprobarPropuesta" class="btn_agregarDesafio" title="Aprobar propuesta">Aprobar</button>
                            <button id="btn_rechazarPropuesta" class="btn_agregarDesafio" title="Rechazar propuesta">Rechazar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS (PROPUESTA POR REVISAR)-->
                    <div class="modal fade" id="modalDetallesDesafioASustituirPR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafio" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDelDesafio"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaEnunciadoDelDesafio"></span>
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

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estado de la actividad:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="estado" disabled></td>
                                </tr>
                            </table> 
                            <br>

                            <button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaPorRevisar" title="Atras">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>
        


                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS APROBADAS-->
                    <div class="modal fade" id="modalDetallesDePropuestaAprobada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDePropuestaAprobada" class="modal-body">
                            
                            <input type="hidden" id="idPropDetalles" name="Id" value="">
                            <input type="hidden" id="nombreEnunciadoPropDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenPropDetalles" name="nombre_imagen">
                            <input type="hidden" id="idEstudianteQueProponePropuestaPorRevisar" name="Id_estudiante">
                            <input type="hidden" id="txt_idDesafioASustituir" name="idDesafioASustituir">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafioP" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de la propuesta-->
                            <span id="panelParaImagenDeLaPropuestaPA"></span>
                            <br>
                            <br>

                            <form id="seccionDatosEstudiantePA">
                                
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
                                <input type="text" class="infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo de la propuesta-->
                            <span id="panelParaBotonDescargaEnunciadoPA"></span>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="fecha_propuesta" disabled></td>
                                </tr>
                            </table> 
                            <br>
                            
                            <form id="infoDesafioAReemplazarPA">
                                <label class="subtitulosInfo">Desafio que se quiere reemplazar:</label><br>
                                <input type="text" class="infoDetalleDesafio" name="nombre_desafio">
                            </form>
                            <br>  
                            
                            <label class="subtitulosInfo">Observaciones</label>
                            <textarea id="txt_ObservacionesALaPropuesta" name="observaciones" cols="80" placeholder="" rows="8" class="textAreaObservacionesPropuesta" maxlength="300" disabled></textarea>
                            <br>
                            <br>  
                            
                            <!--Aqui mostramos la confiramcion de quese aprobo o se rechazo la propuesta-->
                            <span id="panelConfirmacionDeJuicio"></span>
                            <br>

                            <button id="btn_detalleDesafioReferenciado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafioASustituirAP" title="Ver desafio">Ver desafio</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS (PROPUESTA APROBADA)-->
                    <div class="modal fade" id="modalDetallesDesafioASustituirAP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafioPA" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDelDesafioPA"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaEnunciadoDelDesafioPA"></span>
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

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estado de la actividad:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="estado" disabled></td>
                                </tr>
                            </table> 
                            <br>

                            <button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaAprobada" title="Atras">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS RECHAZADAS-->
                    <div class="modal fade" id="modalDetallesDePropuestaRechazada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDePropuestaRechazadaPR" class="modal-body">
                            
                            <input type="hidden" id="idPropDetalles" name="Id" value="">
                            <input type="hidden" id="nombreEnunciadoPropDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenPropDetalles" name="nombre_imagen">
                            <input type="hidden" id="idEstudianteQueProponePropuestaPorRevisar" name="Id_estudiante">
                            <input type="hidden" id="txt_idDesafioASustituir" name="idDesafioASustituir">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafioP" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de la propuesta-->
                            <span id="panelParaImagenDeLaPropuestaPR"></span>
                            <br>
                            <br>

                            <form id="seccionDatosEstudiantePR">
                                
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
                                <input type="text" class="infoDetallePropuesta" name="correo_usuario" disabled>

                            </form>                       
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo de la propuesta-->
                            <span id="panelParaBotonDescargaEnunciadoPR"></span>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="fecha_propuesta" disabled></td>
                                </tr>
                            </table> 
                            <br>
                            
                            <form id="infoDesafioAReemplazarPR">
                                <label class="subtitulosInfo">Desafio que se quiere reemplazar:</label><br>
                                <input type="text" class="infoDetalleDesafio" name="nombre_desafio">
                            </form>
                            <br>  
                            
                            <label class="subtitulosInfo">Observaciones</label>
                            <textarea id="txt_ObservacionesALaPropuesta" name="observaciones" cols="80" placeholder="" rows="8" class="textAreaObservacionesPropuesta" maxlength="300"  disabled></textarea>
                            <br>
                            <br>      

                            <button id="btn_detalleDesafioReferenciado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafioASustituirRE" title="Ver desafio">Ver desafio</button>   
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>



                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS (PROPUESTA RECHAZADA)-->
                    <div class="modal fade" id="modalDetallesDesafioASustituirRE" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafioPR" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDelDesafioPR"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaEnunciadoDelDesafioPR"></span>
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

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estado de la actividad:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="estado" disabled></td>
                                </tr>
                            </table> 
                            <br>

                            <button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaRechazada" title="Atras">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>        
                    

                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE PROPUESTAS DE DESAFIOS-->
                    <div class="modal fade" id="modalEliminarPropuesta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar Propuesta</h3>
                        </div>
                        <form id="formularioDeEliminacionDePropuestas" action="logic/capturaDatDesafio.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="Id" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarPropuesta" class="btn_detalleDesafioReferenciado" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatDesafio.php") ?>
                        </div>
                    </div>
                    </div>

                    
                   
                </div>
            </main>
        </div>

         <!--Script que permite pasar los datos de un desafio personalizado desde la BD a su ventana modal de eliminacion correspondiente-->
         <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la propuesta aprobada
            $(document).ready(function(){
                
                $('.btnEliminarPropuesta').click(function(){
                    
                    var idPropuestaElim = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaElim': idPropuestaElim},
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
                        var formId = '#formularioDeEliminacionDePropuestas';
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

        <!--Script que permite pasar los datos de una propuesta por revisar a la ventana modal de detalles de la misma para el estado "Por revisar"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaPorRevisar').click(function(){
                    
                    var idPropuestaDetallesModalPorRevisar = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaDetallesModalPorRevisar': idPropuestaDetallesModalPorRevisar },
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
                        var formId = '#detallesDePropuestaPorRevisar';
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

        <!--Script que permite pasar el id de una propuesta por revisar con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaPorRevisar').click(function(){
                        
                    var idPropuestaImagenPorRevisar = $(this).data('id');
                    
                    function verificacionDeImagenParaPropuestaModalPorRevisar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaImagenPorRevisar': idPropuestaImagenPorRevisar},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeLaPropuesta').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaPropuestaModalPorRevisar();
                            
                });
            });
        </script>

        <!--Script que permite traer los datos del estudiante que propuso el desafio personalizado a la ventana modal de detalles de la misma en estado "Por revisar"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaPorRevisar').click(function(){
                    
                    var idEstudianteQProponeParaModal = $(this).data('estudiante');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEstudianteQProponeParaModal': idEstudianteQProponeParaModal},
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
                        var formId = '#seccionDatosEstudiante';
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

        <!--Script que permite traer el nombre del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles de la misma en estado "Por revisar"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaPorRevisar').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalPorRevisar = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalPorRevisar': idDesafioQSePretendeSustituirParaModalPorRevisar },
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
                        var formId = '#infoDesafioAReemplazar';
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

        <!--Script que permite traer el Id del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles del mismo para el estado "Por revisar"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaPorRevisar').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalDetallesDesafio = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalDetallesDesafio': idDesafioQSePretendeSustituirParaModalDetallesDesafio },
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
                        var formId = '#detallesDeDesafio';
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

        <!--Script que permite pasar el id de un desafio personalizado con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaPorRevisar').click(function(){
                        
                    var idPropuestaParaBuscarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaParaBuscarEnunciado': idPropuestaParaBuscarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciado').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene imagen almacenada o no (Cuando la propuesta esta en estado por revisar)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaPorRevisar').click(function(){
                        
                    var idImagenDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeImagenParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idImagenDesafioPropuesta': idImagenDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDelDesafio').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene enunciado almacenado o no (Cuando la propuesta esta en estado por revisar)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaPorRevisar').click(function(){
                        
                    var idEnunciadoDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEnunciadoDesafioPropuesta': idEnunciadoDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaEnunciadoDelDesafio').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite Aprobar una propuesta-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('#btn_aprobarPropuesta').click(function(){

                    var propuestaAAprobar = document.getElementById('idPropDetalles').value;
                    var observaciones = document.getElementById('txt_ObservacionesALaPropuesta').value; 

                    if (observaciones != "") {

                        function aprobarPropuesta() {
                            return new Promise((resolve, reject) => {
                                    // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'propuestaAAprobar': propuestaAAprobar, 'observaciones': observaciones},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                        reject(error)
                                    },
                                });
                            })
                        }
                        aprobarPropuesta();
                        
                        //Recargamos la pagina
                        window.location.reload(true);

                     
                    }else{
                        alert('Indique sus comentarios frente a la propuesta presentada.');
                    }

                });
            });
        </script>

        <!--Script que permite Rechazar una propuesta-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('#btn_rechazarPropuesta').click(function(){

                    var propuestaARechazar = document.getElementById('idPropDetalles').value;
                    var comentariosDeMejora = document.getElementById('txt_ObservacionesALaPropuesta').value;
                

                    if (comentariosDeMejora != "") {

                        function rechazarPropuesta() {
                            return new Promise((resolve, reject) => {
                                    // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {'propuestaARechazar': propuestaARechazar, 'comentariosDeMejora': comentariosDeMejora},
                                    success: function(response){
                                        resolve(response)
                                    },
                                    error: function (error) {
                                        reject(error)
                                    },
                                });
                            })
                        }
                        rechazarPropuesta();

                        //Recargamos la pagina
                        window.location.reload(true);

                    }else{
                        alert('Indique sus comentarios de realimentación a la propuesta presentada.');
                    }

                });
            });
        </script>

        <!--Script que permite pasar los datos de una propuesta aprobada a la ventana modal de detalles de la misma para el estado "Aprobada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaAprobada').click(function(){
                    
                    var idPropuestaDetallesModalAprobada = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaDetallesModalAprobada': idPropuestaDetallesModalAprobada },
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
                        var formId = '#detallesDePropuestaAprobada';
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

        <!--Script que permite pasar el id de una propuesta aprobada con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaAprobada').click(function(){
                        
                    var idPropuestaImagenAprobada = $(this).data('id');
                    
                    function verificacionDeImagenParaPropuestaModalAprobada() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaImagenAprobada': idPropuestaImagenAprobada},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeLaPropuestaPA').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaPropuestaModalAprobada();
                            
                });
            });
        </script>



        <!--Script que permite traer el Id del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles del mismo para el estado "Aprobada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaAprobada').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalDetallesDesafio = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalDetallesDesafio': idDesafioQSePretendeSustituirParaModalDetallesDesafio },
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
                        var formId = '#detallesDeDesafioPA';
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

        <!--Script que permite traer el nombre del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles de la misma en estado "Aprobada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaAprobada').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalAprobada = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalAprobada': idDesafioQSePretendeSustituirParaModalAprobada },
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
                        var formId = '#infoDesafioAReemplazarPA';
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

        <!--Script que permite pasar el id de un desafio personalizado con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaAprobada').click(function(){
                        
                    var idPropuestaParaBuscarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaParaBuscarEnunciado': idPropuestaParaBuscarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciadoPA').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene imagen almacenada o no (Cuando la propuesta esta en estado por revisar)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaAprobada').click(function(){
                        
                    var idImagenDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeImagenParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idImagenDesafioPropuesta': idImagenDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDelDesafioPA').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene enunciado almacenado o no (Cuando la propuesta esta en estado por revisar)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaAprobada').click(function(){
                        
                    var idEnunciadoDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEnunciadoDesafioPropuesta': idEnunciadoDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaEnunciadoDelDesafioPA').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite traer los datos del estudiante que propuso el desafio personalizado a la ventana modal de detalles de la misma en estado "Aprobada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaAprobada').click(function(){
                    
                    var idEstudianteQProponeParaModal = $(this).data('estudiante');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEstudianteQProponeParaModal': idEstudianteQProponeParaModal},
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
                        var formId = '#seccionDatosEstudiantePA';
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

        <!--Script que permite pasar los datos de una propuesta  a la ventana modal de detalles de la misma para el estado "Rechazada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaRechazada').click(function(){
                    
                    var idPropuestaDetallesModalRechazada = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaDetallesModalRechazada': idPropuestaDetallesModalRechazada },
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
                        var formId = '#detallesDePropuestaRechazadaPR';
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

        <!--Script que permite pasar el id de una propuesta aprobada con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaRechazada').click(function(){
                        
                    var idPropuestaImagenAprobada = $(this).data('id');
                    
                    function verificacionDeImagenParaPropuestaModalAprobada() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaImagenAprobada': idPropuestaImagenAprobada},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeLaPropuestaPR').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaPropuestaModalAprobada();
                            
                });
            });
        </script>



        <!--Script que permite traer el Id del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles del mismo para el estado "Rechazada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaRechazada').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalDetallesDesafio = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalDetallesDesafio': idDesafioQSePretendeSustituirParaModalDetallesDesafio },
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
                        var formId = '#detallesDeDesafioPR';
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

        <!--Script que permite traer el nombre del desafio que se pretende reemplazar con el desafio personalizado propuesto a la ventana modal de detalles de la misma en estado "Rechazada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaRechazada').click(function(){
                    
                    var idDesafioQSePretendeSustituirParaModalAprobada = $(this).data('desafio');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioQSePretendeSustituirParaModalAprobada': idDesafioQSePretendeSustituirParaModalAprobada },
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
                        var formId = '#infoDesafioAReemplazarPR';
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

        <!--Script que permite pasar el id de un desafio personalizado con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaRechazada').click(function(){
                        
                    var idPropuestaParaBuscarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaParaBuscarEnunciado': idPropuestaParaBuscarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciadoPR').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene imagen almacenada o no (Cuando la propuesta esta en estado Rechazada)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaRechazada').click(function(){
                        
                    var idImagenDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeImagenParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idImagenDesafioPropuesta': idImagenDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDelDesafioPR').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio a contribuir por una propuesta por revisar con el fin de identificar si tiene enunciado almacenado o no (Cuando la propuesta esta en estado Rechazada)-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btnDetallesPropuestaRechazada').click(function(){
                        
                    var idEnunciadoDesafioPropuesta = $(this).data('desafio');
                    
                    function verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEnunciadoDesafioPropuesta': idEnunciadoDesafioPropuesta},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaEnunciadoDelDesafioPR').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaDesafioAfectadoPorPropuesta();
                            
                });
            });
        </script>

        <!--Script que permite traer los datos del estudiante que propuso el desafio personalizado a la ventana modal de detalles de la misma en estado "Rechazada"-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesPropuestaRechazada').click(function(){
                    
                    var idEstudianteQProponeParaModal = $(this).data('estudiante');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEstudianteQProponeParaModal': idEstudianteQProponeParaModal},
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
                        var formId = '#seccionDatosEstudiantePR';
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
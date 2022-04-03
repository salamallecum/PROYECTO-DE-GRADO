<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/DesafioControlador.php";

$desafioPerControla = new DesafioControlador();


//Aqui capturamos el id del profesor logueado
if(isset($_GET['Id_profesor']) != 0){

$idProfeLogueado = $_GET['Id_profesor'];

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
                        <span>Administrador de desafios personalizados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
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
                            $sql = "SELECT id_desafio from tbl_desafio where id_profesor=".$idProfeLogueado;
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
                                                        <a class="btnDetallesPropuestaRechazada" data-id="<?php echo $point['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaRechazada" title="Ver detalles"><img src="assets/images/verDetallesActividad.png"></a>
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
}
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
                                <input type="text" class="infoDetallePropuesta" name="nombre_desafio">
                            </form>
                            <br>                            

                            <label class="subtitulosInfo">Observaciones</label>
                            <textarea id="txt_ObservacionesALaPropuesta" name="observacionesAPropuesta" cols="80" placeholder="Escriba sus comentarios aquí" rows="8" class="textAreaObservacionesPropuesta" maxlength="300"></textarea>
                            <br>
                            <br>        

                            <button id="btn_detalleDesafioReferenciado" class="btn_detalleDesafioReferenciado" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafioASustituir" title="Ver desafio">Ver desafio</button>   
                            <button id="btn_aprobarPropuesta" class="btn_agregarDesafio" title="Aprobar propuesta">Aprobar</button>
                            <button id="btn_rechazarPropuesta" class="btn_agregarDesafio" title="Rechazar propuesta">Rechazar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LOS DESAFIOS REFERENCIADOS-->
                    <div class="modal fade" id="modalDetallesDesafioASustituir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <br>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estado de la actividad:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="" disabled></td>
                                </tr>
                            </table> 
                            <br>

                            <button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalDetallesDePropuestaPorRevisar" title="Atras">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>





































                    <div id="modal_container7" class="modal_container" name="modal_container">
                        <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <!--<img id=img_imagenDelDesafioOEvento" class="imgEncabezadoInfoActividad" src="/assets/images/imgPorDefecto.jpg" alt="">-->
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDelDesafioOEvento" class="titulo_seccion">DESAFIO SUSTITUTO DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">
            
                                    <label class="subtitulosInfo">Descripción</label>
                                    <p id="lbl_descripcionDelDesafioOEvento" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciado" class="btn-fill pull-right btn btn-info" title="Descargar enunciado">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha inicio:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                                
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha fin:</label>
                                                <label id="lbl_fechaInicioActividad">01/01/2021</label>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>

                                    <table>
                                        <tr>
                                            <td><label class="subtitulosInfo">Estado de la actividad:</label>  </td>
                                            <td class="columnaInfoEnunciado"><label id="lbl_estadoActividad">Activo</label></td>
                                        </tr>

                                    </table>
                                                                
                                    <br>
                                    <br>    
                                    <a id="btn_cancelar7" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    























































                

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LAS PROPUESTAS RECHAZADAS-->
                     <div id="modal_container8" class="modal_container" name="modal_container">
                         <div class="modal">
                            
                            <div class="imagenDelDesafioOEvento">
                                <img id=img_imagenDeLaPropuesta" class="imgEncabezadoInfoActividad" src="assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                            <br>

                            <div class="modalBody">
                                <h3 id="lbl_NombreDeLaPropuesta" class="titulo_seccion">PROPUESTA DE PRUEBA 1</h3>
                                <br>
                             
                                <div class="informacionDelDesafioOEvento">

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Estudiante:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_nombreDelEstudiante" class="enunciadoDesafioOEvento">PEPITO PEREZ</p></td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Correo:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_nombreDelEstudiante" class="enunciadoDesafioOEvento">pperez@unbosque.edu.co</p></td>
                                        </tr>

                                    </table>
                                    
                                    <br>
            
                                    <label class="subtitulosInfo">Descripción</label>
                                    <p id="lbl_descripcionDeLaPropuesta" class="enunciadoDesafioOEvento">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum? orem ipsum dolor sit amet consectetur, adipisicing elit. Labore ullam dicta id ea quibusdam. Mollitia, ipsa, voluptatum possimus sed delectus adipisci ut distinctio eligendi illum, et atque saepe explicabo eum?</p>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Enunciado:</label></td>
                                            <td class="columnaInfoEnunciado"><a id="btn_descargarEnunciadoPropuesta" class="btn-fill pull-right btn btn-info" title="Descargar enunciado propuesta">Descargar</a></td>
                                        </tr>
                                    </table>
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                            <td class="columnaInfoEnunciado"><label id="lbl_fechaDePropuesta">01/01/2021</label></td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Desafio al que reemplaza:</label></td>
                                            <td class="columnaInfoEnunciado"><p id="lbl_desafioAReemplazar" class="enunciadoDesafioOEvento">DESAFIO SUSTITUTO DE PRUEBA 1</p></td>
                                        </tr>
                                    </table>
                                                             
                                    <br>  

                                    <form class="">
                                        <label class="subtitulosInfo">Observaciones</label>
                                        <textarea disabled id="txt_ObservacionesALaPropuesta" name="observacionesAPropuesta" cols="80" placeholder="" rows="8" class="form-control"></textarea>
                                    </form>
                                    <br>
                                                                            
                                    <br>
                                    <br>    
                                    <a id="btn_detalleDesafioReferenciado" name="btnDetalleDesafioReferenciado" class="btn_agregarDesafio" title="Ver desafio">Ver desafio</a>   
                                    <a id="btn_cancelar8" class="btn_agregarDesafio" title="Cancelar">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <!--ESTRUCTURA DEL POPUP DE ELIMINACIÓN DE PROPUESTAS DE DESAFIOS-->
                    <div id="modal_container6" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Eliminar Propuesta</h3>
                            <br>
                            <p>¿Está seguro de que desea eliminar?</p>
                            <br>
                            <br>
                            <a id="btn_eliminarPropuesta" class="btn_agregarDesafio" title="Si">Si</a>
                            <a id="btn_cancelar6" class="btn_agregarDesafio" title="No">No</a>
                        </div>
                    </div>

                    
                   
                </div>
            </main>
        </div>

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
                    
                    var idEstudianteQProponeParaModalPorRevisar = $(this).data('estudiante');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEstudianteQProponeParaModalPorRevisar': idEstudianteQProponeParaModalPorRevisar },
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


       

        

    </body>
</html>
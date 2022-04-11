<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/DesafioControlador.php";
require_once "logic/controllers/EventoControlador.php";
require_once "logic/controllers/TrabajoControlador.php";

$eventoControla = new EventoControlador();
$desafioControla = new DesafioControlador();
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
                        <span>Desafios y Eventos</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php"">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
            <div class="container mt-3">
                    <div class="row">
                                            
                        <?php

                            //Consultamos los desafios con los que el estudiante tiene propuestas de desafios personalizadosaprobadas
                            $arrayDesafiosEnLosQueElEstudianteTienePropAprobadas = $desafioControla->consultarDesafiosConLosQueElEstudianteTienePropuestasAprobadas($idEstudianteLogueado);

                            //Convertimos el arreglo obtenido anteriormente a string
                            $stringDesafiosEnLosQueElEstudianteTienePropAprobadas = implode(",", $arrayDesafiosEnLosQueElEstudianteTienePropAprobadas);

                            $sql = "SELECT id_desafio, id_profesor, nombre_desafio, nombre_imagen from tbl_desafio where estado = 'Activo' and id_desafio not in ('$stringDesafiosEnLosQueElEstudianteTienePropAprobadas')";
                            $resultDatosDesafios = $desafioControla->mostrarDatosDesafiosEnCards($sql);
                            while ($point = mysqli_fetch_row($resultDatosDesafios)){    
                        ?>
                                <?php
                                    $desafioEnCuestion = $point[0];

                                    //Consultamos si el estudiante ya aplicó con anterioridad a un desafio para no mostrarselo otra vez
                                    $elDesafioYaTieneUnaAplicacionPrevia = $desafioControla->verificarSiElEstudianteYaAplicoAUnDesafio($idEstudianteLogueado, $desafioEnCuestion);
                                    
                                    if($elDesafioYaTieneUnaAplicacionPrevia == null){     
                                ?>
                                        <div class="col-lg-6 col-md-4 col-sm-12">
                                            <div class="separador"></div>
                                            <div class="tarjetaDesafio">
                                                
                                                <?php 
                                                //Aqui se traen las imagenes de cada desafio 
                                                $nombreDeImg = $point[3];

                                                if($nombreDeImg != null){

                                                ?>

                                                    <img src='<?php echo "desafiosImages/".$nombreDeImg?>' class="imgCard" alt="..."> 

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <img src="assets/images/imgPorDefecto.jpg" class="imgCard" alt="..."> 

                                                <?php    
                                                }                       
                                                ?>                                
                                                
                                                <h5 class="tituloTrabajo"><?php echo $point[2];?></h5>
                                                
                                                <button class="btn_detallesDesafio" data-id="<?php echo $point[0];?>" data-profesor="<?php echo $point[1];?>" type="button"  data-bs-toggle="modal" data-bs-target="#modalDetallesDesafio" title="Ver detalles">Detalles</button>
                                                
                                            </div>
                                            <div class="separador"></div>
                                        </div>
                                <?php
                                    } 
                            }
                       ?>


                        <!--Script para cargar datos de los desafios personalizados en cards-->      
                        <?php
                            $sqlEv = "SELECT Id, nombre_desafioP, nombre_imagen, idDesafioASustituir from tbl_desafiopersonal where estado = 'Aprobada' and idDesafioASustituir in('$stringDesafiosEnLosQueElEstudianteTienePropAprobadas')";
                            $resultDatosEventos = $eventoControla->mostrarDatosEventosEnCards($sqlEv);
                            while ($jax = mysqli_fetch_row($resultDatosEventos)){
                        ?>
                                <?php
                                    $propuestaEnCuestion = $jax[0];

                                    //Consultamos si el estudiante ya aplicó con anterioridad a un desafio personalizado para no mostrarselo otra vez
                                    $laPropuestaYaTieneUnaAplicacionPrevia = $desafioControla->verificarSiElEstudianteYaAplicoAUnaPropuesta($idEstudianteLogueado, $propuestaEnCuestion);
                                    
                                    if($laPropuestaYaTieneUnaAplicacionPrevia == null){     
                                ?>                      
                                       
                                       <div class="col-lg-6 col-md-4 col-sm-12">
                                            <div class="separador"></div>
                                            <div class="tarjetaDesafioPersonalizado">
                                                
                                                <?php 
                                                //Aqui se traen las imagenes de cada propuesta
                                                $nombreDeImgProp = $jax[2];

                                                if($nombreDeImgProp != null){

                                                ?>

                                                    <img src='<?php echo "desafiosPerImages/".$nombreDeImgProp?>' class="imgCard" alt="..."> 

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <img src="assets/images/imgPorDefecto.jpg" class="imgCard" alt="..."> 

                                                <?php    
                                                }                       
                                                ?>                                
                                                
                                                <h5 class="tituloTrabajo"><?php echo $jax[1];?></h5>
                                                
                                                <div class="contentbtnDetalles">
                                                    <button class="btn_detallesDesafioPer" data-id="<?php echo $jax[0];?>" data-desafio="<?php echo $jax[3];?>" type="button" data-bs-toggle="modal" data-bs-target="#modalDetallesPropuesta" title="Ver detalles">Detalles</button>
                                                </div>
                                                
                                            </div>
                                            <div class="separador"></div>
                                        </div>
                                                
                        <?php                    
                            }
                        }

                        ?>


                        <!--Script para cargar datos de los eventos en cards-->      
                        <?php
                            $sqlEv = "SELECT id_evento, nombre_evento, nombre_imagen, id_usuario from tbl_evento where estado = 'Activo'";
                            $resultDatosEventos = $eventoControla->mostrarDatosEventosEnCards($sqlEv);
                            while ($row = mysqli_fetch_row($resultDatosEventos)){
                        ?>
                                <?php
                                    $eventoEnCuestion = $row[0];

                                    //Consultamos si el estudiante ya aplicó con anterioridad a un evento para no mostrarselo otra vez
                                    $elEventoYaTieneUnaAplicacionPrevia = $eventoControla->verificarSiElEstudianteYaAplicoAUnEvento($idEstudianteLogueado, $eventoEnCuestion);
                                    
                                    if($elEventoYaTieneUnaAplicacionPrevia == null){     
                                ?>                      
                                       
                                       <div class="col-lg-6 col-md-4 col-sm-12">
                                            <div class="separador"></div>
                                            <div class="tarjetaEvento">
                                                
                                                <?php 
                                                //Aqui se traen las imagenes de cada evento
                                                $nombreDeImgEv = $row[2];

                                                if($nombreDeImgEv != null){

                                                ?>

                                                    <img src='<?php echo "eventosImages/".$nombreDeImgEv?>' class="imgCard" alt="..."> 

                                                <?php
                                                }else{
                                                ?>
                                                
                                                    <img src="assets/images/imgPorDefecto.jpg" class="imgCard" alt="..."> 

                                                <?php    
                                                }                       
                                                ?>                                
                                                
                                                <h5 class="tituloTrabajo"><?php echo $row[1];?></h5>
                                                
                                                <div class="contentbtnDetalles">
                                                    <button class="btn_detallesEvento" data-id="<?php echo $row[0];?>" data-profesor="<?php echo $row[3];?>" type="button" data-bs-toggle="modal" data-bs-target="#modalDetallesEvento" title="Ver detalles">Detalles</button>
                                                </div>
                                                
                                            </div>
                                            <div class="separador"></div>
                                        </div>
                                                
                        <?php                    
                            }
                        }

                        ?>

                    </div>
                </div>


                <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE LOS DESAFIOS PERSONALIZADOS-->
                <div class="modal fade" id="modalDetallesPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDePropuestaAAplicar" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="Id" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado" value="">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen" value="">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafioP" value="" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del desafio-->
                            <span id="panelParaImagenDeLaPropuestaAAplicar"></span>
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion" value="" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui colocamos el enunciado del desafio-->
                            <span id="panelParaEnunciadoDeLaPropuestaAAplicar"></span>
                            <br>

                            <table>
                                <tr>
                                    <td class="columnaInfoEnunciado"><label class="subtitulosInfo">Fecha de propuesta:</label>
                                    <td class="columnaInfoEnunciado"><input type="text" class="infoDetallePropuesta" name="fecha_propuesta" disabled></td>
                                </tr>
                            </table> 
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
                            <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalAplicarAPropuesta" title="Aplicar">Aplicar</button>
                        
                        </div>
                        </div>
                    </div>
                    </div>

                <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE LOS DESAFIOS-->
                <div class="modal fade" id="modalDetallesDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeDesafioAAplicar" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_desafio" value="">
                            <input type="hidden" id="idprofeDesafio" name="id_profesor" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_desafio" disabled>
                            <br>

                            <!--Aqui colocamos la imagen de la propuesta-->
                            <span id="panelParaImagenDelDesafio"></span>
                            <br>
                            <br>

                            <form id="seccionDatosProfesorDesafio">
                                
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
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_desafio" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo con el enunciado del desafio-->
                            <span id="panelParaBotonDescargaEnunciadoDesafio"></span>
                            <br>
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
                            <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalAplicarADesafio" title="Aplicar">Aplicar</button>

                        </div>
                        </div>
                    </div>
                </div>

                <!--ESTRUCTURA DEL POPUP PARA LA INFORMACION DE LOS EVENTOS-->
                <div class="modal fade" id="modalDetallesEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeEventoAAplicar" class="modal-body">
                            
                            <input type="hidden" id="idDesafioDetalles" name="id_evento" value="">
                            <input type="hidden" id="idprofeDesafio" name="id_usuario" value="">
                            <input type="hidden" id="nombreEnunciadoDesafDetalles" name="nombre_enunciado">
                            <input type="hidden" id="nombreImagenDesafDetalles" name="nombre_imagen">
                            
                            <input type="text" class="detalleNombrePropuesta" name="nombre_evento" disabled>
                            <br>

                            <!--Aqui colocamos la imagen del evento-->
                            <span id="panelParaImagenDelEvento"></span>
                            <br>
                            <br>

                            <form id="seccionDatosProfesorEvento">
                                
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
                            <textarea type="text" class="textAreaDetalleDescripcionPropuesta" name="descripcion_evento" disabled></textarea>
                            <br>
                            <br>

                            <!--Aqui construimos el link para la descarga del archivo con el enunciado del evento-->
                            <span id="panelParaBotonDescargaEnunciadoEvento"></span>
                            <br>
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
                            <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalAplicarAEvento" title="Aplicar">Aplicar</button>

                        </div>
                        </div>
                    </div>
                </div>


                <!--ESTRUCTURA DEL POPUP DE APLICACION A DESAFIOS PERSONALIZADOS-->
                <div class="modal fade" id="modalAplicarAPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Aplicación a Desafio personalizado</h3>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el trabajo destacado con el cual desea aplicar.</p>

                            <div class="formulario-comparitEportafolio">
                               
                                <form id="formularioModalAplicarPropuesta" action="logic/capturaDatTrabajo.php" method="POST">
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
                                    
                                    <span id="panelConfirmacionDeAplicación"></span>  

                                    <button type="submit" name="aplicarAUnaPropuesta" class="btn_agregarPropuesta" title="Aplicar">Aplicar</button>
                                    <button id="btnCerrarModalAplicarAPropuesta" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesPropuesta" title="Cerrar">Cerrar</button>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatTrabajo.php") ?>                                  
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!--ESTRUCTURA DEL POPUP DE APLICACION A DESAFIOS -->
                <div class="modal fade" id="modalAplicarADesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Aplicación a Desafio</h3>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el trabajo destacado con el cual desea aplicar.</p>

                            <div class="formulario-comparitEportafolio">
                            
                                <form id="formularioModalAplicarDesafio" action="logic/capturaDatTrabajo.php" method="POST">
                                    <input type="hidden" name="id_desafio" value="">
                                    <input type="hidden" name="idEstudiante" value="<?php echo $idEstudianteLogueado;?>"> 
                                
                                    <select class="form-control" id="cmb_trabajosDestacados" name="cmbTrabajos" required="true">
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
                                
                                    <button type="submit" name="aplicarAUnDesafio" class="btn_agregarPropuesta" title="Aplicar">Aplicar</button>
                                    <button id="btnCerrarModalAplicarAPropuesta" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesDesafio" title="Cerrar">Cerrar</button>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatTrabajo.php") ?>                                    
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>



                <!--ESTRUCTURA DEL POPUP DE APLICACION A EVENTOS -->
                <div class="modal fade" id="modalAplicarAEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Aplicación a Evento</h3>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el trabajo destacado con el cual desea aplicar.</p>

                            <div class="formulario-comparitEportafolio">
                            
                                <form id="formularioModalAplicarEvento" action="logic/capturaDatTrabajo.php" method="POST">
                                    <input type="hidden" name="id_evento" value="">
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

                                    <button type="submit" name="aplicarAUnEvento" class="btn_agregarPropuesta" title="Aplicar">Aplicar</button>
                                    <button id="btnCerrarModalAplicarAPropuesta" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesEvento" title="Cerrar">Cerrar</button>
                                </form> 
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatTrabajo.php") ?>                                   
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                               
            </main>
        </div>
<?php
}
?>
    </body>


    <!--Script que permite pasar los datos de una propuesta  a la ventana modal Aplicacion a un desafio personalizado-->
    <script type='text/javascript'>
        $(document).ready(function(){
            
            $('.btn_detallesDesafioPer').click(function(){
                
                var idPropuestaAAplicar = $(this).data('id');
            
                function getFormInfo() {
                    return new Promise((resolve, reject) => {
                        // AJAX request
                        $.ajax({
                            url: 'logic/utils/ajaxfile.php',
                            type: 'post',
                            data: {'idPropuestaAAplicar': idPropuestaAAplicar },
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
                    var modalShare = '#formularioModalAplicarPropuesta';
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

    <!--Script que permite pasar el id de una propuesta con el fin de identificar si tiene imagen almacenada o no-->
    <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesDesafioPer').click(function(){
                        
                    var idPropuestaAAplicarImagen = $(this).data('id');
                    
                    function verificacionDeImagenParaPropuestaAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaAAplicarImagen': idPropuestaAAplicarImagen},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDeLaPropuestaAAplicar').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaPropuestaAAplicar();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio personalizado con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesDesafioPer').click(function(){
                        
                    var idPropuestaAAplicarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaPropuestaAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaAAplicarEnunciado': idPropuestaAAplicarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaEnunciadoDeLaPropuestaAAplicar').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaPropuestaAAplicar();                            
                });
            });
        </script>

         <!--Script que permite traer la fecha inicio y fecha fin del desafio al que contribuye una propuesta a aplicar-->
         <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesDesafioPer').click(function(){
                    
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
                        var formId = '#formFechasDeDesafioSustituido';
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
























        <!--Script que permite pasar los datos de un desafio a la ventana modal Aplicacion a un desafio-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesDesafio').click(function(){
                    
                    var idDesafioAAplicar = $(this).data('id');
                                    
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioAAplicar': idDesafioAAplicar },
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
                        var formId = '#detallesDeDesafioAAplicar';
                        var modalShare = '#formularioModalAplicarDesafio';
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

        <!--Script que permite traer los datos del profesor al modal de un desafio a aplicar-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesDesafio').click(function(){
                    
                    var idProfesorDesafioAAplicar = $(this).data('profesor');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idProfesorDesafioAAplicar': idProfesorDesafioAAplicar },
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
                        var formId = '#seccionDatosProfesorDesafio';
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

        <!--Script que permite pasar el id de un desafio con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesDesafio').click(function(){
                        
                    var idDesafioAAplicarImagen = $(this).data('id');
                    
                    function verificacionDeImagenParaDesafioAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioAAplicarImagen': idDesafioAAplicarImagen},
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
                    
                    verificacionDeImagenParaDesafioAAplicar();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un desafio con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesDesafio').click(function(){
                        
                    var idDesafioAAplicarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaDesafioAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idDesafioAAplicarEnunciado': idDesafioAAplicarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciadoDesafio').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaDesafioAAplicar();                            
                });
            });
        </script>

        <!--Script que permite pasar los datos de un evento a la ventana modal Aplicacion a un evento-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesEvento').click(function(){
                    
                    var idEventoAAplicar = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEventoAAplicar': idEventoAAplicar },
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
                        var formId = '#detallesDeEventoAAplicar';
                        var modalShare = '#formularioModalAplicarEvento';
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

        <!--Script que permite traer los datos del profesor al modal de un evento a aplicar-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btn_detallesEvento').click(function(){
                    
                    var idProfesorEventoAAplicar = $(this).data('profesor');
                                    
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idProfesorEventoAAplicar': idProfesorEventoAAplicar },
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
                        var formId = '#seccionDatosProfesorEvento';
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

        <!--Script que permite pasar el id de un evento con el fin de identificar si tiene imagen almacenada o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesEvento').click(function(){
                        
                    var idEventoAAplicarImagen = $(this).data('id');
                    
                    function verificacionDeImagenParaEventoAAplicar() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEventoAAplicarImagen': idEventoAAplicarImagen},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaImagenDelEvento').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeImagenParaEventoAAplicar();
                            
                });
            });
        </script>

        <!--Script que permite pasar el id de un evento con el fin de identificar si tiene enunciado almacenado o no-->
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.btn_detallesEvento').click(function(){
                        
                    var idEventoAAplicarEnunciado = $(this).data('id');
                    
                    function verificacionDeEnunciadoParaEventoAAplicar() {
                        return new Promise((resolve, reject) => {
                                // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idEventoAAplicarEnunciado': idEventoAAplicarEnunciado},
                                success: function(response){
                                    resolve(response)
                                    $('#panelParaBotonDescargaEnunciadoEvento').html(response);
                                },
                                error: function (error) {
                                    reject(error)
                                },
                            });
                        })
                    }
                    
                    verificacionDeEnunciadoParaEventoAAplicar();                            
                });
            });
        </script>
    
</html>
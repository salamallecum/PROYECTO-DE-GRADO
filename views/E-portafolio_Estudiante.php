<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/TrabajoControlador.php";
require_once "logic/controllers/EstudianteControlador.php";
require_once "EportafolioService/controllers/EportafolioControlador.php";
require_once "logic/controllers/CompetenciaControlador.php";

$estudianteControla = new EstudianteControlador();
$trabajoDestControla = new TrabajoControlador();
$competenciaControla = new CompetenciaControlador();

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
                        <a class="link_menu" href="./ConvocatoriasExternas_Estudiante.php">
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
                        <span>E-portafolio</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>

                <!--ENCABEZADO DEL E-PORTAFOLIO-->                
                <div class="perfil-card">
                    
                    <div class="card-header">

                        <?php 
                        //Consultamos el estado de un eportafolio
                        $sqlEstadoEport = "SELECT DISTINCT eportafolioPublicado from tbl_eportafolio where Id_estudiante=".$idEstudianteLogueado;
                        $datosEstEport = $estudianteControla->mostrarDatosEstudiante($sqlEstadoEport);
                        foreach ($datosEstEport as $lex){
                        
                            $estadoEportafolio = $lex['eportafolioPublicado'];

                        if($estadoEportafolio == 'Si'){

                        ?>

                            <button id="btn_ocultarEportafolio" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalOcultarEportafolio" title="Ocultar E-portafolio">Ocultar e-portafolio</button>
                        <?php
                        }else{
                        ?>
                        
                            <button id="btn_publicarEportafolio" type="button" class="btn_publicarEportafolio" data-bs-toggle="modal" data-bs-target="#modalPublicarEportafolio" title="Publicar E-portafolio">Publicar e-portafolio</button>

                        <?php    
                        }}                      
                        ?>

                    </div>

                    <?php
                        //Consultamos los datos personales del estudiante para su muestreo en el panel de perfil
                        $sqlDatEstudiante = "SELECT nombres_usuario, apellidos_usuario, foto_usuario, descripcion from tbl_usuario where id_usuario=".$idEstudianteLogueado;
                        $datosEstudiante = $estudianteControla->mostrarDatosEstudiante($sqlDatEstudiante);
                        foreach ($datosEstudiante as $key){
                    ?>
                            <div class="card-user card">
                                <div class="card-image">
                                    <img class="imgEncabezadoInfoEstudiante" src="assets/images/uebAerea.jpg" alt="">
                                </div>
                                <div class="card-centerProfile">
                                    
                                    <div class="author">
                                        <a href="">
                                            
                                            <?php 
                                            //Aqui se trae la foto de perfil del estudiante
                                            $nombreDeImg = $key['foto_usuario'];

                                            if($nombreDeImg != null){

                                            ?>

                                                <img alt="..." class="avatar border-gray" src="<?php echo "profileImages/".$nombreDeImg; ?>">
                                            <?php
                                            }else{
                                            ?>
                                            
                                                <img alt="..." class="avatar border-gray" src="assets/images/imgPorDefecto.jpg">

                                            <?php    
                                            }                       
                                            ?>                                   
                                        
                                            <h5 class="nombreDelEstudiante"><?php echo $key['nombres_usuario']; ?> <?php echo $key['apellidos_usuario']; ?></h5>
                                            <br>
                                        </a>
                                        <p class="description">Perfil profesional</p>
                                        <br>
                                    </div>
                                    <p class="description-text-center"><?php echo $key['descripcion']; ?></p>
                                <br>
                                                                        
                            </div>
                    <?php
                        }

                    ?>                           
                </div>

                <!--SECCIÓN DE TRABAJOS DESTACADOS-->
                <label class="lbl-titulosEportafolio">Mis trabajos</label>
                <br>

                <!--Estructura de targeta de trabajo destacado-->
                <div class="container mt-3">
                    <div class="row">
                    
                        <!--Script para cargar datos de los trabajos destacados en cards-->      
                        <?php
                            $sql = "SELECT Id, nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where trabajoTieneBadge = 'No' and publicadoeneportafolio='Si' and Id_estudiante=".$idEstudianteLogueado;
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
                        ?>
 
                    </div>
                </div>



                <!--SECCIÓN DE INSIGNIAS-->
                <br>
                <br>
                <label class="lbl-titulosEportafolio">Mis insignias</label>
                <br>
                <br>
                <h4 class="subtitulosE-portafolio">Megainsignias obtenidas</h4>

                <?php
                    //Consultamos los datos de las megainsignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                    $sqlDatTrabDestacadosConMegaInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idEstudianteLogueado and tipo_competencia='GENERAL'";
                    $datosTrabDestacadosConMegaInsig = $trabajoDestControla->mostrarDatosTrabajosDestacados($sqlDatTrabDestacadosConMegaInsig);
                    foreach ($datosTrabDestacadosConMegaInsig as $key){

                        //Consultamos los datos de los trabajos destacados que tienen megainsignia para su muestreo en el eportafolio online
                        $sqlInfoTrabDestacadosConMegaInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id=".$key['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                        $datosTrabDestConMegaInsig = $trabajoDestControla->mostrarDatosTrabajosDestacados($sqlInfoTrabDestacadosConMegaInsig);
                        foreach ($datosTrabDestConMegaInsig as $item){
                ?>
                            <div class="cardTrabajoDestacadoConMegainsig">
                        
                                <div class="tituloTrabDestacado">
                                    <label class="lblTituloTrabajo"><?php echo $item['nombre_trabajo']; ?></label>                    
                                </div>  

                                <!--Aqui traemos el nombre del badge de la competencia general para mostrar su insignia-->
                                <?php 
                                    $nombreDeBadgeCG = $competenciaControla->consultarNombreBadgeCompGeneralParaEportafolio($key['id_competencia'], $key['tipo_badge']);
                                ?>
                                
                                <div class="alineacionCompTrabajoDestacadoConMega">
                                    <img class="megaInsigDelTrabajo" src="<?php echo 'badgesImages/'.$nombreDeBadgeCG?>">
                                </div>                                   
                                    
                            <?php 
                                //Aqui se traen las imagenes de cada trabajo destacado con megainsignia
                                $fotoDelTrabajoDestacadoConMega = $item['nombre_imagentrabajo'];
                                if($fotoDelTrabajoDestacadoConMega != null){
                            ?>
                            
                                    <div class="alineacionCompTrabajoDestacadoConMega">
                                        <img class="imagenDelTrabajoDestacadoConMegaInsig" src="<?php echo "trabajosImages/".$item['nombre_imagentrabajo']?>">    
                                    </div>

                            <?php
                                }else{
                            ?>
                                    <div class="alineacionCompTrabajoDestacadoConMega">
                                        <img class="imagenDelTrabajoDestacadoConMegaInsig" src="assets/images/imgPorDefecto.jpg">
                                    </div>
                            <?php
                                }
                            ?> 
                               
                                <div class="alineacionCompTrabajoDestacadoConMega">
                                    
                                    <table>
                                        <tr>
                                            <td><div class="descripcionTrabajoMgInsig">
                                                    <label class="tituloDescripcion">Descripción:</label>
                                                    <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                    <p class="descripcionDelTrabajoDestacadoConMegaInsig"><?php echo $item['descripcion']; ?></p>
                                            </div> </td>
                                            <td><table class="tablaDeEvidencias"> 
                                                <tr>

                                                    <?php
                                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                                        $linkDocumentoTrabConMega = $item['link_documento'];
                                                        $linkVideoTrabConMega = $item['link_video'];
                                                        $linkRepoCodigoTrabConMega = $item['link_repocodigo'];
                                                        $linkPresentacionTrabConMega = $item['link_presentacion'];

                                                        if($linkDocumentoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkDocumentoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumentoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>

                                                    <?php
                                                        }if($linkVideoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkVideoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>

                                                    <?php
                                                        }if($linkRepoCodigoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkRepoCodigoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>

                                                    <?php
                                                        }if($linkPresentacionTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkPresentacionTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacionTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>

                                                    <?php
                                                        }
                                                    ?>  

                                                </tr>
                                            </table> </td>
                                        </tr>
                                    </table>
                                   
                                </div>                          
                            </div> 
                <?php
                        }
                    }
                ?>
                

                <br>
                <br>
                <h4 class="subtitulosE-portafolio">Insignias obtenidas</h4>
                
                <?php
                    //Consultamos los datos de las insignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                    $sqlDatTrabDestacadosConInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idEstudianteLogueado and tipo_competencia='ESPECIFICA'";
                    $datosTrabDestacadosConInsig = $trabajoDestControla->mostrarDatosTrabajosDestacados($sqlDatTrabDestacadosConInsig);
                    foreach ($datosTrabDestacadosConInsig as $point){

                        //Consultamos los datos de los trabajos destacados que tienen insignia para su muestreo en el eportafolio online
                        $sqlInfoTrabDestacadosConInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id=".$point['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                        $datosTrabDestConInsig = $trabajoDestControla->mostrarDatosTrabajosDestacados($sqlInfoTrabDestacadosConInsig);
                        foreach ($datosTrabDestConInsig as $like){
                ?>
                            <div class="cardTrabajoDestacadoConInsig">
                            
                                <div class="tituloTrabDestacado">
                                    <label class="lblTituloTrabajo"><?php echo $like['nombre_trabajo']; ?></label>                    
                                </div>  
                                
                                <!--Aqui traemos el nombre del badge de la competencia especifica para mostrar su insignia-->
                                <?php 
                                    $nombreDeBadgeCE = $competenciaControla->consultarNombreBadgeCompEspecificaParaEportafolio($point['id_competencia'], $point['tipo_badge']);
                                ?>

                                <div class="alineacionCompTrabajoDestacado">
                                    <img class="insigDelTrabajo" src="<?php echo 'badgesImages/'.$nombreDeBadgeCE?>">
                                </div>

                                <?php 
                                    //Aqui se traen las imagenes de cada trabajo destacado con insignia
                                    $fotoDelTrabajoDestacadoConInsig = $like['nombre_imagentrabajo'];
                                    if($fotoDelTrabajoDestacadoConInsig != null){
                                ?>
                            
                                        <div class="alineacionCompTrabajoDestacadoConMega">
                                            <img class="imagenDelTrabajoDestacadoConInsig" src="<?php echo "trabajosImages/".$like['nombre_imagentrabajo']?>">    
                                        </div>

                                <?php
                                    }else{
                                ?>
                                        <div class="alineacionCompTrabajoDestacado">
                                            <img class="imagenDelTrabajoDestacadoConInsig" src="assets/images/imgPorDefecto.jpg">
                                        </div>
                                <?php
                                    }
                                ?>                                              
                
                                <div class="alineacionCompTrabajoDestacado">

                                    <table>
                                        <tr>
                                            <td><div class="descripcionTrabajoConInsig">
                                                <label class="tituloDescripcionTrabajoConInsig">Descripción:</label>
                                                <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                <p class="descripcionDelTrabajoDestacadoConInsig"><?php echo $like['descripcion'];?></p>
                                            </div></td>

                                            <td><table class="tablaDeEvidencias"> 
                                                <tr>

                                                    <?php
                                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo a las que esten disponibles
                                                        $linkDocumentoTrabConInsig = $like['link_documento'];
                                                        $linkVideoTrabConInsig = $like['link_video'];
                                                        $linkRepoCodigoTrabConInsig = $like['link_repocodigo'];
                                                        $linkPresentacionTrabConInsig = $like['link_presentacion'];

                                                        if($linkDocumentoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkDocumentoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumentoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>

                                                    <?php
                                                        }if($linkVideoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkVideoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>

                                                    <?php
                                                        }if($linkRepoCodigoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkRepoCodigoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>

                                                    <?php
                                                        }if($linkPresentacionTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkPresentacionTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacionTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>

                                                    <?php
                                                        }
                                                    ?>  

                                                </tr>
                                            </table></td>
                                        </tr>

                                    </table>

                                </div>                          
                            </div>   
                    <?php
                        }
                    }
                    ?>
                
                       
                <!-- ESTRUCTURA DEL POPUP PARA LA PUBLICACION DE UN EPORTAFOLIO -->
                <div class="modal fade" id="modalPublicarEportafolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Publicar e-portafolio</h3>
                        </div>
                        <form id="formularioDePublicacionEportafolio" action="EportafolioService/capturaDatEportafolio.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="IdEportafolioPublicar" value="<?php echo $idEstudianteLogueado;?>">
                                <p>¿Desea publicar su eportafolio?</p>
                            </div>
                            <div class="modal-footer">
                                <button id="PublicEport" type="submit" name="publicarEportafolio" class="btn_publicarEportafolio" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("EportafolioService/capturaDatEportafolio.php") ?>
                        </div>
                    </div>
                </div>

                <!-- ESTRUCTURA DEL POPUP PARA OCULTAR UN EPORTAFOLIO -->
                <div class="modal fade" id="modalOcultarEportafolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Ocultar e-portafolio</h3>
                        </div>
                        <form id="formularioDeOcultarEportafolio" action="EportafolioService/capturaDatEportafolio.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="IdEportafolioOcultar" value="<?php echo $idEstudianteLogueado;?>">
                                <p>¿Desea ocultar su eportafolio?</p>
                            </div>
                            <div class="modal-footer">
                                <button id="ocultEport" type="submit" name="ocultarEportafolio" class="btn_publicarEportafolio" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("EportafolioService/capturaDatEportafolio.php") ?>
                        </div>
                    </div>
                </div>

            </main>
        </div>
<?php
}
?>

    </body>
</html>
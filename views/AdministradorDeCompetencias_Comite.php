<?php
    require_once "logic/utils/Conexion.php";
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
        <script src="assets/js/dom/funcionesBasicasPopUpCompetencias.js" type="module"></script>
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
                        <span>Administrador de competencias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="card-header"> 
                    <button type="button" class="btn_agregarCompetencia" data-bs-toggle="modal" data-bs-target="#modalSeleccionarCompACrear" title="Nueva Competencia">Nueva competencia</button>              
                </div>

                <div class="main-tableEventos">
                    <br>
                    <h3 class="titulo_seccion">Competencias generales existentes </h3>
                    <br>

                    <div class="contentTablaCompetencias">
    
                        <!--ESTRUCTURA DE TABLA DE COMPETENCIAS GENERALES-->
                        <table id="table_competenciasGenerales" class="tablaDeCompetencias">
                            <thead>
                                <tr>
                                    <th class="campoTabla"></th>
                                    <th class="campoTabla">Competencia general</th>
                                    <th class="campoTabla">Rol</th>
                                    <th class="campoTabla">Badges</th>
                                    <th class="campoTabla">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                              
                            <!--Script para cargar datos en tabla de Competencias generales-->      
                            <?php
                                $obj = new CompetenciaControlador();
                                $sql = "SELECT id_comp_gral, codigo, nombre_comp_gral, rol, nombre_badgeoro, nombre_badgeplata, nombre_badgebronce from tbl_competencia_general";
                                $datos = $obj->mostrarDatosCompetencias($sql);

                                foreach ($datos as $key){
                            ?>
                                    <!--Aqui van los registros de la tabla de competencias generales-->
                                    <tr class="filasDeDatosTablaConvocatorias">
                                        <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                                        <td class="datoTabla"><?php echo $key['codigo']; ?>. <?php echo $key['nombre_comp_gral']; ?></td>
                                        <td class="datoTabla"><?php echo $key['rol'];?></td>
                                        
                                        <?php 
                                            //Aqui se traen las imagenes de cada badge de la competencia
                                            $nombreBadgeOroCompGeneral = $key['nombre_badgeoro'];
                                            $nombreBadgePlataCompGeneral = $key['nombre_badgeplata'];
                                            $nombreBadgeBronceCompGeneral = $key['nombre_badgebronce'];

                                            if($nombreBadgeOroCompGeneral != null && $nombreBadgePlataCompGeneral != null && $nombreBadgeBronceCompGeneral != null
                                            ){

                                            ?>

                                                <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgeOroCompGeneral?>'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgePlataCompGeneral?>'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgeBronceCompGeneral?>'></td>

                                            <?php
                                            }else{
                                            ?>
                                            
                                            <td class="datoTabla"><img src="assets/images/badge_prueba muestreo.png" alt=""><img src="assets/images/badge_prueba muestreo.png" alt=""><img src="assets/images/badge_prueba muestreo.png" alt=""></td> 

                                        <?php    
                                        }                       
                                        ?>

                                        <td class="datoTabla"><div class="compEsp-edicion">
                                            <div class="col-botonesEdicion">
                                                <a class="btnEditarCompGeneral" data-id="<?php echo $key['id_comp_gral'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarCompetenciaGeneral" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                            </div>
            
                                            <div class="col-botonesEdicion">
                                               <a class="btnEliminarCompGeneral" data-id="<?php echo $key['id_comp_gral'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarCompetenciaGeneral" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                            </div>
                                        </div></td>
                                    </tr>
                            
                            <?php
                                }
                            ?>                          
                                   
                            </tbody>   
    
                        </table>  
                    </div>

                    <br>
                    <br>
                    <h3 class="titulo_seccion">Competencias específicas existentes </h3>
                    <br>
                    

                    <div class="contentTablaCompetencias">
    
                        <!--ESTRUCTURA DE TABLA DE COMPETENCIAS ESPECIFICAS-->
                        <table id="table_competenciasGenerales" class="tablaDeCompetencias">
                            <thead>
                                <tr>
                                    <th class="campoTabla"></th>
                                    <th class="campoTabla">Competencia específica</th>
                                    <th class="campoTabla">Rol</th>
                                    <th class="campoTabla">Badges</th>
                                    <th class="campoTabla">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                              
                            <!--Script para cargar datos en tabla de Competencias especificas-->      
                            <?php
                                $obj = new CompetenciaControlador();
                                $sql = "SELECT id_comp_esp, codigo, nombre_competencia_esp, rol, nombre_badgeoro, nombre_badgeplata, nombre_badgebronce from tbl_competencia_especifica";
                                $datos = $obj->mostrarDatosCompetencias($sql);

                                foreach ($datos as $key){
                            ?>
                                    <!--Aqui van los registros de la tabla de competencias especificas-->
                                    <tr class="filasDeDatosTablaConvocatorias">
                                        <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/imgPorDefecto.jpg"></td>
                                        <td class="datoTabla"><?php echo $key['codigo']; ?>. <?php echo $key['nombre_competencia_esp']; ?></td>
                                        <td class="datoTabla"><?php echo $key['rol'];?></td>
                                        
                                        <?php 
                                            //Aqui se traen las imagenes de cada badge de la competencia
                                            $nombreBadgeOroCompEsp = $key['nombre_badgeoro'];
                                            $nombreBadgePlataCompEsp = $key['nombre_badgeplata'];
                                            $nombreBadgeBronceCompEsp = $key['nombre_badgebronce'];

                                            if($nombreBadgeOroCompEsp != null || $nombreBadgePlataCompEsp != null || $nombreBadgeBronceCompEsp != null){

                                            ?>

                                                <td class='datoTabla'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgeOroCompEsp?>'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgePlataCompEsp?>'><img class='imagenDelEventoEnTabla'src='<?php echo "badgesImages/".$nombreBadgeBronceCompEsp?>'></td>

                                            <?php
                                            }else{
                                            ?>
                                            
                                            <td class="datoTabla"><img src="assets/images/badge_prueba muestreo.png" alt=""><img src="assets/images/badge_prueba muestreo.png" alt=""><img src="assets/images/badge_prueba muestreo.png" alt=""></td> 

                                        <?php    
                                        }                       
                                        ?>
                                        
                                        <td class="datoTabla"><div class="compEsp-edicion">
                                            <div class="col-botonesEdicion">
                                                <a class="btnEditarCompEspecifica" data-id="<?php echo $key['id_comp_esp'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarCompetenciaEspecifica" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                            </div>
            
                                            <div class="col-botonesEdicion">
                                                <a class="btnEliminarCompEspecifica" data-id="<?php echo $key['id_comp_esp'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarCompetenciaEspecifica" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
                                            </div>
                                        </div></td>
                                    </tr>
                            
                            <?php
                                }
                            ?>
                             
                            </tbody>   
    
                        </table>   
                    
                    </div>

                </div>


                













































            
                    <!--ESTRUCTURA DEL POPUP PARA ELEGIR EL TIPO DE COMPETENCIA A CREAR-->
                    <div class="modal fade" id="modalSeleccionarCompACrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva competencia</h3>
                        </div>
                        <div class="modal-body">
                            
                            <br>
                            <button type="button" class="btn_agregarCompetencia" data-bs-toggle="modal" data-bs-target="#modalRegistroCompGeneral" title="Competencia general">Competencia general</button>
                            <button type="button" class="btn_agregarCompetencia" data-bs-toggle="modal" data-bs-target="#modalRegistroCompEspecifica" title="Competencia específica">Competencia específica</button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS GENERALES-->
                    <div class="modal fade" id="modalRegistroCompGeneral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva competencia general</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeRegistroDeCompetenciasGenerales" action="logic/capturaDatCompetencia.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td class="column-form-codigoCompetenciaGeneral">
                                            <label class="camposFormulario">Código</label>
                                            <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="N">N</option>
                                                <option value="Ñ">Ñ</option>
                                                <option value="O">O</option>
                                                <option value="P">P</option>
                                                <option value="Q">Q</option>
                                                <option value="R">R</option>
                                                <option value="S">S</option>
                                                <option value="T">T</option>
                                                <option value="U">U</option>
                                                <option value="V">V</option>
                                                <option value="W">W</option>
                                                <option value="X">X</option>
                                                <option value="Y">Y</option>
                                                <option value="Z">Z</option>
                                            </select>
                                        </td>

                                        <td class="column-form-rolCompGeneral">
                                            <label class="camposFormulario">Rol al que contribuye</label><br>
                                            <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="noble">Noble lider</option>
                                                <option value="virtuoso">Virtuoso tecnológico</option>
                                                <option value="maestro">Maestro de los procesos</option>
                                                <option value="explorador">Explorador</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                    
                                <label class="camposFormulario">Descripción</label><br>
                                <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" maxlength="200" placeholder="" type="text" class="form-control" required="true">
                                <br>  
    
                                <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control" required="true">
                                <br>

                                <br>

                                <button type="submit" name="guardarCompetenciaGeneral" id="btn_guardarCompGeneral"  class="btn_agregarCompetencia" title="Guardar">Guardar</button>                                    
                                <button id="btnCancelarRegistroCompGen" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatCompetencia.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA GENERAL-->
                    <div class="modal fade" id="modalEditarCompetenciaGeneral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar competencia general</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeActualizacionDeCompetenciasGenerales" action="logic/capturaDatCompetencia.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" id="idCompGeneralAEditar" name="id_comp_gral" value="">
                                <table>
                                    <tr>
                                        <td class="column-form-codigoCompetenciaGeneral">
                                            <label class="camposFormulario">Código</label>
                                            <select class="form-control" id="cmb_codigoCompGeneralAEditar" name="codigo" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="N">N</option>
                                                <option value="Ñ">Ñ</option>
                                                <option value="O">O</option>
                                                <option value="P">P</option>
                                                <option value="Q">Q</option>
                                                <option value="R">R</option>
                                                <option value="S">S</option>
                                                <option value="T">T</option>
                                                <option value="U">U</option>
                                                <option value="V">V</option>
                                                <option value="W">W</option>
                                                <option value="X">X</option>
                                                <option value="Y">Y</option>
                                                <option value="Z">Z</option>
                                            </select>
                                        </td>

                                        <td class="column-form-rolCompGeneral">
                                            <label class="camposFormulario">Rol al que contribuye</label><br>
                                            <select class="form-control" id="cmb_rolAEditar" name="rol" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="Noble lider">Noble lider</option>
                                                <option value="virtuoso tecnológico">Virtuoso tecnológico</option>
                                                <option value="Maestro de los procesos">Maestro de los procesos</option>
                                                <option value="Explorador">Explorador</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                    
                                <label class="camposFormulario">Descripción</label><br>
                                <input id="descCompGeneralAEditar" name="nombre_comp_gral" maxlength="200" placeholder="" type="text" class="form-control" required="true">
                                <br>  

                                <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                <input id="img_insigOroCompGeneralEdit" name="img_insigOroCompGeneralEdit" accept=".jpeg, .jpg, .png, .svg" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                <input id="img_insigPlataCompGeneralEdit" name="img_insigPlataCompGeneralEdit" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                <input id="img_insigBronceCompGeneralEdit" name="img_insigBronceCompGeneralEdit" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                <br>
                                <br>

                                <button type="submit" id="btn_actualizarCompGeneral" name="actualizarCompetenciaGeneral" class="btn_agregarCompetencia" title="Actualizar competencia">Actualizar</button> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatCompetencia.php") ?>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UNA COMPETENCIA GENERAL -->
                    <div class="modal fade" id="modalEliminarCompetenciaGeneral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar competencia general</h3>
                        </div>
                        <form id="formularioDeEliminacionDeCompetenciasGenerales" action="logic/capturaDatCompetencia.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id_comp_gral" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarCompetenciaGeneral" class="btn_agregarCompetencia" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatCompetencia.php") ?>
                        </div>
                    </div>
                    </div>








                  






























            
                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS ESPECIFICAS-->
                    <div class="modal fade" id="modalRegistroCompEspecifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva competencia específica</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeRegistroDeCompetenciasEspecificas" action="logic/capturaDatCompetencia.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td class="column-form-codigoCompetenciaGeneral">
                                            <label class="camposFormulario">Código</label>
                                            <input id="txt_codigoCompEspecífic" name="txtCodigoCompEspecífic" maxlength="4" placeholder="" type="text" class="form-control" required="true">
                                        </td>

                                        <td class="column-form-rolCompGeneral">
                                            <label class="camposFormulario">Rol al que contribuye</label><br>
                                            <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandoraEsp" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="noble">Noble lider</option>
                                                <option value="virtuoso">Virtuoso tecnológico</option>
                                                <option value="maestro">Maestro de los procesos</option>
                                                <option value="explorador">Explorador</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                                <label class="camposFormulario">Competencia general a la que pertenece</label><br>
                                <select class="form-control" id="cmb_rolesPandora" name="cmbCompetenciasGenerales" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new CompetenciaControlador();
                                        $sql = "SELECT id_comp_gral, codigo, nombre_comp_gral FROM tbl_competencia_general";
                                        $datos = $obj->mostrarDatosCompetencias($sql);

                                        foreach ($datos as $key){
                                    ?>

                                            <option value="<?php echo $key['id_comp_gral']?>"><?php echo $key['codigo'].'. '?><?php echo $key['nombre_comp_gral']?></option>

                                    <?php
                                        }
                                    ?>

                                </select>
                        
                                <label class="camposFormulario">Descripción</label><br>
                                <input id="txt_descCompGeneral" name="descripcionCompetenciaEspecifica" maxlength="400" placeholder="" type="text" class="form-control" required="true">
                                <br>  
    
                                <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompEsp" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompEsp" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompEsp" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control" required="true">
                                <br>
                                <br>

                                <button type="submit" name="guardarCompetenciaEspecifica" id="btn_guardarCompEspecifica"  class="btn_agregarCompetencia" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroCompEsp" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatCompetencia.php") ?>
                            
                        </div>
                        </div>
                    </div>
                    </div>  
                                 
                     
                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA ESPECÍFICA-->
                    <div class="modal fade" id="modalEditarCompetenciaEspecifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar competencia específica</h3>
                        </div>
                        <div class="modal-body">

                            <form id="formularioDeActualizacionDeCompetenciasEspecificas" action="logic/capturaDatCompetencia.php" method="POST" enctype="multipart/form-data">
                                    
                                <input type="hidden" name="id_comp_esp" value="">
                                <table>
                                    <tr>
                                        <td class="column-form-codigoCompetenciaGeneral">
                                            <label class="camposFormulario">Código</label>
                                            <input id="txt_codigoCompEspecífic" name="codigo" maxlength="4" placeholder="" type="text" class="form-control" required="true">
                                        </td>

                                        <td class="column-form-rolCompGeneral">
                                            <label class="camposFormulario">Rol al que contribuye</label><br>
                                            <select class="form-control" id="cmb_rolesPandora" name="rol" required="true">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="Noble lider">Noble lider</option>
                                                <option value="Virtuoso tecnologico">Virtuoso tecnológico</option>
                                                <option value="Maestro de los procesos">Maestro de los procesos</option>
                                                <option value="Explorador">Explorador</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                                <label class="camposFormulario">Competencia general a la que pertenece</label><br>
                                <select class="form-control" id="cmb_rolesPandora" name="id_comp_gral" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new CompetenciaControlador();
                                        $sql = "SELECT id_comp_gral, codigo, nombre_comp_gral FROM tbl_competencia_general";
                                        $datos = $obj->mostrarDatosCompetencias($sql);

                                        foreach ($datos as $key){
                                    ?>

                                            <option value="<?php echo $key['id_comp_gral']?>"><?php echo $key['codigo'].'. '?><?php echo $key['nombre_comp_gral']?></option>

                                    <?php
                                        }
                                    ?>

                                </select>
                        
                                <label class="camposFormulario">Descripción</label><br>
                                <input id="txt_descCompGeneral" name="nombre_competencia_esp" maxlength="400" placeholder="" type="text" class="form-control">
                                <br>  
    
                                <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompEspEdit" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompEspEdit" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                <br>

                                <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompEspEdit" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                <br>
                                <br>

                                <button type="submit" name="actualizarCompetenciaEspecifica" class="btn_agregarCompetencia" title="Actualizar">Actualizar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatCompetencia.php") ?>
                            
                        </div>
                        </div>
                    </div>
                    </div>   
                    
                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UNA COMPETENCIA ESPECIFICA -->
                    <div class="modal fade" id="modalEliminarCompetenciaEspecifica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar competencia específica</h3>
                        </div>
                        <form id="formularioDeEliminacionDeCompetenciasEspecificas" action="logic/capturaDatCompetencia.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id_comp_esp" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarCompetenciaEspecifica" class="btn_agregarCompetencia" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatCompetencia.php") ?>
                        </div>
                    </div>
                    </div>
  
            </main>
        </div>

        <!--Script que permite pasar los datos de una competencia general y competencia especifica desde la BD a su ventana modal de edicion correspondiente-->
        <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la competencia general
            $(document).ready(function(){
                
                $('.btnEditarCompGeneral').click(function(){
                    console.log("here")
                    
                    var idCompetenciaGralEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idCompetenciaGralEdit: idCompetenciaGralEdit},
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
                        var formId = '#formularioDeActualizacionDeCompetenciasGenerales';
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

            //Aqui se pasan los datos para el caso de la competencia específica
            $(document).ready(function(){
                
                $('.btnEditarCompEspecifica').click(function(){
                    console.log("here")
                    
                    var idCompetenciaEspEdit = $(this).data('id');
                    console.log(idCompetenciaEspEdit)
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idCompetenciaEspEdit: idCompetenciaEspEdit},
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
                        console.log(data);
                        var formId = '#formularioDeActualizacionDeCompetenciasEspecificas';
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

        <!--Script que permite pasar los datos de una competencia general y competencia especifica desde la BD a su ventana modal de eliminacion correspondiente-->
        <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la competencia general
            $(document).ready(function(){
                
                $('.btnEliminarCompGeneral').click(function(){
                    console.log("here")
                    
                    var idCompetenciaGralElim = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idCompetenciaGralElim: idCompetenciaGralElim},
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
                        var formId = '#formularioDeEliminacionDeCompetenciasGenerales';
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

            //Aqui se pasan los datos para el caso de la competencia específica
            $(document).ready(function(){
                
                $('.btnEliminarCompEspecifica').click(function(){
                    console.log("here")
                    
                    var idCompetenciaEspElim = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idCompetenciaEspElim: idCompetenciaEspElim},
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
                        var formId = '#formularioDeEliminacionDeCompetenciasEspecificas';
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

    </body>
</html>
<!--IMPORTANTE-->
<!--Los botones que tienen la palabra openModal, modal-container o btn_cancelar como nombre o id, son botones de navegación y por lo tanto no se deben tocar porque si función es interactiva-->
<!-- Los botones o componentes que tienen el prefijo lbl_ , txt_, date_ o btn_ son los que tu programas porque requieren manejo de datos con el backend-->
<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/CompetenciaControlador.php";
    

    //Capturamos la variable id de la competencia general y el id de la competencia específica
    if(isset($_GET['idCompGen'])){
        $idCompetenciaGeneral = $_GET['IdCompGen'];

        if($idCompetenciaGeneral > 0){
        
            $objCompetencia = new CompetenciaControlador();
    
            if($objCompetencia->eliminarCompetenciaGeneral($idCompetenciaGeneral) == 1){}
        }
    }

    if(isset($_GET['idCompEsp'])){
        $idCompetenciaEspecifica = $_GET['IdCompEsp'];

        if($idCompetenciaEspecifica > 0){
        
            $objCompetencia = new CompetenciaControlador();
    
            if($objCompetencia->eliminarCompetenciaEspecifica($idCompetenciaEspecifica) == 1){}
        }
    }
        
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/ComiteStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

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
                    <span>PANDORA</span>
                </h3>
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Comite.php">
                            <span><i class="ti-dashboard" title="Dashboard"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./RegistroDeProfesores_Comite.php">
                            <span class="ti-user" title="Profesores"></span>
                            <span class="items_menu">PROFESORES</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeMaterias_Comite.php">
                            <span class="ti-clipboard" title="Materias"></span>
                            <span class="items_menu">MATERIAS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeCompetencias_Comite.php">
                            <span class="ti-archive" title="Competencias"></span>
                            <span class="items_menu">COMP.PROGRAMA</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeEventos_Comite.php?Id=0">
                            <span class="ti-flag" title="Eventos"></span>
                            <span class="items_menu">EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Comite.php">
                            <span class="ti-hand-point-up" title="Convocatorias"></span>
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
                    <a id="openModal" class="btn_agregarCompetencia" title="Nueva Competencia">Nueva competencia</a>                   
                </div>

                <div class="main-tableEventos">
                    <br>
                    <h3 class="titulo_seccion">Competencias generales existentes </h3>
                    <br>
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
                                                <a name="openModa5" href="" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                            </div>
            
                                            <div class="col-botonesEdicion">
                                               <a href="?IdCompGen=<?php echo $key['id_comp_gral'] ?>" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
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

                                            if($nombreBadgeOroCompEsp != null && $nombreBadgePlataCompEsp != null && $nombreBadgeBronceCompEsp != null){

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
                                                <a name="openModa5" href="" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                            </div>
            
                                            <div class="col-botonesEdicion">
                                                <a href="?IdCompEsp=<?php echo $key['id_comp_esp'] ?>" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>
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
                    <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva competencia</h3>
                            <br>
                            <a id="openModal1" class="btn_agregarCompetencia" title="Competencia general">Competencia general</a>
                            <a id="openModal2" class="btn_agregarCompetencia" title="Competencia específica">Competencia específica</a>
                            <br>
                            <br>
                            <a id="btn_cancelar" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                        </div>
                    </div>


                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS GENERALES-->
                    <div id="modal_container1" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Competencia general</h3>
                            <br>
                            
                            <div class="formulario-registroCompetencia">
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
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control" required="true">
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
                                    <a id="btn_cancelar1" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatCompetencia.php") ?>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA GENERAL-->
                    <div id="modal_container5" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Competencia general</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales">
                                                    <option value="" selected>Seleccione</option>
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
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                        
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompGeneral"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>

                                    <a id="btn_actualizarCompetenciaGeneral" name="actualizarCompetencia" class="btn_agregarCompetencia" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar5" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
            
                    




















                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE COMPETENCIAS ESPECIFICAS-->
                    <div id="modal_container2" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Nueva Competencia específica</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form id="formularioDeRegistroDeCompetenciasEspecificas" action="logic/capturaDatCompetencia.php" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <input id="txt_codigoCompEspecífic" name="txtCodigoCompEspecífic" placeholder="" type="text" class="form-control" required="true">
                                            </td>
    
                                            <td class="column-form-rolCompGeneral">
                                                <label class="camposFormulario">Rol al que contribuye</label><br>
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandoraEsp" required="true">
                                                    <option value="seleccione" selected>Seleccione</option>
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
                                        <option value="seleccione" selected>Seleccione</option>

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
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaEspecifica" placeholder="" type="text" class="form-control" required="true">
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
                                    <a id="btn_cancelar2" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                                <!--Incluimos el archivo con la logica del formulario-->
                                <?php include("logic/capturaDatCompetencia.php") ?>
                            </div>
                        </div>
                    </div> 
                    
                    
                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE COMPETENCIA ESPECÍFICA-->
                    <div id="modal_container6" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Actualizar Competencia específica</h3>
                            <br>
                            
                            <div class="formulario-registroTrabDestacado">
                                <form class="">
                                    <table>
                                        <tr>
                                            <td class="column-form-codigoCompetenciaGeneral">
                                                <label class="camposFormulario">Código</label>
                                                <select class="form-control" id="cmb_codigosCompetenciasGenerales" name="cmbCodigosCompGenerales">
                                                    <option value="" selected>Seleccione</option>
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
                                                <select class="form-control" id="cmb_rolesPandora" name="cmbRolesPandora">
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="obligatoria">Noble lider</option>
                                                    <option value="electiva">Virtuoso tecnológico</option>
                                                    <option value="obligatoria">Maestro de los procesos</option>
                                                    <option value="obligatoria">Explorador</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                        
                                    <label class="camposFormulario">Descripción</label><br>
                                    <input id="txt_descCompGeneral" name="descripcionCompetenciaGeneral" placeholder="" type="text" class="form-control">
                                    <br>  
      
                                    <label class="camposFormulario">Cargue Imagen del Badge de Oro (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaOroCompGeneral" name="img_insigOroCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Plata (formato svg)</label><br>
                                    <input  id="btn_imgInsigniaPlataCompGeneral" name="img_insigPlataCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>
    
                                    <label class="camposFormulario">Cargue Imagen del Badge de Bronce (formato svg)</label><br>
                                    <input id="btn_imgInsigniaBronceCompGeneral" name="img_insigBronceCompGeneral" accept=".jpeg, .jpg, .png, .svg" type="file" id="foto" class="form-control">
                                    <br>

                                    <table>
                                        <tr>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td><!--La imagen debe ser de 96 x 96px como máximo -->
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                            <td class="columnaImgInsignia"><label id="lbl_imgInsigniaOroCompEspecific"><img src="assets/images/badge_prueba muestreo.png" alt=""></label></td>
                                        </tr>
                                    </table>
                                    <br>
    
                                    <a id="btn_actualizarCompetenciaEspecifica" name="actualizarCompetencia" class="btn_agregarCompetencia" title="Actualizar">Actualizar</a>
                                    <a id="btn_cancelar6" class="btn_agregarCompetencia" title="Cancelar">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
            </main>
        </div>
    </body>
</html>
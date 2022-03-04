
<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/ConvocatoriaControlador.php";

    $objConvocatoriaControla = new ConvocatoriaControlador();
    
    //Capturamos la variable id de la convocatoria para la eliminacion de la misma
    if(isset($_GET['Id'])){
        $idConvocatoria = $_GET['Id'];

        if($idConvocatoria > 0){           

            if($objConvocatoriaControla->eliminarConvocatoriaPracticas($idConvocatoria) == 1){}
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
        
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/PracticasStyles.css">        

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpConvocatorias_Practicas.js" type="module"></script>
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
                <ul class="menuPracticas">
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Practicas.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Practicas.php">
                            <span title="Convocatorias"><i class="bi bi-hand-index"></i></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="./AdministradorDeEportafolios_Practicas.php">
                            <span title="E-portafolios"><i class="bi bi-archive"></i></span>
                            <span class="items_menu">E-PORTAFOLIOS</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-content">

            <header>
                
                <div class="social-icons">
                    <div class="titulo-dash">
                        <span>Administrador de convocatorias externas</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                <div class="card-header">
                    <button type="button" class="btn_agregarConvocatoria" data-bs-toggle="modal" data-bs-target="#modalRegistrarConvocatoria" title="Nueva Convocatoria">Nueva convocatoria</button>                   
                </div>

                <div class="main-tableEventos">
                   <br>
                    <h3 class="titulo_seccion">Convocatorias existentes </h3>
                    
                    <!--ESTRUCTURA DE TABLA DE CONVOCATORIAS-->
                    <table id="table_eventos" class="tablaDeConvocatorias">
                        <thead>
                            <tr>
                                <th class="campoTabla">Imagen</th>
                                <th class="campoTabla">Nombre convocatoria</th>
                                <th class="campoTabla">Descripción</th>
                                <th class="campoTabla">Fecha inicio</th>
                                <th class="campoTabla">Fecha fin</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!--Script para cargar datos en tabla de Convocatorias-->      
                        <?php
                            $obj = new ConvocatoriaControlador();
                            $sql = "SELECT Id, nombre_convocatoria, descripcion, fecha_inicio, fecha_fin, nombre_imagen from tbl_convocatoriapracticas";
                            $datos = $obj->mostrarDatosConvocatorias($sql);
                            foreach ($datos as $key){
                        ?>
                                <!--Aqui van los registros de la tabla de convocatorias-->
                                <tr class="filasDeDatosTablaConvocatorias">
                                    <?php 
                                    //Aqui se traen las imagenes de cada convocatoria
                                    $nombreDeImg = $key['nombre_imagen'];

                                    if($nombreDeImg != null){

                                    ?>

                                        <td class='datoTabla'><img class='imagenDeConvocatoriaEnTabla'src='<?php echo "convocatoriasImages/".$nombreDeImg?>'></td>

                                    <?php
                                    }else{
                                    ?>
                                    
                                        <td class='datoTabla'><img class='imagenDeConvocatoriaEnTabla'src='assets/images/imgPorDefecto.jpg'></td> 

                                    <?php    
                                    }                       
                                    ?>
                                            
                                    <td class="datoTabla"><input type="hidden" name="nombreEventoSeleccionado" value="<?php echo $key['nombre_convocatoria'];?>"><?php echo $key['nombre_convocatoria'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="descripcionEventoSeleccionado" value="<?php echo $key['descripcion'];?>"><?php echo $key['descripcion'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="fechaIniEventoSeleccionado" value="<?php echo $key['fecha_inicio'];?>"><?php echo $key['fecha_inicio'];  ?></td>
                                    <td class="datoTabla"><input type="hidden" name="fechaFinEventoSeleccionado" value="<?php echo $key['fecha_fin'];?>"><?php echo $key['fecha_fin'];  ?></td>
                                    <td class="datoTabla"><div class="compEsp-edicion">
                                        <div class="col-botonesEdicion">
                                            <a class="btnDetallesConvPracticas" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalDetallesConvocatoria" title="Ver convocatoria"><img src="assets/images/verDetallesActividad.png"></a>
                                        </div>

                                        <div class="col-botonesEdicion">
                                            <a class="btnEditarConvPracticas" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarConvocatoria" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                        </div>

                                        <div class="col-botonesEdicion">
                                        <a class="btnEliminarConvPracticas" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarConvocatoria" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>    
                                        </div>
                                    
                                    </div></td> 
                                                                    
                                </tr>    
                        <?php
                            }
                        ?>

                        </tbody>                      
                    </table>

                    <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE CONVOCATORIAS-->
                    <div class="modal fade" id="modalRegistrarConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva Convocatoria</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeRegistroDeConvocatorias_Practicas" action="logic/capturaDatConvocatoria.php" method="POST" enctype="multipart/form-data">

                                <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                <input name="nombreConvocatoriaExt" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcionConvocatoriaExt" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                <input  id="btn_cargaArchivoInfoDeConvocatoriaExt" name="archivoInfoDeConvocatoriaExt" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="dateFechaInicioConvocatoriaExt" name="dateFechaInicioConvocatoriaExt" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="dateFechaFinConvocatoriaExt" name="dateFechaFinConvocatoriaExt" class="form-control" min="2000-01-01" max="2040-12-31" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoriaExt" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>   
                                <br>   
                                
                                <button type="submit" name="guardarConvocatoriaPracticas" class="btn_agregarConvocatoria" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroConvPracticas" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatConvocatoria.php") ?>                         

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA EL DETALLE DE LA CONVOCATORIA-->
                    <div class="modal fade" id="modalDetallesConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        
                        <div id="detallesDeConvocatorias_Practicas" class="modal-body">
                            
                            <input type="hidden" id="idConvEdit" name="Id" value="">                           
                            
                            <input type="text" class="detalleNombreConvocatoria" name="nombre_convocatoria" value="" disabled>
                            <br>

                            <img class="imgConvocatoriaDetalle" src="assets/images/imgPorDefecto.jpg" alt="">
                            <br>
                            <br>
                                                            
                            <label class="subtitulosInfo">Descripción</label><br>
                            <textarea type="text" class="textAreaDetalleDescripcionConv" name="descripcion" value="" disabled></textarea>
                            <br>
                            <br>

                            <table>
                                <tr>
                                    <td> <label class="subtitulosInfo">Fecha inicio</label><br>
                                    <input type="text" class="infoDetalleConvEdit" name="fecha_inicio" value="" disabled></td>

                                    <td><label class="subtitulosInfo">Fecha fin</label><br>
                                    <input type="text" class="infoDetalleConvEdit" name="fecha_fin" value="" disabled></td>
                                </tr>
                            </table>                           
                            <br>

                            <button type="submit" name="actualizarConvocatoriaPracticas" class="btn_agregarConvocatoria" title="Desacargar enunciado">Enunciado</button>
                            <br>
                            <br>

                            <div class="panel-trabDesacadosEInsignias">
                                
                                <label class="subtitulosInfo">E-portafolios postulados</label><br>
                                
                                <div class="pnlTabla-eportafolios">

                                    <!--ESTRUCTURA DE TABLA DE EPORTAFOLIOS-->
                                    <table id="table_eportafoliosPostuladosConv" class="tablaDeEportafoliosPostuladosConv">
                                        <thead>
                                            <tr>
                                                <th class="campoTabla">Foto</th>
                                                <th class="campoTabla">Nombres</th>
                                                <th class="campoTabla">Apellidos</th>
                                                <th class="campoTabla">Acciones</th>
                                            </tr>
                                        </thead>

                                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                                        <tr class="filasDeDatosTablaEportafolios">
                                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                                            <td class="datoTabla">LUIS ALEJANDRO</td>
                                            <td class="datoTabla">AMAYA TORRES</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a name="openModal5" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                </div>

                                            </div></td>
                                        </tr>

                                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                                        <tr class="filasDeDatosTablaEportafolios">
                                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                                            <td class="datoTabla">LUIS ALEJANDRO</td>
                                            <td class="datoTabla">AMAYA TORRES</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a name="openModal5" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                </div>

                                            </div></td>
                                        </tr>

                                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                                        <tr class="filasDeDatosTablaEportafolios">
                                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                                            <td class="datoTabla">LUIS ALEJANDRO</td>
                                            <td class="datoTabla">AMAYA TORRES</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a name="openModal5" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                </div>

                                            </div></td>
                                        </tr>

                                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                                        <tr class="filasDeDatosTablaEportafolios">
                                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                                            <td class="datoTabla">LUIS ALEJANDRO</td>
                                            <td class="datoTabla">AMAYA TORRES</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a name="openModal5" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                </div>

                                            </div></td>
                                        </tr>

                                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                                        <tr class="filasDeDatosTablaEportafolios">
                                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                                            <td class="datoTabla">LUIS ALEJANDRO</td>
                                            <td class="datoTabla">AMAYA TORRES</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a name="" href="template_Eportafolio.php" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a name="openModal5" href="" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>
                                                </div>

                                            </div></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <br>        

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Atrás">Atrás</button>

                        </div>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACIÓN DE CONVOCATORIAS-->
                    <div class="modal fade" id="modalEditarConvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar Convocatoria</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeActualizacionDeConvocatorias_Practicas" action="logic/capturaDatConvocatoria.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="Id" value=""> 

                                <label class="camposFormulario">Nombre de la convocatoria</label><br>
                                <input name="nombre_convocatoria" placeholder="" type="text" class="form-control" value="" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion" cols="80" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de convocatoria</label><br>
                                <input  id="btn_cargaArchivoInfoDeConvocatoria" name="archivoInfoDeConvocatoriaExtEdit" accept=".pdf" type="file" class="form-control">
                                <br>

                                <!--Espacio para colocar campos tipo calendar-->
                                <table>
                                    <tr>
                                        <td><label class="camposFormulario">Fecha inicio</label>
                                            <input type="date" id="dateFechaInicioConvocatoriaExt" name="fecha_inicio" class="form-control" min="2000-01-01" max="2040-12-31" value=""></td>
                                            
                                            <td><label class="camposFormulario">Fecha fin</label><br>
                                            <input type="date" id="dateFechaFinConvocatoriaExt" name="fecha_fin" class="form-control" min="2000-01-01" max="2040-12-31" value="" required="true"></td>
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la convocatoria</label><br>
                                <input  id="btn_imgParaConvocatoria" name="imgParaConvocatoriaExtEdit" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br> 
                                
                                <button type="submit" name="actualizarConvocatoriaPracticas" class="btn_agregarConvocatoria" title="Actualizar">Actualizar</button>
                                <button id="btnCancelarRegistroConvPracticas" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                                                                       
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatConvocatoria.php") ?>            
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- ESTRUCTURA DEL POPUP PARA LA ELIMINACION DE UNA CONVOCATORIA -->
                    <div class="modal fade" id="modalEliminarConvocatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Eliminar convocatoria</h3>
                        </div>
                        <form id="formularioDeEliminacionDeConvocatorias" action="logic/capturaDatConvocatoria.php"  method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="Id" value="">
                                <p>¿Esta seguro que desea eliminar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="eliminarConvPracticas" class="btn_agregarConvocatoria" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatConvocatoria.php") ?>
                        </div>
                    </div>
                    </div>

                    <!--ESTRUCTURA DEL POPUP PARA COMPARTIR UN E-PORTAFOLIO-->
                    <div id="modal_container5" class="modal_container" name="modal_container">
                            <div class="modal">
                                <h3 class="titulo_seccion">Compartir E-portafolio</h3>
                                <br>
                                <p>Ingrese el correo electrónico del usuario con el que desea compartir este e-portafolio.</p>
                                <br>

                                <div class="formulario-comparitEportafolio">
                                    <form id="formularioParaCompartirEportafolio" action="logic/capturaDatEportafolio.php" method="POST">
                                        <label class="camposFormulario">Correo electrónico</label>
                                        <input name="correoDestino" placeholder="" type="email" class="form-control" required="true">
                                        <br>
                                        <br>
                                        <br>
                                        <button type="submit" name="enviarEportafolio" class="btn_agregarConvocatoria" title="Enviar E-portafolio">Enviar</button>
                                        <a id="btn_cancelar5" class="btn_agregarConvocatoria" title="Cerrar">Cerrar</a>
                                    </form>
                                    <!--Incluimos el archivo con la logica del formulario-->
                                    <?php include("logic/capturaDatEportafolio.php") ?>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </main>
        </div>

        <script>
            function cambiarAMayuscula(elemento){
                let texto = elemento.value;
                elemento.value = texto.toUpperCase();
            }            

        </script>

        <!--Script que permite pasar los datos de una convocatoria a la ventana modal de detalles y edicion de la misma-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnDetallesConvPracticas').click(function(){
                    console.log("here")
                    
                    var idConvPracticasEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idConvPracticasEdit: idConvPracticasEdit},
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
                        var formId = '#detallesDeConvocatorias_Practicas';
                        $.each(data, function(key, value){
                            $('[name='+key+']', formId).val(value);
                        });
                    })
                    .catch((error) => {
                        console.log(error)
                    })
                        
                });
            });

            $(document).ready(function(){
                
                $('.btnEditarConvPracticas').click(function(){
                    console.log("here")
                    
                    var idConvPracticasEdit = $(this).data('id');
                    console.log(idConvPracticasEdit)
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idConvPracticasEdit: idConvPracticasEdit},
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
                        var formId = '#formularioDeActualizacionDeConvocatorias_Practicas';
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

        <!--Script que permite pasar los datos de una convocatoria comite desde la BD a su ventana modal de eliminacion correspondiente-->
        <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la competencia general
            $(document).ready(function(){
                
                $('.btnEliminarConvPracticas').click(function(){
                    console.log("here")
                    
                    var idConvocatoriaPracticasElim = $(this).data('id');
                
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                            // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {idConvocatoriaPracticasElim: idConvocatoriaPracticasElim},
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
                        var formId = '#formularioDeEliminacionDeConvocatorias';
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
<?php

require_once "logic/utils/Conexion.php";
require_once "logic/controllers/DesafioControlador.php";

$desafioPerControla = new DesafioControlador();


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
        <script src="assets/js/dom/funcionesBasicasPopUpDesafiosPersonalizados_Estudiante.js" type="module"></script>
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
                        <a class="link_menu" href="./DesafiosYEventos_Estudiante.php">
                            <span title="Desafios y eventos"><i class="bi bi-flag"></i></span>
                            <span class="items_menu">DESAFIOS Y EVENTOS</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./Insignias_Estudiante.php?Id_estudiante=38">
                            <span title="Insignias"><i class="bi bi-award"></i></span>
                            <span class="items_menu">INSIGNIAS</span>
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
                        <span>Administrador de desafios personalizados</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                
                <div class="card-header">
                    <button type="button" class="btn_agregarPropuesta" data-bs-toggle="modal" data-bs-target="#modalRegistrarPropuesta" title="Nueva Propuesta">Nueva propuesta</button>                    
                </div>

                <div class="main-tableDesafios">
                   <br>
                    <h3 class="titulo_seccion">Mis Propuestas</h3>

                   <!--ESTRUCTURA DE TABLA DE DESAFIOS PERSONALIZADOS PROPUESTOS POR EL ESTUDIANTE-->
                   <table id="table_desafosPersonalizadosEstudiante" class="tablaDeDesafios">
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
                    <?php
                        $sql = "SELECT Id, nombre_desafioP, nombre_imagen, idDesafioASustituir, estado from tbl_desafiopersonal where Id_estudiante=".$idEstudianteLogueado;
                        $datosDesPersonal = $desafioPerControla->mostrarDatosDesafios($sql);
                        foreach ($datosDesPersonal as $key){
                    ?>
                        
                        <?php
                            $sqlNomDesafioSusti = "SELECT nombre_desafio from tbl_desafio where id_desafio=".$key['idDesafioASustituir'];
                            $datosDesafioSusti = $desafioPerControla->mostrarDatosDesafios($sqlNomDesafioSusti);
                            foreach ($datosDesafioSusti as $point){
                        ?>
                        
                                <?php
                                    //Aqui hacemos el muestreo independiente para cada uno de los diferentes estados de un desafio personalizado
                                    $estadoDesafioPer = $key['estado'];

                                    if($estadoDesafioPer == 'Aprobada'){
                                ?>
                                        <tr class="filasDeDatosTablaDesafios">
                                            
                                            <?php 
                                            //Aqui se traen las imagenes de cada desafio personalizado
                                            $nombreDeImgAprob = $key['nombre_imagen'];

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
                                                                            
                                            <td class="datoTabla"><?php echo $key['nombre_desafioP'];  ?></td>
                                            <td class="datoTabla"><?php echo $point['nombre_desafio'];  ?></td>
                                            <td class="datoTabla">Aprobada</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a class="btnEliminarPropuesta" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarPropuesta" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>    
                                                </div>
                                            </div></td>
                                        </tr>
                                    
                                <?php
                                    }

                                    else if($estadoDesafioPer == 'Rechazada'){
                                ?>
                                        <tr class="filasDeDatosTablaDesafios">
                                            
                                            <?php 
                                            //Aqui se traen las imagenes de cada desafio personalizado
                                            $nombreDeImgRechaz = $key['nombre_imagen'];

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
                                                                     
                                            <td class="datoTabla"><?php echo $key['nombre_desafioP'];  ?></td>
                                            <td class="datoTabla"><?php echo $point['nombre_desafio'];  ?></td>
                                            <td class="datoTabla">Rechazada</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                
                                                <div class="col-botonesEdicion">
                                                    <a class="btnEditarPropuesta" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarPropuesta" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a class="btnEliminarPropuesta" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarPropuesta" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>    
                                                </div>
                                            
                                            </div></td>
                                        </tr>
                        
                                <?php
                                    }

                                    else if($estadoDesafioPer == 'Entregada'){
                                ?>
                                        <tr class="filasDeDatosTablaDesafios">
                                            
                                            <?php 
                                            //Aqui se traen las imagenes de cada desafio personalizado
                                            $nombreDeImgEntreg = $key['nombre_imagen'];

                                            if($nombreDeImgEntreg != null){

                                            ?>

                                                <td class='datoTabla'><img class='imagenDelDesafioEnTabla'src='<?php echo "desafiosPerImages/".$nombreDeImgEntreg?>'></td>

                                            <?php
                                            }else{
                                            ?>
                                            
                                                <td class="datoTabla"><img class="imagenDelDesafioEnTabla"src="assets/images/imgPorDefecto.jpg"></td>

                                            <?php    
                                            }                       
                                            ?>
                                        
                                            <td class="datoTabla"><?php echo $key['nombre_desafioP'];  ?></td>
                                            <td class="datoTabla"><?php echo $point['nombre_desafio'];  ?></td>
                                            <td class="datoTabla">Entregada</td>
                                            <td class="datoTabla"><div class="compEsp-edicion">
                                                <div class="col-botonesEdicion">
                                                    <a class="btnEditarPropuesta" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEditarPropuesta" title="Editar"><img src="assets/images/btn_editar.PNG"></a>
                                                </div>

                                                <div class="col-botonesEdicion">
                                                    <a class="btnEliminarPropuesta" data-id="<?php echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalEliminarPropuesta" title="Eliminar"><img src="assets/images/btn_eliminar.PNG"></a>    
                                                </div>
                                            </div></td>
                                        </tr>

                                <?php
                                    }
                                }
                            }
}
                                ?>

                    </tbody>

                </table>

                <!--ESTRUCTURA DEL POPUP PARA EL REGISTRO DE PROPUESTAS-->
                <div class="modal fade" id="modalRegistrarPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Nueva Propuesta</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeRegistroDePropuestas" action="logic/capturaDatDesafio.php" method="POST" enctype="multipart/form-data">
                                
                                <input type="hidden" name="idEst" value="<?php echo $idEstudianteLogueado;?>">

                                <label class="camposFormulario">Nombre de la propuesta</label><br>
                                <input id="txt_nombrePropuesta" name="nombrePropuesta" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcionPropuesta" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de propuesta</label><br>
                                <input  id="btn_cargaArchivoInfoDePropuesta" name="archivoInfoDePropuesta" accept=".pdf" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la propuesta</label><br>
                                <input  id="btn_imgParaPropuesta" name="imgParaPropuesta" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Desafio que desea reemplazar</label><br>
                                <select class="form-control" id="cmb_desafios" name="cmbDesafios" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $sql = "SELECT id_desafio, nombre_desafio FROM tbl_desafio";
                                        $datosDesa = $desafioPerControla->mostrarDatosDesafios($sql);

                                        foreach ($datosDesa as $lex){
                                    ?>

                                            <option value="<?php echo $lex['id_desafio']?>"><?php echo $lex['nombre_desafio']?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>
                                
                                <button type="submit" name="guardarPropuesta" class="btn_agregarPropuesta" title="Guardar">Guardar</button>
                                <button id="btnCancelarRegistroPropuesta" type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatDesafio.php") ?>                         

                        </div>
                        </div>
                    </div>
                    </div>
                         

                <!--ESTRUCTURA DEL POPUP PARA LA ACTUALIZACION DE PROPUESTAS-->
                <div class="modal fade" id="modalEditarPropuesta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Actualizar Propuesta</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form id="formularioDeActualizacionDePropuestas" action="logic/capturaDatDesafio.php" method="POST" enctype="multipart/form-data">
                                
                                <input type="hidden" name="Id" value="">
                                <input type="hidden" name="idEstEdit" value="<?php echo $idEstudianteLogueado;?>">

                                <label class="camposFormulario">Nombre de la propuesta</label><br>
                                <input id="txt_nombrePropuesta" name="nombre_desafioP" placeholder="" maxlength="30" type="text" onblur="cambiarAMayuscula(this)" class="form-control" required="true">
                                <br>

                                <label class="camposFormulario">Descripción</label>
                                <textarea id="txt_descripcion" name="descripcion" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true"></textarea>
                                <br>

                                <label class="camposFormulario">Opcional* - Archivo PDF con info de propuesta</label><br>
                                <input  id="btn_cargaArchivoInfoDePropuesta" name="archivoInfoDePropuesta" accept=".pdf" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Opcional* - Cargue una imagen para la propuesta</label><br>
                                <input  id="btn_imgParaPropuesta" name="imgParaPropuesta" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                <br>

                                <label class="camposFormulario">Desafio que desea reemplazar</label><br>
                                <select class="form-control" id="cmb_desafios" name="idDesafioASustituir" required="true">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $sql = "SELECT id_desafio, nombre_desafio FROM tbl_desafio";
                                        $datosDesa = $desafioPerControla->mostrarDatosDesafios($sql);

                                        foreach ($datosDesa as $lex){
                                    ?>

                                            <option value="<?php echo $lex['id_desafio']?>"><?php echo $lex['nombre_desafio']?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>

                                <label class="camposFormulario">Observaciones</label>
                                <textarea id="txt_descripcion" name="observaciones" cols="80" maxlength="250" placeholder="" rows="8" class="form-control" required="true" disabled></textarea>
                                <br>
                                
                                <button type="submit" name="actualizarPropuesta" class="btn_agregarPropuesta" title="Actualizar">Actualizar</button> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
                            
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatDesafio.php") ?>                         

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
                                <button type="submit" name="eliminarPropuesta" class="btn_agregarPropuesta" title="Si">Si</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="No">No</button> 
                            </div>
                        </form>
                        <!--Incluimos el archivo con la logica del formulario-->
                        <?php include("logic/capturaDatDesafio.php") ?>
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

        <!--Script que permite pasar los datos de un desafio personalizado a la ventana modal de edicion del mismo-->
        <script type='text/javascript'>
            $(document).ready(function(){
                
                $('.btnEditarPropuesta').click(function(){
                                        
                    var idPropuestaEdit = $(this).data('id');
                   
                    function getFormInfo() {
                        return new Promise((resolve, reject) => {
                             // AJAX request
                            $.ajax({
                                url: 'logic/utils/ajaxfile.php',
                                type: 'post',
                                data: {'idPropuestaEdit': idPropuestaEdit},
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
                        var formId = '#formularioDeActualizacionDePropuestas';
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

        <!--Script que permite pasar los datos de un desafio personalizado desde la BD a su ventana modal de eliminacion correspondiente-->
        <script type='text/javascript'>

            //Aqui se pasan los datos para el caso de la competencia general
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

    </body>
</html>
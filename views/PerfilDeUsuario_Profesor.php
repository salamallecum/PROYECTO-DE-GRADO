<?php

require_once "logic/controllers/ProfesorControlador.php";


$profeControla = new ProfesorControlador();

//Aqui capturamos el id del eportafolio seleccionado por el usuario enviado por el link
if($_GET['Id_profesor'] != 0){

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
                        <span>Perfil del profesor</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
                <div class="main-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="titulo_seccion">Editar perfil</h3>
                                </div>

                                <?php
                                    //Consultamos los datos personales del profesor para su muestreo en el formulario
                                    $sqlDatProfesor = "SELECT nombres_usuario, apellidos_usuario, username, pais, ciudad, direccion, telefono, correo_usuario, foto_usuario, descripcion from tbl_usuario where id_usuario=".$idProfesorLogueado;
                                    $datosProfesor = $profeControla->consultarDatosDeUnProfesor($sqlDatProfesor);
                                    foreach ($datosProfesor as $key){
                                ?>
                                        <div class="card-center">
                                            <form action="logic/capturaDatProfesor.php" method="POST" enctype="multipart/form-data">
                                                
                                                <div class="row">
                                                    <div class="pr-1 col-md-5">

                                                        <input type="hidden" name="idProfesor" value="<?php echo $idProfesorLogueado; ?>">
                                                        <div>
                                                            <label>Programa (disabled)</label>
                                                            <input id="txt_programa" name="programa" placeholder="" type="text" class="form-control" value="Ingeniería de Sistemas" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="px-1 col-md-3">
                                                        <div>
                                                            <label>Usuario</label>
                                                            <input id="txt_usuario" name="usuario" placeholder="" type="text" value="<?php echo $key['username']; ?>" class="form-control" maxlength="10" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="pl-1 col-md-4">
                                                        <div>
                                                            <label for="exampleInputEmail1">Correo Electrónico</label>
                                                            <input id="txt_email" name="email" placeholder="" type="email" value="<?php echo $key['correo_usuario']; ?>" class="form-control" maxlength="40" required="true">
                                                        </div>
                                                    </div>                                 
                                                </div>

                                                <div class="row">
                                                    <div class="pr-1 col-md-6">
                                                        <div>
                                                            <label>Nombres</label>
                                                            <input id="txt_nombres" name="nombres" placeholder="" type="text" value="<?php echo $key['nombres_usuario']; ?>" class="form-control" maxlength="30" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="pl-1 col-md-6">
                                                        <div>
                                                            <label>Apellidos</label>
                                                            <input id="txt_apellidos" name="apellidos" placeholder="" type="text" value="<?php echo $key['apellidos_usuario']; ?>" class="form-control" maxlength="30" required="true">
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row">
                                                    <div class="pl-1 col-md-6">
                                                        <div>
                                                            <label>Dirección</label>
                                                            <input id="txt_apellidos" name="direccion" placeholder="" type="text" value="<?php echo $key['direccion']; ?>" class="form-control" maxlength="20" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="pl-1 col-md-6">
                                                        <div>
                                                            <label>Telefono</label>
                                                            <input id="txt_telefono" name="telefono" placeholder="" type="text" value="<?php echo $key['telefono']; ?>" class="form-control" maxlength="10" required="true">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="pr-1 col-md-4">
                                                        <div>
                                                            <label>Ciudad</label>
                                                            <input id="txt_ciudad" name="ciudad" placeholder="" type="text" value="<?php echo $key['ciudad']; ?>" class="form-control" maxlength="10" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="px-1 col-md-4">
                                                        <div>
                                                            <label>País</label>
                                                            <input  id="txt_pais" name="pais" placeholder="" type="text" value="<?php echo $key['pais']; ?>" class="form-control" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="px-1 col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="foto">Opcional* - Seleccione una foto de perfil</label>
                                                            <input  id="btn_fotoDePerfil" name="fotoDePerfilProfe" accept=".jpeg, .jpg, .png" type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <label>Perfil profesional</label>
                                                            <textarea id="txt_perfilProfesional" name="perfilProfesional" cols="80" placeholder="Agregue información sobre usted" rows="8" class="form-control" maxlength="250" required="true"><?php echo $key['descripcion']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="justify-content-md-center row">
                                                    <div class="col">
                                                        <button type="submit" name="ActualizarInfoProfesor" id="btn_editarprofesor"  class="btn-fill pull-right btn btn-info" title="Actualizar perfil">Actualizar Perfil</button>
                                                    </div>

                                                    <div class="col">
                                                        <a id="openModal" class="btn-fill pull-right btn btn-info" title="Cambiar contraseña">Cambiar Contraseña</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--Incluimos el archivo con la logica del formulario-->
                                            <?php include("logic/capturaDatProfesor.php") ?>
                                        </div>
                            </div>
                        </div>

                                        <div class="col-md-4">
                                            <div class="card-user card">
                                                <div class="card-image">
                                                <img class="imgEncabezadoInfoEstudiante" src="assets/images/uebAerea.jpg" alt="">
                                                </div>
                                                <div class="card-centerProfile">
                                                    
                                                    <div class="author">
                                                        <a href="">

                                                        <?php 
                                                            //Aqui se trae la foto de perfil del profesor
                                                            $nombreDeImg = $key['foto_usuario'];

                                                            if($nombreDeImg != null){

                                                            ?>

                                                                <img id="lbl_fotoDePerfil" alt="..." class="avatar border-gray" src="<?php echo "userprofileImages/".$nombreDeImg; ?>">

                                                            <?php
                                                            }else{
                                                            ?>
                                                            
                                                                <img id="lbl_fotoDePerfil" alt="..." class="avatar border-gray" src="assets/images/imgPorDefecto.jpg">

                                                            <?php    
                                                            }                       
                                                            ?>
                                                            
                                                            <h5 id=lbl_nombreDelEstudiante name="lblnombreEstudiante" class="nombreDelEstudiante"><?php echo $key['nombres_usuario']; ?> <?php echo $key['apellidos_usuario']; ?></h5>
                                                            <br>
                                                        </a>
                                                        <p class="description">Perfil profesional</p>
                                                    </div>
                                                    <p id="lbl_perfilProfesional" class="description text-center"><?php echo $key['descripcion']; ?></p>
                                                </div>
                                                
                                                <hr>

                                                <div class="button-container mr-auto ml-auto">
                                                    <table>
                                                        <tr>
                                                            <td><a href="" ><li><i class="bi bi-facebook"></i></li></a></td>                                           
                                                            <td><table><tr><td></td></tr><tr><td></td></tr></table></td>
                                                            <td><a href="#"><li><i class="bi bi-linkedin"></i></li></a></td>
                                                        </tr>
                                                    </table> 
                                                </div>                          
                                            </div>                            
                                        </div>

                                <?php
                                    }
}
?>

                        </div>

                    

                    <!--ESTRUCTURA DEL POPUP DE CAMBIO DE CONTRASEÑA-->
                    <div id="modal_container" class="modal_container" name="modal_container">
                        <div class="modal">
                            <h3 class="titulo_seccion">Cambiar contraseña</h3>
                            <br>

                            <div class="formulario-cambioDeContraseña">
                                <form class="">
                                    <label class="labelsPassword">Contraseña actual</label>
                                    <input id="txt_contraseñaActual" name="txtContraseñaActual" placeholder="" type="text" class="form-control">
                                    <br>
                                    <label class="labelsPassword">Contraseña nueva</label>
                                    <input id="txt_contraseñaNueva" name="txtContraseñaNueva" placeholder="" type="text" class="form-control">
                                    <br>
                                </form>
                            </div>
                        
                            <a id="btn_guardarContraseña" class="btn_agregarDesafio" title="Guardar">Guardar</a>
                            <a id="btn_cancelar" class="btn_agregarDesafio" title="Cancelar">Cancelar</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
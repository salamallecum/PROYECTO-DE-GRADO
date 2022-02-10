<?php
    require_once "logic/utils/Conexion.php";
    require_once "logic/controllers/MateriaControlador.php";
    require_once "logic/controllers/ProfesorControlador.php";
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
        <script language="javascript" src="assets/js/jquery-3.6.0.js"></script>

        <!--Este script permite traer las materias que tiene asignadas un profesor-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#cbx_profesor').val(1);
                recargarLista();

                $('#cbx_profesor').change(function(){
                    recargarLista();
                });
            })
        </script>
        <script type="text/javascript">
            function recargarLista(){
                $.ajax({
                    type:"POST",
                    url:"logic/utils/getMateriasAsignadas.php",
                    data:"profesor=" + $('#cbx_profesor').val(),
                    success:function(r){
                        $('#selectListaMaterias').html(r);
                    }
                });
            }
        </script>


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
                        <span>Administrador de materias</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <main>
               <div class="contenedor">
                   
                    <div class="lbl-menu">
                        <span class="ti-plus"><label for="radio1"> Nueva Materia</label></span>
                        <span id="menu" class="ti-arrows-horizontal"><label for="radio2">Asignar Materia</label></span>
                   </div>

                   <div class="content">
                        <input type="radio" name="radio" id="radio1" checked>
                        <div class="tab1">
                            
                            <h3 class="titulo_seccion">Nueva materia</h3>
                            <br>
                            
                            <form method="post">

                                <label class="camposFormulario">Materia</label>
                                <input name="materia" maxlength="30" type="text" class="form-control">

                                <table>
                                    <tr>
                                        <td class="column-form-regMaterias">
                                            <label class="camposFormulario">Código</label>
                                            <input name="codigo" maxlength="5" type="text" class="form-control">
                                        </td>

                                        <td class="column-form-regMaterias">
                                            <label class="camposFormulario">Semestre</label><br>
                                            <select class="form-control" name="cmbSemestres">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="camposFormulario">Tipo</label><br>
                                            <select class="form-control" name="cmbTipoMaterias">
                                                <option value="selecione">Seleccione</option>
                                                <option value="obligatoria">Obligatoria</option>
                                                <option value="electiva">Electiva</option>
                                            </select>
                                        </td>

                                        <td>
                                            <label class="camposFormulario">Jornada</label><br>
                                            <select  class="form-control" name="cmbJornadas">
                                                <option value="seleccione">Seleccione</option>
                                                <option value="diurna">Diurna</option>
                                                <option value="nocturna">Nocturna</option>
                                            </select>
                                        </td>
                                    </tr>

                                </table>
                                                
                                <br>                     
                                <!--Este boton tu lo programas-->
                                <button type="submit" name="registroDeMateria" class="btn-fill pull-right btn btn-info" placeholder="Enviar">Crear Materia</button>

                            </form>
                             <!--Incluimos el archivo con la logica del formulario-->
                             <?php include("logic/capturaDatMateria.php") ?>
                        </div>
                            
                        <input type="radio" name="radio" id="radio2">
                        <div class="tab2">
                            <h3 class="titulo_seccion">Asignar materia</h3>
                            <br>

                            <form method="post">

                                <label class="camposFormulario">Profesor</label><br>
                                <select  class="form-control" id="cbx_profesor" name="cbx_profesor">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new ProfesorControlador();
                                        $sql = "SELECT id_usuario, nombres_usuario FROM tbl_usuario WHERE id_rol = 2";
                                        $datos = $obj->mostrarProfesoresRegistrados($sql);

                                        foreach ($datos as $key){
                                    ?>

                                        <option value="<?php echo $key['id_usuario']?>"><?php echo $key['nombres_usuario']?></option>

                                    <?php
                                        }
                                    ?>

                                </select>

                                <br>

                                <label class="camposFormulario">Materia</label><br>
                                <select class="form-control" id="cmb_materias" name="cbx_materia">
                                    <option value="seleccione">Seleccione</option>

                                    <?php
                                        $obj = new MateriaControlador();
                                        $sql = "SELECT id_asignatura, nombre_asignatura FROM tbl_asignatura WHERE id_profesor IS NULL";
                                        $datos = $obj->mostrarMateriasRegistradas($sql);

                                        foreach ($datos as $key){
                                    ?>

                                        <option value="<?php echo $key['id_asignatura']?>"><?php echo $key['nombre_asignatura']?></option>

                                    <?php
                                        }
                                    ?>
                                </select>                                   

                                <br>
                                                   
                                <!--Este boton tu lo programas-->
                                <button type="submit" name="asignacionDeMateria" class="btn-fill pull-right btn btn-info" title="Asignar materia">Asignar materia</button>

                                <br>
                                <br>
                                <label class='camposFormulario'>Materias asignadas</label> 
                                <br>
                                <span id="selectListaMaterias"></span>

                                </table>
                            </form>
                            <!--Incluimos el archivo con la logica del formulario-->
                            <?php include("logic/capturaDatMateria.php") ?>
                        </div>
                   </div>

               </div>
            </main>
        </div>
    </body>
</html>
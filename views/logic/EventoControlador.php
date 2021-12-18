<?php

//Invocamos el archivo de conexion a la BD
include("conexionDB.php");
//Invocamos el archivo que genera los nombres de los archivos
include("generadorDeNombres.php");

//Capturamos el evento del boton de guardar evento del formulario de registro de eventos
if(isset($_POST['btn_guardarEvento'])){

    //Capturamos los datos de los campos del formulario
    $nombreDeEvento = trim($_POST['nombreEvento']);
    $descripcionEvento = trim($_POST['descripcionEvento']);
    $fechaInicioEvento = date('Y-m-d', strtotime($_POST['dateFechaInicioEvento']));
    $fechaFinEvento = date('Y-m-d', strtotime($_POST['dateFechaFinEvento']));
    $cmbProfesorEncargado = $_REQUEST['cbx_profesor'];
    $cmbCompetencias = $_POST['cbx_competenciasGenerales'];
   
    //Validamos que los campos no se encuentren vacios
    if(strlen($nombreDeEvento) >= 1 && 
    strlen($descripcionEvento) >= 1 && 
    $fechaInicioEvento != '1970-01-01' &&
    $fechaFinEvento != '1970-01-01' &&
    $cmbProfesorEncargado != 'seleccione' && 
    !empty($cmbCompetencias)){   

        //Registramos lo obtenido en bd
        $consulta = "INSERT INTO tbl_evento (`nombre_evento`,`descripcion_evento`,`fecha_inicio`,`fecha_fin`,`id_usuario`) VALUES ('$nombreDeEvento','$descripcionEvento','$fechaInicioEvento','$fechaFinEvento','$cmbProfesorEncargado')";

        $resultado = mysqli_query($conex, $consulta);

        if($resultado){

            $imagenDelEvento = $_FILES['imgParaElEvento']['name'];
            $enunciadoDelEvento = $_FILES['archivoInfoDelEvento']['name'];
            
            //Verificamos si el usuario ha subido una imagen para el evento
            if(strlen($imagenDelEvento) >= 1){               

                //Guardamos la ruta en la que se encuentra la imagen 
                $rutaDeImagen = $_FILES['imgParaElEvento']['tmp_name'];

                //Generamos un nuevo nombre para la imagen
                $nuevoNombreArchivoImagen = generadorDeNombre().".jpg";

                //Evaluamos si no existe la carpeta eventosImages
                if(!file_exists('../eventosImages')){
                    mkdir('../eventosImages', 0777, true);

                    if(file_exists('../eventosImages')){
                        if(move_uploaded_file($rutaDeImagen, '../eventosImages/'. $imagenDelEvento)){

                            //Guardamos el nombre de la imagen en la base de datos
                            $queryGuardarNombreImagen = "UPDATE tbl_evento SET nombre_imagen='$nuevoNombreArchivoImagen' WHERE nombre_evento='$nombreDeEvento'";
                            $resultadoGuardaNombreImagen = mysqli_query($conex, $queryGuardarNombreImagen);

                            //Renombramos la imagen con el nombre guardado en bd 
                            rename("../eventosImages/".$imagenDelEvento, "../eventosImages/".$nuevoNombreArchivoImagen);

                            echo "Imagen del evento guardada satisfactoriamente";
                        }else{
                            echo "La imagen no se pudo guardar";
                        }
                    }
                }else{
                    if(move_uploaded_file($rutaDeImagen, '../eventosImages/'. $imagenDelEvento)){

                        //Generamos un nuevo nombre para el archivo
                        $nuevoNombreImg = generadorDeNombre().".jpg";

                       //Guardamos el nombre del archivo del enunciado en la base de datos
                       $queryGuardarNombreImagen = "UPDATE tbl_evento SET nombre_imagen='$nuevoNombreImg' WHERE nombre_evento='$nombreDeEvento'";
                       $resultadoGuardaNombreImagen = mysqli_query($conex, $queryGuardarNombreImagen);

                       //Renombramos el achivo del enunciado con el nombre guardado en bd 
                       rename("../eventosImages/".$imagenDelEvento, "../eventosImages/".$nuevoNombreImg);

                       echo "Imagen del evento guardada satisfactoriamente";
                    }else{
                        echo "La imagen no se pudo guardar";
                    }
                }              
            }

            //Verificamos si el usuario ha subido un archivo con el enunciado del evento
            if(strlen($enunciadoDelEvento) >= 1){

                //Guardamos la ruta en la que se encuentra el enunciado 
                $rutaDeEnunciado = $_FILES['archivoInfoDelEvento']['tmp_name'];

                //Generamos un nuevo nombre para el archivo
                $nuevoNombreArchivoEnunciado = generadorDeNombre().".pdf";

                //Evaluamos si no existe la carpeta eventosFiles
                if(!file_exists('../eventosFiles')){
                    mkdir('../eventosFiles', 0777, true);

                    if(file_exists('../eventosFiles')){
                        if(move_uploaded_file($rutaDeEnunciado, '../eventosFiles/'. $enunciadoDelEvento)){

                            //Guardamos el nombre del archivo del enunciado en la base de datos
                            $queryGuardarNombreEnunciado = "UPDATE tbl_evento SET nombre_enunciado='$nuevoNombreArchivoEnunciado' WHERE nombre_evento='$nombreDeEvento'";
                            $resultadoGuardaNombreEnunciado = mysqli_query($conex, $queryGuardarNombreEnunciado);

                            //Renombramos el achivo del enunciado con el nombre guardado en bd 
                            rename("../eventosFiles/".$enunciadoDelEvento, "../eventosFiles/".$nuevoNombreArchivoEnunciado);

                            echo "Enunciado del evento guardado satisfactoriamente";
                        }else{
                            echo "Enunciado no se pudo guardar";
                        }
                    }
                }else{
                    if(move_uploaded_file($rutaDeEnunciado, '../eventosFiles/'. $enunciadoDelEvento)){

                        //Generamos un nuevo nombre para el archivo
                        $nuevoNombre = generadorDeNombre().".pdf";

                       //Guardamos el nombre del archivo del enunciado en la base de datos
                       $queryGuardarNombreEnunciado = "UPDATE tbl_evento SET nombre_enunciado='$nuevoNombre' WHERE nombre_evento='$nombreDeEvento'";
                       $resultadoGuardaNombreEnunciado = mysqli_query($conex, $queryGuardarNombreEnunciado);

                       //Renombramos el achivo del enunciado con el nombre guardado en bd 
                       rename("../eventosFiles/".$enunciadoDelEvento, "../eventosFiles/".$nuevoNombre);
                       
                       echo "Enunciado del evento guardado satisfactoriamente";
                    }else{
                        echo "Enunciado no se pudo guardar";
                    }
                }
            }
                       
            ?>
            <h3 class="indicadorSatisfactorio">* Evento registrado satisfactoriamente</h3>  
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            ?>
            <h3 class="indicadorDeError">* Error al registrar Evento</h3>   
            <?php
        }
    }else{
       echo "<script>alert('Por favor diligencie todos los campos');</script>";
       //header('Location:../AdministradorDeEventos_Comite.php');
       header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

?>
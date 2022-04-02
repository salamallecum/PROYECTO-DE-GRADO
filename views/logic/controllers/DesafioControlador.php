<?php

class DesafioControlador{

    //Funcion que permite mostrar los desafios
    public function mostrarDatosDesafios($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Funcion que permite el registro de los desafios
    public function insertarDesafio(Desafio $desafio){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idDesafio = $desafio->getId();
        $idDelProfesorEncargado = $desafio->getIdProfeEncargado();
        $nombreDesafio = $desafio->getNombre();
        $descripcionDesafio = $desafio->getDescripcion();
        $fechaInicio = $desafio->getFechaInicio();
        $fechaFin = $desafio->getFechaFin();
        $materiaContribucion = $desafio->getMateriaDeContribucion();
                
        $sql = "INSERT INTO tbl_desafio (id_desafio, id_profesor, nombre_desafio, descripcion_desafio, fecha_inicio, fecha_fin, id_asignatura, competenciasAsignadas)
                            values ($idDesafio, $idDelProfesorEncargado, '$nombreDesafio', '$descripcionDesafio', '$fechaInicio', '$fechaFin', $materiaContribucion, 'No')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar una imagen del desafio
    public function subirImagenDesafio($rutaImg, $nombreImg, $imgDesafio, $nomDesafio){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta desafiosImages
        if(!file_exists('../desafiosImages')){
            mkdir('../desafiosImages', 0777, true);

            if(file_exists('../desafiosImages')){
                if(move_uploaded_file($rutaImg, '../desafiosImages/'. $imgDesafio)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_desafio SET nombre_imagen='$nombreImg' WHERE nombre_desafio='$nomDesafio'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../desafiosImages/".$imgDesafio, "../desafiosImages/".$nombreImg);

                }else{
                    echo "La imagen del desafio no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImg, '../desafiosImages/'. $imgDesafio)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreImagen = "UPDATE tbl_desafio SET nombre_imagen='$nombreImg' WHERE nombre_desafio='$nomDesafio'";
                $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../desafiosImages/".$imgDesafio, "../desafiosImages/".$nombreImg);

            }else{
                echo "La imagen del desafio no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el enunciado del desafio
    public function subirEnunciadoDesafio($rutaEnun, $nombreEnun, $archEnun, $nomDesafio){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta desafiosFiles
        if(!file_exists('../desafiosFiles')){
            mkdir('../desafiosFiles', 0777, true);

            if(file_exists('../desafiosFiles')){
                if(move_uploaded_file($rutaEnun, '../desafiosFiles/'. $archEnun)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreEnunciado = "UPDATE tbl_desafio SET nombre_enunciado='$nombreEnun' WHERE nombre_desafio='$nomDesafio'";
                    $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../desafiosFiles/".$archEnun, "../desafiosFiles/".$nombreEnun);

                }else{
                    echo "El enunciado no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaEnun, '../desafiosFiles/'. $archEnun)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreEnunciado = "UPDATE tbl_desafio SET nombre_enunciado='$nombreEnun' WHERE nombre_desafio='$nomDesafio'";
                $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../desafiosFiles/".$archEnun, "../desafiosFiles/".$nombreEnun);

            }else{
                echo "El enunciado no se pudo guardar";
            }
        } 
    }

    //Funcion que permite actualizar la informacion de un desafio
    public function actualizarDesafio(Desafio $desafioEdit){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idDesafioEdit = $desafioEdit->getId();
        $idProfesorEncargadoEdit = $desafioEdit->getIdProfeEncargado();
        $nombreDesafioAEditar = $desafioEdit->getNombre();
        $descripcionAEditar = $desafioEdit->getDescripcion();
        $fechaInicioEdit = $desafioEdit->getFechaInicio();
        $fechaFinEdit = $desafioEdit->getFechaFin();
        $MateriaContribucionEdit = $desafioEdit->getMateriaDeContribucion();
                
        $sql = "UPDATE tbl_desafio SET id_profesor=$idProfesorEncargadoEdit, nombre_desafio='$nombreDesafioAEditar', descripcion_desafio='$descripcionAEditar', fecha_inicio='$fechaInicioEdit', fecha_fin='$fechaFinEdit', id_asignatura='$MateriaContribucionEdit'
                            WHERE  id_desafio=$idDesafioEdit";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite consultar el nombre de la imagen de un desafio
    public function consultarNombreImagenDesafio($idDes){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_desafio where id_desafio = $idDes";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que elimina de base de datos el nombre de una imagen de un desafio
    public function limpiarNombreImagenDesafio(int $idDes, string $nombreImgDesafio){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_desafio SET nombre_imagen = null WHERE  nombre_imagen='$nombreImgDesafio' and id_evento=".$idDes;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que permite eliminar la imagen de un desafio
    public function eliminarImagen(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/desafiosImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

    //Funcion que permite consultar el nombre del enunciado de un desafio
    public function consultarNombreEnunciadoDesafio($idDes){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_enunciado from tbl_desafio where id_desafio = $idDes";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_enunciado'];
        }

    }

    //Funcion que elimina de base de datos el nombre de un enunciado de un desafio
    public function limpiarNombreEnunciadoDesafio(int $idDes, string $nombreEnunDesafio){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_desafio SET nombre_enunciado = null WHERE  nombre_enunciado='$nombreEnunDesafio' and id_desafio=".$idDes;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite eliminar el enunciado de un desafio
    public function eliminarEnunciado(string $nomEnun){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/desafiosFiles/".$nomEnun;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "El enunciado ($nomEnun) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el enunciado ($nomEnun)";
        }
    } 

    //Funcion que permite eliminar un desafio
    public function eliminarDesafio(int $idDesafio){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_desafio where id_desafio = $idDesafio";

        //Consultamos si tiene imagen o archivo almacenados en el servidor
        $nombreImagen = (string) $this->consultarNombreImagenDesafio($idDesafio);
        $nombreEnunciado = (string) $this->consultarNombreEnunciadoDesafio($idDesafio);

        //Validamos que el desafio tenga un nombre de imagen o un nombre de enunciado
        if($nombreImagen != null){
            $this->eliminarImagen($nombreImagen);
        }
        
        if($nombreEnunciado != null){
            $this->eliminarEnunciado($nombreEnunciado);
        }            
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite publicar un desafio
    public function publicarDesafio(int $idDe){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_desafio SET competenciasAsignadas = 'Si' WHERE id_desafio='$idDe'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite el registro de las propuestas o desafios personalizados
    public function insertarPropuesta(DesafioPersonalizado $desafioPer){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idPropuesta = $desafioPer->getId();
        $idDelEstudianteQPropone = $desafioPer->getIdEstudiante();
        $nombrePropuesta = $desafioPer->getNombre();
        $descripcionPropuesta = $desafioPer->getDescripcion();
        $fechaProp = $desafioPer->getFechaPropuesta();
        $idDesafioASustituir = $desafioPer->getIIdDesafioASustituir();
        $estado = $desafioPer->getEstado();
                
        $sql = "INSERT INTO tbl_desafiopersonal (Id, Id_estudiante, nombre_desafioP, descripcion, fecha_propuesta, IdDesafioASustituir, estado)
                            values ($idPropuesta, $idDelEstudianteQPropone, '$nombrePropuesta', '$descripcionPropuesta', '$fechaProp', $idDesafioASustituir, '$estado')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar una imagen de propuesta o desafio personalizado
    public function subirImagenPropuesta($rutaImg, $nombreImg, $imgPropuesta, $nomPropuesta){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta desafiosPerImages
        if(!file_exists('../desafiosPerImages')){
            mkdir('../desafiosPerImages', 0777, true);

            if(file_exists('../desafiosPerImages')){
                if(move_uploaded_file($rutaImg, '../desafiosPerImages/'. $imgPropuesta)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagenPropuesta = "UPDATE tbl_desafiopersonal SET nombre_imagen='$nombreImg' WHERE nombre_desafioP='$nomPropuesta'";
                    $resultadoGuardaNombreImagenPropuesta = mysqli_query($conexion, $queryGuardarNombreImagenPropuesta);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../desafiosPerImages/".$imgPropuesta, "../desafiosPerImages/".$nombreImg);

                }else{
                    echo "La imagen del desafio personalizado no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImg, '../desafiosPerImages/'. $imgPropuesta)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreImagenPropuesta = "UPDATE tbl_desafiopersonal SET nombre_imagen='$nombreImg' WHERE nombre_desafioP='$nomPropuesta'";
                $resultadoGuardaNombreImagenPropuesta = mysqli_query($conexion, $queryGuardarNombreImagenPropuesta);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../desafiosPerImages/".$imgPropuesta, "../desafiosPerImages/".$nombreImg);

            }else{
                echo "La imagen del desafio personalizado no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el enunciado de propuesta o desafio personalizado
    public function subirEnunciadoPropuesta($rutaEnun, $nombreEnun, $archPropuesta, $nomProp){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta desafiosFiles
        if(!file_exists('../desafiosPerFiles')){
            mkdir('../desafiosPerFiles', 0777, true);

            if(file_exists('../desafiosPerFiles')){
                if(move_uploaded_file($rutaEnun, '../desafiosPerFiles/'. $archPropuesta)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreEnunciadoPropuesta = "UPDATE tbl_desafiopersonal SET nombre_enunciado='$nombreEnun' WHERE nombre_desafioP='$nomProp'";
                    $resultadoGuardaNombreEnunciadoPropuesta = mysqli_query($conexion, $queryGuardarNombreEnunciadoPropuesta);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../desafiosPerFiles/".$archPropuesta, "../desafiosPerFiles/".$nombreEnun);

                }else{
                    echo "El enunciado de la propuesta no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaEnun, '../desafiosPerFiles/'. $archPropuesta)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreEnunciadoPropuesta = "UPDATE tbl_desafiopersonal SET nombre_enunciado='$nombreEnun' WHERE nombre_desafioP='$nomProp'";
                $resultadoGuardaNombreEnunciadoPropuesta = mysqli_query($conexion, $queryGuardarNombreEnunciadoPropuesta);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../desafiosPerFiles/".$archPropuesta, "../desafiosPerFiles/".$nombreEnun);

            }else{
                echo "El enunciado de la propuesta no se pudo guardar";
            }
        }
    }

    //Funcion que permite actualizar la informacion de un desafio personalizado
    public function actualizarPropuesta(int $idPropuesta, int $idEstudiante, string $nombrePropuesta, string $descripcionPropuesta, int $desafioContrib){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_desafiopersonal SET Id_estudiante=$idEstudiante, nombre_desafioP='$nombrePropuesta', descripcion='$descripcionPropuesta', idDesafioASustituir=$desafioContrib WHERE Id=$idPropuesta";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite consultar el nombre de la imagen de un deasio personalizado
    public function consultarNombreImagenPropuesta($idProp){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_desafiopersonal where Id = $idProp";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que elimina de base de datos el nombre de una imagen de un desafio personalizado
    public function limpiarNombreImagenPropuesta(int $idProp, string $nombreImgPropuesta){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_desafiopersonal SET nombre_imagen = null WHERE  nombre_imagen='$nombreImgPropuesta' and Id=".$idProp;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que permite consultar el nombre del enunciado de un desafio personalizado
    public function consultarNombreEnunciadoPropuesta($idPr){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_enunciado from tbl_desafiopersonal where Id = $idPr";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_enunciado'];
        }
    }

    //Funcion que elimina de base de datos el nombre de un enunciado de un desafio personalizado
    public function limpiarNombreEnunciadoPropuesta(int $idProp, string $nombreEnunPropuesta){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_desafiopersonal SET nombre_enunciado = null WHERE  nombre_enunciado='$nombreEnunPropuesta' and Id=".$idProp;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite eliminar un desafio personalizado
    public function eliminarPropuesta(int $idPropues){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_desafiopersonal where Id = $idPropues";

        //Consultamos si tiene imagen o archivo almacenados en el servidor
        $nombreImagenPr = (string) $this->consultarNombreImagenPropuesta($idPropues);
        $nombreEnunciadoPr = (string) $this->consultarNombreEnunciadoPropuesta($idPropues);

        //Validamos que el desafio personalizado tenga un nombre de imagen o un nombre de enunciado
        if($nombreImagenPr != null){
            $this->eliminarImagenPropuesta($nombreImagenPr);
        }
        
        if($nombreEnunciadoPr != null){
            $this->eliminarEnunciadoPropuesta($nombreEnunciadoPr);
        }            
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite eliminar la imagen de un desafio personalizado
    public function eliminarImagenPropuesta(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/desafiosPerImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

     //Funcion que permite eliminar el enunciado de un desafio
     public function eliminarEnunciadoPropuesta(string $nomEnun){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/desafiosPerFiles/".$nomEnun;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "El enunciado ($nomEnun) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el enunciado ($nomEnun)";
        }
    }

}

?>
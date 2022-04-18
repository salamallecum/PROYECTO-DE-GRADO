<?php

class EventoControlador{

    //Funcion que permite mostrar los eventos
    public function mostrarDatosEventos($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Funcion que permite mostrar los eventos en cards paraque el estudiante pueda postularse
    public function mostrarDatosEventosEnCards($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    //Funcion que permite el registro de los eventos
    public function insertarEvento(Evento $evento){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idEvento = $evento->getId();
        $nombreEvento = $evento->getNombre();
        $descripcionEvento = $evento->getDescripcion();
        $fechaInicio = $evento->getFechaInicio();
        $fechaFin = $evento->getFechaFin();
        $profeEncargado = $evento->getProfeEncargado();
                
        $sql = "INSERT INTO tbl_evento (id_evento, nombre_evento, descripcion_evento, fecha_inicio, fecha_fin, id_usuario, competenciasAsignadas)
                            values ($idEvento, '$nombreEvento', '$descripcionEvento', '$fechaInicio', '$fechaFin', $profeEncargado, 'No')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar una imagen del evento
    public function subirImagenEvento($rutaImg, $nombreImg, $imgEvento, $nomEvento){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta eventosImages
        if(!file_exists('../eventosImages')){
            mkdir('../eventosImages', 0777, true);

            if(file_exists('../eventosImages')){
                if(move_uploaded_file($rutaImg, '../eventosImages/'. $imgEvento)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_evento SET nombre_imagen='$nombreImg' WHERE nombre_evento='$nomEvento'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../eventosImages/".$imgEvento, "../eventosImages/".$nombreImg);

                }else{
                    echo "La imagen del evento no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImg, '../eventosImages/'. $imgEvento)){

               //Guardamos el nombre del archivo del enunciado en la base de datos
               $queryGuardarNombreImagen = "UPDATE tbl_evento SET nombre_imagen='$nombreImg' WHERE nombre_evento='$nomEvento'";
               $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

               //Renombramos el achivo del enunciado con el nombre guardado en bd 
               rename("../eventosImages/".$imgEvento, "../eventosImages/".$nombreImg);

            }else{
                echo "La imagen del evento no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el enunciado del evento
    public function subirEnunciadoEvento($rutaEnun, $nombreEnun, $archEnun, $nomEvento){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta eventosFiles
        if(!file_exists('../eventosFiles')){
            mkdir('../eventosFiles', 0777, true);

            if(file_exists('../eventosFiles')){
                if(move_uploaded_file($rutaEnun, '../eventosFiles/'. $archEnun)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreEnunciado = "UPDATE tbl_evento SET nombre_enunciado='$nombreEnun' WHERE nombre_evento='$nomEvento'";
                    $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../eventosFiles/".$archEnun, "../eventosFiles/".$nombreEnun);

                }else{
                    echo "El enunciado no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaEnun, '../eventosFiles/'. $archEnun)){

               //Guardamos el nombre del archivo del enunciado en la base de datos
               $queryGuardarNombreEnunciado = "UPDATE tbl_evento SET nombre_enunciado='$nombreEnun' WHERE nombre_evento='$nomEvento'";
               $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

               //Renombramos el achivo del enunciado con el nombre guardado en bd 
               rename("../eventosFiles/".$archEnun, "../eventosFiles/".$nombreEnun);

            }else{
                echo "El enunciado no se pudo guardar";
            }
        } 
    }

    //Funcion que permite eliminar un evento
    public function eliminarEvento($idEvento){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_evento where id_evento = $idEvento";

        //Consultamos si tiene imagen o archivo almacenados en el servidor
        $nombreImagen = (string) $this->consultarNombreImagenEvento($idEvento);
        $nombreEnunciado = (string) $this->consultarNombreEnunciadoEvento($idEvento);

        //Validamos que el evento tenga un nombre de imagen o un nombre de enunciado
        if($nombreImagen != null){
            $this->eliminarImagen($nombreImagen);
        }
        
        if($nombreEnunciado != null){
            $this->eliminarEnunciado($nombreEnunciado);
        }            
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite consultar el nombre de la imagen de un evento
    public function consultarNombreImagenEvento(int $idEv){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_evento where id_evento = $idEv";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que permite contar el numero de eventos registrados
    public function contadorDeEventos(){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT COUNT(*) from tbl_evento";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['COUNT(*)'];
        }
    }
    
    //Funcion que permite consultar el nombre del enunciado de un evento
    public function consultarNombreEnunciadoEvento($idEv){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_enunciado from tbl_evento where id_evento = $idEv";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_enunciado'];
        }

    }
    
    //Funcion que permite eliminar la imagen de un evento
    public function eliminarImagen(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/eventosImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

    //Funcion que permite eliminar el enunciado de un evento
    public function eliminarEnunciado(string $nomEnun){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/eventosFiles/".$nomEnun;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "El enunciado ($nomEnun) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el enunciado ($nomEnun)";
        }
    }  
    
    //Funcion que permite actualizar la informacion de un evento
    public function actualizarEvento(int $idEventoEdit, string $nombreEventoAEditar, string $descripcionAEditar, $fechaInicioEdit, $fechaFinEdit, int $profeEncargadoEdit){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_evento SET nombre_evento='$nombreEventoAEditar', descripcion_evento='$descripcionAEditar', fecha_inicio='$fechaInicioEdit', fecha_fin='$fechaFinEdit', id_usuario='$profeEncargadoEdit'
                            WHERE  id_evento=$idEventoEdit";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite actualizar el enunciado de un evento
    public function actualizarEnunciadoEvento($idEventoEdit, $rutanvoEnun, $nombrenvoEnun, $archnvoEnun, $nomEvento){

        //Consultamos si tiene archivo almacenado en el servidor
        $nombreEnunciado = (string) $this->consultarNombreEnunciadoEvento($idEventoEdit);

        //Validamos que el evento tenga un nombre de enunciado
        if($nombreEnunciado != null){
            $this->eliminarEnunciado($nombreEnunciado);
            $this->subirEnunciadoEvento($rutanvoEnun, $nombrenvoEnun, $archnvoEnun, $nomEvento);
        }
    }

    //Funcion que permite actualizar la imagen de un evento
    public function actualizarImagenEvento($idEventoEdit, $rutanvaImg, $nombrenvaImg, $archivoImg, $nomEvento){

        //Consultamos si tiene imagen  almacenada en el servidor
        $nombreImagen = (string) $this->consultarNombreImagenEvento($idEventoEdit);

        //Validamos que el evento tenga un nombre de enunciado
        if($nombreImagen != null){
            $this->eliminarEnunciado($nombreImagen);
            $this->subirEnunciadoEvento($rutanvaImg, $nombrenvaImg, $archivoImg, $nomEvento);
        }
    }

    //Funcion que elimina de base de datos el nombre de una imagen de un evento
    public function limpiarNombreImagenEvento(int $idEv, string $nombreImgEvento){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_evento SET nombre_imagen = null WHERE  nombre_imagen='$nombreImgEvento' and id_evento=".$idEv;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el nombre de un enunciado de un evento
    public function limpiarNombreEnunciadoEvento(int $idEv, string $nombreEnunEvento){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_evento SET nombre_enunciado = null WHERE  nombre_enunciado='$nombreEnunEvento' and id_evento=".$idEv;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite publicar un evento
    public function publicarEvento(int $idEv){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_evento SET competenciasAsignadas = 'Si', estado = 'Activo' WHERE id_evento='$idEv'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que nos permite verificar si un evento tenia aplicaciones de trabajos de estudiantes en la plataforma
    public function verificarSiElEventoTieneAplicacionesDeTrabajosRelacionadas(int $idEv){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id from tbl_aplicaciondetrabajos where id_actividad = $idEv and tipo_actividad = 'EVENTO'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['Id'];
        }
    }

    //Funcion que permite eliminar las aplicaciones de trabajos destacados realizadas por el estudiante para un evento
    public function eliminarAplicacionesDeTrabajosAEvento(int $idEv){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE from tbl_aplicaciondetrabajos where id_actividad = $idEv and tipo_actividad='EVENTO'";     
               
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que nos permite verificar si un estudiante aplico a un evento con anterioridad
    public function verificarSiElEstudianteYaAplicoAUnEvento(int $idStud, int $idEv){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id from tbl_aplicaciondetrabajos where Id_estudiante = $idStud and id_actividad = $idEv and tipo_actividad='EVENTO'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['Id'];
        }
    }

    //Funcion que activa o desactiva un evento
    public function gestionarEvento(int $idEv, string $estado){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_evento SET estado = '$estado' WHERE id_evento=".$idEv;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que retorna un array con el listado de trabajos que fueron aplicados a un evento
    public function consultarTrabajosDestacadosAplicadosAUnEvento(int $idEvento){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_trabajo from tbl_aplicaciondetrabajos where id_actividad = $idEvento and tipo_actividad='EVENTO'";
        $result = mysqli_query($conexion, $sql);

        $emparrayTrabajosAplicadosAEvento = array();

        $contador = 0;
        while ($row = @mysqli_fetch_array($result)) {
            $emparrayTrabajosAplicadosAEvento[$contador] = $row['id_trabajo'];
            $contador++;
        }

        return $emparrayTrabajosAplicadosAEvento;
    }
}

?>
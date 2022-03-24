<?php

class ConvocatoriaControlador{

    //Funcion que permite mostrar las convocatorias
    public function mostrarDatosConvocatorias($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    
    //Funcion que permite consultar una convocatoria practicas a editar
    public function consultarConvocatoriaPracticasAEditar($idConvocatoriaAEditar){
        
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_convocatoria, descripcion, fecha_inicio, fecha_fin from tbl_convocatoriapracticas where Id = $idConvocatoriaAEditar";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            $nombreConvAEditar = $row['nombre_convocatoria'];
            $descripcionConvAEditar = $row['descripcion'];
            $fechaInicioConvAEditar = $row['fecha_inicio'];
            $fechaFinConvAEditar = $row['fecha_fin'];

            $objConvocatoriaPracticasAEditar = new ConvocatoriaPracticas($idConvocatoriaAEditar, $nombreConvAEditar, $descripcionConvAEditar, $fechaInicioConvAEditar, $fechaFinConvAEditar);
            return $objConvocatoriaPracticasAEditar;
        }
    }

    //Funcion que permite consultar una convocatoria comite a editar
    public function consultarConvocatoriaComiteAEditar($idConvAEditar){
        
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_convocatoria, descripcion_convocatoria, fecha_inicio, fecha_fin, id_usuario from tbl_convocatoriacomite where Id = $idConvAEditar";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            $nombreConvComiteAEditar = $row['nombre_convocatoria'];
            $descripcionConvComiteAEditar = $row['descripcion_convocatoria'];
            $fechaInicioConvComiteAEditar = $row['fecha_inicio'];
            $fechaFinConvComiteAEditar = $row['fecha_fin'];
            $profeEncargadoConvComiteAEditar = $row['id_usuario'];

            $objConvocatoriaComiteAEditar = new ConvocatoriaPracticas($idConvAEditar, $nombreConvComiteAEditar, $descripcionConvComiteAEditar, $fechaInicioConvComiteAEditar, $fechaFinConvComiteAEditar, $profeEncargadoConvComiteAEditar);
            return $objConvocatoriaComiteAEditar;
        }
    }    

    //Funcion que permite el registro de las convocatorias del rol comite
    public function insertarConvocatoriaComite(ConvocatoriaComite $nvaConv){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idConvocatoriaCom = $nvaConv->getId();
        $nombreConvCom = $nvaConv->getNombre();
        $descripcionConvCom = $nvaConv->getDescripcion();
        $fechaInicioConvCom = $nvaConv->getFechaInicio();
        $fechaFinConvCom = $nvaConv->getFechaFin();
        $profeEncargadoConvCom = $nvaConv->getProfeEncargado();
                
        $sql = "INSERT INTO tbl_convocatoriacomite (Id, nombre_convocatoria, descripcion_convocatoria, fecha_inicio, fecha_fin, id_usuario, competenciasAsignadas)
                            values ($idConvocatoriaCom, '$nombreConvCom', '$descripcionConvCom', '$fechaInicioConvCom', '$fechaFinConvCom', $profeEncargadoConvCom, 'No')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite el registro de las convocatorias del rol practicas
    public function insertarConvocatoriaPracticas(ConvocatoriaPracticas $nvaConvPract){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idConvocatoriaPract = $nvaConvPract->getId();
        $nombreConvPract = $nvaConvPract->getNombre();
        $descripcionConvPract = $nvaConvPract->getDescripcion();
        $fechaInicioConvPract = $nvaConvPract->getFechaInicio();
        $fechaFinConvPract = $nvaConvPract->getFechaFin();
                    
        $sql = "INSERT INTO tbl_convocatoriapracticas (Id, nombre_convocatoria, descripcion, fecha_inicio, fecha_fin)
                            values ($idConvocatoriaPract, '$nombreConvPract', '$descripcionConvPract', '$fechaInicioConvPract', '$fechaFinConvPract')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar una imagen de la convocatoria comite
    public function subirImagenConvocatoriaComite($rutaImg, $nombreImg, $imgConvocatoria, $nomConvCom){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta convocatoriasImages
        if(!file_exists('../convocatoriasImages')){
            mkdir('../convocatoriasImages', 0777, true);

            if(file_exists('../convocatoriasImages')){
                if(move_uploaded_file($rutaImg, '../convocatoriasImages/'. $imgConvocatoria)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_convocatoriacomite SET nombre_imagen='$nombreImg' WHERE nombre_convocatoria='$nomConvCom'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../convocatoriasImages/".$imgConvocatoria, "../convocatoriasImages/".$nombreImg);

                }else{
                    echo "La imagen de la convocatoria comite no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImg, '../convocatoriasImages/'. $imgConvocatoria)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreImagen = "UPDATE tbl_convocatoriacomite SET nombre_imagen='$nombreImg' WHERE nombre_convocatoria='$nomConvCom'";
                $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../convocatoriasImages/".$imgConvocatoria, "../convocatoriasImages/".$nombreImg);

            }else{
                echo "La imagen de la convocatoria comite no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar una imagen de la convocatoria practicas
    public function subirImagenConvocatoriaPracticas($rutaImgPrac, $nombreImgPrac, $imgConvocatoriaPrac, $nomConvPrac){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta convocatoriasImages
        if(!file_exists('../convocatoriasImages')){
            mkdir('../convocatoriasImages', 0777, true);

            if(file_exists('../convocatoriasImages')){
                if(move_uploaded_file($rutaImgPrac, '../convocatoriasImages/'. $imgConvocatoriaPrac)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagenPract = "UPDATE tbl_convocatoriapracticas SET nombre_imagen='$nombreImgPrac' WHERE nombre_convocatoria='$nomConvPrac'";
                    $resultadoGuardaNombreImagenPract = mysqli_query($conexion, $queryGuardarNombreImagenPract);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../convocatoriasImages/".$imgConvocatoriaPrac, "../convocatoriasImages/".$nombreImgPrac);

                }else{
                    echo "La imagen de la convocatoria practicas no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImgPrac, '../convocatoriasImages/'. $imgConvocatoriaPrac)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreImagenPract = "UPDATE tbl_convocatoriapracticas SET nombre_imagen='$nombreImgPrac' WHERE nombre_convocatoria='$nomConvPrac'";
                $resultadoGuardaNombreImagenPract = mysqli_query($conexion, $queryGuardarNombreImagenPract);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../convocatoriasImages/".$imgConvocatoriaPrac, "../convocatoriasImages/".$nombreImgPrac);

            }else{
                echo "La imagen de la convocatoria practicas no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el enunciado de la convocatoria comite
    public function subirEnunciadoConvocatoriaComite($rutaEnunConv, $nombreEnunConv, $archEnunConv, $nombreConvCom){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta convocatoriasFiles
        if(!file_exists('../convocatoriasFiles')){
            mkdir('../convocatoriasFiles', 0777, true);

            if(file_exists('../convocatoriasFiles')){
                if(move_uploaded_file($rutaEnunConv, '../convocatoriasFiles/'. $archEnunConv)){

                    //Guardamos el nombre del enunciado en la base de datos
                    $queryGuardarNombreEnunciado = "UPDATE tbl_convocatoriacomite SET nombre_enunciado='$nombreEnunConv' WHERE nombre_convocatoria='$nombreConvCom'";
                    $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

                    //Renombramos el enunciado con el nombre guardado en bd 
                    rename("../convocatoriasFiles/".$archEnunConv, "../convocatoriasFiles/".$nombreEnunConv);

                }else{
                    echo "El enunciado de la convocatoria no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaEnunConv, '../convocatoriasFiles/'. $archEnunConv)){

                //Guardamos el nombre del enunciado en la base de datos
                $queryGuardarNombreEnunciado = "UPDATE tbl_convocatoriacomite SET nombre_enunciado='$nombreEnunConv' WHERE nombre_convocatoria='$nombreConvCom'";
                $resultadoGuardaNombreEnunciado = mysqli_query($conexion, $queryGuardarNombreEnunciado);

                //Renombramos el enunciado con el nombre guardado en bd 
                rename("../convocatoriasFiles/".$archEnunConv, "../convocatoriasFiles/".$nombreEnunConv);

            }else{
                echo "El enunciado de la convocatoria no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el enunciado de la convocatoria practicas
    public function subirEnunciadoConvocatoriaPracticas($rutaEnunPrac, $nombreEnunPrac, $archEnunConvPrac, $nomConvPrac){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta convocatoriasFiles
        if(!file_exists('../convocatoriasFiles')){
            mkdir('../convocatoriasFiles', 0777, true);

            if(file_exists('../convocatoriasFiles')){
                if(move_uploaded_file($rutaEnunPrac, '../convocatoriasFiles/'. $archEnunConvPrac)){

                    //Guardamos el nombre del enunciado en la base de datos
                    $queryGuardarNombreEnunciadoPrac = "UPDATE tbl_convocatoriapracticas SET nombre_archivo='$nombreEnunPrac' WHERE nombre_convocatoria='$nomConvPrac'";
                    $resultadoGuardaNombreEnunciadoPrac = mysqli_query($conexion, $queryGuardarNombreEnunciadoPrac);

                    //Renombramos el enunciado con el nombre guardado en bd 
                    rename("../convocatoriasFiles/".$archEnunConvPrac, "../convocatoriasFiles/".$nombreEnunPrac);

                }else{
                    echo "El enunciado de la convocatoria no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaEnunPrac, '../convocatoriasFiles/'. $archEnunConvPrac)){

                //Guardamos el nombre del enunciado en la base de datos
                $queryGuardarNombreEnunciadoPrac = "UPDATE tbl_convocatoriapracticas SET nombre_archivo='$nombreEnunPrac' WHERE nombre_convocatoria='$nomConvPrac'";
                $resultadoGuardaNombreEnunciadoPrac = mysqli_query($conexion, $queryGuardarNombreEnunciadoPrac);

                //Renombramos el enunciado con el nombre guardado en bd 
                rename("../convocatoriasFiles/".$archEnunConvPrac, "../convocatoriasFiles/".$nombreEnunPrac);

            }else{
                echo "El enunciado de la convocatoria no se pudo guardar";
            }
        } 
    }

    //Funcion que permite eliminar una convocatoria comite
    public function eliminarConvocatoriaComite($idConv){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_convocatoriacomite where Id = $idConv";

        //Consultamos si tiene imagen o archivo almacenados en el servidor
        $nombreImagenConvCom = (string) $this->consultarNombreImagenConvocatoriaComite($idConv);
        $nombreEnunciadoConvCom = (string) $this->consultarNombreEnunciadoConvocatoriaComite($idConv);

        //Validamos que la convocatoria tenga un nombre de imagen y un nombre de enunciado
        if($nombreImagenConvCom != null){
            $this->eliminarImagen($nombreImagenConvCom);
        }
        
        if($nombreEnunciadoConvCom != null){
            $this->eliminarEnunciado($nombreEnunciadoConvCom);
        }
               
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite eliminar una convocatoria practicas
    public function eliminarConvocatoriaPracticas($idConvPrac){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_convocatoriapracticas where Id = $idConvPrac";

        //Consultamos si tiene imagen o archivo almacenados en el servidor
        $nombreImagenConvPrac = (string) $this->consultarNombreImagenConvocatoriaPracticas($idConvPrac);
        $nombreEnunciadoConvPrac = (string) $this->consultarNombreEnunciadoConvocatoriaPracticas($idConvPrac);

        //Validamos que el evento tenga un nombre de imagen o un nombre de enunciado
        if($nombreImagenConvPrac != null){
            $this->eliminarImagen($nombreImagenConvPrac);
        } 
        
        if($nombreEnunciadoConvPrac != null){
            $this->eliminarEnunciado($nombreEnunciadoConvPrac);
        }
               
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite consultar el nombre de la imagen de una convocatoria comite
    public function consultarNombreImagenConvocatoriaComite($idCon){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_convocatoriacomite where Id = $idCon";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que permite consultar el nombre del enunciado de una convocatoria comite
    public function consultarNombreEnunciadoConvocatoriaComite($idCon){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_enunciado from tbl_convocatoriacomite where Id = $idCon";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_enunciado'];
        }
    }

    //Funcion que permite consultar el nombre de la imagen de una convocatoria practicas
    public function consultarNombreImagenConvocatoriaPracticas($idConPrac){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_convocatoriapracticas where Id = $idConPrac";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que permite consultar el nombre del enunciado de una convocatoria practicas
    public function consultarNombreEnunciadoConvocatoriaPracticas($idConPrac){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_archivo from tbl_convocatoriapracticas where Id = $idConPrac";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_archivo'];
        }
    }

    //Funcion que permite eliminar la imagen de una convocatoria
    public function eliminarImagen(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/convocatoriasImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

    //Funcion que permite eliminar el enunciado de una convocatoria
    public function eliminarEnunciado(string $nomEnun){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/convocatoriasFiles/".$nomEnun;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "El enunciado ($nomEnun) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el enunciado ($nomEnun)";
        }
    } 

    //Funcion que permite contar el numero de convocatorias de comite registradas
    public function contadorDeConvocatoriasComite(){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT COUNT(*) from tbl_convocatoriacomite where competenciasAsignadas='Si'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['COUNT(*)'];
        }
    }

    //Funcion que permite contar el numero de convocatorias de practicas registradas
    public function contadorDeConvocatoriasPracticas(){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT COUNT(*) from tbl_convocatoriapracticas";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['COUNT(*)'];
        }
    }

    //Funcion que clacula cuantas convocatorias hay registradas en el sistema
    public function contadorDeConvocatorias(){

        //Obtenemos cuantas convocatorias hayde comite y de practicas
        $numConvocatoriasComite = $this->contadorDeConvocatoriasComite();
        $numConvocatoriasPracticas = $this->contadorDeConvocatoriasPracticas();

        $totalConvocatorias = $numConvocatoriasComite + $numConvocatoriasPracticas;
        return $totalConvocatorias;
    }

    //Funcion que permite actualizar una convocatoria de tipo comite
    public function actualizarConvocatoriaComite(ConvocatoriaComite $convComEdit){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idConvComiteAEditar = $convComEdit->getId();
        $nombreConvComiteAEditar = $convComEdit->getNombre();
        $descripcionConvComiteAEditar = $convComEdit->getDescripcion();
        $fechaInicioConvComiteAEditar = $convComEdit->getFechaInicio();
        $fechaFinConvComiteAEditar = $convComEdit->getFechaFin();
        $profeEncargadoConvComiteAEditar = $convComEdit->getProfeEncargado();
                
        $sql = "UPDATE tbl_convocatoriacomite SET nombre_convocatoria='$nombreConvComiteAEditar', descripcion_convocatoria='$descripcionConvComiteAEditar', fecha_inicio='$fechaInicioConvComiteAEditar', fecha_fin='$fechaFinConvComiteAEditar', id_usuario='$profeEncargadoConvComiteAEditar'
                            WHERE  Id=$idConvComiteAEditar";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite actualizar una convocatoria de tipo practicas
    public function actualizarConvocatoriaPracticas(ConvocatoriaPracticas $convPracEdit){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idConvPracticasAEditar = $convPracEdit->getId();
        $nombreConvPracticasAEditar = $convPracEdit->getNombre();
        $descripcionConvPracticasAEditar = $convPracEdit->getDescripcion();
        $fechaInicioConvPracticasAEditar = $convPracEdit->getFechaInicio();
        $fechaFinConvPracticasAEditar = $convPracEdit->getFechaFin();
                        
        $sql = "UPDATE tbl_convocatoriapracticas SET nombre_convocatoria='$nombreConvPracticasAEditar', descripcion='$descripcionConvPracticasAEditar', fecha_inicio='$fechaInicioConvPracticasAEditar', fecha_fin='$fechaFinConvPracticasAEditar'
                            WHERE  Id=$idConvPracticasAEditar";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que elimina de base de datos el nombre de una imagen de una convocatoria comite
    public function limpiarNombreImagenConvocatoriaComite($nombreImgConCom){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_convocatoriacomite SET nombre_imagen = null WHERE  nombre_imagen='$nombreImgConCom'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el nombre de un enunciado de una convocatoria comite
    public function limpiarNombreEnunciadoConvocatoriaComite($nombreEnunConCom){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_convocatoriacomite SET nombre_enunciado = null WHERE  nombre_enunciado='$nombreEnunConCom'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que elimina de base de datos el nombre de una imagen de una convocatoria practicas
    public function limpiarNombreImagenConvocatoriaPracticas($nombreImgConPrac){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_convocatoriapracticas SET nombre_imagen = null WHERE  nombre_imagen='$nombreImgConPrac'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el nombre de un enunciado de una convocatoria practicas
    public function limpiarNombreEnunciadoConvocatoriaPracticas($nombreEnunConPrac){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_convocatoriapracticas SET nombre_archivo = null WHERE  nombre_archivo='$nombreEnunConPrac'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que nos permite identificar si una convocatoria practicas tiene un archivo de enunciado registrado
    public function consultarSiConvocatoriaPracticasTieneEnunciado(int $idConvPracticas){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_archivo from tbl_convocatoriapracticas where Id=".$idConvPracticas;
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_archivo'];
        }
    }

    //Funcion que nos permite identificar si una convocatoria practicas tiene una imagen registrada
    public function consultarSiConvocatoriaPracticasTieneImagen(int $idConvPract){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagen from tbl_convocatoriapracticas where Id=".$idConvPract;
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagen'];
        }
    }

    //Funcion que permite publicar una convocatoria comite
    public function publicarConvocatoria(int $idConv){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_convocatoriacomite SET competenciasAsignadas = 'Si' WHERE Id='$idConv'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que nos permite identificar si una convocatoria practicas tiene eportafolios postulados
    public function consultarSiConvocatoriaPracticasTieneEportafoliosPostulados(int $idConvPracti){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id_portafolioEstudiante from tbl_aplicacioneportafolio where id_convocatoria =".$idConvPracti;
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return true;
        }
    }

    //Funcion que permite consultar los ids de los eportafolios de los estudiantes que fueron postulados a una convocatoria
    public function consultarIdsEportafoliosEstudiantilesPostuladosAUnaConvocatoria(int $idConPr){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id_portafolioEstudiante from tbl_aplicacioneportafolio where id_convocatoria =".$idConPr;
        $result = mysqli_query($conexion, $sql);

        $emparrayIdsEportafolios = array();

        $contador = 0;
        while ($row = @mysqli_fetch_array($result)) {
            $emparrayIdsEportafolios[$contador] = $row['Id_portafolioEstudiante'];
            $contador++;
        }

        return $emparrayIdsEportafolios;
    }
}
?>
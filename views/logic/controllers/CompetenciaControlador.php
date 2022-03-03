<?php

class CompetenciaControlador{
   

    //Funcion que permite mostrar los datos de las competencias sean generales o especificas
    public function mostrarDatosCompetencias($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Funcion que permite el registro de las competencias generales
    public function insertarCompGeneral(CompetenciaGeneral $compGen){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idCompGen = $compGen->getId();
        $codigoCompGen = $compGen->getCodigo();
        $nombreCompGen = $compGen->getNombre();
        $rolCompGen = $compGen->getRolContribucion();
                        
        $sql = "INSERT INTO tbl_competencia_general (id_comp_gral, codigo, nombre_comp_gral, rol)
                            values ($idCompGen, '$codigoCompGen', '$nombreCompGen', '$rolCompGen')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar el badge oro de una competencia general
    public function subirBadgeOroCompGeneral($rutaBadge, $nombreBadgeOro, $imgBadge, $nombreCompetenciaGeneral){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgeOro = "UPDATE tbl_competencia_general SET nombre_badgeoro='$nombreBadgeOro' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
                    $resultadoGuardaNombreBadgeOro = mysqli_query($conexion, $queryGuardarNombreBadgeOro);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgeOro);

                }else{
                    echo "El badge oro de la competencia general no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

               //Guardamos el nombre de la imagen en la base de datos
               $queryGuardarNombreBadgeOro = "UPDATE tbl_competencia_general SET nombre_badgeoro='$nombreBadgeOro' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
               $resultadoGuardaNombreBadgeOro = mysqli_query($conexion, $queryGuardarNombreBadgeOro);

               //Renombramos la imagen con el nombre guardado en bd 
               rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgeOro);

            }else{
                echo "El badge oro de la competencia general no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el badge plata de una competencia general
    public function subirBadgePlataCompGeneral($rutaBadge, $nombreBadgePlata, $imgBadge, $nombreCompetenciaGeneral){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgePlata = "UPDATE tbl_competencia_general SET nombre_badgeplata='$nombreBadgePlata' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
                    $resultadoGuardaNombreBadgePlata = mysqli_query($conexion, $queryGuardarNombreBadgePlata);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgePlata);

                }else{
                    echo "El badge plata de la competencia general no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

               //Guardamos el nombre de la imagen en la base de datos
               $queryGuardarNombreBadgePlata = "UPDATE tbl_competencia_general SET nombre_badgeplata='$nombreBadgePlata' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
               $resultadoGuardaNombreBadgePlata = mysqli_query($conexion, $queryGuardarNombreBadgePlata);

               //Renombramos la imagen con el nombre guardado en bd 
               rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgePlata);

            }else{
                echo "El badge plata de la competencia general no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el badge bronce de una competencia general
    public function subirBadgeBronceCompGeneral($rutaBadge, $nombreBadgeBronce, $imgBadge, $nombreCompetenciaGeneral){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgeBronce = "UPDATE tbl_competencia_general SET nombre_badgebronce='$nombreBadgeBronce' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
                    $resultadoGuardaNombreBadgeBronce = mysqli_query($conexion, $queryGuardarNombreBadgeBronce);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgeBronce);

                }else{
                    echo "El badge bronce de la competencia general no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadge, '../badgesImages/'. $imgBadge)){

               //Guardamos el nombre de la imagen en la base de datos
               $queryGuardarNombreBadgeBronce = "UPDATE tbl_competencia_general SET nombre_badgebronce='$nombreBadgeBronce' WHERE nombre_comp_gral='$nombreCompetenciaGeneral'";
               $resultadoGuardaNombreBadgeBronce = mysqli_query($conexion, $queryGuardarNombreBadgeBronce);

               //Renombramos la imagen con el nombre guardado en bd 
               rename("../badgesImages/".$imgBadge, "../badgesImages/".$nombreBadgeBronce);

            }else{
                echo "El badge bronce de la competencia general no se pudo guardar";
            }
        } 
    }

    //Funcion que permite el registro de las competencias específicas
    public function insertarCompEspecifica(CompetenciaEspecifica $compEsp){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idCompEsp = $compEsp->getId();
        $idCompGenInvolucrada = $compEsp->getIdCompGeneral();
        $codigoCompEsp = $compEsp->getCodigo();
        $nombreCompEsp = $compEsp->getNombre();
        $rolCompEsp = $compEsp->getRolContribucion();
                        
        $sql = "INSERT INTO tbl_competencia_especifica (id_comp_esp, id_comp_gral, codigo, nombre_competencia_esp, rol)
                            values ($idCompEsp, '$idCompGenInvolucrada', '$codigoCompEsp', '$nombreCompEsp', '$rolCompEsp')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar el badge oro de una competencia especifica
    public function subirBadgeOroCompEspecifica($rutaBadgeEsp, $nombreBadgeOroEsp, $imgBadgeEsp, $nombreCompetenciaEsp){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgeOroEsp = "UPDATE tbl_competencia_especifica SET nombre_badgeoro='$nombreBadgeOroEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
                    $resultadoGuardaNombreBadgeOroEsp = mysqli_query($conexion, $queryGuardarNombreBadgeOroEsp);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgeOroEsp);

                }else{
                    echo "El badge oro de la competencia especifica no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

               //Guardamos el nombre de la imagen en la base de datos
               $queryGuardarNombreBadgeOroEsp = "UPDATE tbl_competencia_especifica SET nombre_badgeoro='$nombreBadgeOroEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
               $resultadoGuardaNombreBadgeOroEsp = mysqli_query($conexion, $queryGuardarNombreBadgeOroEsp);

               //Renombramos la imagen con el nombre guardado en bd 
               rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgeOroEsp);

            }else{
               echo "El badge oro de la competencia especifica no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el badge plata de una competencia especifica
    public function subirBadgePlataCompEspecifica($rutaBadgeEsp, $nombreBadgePlataEsp, $imgBadgeEsp, $nombreCompetenciaEsp){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgePlataEsp = "UPDATE tbl_competencia_especifica SET nombre_badgeplata='$nombreBadgePlataEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
                    $resultadoGuardaNombreBadgePlataEsp = mysqli_query($conexion, $queryGuardarNombreBadgePlataEsp);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgePlataEsp);

                }else{
                    echo "El badge plata de la competencia especifica no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreBadgePlataEsp = "UPDATE tbl_competencia_especifica SET nombre_badgeplata='$nombreBadgePlataEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
                $resultadoGuardaNombreBadgePlataEsp = mysqli_query($conexion, $queryGuardarNombreBadgePlataEsp);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgePlataEsp);

            }else{
                echo "El badge plata de la competencia especifica no se pudo guardar";
            }
        } 
    }

    //Funcion que permite cargar el badge bronce de una competencia especifica
    public function subirBadgeBronceCompEspecifica($rutaBadgeEsp, $nombreBadgeBronceEsp, $imgBadgeEsp, $nombreCompetenciaEsp){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta badgesImages
        if(!file_exists('../badgesImages')){
            mkdir('../badgesImages', 0777, true);

            if(file_exists('../badgesImages')){
                if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreBadgeBronceEsp = "UPDATE tbl_competencia_especifica SET nombre_badgebronce='$nombreBadgeBronceEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
                    $resultadoGuardaNombreBadgeBronceEsp = mysqli_query($conexion, $queryGuardarNombreBadgeBronceEsp);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgeBronceEsp);

                }else{
                    echo "El badge bronce de la competencia especifica no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaBadgeEsp, '../badgesImages/'. $imgBadgeEsp)){

               //Guardamos el nombre de la imagen en la base de datos
               $queryGuardarNombreBadgeBronceEsp = "UPDATE tbl_competencia_especifica SET nombre_badgebronce='$nombreBadgeBronceEsp' WHERE nombre_competencia_esp='$nombreCompetenciaEsp'";
               $resultadoGuardaNombreBadgeBronceEsp = mysqli_query($conexion, $queryGuardarNombreBadgeBronceEsp);

               //Renombramos la imagen con el nombre guardado en bd 
               rename("../badgesImages/".$imgBadgeEsp, "../badgesImages/".$nombreBadgeBronceEsp);

            }else{
                echo "El badge bronce de la competencia especifica no se pudo guardar";
            }
        } 
    }

    //Funcion que permite eliminar una competencia general
    public function eliminarCompetenciaGeneral($idCompGeneral){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_competencia_general where id_comp_gral = $idCompGeneral";

        //Consultamos los nombres de los badges de la competencia general
        $nombreBadgeOroParaEliminar = (string) $this->consultarNombreBadgeOroCompGeneral($idCompGeneral);
        $nombreBadgePlataParaEliminar = (string) $this->consultarNombreBadgePlataCompGeneral($idCompGeneral);
        $nombreBadgeBronceParaEliminar = (string) $this->consultarNombreBadgeBronceCompGeneral($idCompGeneral);        

        //Validamos que la competencia general tenga un nombre de imagen para cada badge
        if($nombreBadgeOroParaEliminar != null && $nombreBadgePlataParaEliminar != null && $nombreBadgeBronceParaEliminar != null){
            $this->eliminarImagenBadge($nombreBadgeOroParaEliminar);      
            $this->eliminarImagenBadge($nombreBadgePlataParaEliminar);        
            $this->eliminarImagenBadge($nombreBadgeBronceParaEliminar);
        }
               
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite consultar el nombre de un badge de oro a eliminar de una competencia general
    public function consultarNombreBadgeOroCompGeneral($idComGen){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgeoro from tbl_competencia_general where id_comp_gral = $idComGen";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgeoro'];
        }
    }

    //Funcion que permite consultar el nombre de un badge de plata a eliminar de una competencia general
    public function consultarNombreBadgePlataCompGeneral($idComGen){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgeplata from tbl_competencia_general where id_comp_gral = $idComGen";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgeplata'];
        }
    }

    //Funcion que permite consultar el nombre de un badge de bronce a eliminar de una competencia general
    public function consultarNombreBadgeBronceCompGeneral($idComGen){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgebronce from tbl_competencia_general where id_comp_gral = $idComGen";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgebronce'];
        }
    }

    //Funcion que permite eliminar la imagen de un badge
    public function eliminarImagenBadge(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $badgAEliminar = $base_dir."/MockupsPandora/views/badgesImages/".$nomImg;

        if(file_exists($badgAEliminar)){

            if(unlink($badgAEliminar)){}else{
                echo "El badge ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el badge ($nomImg)";
        }
    }

    //Funcion que permite eliminar una competencia especifica
    public function eliminarCompetenciaEspecifica($idCompEspecifica){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_competencia_especifica where id_comp_esp = $idCompEspecifica";

        //Consultamos los nombres de los badges de la competencia especifica
        $nombreBadgeOroParaEliminarEsp = (string) $this->consultarNombreBadgeOroCompEspecifica($idCompEspecifica);
        $nombreBadgePlataParaEliminarEsp = (string) $this->consultarNombreBadgePlataCompEspecifica($idCompEspecifica);
        $nombreBadgeBronceParaEliminarEsp = (string) $this->consultarNombreBadgeBronceCompEspecifica($idCompEspecifica);        

        //Validamos que la competencia especifica tenga un nombre de imagen para cada badge
        if($nombreBadgeOroParaEliminarEsp != null && $nombreBadgePlataParaEliminarEsp != null && $nombreBadgeBronceParaEliminarEsp != null){
            $this->eliminarImagenBadge($nombreBadgeOroParaEliminarEsp);      
            $this->eliminarImagenBadge($nombreBadgePlataParaEliminarEsp);        
            $this->eliminarImagenBadge($nombreBadgeBronceParaEliminarEsp);
        }
               
        return $result = mysqli_query($conexion, $sql);
    }

     //Funcion que permite consultar el nombre de un badge de oro a eliminar de una competencia especifica
     public function consultarNombreBadgeOroCompEspecifica($idComEsp){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgeoro from tbl_competencia_especifica where id_comp_esp = $idComEsp";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgeoro'];
        }
    }

    //Funcion que permite consultar el nombre de un badge de plata a eliminar de una competencia especifica
    public function consultarNombreBadgePlataCompEspecifica($idComEsp){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgeplata from tbl_competencia_especifica where id_comp_esp = $idComEsp";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgeplata'];
        }
    }

    //Funcion que permite consultar el nombre de un badge de bronce a eliminar de una competencia especifica
    public function consultarNombreBadgeBronceCompEspecifica($idComEsp){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_badgebronce from tbl_competencia_especifica where id_comp_esp = $idComEsp";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_badgebronce'];
        }
    }

    //Funcion que permite actualizar una competencia general
    public function actualizarCompetenciaGeneral(CompetenciaGeneral $compGeneralAEdit){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idCompGeneralAEditar = $compGeneralAEdit->getId();
        $codigoCompGeneralAEditar = $compGeneralAEdit->getCodigo();
        $nombreCompGeneralAEditar = $compGeneralAEdit->getNombre();
        $rolCompGeneralAEditar = $compGeneralAEdit->getRolContribucion();
        
                
        $sql = "UPDATE tbl_competencia_general SET codigo='$codigoCompGeneralAEditar', nombre_comp_gral='$nombreCompGeneralAEditar', rol='$rolCompGeneralAEditar'
                            WHERE  id_comp_gral=$idCompGeneralAEditar";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;

    }

    //Funcion que permite actualizar una competencia específica
    public function actualizarCompetenciaEspecifica(CompetenciaEspecifica $compEspecificaAEdit){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idCompEspecificaAEditar = $compEspecificaAEdit->getId();
        $idCompGeneralAQuePerteneceEdit = $compEspecificaAEdit->getIdCompGeneral();
        $codigoCompEspecificaAEditar = $compEspecificaAEdit->getCodigo();
        $nombreCompEspecificaAEditar = $compEspecificaAEdit->getNombre();
        $rolCompEspecificaAEditar = $compEspecificaAEdit->getRolContribucion();
        
                
        $sql = "UPDATE tbl_competencia_especifica SET id_comp_gral=$idCompGeneralAQuePerteneceEdit, codigo='$codigoCompEspecificaAEditar', nombre_competencia_esp='$nombreCompEspecificaAEditar', rol='$rolCompEspecificaAEditar'
                            WHERE  id_comp_esp = $idCompEspecificaAEditar";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    
    //Funcion que permite consultar la competencia general a editar
    public function consultarCompetenciaGeneralAEditar($idCompGeneralAEditar){
        
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT codigo, nombre_comp_gral, rol from tbl_competencia_general where id_comp_gral = $idCompGeneralAEditar";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            $nombreCompGeneralvAEditar = $row['nombre_comp_gral'];
            $codigoCompGeneralAEditar = $row['codigo'];
            $rolCompGeneralAEditar = $row['rol'];
           

            $objCompGenAEditar = new CompetenciaGeneral($idCompGeneralAEditar, $codigoCompGeneralAEditar, $nombreCompGeneralvAEditar, $rolCompGeneralAEditar);
            return $objCompGenAEditar;
        }
    }

    //Funcion que permite consultar la competencia especifica a editar
    public function consultarCompetenciaEspecificaAEditar($idCompEspAEditar){
        
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_comp_gral, codigo, nombre_competencia_esp, rol from tbl_competencia_especifica where id_comp_esp = $idCompEspAEditar";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            $idCompGralEditar = $row['id_comp_gral'];
            $codigoCompEspEditar = $row['codigo'];
            $nombreCompEspvAEditar = $row['nombre_comp_esp'];
            $rolCompEspAEditar = $row['rol'];          

            $objCompEspAEditar = new CompetenciaEspecifica($idCompEspAEditar, $idCompGralEditar, $codigoCompEspEditar, $nombreCompEspvAEditar, $rolCompEspAEditar);
            return $objCompEspAEditar;
        }
    }

    //Funcion que elimina de base de datos el nombre de un badge de oro de una competenecia general 
    public function limpiarNombreBadgeOroCompGeneral($nombrebadgeOroCG){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_general SET nombre_badgeoro = null WHERE  nombre_badgeoro='$nombrebadgeOroCG'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que elimina de base de datos el nombre de un badge de plata de una competenecia general 
    public function limpiarNombreBadgePlataCompGeneral($nombrebadgePlataCG){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_general SET nombre_badgeplata = null WHERE  nombre_badgeplata='$nombrebadgePlataCG'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que elimina de base de datos el nombre de un badge de bronce de una competenecia general
    public function limpiarNombreBadgeBronceCompGeneral($nombrebadgeBronceCG){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_general SET nombre_badgebronce = null WHERE  nombre_badgebronce='$nombrebadgeBronceCG'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el nombre de un badge de oro de una competenecia especifica 
    public function limpiarNombreBadgeOroCompEspecifica($nombrebadgeOroCE){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_especifica SET nombre_badgeoro = null WHERE  nombre_badgeoro='$nombrebadgeOroCE'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que elimina de base de datos el nombre de un badge de plata de una competenecia especifica
    public function limpiarNombreBadgePlataCompEspecifica($nombrebadgePlataCE){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_especifica SET nombre_badgeplata = null WHERE  nombre_badgeplata='$nombrebadgePlataCE'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el nombre de un badge de bronce de una competenecia especifica
    public function limpiarNombreBadgeBronceCompEspecifica($nombrebadgeBronceCE){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_competencia_especifica SET nombre_badgebronce = null WHERE  nombre_badgebronce='$nombrebadgeBronceCE'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que consulta el id de la asignacion de competencias generales realizadas a un evento
    public function consultarIdDeSeleccionDeCompetenciasGenerales(string $strSeleccionCompGenerales){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id from tbl_contribcompgenerales_actividad where compAContribuir = $strSeleccionCompGenerales";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['Id'];
        }
    }

    //Funcion que permite consultar los codigos de las competencias especificaas para su evaluación
    public function consultarCodigosDeCompetenciasEspecificas(string $strSeleccionCompGenerales){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT codigo from tbl_competencia_especifica where id_comp_gral in ($strSeleccionCompGenerales)";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['codigo'];
        }
    }

    //Funcion que nos permite verificar si el evento tiene un registro de competencias generales previo
    public function verificarSiElEventoTieneRegistroDeCompGenerales(int $idDelEvento){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT compAContribuir from tbl_contribcompgenerales_actividad where id_actividad =".$idDelEvento." and tipo_actividad = 'EVENTO'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return true;
        }
    }

    //Funcion que nos permite verificar si la convocatoria tiene un registro de competencias generales previo
    public function verificarSiLaConvocatoriaTieneRegistroDeCompGenerales(int $idDeConvocatoria){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT compAContribuir from tbl_contribcompgenerales_actividad where id_actividad =".$idDeConvocatoria." and tipo_actividad = 'CONVOCATORIA'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return true;
        }
    }

}
?>
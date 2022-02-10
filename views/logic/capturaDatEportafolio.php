<?php

    //Capturamos el evento del boton de compartir eportafolio
    if(isset($_POST['enviarEportafolio'])){

        //Capturamos los datos de los campos del formulario
        $emailDestino = trim($_POST['correoDestino']);

        //Validamos que los campos no se encuentren vacios
        if(strlen($emailDestino) >= 1){

            $desde = "From:". "Equipo Pandora";
            $asunto = "Asunto de prueba";
            $mensaje = "Este es un correo de prueba emitido por el sistema Pandora";
            mail($emailDestino, $asunto, $mensaje, $desde);
                
            ?>  
            <script>alert('Eportafolio compartido satisfactoriamente');</script>  
            <?php

        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Error al compartir e-portafolio</h3>  
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);             
        }
    }     
    

?>
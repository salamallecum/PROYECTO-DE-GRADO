<?php

include("logic/conexionDB.php");
                                        
if(isset($_POST['analisiscomp'])){

    //Cargamos el array de las competencias generales seleccionadas
    $compGenerales = $_POST['competencias'];

    if($compGenerales == null){
    ?>    
        <h3 class="indicadorDeError">* Seleccione las competencias generales a las que contribuye el evento</h3> 
    <?php
    }else{
        print_r($compGenerales);
    }
}
?>






    
    
    
    
    
    
    
    
    
    










?>

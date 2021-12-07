<?php

//IMportamos la conexion
//Creamos laconexion a la BD
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'pandora');

if(isset($_POST['registraProfesor']))
{
    //Capturamos los datos del form
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];
    $email = $_POST['email'];

    $query = " INSERT INTO tbl_usuario (`nombres_usuario`,`apellidos_usuario`,`username`,`password`, `pais`,`ciudad`,`correo_usuario`, `id_rol`) VALUES ('$nombres','$apellidos','$username','$password','Colombia','Bogotá','$email',2)";
   
    //Ejecutamos el query
    $query_run = mysqli_query($connection, $query);

    //Le mostramos al usuario si la transaccin se realizó o no
    if($query_run){
        header("Location:./RegistroDeProfesores_Comite.php");
    }
    
}

?>
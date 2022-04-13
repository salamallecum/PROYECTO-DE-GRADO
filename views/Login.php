<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/loginStyles.css"/>
        <link rel="stylesheet" href="assets/css/indexStyles.css"/>       
        
    </head>
    <body>
         <!--===== HEADER =====-->
         <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="../index.php" class="nav__logo"><img src="assets/images/logo_pandora.PNG"/></a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="../index.php" class="nav__link">Home</a></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main>
            <br>
            <br>
            <br>
            
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="logic/capturaDatEstudiante.php" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" id="txt_usuario" name="user" placeholder="Usuario" maxlength="10">
                        <input type="password" id="txt_clave" name="password" placeholder="Contraseña" maxlength="10">
                        <button id="btnLogin" type="submit" name="autenticarUsuario" title="Ingresar">Entrar</button>
                    </form>
                    <?php include("logic/capturaDatEstudiante.php") ?>

                    <!--Register-->
                    <form action="logic/capturaDatEstudiante.php" class="formulario__register" method="POST">
                        <h2>Regístrarse</h2>
                        <input type="text" id="txt_nombres" name="nombres" placeholder="Nombres" maxlength="30" required="true">
                        <input type="text" id="txt_apellidos" name="apellidos" placeholder="Apellidos" maxlength="30" required="true">
                        <input type="email" id="txt_correo" name="email" placeholder="Correo Electronico" maxlength="40" required="true">
                        <input type="text" id="txt_user" name="usuario" placeholder="Usuario" maxlength="10" required="true">
                        <input type="password" id="txt_contraseña" name="clave" placeholder="Contraseña" maxlength="10" required="true">
                        <button id="btnRegistro" type="submit" name="registrarEstudiante" title="Registrarse">Regístrarse</button>
                    </form>
                    <?php include("logic/capturaDatEstudiante.php") ?>
                    <br>
                </div>
            </div>

       </main>
       
        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/Login.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </body>

    <!--Script que permite notificar al usuario si los campos estan incompletos o si el registro fue exitoso-->
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#btnRegistro').click(function() {

                //Capturamos los datos del formulario
                var nombresEstudiante = document.getElementById('txt_nombres').value;
                var apellidosEstudiante = document.getElementById('txt_apellidos').value;
                var correoEstudiante = document.getElementById('txt_correo').value;
                var userEstudiante = document.getElementById('txt_user').value;
                var claveEstudiante = document.getElementById('txt_contraseña').value;

                if(nombresEstudiante != "" && apellidosEstudiante != "" && correoEstudiante != "" && userEstudiante != "" && claveEstudiante != ""){
                    alert("Usuario registrado satisfactoriamente");
                }else{
                    alert("Por favor diligencie todos los campos");
                }
                
            });
        });
    </script>

</html>
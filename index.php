<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
              
        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>   
        
        <link rel="shortcut icon" href="views/assets/images/favicon.png">

         <!--Links Scripts de estilos-->
         <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> 
         
         <link rel="stylesheet" href="views/assets/css/indexStyles.css">
         
         <!--Links scripts de eventos js-->
         <script defer src="views/assets/js/Index.js" type="module"></script>
         
         <script src="views/assets/js/jquery-3.6.0.js"></script>
         

        <title>Pandora</title>
    </head>

    <body>
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="#" class="nav__logo"><img src="views/assets/images/logo_pandora.PNG"/></a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">¿Cómo funciona?</a></li>
                        <li class="nav__item"><a href="#skills" class="nav__link">Badges</a></li>
                        <li class="nav__item"><a href="#work" class="nav__link">Equipo</a></li>
                        <li class="nav-btn">
                            <a href="views/Login.php" class="btn-link" >
                                <button class="btn_signUp" title="Sign Up">Sign Up</button>
                            </a>                       
                        </li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home bd-grid" id="home">
                
                <div class="home__hero-section darkbg">
                    <div class=home_container>
                        <div class="row home__hero row">
                            <div class="columna_texto">
                                <div class="ajuste_columna">
                                    
                                    <div class="titulo_eportafolio">ePortafolio</div>                    
                                    
                                    <h1 class="home_descripcion">Organiza, almacena,<br>muestra y comparte<br>tus logros</h1>
                                    <p class="introduccion">En este espacio, podrás demostrar tus habilidades<br>mientras que obtienes insignias que certifican tus<br>trabajos académicos.</p>
                                    <br>
                                    <a href="views/DashBoard_Estudiante.php" class="button_comienza" title="Comienza">Comienza</a>
                                </div>
                            </div>
                            
                            <div class="columna_imagen">
                                <div class="home__imagenPrincipal">    
                                    <img src="views/assets/images/img_home.PNG" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </section>

            <!--===== COMO FUNCIONA =====-->
            <section class="about section " id="about">
                <h2 class="section-title">¿Cómo funciona?</h2>

                <div class="about__container bd-grid">
                    <div class="about_img">
                        <img src="views/assets/images/esquema_general_pandora.PNG" alt="">
                    </div>
                    
                    <div>
                        <h1 class="comofunc_descripcion1">Lleva tus trabajos<br>academicos más alla<br>del aula</h1>
                        <p class="comofunc_descripcion2">En este espacio, podrás demostrar tus habilidades<br>mientras que obtienes insignias que certifican tus<br>trabajos académicos.</p>           
                        <br>
                        <a href="views/DashBoard_Comite.php" class="button_comienza" title="Comienza">Comienza</a>
                    </div>                                   
                </div>
            </section>

            <!--===== BADGES =====-->
            <section class="skills section" id="skills">
                <h2 class="section-title">BADGES</h2>                   
                <p class="descripcionDeBadges">Representan las competencias propuestas por el programa académico.</p>
                <br>
                <br>

                <div class="slick-list" id="slick-list">
                    <button class="slick-arrow slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                    </button>
                    <div class="slick-track" id="track">
                        
                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Formado dentro del enfoque biopsicosocial y cultural.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Profesional con sólidos conocimientos en informática.</p>
                            </div>                            
                        </div>
                        
                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Diseña y construye sistemas de información.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Está en la capacidad de ejercer su profesión en contextos locales y globales.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Propone y gestiona proyectos para la transferencia adecuada y responsable de las TIC.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Posee actitud crítica e investigativa.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Capacitado para investigar generando conocimiento que proporcione valor agregado dentro de la profesión.</small><br></h4>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Idóneo para trabajo en equipos interdisciplinarios.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Demuestra dominio de un segundo idioma.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Cumple políticas de calidad estándares locales y globales.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Emprendimiento.</p>
                            </div>                            
                        </div>

                        <div class="slick">
                            <div class="contenedorImg">
                                <img class="img_badge" src="views/assets/images/carruselBadges_img/badge_prueba muestreo.png" alt="">
                            </div>
                            
                            <div class="contenedorDescripcion">
                                <p class="descripcionBadge">Interpreta el entorno en su complejidad.</p>
                            </div>                            
                        </div>
                    </div>
                    <button class="slick-arrow slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                    </button>
                </div>
                                    
            </section>

            <!--===== Equipo de trabajo =====-->
            <section class="work section" id="work">
                <h2 class="section-title">Equipo de trabajo</h2>
                <div class="project-wrapper">
                    
                    <section class="project-list">
                        <div class="project-item">
                            <img src="views/assets/images/team/alejo.jpeg" alt="">
                            <a href="#">Alejandro Amaya</a>

                            <div class="memberTeamInfo">
                                <p class="infoMember">Estudiante de Ingeniería de Sistemas con conocimientos sólidos de programación en lenguaje Java, Python; Desarrollo web mediante JavaScript, HTML5, CSS; Gestión de Bases de datos mediante MySQL, PostgreSQL, SQLite y Desarrollo de apps móviles mediante Android Studio.</p>
                            </div>

                            <div class="memberSocialInfo">
                                <ul>
                                    <table>
                                        <tr>
                                            <td><a href="https://es-la.facebook.com/alejo.amayatorres" target="_blank" ><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a></td>                                           
                                            <td><table><tr><td></td></tr><tr><td></td></tr></table></td>
                                            <td><a href="#" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a></td>
                                        </tr>
                                    </table> 
                                </ul>
                            </div>
                        </div>

                        <div class="project-item">
                            <img src="views/assets/images/team/lorena.jpeg" alt="">
                            <a href="#">Lorena Rodriguez</a>

                            <div class="memberTeamInfo">
                                <p class="infoMember">Estudiante de Ingenería de Sistemas con experiencia en
                                    los procesos de gestión de tecnología, así como también con conocimientos en
                                    SQL, Java, .Net,  virtualización, configuración de routers y switches Cisco, certificación en ITIL Foundation V4.</p>
                            </div>

                            <div class="memberSocialInfo">
                                <ul>
                                    <table>
                                        <tr>
                                            <td><a href="#" target="_blank"><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a></td>                                           
                                            <td><table><tr><td></td></tr><tr><td></td></tr></table></td>
                                            <td><a href="#" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a></td>
                                        </tr>
                                    </table>                                 
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>                    
            </section>             
        </main>

    </body>
</html>
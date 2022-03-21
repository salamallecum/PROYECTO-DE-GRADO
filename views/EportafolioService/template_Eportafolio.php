<?php

require_once "controllers/EstudianteControlador.php";

    function getEportafolio(int $idDelEstudiante){

        $userControla = new EstudianteControlador();

        $plantillaEportafolio = '<body>

                                    <!--ENCABEZADO DE DATOS PERSONALES-->
                                    <div class="encabezado">
                                        
                                            
                                        <div class="cardImage">
                                            <img class="imgEncabezadoInfoEstudiante" src="../assets/images/uebAereaEportafolio.png">
                                        </div>';

                                        '<div class="card-Estudiante">
                                                
                                            <div class="pnl-infoPersonal">
                                                <div class="logoP">
                                                    <img class="logoPandora" src="../assets/images/logo_pandora.PNG" alt="Logo oficial Pandora">
                                                </div>
                                            </div>';

                                        //Trae la informacion del estudiante al eportafolio     
                                        $sql = "SELECT nombres_usuario, apellidos_usuario, ciudad, direccion, telefono, correo_usuario from tbl_usuario where id_usuario = $idDelEstudiante";
                                        $datos = $userControla->mostrarDatosEstudiante($sql);
                                        foreach ($datos as $key){

                                            $plantillaEportafolio .= '<div class="informacionPersonal">

                                                                        <table>
                                                                            <tr>
                                                                                <td> <div class="cardInfoPersonal"> 
                                                                                    <img class="fotoDelEstudiante" src="../assets/images/team/alejo.jpeg" alt="Foto de perfil estudiante">                        
                                                                                </div></td>

                                                                                <td> <div class="cardInfoPersonal">
                                                                        
                                                                                    <table class="tableDatosP">
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Nombres:</p></td>
                                                                                            <td><p class="txt_info">'. $key["nombres_usuario"] .'</p></td>
                                                                                        </tr>
                                                                                        
                                                            
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Apellidos:</p></td>
                                                                                            <td><p class="txt_info">'. $key["apellidos_usuario"] .'</p></td>
                                                                                        </tr>
                                                            
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Dirección:</p></td>
                                                                                            <td><p class="txt_info">'. $key["direccion"] .'</p></td>
                                                                                        </tr>
                                                            
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Ciudad:</p></td>
                                                                                            <td><p class="txt_info">'. $key["ciudad"] .'</p></td>
                                                                                        </tr>
                                                            
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Teléfono:</p></td>
                                                                                            <td><p class="txt_info">'. $key["telefono"] .'</p></td>
                                                                                        </tr>
                                                            
                                                                                        <tr class="casillaDato">
                                                                                            <td><p class="lblDatos">Correo:</p></td>
                                                                                            <td><p class="txt_info">'. $key["correo_usuario"] .'</p></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>';                  
                                                                
                                        }

                                        
                                    
                                    $plantillaEportafolio .='</div>
                                    </div><!--PERFIL PROFESIONAL-->
                                    <div class="cardPerfProfesional">
                                        <div class="perfProfesional">
                                            <p class="tituloPerfProfesional">Perfil profesional</p>
                                            
                                            <p class="descripPerfProfesional">Estudiante de Ingeniería de Sistemas con conocimientos sólidos de programación en lenguaje Java,
                                            Python; Desarrollo web mediante JavaScript, HTML5, CSS; Gestión de Bases de datos mediante MySQL, PostgreSQL, SQLite y Desarrollo de apps 
                                            móviles mediante Android Studio.</p>
                                        </div>
                                    </div>

                                    <!--GRAFICO DE PERFILAMIENTO PANDORA-->
                                    <div class="cardGraficoPerfilamiento">
                                        <div class="grafPerfilamiento">
                                            <p class="tituloGrafPerfilamiento">Gráfico de perfilamiento PANDORA</p>

                                            <table class="tablaGraficoPerfilamiento">
                                                <tr>
                                                    <td><img id="img_graficoRolDelEstudiante" class="grafPerfPandora" src="graficaRolScreenshots/captura_6232abd3bcc16.png" alt="Gráfico del rol"></td>
                                                    <td><img id="img_rolDelEstudiante" class="img_perfRol" src="../assets/images/roles/noblider2.jpg" alt="Avatar del rol"></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                    <!--TRABAJOS DESTACADOS-->
                                    <div class="cardTrabajosDestacados">
                                        <div class="trabajosDestacados">
                                            <p class="tituloTrabDestacados">Trabajos destacados</p>
                                            <p class="tituloEvidencias">Haga click sobre cada uno de los iconos para ver las evidencias...</p>
                                        </div>

                                        <div class="cardTrabajoDestacado">
                                            <div class="tituloTrabDestacado">
                                                <p class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</p>                    
                                            </div>
                                            
                                            <table>
                                                <tr>
                                                    <td>
                                                        <img class="imagenDelTrabajoDestacado" src="../assets/images/imgPorDefecto.jpg" alt="Imagen del trabajo destacado">    
                                                    </td>

                                                    <td>
                                                        <p class="tituloDescripcion">Descripción:</p>
                                                        <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                                                        <p class="descripcionDelTrabajoDestacado">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excep.</p>
                                                    </td>

                                                    <td>
                                                        <table class="tablaDeEvidencias"> 
                                                            <tr>
                                                                <td class="casillaEvidencia"><a href="https://www.w3schools.com/tags/att_a_target.asp" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG" alt="Icono evidencia documento"></a></td>
                                                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png" alt="Icono evidencia codigo"></a></td>
                                                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png" alt="Icono evidencia video"></a></td>
                                                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png" alt="Icono evidencia presentacion"></a></td>
                                                            </tr>
                                                        </table>                
                                                    </td>
                                                </tr>
                                            </table>                                                                                
                                        </div>            
                                    </div>
                           

                                    <!--INSIGNIAS-->
                                    <div class="cardInsignias">
                                        <div class="insignias">
                                            <p class="tituloInsignias">Insignias</p>
                                            <p class="tituloEvidencias">Haga click sobre cada uno de los iconos para ver las evidencias...</p>
                                        </div>

                                        <div class="contenedorMegaInsignias">
                                            <p class="tituloMegaInsignias">MegaInsignias obtenidas:</p>
                                        
                                            <div class="cardTrabajoDestacadoConMegainsig">
                                                <div class="tituloTrabDestacado">
                                                    <p class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</p>                    
                                                </div>  
                                                
                                                <table>
                                                    <tr>
                                                        
                                                        <td>
                                                            <img class="megaInsigDelTrabajo" src="../assets/images/badge_prueba muestreo.png" alt="Imagen trabajo destacado">
                                                            <br>
                                                            <br>
                                                        </td>
                                                    
                                                        <td>
                                                            <img class="imagenDelTrabajoDestacadoConInsig" src="../assets/images/imgPorDefecto.jpg" alt="Imagen trabajo destacado">
                                                        </td>

                                                        <td>
                                                            <p class="tituloDescripcionTrabajoConInsig">Descripción:</p>
                                                            <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                                                            <p class="descripcionDelTrabajoDestacadoConMegaInsig">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                                        </td>

                                                        <td>
                                                            <table class="tablaDeEvidencias"> 
                                                                <tr>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG" alt="Icono evidencia documento"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png" alt="Icono evidencia codigo"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png" alt="Icono evidencia video"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png" alt="Icono evidencia presentacion"></a></td>
                                                                </tr>
                                                            </table>                
                                                        </td>
                                                    </tr>
                                                </table>                                                                                        
                                            </div>            
                                        </div>

                                        <br>
                                        <br>                                        

                                        <div class="contenedorInsignias">
                                            <p class="tituloMegaInsignias">Insignias obtenidas:</p>

                                            <div class="cardTrabajoDestacadoConInsig">
                                            
                                                <div class="tituloTrabDestacado">
                                                    <p class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</p>                    
                                                </div>  

                                                <table>
                                                    <tr>
                                                        <td> 
                                                            <img class="insigDelTrabajo" src="../assets/images/badge_prueba muestreo.png" alt="Imagen trabajo destacado">
                                                        </td>

                                                        <td> 
                                                            <img class="imagenDelTrabajoDestacadoConInsig" src="../assets/images/imgPorDefecto.jpg" alt="Imagen trabajo destacado">
                                                        </td>

                                                        <td>                 
                                                            <p class="tituloDescripcionTrabajoConInsig">Descripción:</p>
                                                            <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                                                            <p class="descripcionDelTrabajoDestacadoConInsig">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excep.</p>
                                                        </td>

                                                        <td>
                                                            <table class="tablaDeEvidencias"> 
                                                                <tr>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG" alt="Icono evidencia documento"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png" alt="Icono evidencia codigo"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png" alt="Icono evidencia video"></a></td>
                                                                    <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png" alt="Icono evidencia presentacion"></a></td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                                    </tr>
                                                </table>
                                                                       
                                            </div>   
                                        </div>
                                    </div>

                                    <!--PIE DE EPORTAFOLIO - SELLO PANDORA-->
                                    <div class="cardSelloPandora">
                                        <p class=selloPandora>© Pandora</p>                                        
                                    </div>
                                
                            </body>';

        return $plantillaEportafolio;
    }

    

?>
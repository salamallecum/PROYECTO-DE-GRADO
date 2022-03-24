<?php

include "EportafolioService/controllers/EstudianteControlador.php";
include "EportafolioService/controllers/EportafolioControlador.php";


$estudianteControla = new EstudianteControlador();
$eportafolioControla = new EportafolioControlador();

//Aqui capturamos el id del eportafolio seleccionado por el usuario enviado por el link
if($_GET['Id_estudiante'] != 0){

    $idEportafolioSeleccionado = $_GET['Id_estudiante'];

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>E-portafolio Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/EportafolioStyles.css">
        <link rel="stylesheet" href="https:/cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesPlantillaEportafolioPandora.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>

        <!--Link Html2Canvas-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>

    </head>

    <body>

        <!--ENCABEZADO DE DATOS PERSONALES-->
        <div class="encabezado">
            <div class="cardEncabezado">

                <div class="cardImage">
                    <img class="imgEncabezadoInfoEstudiante" src="assets/images/uebAereaEportafolio.png" alt="">
                </div>

                <div class="card-Estudiante">
                        
                    <div class="pnl-infoPersonal">
                        <div class="logoP">
                            <img class="logoPandora" src="assets/images/logo_pandora.PNG" alt="">
                        </div>
                    </div>

                    <div class="informacionPersonal">

            <?php
                //Consultamos los datos personales dele estudiante para su muestreo en el eportafolio online
                $sqlDatEstudiante = "SELECT nombres_usuario, apellidos_usuario, ciudad, direccion, telefono, correo_usuario, foto_usuario, descripcion from tbl_usuario where id_usuario=".$idEportafolioSeleccionado;
                $datosEstudiante = $estudianteControla->mostrarDatosEstudiante($sqlDatEstudiante);
                foreach ($datosEstudiante as $key){
            ?>
                
                    <?php 
                        //Aqui se traen las imagenes de cada convocatoria
                        $fotoDelEstudiante = $key['foto_usuario'];

                        if($fotoDelEstudiante != null){
                    ?>
                            <div class="cardInfoPersonal">
                                <img class="fotoDelEstudiante" src="<?php echo "userprofileImages/".$fotoDelEstudiante?>" alt="">
                            </div>

                    <?php
                        }else{
                    ?>

                            <div class="cardInfoPersonal">
                                <img class="fotoDelEstudiante" src="assets/images/imgPorDefecto.jpg" alt="">
                            </div>
                    <?php
                        }
                    ?>
        
                        <div class="cardInfoPersonal">
                        
                            <table class="tableDatosP">
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Nombres:</label></td>
                                    <td><label class="txt_info"><?php echo $key['nombres_usuario']; ?></label></td>
                                </tr>
                                
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Apellidos:</label></td>
                                    <td><label class="txt_info"><?php echo $key['apellidos_usuario']; ?></label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Dirección:</label></td>
                                    <td><label class="txt_info"><?php echo $key['direccion']; ?></label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Ciudad:</label></td>
                                    <td><label class="txt_info"><?php echo $key['ciudad']; ?></label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Teléfono:</label></td>
                                    <td><label class="txt_info"><?php echo $key['telefono']; ?></label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Correo:</label></td>
                                    <td><label class="txt_info"><?php echo $key['correo_usuario']; ?></label></td>
                                </tr>
                            </table>
                           
                        </div>
                    </div>                  
                </div>
            </div>
        </div>

        <!--PERFIL PROFESIONAL-->
        <div class="cardPerfProfesional">
            <div class="perfProfesional">
                <label class="tituloPerfProfesional">Perfil profesional</label>
                <br>
                <br>
                <p class="descripPerfProfesional"><?php echo $key['descripcion']; ?></p>
            </div>
            <?php
                }  
} 
            ?> 
        </div>


































        <!--GRAFICO DE PERFILAMIENTO PANDORA-->
        <div class="cardGraficoPerfilamiento">
            <div class="grafPerfilamiento">
                <label class="tituloGrafPerfilamiento">Gráfico de perfilamiento PANDORA</label>
                <br>
                <br>

                <div class="perfPandora">
                    <!--Linea de codigo que invoca el grafico de perfilamiento-->
                    <canvas id="grafPerfPandora"></canvas>
                </div>

                <div class="perfPandora">
                    <img id="img_rolDelEstudiante" class="img_perfRol" src="assets/images/roles/noblider2.jpg" alt="">
                </div>
            </div>
        </div>

        <!--TRABAJOS DESTACADOS-->
        <div class="cardTrabajosDestacados">
            <div class="trabajosDestacados">
                <label class="tituloTrabDestacados">Trabajos destacados</label>
                <br>
                <br>
                <label class="tituloEvidencias">Haga click sobre cada uno de los iconos para ver las evidencias...</label>
                <br>
            </div>

            <div class="cardTrabajoDestacado">
                
                <div class="tituloTrabDestacado">
                    <label class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</label>                    
                </div>              
                                
                <div class="alineacionCompTrabajoDestacado">
                    <img class="imagenDelTrabajoDestacado" src="assets/images/imgPorDefecto.jpg">    
                </div>

                <div class="alineacionCompTrabajoDestacado">
                    <div class="descripcionTrabajo">
                        <label class="tituloDescripcion">Descripción:</label>
                        <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                        <p class="descripcionDelTrabajoDestacado">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excep.</p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

                <div class="alineacionCompTrabajoDestacado">
                    <table class="tablaDeEvidencias"> 
                        <tr>
                            <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>
                            <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>
                            <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>
                            <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>
                        </tr>
                    </table>                
                </div>                          
            </div>            
        </div>

        <!--INSIGNIAS-->
        <div class="cardInsignias">
            <div class="insignias">
                <label class="tituloInsignias">Insignias</label>
                <br>
                <br>
                <label class="tituloEvidencias">Haga click sobre cada uno de los íconos para ver las evidencias por las cuales fue certificado el trabajo...</label>
                <br>
                <br>
            </div>

            <div class="contenedorMegaInsignias">
                <label class="tituloMegaInsignias">MegaInsignias obtenidas:</label>
                <br>
            
                <div class="cardTrabajoDestacadoConMegainsig">
                
                    <div class="tituloTrabDestacado">
                        <label class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</label>                    
                    </div>  
                    
                    <div class="alineacionCompTrabajoDestacado">
                        <img class="megaInsigDelTrabajo" src="assets/images/badge_prueba muestreo.png">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                                    
                    <div class="alineacionCompTrabajoDestacado">
                        <img class="imagenDelTrabajoDestacadoConInsig" src="assets/images/imgPorDefecto.jpg">
                    </div>
    
                    <div class="alineacionCompTrabajoDestacado">
                        <div class="descripcionTrabajoConMegaInsig">
                            <label class="tituloDescripcionTrabajoConInsig">Descripción:</label>
                            <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                            <p class="descripcionDelTrabajoDestacadoConMegaInsig">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excep.</p>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
    
                    <div class="alineacionCompTrabajoDestacado">
                        <table class="tablaDeEvidencias"> 
                            <tr>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>
                            </tr>
                        </table>                
                    </div>                          
                </div>            
            </div>

            <br>
            <br>

            <div class="contenedorInsignias">
                <label class="tituloMegaInsignias">Insignias obtenidas:</label>
                <br>

                <div class="cardTrabajoDestacadoConInsig">
                
                    <div class="tituloTrabDestacado">
                        <label class="lblTituloTrabajo">TITULO TRABAJO DESTACADO</label>                    
                    </div>  
                    
                    <div class="alineacionCompTrabajoDestacado">
                        <img class="insigDelTrabajo" src="assets/images/badge_prueba muestreo.png">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                                    
                    <div class="alineacionCompTrabajoDestacado">
                        <img class="imagenDelTrabajoDestacadoConInsig" src="assets/images/imgPorDefecto.jpg">
                    </div>
    
                    <div class="alineacionCompTrabajoDestacado">
                        <div class="descripcionTrabajoConInsig">
                            <label class="tituloDescripcionTrabajoConInsig">Descripción:</label>
                            <!--La descripcion del trabajo no puede tener mas de 500 caracteres-->
                            <p class="descripcionDelTrabajoDestacadoConInsig">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excepturi voluptate officiis labore ipsam ratione repudiandae ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum consequuntur magni aut ut, dicta dolor sit dignissimos corrupti accusamus dolorem quidem, earum excep.</p>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
    
                    <div class="alineacionCompTrabajoDestacado">
                        <table class="tablaDeEvidencias"> 
                            <tr>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>
                                <td class="casillaEvidencia"><a href="#" target="_blank" class="linkDeEvidencia"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>
                            </tr>
                        </table>                
                    </div>                          
                </div>   
            </div>
        </div>

        <!--PIE DE EPORTAFOLIO - SELLO PANDORA-->
        <div class="cardSelloPandora">
            <p class=selloPandora>© Pandora</p>

            <a href="EportafolioService/generaPDF.php" target="_blank" class="btn_descargarConvocatoria" title="Descargar E-portafolio">Descargar</a>
        
        </div>


        <!--Definimos la logica del link para descargar eportafolio, con el fin de tomar captura al grafico de rol del estudiante-->
        <script type='text/javascript'>
            
            //Definimos el botón para escuchar su click
            const $boton = document.querySelector(".btn_descargarConvocatoria"), // El botón que desencadena
            $objetivo = document.getElementById('grafPerfPandora'); // A qué le tomamos la foto

            const enviarCapturaAServidor = canvas => {
                // Cuando se resuelva la promesa traerá el canvas
                // Convertir la imagen a Base64
                let imagenComoBase64 = canvas.toDataURL();
                // Codificarla, ya que a veces aparecen errores si no se hace
                imagenComoBase64 = encodeURIComponent(imagenComoBase64);
                // La carga útil como JSON
                const payload = {
                    "captura": imagenComoBase64
                };
                // Aquí la ruta en donde enviamos la foto. Podría ser una absoluta o relativa
                const ruta = "PDFService/graficaRolScreenshots/guardarImgGraficoRoles.php";
                fetch(ruta, {
                    method: "POST",
                    body: JSON.stringify(payload),
                    headers: {
                    "Content-type": "application/x-www-form-urlencoded",
                    }
                })
                    .then(resultado => {
                        // A los datos los decodificamos como texto plano
                        return resultado.text()
                        })
                        .then(nombreDeLaFoto => {
                        // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
                        //console.log({ nombreDeLaFoto });
                        //alert(`Guardada como ${nombreDeLaFoto}`);

                    });
            };

            // Agregar el listener al botón
            $boton.addEventListener("click", () => {
                html2canvas($objetivo) // Llamar a html2canvas y pasarle el elemento
                    .then(enviarCapturaAServidor); // Cuando se resuelva, enviarla al servidor
            });
        </script>
    </body>
</html>
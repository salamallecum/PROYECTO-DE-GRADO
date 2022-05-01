<?php

require_once "EportafolioService/controllers/StudentControlador.php";
require_once "EportafolioService/controllers/EportafolioControlador.php";
require_once "EportafolioService/controllers/TrabajoDestacadoControlador.php";
require_once "logic/controllers/CompetenciaControlador.php";


$estudianteControla = new StudentControlador();
$eportafolioControla = new EportafolioControlador();
$trabajoDestControla = new TrabajoDestacadoControlador();
$competenciaControla = new CompetenciaControlador();


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
                //Consultamos los datos personales del estudiante para su muestreo en el eportafolio online
                $sqlDatEstudiante = "SELECT nombres_usuario, apellidos_usuario, ciudad, direccion, telefono, correo_usuario, foto_usuario, descripcion from tbl_usuario where id_usuario=".$idEportafolioSeleccionado;
                $datosEstudiante = $estudianteControla->mostrarDatosEstudiante($sqlDatEstudiante);
                foreach ($datosEstudiante as $key){
            ?>
                
                    <?php 
                        //Aqui se trae la foto de perfil del estudiante
                        $fotoDelEstudiante = $key['foto_usuario'];

                        if($fotoDelEstudiante != null){
                    ?>
                            <div class="cardInfoPersonal">
                                <img class="fotoDelEstudiante" src="<?php echo "profileImages/".$fotoDelEstudiante?>" alt="">
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
                    <img id="img_rolDelEstudiante" class="img_perfRol" src="assets/images/roles/virtTecnologico1.png" alt="">
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

            <?php
                //Consultamos los datos de los trabajos destacados para su muestreo en el eportafolio online
                $sqlDatTrabDestacados = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id_estudiante=$idEportafolioSeleccionado and trabajoTieneBadge='No' and publicadoeneportafolio = 'Si'";
                $datosTrabDestacados = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacados);
                foreach ($datosTrabDestacados as $key){
            ?>

                    <div class="cardTrabajoDestacado">
                        
                        <div class="tituloTrabDestacado">
                            <label class="lblTituloTrabajo"><?php echo $key['nombre_trabajo']; ?></label>                    
                        </div>    
                        
                        <?php 
                        //Aqui se traen las imagenes de cada trabajo destacado
                        $fotoDelTrabajoDestacado = $key['nombre_imagentrabajo'];

                        if($fotoDelTrabajoDestacado != null){
                        ?>
                            
                            <div class="alineacionTrabajoDestacado">
                                <img class="imagenDelTrabajoDestacado" src="<?php echo "trabajosImages/".$key['nombre_imagentrabajo']?>">    
                            </div>

                    <?php
                        }else{
                    ?>

                            <div class="alineacionTrabajoDestacado">
                                <img class="imagenDelTrabajoDestacado" src="assets/images/imgPorDefecto.jpg">    
                            </div>
                    <?php
                        }
                    ?>                                      

                        <div class="alineacionTrabajoDestacado">
                            <div class="descripcionTrabajo">
                                <label class="tituloDescripcion">Descripción:</label>
                                <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                <p class="descripcionDelTrabajoDestacado"><?php echo $key['descripcion']; ?></p>
                            </div>
                        </div>

                        <div class="alineacionTrabajoDestacado">
                            <table class="tablaDeEvidencias"> 
                                <tr>

                                    <?php
                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                        $linkDocumento = $key['link_documento'];
                                        $linkVideo = $key['link_video'];
                                        $linkRepoCodigo = $key['link_repocodigo'];
                                        $linkPresentacion = $key['link_presentacion'];

                                        if($linkDocumento != null){
                                    ?>
                                            <td class="casillaEvidencia"><a href="<?php echo $linkDocumento; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumento; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>

                                    <?php
                                        }if($linkVideo != null){
                                    ?>
                                            <td class="casillaEvidencia"><a href="<?php echo $linkVideo; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideo; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>

                                    <?php
                                        }if($linkRepoCodigo != null){
                                    ?>
                                            <td class="casillaEvidencia"><a href="<?php echo $linkRepoCodigo; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigo; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>

                                    <?php
                                        }if($linkPresentacion != null){
                                    ?>
                                            <td class="casillaEvidencia"><a href="<?php echo $linkPresentacion; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacion; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>

                                    <?php
                                        }
                                    ?>  

                
                                    
                                </tr>
                            </table>                
                        </div>                          
                    </div>
                    <br>
            <?php
                }
            
                ?>            
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
            
                <?php
                    //Consultamos los datos de las megainsignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                    $sqlDatTrabDestacadosConMegaInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idEportafolioSeleccionado and tipo_competencia='GENERAL'";
                    $datosTrabDestacadosConMegaInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacadosConMegaInsig);
                    foreach ($datosTrabDestacadosConMegaInsig as $key){

                        //Consultamos los datos de los trabajos destacados que tienen megainsignia para su muestreo en el eportafolio online
                        $sqlInfoTrabDestacadosConMegaInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id_trabajo=".$key['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                        $datosTrabDestConMegaInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlInfoTrabDestacadosConMegaInsig);
                        foreach ($datosTrabDestConMegaInsig as $item){
                ?>
                            <div class="cardTrabajoDestacadoConMegainsig">
                        
                                <div class="tituloTrabDestacado">
                                    <label class="lblTituloTrabajo"><?php echo $item['nombre_trabajo']; ?></label>                    
                                </div>  

                                <!--Aqui traemos el nombre del badge de la competencia general para mostrar su insignia-->
                                <?php 
                                    $nombreDeBadgeCG = $competenciaControla->consultarNombreBadgeCompGeneralParaEportafolio($key['id_competencia'], $key['tipo_badge']);
                                ?>
                                
                                <div class="alineacionCompTrabajoDestacadoConMega">
                                    <img class="megaInsigDelTrabajo" src="<?php echo 'badgesImages/'.$nombreDeBadgeCG?>">
                                </div>                                   
                                    
                            <?php 
                                //Aqui se traen las imagenes de cada trabajo destacado con megainsignia
                                $fotoDelTrabajoDestacadoConMega = $item['nombre_imagentrabajo'];
                                if($fotoDelTrabajoDestacadoConMega != null){
                            ?>
                            
                                    <div class="alineacionCompTrabajoDestacadoConMega">
                                        <img class="imagenDelTrabajoDestacadoConMegaInsig" src="<?php echo "trabajosImages/".$item['nombre_imagentrabajo']?>">    
                                    </div>

                            <?php
                                }else{
                            ?>
                                    <div class="alineacionCompTrabajoDestacadoConMega">
                                        <img class="imagenDelTrabajoDestacadoConMegaInsig" src="assets/images/imgPorDefecto.jpg">
                                    </div>
                            <?php
                                }
                            ?> 
                               
                                <div class="alineacionCompTrabajoDestacadoConMega">
                                    
                                    <table>
                                        <tr>
                                            <td><div class="descripcionTrabajoMgInsig">
                                                    <label class="tituloDescripcion">Descripción:</label>
                                                    <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                    <p class="descripcionDelTrabajoDestacadoConMegaInsig"><?php echo $item['descripcion']; ?></p>
                                            </div> </td>
                                            <td><table class="tablaDeEvidencias"> 
                                                <tr>

                                                    <?php
                                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                                        $linkDocumentoTrabConMega = $item['link_documento'];
                                                        $linkVideoTrabConMega = $item['link_video'];
                                                        $linkRepoCodigoTrabConMega = $item['link_repocodigo'];
                                                        $linkPresentacionTrabConMega = $item['link_presentacion'];

                                                        if($linkDocumentoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkDocumentoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumentoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>

                                                    <?php
                                                        }if($linkVideoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkVideoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>

                                                    <?php
                                                        }if($linkRepoCodigoTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkRepoCodigoTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigoTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>

                                                    <?php
                                                        }if($linkPresentacionTrabConMega != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkPresentacionTrabConMega; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacionTrabConMega; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>

                                                    <?php
                                                        }
                                                    ?>  

                                                </tr>
                                            </table> </td>
                                        </tr>
                                    </table>
                                   
                                </div>                          
                            </div> 
                <?php
                        }
                    }
                ?>                     
            </div>
    
            <br>

            <div class="contenedorInsignias">
                <label class="tituloMegaInsignias">Insignias obtenidas:</label>
                <br>

                <?php
                    //Consultamos los datos de las insignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                    $sqlDatTrabDestacadosConInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idEportafolioSeleccionado and tipo_competencia='ESPECIFICA'";
                    $datosTrabDestacadosConInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacadosConInsig);
                    foreach ($datosTrabDestacadosConInsig as $point){

                        //Consultamos los datos de los trabajos destacados que tienen insignia para su muestreo en el eportafolio online
                        $sqlInfoTrabDestacadosConInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id_trabajo=".$point['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                        $datosTrabDestConInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlInfoTrabDestacadosConInsig);
                        foreach ($datosTrabDestConInsig as $like){
                ?>
                            <div class="cardTrabajoDestacadoConInsig">
                            
                                <div class="tituloTrabDestacado">
                                    <label class="lblTituloTrabajo"><?php echo $like['nombre_trabajo']; ?></label>                    
                                </div>  
                                
                                <!--Aqui traemos el nombre del badge de la competencia especifica para mostrar su insignia-->
                                <?php 
                                    $nombreDeBadgeCE = $competenciaControla->consultarNombreBadgeCompEspecificaParaEportafolio($point['id_competencia'], $point['tipo_badge']);
                                ?>

                                <div class="alineacionCompTrabajoDestacado">
                                    <a href="badgeInfo.php" target="_blank"><img class="insigDelTrabajo" src="<?php echo 'badgesImages/'.$nombreDeBadgeCE?>"></a>
                                </div>

                                <?php 
                                    //Aqui se traen las imagenes de cada trabajo destacado con insignia
                                    $fotoDelTrabajoDestacadoConInsig = $like['nombre_imagentrabajo'];
                                    if($fotoDelTrabajoDestacadoConInsig != null){
                                ?>
                            
                                        <div class="alineacionCompTrabajoDestacadoConMega">
                                            <img class="imagenDelTrabajoDestacadoConInsig" src="<?php echo "trabajosImages/".$like['nombre_imagentrabajo']?>">    
                                        </div>

                                <?php
                                    }else{
                                ?>
                                        <div class="alineacionCompTrabajoDestacado">
                                            <img class="imagenDelTrabajoDestacadoConInsig" src="assets/images/imgPorDefecto.jpg">
                                        </div>
                                <?php
                                    }
                                ?>                                              
                
                                <div class="alineacionCompTrabajoDestacado">

                                    <table>
                                        <tr>
                                            <td><div class="descripcionTrabajoConInsig">
                                                <label class="tituloDescripcionTrabajoConInsig">Descripción:</label>
                                                <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                <p class="descripcionDelTrabajoDestacadoConInsig"><?php echo $like['descripcion'];?></p>
                                            </div></td>

                                            <td><table class="tablaDeEvidencias"> 
                                                <tr>

                                                    <?php
                                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo a las que esten disponibles
                                                        $linkDocumentoTrabConInsig = $like['link_documento'];
                                                        $linkVideoTrabConInsig = $like['link_video'];
                                                        $linkRepoCodigoTrabConInsig = $like['link_repocodigo'];
                                                        $linkPresentacionTrabConInsig = $like['link_presentacion'];

                                                        if($linkDocumentoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkDocumentoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkDocumentoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_documento.PNG"></a></td>

                                                    <?php
                                                        }if($linkVideoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkVideoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkVideoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_video.png"></a></td>

                                                    <?php
                                                        }if($linkRepoCodigoTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkRepoCodigoTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkRepoCodigoTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_repocodigo.png"></a></td>

                                                    <?php
                                                        }if($linkPresentacionTrabConInsig != null){
                                                    ?>
                                                            <td class="casillaEvidencia"><a href="<?php echo $linkPresentacionTrabConInsig; ?>" target="_blank" class="linkDeEvidencia" title="<?php echo $linkPresentacionTrabConInsig; ?>"><img class="icoEvidencias" src="assets/images/btn_evidenc_presentacion.png"></a></td>

                                                    <?php
                                                        }
                                                    ?>  

                                                </tr>
                                            </table></td>
                                        </tr>

                                    </table>

                                </div>                          
                            </div>   
                    <?php
                        }
                    }
                }
                ?> 
            </div>
        </div>

        <!--PIE DE EPORTAFOLIO - SELLO PANDORA-->
        <div class="cardSelloPandora">
            <p class=selloPandora>© Pandora</p>

            <a href="<?php echo 'EportafolioService/generaPDF.php?Id_Eportafolio='.$idEportafolioSeleccionado?>" target="_blank" class="btn_descargarConvocatoria" title="Descargar E-portafolio">Descargar</a>
        
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
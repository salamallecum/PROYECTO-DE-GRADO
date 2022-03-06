<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>E-portafolio Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">        
        
        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesPlantillaEportafolioPandora.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>

        <!--ESTILOS DE LA PLANTILLA DE VISUALIZACION DE LOS E-PORTAFOLIOS-->
        <style>

            /*ESTILOS TEMPLATE E-PORTAFOLIO*/
            *{
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                text-decoration: none;
                list-style-type: none;
                box-sizing: border-box;
            }

            /**********ENCABEZADO DE DATOS PERSONALES***************/
            .encabezado{
                width: 1300px;
                height: 650px;
                background-color: #005e6e;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                border-top-left-radius: 40px;
                border-top-right-radius: 40px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7)
            }

            .cardImage{
                width: 1300px;
                height: 200px;
                border-top-left-radius: 40px;
                border-top-right-radius: 40px;   
                overflow: hidden;
                position: relative;
                max-height: 300px;
            }

            .imgEncabezadoInfoEstudiante{
                width: 100%;
                vertical-align: middle;
                height: 300px;
                border-top-left-radius: 40px;
                border-top-right-radius: 40px;
            }

            .cardInfoPersonal{
                display: inline-block;
                height: 480px;
            }

            .logoP{
                width: 1300px;
                height: 50px;
                margin-left: 20px;
                margin-top: 10px;
            }

            .logoPandora{
                width: 150px;
                height: 50px;
            }

            .fotoDelEstudiante{
                width: 250px;
                height: 300px;
                box-shadow: 5px 0px 5px rgba(0,0,0,.9)
            }

            .informacionPersonal{
                margin-left: 300px;
            }

            .tableDatosP{
                margin-left: 30px;
                margin-bottom: 40px;
                padding-top: 40px;
                display: inline-block;
            }

            .casillaDato td{
                padding: 10px;
            }

            .lblDatos{
                font-size: 20px;
                font-weight: bold;
                font-style: oblique;
                color: wheat;
            }

            .txt_info{
                font-size: 18px;   
                color: wheat;
            }


            /**********PERFIL PROFESIONAL***************/
            .cardPerfProfesional{
                background-color: #F3E9C3;
                width: 1300px;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7)
            }

            .perfProfesional{
                padding-top: 10px;
            }

            .tituloPerfProfesional{
                font-weight: bold;
                font-style: oblique;
                font-size: 20px;
                padding-left: 550px;
            }

            .descripPerfProfesional{
                padding-left: 20px;
                padding-right: 20px;
                padding-bottom: 20px;
            }

            /**********GRAFICO DE PERFILAMIENTO PANDORA***************/
            .cardGraficoPerfilamiento{
                background-color: #F3E9C3;
                width: 1300px;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7);
                padding-bottom: 20px;
            }

            .grafPerfilamiento{
                padding-top: 10px;
            }

            .tituloGrafPerfilamiento{
                font-weight: bold;
                font-style: oblique;
                font-size: 20px;
                padding-left: 480px;
                margin-top: 20px;
            }

            /*GRAFICO DE PERFILAMIENTO*/
            .perfPandora{
                display: inline-flex;
            }

            #grafPerfPandora{
                width: 900px;
            }

            .img_perfRol{
                width: 300px;
                height: 350px;
                margin-bottom: 40px;
            }

            /**********TRABAJOS DESTACADOS***************/
            .cardTrabajosDestacados{
                background-color: #F3E9C3;
                width: 1300px;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7);
                padding-bottom: 20px;
            }

            .trabajosDestacados{
                padding-top: 10px;
            }

            .tituloTrabDestacados{
                font-weight: bold;
                font-style: oblique;
                font-size: 20px;
                padding-left: 520px;
                margin-top: 20px;
            }

            .cardTrabajoDestacado{
                background-color: #eecc41;
                width: 1100px;
                height: 254px;
                margin-top: 20px;
                margin-left: 80px;
                margin-right: 20px;
                /*box-shadow: 5px 0px 5px rgba(0,0,0,.7);*/
                padding-bottom: 20px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }

            .tituloTrabDestacado{
                padding-top: 10px;
                padding-bottom: 10px;
                align-items: center;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                background-color: #005e6e;
            }

            .lblTituloTrabajo{
                padding-left: 10px;
                font-weight: bold;
                color: #fff;
            }

            .alineacionCompTrabajoDestacado{
                display: inline-block;
                height: 270px;
            }

            .imagenDelTrabajoDestacado{
                width: 200px;
                height: 215px;
                border-bottom-left-radius: 10px;
                display: block;
            }

            .tituloDescripcion{
                font-weight: bold;
                padding-left: 10px;
            }

            .descripcionTrabajo{
                width: 600px;
            }

            .descripcionDelTrabajoDestacado{
                padding-top: 10px;
                padding-left: 10px;
                padding-right: 10px;
                padding-bottom: 20px;
            }

            .tituloEvidencias{
                padding-left: 20px;
            }

            .tablaDeEvidencias{
                margin-bottom: 35px;
                height: 100px;
            }

            .casillaEvidencia{
                padding-left: 3px;
                padding-right: 3px;
            }

            .icoEvidencias{
                width: 60px;
                height: 60px;
            }

            /**********INSIGNIAS OBTENIDAS***************/
            .cardInsignias{
                background-color: #F3E9C3;
                width: 1300px;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7);
                padding-bottom: 20px;
            }

            .insignias{
                padding-top: 10px;
            }

            .tituloInsignias{
                font-weight: bold;
                font-style: oblique;
                font-size: 20px;
                padding-left: 575px;
                margin-top: 20px;
            }

            .tituloMegaInsignias{
                padding-left: 20px;
                font-weight: bold;
            }

            .cardTrabajoDestacadoConMegainsig{
                background-color: #eecc41;
                width: 1100px;
                height: 270px;
                margin-top: 20px;
                margin-left: 80px;
                margin-right: 20px;
                /*box-shadow: 5px 0px 5px rgba(0,0,0,.7);*/
                padding-bottom: 20px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }

            .megaInsigDelTrabajo{
                width: 150px;
                height: 150px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .imagenDelTrabajoDestacadoConInsig{
                width: 200px;
                height: 231px;
                margin-bottom: 90px;
            }

            .tituloDescripcionTrabajoConInsig{
                font-weight: bold;
                padding-left: 10px;
                padding-top: 10px;
            }

            .descripcionTrabajoConMegaInsig{
                width: 400px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .descripcionDelTrabajoDestacadoConMegaInsig{
                padding-top: 5px;
                padding-left: 10px;
                padding-right: 10px;
                padding-bottom: 20px;
            }

            .tituloEvidencias{
                padding-left: 20px;
            }

            .tablaDeEvidencias{
                margin-bottom: 35px;
                height: 100px;
            }

            .tituloInsig{
                padding-left: 20px;
            }

            .cardTrabajoDestacadoConInsig{
                background-color: #eecc41;
                width: 1100px;
                height: 270px;
                margin-top: 20px;
                margin-left: 80px;
                margin-right: 20px;
                /*box-shadow: 5px 0px 5px rgba(0,0,0,.7);*/
                padding-bottom: 20px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }

            .insigDelTrabajo{
                width: 90px;
                height: 90px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .descripcionTrabajoConInsig{
                width: 500px;
                padding-top: 10px;
                padding-bottom: 30px;
            }

            .descripcionDelTrabajoDestacadoConInsig{
                padding-top: 5px;
                padding-left: 10px;
                padding-right: 10px;  
                padding-bottom: 30px;  
            }



            /**********SELLO PANDORA***************/
            .cardSelloPandora{
                background-color: #005e6e;
                width: 1300px;
                margin-top: 20px;
                margin-left: 20px;
                /*margin-left: 250px;*/
                margin-right: 20px;
                border-bottom-left-radius: 40px;
                border-bottom-right-radius: 40px;
                box-shadow: 10px 0px 10px 5px rgba(0,0,0,.7);
                padding-bottom: 20px;
            }

            .selloPandora{
                padding-top: 10px;
                text-align: center;
                font-weight: bold;
                color: #fff;
            }

            .btn_descargarConvocatoria{
                color: #fff;
                background-color: red;
                cursor: pointer;
                padding: 8px 20px;
                border-radius: 4px;
                outline: none;
                border: none;
                font-family: Arial, Helvetica, sans-serif;
                margin-left: 20px;
            }

        </style>

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

                        <div class="cardInfoPersonal"> 
                            <img class="fotoDelEstudiante" src="assets/images/team/alejo.jpeg" alt="">                        
                        </div>
        
                        <div class="cardInfoPersonal">
                        
                            <table class="tableDatosP">
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Nombres:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
                                </tr>
                                
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Apellidos:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Dirección:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Ciudad:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Teléfono:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
                                </tr>
    
                                <tr class="casillaDato">
                                    <td><label class="lblDatos">Correo:</label></td>
                                    <td><label class="txt_info">Fulanito de tal</label></td>
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
                <p class="descripPerfProfesional">Estudiante de Ingeniería de Sistemas con conocimientos sólidos de programación en lenguaje Java,
                 Python; Desarrollo web mediante JavaScript, HTML5, CSS; Gestión de Bases de datos mediante MySQL, PostgreSQL, SQLite y Desarrollo de apps 
                 móviles mediante Android Studio.</p>
            </div>
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
                <label class="tituloEvidencias">Haga click sobre cada uno de las insignias para ver el trabajo por el cual fue certificado...</label>
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
            
            <form id="formularioParaDescargaEportafolio" action="logic/capturaDatEportafolio.php" method="POST">
                <button type="submit" name="descargarEportafolio" class="btn_descargarConvocatoria" title="Descargar E-portafolio">Descargar</button>
            </form>
        </div>
    
</body>
</html>
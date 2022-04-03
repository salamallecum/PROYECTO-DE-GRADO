<?php

require_once "controllers/EstudianteControlador.php";
require_once "controllers/EportafolioControlador.php";
require_once "controllers/TrabajoDestacadoControlador.php";
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/controllers/CompetenciaControlador.php";


function getEportafolio(int $idDelEstudiante){

    $estudianteControla = new EstudianteControlador();
    $eportafolioControla = new EportafolioControlador();
    $trabajoDestControla = new TrabajoDestacadoControlador();
    $competenciaControla = new CompetenciaControlador();

    $userControla = new EstudianteControlador();

    $plantillaEportafolio =    '<!--ENCABEZADO DE DATOS PERSONALES-->'.
                                '<div class="encabezado">
                                    <div class="cardEncabezado">

                                        <div class="cardImage">
                                            <img class="imgEncabezadoInfoEstudiante" src="../assets/images/uebAereaEportafolio.png" alt="">
                                        </div>

                                        <div class="card-Estudiante">
                                                
                                            <div class="pnl-infoPersonal">
                                                <div class="logoP">
                                                    <img class="logoPandora" src="../assets/images/logo_pandora.PNG" alt="">
                                                </div>
                                            </div>';

                                            //Consultamos los datos personales del estudiante para su muestreo en el eportafolio descargado
                                            $sqlDatEstudiante = "SELECT nombres_usuario, apellidos_usuario, ciudad, direccion, telefono, correo_usuario, foto_usuario, descripcion from tbl_usuario where id_usuario=".$idDelEstudiante;
                                            $datosEstudiante = $estudianteControla->mostrarDatosEstudiante($sqlDatEstudiante);
                                            $key = '';
                                            foreach ($datosEstudiante as $key){
                                    
                                                $plantillaEportafolio .= '<div class="informacionPersonal">
                                                                                <table>
                                                                                    <tr>';

                                                                                    if($key['foto_usuario'] != null){

                                                                                        $plantillaEportafolio .= '<td> <div class="cardInfoPersonal"> 
                                                                                                                    <img class="fotoDelEstudiante" src="../profileImages/'.$key['foto_usuario'].'" alt="Foto de perfil estudiante">                        
                                                                                                                </div></td>';

                                                                                    }else{

                                                                                        $plantillaEportafolio .= '<td> <div class="cardInfoPersonal"> 
                                                                                                                    <img class="fotoDelEstudiante" src="../assets/images/imgPorDefecto.jpg" alt="Foto de perfil estudiante">                        
                                                                                                                </div></td>';

                                                                                    }
                                                                                        
                                                                                    $plantillaEportafolio .= '<td> <div class="cardInfoPersonal">
                                                                                
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
                                                                                                    </div>                  
                                                                    </div>
                                                                                            </div>                  
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                            
                                                                                <!--PERFIL PROFESIONAL-->
                                                                                <div class="cardPerfProfesional">
                                                                                    <div class="perfProfesional">
                                                                                        <p class="tituloPerfProfesional">Perfil profesional</p>
                                                                                        
                                                                                        <p class="descripPerfProfesional">'. $key['descripcion'] .'</p>
                                                                                    </div>
                                                                                </div>';

                                            }

                                            $plantillaEportafolio .= '          <!--GRAFICO DE PERFILAMIENTO PANDORA-->
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
                                                                                    </div>';

                                                                                    //Consultamos los datos de los trabajos destacados para su muestreo en el eportafolio online
                                                                                    $sqlDatTrabDestacados = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id_estudiante=$idDelEstudiante and trabajoTieneBadge='No' and publicadoeneportafolio = 'Si'";
                                                                                    $datosTrabDestacados = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacados);
                                                                                    foreach ($datosTrabDestacados as $item){
        

                                                                                        $plantillaEportafolio .= '<div class="cardTrabajoDestacado">
                                                                                            
                                                                                                                        <div class="tituloTrabDestacado">
                                                                                                                            <p class="lblTituloTrabajo">'. $item['nombre_trabajo'] .'</p>                    
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        <table>

                                                                                                                            <tr>';


                                                                                            
                                                                                             
                                                                                            //Aqui se traen las imagenes de cada trabajo destacado
                                                                                            $fotoDelTrabajoDestacado = $item['nombre_imagentrabajo'];

                                                                                            if($fotoDelTrabajoDestacado != null){
                                                                                        
                                                                                                $plantillaEportafolio .= '<td><img class="imagenDelTrabajoDestacado" src="trabajosImages/'. $item['nombre_imagentrabajo'] .'"></td>';

                                                                                        
                                                                                            }else{
                                                                                        
                                                                                                $plantillaEportafolio .= '<td><img class="imagenDelTrabajoDestacado" src="../assets/images/imgPorDefecto.jpg"></td>';    
                                                                                                                         
                                                                                            }
                                                                                                                             

                                                                                        $plantillaEportafolio .= '<td class="columnDescTrabDestacado">
                                                                                                                        <p class="tituloDescripcion">Descripción:</p>
                                                                                                                        <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                                                                                        <p class="descripcionDelTrabajoDestacado">'. $item['descripcion'] .'</p>
                                                                                                                   </td>

                                                                                                                    <td>
                                                                                                                        <table class="tablaDeEvidencias"> 
                                                                                                                            <tr>';

                                                                                                                                //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                                                                                                                $linkDocumento = $item['link_documento'];
                                                                                                                                $linkVideo = $item['link_video'];
                                                                                                                                $linkRepoCodigo = $item['link_repocodigo'];
                                                                                                                                $linkPresentacion = $item['link_presentacion'];

                                                                                                                                if($linkDocumento != null){
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkDocumento .'" target="_blank" class="linkDeEvidencia" title="'. $linkDocumento .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG"></a></td>';

                                                                                                                                }if($linkVideo != null){
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkVideo .'" target="_blank" class="linkDeEvidencia" title="'. $linkVideo .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png"></a></td>';

                                                                                                                                }if($linkRepoCodigo != null){
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkRepoCodigo .'" target="_blank" class="linkDeEvidencia" title="'. $linkRepoCodigo .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png"></a></td>';

                                                                                                                                }if($linkPresentacion != null){
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkPresentacion .'" target="_blank" class="linkDeEvidencia" title="'. $linkPresentacion .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png"></a></td>';
                                                                                                                                }
                                                                                                                               
                                                                                                    $plantillaEportafolio .= '</tr>
                                                                                                                        </table>                
                                                                                                                    </td>                          
                                                                                                                </tr>
                                                                                                            </table></div>';               
        
                                                                                    }
                            
                                                        $plantillaEportafolio .= '</div>

                                                                                <!--INSIGNIAS-->
                                                                                <div class="cardInsignias">
                                                                                    <div class="insignias">
                                                                                        <p class="tituloInsignias">Insignias</p>
                                                                                        <p class="tituloEvidencias">Haga click sobre cada uno de los íconos para ver las evidencias por las cuales fue certificado el trabajo...</p>
                                                                                    </div>

                                                                                    <div class="contenedorMegaInsignias">
                                                                                        <p class="tituloMegaInsignias">MegaInsignias obtenidas:</p>';
                                                                                        
                                                                                        //Consultamos los datos de las megainsignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                                                                                        $sqlDatTrabDestacadosConMegaInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idDelEstudiante and tipo_competencia='GENERAL'";
                                                                                        $datosTrabDestacadosConMegaInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacadosConMegaInsig);
                                                                                        foreach ($datosTrabDestacadosConMegaInsig as $point){

                                                                                            //Consultamos los datos de los trabajos destacados que tienen megainsignia para su muestreo en el eportafolio online
                                                                                            $sqlInfoTrabDestacadosConMegaInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id=".$point['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                                                                                            $datosTrabDestConMegaInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlInfoTrabDestacadosConMegaInsig);
                                                                                            foreach ($datosTrabDestConMegaInsig as $lex){
            
                                                                                                $plantillaEportafolio .= '<div class="cardTrabajoDestacadoConMegainsig">
                    
                                                                                                                                <div class="tituloTrabDestacado">
                                                                                                                                    <p class="lblTituloTrabajo">'. $lex['nombre_trabajo'] .'</p>                    
                                                                                                                                </div>

                                                                                                                                    <table>

                                                                                                                                        <tr>

                                                                                                                                    ';

                                                                                                                                //Aqui traemos el nombre del badge de la competencia general para mostrar su insignia
                                                                                                                                $nombreDeBadgeCG = $competenciaControla->consultarNombreBadgeCompGeneralParaEportafolio($point['id_competencia'], $point['tipo_badge']);
                                                                                                                                
                                                                                                                                
                                                                                                                                $plantillaEportafolio .=   '<td><table>
                                                                                                                                                                    <tr>                                                                                                                                                                                                                                                                
                                                                                                                                                                        <td>
                                                                                                                                                                            <img class="megaInsigDelTrabajo" src="../badgesImages/'.$nombreDeBadgeCG.'">
                                                                                                                                                                        </td>';                                 
                                                                                                                                    
                                                                                                                                //Aqui se traen las imagenes de cada trabajo destacado con megainsignia
                                                                                                                                $fotoDelTrabajoDestacadoConMega = $lex['nombre_imagentrabajo'];
                                                                                                                                
                                                                                                                                if($fotoDelTrabajoDestacadoConMega != null){
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td>
                                                                                                                                                                  <img class="imagenDelTrabajoDestacadoConMegaInsig" src="../trabajosImages/'.$lex['nombre_imagentrabajo'].'">    
                                                                                                                                                            </td>';

                                                                                                                                }else{
                                                                                                                            
                                                                                                                                    $plantillaEportafolio .= '<td>
                                                                                                                                                                <img class="imagenDelTrabajoDestacadoConMegaInsig" src="../assets/images/imgPorDefecto.jpg">
                                                                                                                                                            </td>';
                                                                                                                            
                                                                                                                                }
                        
                            
                                                                                                                                $plantillaEportafolio .= '</tr></table></td>
                                                                                                                                    
                                                                                                                                                            <td><table>
                                                                                                                                                                <tr>
                                                                                                                                                                    <td>
                                                                                                                                                                        <p class="tituloDescripcion">Descripción:</p>
                                                                                                                                                                        <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                                                                                                                                        <p class="descripcionDelTrabajoDestacadoConMegaInsig">'. $item['descripcion'] .'</p>
                                                                                                                                                                    </td>
                                                                                                                                                                    <td><table class="tablaDeEvidencias"> 
                                                                                                                                                                        <tr>';

                                                                                                                                                                            //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo alasque esten disponibles
                                                                                                                                                                            $linkDocumentoTrabConMega = $lex['link_documento'];
                                                                                                                                                                            $linkVideoTrabConMega = $lex['link_video'];
                                                                                                                                                                            $linkRepoCodigoTrabConMega = $lex['link_repocodigo'];
                                                                                                                                                                            $linkPresentacionTrabConMega = $lex['link_presentacion'];

                                                                                                                                                                            if($linkDocumentoTrabConMega != null){
                                                                                                                                                                            
                                                                                                                                                                                $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkDocumentoTrabConMega .'" target="_blank" class="linkDeEvidencia" title="'. $linkDocumentoTrabConMega .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG"></a></td>';
                                                                                                                                                                            
                                                                                                                                                                            }if($linkVideoTrabConMega != null){
                                                                                                                                                                    
                                                                                                                                                                                $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkVideoTrabConMega .'" target="_blank" class="linkDeEvidencia" title="'. $linkVideoTrabConMega .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png"></a></td>';
                                                                                                                                                                        
                                                                                                                                                                            }if($linkRepoCodigoTrabConMega != null){
                                                                                                                                                                        
                                                                                                                                                                                $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkRepoCodigoTrabConMega .'" target="_blank" class="linkDeEvidencia" title="'. $linkRepoCodigoTrabConMega .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png"></a></td>';

                                                                                                                                                                        
                                                                                                                                                                            }if($linkPresentacionTrabConMega != null){
                                                                                                                                                                        
                                                                                                                                                                                $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkPresentacionTrabConMega .'" target="_blank" class="linkDeEvidencia" title="'. $linkPresentacionTrabConMega .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png"></a></td>';

                                                                                                                                                                            }
                                                                                                                                                                            
                                                                                                                                              $plantillaEportafolio .= '</tr>
                                                                                                                                                                    </table> </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </table></td>
                                                                                                                                                            </tr></table>
                                                                                                                                                                
                                                                                                                                                            </div>                          
                                                                                                                        </div>';
                                                                                                                                            
                                                                                            }
                                                                                        }
                                                                                                                
                                                        $plantillaEportafolio .= '
                                                                                    <br>
                                                                                    <br> 

                                                                                <div class="contenedorInsignias">
                                                                                    <p class="tituloMegaInsignias">Insignias obtenidas:</p>';
                                                                                                  
                                                                                    //Consultamos los datos de las insignias ganadas por un trabajo destacado para su muestreo en el eportafolio online
                                                                                    $sqlDatTrabDestacadosConInsig = "SELECT id_trabajo, tipo_badge, id_competencia from tbl_insigniasganadastrabdestacado where codigo_estudiante=$idDelEstudiante and tipo_competencia='ESPECIFICA'";
                                                                                    $datosTrabDestacadosConInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlDatTrabDestacadosConInsig);
                                                                                    foreach ($datosTrabDestacadosConInsig as $poi){

                                                                                        //Consultamos los datos de los trabajos destacados que tienen insignia para su muestreo en el eportafolio online
                                                                                        $sqlInfoTrabDestacadosConInsig = "SELECT nombre_trabajo, descripcion, nombre_imagentrabajo, link_documento, link_video, link_repocodigo, link_presentacion from tbl_trabajodestacado where Id=".$poi['id_trabajo']." and trabajoTieneBadge='Si' and publicadoeneportafolio = 'Si'";
                                                                                        $datosTrabDestConInsig = $trabajoDestControla->mostrarTrabajosDestacados($sqlInfoTrabDestacadosConInsig);
                                                                                        foreach ($datosTrabDestConInsig as $lik){
            
                                                                                            $plantillaEportafolio .= '<div class="cardTrabajoDestacadoConInsig">
                                                                                            
                                                                                                                            <div class="tituloTrabDestacado">
                                                                                                                                <p class="lblTituloTrabajo">'. $lik['nombre_trabajo'] .'</p>                    
                                                                                                                            </div>
                                                                                                                            
                                                                                                                                <table>

                                                                                                                                    <tr>

                                                                                                                                    ';  
                                                                                                
                                                                                                                            //Aqui traemos el nombre del badge de la competencia especifica para mostrar su insignia                                                                                                
                                                                                                                            $nombreDeBadgeCE = $competenciaControla->consultarNombreBadgeCompEspecificaParaEportafolio($poi['id_competencia'], $poi['tipo_badge']);
                                                                                                
                                                                                                                            $plantillaEportafolio .= '<td><table>
                                                                                                                                                              <tr>
                                                                                                                                                                  <td>
                                                                                                                                                                        <img class="insigDelTrabajo" src="../badgesImages/'.$nombreDeBadgeCE.'">
                                                                                                                                                                  </td>';                                                                                                                        

                                                                                                                            //Aqui se traen las imagenes de cada trabajo destacado con insignia
                                                                                                                            $fotoDelTrabajoDestacadoConInsig = $lik['nombre_imagentrabajo'];

                                                                                                                            if($fotoDelTrabajoDestacadoConInsig != null){
                                                                                                                                                                                            
                                                                                                                                $plantillaEportafolio .= '<td">
                                                                                                                                                            <img class="imagenDelTrabajoDestacadoConInsig" src="../trabajosImages/"'. $lik['nombre_imagentrabajo'] .'">    
                                                                                                                                                        </td>';

                                                                                                                            }else{
                                                                                                                        
                                                                                                                                $plantillaEportafolio .= '<td>
                                                                                                                                                            <img class="imagenDelTrabajoDestacadoConInsig" src="../assets/images/imgPorDefecto.jpg">
                                                                                                                                                        </td>';
                                                                                                                            }
                                                                                                                                                                     
                                                                                
                                                                                            $plantillaEportafolio .= '</tr></table></td>

                                                                                                                        <td><table>
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p class="tituloDescripcionTrabajoConInsig">Descripción:</p>
                                                                                                                                    <!--La descripcion del trabajo no puede tener mas de 250 caracteres-->
                                                                                                                                    <p class="descripcionDelTrabajoDestacadoConInsig">'. $lik['descripcion'] .'</p>
                                                                                                                                </td>

                                                                                                                                <td><table class="tablaDeEvidencias"> 
                                                                                                                                    <tr>';
                                                                                                                                        
                                                                                                                                        //Aqui se traen los links de las evidencias que tiene el trabajo y se activan de acuerdo a las que esten disponibles
                                                                                                                                        $linkDocumentoTrabConInsig = $lik['link_documento'];
                                                                                                                                        $linkVideoTrabConInsig = $lik['link_video'];
                                                                                                                                        $linkRepoCodigoTrabConInsig = $lik['link_repocodigo'];
                                                                                                                                        $linkPresentacionTrabConInsig = $lik['link_presentacion'];

                                                                                                                                        if($linkDocumentoTrabConInsig != null){
                                                                                                                                        
                                                                                                                                            $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkDocumentoTrabConInsig .'" target="_blank" class="linkDeEvidencia" title="'. $linkDocumentoTrabConInsig .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_documento.PNG"></a></td>';

                                                                                                                                        
                                                                                                                                        }if($linkVideoTrabConInsig != null){
                                                                                                                                    
                                                                                                                                            $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkVideoTrabConInsig .'" target="_blank" class="linkDeEvidencia" title="'. $linkVideoTrabConInsig .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_video.png"></a></td>';

                                                                                                                                        
                                                                                                                                        }if($linkRepoCodigoTrabConInsig != null){
                                                                                                                                        
                                                                                                                                            $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkRepoCodigoTrabConInsig .'" target="_blank" class="linkDeEvidencia" title="'. $linkRepoCodigoTrabConInsig .'"><img class="icoEvidencias" src="../assets/images/btn_evidenc_repocodigo.png"></a></td>';

                                                                                                                                        }if($linkPresentacionTrabConInsig != null){
                                                                                                                                        
                                                                                                                                            $plantillaEportafolio .= '<td class="casillaEvidencia"><a href="'. $linkPresentacionTrabConInsig .'" target="_blank" class="linkDeEvidencia" title="'. $linkPresentacionTrabConInsig. '"><img class="icoEvidencias" src="../assets/images/btn_evidenc_presentacion.png"></a></td>';

                                                                                                                                        }
                                                                                                                                          

                                                                                                        $plantillaEportafolio .= '</tr>
                                                                                                                                </table></td>
                                                                                                                            </tr>
                                                                                                                          </table></td>
                                                                                                                        </tr></table>
                                                                                                                    </div>                          
                                                                                </div>';   
                
                                                                                        }
                                                                                    }
            
            
                                                $plantillaEportafolio .= '</div>
                                                                    </div>

                                                                   <!--PIE DE EPORTAFOLIO - SELLO PANDORA-->
                                                                   <div class="cardSelloPandora">
                                                                   <p class=selloPandora>© Pandora</p>                                        
                                                               </div>

                                                        </div>
                                                                    
                                                        </body>';

                                    
                                
                                

    return $plantillaEportafolio;
}

    

?>
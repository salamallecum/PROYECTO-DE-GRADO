
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pandora</title>
        <link rel="shortcut icon" href="assets/images/favicon.png"> 
        
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!--Links Scripts de estilos-->
        <link rel="stylesheet" href="assets/css/PracticasStyles.css">                

        <!--Links scripts de eventos js-->
        <script src="assets/js/dom/funcionesBasicasPopUpVisualizacionDeEportafolios.js" type="module"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
    </head>

    <body>
        

        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class="brand">
                    <span> <img src="assets/images/ico_pandMenuPrincEstudiante.PNG"></span>
                    <span id="tituloPagPrincipal">PANDORA</span>                   
                </h3>
                <label for="sidebar-toggle"><i class="bi bi-menu-app"></i></label>
            </div>

            <div class="sidebar-menu">
                <ul class="menuPracticas">
                    <li>
                        <a class="link_menu-active" href="./DashBoard_Practicas.php">
                            <span title="Dashboard"><i class="bi bi-file-bar-graph"></i></span>
                            <span class="items_menu">DASHBOARD</span>
                        </a>
                    </li>

                    <li>
                        <a class="link_menu" href="./AdministradorDeConvocatoriasExternas_Practicas.php">
                            <span title="Convocatorias"><i class="bi bi-hand-index"></i></span>
                            <span class="items_menu">CONVOCATORIAS</span>
                        </a>
                    </li>

                    
                    <li>
                        <a class="link_menu" href="./AdministradorDeEportafolios_Practicas.php">
                            <span title="E-portafolios"><i class="bi bi-archive"></i></span>
                            <span class="items_menu">E-PORTAFOLIOS</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-content">

            <header>
                
                <div class="social-icons">
                    <div class="titulo-dash">
                        <span>Administrador de e-portafolios</span>&nbsp;
                    </div>
                    <div class="link-logout">
                        <span><a href="../index.php">Log out</a></span>
                    </div>
                </div>
                
            </header>

            <!--Codigo de la ventana principal-->
            <main>
                
                <div class="main-tableEportafolios">
                   <br>
                    <h3 class="titulo_seccion">E-portafolios publicados</h3>
                    <br>
                    <br>

                    <!--ESTRUCTURA DE TABLA DE EPORTAFOLIOS-->
                    <table id="table_eportafolios" class="tablaDeEportafolios">
                        <thead>
                            <tr>
                                <th class="campoTabla">Foto</th>
                                <th class="campoTabla">Nombres</th>
                                <th class="campoTabla">Apellidos</th>
                                <th class="campoTabla">Acciones</th>
                            </tr>
                        </thead>

                        <!--Aqui van los registros de la tabla de EPORTAFOLIOS-->
                        <tr class="filasDeDatosTablaEportafolios">
                            <td class="datoTabla"><img class="imagenDeConvocatoriaEnTabla"src="assets/images/team/alejo.jpeg"></td>
                            <td class="datoTabla">LUIS ALEJANDRO</td>
                            <td class="datoTabla">AMAYA TORRES</td>
                            <td class="datoTabla"><div class="compEsp-edicion">
                                <div class="col-botonesEdicion">
                                    <a href="template_Eportafolio.php?IdEportafolio=2?IdUsuario=33" target="_blank" title="Ver E-portafolio"><img src="assets/images/verDetallesActividad.png"></a>
                                </div>

                                <div class="col-botonesEdicion">
                                    <a class="btnVerEportafolioEstudiante" data-id="<?php //echo $key['Id'];?>" data-bs-toggle="modal" data-bs-target="#modalCompartirEportafolio" title="Compartir E-portafolio"><img src="assets/images/compartirEportafolio.png"></a>   
                                </div>

                            </div></td>
                        </tr>
                    </table>
                </div>               

                <!--ESTRUCTURA DEL POPUP PARA COMPARTIR UN E-PORTAFOLIO-->
                <div class="modal fade" id="modalCompartirEportafolio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="titulo_seccion" id="staticBackdropLabel">Compartir E-portafolio</h3>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese el correo electrónico del usuario con el que desea compartir este e-portafolio.</p>

                            <div class="formulario-comparitEportafolio">
                               
                                <input type="text" name="Id" value=""> 

                                <label class="camposFormulario">Correo electrónico</label>
                                <input id="correoDestino" name="correoDestino" placeholder="" type="email" onclick="resetSpanShareEportafolio()" class="form-control" required="true">
                                <br>
                                <span id="panelConfirmacionDeEnvio"></span>  
                                
                                <button type="button" id="enviarEportafolio" class="btn_agregarConvocatoria" title="Enviar E-portafolio">Enviar</button>
                                <button id="btnCerrarModalCompartirEportafolio" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetallesConvocatoria" title="Cerrar">Cerrar</button>
                                                                       
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                
            </main>
        </div>

        <!--Funcion que resetea el span de confirmacion de envio de eportafolio exitoso-->
        <script>
            function resetSpanShareEportafolio(){
                document.getElementById("correoDestino").value = "";
                document.getElementById('panelConfirmacionDeEnvio').innerHTML="";
            }            

        </script>

        <!--Script que permite pasar el correo electronico ingresado en el modal de compartir eportafolio para que el eportafolio sea compartido con el usuario-->
        <script type='text/javascript'>

            $(document).ready(function(){
                
                $('#enviarEportafolio').click(function(){

                    var emailDestinatario = document.getElementById('correoDestino').value;

                    if (emailDestinatario != "") {

                        function compartirEportafolio() {
                            return new Promise((resolve, reject) => {
                                    // AJAX request
                                $.ajax({
                                    url: 'logic/utils/ajaxfile.php',
                                    type: 'post',
                                    data: {emailDestinatario: emailDestinatario},
                                    success: function(response){
                                        resolve(response)
                                        $('#panelConfirmacionDeEnvio').html(response);
                                    },
                                    error: function (error) {
                                        reject(error)
                                    },
                                });
                            })
                        }
                        compartirEportafolio();

                    }else{
                        alert('Ingrese el correo de la persona con la que desea compartir este e-portafolio');
                    }
                    
                });
            });
        </script>
    </body>
</html>
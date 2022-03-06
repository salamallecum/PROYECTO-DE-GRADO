//Archivo que define las operaciones basicas de los formularios del Administrador de convocatorias - practicas

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de convocatorias
const botonCancelFormRegConvocatoria = document.getElementById('btnCancelarRegistroConvPracticas');

botonCancelFormRegConvocatoria.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeConvocatorias();
},false);

//Asignamos la funcion de reseteo al boton cerrar del formulario para compartir eportafolios
const botonCerrarFormCompartirEportafolio = document.getElementById('btnCerrarModalCompartirEportafolio');

botonCerrarFormCompartirEportafolio.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioCompartirEportafolios();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE CONVOCATORIAS
function limpiarFormularioRegistroDeConvocatorias(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeConvocatorias_Practicas');
    formRegistro.reset();
}

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO PARA COMPARTIR E-PORTAFOLIOS
function limpiarFormularioCompartirEportafolios(){
    
    document.getElementById('correoDestino').value="";
    
}




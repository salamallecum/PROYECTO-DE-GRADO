
//Archivo que define las operaciones basicas de los formularios del Administrador de eventos

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de eventos
const botonCancelFormRegEvento = document.getElementById('btnCancelarRegistroEvento');

botonCancelFormRegEvento.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeEventos();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE EVENTOS
function limpiarFormularioRegistroDeEventos(){
    
    const formRegistro = document.getElementById('formularioDeRegEventos');
    formRegistro.reset();
}









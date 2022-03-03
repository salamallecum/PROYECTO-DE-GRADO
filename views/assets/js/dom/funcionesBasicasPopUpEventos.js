
//Archivo que define las operaciones basicas de los formularios del Administrador de eventos

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de eventos
const botonCancelFormRegEvento = document.getElementById('btnCancelarRegistroEvento');

botonCancelFormRegEvento.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeEventos();
},false);

//Asignamos la funcion de reseteo al boton cancelar del formulario asignacion de competencias generales
const botonCancelAsigComp = document.getElementById('btn_cancelarAsigCompetencias');

botonCancelAsigComp.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioAsignacionDeCompetencias();
},false);



//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE EVENTOS
function limpiarFormularioRegistroDeEventos(){
    
    const formRegistro = document.getElementById('formularioDeRegEventos');
    formRegistro.reset();
}

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE ASIGNACION DE COMPETENCIAS GENERALES
function limpiarFormularioAsignacionDeCompetencias(){
    
    const formAsig = document.getElementById('formularioDeAsignacionDeCompetencias');
    formAsig.reset();
}









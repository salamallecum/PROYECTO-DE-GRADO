///Archivo que define las operaciones basicas de los formularios del Administrador de desafios

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de desafios
const botonCancelFormRegDesafio = document.getElementById('btnCancelarRegistroDesafio');

botonCancelFormRegDesafio.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeDesafios();
},false);

//Asignamos la funcion de reseteo al boton cancelar del formulario asignacion de competencias generales

const botonCancelAsigComp = document.getElementById('btn_cancelarAsigCompetencias');

botonCancelAsigComp.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioAsignacionDeCompetencias();
},false);



//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE DESAFIOS
function limpiarFormularioRegistroDeDesafios(){
    
    const formRegistro = document.getElementById('formularioDeRegDesafios');
    formRegistro.reset();
}


//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE ASIGNACION DE COMPETENCIAS GENERALES
function limpiarFormularioAsignacionDeCompetencias(){
    
    const formAsig = document.getElementById('formularioDeAsignacionDeCompetencias');
    formAsig.reset();
}




//Archivo que define las operaciones basicas de los formularios del Administrador de competencias

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de competencias generales
const botonCancelFormRegCompGeneral = document.getElementById('btnCancelarRegistroCompGen');

botonCancelFormRegCompGeneral.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeCompetenciasGenerales();
},false);

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de competencias especificas
const botonCancelFormRegCompEspecifica = document.getElementById('btnCancelarRegistroCompEsp');

botonCancelFormRegCompEspecifica.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeCompetenciasEspecificas();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE COMPETENCIAS GENERALES
function limpiarFormularioRegistroDeCompetenciasGenerales(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeCompetenciasGenerales');
    formRegistro.reset();
}

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE COMPETENCIAS ESPECIFICAS
function limpiarFormularioRegistroDeCompetenciasEspecificas(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeCompetenciasEspecificas');
    formRegistro.reset();
}





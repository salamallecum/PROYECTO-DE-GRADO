//Archivo que define las operaciones basicas de los formularios del Administrador de convocatorias - practicas

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de eventos
const botonCancelFormRegConvocatoria = document.getElementById('btnCancelarRegistroConvPracticas');

botonCancelFormRegConvocatoria.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeConvocatorias();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE EVENTOS
function limpiarFormularioRegistroDeConvocatorias(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeConvocatorias_Practicas');
    formRegistro.reset();
}




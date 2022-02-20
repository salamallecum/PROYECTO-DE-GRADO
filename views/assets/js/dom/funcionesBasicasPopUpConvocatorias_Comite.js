//Archivo que define las operaciones basicas de los formularios del Administrador de convocatorias del rol comite

//ROL COMITE----------------------------------------------------------------------------------------------------------------

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de convocatorias
const botonCancelFormRegConvocatoria = document.getElementById('btnCancelarRegistroConvComite');

botonCancelFormRegConvocatoria.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeConvocatorias();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE CONVOCATORIAS
function limpiarFormularioRegistroDeConvocatorias(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeConvocatorias');
    formRegistro.reset();
}
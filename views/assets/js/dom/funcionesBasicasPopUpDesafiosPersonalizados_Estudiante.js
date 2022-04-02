///Archivo que define las operaciones basicas de los formularios del Administrador de desafios personalizados rol estudiante

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de propuestas
const botonCancelFormRegPropuesta = document.getElementById('btnCancelarRegistroPropuesta');

botonCancelFormRegPropuesta.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDePropuesta();
},false);


//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE PROPUESTAS
function limpiarFormularioRegistroDePropuesta(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDePropuestas');
    formRegistro.reset();
}







//Archivo que define las operaciones basicas de los formularios del Administrador de Trabajos destacados

//Asignamos la funcion de reseteo al boton cancelar del formulario de registro de trabajos destacados
const botonCancelFormRegTrabajos = document.getElementById('btnCancelarRegistroTrabajo');

botonCancelFormRegTrabajos.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioRegistroDeTrabajosDestacados();
},false);


//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE TRABAJOS DESTACADOS
function limpiarFormularioRegistroDeTrabajosDestacados(){
    
    const formRegistro = document.getElementById('formularioDeRegTrabajos');
    formRegistro.reset();
}











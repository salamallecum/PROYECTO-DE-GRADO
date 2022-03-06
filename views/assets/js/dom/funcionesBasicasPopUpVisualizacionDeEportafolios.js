//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//Asignamos la funcion de reseteo al boton cerrar del formulario para compartir eportafolios
const botonCerrarFormCompartirEportafolio = document.getElementById('btnCerrarModalCompartirEportafolio');

botonCerrarFormCompartirEportafolio.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarFormularioCompartirEportafolios();
},false);

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO PARA COMPARTIR E-PORTAFOLIOS
function limpiarFormularioCompartirEportafolios(){
    
    document.getElementById('correoDestino').value="";
}

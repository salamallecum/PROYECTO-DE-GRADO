//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//ASIGNACION DE EVENTOS A BOTONES COMPARTIR EL EPORTAFOLIO DEL ESTUDIANTE CON EL EMPLEADOR
let listOpen2 = document.getElementsByName('openModal2');
var modal_container2 = document.getElementById('modal_container2');
var close2 = document.getElementById('btn_cancelar2');

function eventoPopUpCompartirEportafolio(){

    //Recorremos el arreglo de elementos con el name openModal2
    for(var i=0; i<listOpen2.length; i++){
        
        listOpen2[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container2.classList.add('show');
        },false);
    }
    
    close2.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container2.classList.remove('show');
        limpiarFormularioCompartirEportafolio();
    },false); 
}

//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE COMPARTIR EPORTAFOLIOS
function limpiarFormularioCompartirEportafolio(){
    
    const formRegistro = document.getElementById('formularioParaCompartirEportafolio');
    formRegistro.reset();
}

//INVOCACION DE FUNCIONES
eventoPopUpCompartirEportafolio();


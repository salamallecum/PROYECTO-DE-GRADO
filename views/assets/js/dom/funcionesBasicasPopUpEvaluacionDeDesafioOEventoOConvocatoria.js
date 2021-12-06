//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//ASIGNACION DE EVENTOS A BOTONES DE DETALLES PARA LA INFORMACIÓN DE DESAFIOS O EVENTOS O CONVOCATORIAS
function eventoPopUpDetalleDeDesafioOEventoOConvocatoria(){

    let listOpen1 = document.getElementsByName('openModal');
    var modal_container1 = document.getElementById('modal_container1');
    var close1 = document.getElementById('btn_cancelar1');

    //Recorremos el arreglo de elementos con el name openModal
    for(var i=0; i<listOpen1.length; i++){
        
        listOpen1[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container1.classList.add('show');
        },false);
    }
    
    close1.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container1.classList.remove('show');
    },false); 
}

//ASIGNACION DE EVENTOS A BOTONES DE DETALLES PARA LA INFORMACIÓN DE LOS TRABAJOS DESTACADOS
function eventoPopUpDetalleTrabajo(){

    let listOpen2 = document.getElementsByName('openModal2');
    var modal_container2 = document.getElementById('modal_container2');
    var close2 = document.getElementById('btn_cancelar2');

    //Recorremos el arreglo de elementos con el name openModal3
    for(var i=0; i<listOpen2.length; i++){
        
        listOpen2[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container2.classList.add('show');
        },false);
    }
    
    close2.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container2.classList.remove('show');
    },false); 
}

//ASIGNACION DE EVENTO A BOTON "EVALUAR" PARA LA EVALUACION DE LAS COMPETENCIAS ESPECÍFICAS
var open3 = document.getElementById('openModal3');
var modal_container3 = document.getElementById('modal_container3');
var close3 = document.getElementById('btn_cancelar3');

open3.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container3.classList.add('show');
},false);


close3.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container3.classList.remove('show');
},false);

//ASIGNACION DE EVENTO A BOTON "GUARDAR" PARA EL OTORGAMIENTO DE INSIGNIAS AL TRABAJO DESTACADO
var open4 = document.getElementById('btn_guardarEvaluacion');
var modal_container4 = document.getElementById('modal_container4');
var close4 = document.getElementById('btn_cancelar4');
var final4 = document.getElementById('btn_finalizarEvaluacion');

open4.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container4.classList.add('show');
},false);


close4.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container4.classList.remove('show');
},false);

final4.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container4.classList.remove('show');
    modal_container3.classList.remove('show');
    modal_container2.classList.remove('show');
},false);


//INVOCACION DE FUNCIONES
eventoPopUpDetalleDeDesafioOEventoOConvocatoria();
eventoPopUpDetalleTrabajo();

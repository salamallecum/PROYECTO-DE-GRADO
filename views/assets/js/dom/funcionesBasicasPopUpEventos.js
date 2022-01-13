
//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP REGISTRO DE EVENTOS
const open1 = document.getElementById('openModal');
const modal_container1 = document.getElementById('modal_container1');
const close1 = document.getElementById('btn_cancelar1');


open1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.add('show');
},false);


close1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.remove('show');
    limpiarFormularioRegistroDeEventos();
},false);


//ASIGNACION DE EVENTOS A BOTONES EDITAR PARA LA ACTUALIZACIÓN DE EVENTOS
let listOpen2 = document.getElementsByName('openModal2');
var modal_container2 = document.getElementById('modal_container2');
var close2 = document.getElementById('btn_cancelar2');

function eventoPopUpActualizacionDeEventos(){

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
    },false); 
}


//ASIGNACION DE EVENTO A BOTON "ANALIZAR" PARA LA EVALUACION DE LAS COMPETENCIAS ESPECÍFICAS
const listOpen4 = document.getElementsByName('btn_analizar');
const modal_container4 = document.getElementById('modal_container4');
const close4 = document.getElementById('btn_cancelar4');

//Recorremos el arreglo de elementos con el name btn_analizar
for(var i=0; i<listOpen4.length; i++){
        
    listOpen4[i].addEventListener('click', (e) => {
        e.preventDefault();
        modal_container4.classList.add('show');
    },false);
}

close4.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container4.classList.remove('show');
},false);


//INVOCACION DE FUNCIONES
eventoPopUpActualizacionDeEventos();




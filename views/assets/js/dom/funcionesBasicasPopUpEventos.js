
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
let arregloIdEventos = organizarArregloIdEvento();



function eventoPopUpActualizacionDeEventos(){
    
    //Recorremos el arreglo de elementos con el name openModal2
    for(var i=0; i<listOpen2.length; i++){
       
        listOpen2[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container2.classList.add('show'); 
             
        },false);
        console.log("variable i: ", i);   
        
        for(var j=0; j<arregloIdEventos.length; j++){
            console.log("Elemento del arreglo", arregloIdEventos[j]);
            document.getElementById('idEvento').value=arregloIdEventos[j];
            console.log("variable j: ", j);
        }
    }

    

    close2.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container2.classList.remove('show');
        limpiarFormularioEdicionDeEventos();
    },false); 
}


//ASIGNACION DE EVENTO A BOTON "ASIGNAR COMPETENCIAS"
const listOpen4 = document.getElementsByName('btn_asignarCompetencias');
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


//ASIGNACION DE EVENTO A BOTON  PARA EVALUACION DE COMPETENCIAS
const open5 = document.getElementById('btn_evaluarCompetencias');
const modal_container5 = document.getElementById('modal_container5');
const close5 = document.getElementById('btn_cancelar5');


open5.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container5.classList.add('show');
},false);


close5.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container5.classList.remove('show');
},false);


//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE REGISTRO DE EVENTOS
function limpiarFormularioRegistroDeEventos(){
    
    const formRegistro = document.getElementById('formularioDeRegistroDeEventos');
    formRegistro.reset();
}


//FUNCION QUE RESETEA LOS CAMPOS DEL FORMULARIO DE ACTUALIZACION DE EVENTOS
function limpiarFormularioEdicionDeEventos(){
    
    const formRegistro = document.getElementById('formularioDeActualizacionDeEventos');
    formRegistro.reset();
}

//FUNCION QUE PERMITE ORGANIZAR LOS ID PARA QUE SEAN RECORRIDOS Y MOSTRADOS
function organizarArregloIdEvento(){
    var arrayIdEventos = new Array();
    var inputsValues = document.getElementsByClassName('idEventoInput'),
    namesValues = [].map.call(inputsValues, function(dataInput){
        arrayIdEventos.push(dataInput.value);
    });

    console.log("Arreglo de ids: ", arrayIdEventos);
    return arrayIdEventos;
    
}

//INVOCACION DE FUNCIONES
eventoPopUpActualizacionDeEventos();




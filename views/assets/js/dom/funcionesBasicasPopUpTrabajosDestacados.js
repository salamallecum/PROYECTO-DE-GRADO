//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP REGISTRO DE TRABAJOS DESTACADOS
var open = document.getElementById("openModal");
var modal_container = document.getElementById("modal_container");
var close = document.getElementById("btn_cancelar");


open.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.add('show');
},false);


close.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.remove('show');
},false);


//ASIGNACION DE EVENTOS A BOTONES ELIMINAR PARA LA ELIMINACIÓN DE LOS TRABAJOS DESTACADOS
function eventoPopUpEliminacionDeTrabajosDestacados(){

    let listOpen2 = document.getElementsByName('openModal2');
    var modal_container2 = document.getElementById('modal_container2');
    var close2 = document.getElementById('btn_cancelar2');
   

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


//ASIGNACION DE EVENTOS A BOTONES EDITAR PARA LA ACTUALIZACIÓN DE LOS TRABAJOS DESTACADOS
function eventoPopUpActualizacionDeTrabajosDestacados(){

    let listOpen1 = document.getElementsByName('openModal1');
    var modal_container1 = document.getElementById('modal_container1');
    var close1 = document.getElementById('btn_cancelar1');

    //Recorremos el arreglo de elementos con el name openModal1
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


//INVOCACION DE FUNCIONES 
eventoPopUpActualizacionDeTrabajosDestacados();
eventoPopUpEliminacionDeTrabajosDestacados();
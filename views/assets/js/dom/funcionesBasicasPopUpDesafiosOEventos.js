
//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//ASIGNACION DE EVENTOS POPUP PARA VER DETALLES DE UN DESAFIO O EVENTO
function eventoPopUpDetallesDeUnDesafioOEvento(){

    let listOpen1 = document.getElementsByName('openModal');
    var modal_container1 = document.getElementById('modal_container1');
    var close1 = document.getElementById('btn_cancelar1');

    //Recorremos el arreglo de elementos con el name openModal2
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

//EVENTOS POPUP PARA APLICAR UN TRABAJO DESTACADO A UN DESAFIO O EVENTO
const open2 = document.getElementById('openModal2');
const modal_container2 = document.getElementById('modal_container2');
const close2 = document.getElementById('btn_cancelar2');


open2.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container2.classList.add('show');
},false);


close2.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container2.classList.remove('show');
},false);

//INVOCACION DE FUNCIONES
eventoPopUpDetallesDeUnDesafioOEvento();

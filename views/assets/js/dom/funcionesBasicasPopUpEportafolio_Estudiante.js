
//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP PUBLICACION DE E-PORTAFOLIO
const open1 = document.getElementById('openModal');
const modal_container1 = document.getElementById('modal_container1');
const close1 = document.getElementById('btn_cancelar1');
const publicEport = document.getElementById('btn_publicarEportafolio');


open1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.add('show');
},false);

publicEport.addEventListener('click', (e) =>{
    open1.disabled = true;
    open1.style.backgroundColor="gray";
    open3.disabled = false;
    open3.style.backgroundColor = "#005e6e";
    modal_container1.classList.remove('show');
}, false);

close1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.remove('show');
},false);


//EVENTOS POPUP INFORMACION DE MEGAINSIGNIA o INSIGNIA
function eventoPopUpInfoInsignia(){

    let listOpen2 = document.getElementsByName('openModal2');
    var modal_container2 = document.getElementById('modal_container2');
    var close2 = document.getElementById('btn_cancelar2');

    //Recorremos el arreglo de elementos con el name openModal1
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

//EVENTOS POPUP OCULTAR E-PORTAFOLIO
const open3 = document.getElementById('openModal3');
const modal_container3 = document.getElementById('modal_container3');
const close3 = document.getElementById('btn_cancelar3')
const ocEport = document.getElementById('btn_ocultarEportafolio');

open3.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container3.classList.add('show');
},false);

ocEport.addEventListener('click', (e) =>{
    open3.disabled = true;
    open3.style.backgroundColor="gray";
    open1.disabled = false;
    open1.style.backgroundColor = "#005e6e";
    modal_container3.classList.remove('show');
}, false);

close3.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container3.classList.remove('show');
},false);


//INVOCACION DE FUNCIONES
eventoPopUpInfoInsignia();

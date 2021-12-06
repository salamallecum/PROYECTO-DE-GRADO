//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP REGISTRO DE MATERIA SATISFACTORIO
const open1 = document.getElementById('btn_crearMateria');
const modal_container1 = document.getElementById('modal_container');
const close1 = document.getElementById('btn_aceptar');

open1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.add('show');
},false); 

close1.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container1.classList.remove('show');
},false);

//EVENTOS POPUP ASIGNACION DE MATERIA SATISFACTORIO
const open2 = document.getElementById('btn_AsignarMateria');
const modal_container2 = document.getElementById('modal_container2');
const close2 = document.getElementById('btn_aceptar2');

open2.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container2.classList.add('show');
},false); 

close2.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container2.classList.remove('show');
},false);
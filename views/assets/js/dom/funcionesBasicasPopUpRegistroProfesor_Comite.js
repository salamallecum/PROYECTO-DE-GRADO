//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP REGISTRO DE PROFESOR SATISFACTORIO
const open1 = document.getElementById('btn_crearProfesor');
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
//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP PARA CAMBIO DE CONTRASEÑA
const open = document.getElementById('openModal');
const modal_container = document.getElementById('modal_container');
const close = document.getElementById('btn_cancelar');


open.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.add('show');
},false);


close.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.remove('show');
},false);
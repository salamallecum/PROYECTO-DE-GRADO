
//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//EVENTOS POPUP INFORMACION DE MEGAINSIGNIA O INSIGNIA
function eventoPopUpInfoInsignia(){

    let listOpen1 = document.getElementsByName('openModal');
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
eventoPopUpInfoInsignia();

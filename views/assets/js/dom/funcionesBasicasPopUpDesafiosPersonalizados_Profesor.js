//Archivo que define las operaciones basicas de los popup en la app Pandora (Abrir y cerrar)

//ASIGNACION DE EVENTOS A BOTONES ELIMINAR PARA LA ELIMINACIÓN DE PROPUESTAS DE DESAFIOS PERSONALIZADOS
function eventoPopUpEliminacionDeDesafiosPersonalizados(){

    let listOpen6 = document.getElementsByName('openModal6');
    var modal_container6 = document.getElementById('modal_container6');
    var close6 = document.getElementById('btn_cancelar6');

    //Recorremos el arreglo de elementos con el name openModal6
    for(var i=0; i<listOpen6.length; i++){
        
        listOpen6[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container6.classList.add('show');
        },false);
    }
    
    close6.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container6.classList.remove('show');
    },false); 
}

//ASIGNACION DE EVENTOS POPUP DE DESAFIOS QUE SON REFERENCIADOS
function eventoPopUpVerDesafioReferenciado(){

    let listOpen7 = document.getElementsByName('btnDetalleDesafioReferenciado');
    var modal_container7 = document.getElementById('modal_container7');
    var close7 = document.getElementById('btn_cancelar7');

    //Recorremos el arreglo de elementos con el name btnDetalleDesafioReferenciado
    for(var i=0; i<listOpen7.length; i++){
        
        listOpen7[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container7.classList.add('show');
        },false);
    }
    
    close7.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container7.classList.remove('show');
    },false); 

}

//ASIGNACION DE EVENTOS POPUP RECHAZO DE PROPUESTA DE DESAFIO PERSONALIZADO
function eventoPopUpRechazoPropuestaDeDesafioPersonalizado(){

    let listOpen8 = document.getElementsByName('openModal8');
    var modal_container8 = document.getElementById('modal_container8');
    var close8 = document.getElementById('btn_cancelar8');

    //Recorremos el arreglo de elementos con el name openModal8
    for(var i=0; i<listOpen8.length; i++){
        
        listOpen8[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container8.classList.add('show');
        },false);
    }
    
    close8.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container8.classList.remove('show');
    },false); 
}

//ASIGNACION DE EVENTOS POPUP REVISIÓN DE PROPUESTA DE DESAFIO PERSONALIZADO
function eventoPopUpRevisiónPropuestaDeDeDesafioPersonalizado(){

    let listOpen9 = document.getElementsByName('openModal9');
    var modal_container9 = document.getElementById('modal_container9');
    var close9 = document.getElementById('btn_cancelar9');

    //Recorremos el arreglo de elementos con el name openModal9
    for(var i=0; i<listOpen9.length; i++){
        
        listOpen9[i].addEventListener('click', (e) => {
            e.preventDefault();
            modal_container9.classList.add('show');
        },false);
    }
    
    close9.addEventListener('click', (e) => {
        e.preventDefault();
        modal_container9.classList.remove('show');
    },false); 
}

//INVOCACION DE FUNCIONES
eventoPopUpEliminacionDeDesafiosPersonalizados();
eventoPopUpVerDesafioReferenciado();
eventoPopUpRechazoPropuestaDeDesafioPersonalizado();
eventoPopUpRevisiónPropuestaDeDeDesafioPersonalizado();
window.addEventListener("resize", anchoPagina);

//Variables de cada uno de los componentes
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

//Función del boton Registrate y iniciar sesión de la caja trasera
export default function registerFrame(){
    
    //Evento formulario de login
    var btn_login = document.getElementById("btnLogin");
    btn_login.addEventListener('click', () => {
        
        if(window.innerWidth < 600){
            formulario_register.style.display = "none";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "block";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";     
        }else{
            formulario_register.style.display = "none";
            contenedor_login_register.style.left = "10px";
            formulario_login.style.display = "block";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }
        
    },false);


    //Evento formulario de registro
    var btn_registrate = document.getElementById("btnRegistro");
    btn_registrate.addEventListener('click', () => {

        if(window.innerWidth < 600){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
            
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }
        
    },false); 
}

//Hacemos que la pagina tenga diseño responsive design
function anchoPagina(){
    if(window.innerWidth > 600){
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}
   
anchoPagina();

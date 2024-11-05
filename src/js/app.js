document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function darkMode(){
   
    const bottonDarkMode = document.querySelector('.dark-mode-boton');
    bottonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
    const prefiereDarkMode = windows.matchMedia('(prefers-color-scheme:dark');
    //console.log(prefieredarkmode.matches);
    if(prefiereDarkMode.matches){
        document.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }
    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.classList.add('dark-mode');
        } else{
            document.body.classList.remove('dark-mode');
        }
    })
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto));
}
function navegacionResponsive(){
const navegacion = document.querySelector('.navegacion');
if(navegacion.classList.contains('mostrar')){
    navegacion.classList.remove('mostrar');
} else{
    navegacion.classList.add('mostrar');
}
}
function mostrarMetodosContacto(e){
const contactoDiv = document.querySelector('#contacto');
if(e.target.value === 'telefono'){
    contactoDiv.innerHTML = `
     <label for="phone">Phone Number</label>
                    <input type="tel" placeholder="Your phone" id="telefono" name="contacto[telefono]">
                    <label for="fecha">Date</label>
                    <p> Choose date and time for the call</p>
                    <input type="date" id="fecha" name="contacto[fecha]">
                     <label for="hora">Hour</label>
                    <input type="time" id="hora" min="09:00" max="20:00" name="contacto[hora]">
                    `
    
} else {
    contactoDiv.innerHTML = `
     <label for="email">Email</label>
                    <input type="email" placeholder="Your email" id="email" name="contacto[email]" required>`
}
}
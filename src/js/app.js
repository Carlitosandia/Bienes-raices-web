document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode ();
});

function darkMode() {
    const preferenciaDarkmode = window.matchMedia('(prefers-color-scheme:dark)');

   // console.log(preferenciaDarkmode.matches);

   if(preferenciaDarkmode.matches){
    document.body.classList.add('dark-mode');
   }else{
    document.body.classList.remove('dark-mode');
   }
   
   preferenciaDarkmode.addEventListener('change', function(){
    if(preferenciaDarkmode.matches){
        document.body.classList.add('dark-mode');
       }else{
        document.body.classList.remove('dark-mode');
       }
   });

    const botondarkMode = document.querySelector('.dark-mode-boton');

    botondarkMode.addEventListener('click',  function(){
        document.body.classList.toggle('dark-mode');
    });
}
function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive (){
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }
    else{
        navegacion.classList.add('mostrar');
    }
}
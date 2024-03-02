(function() {

    document.addEventListener('DOMContentLoaded', function() {

        const body = document.querySelector('body');
        const menu = document.querySelector('#menu');
        const menuActivo = document.querySelector('.barra__menu--activo');
        const x = document.querySelector('.x');
    
        menu.addEventListener('click', mostrarMenu)
        x.addEventListener('click', quitarMenu)
    
        function mostrarMenu() {
            menuActivo.classList.add('barra__menu--posicion');
            body.classList.add('barra__menu--body');
        }
    
        function quitarMenu() {
            menuActivo.classList.remove('barra__menu--posicion');
            body.classList.remove('barra__menu--body');
        }
    
    });
    

})();
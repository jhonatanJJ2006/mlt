(function() {
    const enlaces = document.querySelectorAll('.dashboard__p--learn');
    
    document.addEventListener('DOMContentLoaded', function() {
        const botonInicio = document.querySelector('.dashboard__p--learn[data-target="home"]');
        const cursoInicio = document.getElementById('home');
        
        botonInicio.classList.add('dashboard__p--learn-activo');
        cursoInicio.style.display = 'block';
        
        const botonesCurso = document.querySelectorAll('.dashboard__p--learn');
        const cursos = document.querySelectorAll('.dashboard__cursos--item');
        
        botonesCurso.forEach(boton => {
            boton.addEventListener('click', () => {
                botonesCurso.forEach(boton => {
                    boton.classList.remove('dashboard__p--learn-activo');
                });
                cursos.forEach(curso => {
                    curso.style.display = 'none';
                });
                const cursoId = boton.getAttribute('data-target');
                const cursoMostrar = document.getElementById(cursoId);
                cursoMostrar.style.display = 'block';
                boton.classList.add('dashboard__p--learn-activo');
            });
        });
    });


    enlaces.forEach(enlace => enlace.addEventListener('click', seleccionarEnlace));
    
    function seleccionarEnlace(e) {
        const enlaceClicado = e.currentTarget;
    
        const enlaceActivo = document.querySelector('.dashboard__p--learn-activo');
        if (enlaceActivo) {
            enlaceActivo.classList.remove('dashboard__p--learn-activo');
        }
    
        enlaceClicado.classList.add('dashboard__p--learn-activo');
    }

})();

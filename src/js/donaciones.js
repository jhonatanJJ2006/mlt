(function() {
    const btnMonto = document.querySelectorAll('#btnMonto');
    const input = document.querySelector('#input-monto');

    btnMonto.forEach(btn => {
        
        btn.addEventListener('click', function() {
            let existe = document.querySelector('.active');

            if(existe) {
                existe.classList.remove('active');
            }

            btn.classList.add('active');
            input.value = btn.getAttribute('data-monto');
        })
    })
    
})();

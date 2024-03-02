(function() {

    const cards = document.querySelectorAll('.card__boton');
    const inputHiddenPonentesCrear = document.querySelector('[name="ponente_id_crear"]');
    const inputHiddenPonentesEditar = document.querySelector('[name="ponente_id_editar"]');

    cards.forEach(card => card.addEventListener('click', seleccionarPonente))

    function seleccionarPonente(e) {

        const ponenteSeleccionado = document.querySelector('.card__seleccionado');

        if (inputHiddenPonentesCrear) {
            
            if (inputHiddenPonentesCrear.value === e.target.getAttribute('data-ponente_form-id')) {
                inputHiddenPonentesCrear.value = '';
                e.target.classList.remove('card__seleccionado');

            } else {

                if (ponenteSeleccionado) {
                    ponenteSeleccionado.classList.remove('card__seleccionado');

                } else {
                    e.target.classList.add('card__seleccionado');
                }

                console.log(inputHiddenPonentesCrear);

                inputHiddenPonentesCrear.value = e.target.getAttribute('data-ponente_form-id');
            }

        } else {

            if (inputHiddenPonentesEditar.value === e.target.getAttribute('data-ponente_form-id')) {
                inputHiddenPonentesEditar.value = '';
                e.target.classList.remove('card__seleccionado');

            } else {

                if (ponenteSeleccionado) {
                    ponenteSeleccionado.classList.remove('card__seleccionado');

                } else {
                    e.target.classList.add('card__seleccionado');
                }

                console.log(inputHiddenPonentesEditar);

                inputHiddenPonentesEditar.value = e.target.getAttribute('data-ponente_form-id');
            }
        }

    }

})();

(function() {

    const tagsInput = document.querySelector('#tags_input');
    const instruccionTags = document.querySelector('#instruccionTags');

    if(tagsInput) {

        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]');
        let tags = [];

        // Recuperar del input oculto
        if(tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(',');
            mostarTags();
        }

        // Escuchar los cambios en el input
        tagsInput.addEventListener('keypress', guardarTag)

        function guardarTag(e) {
            if(e.keyCode === 44) {

                if(e.target.value.trim() === '' || e.target.value < 1) { return }

                e.preventDefault();
                
                tags = [...tags, e.target.value.trim()]
                tagsInput.value = '';

                mostarTags();
            }
        }

        function mostarTags() {
            tagsDiv.textContent = '';
            instruccionTags.textContent = 'Doble Click para Eliminar Tag';

            tags.forEach(tag => {
                const etiqueta = document.createElement('LI');
                etiqueta.classList.add('formulario__tag');
                etiqueta.textContent = tag;
                etiqueta.ondblclick = eliminarTag
                tagsDiv.appendChild(etiqueta);
            })

            actualizarInputHidden();

        }

        function eliminarTag(e) {
            e.target.remove()

            tags = tags.filter(tag => tag !== e.target.textContent)

            if(tags.length === 0) {
                instruccionTags.textContent = '';
            }

            actualizarInputHidden();
        }

        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString();
        }

    }
})()
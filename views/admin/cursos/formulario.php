<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre Curso" name="nombre" value="<?php echo $curso->nombre ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="descripcion">Descripción</label>
        <textarea class="formulario-admin__input" placeholder="Una pequeña descripción del Curso" name="descripcion" id="descripcion" rows="10"><?php echo $curso->descripcion ?? '' ?></textarea>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="imagen">Imagen</label>
        <input class="formulario-admin__input formulario-admin__input--file" id="imagen" type="file" name="imagen">
    </div>

    <?php if($curso->imagen) { ?>
        <p class="formulario-admin__label">Imagen Actual:</p>

        <div class="formulario-admin__imagen">
            <picture>
                <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                <img src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen Curso">
            </picture>
        </div>
    <?php } ?>

</fieldset>

<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información Extra</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="duracion">Duración</label>
        <input class="formulario-admin__input" id="duracion" type="text" name="duracion" placeholder="Duración del curso ejm.3 meses, 120 días, etc" value="<?php echo $curso->duracion ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="precio">Precio Curso</label>
        <input class="formulario-admin__input" id="precio" type="number" name="precio" placeholder="ejm. 80" min="0" value="<?php echo $curso->precio ?>">
    </div>

</fieldset>

<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Ponentes</legend>

    <label class="formulario-admin__label--ponentes">Escoja un Ponente</label>

    <?php if($curso->ponente_id) { ?>
        <p id="ponente_actual">Ponente Actual: <span id="ponente_espan"><?php echo $ponente->nombre . ' ' . $ponente->apellido ?? '' ?></span></p>
    <?php } ?>


    <div class="formulario-admin__grid">

        <?php foreach($ponentes as $ponente_form) { ?>
            <div class="card">
                <div class="card__body">
                    <div class="card__body--border">
                        <div class="card__img-body">
                            <picture>
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente_form->imagen . '.webp'?>" type="image/webp">
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente_form->imagen . '.png'?>" type="image/png">
                                <img class="card__img" src="<?php echo '/build/img/speakers/' . $ponente_form->imagen . '.png'?>" alt="Imagen ponente_form">
                            </picture>
                        </div>

                        <p class="card__title"><?php echo $ponente_form->nombre . " " . $ponente_form->apellido ?? '' ?></p>
                        <p class="card__desc"><?php echo $ponente_form->descripcion ?></p>
                        <div data-ponente_form-id="<?php echo $ponente_form->id ?>" class="card__boton <?php echo ($curso->ponente_id) ? 'card__seleccionado' : '' ?>">Seleccionar</div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($curso->ponente_id) { ?>
            <input type="hidden" name="ponente_id_editar" value="<?php echo $curso->ponente_id ?>">
        <?php } else { ?>
            <input type="hidden" name="ponente_id_crear" value="">
        <?php } ?>

    </div>


</fieldset>

<?php 
    echo $paginacion
?>

<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información Personal</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre Ponente" name="nombre" value="<?php echo $ponente->nombre ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="apellido">Apellido (opcional)</label>
        <input class="formulario-admin__input" id="apellido" type="text" placeholder="Apellido Ponente" name="apellido" value="<?php echo $ponente->apellido ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="descripcion">Descripción</label>
        <textarea class="formulario-admin__input" placeholder="Una pequeña descripción del Ponente" name="descripcion" id="descripcion" rows="10"><?php echo $ponente->descripcion ?? '' ?></textarea>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="imagen">Imagen</label>
        <input class="formulario-admin__input formulario-admin__input--file" id="imagen" type="file" name="imagen">
    </div>

    <?php if($ponente->imagen) { ?>
        <p class="formulario-admin__label">Imagen Actual:</p>
    
        <div class="formulario-admin__imagen">
            <picture>
                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" type="image/png">
                <img src="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" alt="Imagen Ponente">
            </picture>
        </div>
    <?php } ?>

</fieldset>

<fieldset class="formulario-admin__fieldset">
    <legend class="formulario-admin__legend">Información Extra</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="tags_input">Áreas de Experiencia (separadas por coma)</label>
        <input class="formulario-admin__input" id="tags_input" type="text" placeholder="Ej. Node.js, PHP, Laravel, UX / UI">
    </div>

    <p id="instruccionTags" class="formulario-admin__label"></p>

    <div id="tags" class="formulario-admin__listado"></div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? '' ?>">

    </fieldset>

    <fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Redes Sociales (opcional)</legend>

    <div class="formulario-admin__contenedor-icono">
        <div class="formulario-admin__icono">
            <i class="fa-brands fa-facebook"></i>
        </div>

        <input class="formulario-admin__input--sociales" type="text" placeholder="Facebook" name="redes[facebook]" value="<?php echo $redes->facebook ?>">
    </div>

    <div class="formulario-admin__contenedor-icono">
        <div class="formulario-admin__icono">
            <i class="fa-brands fa-twitter"></i>
        </div>

        <input class="formulario-admin__input--sociales" type="text" placeholder="Twitter" name="redes[twitter]" value="<?php echo $redes->twitter ?>">
    </div>

    <div class="formulario-admin__contenedor-icono">
        <div class="formulario-admin__icono">
            <i class="fa-brands fa-youtube"></i>
        </div>

        <input class="formulario-admin__input--sociales" type="text" placeholder="Youtube" name="redes[youtube]" value="<?php echo $redes->youtube ?>">
    </div>  

    <div class="formulario-admin__contenedor-icono">
        <div class="formulario-admin__icono">
            <i class="fa-brands fa-instagram"></i>
        </div>

        <input class="formulario-admin__input--sociales" type="text" placeholder="Instagram" name="redes[instagram]" value="<?php echo $redes->instagram ?>">
    </div>

    <div class="formulario-admin__contenedor-icono">
        <div class="formulario-admin__icono">
            <i class="fa-brands fa-tiktok"></i>
        </div>

        <input class="formulario-admin__input--sociales" type="text" placeholder="Tiktok" name="redes[tiktok]" value="<?php echo $redes->tiktok ?>">
    </div>

</fieldset>



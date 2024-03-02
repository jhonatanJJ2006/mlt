<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre articulo" name="nombre" value="<?php echo $articulo->nombre ?? '' ?>">
    </div>

    <?php
        date_default_timezone_set('America/Ecuador');
    ?>

    <?php if($articulo->fecha) { ?>
        <input type="hidden" name="fecha" value="<?php echo $articulo->fecha ?>">
    <?php } else { ?>
        <input type="hidden" name="fecha" value="<?php echo date('Y-m-d') ?>">
    <?php } ?>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="imagen">Imagen</label>
        <input class="formulario-admin__input formulario-admin__input--file" id="imagen" type="file" name="imagen">
    </div>
    
    <?php if($articulo->imagen) { ?>
        <p class="formulario-admin__label">Imagen Actual:</p>
    
        <div class="formulario-admin__imagen">
            <picture>
                <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" type="image/png">
                <img src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen articulo">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="descripcion">Descripción</label>
        <textarea class="formulario-admin__input" placeholder="Una descripción del articulo" name="descripcion" id="descripcion" rows="25"><?php echo $articulo->descripcion ?? '' ?></textarea>
    </div>


</fieldset>
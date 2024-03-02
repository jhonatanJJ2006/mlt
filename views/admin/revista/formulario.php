<fieldset class="formulario-admin__fieldset">
 
    <legend class="formulario-admin__legend">Información de la Revista</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre de la Revista</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre" name="nombre" value="<?php echo $revista->nombre ?? '' ?>">
    </div>
    
    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="imagen">Imagen Principal de la Revista</label>
        <input class="formulario-admin__input" id="imagen" type="file" name="imagen" accept="image/*">
    </div>

    <?php if($revista->imagen) { ?>
        <p class="formulario-admin__label">Imagen Actual:</p>
    
        <div class="formulario-admin__imagen">
            <picture>
                <source srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" type="image/png">
                <img src="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" alt="Imagen Curso">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="pdf">Archivo PDF</label>
        <input class="formulario-admin__input" id="pdf" type="file" name="pdf" accept="image/*,application/pdf">
    </div>

    <?php if($revista->pdf) { ?>
        <p class="formulario-admin__label">PDF Actual:</p>
        
        <embed src="<?php  echo '/build/revistas/pdf/' . $revista->pdf . '.pdf' ?>" type="application/pdf" width="100%" height="600px" />

    <?php } ?>
        
</fieldset>


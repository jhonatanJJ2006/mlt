<?php if($youtube) { ?>
    <fieldset class="formulario-admin__fieldset">
     
        <legend class="formulario-admin__legend">URL Youtube</legend>
    
        <div class="formulario-admin__campo">
            <label class="formulario-admin__label" for="nombre">Url del Video</label>
            <input class="formulario-admin__input" id="nombre" type="text" placeholder="ejm https://www.ejemplo.com" name="url">
        </div>
    
    </fieldset>
    
<?php } else { ?>

        <fieldset class="formulario-admin__fieldset">
        
            <legend class="formulario-admin__legend">Video</legend>
        
            <div class="formulario-admin__campo">
                <input class="formulario-admin__input" type="file" name="video" accept="video/*">
            </div>
        
        </fieldset>

<?php } ?>


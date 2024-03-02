<fieldset class="formulario-admin__fieldset">
 
    <legend class="formulario-admin__legend">Información del Documento</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="archivo">Documento</label>
        <input class="formulario-admin__input" id="archivo" type="file" name="archivo" value="<?php echo $alerta->archivo ?? '' ?>">
    </div>
        
</fieldset>


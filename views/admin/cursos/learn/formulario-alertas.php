<fieldset class="formulario-admin__fieldset">
 
    <legend class="formulario-admin__legend">Información de la Alerta</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Texto de la Alerta</label>
        <textarea class="formulario-admin__input" id="nombre" type="text" placeholder="Texto" name="nombre" rows="10" cols="30"><?php echo $alerta->nombre ?? '' ?></textarea>
    </div>
        
</fieldset>


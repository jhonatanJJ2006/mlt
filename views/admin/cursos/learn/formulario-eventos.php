<fieldset class="formulario-admin__fieldset">
 
    <legend class="formulario-admin__legend">Información del Evento</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre del Evento</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre" name="nombre" value="<?php echo $evento->nombre ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="url">Url del Evento</label>
        <input class="formulario-admin__input" id="url" type="text" placeholder="URL" name="url" value="<?php echo $evento->url ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="fecha">Fecha del Evento</label>
        <input class="formulario-admin__input" id="fecha" type="date" placeholder="Fecha" name="fecha" value="<?php echo $evento->fecha ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="hora">Hora del Evento</label>
        <input class="formulario-admin__input" id="hora" type="time" placeholder="Hora" name="hora" value="<?php echo $evento->hora ?? '' ?>">
    </div>
        
</fieldset>

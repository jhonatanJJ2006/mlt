<main class="auth auth__centrar-texto auth__blur">
    <div class="auth__contenedor auth__contenedor--disabled">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Recupera tu Acceso a Militia Michael</p>
    
        <form class="formulario" action="/auth/olvide" method="POST">
    
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input id="email" class="formulario__input" type="email" name="email" placeholder="Tu Email" value="<?php echo $usuario->email ?>">
            </div>
    
            <input class="formulario__submit formulario__submit--auth" type="submit" value="Enviar Instrucciones">
        </form>
    
        <div class="acciones">
            <a class="acciones__enlace" href="/auth/login">¿Ya tienes cuenta? Inicia Sesión</a>
            <a class="acciones__enlace" href="/auth/registro">¿Aún no tienes cuenta? Obtener una</a>
        </div>
    </div>
</main>
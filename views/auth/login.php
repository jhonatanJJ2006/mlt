<main class="auth auth__centrar-texto auth__blur">
    <div class="auth__contenedor auth__contenedor--disabled">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Inicia Sesión en Militia Michael</p>

        <?php
            include_once __DIR__ .  '/../templates/alertas.php';
        ?>
    
        <form class="formulario" action="/auth/login" method="POST">
    
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input id="email" class="formulario__input" type="email" name="email" placeholder="Tu Email" value="<?php echo $usuario->email ?>">
            </div>
            
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input id="password" class="formulario__input" type="password" name="password" placeholder="Tu Password">
            </div>
    
            <input class="formulario__submit formulario__submit--auth" type="submit" value="Iniciar Sesión">
        </form>
    
        <div class="acciones">
            <a class="acciones__enlace" href="/auth/registro">¿Aún no tienes cuenta? Obtener una</a>
            <a class="acciones__enlace" href="/auth/olvide">¿Olvidaste tu password?</a>
        </div>
    </div>
</main>
<main class="auth auth__centrar-texto auth__blur">
    <div class="auth__contenedor">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Recupera tu Acceso a Militia Michael</p>

        <?php 
            include_once __DIR__ . '/../templates/alertas.php'
        ?>

        <?php if($token_valido) { ?>

            <form class="formulario" method="POST">
                <div class="formulario__campo">
                    <label class="formulario__label" for="password">Nuevo Password</label>
                    <input id="password" class="formulario__input" type="password" name="password" placeholder="Tu Nuevo Password">
                </div>
        
                <div class="formulario__campo">
                    <label class="formulario__label" for="password2">Repetir Password</label>
                    <input id="password2" class="formulario__input" type="password" name="password2" placeholder="Repetir Password">
                </div>
        
                <input class="formulario__submit" type="submit" value="Enviar Instrucciones">
            </form>
            
        <?php } ?>


        <div class="acciones">
            <a class="acciones__enlace" href="/auth/login">¿Ya tienes cuenta? Iniciar Sesión</a>
            <a class="acciones__enlace" href="/auth/registro">¿Aún no tienes cuenta? Obtener una</a>
        </div>
    </div>
</main>

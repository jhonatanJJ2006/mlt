<main class="auth auth__centrar-texto auth__blur">
    <div class="auth__contenedor">
        <div class="auth__padding">
            <h2 class="auth__heading"><?php echo $titulo ?></h2>
            <p class="auth__texto">Registrate en</p>
    
            <?php include_once __DIR__ . '/../templates/alertas.php' ?>
        
            <form class="formulario" action="/auth/registro" method="POST">
                <div class="formulario__campo">
                    <label class="formulario__label" for="nombre">Nombre</label>
                    <input id="nombre" class="formulario__input" type="text" name="nombre" placeholder="Tu Nombre" value="<?php echo $usuario->nombre ?>">
                </div>
                
                <div class="formulario__campo">
                    <label class="formulario__label" for="apellido">Apellido</label>
                    <input id="apellido" class="formulario__input" type="text" name="apellido" placeholder="Tu Apellido" value="<?php echo $usuario->apellido ?>">
                </div>
        
                <div class="formulario__campo">
                    <label class="formulario__label" for="email">Email</label>
                    <input id="email" class="formulario__input" type="email" name="email" placeholder="Tu Email" value="<?php echo $usuario->email ?>">
                </div>
                
                <div class="formulario__campo">
                    <label class="formulario__label" for="telefono">Teléfono</label>
                    <input id="telefono" class="formulario__input" type="tel" name="telefono" placeholder="Tu Teléfono" value="<?php echo $usuario->telefono ?>">
                </div>
                
                <div class="formulario__campo">
                    <label class="formulario__label" for="password">Password</label>
                    <input id="password" class="formulario__input" type="password" name="password" placeholder="Tu Password">
                </div>
                
                <div class="formulario__campo">
                    <label class="formulario__label" for="password2">Repetir Password</label>
                    <input id="password2" class="formulario__input" type="password" name="password2" placeholder="Repetir Password">
                </div>
        
                <input class="formulario__submit formulario__submit--auth" type="submit" value="Crear Cuenta">
            </form>
        
            <div class="acciones">
                <a class="acciones__enlace" href="/auth/login">¿Ya tienes cuenta? Iniciar Sesión</a>
                <a class="acciones__enlace" href="/auth/olvide">¿Olvidaste tu password?</a>
            </div>
        </div>
    </div>
</main>
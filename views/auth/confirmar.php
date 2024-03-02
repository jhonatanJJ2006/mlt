<main class="auth auth__contenedor auth__contenedor--disabled auth__centrar-texto auth__blur">

    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Tu Cuenta Militia Michael</p>

    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?> 

    <?php if(isset($alertas['exito'])) { ?>

    <div class=" acciones acciones--centrar">
        <a class="acciones__enlace" href="/auth/login">Iniciar Sesión</a>
    </div>

    <?php } ?>

</main>
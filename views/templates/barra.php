<div class="barra">

    <a class="barra__logo" href="/">
        <picture>
            <source class="" srcset="/build/img/logo.webp" type="image/webp">
            <source class="" srcset="/build/img/logo.png" type="image/png">
            <img class="barra__logo" src="/build/img/logo.png" alt="Imagen curso">
        </picture>    
    </a>

    <div class="barra__sitios <?php echo pagina_actual('/carrito') ? 'barra__sitios--display' : '' ?>">
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/') ? 'barra___sitios--actual' : 'barra__sitios--actual' ?>" href="/">
            <i class="fa-solid fa-house"></i>
            home
        </a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/quienes-somos') ? 'barra__sitios--actual' : '' ?>" href="/quienes-somos">¿Quienes Somos?</a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/cursos') ? 'barra__sitios--actual' : '' ?>" href="/cursos">Cursos</a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/donaciones') ? 'barra__sitios--actual' : '' ?>" href="/donaciones">Donaciones</a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/revista') ? 'barra__sitios--actual' : '' ?>" href="/revista">Revista</a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/medios') ? 'barra__sitios--actual' : '' ?>" href="/medios">Medios</a>
        <a class="barra__sitios--enlace barra__display <?php echo pagina_actual('/contacto') ? 'barra__sitios--actual' : '' ?>" href="/contacto">Contacto</a>
    </div>

    <div class="barra__acciones">

        <?php if(is_auth()) { ?>
            <a class="barra__sitios--enlace barra__acciones--display carrito" href="/carrito">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <?php 
            if($compras) { ?>
                <div id="numero" class="carrito__contador"><?php echo count($compras) ?></div>
            <?php } ?>
        <?php } ?>

        <?php if(is_auth()) { ?>
            <form class="barra__sitios--enlace barra__acciones--display" action="/logout" method="POST">
                <button class="table__accion--logout" type="submit">
                    Logout
                </button>
            </form>                      
        <?php } else { ?>
            <div class="barra__sitios--enlace">
                <a class="table__accion--logout" href="/auth/registro">Registrate</a>
            </div>    
            <div class="barra__sitios--enlace">
                <a class="table__accion--logout" href="/auth/login">Iniciar Sesión</a>
            </div>    
        <?php } ?>

        <div id="menu" class="barra__menu"><i class="fa-solid fa-bars"></i></i></div>

    </div> 

    <div class="barra__menu--activo">
        <div class="barra__menu--contenedor">
            <div class="barra__menu--flex">
                <a class="barra__logo barra__menu--logo" href="/">Militia Michael</a>
                <div class="x"><i class="fa-solid fa-x"></i></div>
            </div>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/') ? 'barra___sitios--actual' : 'barra__sitios--actual' ?>" href="/">
                <i class="fa-solid fa-house"></i>
                home
            </a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/quienes-somos') ? 'barra__sitios--actual' : '' ?>" href="/quienes-somos">¿Quienes Somos?</a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/cursos') ? 'barra__sitios--actual' : '' ?>" href="/cursos">Cursos</a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/donaciones') ? 'barra__sitios--actual' : '' ?>" href="/donaciones">Donaciones</a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/revista') ? 'barra__sitios--actual' : '' ?>" href="/revista">Revista</a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/medios') ? 'barra__sitios--actual' : '' ?>" href="/medios">Medios</a>
            <a class="barra__menu--block barra__sitios--enlace <?php echo pagina_actual('/contacto') ? 'barra__sitios--actual' : '' ?>" href="/contacto">Contacto</a>

            <div id="redes" class="barra__menu--block barra__sitios--enlace">
                Redes
                <a class="barra__menu--redes" href="https://www.youtube.com/@MMichaelArc"><i class="fa-brands fa-youtube"></i>Youtube</a>
                <a class="barra__menu--redes" href="https://t.me/MichaelArcangelus"><i class="fa-brands fa-telegram"></i>Telegram</a>
                <a class="barra__menu--redes" href="https://twitter.com/mmichaelarc?s=21"><i class="fa-brands fa-twitter"></i>Twitter</a>
                <a class="barra__menu--redes" href="https://odysee.com/@MichaelArchangelus:b"><i class="fa-solid fa-play"></i>Odysee</a>
                <a class="barra__menu--redes" href="https://rumble.com/v3rtc0y-militia-michael-archangelus.html"><i class="fa-solid fa-video"></i>Rumble</a>
            </div>

            <a class="barra__menu--block barra__sitios--enlace barra__menu--carrito" href="/cursos/learn">
                <i class="fa-solid fa-graduation-cap"></i>
                Mis Cursos
            </a>

            <?php if(is_auth()) { ?>
                <?php if($compras) { ?>
                    <div id="numero" class="carrito__numero"><?php echo count($compras) ?></div>
                <?php } ?>
                <a class="barra__menu--block barra__sitios--enlace barra__menu--carrito" href="/carrito">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Carrito de Compras
                </a>
            <?php } ?>

            <?php if(is_auth()) { ?>
                <form class="barra__sitios--enlace" action="/logout" method="POST">
                    <button class="table__accion--logout" type="submit">
                        Logout
                    </button>
                </form>                      
            <?php } else { ?>
                <div class="barra__sitios--enlace">
                    <a class="table__accion--logout" href="/auth/registro">Registrate</a>
                </div>    
                <div class="barra__sitios--enlace">
                    <a class="table__accion--logout" href="/auth/login">Iniciar Sesión</a>
                </div>    
            <?php } ?>

        </div>
    </div>

</div>


<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?> 

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    <h3 class="dashboard__h3">Conectando Corazones, Inspirando Almas.</h3>
    <p class="dashboard__p--nosotros">Descubre la verdadera Doctrina, Magisterio y Tradición de la Iglesia Católica, en cada video que elaboramos. Súmate a nuestra comunidad y ayúdanos a salvar alm</p>

    <div class="articulo__grid">
        <div class="articulo__contenido">
            <h2 class="articulo__h2"><?php echo $articulo_id->nombre ?></h2>

            <picture>
                <source srcset="<?php echo '/build/img/articulos/'. $articulo_id->imagen .'.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/articulos/'. $articulo_id->imagen .'.png'?>" type="image/png">
                <img src="<?php echo '/build/img/articulos/' . $articulo_id->imagen . '.png'?>" alt="Imagen recurso">
            </picture>

            <p class="articulo__texto"><?php echo $articulo_id->descripcion ?></p>
                
        </div>

        <div class="articulo__articulos">

            <h3 class="articulo__h3">Más Articulos de Interes</h3>

            <?php foreach($articulos as $articulo) { ?>

                <a class="articulo__tarjeta" href="/medios-articulo?id=<?php echo $articulo->id ?>">
                    <picture>
                        <source srcset="<?php echo '/build/img/articulos/'. $articulo->imagen .'.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/articulos/'. $articulo->imagen .'.png'?>" type="image/png">
                        <img class="articulo__tarjeta--imagen" src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen recurso">
                    </picture>

                    <div class="articulo__tarjeta--contenido">
                        <h3 class="articulo__nombre"><?php echo $articulo->nombre ?></h3>
                        <p class="articulo__fecha"><?php echo $articulo->fecha ?></p>
                    </div>
                </a>

            <?php } ?>

        </div>
    </div>

    <h2 class="dashboard__h2">Donaciones Generosas</h3>
    <h3 class="dashboard__h3">Apoya nuestra misión fortalece la fe</h3>
    <p class="dashboard__p">Ayuda a fortalecer la fe y detener el cristianismo. Tu donación es fundamental para nuestra misión global.</p>
    
    <form class="formulario-admin formulario__donaciones"  method="POST">

        <?php include_once __DIR__ . '/../../templates/alertas.php' ?>

        <fieldset class="formulario-admin__fieldset">
            <legend class="formulario-admin__legend--contacto">Cantidad</legend>
            <div class="formulario-admin__campo">
                <label class="formulario-admin__label--contacto" for="cantidad">Escoja un Monto</label>
                <div class="formulario__monto">
                    <div id="btnMonto" data-monto="20" class="formulario__monto--opcion"><p class="codepen-button"><span>$20</span></p></div>
                    <div id="btnMonto" data-monto="40" class="formulario__monto--opcion"><p class="codepen-button"><span>$40</span></p></div>
                    <div id="btnMonto" data-monto="60" class="formulario__monto--opcion"><p class="codepen-button"><span>$60</span></p></div>
                    <div id="btnMonto" data-monto="80" class="formulario__monto--opcion"><p class="codepen-button"><span>$80</span></p></div>
                    <div id="btnMonto" data-monto="100" class="formulario__monto--opcion"><p class="codepen-button"><span>$100</span></p></div>
                    <div id="btnMonto" data-monto="1000" class="formulario__monto--opcion"><p class="codepen-button"><span>$1000</span></p></div>
                </div>
            </div>    
            <div class="formulario-admin__campo">
                <label class="formulario__label" for="monto">Monto</label>
                <input id="input-monto" class="formulario__input" type="number" name="monto" min="20" placeholder="Monto Personalizado">
            </div>
        </fieldset>

        <br>
        <br>
        
        <!-- Container for the PayPal button -->
        <div id="paypal-button-container"></div>
        <!-- Container for displaying result messages -->
        <p id="result-message"></p>
        
    </form>
    
</main>
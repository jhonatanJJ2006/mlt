<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?> 
    <?php include_once __DIR__ . '/../AppPlayer/index.php'; ?> 

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    <h3 class="dashboard__h3">Conectando Corazones, Inspirando Almas.</h3>
    <p class="dashboard__p--medios">Descubre la verdadera Doctrina, Magisterio y Tradición de la Iglesia Católica, en cada video que elaboramos. Súmate a nuestra comunidad y ayúdanos a salvar almas</p>
    
    <div class="dashboard__cursos">
   
        <?php foreach($medios as $medio) { ?>
            <tr class="table__tr">
                <td class="table__td">
                    <div class="formulario-admin__video--tamaño">
                        <?php if(strlen(trim($medio->url)) === 32) { ?>
                            <video class="formulario-admin__video--block" src="<?php echo '/build/videos/' . trim($medio->url) . '.mp4'?>" controls></video>
                        <?php } else { ?>
                            <iframe class="formulario-admin__video--block" src="https://www.youtube.com/embed/<?php echo trim($medio->url) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        
    </div>

    <h2 class="dashboard__h2">Entradas Recientes</h2>
    <h3 class="dashboard__h3">Artículos de Interés</h3>

    <div class="dashboard__cursos dashboard__cursos--transparente">

        <?php foreach($articulos as $articulo) { ?>

            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <picture>
                        <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" type="image/png">
                        <img class="tarjeta__face" src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen articulo">
                    </picture>
                    <div class="tarjeta__contenido tarjeta__centrar">
                        <h3 class="tarjeta__nombre"><?php echo $articulo->nombre ?></h3>
                        <p class="tarjeta__texto"><?php echo $articulo->fecha ?></p>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back dashboard__tarjeta-bg">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg tarjeta__contenido tarjeta__centrar"></div>
                    <p class="tarjeta__descripcion"><?php if(strlen($articulo->descripcion) < 1000) {
                        echo $articulo->descripcion;
                    } else {
                        echo substr($articulo->descripcion, 0, 1000) . "...";
                    } ?></p>
                    <div class="table__carrito">
                        <input type="hidden" name="id" value="<?php echo $articulo->id ?>">
                        <a class="admin__boton--contacto" href="/medios-articulo?id=<?php echo $articulo->id ?>">
                            <i class="fa-solid fa-square-plus"></i>
                            Más Información
                        </a>
                </div>  
                </div>
            </div>

        <?php } ?> 

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
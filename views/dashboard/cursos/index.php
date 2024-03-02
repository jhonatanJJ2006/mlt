<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <?php if($alerta) {
        include_once __DIR__ . '/../../templates/alertas.php';
    } ?>

    <div class="dashboard__cursos">

        <?php foreach($cursos as $curso) { ?>
            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <picture>
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                        <img class="tarjeta__face" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen curso">
                    </picture>
                    <div class="tarjeta__contenido">
                        <h3 class="tarjeta__nombre"><?php echo $curso->nombre ?></h3>
                        <p class="tarjeta__texto"><?php echo $curso->duracion ?></p>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                    <p class="tarjeta__descripcion"><?php if(strlen($curso->descripcion) < 1000) {
                        echo $curso->descripcion;
                    } else {
                        echo substr($curso->descripcion, 0, 1000) . "...";
                    } ?></p>
                    <form class="table__carrito" method="POST">
                        <input type="hidden" name="curso_id" value="<?php echo $curso->id ?>">
                        <button class="table__accion--carrito" type="submit">
                            <i class="fa-solid fa-cart-plus"></i>
                            Añadir a Carrito
                        </button>
                    </form>   
                </div>
            </div>
        <?php } ?> 

    </div>

    <h2 class="dashboard__h2">Nuestros Ponentes</h2>

    <div class="formulario-admin__grid">
        <?php foreach($ponentes as $ponente) { ?>
            <div class="card card__cursos">
                <div class="card__body card__body--cursos">
                    <div class="card__body--border-cursos">
                        <div class="card__img-body--cursos">
                            <picture>
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.webp'?>" type="image/webp">
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" type="image/png">
                                <img class="card__img" src="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" alt="Imagen ponen$ponente">
                            </picture>
                        </div>
            
                        <p class="card__title"><?php echo $ponente->nombre . " " . $ponente->apellido ?? '' ?></p>
                        <p class="card__desc"><?php if(strlen($ponente->descripcion) < 250) {
                            echo $ponente->descripcion;
                        } else {
                            echo substr($ponente->descripcion, 0, 250) . "...";
                        } ?></p>

                        <div class="table__formulario">
                            <a class="admin__boton--cursos admin__boton--ponentes" href="/ponente-informacion?id=<?php echo $ponente->id ?>">
                                <i class="fa-solid fa-plus"></i>
                                Más Información
                            </a>
                    </div>
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
    </form>

    <div>
        
    </div>
    
</main>



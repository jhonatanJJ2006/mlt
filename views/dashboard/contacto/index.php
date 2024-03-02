<main class="dashboard__color">

<?php include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__nosotros">

        <div class="dashboard__nosotros--block">

            <div class="dashboard__nosotros--info">

                <img src="/build/img/contacto1.webp" alt="Imagen articulo">
                <div>
    
                    <h3 class="dashboard__h3">Milicia de la Inmaculada</h3>
    
                    <p class="dashboard__p"><i class="fa-solid fa-phone"></i> <i class="fa-solid fa-envelope"></i> ¡Conéctate con Nosotros en Milicia de La Inmaculada! <i class="fa-solid fa-envelope"></i> <i class="fa-solid fa-phone"></i></p>
    
                    <p class="dashboard__p">¿Tienes preguntas, comentarios o simplemente quieres compartir tu experiencia espiritual con nosotros? Estamos aquí para escucharte y apoyarte en tu camino de fe.</p>

                    <ul class="listados">
                        <li><i class="fa-solid fa-location-dot"></i> Juan Gonzalez N3526 y Juan Pablo Sanz.</li>
                        <a href="https://api.whatsapp.com/send?phone=14169009109"><li><i class="fa-solid fa-phone"></i> +1 (416) 900-9109</li></a>
                        <li><i class="fa-solid fa-envelope"></i> militiamichael@protonmail.com</li>
                    </ul>
                </div>

            </div>

        </div>


        <div class="admin__formulario--contacto">
    
            <?php include_once __DIR__ . '/../../templates/alertas.php' ?>

            <form class="formulario-admin"  method="POST">

                <?php include_once __DIR__ . '/formulario.php' ?>

                <input class="formulario-admin__submit--contacto" type="submit" value="Enviar">
            </form>
        </div>

    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7979.597198008901!2d-78.48705!3d-0.180148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a888d5fcce7%3A0x516441acecafe5c5!2sHealth%20Estetic!5e0!3m2!1ses-419!2sus!4v1707785786393!5m2!1ses-419!2sus" width="100%" height="400rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    
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
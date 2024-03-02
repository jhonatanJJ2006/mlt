<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__nosotros">

        <div class="auth__3d">
            <model-viewer
                class="dashboard__3d--tamaño"
                id="modelViewer"
                src= "/build/img/modelos_3d/prueba.glb"  
                camera-controls
                camera-orbit="40deg 80deg 35m"
                auto-rotate
                ar
                shadow-intensity="2"
            ></model-viewer>
        </div>
        
        <div class="dashboard__contenido-nosotros--disabled">
            <h3 class="dashboard__h3--nosotros">Quienes Somos</h3>
            <p class="dashboard__p--nosotros">Cabe recordar que: Santa Iglesia Católica, se divide en tres misiones sobrenaturales:</p>
            
            <ul class="listados">
                <li><i class="fa-solid fa-check"></i><p>La Iglesia Militante</p></li>
                <li><i class="fa-solid fa-check"></i><p>La Iglesia Purgante</p></li>
                <li><i class="fa-solid fa-check"></i><p>La Iglesia Triunfante</p></li>
            </ul>

            <p class="dashboard__p--nosotros"><span>La Iglesia Purgante</span> comprende las almas de los justos que sufren en el purgatorio a medida que se purifican para el cielo.</p>
            <p class="dashboard__p--nosotros"><span>La Iglesia Triunfante</span> comprende las almas de los santos que han sido glorificados en el cielo.</p>
            <p class="dashboard__p--nosotros"><span>La Iglesia Militante</span> comprende las almas en la Tierra que participan en la batalla contra las fuerzas del mal.</p>
            
            <p class="dashboard__p--nosotros">Somos seglares misioneros en la Orden de la Milicia de La Inmaculada, bajo la guía y protección de nuestro Patrono, San Miguel Arcángel.</p>
            <p class="dashboard__p--nosotros">Recordando que “la vida del hombre sobre la tierra es milicia” Job VII, 1, necesitamos prepararnos para este combate espiritual.</p>
            
        </div>        
    </div>
    
    <dv class="dashboard__nosotros-mision">
        
        <div class="auth__3d dashboard__nosotros-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/9gQxij_-_bk?si=MrXr6csLYqLTJxuy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div class="dashboard__contenido-nosotros--disabled">
            <h2 class="dashboard__h2">Misión</h2>
        
            <h3 class="dashboard__h3">Militia Michael Arcangelus</h3>
        
            <p class="dashboard__p--nosotros">
                Como nos recordara Job hace muchos siglos que: “La vida del hombre sobre la tierra es milicia y para comprender esto cabe recordar que:
                “Los Cristianos hemos nacido para el combate”. Así nos lo enfatizo el Papa León XIII, en su encíclica Sapientiae Christianae (Sabiduría Cristiana en Castellano). Así que estamos en este combate de:
            </p>
        
            <ul class="listados">
                <li><i class="fa-solid fa-check"></i><p>Restaurar la Cultura Católica</p></li>
                <li><i class="fa-solid fa-check"></i><p>Defender la Tradición Caatólica</p></li>
                <li><i class="fa-solid fa-check"></i><p>Confirmar la Fe Católica</p></li>
            </ul>
        </div>

    </dv>

    <div class="dashboard__nosotros-mision">

        <h2 class="dashboard__h2">Visión</h2>   
        
        <div class="dashboard__cursos--vision">

            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <img class="tarjeta__face" src="<?php echo '/build/img/vision.webp'?>" alt="Imagen curso">
                    <div class="tarjeta__contenido">
                        <h1 class="tarjeta__nombre"><i class="fa-solid fa-quote-left"></i></h1>
                        <h3 class="tarjeta__texto">Militia Michael Arcangelus</h3>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                    <p class="tarjeta__descripcion">
                        Un lugar para comenzar a reconstruir el verdadero espíritu católico. No solo estamos aquí para concentrarnos en los problemas, sino para ofrecer soluciones concretas.
                        Queremos restaurar la cultura católica, formar integralmente al católico, reconstruir la Iglesia con nuestra propia santificación, revitalizar a la familia con la Tradición y Magisterio bimilenario, y apoyar en su búsqueda de la Fe verdadera.
                    </p>
                    
                    <div class="dashboard__cursos--enlace">
                        <div class="admin__boton--contacto" href="/contacto">
                            <i class="fa-solid fa-address-book"></i>
                            Contactenos
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled dashboard__etiquetas--hover">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-quote-left"></i></p>
            <p class="dashboard__etiquetas--texto">"Los Cristianos hemos nacido para el combate"</p>
        </div>
        
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled dashboard__etiquetas--hover">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-church"></i></p>
            <p class="dashboard__etiquetas--texto1">Restaurar la Cultura Católica</p>
        </div>
        
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled dashboard__etiquetas--hover">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-book-bible"></i></p>
            <p class="dashboard__etiquetas--texto1">Defender la Tradición Católica</p>
        </div>
        
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled dashboard__etiquetas--hover">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-hands-praying"></i></p>
            <p class="dashboard__etiquetas--texto1">Confirmar la Fe Católica</p>
        </div>
    </div>    
</main>

<div class="dashboard__color">

    <div class="slider-container dashboard__color">
        <div class="slider position"></div>
    </div>

    <div class="dashboard__nosotros-mision">
        <h2 class="dashboard__h2">Nuestra Iglesia</h2>  
        <h3 class="dashboard__h3">La Iglesia Militante (Ecclesia Militans)</h3>
        <p class="dashboard__p--nosotros contenedor-sm centrar">
            Es la milicia cristiana. La Iglesia Militante lucha contra el pecado, el diablo y los demonios “porque para nosotros la lucha no es contra sangre y carne, sino contra los principados, contra las potestades, contra los poderes mundanos de estas tinieblas, contra los espíritus de la maldad en lo celestial”
        </p>
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled dashboard__etiquetas--hover margin-top">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-hands-praying"></i></p>
            <p class="dashboard__etiquetas--texto1">(Efesios 6:12)</p>
            <p class="dashboard__etiquetas--texto2">
                “Los Cristianos han nacido para el combate”
            </p>
            <p class="dashboard__etiquetas--texto2">
                Papa León XIII, Sapientiae Christianae
            </p>
        </div>
    </div>

    <div class="dashboard__cursos dashboard__iglesia">

        <div class="tarjeta">
            <div class="tarjeta__face tarjeta__front">
                <picture>
                    <source srcset="<?php echo '/build/img/quienes_somos/1.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/quienes_somos/1.png'?>" type="image/png">
                    <img class="tarjeta__face" src="<?php echo '/build/img/quienes_somos/1.png'?>" alt="Imagen recurso">
                </picture>
                <div class="tarjeta__contenido tarjeta__centar">
                    <h3 class="tarjeta__texto">Cultura Católica</h3>
                </div>
            </div>

            <div class="tarjeta__face tarjeta__back dashboard__tarjeta-bg">
                <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                <h3 class="tarjeta__nombre">Firmeza en la Fe</h3>
                <p class="tarjeta__descripcion">La Iglesia Militante representa la fortaleza y determinación en la defensa de la fe católica.</p>
                <a class="table__carrito" href="/contacto">
                    <div class="dashboard__cursos--enlace">
                        <div class="admin__boton--contacto" href="/contacto">
                            <i class="fa-solid fa-address-book"></i>
                            Contactenos
                        </div>
                    </div>
                </a>   
            </div>
        </div>

        <div class="tarjeta">
            <div class="tarjeta__face tarjeta__front">
                <picture>
                    <source srcset="<?php echo '/build/img/quienes_somos/2.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/quienes_somos/2.png'?>" type="image/png">
                    <img class="tarjeta__face" src="<?php echo '/build/img/quienes_somos/2.png'?>" alt="Imagen recurso">
                </picture>
                <div class="tarjeta__contenido">
                    <h3 class="tarjeta__texto">Fe Sobrenatural</h3>
                </div>
            </div>

            <div class="tarjeta__face tarjeta__back dashboard__tarjeta-bg">
                <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                <h3 class="tarjeta__nombre">Compromiso con la Verdad</h3>
                <p class="tarjeta__descripcion">Busca la autenticidad y la pureza de la enseñanza cristiana, promoviendo la verdadera doctrina.</p>
                <a class="table__carrito" href="/contacto">
                    <div class="dashboard__cursos--enlace">
                        <div class="admin__boton--contacto" href="/contacto">
                            <i class="fa-solid fa-address-book"></i>
                            Contactenos
                        </div>
                    </div>
                </a>   
            </div>
        </div>

        <div class="tarjeta">
            <div class="tarjeta__face tarjeta__front">
                <picture>
                    <source srcset="<?php echo '/build/img/quienes_somos/3.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/quienes_somos/3.png'?>" type="image/png">
                    <img class="tarjeta__face" src="<?php echo '/build/img/quienes_somos/3.png'?>" alt="Imagen recurso">
                </picture>
                <div class="tarjeta__contenido">
                    <h3 class="tarjeta__texto">Llamado a la Santidad</h3>
                </div>
            </div>

            <div class="tarjeta__face tarjeta__back dashboard__tarjeta-bg">
                <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                <h3 class="tarjeta__nombre">Camino a Perfección Cristiana.</h3>
                <p class="tarjeta__descripcion">Actúa como un baluarte que protege y guía a los fieles en su camino espiritual y social.</p>
                <a class="table__carrito" href="/contacto">
                    <div class="dashboard__cursos--enlace">
                        <div class="admin__boton--contacto" href="/contacto">
                            <i class="fa-solid fa-address-book"></i>
                            Contactenos
                        </div>
                    </div>
                </a>   
            </div>
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

</div>



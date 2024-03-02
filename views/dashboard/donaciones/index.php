<main class="dashboard__color">

    <?php


 include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__color">

       <div class="dashboard__nosotros">

            <div class="dashboard__3d dashboard__nosotros--cursos">
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

            <div style="display: flex; flex-direction:column; justify-content: center;" class="admin__formulario--contacto admin__formulario--contacto admin__scroll">

                <form class="formulario-admin"  method="POST">

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
            
       </div> 
        
    </div>

    
</main>
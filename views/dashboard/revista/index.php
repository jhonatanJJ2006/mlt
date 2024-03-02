<main class="dashboard__color">

    <?php


 include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__color">

        <?php if($revistas) { ?>

            <div class="admin__tipos--rol">

                <?php foreach($revistas as $revista) { ?>

                    <div class="tarjeta">
                        <div class="tarjeta__face tarjeta__front">
                            <picture>
                                <source srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.webp'?>" type="image/webp">
                                <source srcset="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" type="image/png">
                                <img class="tarjeta__face" src="<?php echo '/build/revistas/img/' . $revista->imagen . '.png'?>" alt="Imagen tipo">
                            </picture>
                            <div class="tarjeta__contenido">
                                <h3 class="tarjeta__nombre"><?php echo $revista->nombre ?></h3>
                            </div>
                        </div>
        
                        <div class="tarjeta__face tarjeta__back">
                            <div style="height: 100%;" class="tarjeta__contenido tarjeta__centrar table__carrito">
                                <a class="table__accion--seleccionar" href="/revista/doc?id=<?php echo $revista->id ?>">Acceder</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

        <?php } else { ?>

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

                <form class="formulario-admin" method="POST">

                    <?php include_once __DIR__ . '/../../templates/alertas.php' ?>

                    <fieldset class="formulario-admin__fieldset">
                        <legend class="formulario-admin__legend--contacto">Obtener Suscripcion</legend>
                        <div class="formulario-admin__campo">
                            <div class="formulario__monto">
                                <div class="formulario__monto--opcion"><p class="codepen-button"><span>$20</span></p></div>
                            </div>
                        </div>
                    </fieldset>

                    <br>
                    <br>

                    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $_ENV['CLIENT_SUSCRIPTION'] ?>&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                    <div id="paypal-button-container-P-5XX73998HV2447323MXQTF6Y"></div>

                    <div id="suscripcion"></div>

                    <script>
                        (function() {
                            const suscripcion = document.querySelector('#suscripcion');

                            if(suscripcion) {
                                
                                paypal.Buttons({
                                    style: {
                                        shape: 'rect',
                                        color: 'gold',
                                        layout: 'vertical',
                                        label: 'subscribe'
                                    },
                                    createSubscription: function(data, actions) {
                                        return actions.subscription.create({
                                            /* Creates the subscription */
                                            plan_id: 'P-82M57590MB5570726MXQAHSQ'
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        // Realiza una solicitud para activar la suscripción
                                        fetch('/revista/suscripcion', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                            },
                                            body: JSON.stringify({}),
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Muestra una alerta con el mensaje de éxito
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Subscription Successful',
                                                text: 'You have successfully subscribed to the plan. Your subscription ID is: ' + data.subscriptionID,
                                            });
                                            // Aquí puedes realizar cualquier otra acción que necesites después de activar la suscripción
                                        })
                                        .catch(error => {
                                            console.error('Error activating subscription:', error);
                                        });
                                    }
                                }).render('#paypal-button-container-P-5XX73998HV2447323MXQTF6Y'); // Renders the PayPal button      

                            }

                        })();

                    </script>

                </form>


                </div>
            
            </div> 

        <?php } ?>
        
    </div>

    
</main>
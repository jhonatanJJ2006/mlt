(function() {
    // Función para mostrar la alerta
    function showAlert(icon, title, message, callback = null) {
        Swal.fire({
            icon: icon,
            title: title,
            html: message,
        }).then(() => {
            if (callback) {
                callback();
            }
        });
    }

    // Función para validar el monto
    function validateAmount(amount) {
        return !amount.trim() || parseFloat(amount) < 20;
    }

    const monto = document.querySelector('#input-monto');
    const compra = document.querySelector('#compra');

    if (monto) {
        window.paypal.Buttons({
            style: {
                shape: "rect",
                layout: "vertical",
                color: "gold",
            },
            createOrder: function(data, actions) {
                if (validateAmount(monto.value)) {
                    showAlert('error', 'Error', 'La transaccion es un dato obligatorio y tiene que ser mayor a $20');
                    return false;
                }

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: monto.value
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    showAlert('success', 'Transaccion Completada', `Transaccion Completada por ${details.payer.name.given_name}`);
                    return fetch('/api/orders/' + data.orderID + '/capture', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    });
                });
            },
            onError: function(err) {
                console.error(err);
                showAlert('error', 'Error', 'Ha ocurrido un error al procesar su solicitud.');
            }
        }).render('#paypal-button-container');
    }

    if (compra) {
        window.paypal.Buttons({
            style: {
                shape: "rect",
                layout: "vertical",
                color: "gold",
            },
            createOrder: function(data, actions) {
                if (validateAmount(compra.value)) {
                    showAlert('error', 'Error', 'La transaccion es un dato obligatorio y tiene que ser mayor a $20');
                    return false;
                }

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: compra.value
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    showAlert('success', 'Transaccion Completada', `Transaccion Completada por ${details.payer.name.given_name}`, () => {
                        window.location.href = 'http://localhost:3000/cursos/learn';
                    });
                    return fetch('http://localhost:3000/api/paypal/update-compras', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            // Send any necessary data to your backend
                        })
                    });
                });
            },
            onError: function(err) {
                console.error(err);
                showAlert('error', 'Error', 'Ha ocurrido un error al procesar su solicitud.');
            }
        }).render('#new-paypal-button-container');
    }

})();

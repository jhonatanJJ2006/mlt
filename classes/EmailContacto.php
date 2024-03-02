<?php

namespace Classes;

use Exception;
use GuzzleHttp\Client;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Api\TransactionalEmailsApi;

class EmailContacto {

    public $email;
    public $nombre;
    public $mensaje;
    
    public function __construct($email, $nombre, $mensaje)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    public function enviar() {
        // Desactivar la verificación de SSL para cURL
        $configa = [
            'verify' => false
        ];

        $contenido = '<html>';
        $contenido .= "<p><strong>Mensaje enviado por: " . $this->nombre . "</strong> " . "- " . $this->email . "</p>";
        $contenido .= "<p><strong>Contenido del Mensaje: </strong>" . $this->mensaje . "</p>";
        $contenido .= '</html>';

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['CLIENT_PASS_EMAIL']);
        $apiInstance = new TransactionalEmailsApi(new Client($configa), $config);
        
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Mensaje Contacto Militia Michael',
            'sender' => ['name' => 'Militia Michael', 'email' => 'noreply@militiamichael.com'],
            'to' => [['name' => $this->nombre, 'email' => '2jhonatanjara2@gmail.com']],
            'htmlContent' => $contenido 
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception) {
            header('Location: /contacto');
        }
    }
}
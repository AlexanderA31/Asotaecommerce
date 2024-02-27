<?php
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$sid    = "ACe9ed0ae8ab647406fac5b502cc9b4cf7";
$token  = "433edcd045c5526b52f0087b453040d5";
$twilio = new Client($sid, $token);

// Array de números de teléfono a los que deseas enviar el mensaje
$phoneNumbers = [
    "+593963616505",  // Reemplaza con los números de teléfono reales
    "+593981319473",
    "+593981413451",
 
    // Agrega más números según sea necesario
];

$messageBody = "Ya esta esa huevada de tesis";

foreach ($phoneNumbers as $phoneNumber) {
    $message = $twilio->messages
        ->create("whatsapp:" . $phoneNumber, // to
            [
                "from" => "whatsapp:+14155238886",
                "body" => $messageBody
            ]
        );

    // Puedes imprimir el SID de cada mensaje si es necesario
    print("Mensaje SID para $phoneNumber: " . $message->sid . PHP_EOL);
}
?>

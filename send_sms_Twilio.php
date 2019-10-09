<?php

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

function send_sms($number, $body) {


// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC55e8dd9e8d529411fe8ba32ea8e7261c';
$token = 'c35d35d913a8afc6e6e65d8add3e28f1';
$client = new Client($sid, $token);

//my number
$twnumber = "+12015002471";

// Use the client to do fun stuff like send text messages!
$message = $client->messages->create(
    // the number you'd like to send the message to
    $number,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => $twnumber,
        // the body of the text message you'd like to send
        'body' => $body
    )
);


}


?>
<?php

namespace App\JWT;
use \Firebase\JWT\JWT;

class JWToken
{

    public $payload;

    public function __construct($payLoad)
    {
        $this->payload = $payLoad;




//        $decoded = JWT::decode($jwt, $publicKey, array('RS256'));

//
//        /*
//         NOTE: This will now be an object instead of an associative array. To get
//         an associative array, you will need to cast it as such:
//        */
//
//        $decoded_array = (array)$decoded;
//        echo "Decode:\n" . print_r($decoded_array, true) . "\n";


    }

    public function getToken() {

        $privateKey = file_get_contents('rsa/key');

        return JWT::encode($this->payload, $privateKey, 'RS256');

    }


}

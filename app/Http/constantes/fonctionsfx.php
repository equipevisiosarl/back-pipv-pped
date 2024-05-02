<?php

namespace App\Http\constantes;

function fxcrypt($string, $key){
    
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($string, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);

}

function fxdecrypt($string, $key) {
list($encryptedData, $iv) = explode('::', base64_decode($string), 2);
return openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
}
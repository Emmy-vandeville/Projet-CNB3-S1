<?php
function ssl_encode($data, $key) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-256-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext_raw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);

    return(base64_encode( $iv.$hmac.$ciphertext_raw ));
}

function ssl_decode($data, $key) {
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher="AES-256-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_data = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) return($original_data);
    else return false;
}

$key = 's5v8y/B?D(G+KbPeShVmYq3t6w9z$C&F)H@McQfTjWnZr4u7x!A%D*G-KaNdRgUk';

?>
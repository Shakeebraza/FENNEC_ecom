<?php

class Security {
    private $key;

    public function __construct($key) {
        $this->key = sodium_crypto_secretbox_keygen();
        sodium_memzero($key);
    }

    public function encrypt($data) {
   
        if (empty($data)) {
            return null;
        }


        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        

        $encrypted = sodium_crypto_secretbox($data, $nonce, $this->key);

    
        return base64_encode($nonce . $encrypted);
    }

    public function decrypt($data) {
       
        if (empty($data)) {
            return null; 
        }

        $data = base64_decode($data);
        $nonce = mb_substr($data, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit'); 
        $encryptedData = mb_substr($data, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit'); 

   
        return sodium_crypto_secretbox_open($encryptedData, $nonce, $this->key);
    }
}

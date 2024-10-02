<?php

class Security {
    private $cipher = "aes-256-cbc";
    private $key;
    private $iv;

    public function __construct($key) {
        $this->key = hash('sha256', $key, true); 
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)); 
    }

    public function encrypt($data) {
        $encrypted = openssl_encrypt($data, $this->cipher, $this->key, 0, $this->iv);

        return base64_encode($this->iv . $encrypted);
    }

    public function decrypt($data) {
        $data = base64_decode($data);
        // Extract the IV and the encrypted data
        $iv_length = openssl_cipher_iv_length($this->cipher);
        $iv = substr($data, 0, $iv_length);
        $encryptedData = substr($data, $iv_length);

        return openssl_decrypt($encryptedData, $this->cipher, $this->key, 0, $iv);
    }
}
?>

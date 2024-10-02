<?php

class Security {
    private $cipher = "aes-256-cbc"; // Encryption method
    private $key; // Encryption key
    private $iv; // Initialization vector

    public function __construct($key) {
        $this->key = hash('sha256', $key, true); // Generate a key from the provided key
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)); // Generate a random IV
    }

    // Function to encrypt data
    public function encrypt($data) {
        $encrypted = openssl_encrypt($data, $this->cipher, $this->key, 0, $this->iv);
        // Combine IV with encrypted data for later use in decryption
        return base64_encode($this->iv . $encrypted);
    }

    // Function to decrypt data
    public function decrypt($data) {
        // Decode the base64 encoded string
        $data = base64_decode($data);
        // Extract the IV and the encrypted data
        $iv_length = openssl_cipher_iv_length($this->cipher);
        $iv = substr($data, 0, $iv_length);
        $encryptedData = substr($data, $iv_length);

        return openssl_decrypt($encryptedData, $this->cipher, $this->key, 0, $iv);
    }
}
?>

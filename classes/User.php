<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database->getConnection();
    }

    // Example method to get user data
    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

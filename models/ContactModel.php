<?php

class ContactModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllMessage() {
        try {
            $stmt = $this->db->query("SELECT * FROM contacts ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e-> getMessage();
        }
    }

    public function getMessageId($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e-> getMessage();
        }
    }

    public function addMessage($name, $email, $phone, $message) {
        try {
            $stmt = $this->db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            return $e-> getMessage();
        }
    }

    public function updateMessage($id, $name, $email, $message) {
        try {
            $stmt = $this->db->prepare("UPDATE contacts SET name = :name, email = :email, message = :message WHERE id = :id");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e-> getMessage();
        }
    }

    public function deleteMessage($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e-> getMessage();
        }
    }
}

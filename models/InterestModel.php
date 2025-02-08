<?php 

class InterestModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllInterests() {
        try {
            $stmt = $this->db->query("SELECT * FROM interests");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getInterestsById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM interests WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addInterest($title, $descriotion) {
        try {
            $stmt = $this->db->prepare("INSERT INTO interests (title, descriotion) VALUES (:title, :descriotion)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':descriotion', $descriotion);
            return $stmt->execute(); // Returns true if successful
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateInterest($id, $title, $descriotion) {
        try {
            $stmt = $this->db->prepare("UPDATE interests SET title = :title, descriotion = :descriotion WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':descriotion', $descriotion);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteInterest($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM interests WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

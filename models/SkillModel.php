<?php 

class SkillModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllSkills() {
        try {
            $stmt = $this->db->query("SELECT * FROM skills");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSkillById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM skills WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addSkill($name, $proficiency) {
        try {
            $stmt = $this->db->prepare("INSERT INTO skills (name, proficiency) VALUES (:name, :proficiency)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':proficiency', $proficiency);
            return $stmt->execute(); // Returns true if successful
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateSkill($id, $name, $proficiency) {
        try {
            $stmt = $this->db->prepare("UPDATE skills SET name = :name, proficiency = :proficiency WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':proficiency', $proficiency);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteSkill($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM skills WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

<?php

class ExperienceModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllExperiences() {
        try {
            $stmt = $this->db->query("SELECT * FROM experiences");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getExperienceById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM experiences WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addExperience($position, $company, $start_date, $end_date, $description) {
        try {
            $stmt = $this->db->prepare("INSERT INTO experiences (position, company, start_date, end_date, description) VALUES (:position, :company, :start_date, :end_date, :description)");
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
            $stmt->bindParam(':description', $description);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateExperience($id, $position, $company, $start_date, $end_date, $description) {
        try {
            $stmt = $this->db->prepare("UPDATE experiences SET position = :position, company = :company, start_date = :start_date, end_date = :end_date, description = :description WHERE id = :id");
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteExperience($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM experiences WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

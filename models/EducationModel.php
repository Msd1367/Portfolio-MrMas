<?php

class EducationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllEducations() {
        try {
            $stmt = $this->db->query("SELECT * FROM educations");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getEducationById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM educations WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addEducation($degree, $grade, $institution, $graduation_year) {
        try {
            $stmt = $this->db->prepare("INSERT INTO educations (degree, grade, institution, graduation_year) VALUES (:degree, :grade, :institution, :graduation_year)");
            $stmt->bindParam(':degree', $degree);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':institution', $institution);
            $stmt->bindParam(':graduation_year', $graduation_year);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateEducation($id, $degree, $grade, $institution, $graduation_year) {
        try {
            $stmt = $this->db->prepare("UPDATE educations SET degree = :degree, grade = :grade, institution = :institution, graduation_year = :graduation_year WHERE id = :id");
            $stmt->bindParam(':degree', $degree);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':institution', $institution);
            $stmt->bindParam(':graduation_year', $graduation_year);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteEducation($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM educations WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

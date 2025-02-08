<?php

class ProjectModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllProjects() {
        try {
            $stmt = $this->db->query("SELECT * FROM projects");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProjectById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addProject($title, $description) {
        try {
            $stmt = $this->db->prepare("INSERT INTO projects (title, description) VALUES (:title, :description)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateProject($id, $title, $description) {
        try {
            $stmt = $this->db->prepare("UPDATE projects SET title = :title, description = :description WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteProject($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

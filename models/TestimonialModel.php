<?php

class TestimonialModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getAllTestimonials()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM testimonials ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getPaginatedTestimonials($limit, $offset) {
        $stmt = $this->db->prepare("SELECT * FROM testimonials LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTestimonialById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM testimonials WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addTestimonial($name, $message, $position, $company, $link, $rating)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO testimonials (name, message, position, company, link, rating) VALUES (:name, :message, :position, :company, :link, :rating)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':rating', $rating);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateTestimonial($id, $name, $message, $position, $company, $link, $rating)
    {
        try {
            $stmt = $this->db->prepare("UPDATE testimonials SET name = :name, message = :message, position = :position, company = :company, link = :link, rating = :rating WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteTestimonial($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM testimonials WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

<?php

class DonationModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getAllDonations()
    {
        $stmt = $this->db->query("SELECT * FROM donations ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDonation($amount, $donor_name, $message = null)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO donations (amount, donor_name, message) VALUES (:amount, :donor_name, :message)");
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':donor_name', $donor_name);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTotalDonations()
    {
        try {
            $stmt = $this->db->query("SELECT SUM(amount) as total FROM donations");
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

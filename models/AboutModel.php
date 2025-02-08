<?php
class AboutModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPortfolioInfo()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM portfolio_info");
             return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatePortfolioInfo($id, $name, $email, $phone, $address, $summary, $mission_statement, $vision, $linkedin, $github, $twitter, $facebook, $instagram, $discord, $youtube)
    {
        try {
            $stmt = $this->db->prepare("UPDATE portfolio_info 
                                        SET name = :name, 
                                        email = :email, 
                                        phone = :phone,
                                        address = :address,
                                        summary = :summary,
                                        mission_statement = :mission_statement,
                                        vision = :vision,
                                        linkedin = :linkedin,
                                        github = :github,
                                        twitter = :twitter,
                                        facebook = :facebook,
                                        instagram = :instagram,
                                        discord = :discord,
                                        youtube = :youtube
                                        WHERE id = :id");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
            $stmt->bindParam(':mission_statement', $mission_statement, PDO::PARAM_STR);
            $stmt->bindParam(':vision', $vision, PDO::PARAM_STR);
            $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
            $stmt->bindParam(':github', $github, PDO::PARAM_STR);
            $stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
            $stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
            $stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
            $stmt->bindParam(':discord', $discord, PDO::PARAM_STR);
            $stmt->bindParam(':youtube', $youtube, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}

<?php
require_once '../models/AboutModel.php';

class DonationController
{
    private $aboutModel;

    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
    }

    public function show()
    {

        $current_page = 'donation';
        $pageTitle = 'حمایت مالی';
        
        $about = $this->aboutModel->getPortfolioInfo();

        require_once '../views/donation.php';
    }
}

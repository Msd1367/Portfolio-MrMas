<?php
require_once '../models/AboutModel.php';

class SkillsController
{
    private $aboutModel;

    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
    }

    public function show()
    {
        $current_page = 'skills';
        $pageTitle = 'مهارت ها';
        
        $about = $this->aboutModel->getPortfolioInfo();

        require_once '../views/skills.php';
    }
}
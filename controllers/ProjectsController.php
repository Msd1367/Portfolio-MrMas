<?php
require_once '../models/AboutModel.php';

class ProjectsController
{

    private $aboutModel;

    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
    }

    public function show()
    {
        $current_page = 'projects';
        $pageTitle = 'پروژه ها';
        
        $about = $this->aboutModel->getPortfolioInfo();

        require_once '../views/projects.php';
    }
}

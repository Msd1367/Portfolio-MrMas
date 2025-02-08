<?php

require_once '../models/ProjectModel.php';
require_once '../models/SkillModel.php';
require_once '../models/TestimonialModel.php';
require_once '../models/AboutModel.php';
require_once 'ResumeController.php';



class HomeController {
    private $projectModel;
    private $skillModel;
    private $testimonialModel;
    private $aboutModel;
    private $resume;

    public function __construct($db) {
        $this->projectModel = new ProjectModel($db);
        $this->skillModel = new SkillModel($db);
        $this->testimonialModel = new TestimonialModel($db);
        $this->aboutModel = new AboutModel($db);
        $this->resume = new ResumeController($db);
    }

    public function show() {
        $current_page = 'home';
        $pageTitle = 'خانه';

        $projects = $this->projectModel->getAllProjects();
        $skills = $this->skillModel->getAllSkills();
        $testimonials = $this->testimonialModel->getAllTestimonials();
        $about = $this->aboutModel->getPortfolioInfo();

        $shortResume = $this->resume->getResumeData(4);

        require '../views/home.php';
    }
}

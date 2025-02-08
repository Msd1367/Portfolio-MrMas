<?php

require_once '../models/AboutModel.php';
require_once '../models/InterestModel.php';
require_once '../models/TestimonialModel.php';
require_once '../models/SkillModel.php';


class AboutController {

    private $aboutModel;
    private $interestModel;
    private $testimonialModel;
    private $skillModel;


    public function __construct($db) {
        $this->aboutModel = new AboutModel($db);
        $this->interestModel = new InterestModel($db);
        $this->testimonialModel = new TestimonialModel($db);
        $this->skillModel = new SkillModel($db);
    }

    
    public function show() {
        $current_page = 'about';
        $pageTitle = 'درباره من';

        $about = $this->aboutModel->getPortfolioInfo();
        $interests = $this->interestModel->getAllInterests();
        $testimonials = $this->testimonialModel->getAllTestimonials();
        $skills = $this->skillModel->getAllSkills();


        require_once '../views/about.php';

    }
}

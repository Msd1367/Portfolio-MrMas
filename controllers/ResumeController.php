<?php

require_once '../models/EducationModel.php';
require_once '../models/ProjectModel.php';
require_once '../models/ExperienceModel.php';
require_once '../models/SkillModel.php';
require_once '../models/AboutModel.php';


class ResumeController
{
    private $projectModel;
    private $skillModel;
    private $educationModel;
    private $experienceModel;
    private $aboutModel;

    public function __construct($db)
    {
        $this->projectModel = new ProjectModel($db);
        $this->skillModel = new SkillModel($db);
        $this->educationModel = new EducationModel($db);
        $this->experienceModel = new ExperienceModel($db);
        $this->aboutModel = new AboutModel($db);
    }

    public function show()
    {
        $current_page = 'resume';
        $pageTitle = 'رزمه';

        $about = $this->aboutModel->getPortfolioInfo();
        $resume = $this->makeFullResume();

        require_once '../views/resume.php';
    }

    public function getResumeData($limit = null)
    {
        $skills = $this->skillModel->getAllSkills();
        $projects = $this->projectModel->getAllProjects();
        $education = $this->educationModel->getAllEducations();
        $experience = $this->experienceModel->getAllExperiences();

        if ($limit) {
            $skills = array_slice($skills, 0, $limit);
            $projects = array_slice($projects, 0, 2);
            $education = array_slice($education, 0, 2);
            $experience = array_slice($experience, 0, 2);
        }

        return [
            'skills' => $skills,
            'projects' => $projects,
            'education' => $education,
            'experience' => $experience
        ];
    }

    public function makeshortResume()
    {
        return $this->getResumeData(3);
    }

    public function makeFullResume()
    {
        return $this->getResumeData();
    }

}

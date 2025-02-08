<?php
require_once '../models/AboutModel.php';
require_once '../models/ProjectModel.php';

class SingleProjectController
{
    private $aboutModel;
    private $projectModel;
    private $projectId;

    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
        $this->projectModel = new ProjectModel($db);
    }

    public function show()
    {
        // Get the project ID from the URL (via $_GET)
        if (isset($_GET['projectId']) && is_numeric($_GET['projectId'])) {
            $this->projectId = (int) $_GET['projectId'];
        } else {
            // Redirect to 404 page if projectId is missing or invalid
            error_log("Error: Invalid or missing project ID.");
            header("Location: /views/404.php");
            exit();
        }

        // Fetch project and about info
        $about = $this->aboutModel->getPortfolioInfo();
        $project = $this->projectModel->getProjectById($this->projectId);

        // Handle case where the project is not found
        if (!$project) {
            error_log("Error: Project with ID {$this->projectId} not found.");
            header("Location: /views/404.php");
            exit();
        }

        // Page-specific variables
        $current_page = 'single-project';
        $pageTitle = 'پروژه شماره ' . $this->projectId;

        // Include the view file
        require_once '../views/single-project.php';
    }
}

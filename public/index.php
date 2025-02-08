<?php
// Include the config file which contains the DB connection and other configurations
require_once '../config/config.php';

// Set the default timezone
date_default_timezone_set('Asia/Tehran');

// Check if $db is set correctly (this is now handled by config.php)
if (!isset($db)) {
    die("Database connection is not available.");
}

// Get the route and action from the URL or default values
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Define the routes and corresponding controller actions
$routes = [
    'home'     => ['controller' => 'HomeController', 'action' => 'show'],
    'about'    => ['controller' => 'AboutController', 'action' => 'show'],
    'contact'  => ['controller' => 'ContactController', 'action' => 'show'],
    'contact/submit' => ['controller' => 'ContactController', 'action' => 'submit'],
    'message' => ['controller' => 'MessageController', 'action' => 'show'],  // Add this line for message page
    'resume'   => ['controller' => 'ResumeController', 'action' => 'show'],    
    'testimonials'   => ['controller' => 'TestimonialsController', 'action' => 'show'],
    'testimonials/submit'   => ['controller' => 'TestimonialsController', 'action' => 'submit'],
    'single-project'   => ['controller' => 'SingleProjectController', 'action' => 'show']
    // 'blogs'     => ['controller' => 'BlogController', 'action' => 'show'],
    // 'donation' => ['controller' => 'DonationController', 'action' => 'show'],
];

// Check if a dynamic route (e.g., single-project/{id}) is requested
if (preg_match('/^single-project\/(\d+)$/', $route, $matches)) {
    // If it's a single project, extract the project ID
    $_GET['projectId'] = $matches[1];  // Pass the project ID to $_GET
    $route = 'single-project';  // Update the route to match the 'single-project' controller
}

// Default to 'error' route if the route is not defined
if (!array_key_exists($route, $routes)) {
    $controllerName = 'ErrorController';
    $action = 'notFound';
} else {
    $controllerName = $routes[$route]['controller'];
    $action = $routes[$route]['action'];
}

// Set the path for the controller file
$controllerFile = "../controllers/{$controllerName}.php";

// Check if the controller file exists
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Check if the controller class exists
    if (class_exists($controllerName)) {
        // Instantiate the controller and pass the $db connection to the constructor
        $controller = new $controllerName($db);

        // Check if the action method exists in the controller
        if (method_exists($controller, $action)) {
            // Call the action method
            $controller->$action();
        } else {
            // Log error if the method is not found in the controller
            error_log("Error: Method '$action' not found in controller '$controllerName'.");
            header("Location: /views/404.php");
            exit();
        }
    } else {
        // Log error if the controller class is not found
        error_log("Error: Controller class '$controllerName' not found.");
        header("Location: /views/404.php");
        exit();
    }
} else {
    // Log error if the controller file is not found
    error_log("Error: Controller file '$controllerFile' not found.");
    header("Location: /views/404.php");
    exit();
}

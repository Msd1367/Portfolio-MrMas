<?php
require_once '../vendor/autoload.php'; 

// Load environment variables from .env file if it exists
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}

// Database configuration using environment variables
$db_name = $_ENV['DB_NAME'] ?? 'portfolio_mrmas';
$db_host = $_ENV['DB_HOST'] ?? 'localhost';
$db_user = $_ENV['DB_USER'] ?? 'root';
$db_pass = $_ENV['DB_PASS'] ?? '';

// PDO Connection with error handling
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    error_log("Database connection error: " . $ex->getMessage()); // Log the error
    die("Database connection error. Please contact the administrator."); // User-friendly message
}
?>

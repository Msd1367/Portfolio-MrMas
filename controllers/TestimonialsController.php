<?php
require_once '../models/AboutModel.php';
require_once '../models/TestimonialModel.php';

class TestimonialsController
{
    private $aboutModel;
    private $testimonialModel;
    
    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
        $this->testimonialModel = new TestimonialModel($db);
    }

    public function show()
    {
        $current_page = 'testimonials';
        $pageTitle = ' منظران مشتریان و همکاران';
        
        $about = $this->aboutModel->getPortfolioInfo();
        $testimonials = $this->testimonialModel->getAllTestimonials();

        require_once '../views/testimonials.php';
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $position = htmlspecialchars($_POST['position']);
            $company = htmlspecialchars($_POST['company']);
            $message = htmlspecialchars($_POST['message']);
            $link = htmlspecialchars($_POST['link']);
            $rating = htmlspecialchars($_POST['rating']);
            $formLoadTime = $_POST['FLT'];

            $errors = [];

            // Check if the form was submitted too quickly (e.g., less than 5 seconds after load)
            if (time() - $formLoadTime < 5) {
                $errors[] = "لطفاً چند لحظه صبر کنید و دوباره تلاش کنید.";
            }

            // Validate inputs
            if (empty($name)) $errors[] = "نام الزامی است.";
            if (empty($position)) $errors[] = "سمت الزامی است.";
            if (empty($message)) $errors[] = "پیام الزامی است.";
            if (!empty($link)) $errors[] = "لینک ارتباطی الزامی است.";


            // Save to database if no errors
            if (empty($errors)) {
                $result = $this->testimonialModel->addTestimonial($name, $message, $position, $company, $link, $rating);

                if ($result) {
                    // Redirect to message page with success status
                    header("Location: ../message?message=" . urlencode("پیام شما با موفقیت ارسال شد."));
                    exit();
                } else {
                    // Redirect to message page with error status
                    header("Location:../message?message=" . urlencode("مشکلی پیش آمده است. لطفاً دوباره تلاش کنید."));
                    exit();
                }
            } else {
                // If there are validation errors, redirect to message page with error details
                $errorMessage = implode(', ', $errors);
                header("Location: ../message?message=" . urlencode($errorMessage));
                exit();
            }
        } else {
            // If the request is not POST, redirect to the contact page
            header("Location: /contact");
            exit();
        }
    }
}
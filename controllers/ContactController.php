<?php

require_once '../models/AboutModel.php';
require_once '../models/ContactModel.php';

class ContactController
{
    private $aboutModel;
    private $contactModel;


    public function __construct($db)
    {
        $this->aboutModel = new AboutModel($db);
        $this->contactModel = new ContactModel($db);
    }

    public function show()
    {
        $current_page = 'contact';
        $pageTitle = 'تماس با من';

        $about = $this->aboutModel->getPortfolioInfo();

        require_once '../views/contact.php';
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $message = htmlspecialchars($_POST['message']);
            $formLoadTime = $_POST['form_load_time'];

            $errors = [];

            // Check if the form was submitted too quickly (e.g., less than 5 seconds after load)
            if (time() - $formLoadTime < 5) {
                $errors[] = "لطفاً چند لحظه صبر کنید و دوباره تلاش کنید.";
            }

            // Validate inputs
            if (empty($name)) $errors[] = "نام الزامی است.";
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "ایمیل معتبر نیست.";
            if (empty($message)) $errors[] = "پیام الزامی است.";
            if (!empty($phone) && !preg_match("/^[0-9]{11}$/", $phone)) $errors[] = "شماره تماس باید 11 رقمی باشد.";


            // Save to database if no errors
            if (empty($errors)) {
                $result = $this->contactModel->addMessage($name, $email, $phone, $message);

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

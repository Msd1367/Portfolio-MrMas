<?php

class MessageController
{
    public function show()
    {

        $current_page = 'message';
        // Get the status and message from the query parameters
        $message = isset($_GET['message']) ? $_GET['message'] : '';

        require_once '../views/message.php';

    }
}

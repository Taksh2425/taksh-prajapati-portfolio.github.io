<?php

class EmailForm {
    public function sendEmail() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return 'Invalid request method.';
        }

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';

        // Validate form data
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            return 'Please fill in all required fields.';
        }

        // Construct email body
        $to = 'takshprajapati2425@gmail.com'; // Replace with your own email address
        $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

        // Additional headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            return 'Your message has been sent. Thank you!';
        } else {
            return 'Sorry, there was an error sending your message.';
        }
    }
}
?>

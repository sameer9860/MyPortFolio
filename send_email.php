<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if ($email) {
        // Set the recipient email address.
        $to = "samirkhatiwada68@gmail.com"; // Replace with your email address
        
        // Create the email subject and body.
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        
        // Additional headers
        $headers = "From: $email\r\nReply-To: $email\r\n";
        
        // Attempt to send the email.
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message!";
        } else {
            echo "Failed to send email.";
            error_log("Failed to send email to $to with subject $subject.");
        }
    } else {
        echo "Invalid email address.";
        error_log("Invalid email address: $email");
    }
} else {
    echo "Invalid request method.";
    error_log("Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
}
?>

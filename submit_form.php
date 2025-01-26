<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message'])); // Convert newlines to <br> for better formatting

    // Define the recipient and subject
    $to = "b.wilson32129@gmail.com";
    $subject = "Proxmox US Install";

    // Build the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email . "\r\n"; 
    $headers .= "Reply-To: " . $email . "\r\n";

    // Build the email body
    $body = "<html><body>";
    $body .= "<h2>Proxmox US Install Information</h2>";
    $body .= "<p><strong>Name:</strong> " . $name . "</p>";
    $body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $body .= "<p><strong>Message:</strong><br>" . $message . "</p>";
    $body .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your submission! We will get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>

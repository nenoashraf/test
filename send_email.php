<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    $video = $_FILES["video"];
    $videoName = $video["name"];
    $videoTmpName = $video["tmp_name"];

    // Set up the recipient email
    $to = "ahmedahmedrm322@gmail.com"; // Replace with the recipient's email address

    // Set up the email subject and message
    $subject = "New Form Submission";
    $emailMessage = "Phone: $tel\n";
    $emailMessage .= "Message: $message\n";

    // Set up the email headers
    $headers = "From: ahmedahmedrm322@gmail.com"; // Replace with your Gmail email address
    $headers .= "\r\nMIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Attach the video to the email
    $attachmentPath = $videoTmpName; // You might want to move the file to a secure location first
    $attachmentName = $videoName;

    // Send the email with the attachment
    if (mail($to, $subject, $emailMessage, $headers, "-f your_email@gmail.com", "-r your_email@gmail.com")) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>

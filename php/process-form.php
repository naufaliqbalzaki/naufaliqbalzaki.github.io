<?php
// Ambil data dari form
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

// Validasi data (opsional)
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'All fields are required.';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email address.';
    exit;
}

// Konfigurasi email
$to = "naufaliqbal305@gmail.com";
$email_subject = "New Contact Form Submission: $subject";
$email_body = "You have received a new message from your website contact form.\n\n".
              "Here are the details:\n".
              "Name: $name\n".
              "Email: $email\n".
              "Subject: $subject\n".
              "Message:\n$message";

$headers = "From: $email\n";
$headers .= "Reply-To: $email";

// Kirim email
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
} else {
    echo "Failed to send message.";
}
?>

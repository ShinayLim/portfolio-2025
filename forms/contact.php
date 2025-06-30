<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';        // SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shinaylim@gmail.com';    // Your Gmail email
    $mail->Password   = 'cqms xjwl knbv udfd';      // Gmail App Password (not your normal password!)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('shinaylim@gmail.com', 'Shinay'); // Your email to receive messages

    // Content
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "From: " . $_POST['name'] . "\n"
                   . "Email: " . $_POST['email'] . "\n\n"
                   . "Message:\n" . $_POST['message'];

    $mail->send();
    echo 'Your message has been sent. Thank you!';
} catch (Exception $e) {
    echo "Sorry, message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

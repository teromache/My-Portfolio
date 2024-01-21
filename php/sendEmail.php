<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sender_name = $_POST["sender_name"];
    $sender_email = $_POST["sender_email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'wanputera17@gmail.com';
        $mail->Password = 'whep kdjd ztrb guwq';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress('wanputera17@gmail.com', 'Wan Putera');

        //Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Sender Name: $sender_name\n"
            . "Sender Email: $sender_email\n\n"
            . $message;

        $mail->send();
        echo json_encode(array('status' => 'success'));
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => "Failed to send email. Error: {$mail->ErrorInfo}"));
    }
}
?>
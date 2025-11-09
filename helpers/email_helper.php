<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

function sendEmail($to, $subject, $body, $from = 'n3832133@gmail.com') {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'flightnest123@gmail.com'; // Your Gmail address
        $mail->Password = 'nktu ngas lmwk rlse'; // Your Gmail password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->Debugoutput = function($str, $level) {
            error_log("SMTP Debug: $str");
        };

        // Recipients
        $mail->setFrom($from, 'flightnest');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("PHPMailer failed: " . $mail->ErrorInfo);

        // Fallback to PHP mail function
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: FlightNest <flightnest123@gmail.com>' . "\r\n";

        if (mail($to, $subject, $body, $headers)) {
            error_log("Fallback mail() function succeeded for $to");
            return true;
        } else {
            error_log("Both PHPMailer and mail() failed for $to");
            return "Both email methods failed";
        }
    }
}
?>
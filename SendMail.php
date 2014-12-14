<?php

function send_mail($to, $subject, $body) {
    require "PHPMailer/class.phpmailer.php";
    $from = "k.tapakorn@gmail.com";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "email";
    $mail->Password = "password";
    $mail->SetFrom($from, "From PVault.com");
    $mail->AddReplyTo($from, "From PVault.com");
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    if (!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
}

?>
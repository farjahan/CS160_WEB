<?php
function send_mail ($to, $subject, $body)
{
    require "PHPMailer/class.phpmailer.php";
    $from = "k.tapakorn@gmail.com";
    $mail = new PHPMailer();
    $mail->isSMTP(TRUE);
    $mail->isHTML(TRUE);
    $mail->SMTPAuth = true;
    $mail->Host = "tls://smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = "";
    $mail->Password = "";
    $mail->setFrom($from, "From PVault.com");
    $mail->addReplyTo($from, "From PVault.com");
    $mail->Subject = $subject;
    $mail->msgHTML($body);
    $address = $to;
    $mail->addAddress($address, $to);
    $mail->Send();   
}
?>
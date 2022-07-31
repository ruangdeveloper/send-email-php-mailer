<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'isi host smtp kamu';
    $mail->SMTPAuth = true;
    $mail->Username = 'isi username smtp kamu';
    $mail->Password = 'isi password smtp kamu';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    // Atur pengirim email
    $mail->setFrom('from@example.com', 'Pengirim email keren');
    // Atur penerima email
    $mail->addAddress('to@example.com', 'Penerima email keren');
    // Atur reply to
    $mail->addReplyTo('from@example.com', 'Informasi');
    // Atur cc
    $mail->addCC('cc@example.com', 'CC Keren');
    // Atur bcc
    $mail->addBCC('bcc@example.com', 'BCC Keren');

    // Isi email
    $mail->isHTML();
    // Atur subjek
    $mail->Subject = 'Coba Mengirim Email';
    // Atur body
    $mail->Body = 'Halo ini adalah email yang dikirim dengan HTML dan <b>Huruf Tebal<b/>';
    // Atur versi text untuk email
    $mail->AltBody = 'Halo ini adalah email yang dikirim dengan plain text';

    // Kirim email kita
    $mail->send();
    echo 'Email sent...';
} catch (Exception $th) {
    echo "PHPMailer Error: {$mail->ErrorInfo}";
}

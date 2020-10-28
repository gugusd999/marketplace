<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions

function newmailer()
{
    return new PHPMailer(true);
}

    // $mail = newmailer();

    // //Server settings
    // // isikan false untuk mematikan debug dan isikan true untuk menghidupkan debug
    // $mail->SMTPDebug = false;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    // $mail->Username   = 'ggsd09031997@gmail.com';                     // SMTP username
    // $mail->Password   = 'loocsdik33';                               // SMTP password
    // $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    // $mail->Port       = 587;                                    // TCP port to connect to

    // //Recipients
    // $mail->setFrom('ggsd09031997@gmail.com', 'Gugus D');
    // $mail->addAddress('gugusdarmayanto@gmail.com', 'Gugus');     // Add a recipient
    // $mail->addAddress('gugusdarmayanto@gmail.com');               // Name is optional
    // $mail->addReplyTo('gugusdarmayanto@gmail.com', 'thanks');
    // $mail->addCC('gugusdarmayanto@gmail.com');
    // $mail->addBCC('gugusdarmayanto@gmail.com');

    // // Attachments
    // // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // // Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // if(!$mail->send()){
    //     echo 'Message has been sent';
    // }else{
    //     echo "send";
    // }
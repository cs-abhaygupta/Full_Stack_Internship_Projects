<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include "db.php";

function sendOTP($email){

    global $conn;

    $otp = rand(100000,999999);

    // Remove previous OTP for this email
    mysqli_query($conn,"DELETE FROM otp_verification WHERE email='$email'");

    // Save new OTP
    mysqli_query($conn,
        "INSERT INTO otp_verification(email,otp)
        VALUES('$email','$otp')"
    );

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'gupta.abhigg@gmail.com';

        
        $mail->Password = 'fblp cvki fejd lkyc';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;

        $mail->setFrom('gupta.abhigg@gmail.com','CourseHub');

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "CourseHub Email Verification OTP";

        $mail->Body = "
        <h2>Welcome to CourseHub</h2>

        <p>Your verification OTP is:</p>

        <h1>$otp</h1>

        <p>This OTP is valid for a few minutes.</p>
        ";
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->send();

        return true;

   }catch(Exception $e){

    die("<h3>Mailer Error:</h3><br>" . $mail->ErrorInfo);

}
}
?>
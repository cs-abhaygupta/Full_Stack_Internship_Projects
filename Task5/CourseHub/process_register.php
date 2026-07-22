<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password != $confirm_password) {
        die("Passwords do not match.");
    }

   
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (!$check) {
        die("SQL Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($check) > 0) {
        die("Email already exists.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   $sql = "INSERT INTO users
(name,email,phone,password,role,is_verified)
VALUES
('$name','$email','$phone','$hashedPassword','student',0)";

    if (mysqli_query($conn, $sql)) {

        require "send_otp.php";

        if (sendOTP($email)) {

            header("Location: verify_otp.php?email=" . urlencode($email));
            exit();

        } else {

            die("OTP could not be sent.");

        }

    } else {

        die("Insert Error: " . mysqli_error($conn));

    }

}
?>
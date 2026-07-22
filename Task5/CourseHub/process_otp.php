<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $otp   = trim($_POST["otp"]);


    $sql = "SELECT * FROM otp_verification
            WHERE email='$email'
            AND otp='$otp'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("SQL Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {

        // Verify user
        mysqli_query(
            $conn,
            "UPDATE users
             SET is_verified=1
             WHERE email='$email'"
        );

        
        mysqli_query(
            $conn,
            "DELETE FROM otp_verification
             WHERE email='$email'"
        );

        header("Location: login.php?verified=1");
        exit();

    } else {

        header("Location: verify_otp.php?email=" . urlencode($email) . "&error=1");
        exit();

    }

}
?>
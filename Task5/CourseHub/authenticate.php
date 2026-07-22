<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Check if email is verified
        if ($user["is_verified"] == 0) {

            header("Location: login.php?notverified=1");
            exit();

        }

        if (password_verify($password, $user["password"])) {

            $_SESSION["id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];

            
            if ($user["role"] == "admin") {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: student/dashboard.php");
            }

            exit();

        } else {

            header("Location: login.php?error=1");
            exit();

        }

    } else {

        header("Location: login.php?error=1");
        exit();

    }

}
?>
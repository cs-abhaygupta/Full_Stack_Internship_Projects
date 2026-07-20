<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];

    if ($password != $confirm_password) {
        die("Passwords do not match.");
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        die("Email already registered.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name,email,phone,password,role)
            VALUES('$name','$email','$phone','$hashed_password','$role')";

    if (mysqli_query($conn, $sql)) {

        header("Location: login.php?success=1");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
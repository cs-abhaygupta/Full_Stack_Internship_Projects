<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
   $plaintextPassword = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    
    if ($plaintextPassword != $confirmpassword) {
        die("Passwords do not match.");
    }

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if(mysqli_num_rows($result) > 0) {
        echo "Email already exists. Please use a different email.";
        exit();
    }

 $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name, email, phone, password)
            VALUES('$name', '$email', '$phone', '$password')";

    if (mysqli_query($conn, $sql)) {
       header("Location: login.php?success=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
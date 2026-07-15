<?php
include "db.php";

if (isset($_POST["email"])) {

    $email = $_POST["email"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "❌ Email already exists";
    } else {
        echo "✅ Email available";
    }
}
?>
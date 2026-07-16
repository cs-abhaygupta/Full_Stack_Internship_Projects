<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO users(name, email, phone)
            VALUES('$name', '$email', '$phone')";

    if (mysqli_query($conn, $sql)) {
       header("Location: dashboard.php?success=added");
       exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

}
?>
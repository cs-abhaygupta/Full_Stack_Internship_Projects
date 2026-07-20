<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "INSERT INTO members(name,email,phone,address)
            VALUES('$name','$email','$phone','$address')";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_members.php?success=added");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
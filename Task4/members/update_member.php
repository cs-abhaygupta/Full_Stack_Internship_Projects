<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int)$_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "UPDATE members
            SET
                name='$name',
                email='$email',
                phone='$phone',
                address='$address'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_members.php?success=updated");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
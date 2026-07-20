<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if (isset($_GET["id"])) {

    $id = (int)$_GET["id"];

    $sql = "DELETE FROM members WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_members.php?success=deleted");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
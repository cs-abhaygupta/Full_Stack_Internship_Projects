<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if (isset($_GET["id"])) {

    $id = (int) $_GET["id"];

    $sql = "DELETE FROM books WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_books.php?success=deleted");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
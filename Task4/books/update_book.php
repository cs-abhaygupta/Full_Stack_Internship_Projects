<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int)$_POST["id"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $quantity = (int)$_POST["quantity"];

    $sql = "UPDATE books
            SET title='$title',
                author='$author',
                category='$category',
                quantity='$quantity',
                available_quantity='$quantity'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_books.php?success=updated");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
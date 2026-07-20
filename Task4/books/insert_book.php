<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
    }
include "../db.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$title = $_POST["title"];
$author = $_POST["author"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];

$sql = "INSERT INTO books(title, author, category, quantity, available_quantity)
        VALUES('$title', '$author', '$category', '$quantity', '$quantity')";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_books.php?success=added");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
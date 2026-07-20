<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $member_id = (int)$_POST["member_id"];
    $book_id = (int)$_POST["book_id"];
    $issue_date = $_POST["issue_date"];
    $return_date = $_POST["return_date"];

    // Check available quantity
    $checkBook = mysqli_query($conn, "SELECT available_quantity FROM books WHERE id = $book_id");

    if (!$checkBook) {
        die("SQL Error: " . mysqli_error($conn));
    }

    $book = mysqli_fetch_assoc($checkBook);

    if ($book["available_quantity"] <= 0) {
        die("Book is not available.");
    }

    // Insert issue record
    $sql = "INSERT INTO issued_books
            (book_id, member_id, issue_date, return_date, status)
            VALUES
            ($book_id, $member_id, '$issue_date', '$return_date', 'Issued')";

    if (mysqli_query($conn, $sql)) {

        // Reduce available quantity
        mysqli_query(
            $conn,
            "UPDATE books
             SET available_quantity = available_quantity - 1
             WHERE id = $book_id"
        );

        header("Location: issued_books.php?success=issued");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}
?>
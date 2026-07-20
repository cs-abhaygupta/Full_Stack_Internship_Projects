<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$issue_id=(int)$_POST["issue_id"];
$book_id=(int)$_POST["book_id"];



mysqli_query($conn,"
UPDATE issued_books
SET status='Returned'
WHERE id=$issue_id
");


mysqli_query($conn,"
UPDATE books
SET available_quantity=available_quantity+1
WHERE id=$book_id
");

header("Location: issued_books.php?success=returned");
exit();

}
?>
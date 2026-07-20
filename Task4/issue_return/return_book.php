<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";
include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";

if(!isset($_GET["id"])){
    die("Invalid Request");
}

$id=(int)$_GET["id"];

$sql="SELECT
issued_books.*,
books.title,
members.name
FROM issued_books
JOIN books ON issued_books.book_id=books.id
JOIN members ON issued_books.member_id=members.id
WHERE issued_books.id=$id";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Record not found.");
}

$issue=mysqli_fetch_assoc($result);
?>

<div class="main-content">

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>
<i class="bi bi-journal-arrow-down"></i>
Return Book
</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>Member</th>
<td><?php echo $issue["name"]; ?></td>
</tr>

<tr>
<th>Book</th>
<td><?php echo $issue["title"]; ?></td>
</tr>

<tr>
<th>Issue Date</th>
<td><?php echo $issue["issue_date"]; ?></td>
</tr>

<tr>
<th>Return Date</th>
<td><?php echo $issue["return_date"]; ?></td>
</tr>

<tr>
<th>Status</th>
<td><?php echo $issue["status"]; ?></td>
</tr>

</table>

<?php if($issue["status"]=="Issued"){ ?>

<form action="process_return.php" method="POST">

<input type="hidden"
name="issue_id"
value="<?php echo $issue["id"]; ?>">

<input type="hidden"
name="book_id"
value="<?php echo $issue["book_id"]; ?>">

<button class="btn btn-success">

Confirm Return

</button>

<a href="issued_books.php"
class="btn btn-secondary">

Cancel

</a>

</form>

<?php } else { ?>

<div class="alert alert-success">

Book already returned.

</div>

<a href="issued_books.php"
class="btn btn-secondary">

Back

</a>

<?php } ?>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
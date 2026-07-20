<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";
include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";

$sql = "SELECT
            issued_books.*,
            books.title,
            members.name
        FROM issued_books
        JOIN books ON issued_books.book_id = books.id
        JOIN members ON issued_books.member_id = members.id
        ORDER BY issued_books.id DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-journal-check"></i> Issued Books</h2>

    <a href="issue_book.php" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Issue New Book
    </a>
</div>

<?php
if (isset($_GET["success"]) && $_GET["success"] == "issued") {
    echo '<div class="alert alert-success">
            Book Issued Successfully!
          </div>';
}

if (isset($_GET["success"]) && $_GET["success"] == "returned") {
    echo '<div class="alert alert-success">
            Book Returned Successfully!
          </div>';
}
?>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Book</th>
<th>Member</th>
<th>Issue Date</th>
<th>Return Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["title"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["issue_date"]; ?></td>
<td><?php echo $row["return_date"]; ?></td>
<td>
    <?php if($row["status"]=="Issued"){ ?>
        <span class="badge bg-primary">Issued</span>
    <?php } else { ?>
        <span class="badge bg-success">Returned</span>
    <?php } ?>
</td>

<td>

<?php if($row["status"]=="Issued"){ ?>

<a href="return_book.php?id=<?php echo $row["id"]; ?>"
class="btn btn-warning btn-sm">

Return

</a>

<?php } else { ?>

<button class="btn btn-success btn-sm" disabled>
Returned
</button>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

</div>
</div>

<?php include "../includes/footer.php"; ?>
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$id = (int)$_GET["id"];

$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die(mysqli_error($conn));
}

$book = mysqli_fetch_assoc($result);

if (!$book) {
    die("Book not found.");
}

include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";
?>

<div class="main-content">
    <div class="container-fluid">

        <h2 class="mb-4">Edit Book</h2>

        <form action="update_book.php" method="POST">

            <input type="hidden" name="id" value="<?= $book['id']; ?>">

            <div class="mb-3">
                <label>Book Title</label>
                <input type="text" class="form-control" name="title"
                    value="<?= htmlspecialchars($book['title']); ?>" required>
            </div>

            <div class="mb-3">
                <label>Author</label>
                <input type="text" class="form-control" name="author"
                    value="<?= htmlspecialchars($book['author']); ?>" required>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" class="form-control" name="category"
                    value="<?= htmlspecialchars($book['category']); ?>" required>
            </div>

            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" class="form-control" name="quantity"
                    value="<?= $book['quantity']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="view_books.php" class="btn btn-secondary">Cancel</a>

        </form>

    </div>
</div>

<?php include "../includes/footer.php"; ?>
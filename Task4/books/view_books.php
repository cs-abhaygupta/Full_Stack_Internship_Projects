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

if (isset($_GET["search"]) && $_GET["search"] != "") {

    $search = mysqli_real_escape_string($conn, $_GET["search"]);

    $sql = "SELECT * FROM books
            WHERE title LIKE '%$search%'
            OR author LIKE '%$search%'
            ORDER BY id DESC";

} else {

    $sql = "SELECT * FROM books
            ORDER BY id DESC";

}

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
<div class="search-box">
    <form method="GET">
        <div class="input-group">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search by Title or Author..."
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>

        </div>
    </form>
</div>
            <h2><i class="bi bi-book"></i> Books List</h2>

            <a href="add_book.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Add New Book
            </a>
        </div>

        <?php
        if (isset($_GET["success"]) && $_GET["success"] == "added") {
            echo '<div class="alert alert-success">Book Added Successfully!</div>';
        }
        ?>
        <?php
if (isset($_GET["success"]) && $_GET["success"] == "updated") {
    echo '<div class="alert alert-primary">
            Book Updated Successfully!
          </div>';
}
?>
<?php
if (isset($_GET["success"]) && $_GET["success"] == "deleted") {
    echo '<div class="alert alert-danger">
            Book Deleted Successfully!
          </div>';
}
?>

        <div class="card shadow">
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Available</th>
                            <th>Created At</th>
                            <th width="170">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["author"]; ?></td>
                            <td><?php echo $row["category"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["available_quantity"]; ?></td>
                            <td><?php echo $row["created_at"]; ?></td>

                            <td>
    <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
    Edit
</a>

                                <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this book?')">
                                    Delete
                                </a>
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
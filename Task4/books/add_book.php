<?php 
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}
include "../db.php";
include "../includes/header.php";
include "../includes/navbar.php";
?>
<?php include "../includes/sidebar.php";?>
<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-plus-circle"></i> Add New Book
            </h2>

            <a href="view_books.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow">

            <div class="card-body">

                <form action="insert_book.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Book Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter Book Title"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input
                            type="text"
                            name="author"
                            class="form-control"
                            placeholder="Enter Author Name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input
                            type="text"
                            name="category"
                            class="form-control"
                            placeholder="Enter Book Category"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            placeholder="Enter Quantity"
                            min="1"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save Book
                    </button>

                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>
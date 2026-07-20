<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

// Fetch available books
$books = mysqli_query($conn, "SELECT * FROM books WHERE available_quantity > 0");

// Fetch members
$members = mysqli_query($conn, "SELECT * FROM members ORDER BY name ASC");

include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-journal-arrow-up"></i>
                Issue Book
            </h2>

            <a href="issued_books.php" class="btn btn-secondary">
                <i class="bi bi-list"></i>
                View Issued Books
            </a>
        </div>

        <div class="card shadow">

            <div class="card-body">

                <form action="insert_issue.php" method="POST">

                    <!-- Member -->
                    <div class="mb-3">
                        <label class="form-label">Select Member</label>

                        <select name="member_id" class="form-select" required>

                            <option value="">-- Select Member --</option>

                            <?php while($member = mysqli_fetch_assoc($members)){ ?>

                                <option value="<?php echo $member['id']; ?>">
                                    <?php echo $member['name']; ?>
                                </option>

                            <?php } ?>

                        </select>
                    </div>

                    <!-- Book -->
                    <div class="mb-3">
                        <label class="form-label">Select Book</label>

                        <select name="book_id" class="form-select" required>

                            <option value="">-- Select Book --</option>

                            <?php while($book = mysqli_fetch_assoc($books)){ ?>

                                <option value="<?php echo $book['id']; ?>">

                                    <?php echo $book['title']; ?>
                                    (Available:
                                    <?php echo $book['available_quantity']; ?>)

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Issue Date -->
                    <div class="mb-3">

                        <label class="form-label">Issue Date</label>

                        <input
                            type="date"
                            name="issue_date"
                            class="form-control"
                            value="<?php echo date("Y-m-d"); ?>"
                            required>

                    </div>

                    <!-- Return Date -->
                    <div class="mb-4">

                        <label class="form-label">Return Date</label>

                        <input
                            type="date"
                            name="return_date"
                            class="form-control"
                            required>

                    </div>

                    <button type="submit" class="btn btn-success">

                        <i class="bi bi-check-circle"></i>
                        Issue Book

                    </button>

                    <a href="../dashboard.php" class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>
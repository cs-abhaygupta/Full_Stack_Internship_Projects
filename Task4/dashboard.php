<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include "includes/header.php";
include "includes/navbar.php";
include "includes/sidebar.php";

// Total Books
$books = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM books"));

// Total Members
$members = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM members"));

// Issued Books
$issued = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM issued_books WHERE status='Issued'"));

// Returned Books
$returned = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM issued_books WHERE status='Returned'"));
?>

<div class="main-content">

    <div class="container-fluid">

        <h2 class="mb-4">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </h2>

        <div class="row">

            <!-- Total Books -->
            <div class="col-md-3 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-book fs-1"></i>

                        <h5 class="mt-3">Total Books</h5>

                        <h2>
                            <?php echo $books["total"]; ?>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Members -->
            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill fs-1"></i>

                        <h5 class="mt-3">Members</h5>

                        <h2>
                            <?php echo $members["total"]; ?>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Issued -->
            <div class="col-md-3 mb-4">
                <div class="card bg-warning text-dark shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-arrow-up fs-1"></i>

                        <h5 class="mt-3">Issued Books</h5>

                        <h2>
                            <?php echo $issued["total"]; ?>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Returned -->
            <div class="col-md-3 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-check fs-1"></i>

                        <h5 class="mt-3">Returned Books</h5>

                        <h2>
                            <?php echo $returned["total"]; ?>
                        </h2>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>
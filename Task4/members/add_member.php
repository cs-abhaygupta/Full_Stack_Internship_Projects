<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-person-plus"></i> Add Member</h2>

            <a href="view_members.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow">

            <div class="card-body">

                <form action="insert_member.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Member Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter member name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            placeholder="Enter phone number"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Address</label>
                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            placeholder="Enter address"
                            required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save Member
                    </button>

                    <a href="view_members.php" class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>
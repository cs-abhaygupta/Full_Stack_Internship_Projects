<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$id = (int)$_GET["id"];

$sql = "SELECT * FROM members WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$member = mysqli_fetch_assoc($result);

if (!$member) {
    die("Member not found.");
}

include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";
?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-pencil-square"></i> Edit Member</h2>

            <a href="view_members.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow">

            <div class="card-body">

                <form action="update_member.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $member["id"]; ?>">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?php echo $member["name"]; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?php echo $member["email"]; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="<?php echo $member["phone"]; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            required><?php echo $member["address"]; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Member
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>
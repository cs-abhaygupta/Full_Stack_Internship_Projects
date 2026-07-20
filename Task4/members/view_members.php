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

    $sql = "SELECT * FROM members
            WHERE name LIKE '%$search%'
               OR email LIKE '%$search%'
               OR phone LIKE '%$search%'
            ORDER BY id DESC";

} else {

    $sql = "SELECT * FROM members
            ORDER BY id DESC";

}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}
?>

<div class="main-content">

    <div class="container-fluid">
        <div class="row mb-3">
    <div class="col-md-5">

        <form method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search by Name, Email or Phone..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>

            </div>

        </form>

    </div>
</div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-person-circle"></i> Member List</h2>

            <a href="add_member.php" class="btn btn-success">
                <i class="bi bi-person-add"></i> Add New Member
            </a>
        </div>

        <?php
        if (isset($_GET["success"]) && $_GET["success"] == "added") {
            echo '<div class="alert alert-success">Member Added Successfully!</div>';
        }
        ?>
        <?php
if (isset($_GET["success"]) && $_GET["success"] == "updated") {
    echo '<div class="alert alert-primary">
            Member Updated Successfully!
          </div>';
}
?>
<?php
if (isset($_GET["success"]) && $_GET["success"] == "deleted") {
    echo '<div class="alert alert-danger">
            Member Deleted Successfully!
          </div>';
}
?>

        <div class="card shadow">
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th width="170">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row["created_at"]; ?></td>

                            <td>
    <a href="edit_member.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
    Edit
</a>

                                <a href="delete_member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this member?')">
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
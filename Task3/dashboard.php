<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$limit = 5;

$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

if ($page < 1) {
    $page = 1;
}

$start = ($page - 1) * $limit;

$search = "";
$countQuery = "SELECT COUNT(*) AS total FROM users";
$countResult = mysqli_query($conn, $countQuery);

if (!$countResult) {
    die("SQL Error: " . mysqli_error($conn));
}

$totalUsers = mysqli_fetch_assoc($countResult);

$totalPages = ceil($totalUsers["total"] / $limit);
if (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
}

if (!empty($search)) {

    $countQuery = "SELECT COUNT(*) AS total
                   FROM users
                   WHERE name LIKE '%$search%'
                   OR email LIKE '%$search%'";

    $countResult = mysqli_query($conn, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);

    $totalPages = ceil($countRow["total"] / $limit);
    

    $sql = "SELECT * FROM users
            WHERE name LIKE '%$search%'
            OR email LIKE '%$search%'
            LIMIT $start, $limit";

} else {

    $countQuery = "SELECT COUNT(*) AS total FROM users";

    $countResult = mysqli_query($conn, $countQuery);

    $countRow = mysqli_fetch_assoc($countResult);

    $totalPages = ceil($countRow["total"] / $limit);

    $sql = "SELECT * FROM users
            LIMIT $start, $limit";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg rounded-4 border-0 mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="text-success">
                        Welcome, <?php echo $_SESSION["name"]; ?> 👋
                    </h2>

                    <p class="mb-0">
                        <strong>Email:</strong>
                        <?php echo $_SESSION["email"]; ?>
                    </p>
                </div>

                <div>
                    <a href="add_user.php" class="btn btn-success me-2">
                        Add New User
                    </a>

                    <a href="logout.php" class="btn btn-danger">
                        Logout
                    </a>
                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-4">

                    <div class="card bg-primary text-white shadow border-0">

                        <div class="card-body text-center">

                            <h5>Total Users</h5>

                            <h2><?php echo $totalUsers["total"]; ?></h2>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php

    if (isset($_GET["success"])) {

        if ($_GET["success"] == "added") {
            echo '<div class="alert alert-success">✅ User Added Successfully!</div>';
        }

        elseif ($_GET["success"] == "updated") {
            echo '<div class="alert alert-warning">✏️ User Updated Successfully!</div>';
        }

        elseif ($_GET["success"] == "deleted") {
            echo '<div class="alert alert-danger">🗑️ User Deleted Successfully!</div>';
        }

    }

    ?>

    <form method="GET" class="row mb-4">

    <div class="col-md-10">

        <input
            type="text"
            class="form-control"
            name="search"
            placeholder="Search by Name or Email"
            value="<?php echo htmlspecialchars($search); ?>">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">
            Search
        </button>

    </div>

</form>
    <div class="card shadow border-0">

        <div class="card-body">

            <h3 class="text-center mb-4">
                All Registered Users
            </h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $serial = $start + 1;

                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";

                        echo "<td>" . $serial++ . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";

                        echo "<td>

                        <a href='edit_user.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm me-2'>
                        Edit
                        </a>

                        <a href='delete_user.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'
                        onclick='return confirm(\"Are you sure you want to delete this user?\")'>
                        Delete
                        </a>

                        </td>";

                        echo "</tr>";

                    }
                        
                    ?>

                    </tbody>

                </table>
               <nav class="mt-4">

<ul class="pagination justify-content-center">

<?php

if ($page > 1) {

?>

<li class="page-item">

<a class="page-link"
href="?page=<?php echo $page-1; ?>&search=<?php echo urlencode($search); ?>">

Previous

</a>

</li>

<?php

}

?>

<?php

for($i=1;$i<=$totalPages;$i++){

?>

<li class="page-item <?php echo ($page==$i)?'active':''; ?>">

<a class="page-link"
href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">

<?php echo $i; ?>

</a>

</li>

<?php

}

?>

<?php

if($page<$totalPages){

?>

<li class="page-item">

<a class="page-link"
href="?page=<?php echo $page+1; ?>&search=<?php echo urlencode($search); ?>">

Next

</a>

</li>

<?php

}

?>

</ul>

</nav>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
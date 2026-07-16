<?php
include "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center mb-4">Edit User</h2>

<form action="update_user.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name"
        value="<?php echo $row["name"]; ?>"
        class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email"
        value="<?php echo $row["email"]; ?>"
        class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone"
        value="<?php echo $row["phone"]; ?>"
        class="form-control" required>
    </div>

    <button class="btn btn-primary">
        Update User
    </button>

    <a href="dashboard.php" class="btn btn-secondary">
        Back
    </a>

</form>

</div>

</div>

</body>
</html>
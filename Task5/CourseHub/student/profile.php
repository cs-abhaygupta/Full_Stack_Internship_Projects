<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["role"] != "student") {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$id = $_SESSION["id"];

$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>My Profile | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold" href="dashboard.php">
🎓 CourseHub
</a>

<div>

<span class="text-white me-3">

Welcome,

<strong><?php echo htmlspecialchars($_SESSION["name"]); ?></strong>

</span>

<a href="dashboard.php" class="btn btn-warning btn-sm me-2">
Dashboard
</a>

<a href="../logout.php" class="btn btn-danger btn-sm">
Logout
</a>

</div>

</div>

</nav>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h3 class="mb-0">
👤 My Profile
</h3>

</div>

<div class="card-body">

<table class="table table-striped table-hover">

<tr>
<th width="30%">Full Name</th>
<td><?php echo htmlspecialchars($user["name"]); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($user["email"]); ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo htmlspecialchars($user["phone"]); ?></td>
</tr>

<tr>
<th>Role</th>
<td><?php echo ucfirst($user["role"]); ?></td>
</tr>

<tr>
<th>Email Status</th>
<td>
<?php
if($user["is_verified"]){
    echo '<span class="badge bg-success">Verified</span>';
}else{
    echo '<span class="badge bg-danger">Not Verified</span>';
}
?>
</td>
</tr>

<tr>
<th>Member Since</th>
<td><?php echo date("d M Y", strtotime($user["created_at"])); ?></td>
</tr>

</table>

<div class="text-center mt-4">

<a href="dashboard.php" class="btn btn-primary">
⬅ Back to Dashboard
</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
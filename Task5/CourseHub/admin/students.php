<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["role"] != "admin") {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$sql = "SELECT id,name,email,phone,created_at
        FROM users
        WHERE role='student'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Students | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold">

🎓 CourseHub Admin

</a>

<div>

<span class="text-white me-3">

Welcome,

<strong><?php echo $_SESSION["name"]; ?></strong>

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

<h2 class="mb-4">

Registered Students

</h2>

<div class="card shadow">

<div class="card-body">

<table class="table table-striped table-hover align-middle">

<thead class="table-primary">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Registered On</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td><?php echo htmlspecialchars($row["name"]); ?></td>

<td><?php echo htmlspecialchars($row["email"]); ?></td>

<td><?php echo htmlspecialchars($row["phone"]); ?></td>

<td><?php echo date("d M Y",strtotime($row["created_at"])); ?></td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" class="text-center">

No Students Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>
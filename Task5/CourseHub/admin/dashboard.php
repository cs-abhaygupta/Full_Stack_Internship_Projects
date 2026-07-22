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

$studentQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='student'");
$students = mysqli_fetch_assoc($studentQuery);

$courseQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses");
$courses = mysqli_fetch_assoc($courseQuery);

$enrollQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM enrollments");
$enrollments = mysqli_fetch_assoc($enrollQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Dashboard | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary shadow">

<div class="container">

<span class="navbar-brand fw-bold">

🎓 CourseHub Admin

</span>

<div>

<span class="text-white me-3">

Welcome,

<strong><?php echo $_SESSION["name"]; ?></strong>

</span>

<a href="../logout.php" class="btn btn-danger btn-sm">

Logout

</a>

</div>

</div>

</nav>

<div class="container py-5">

<h2 class="mb-4">

Admin Dashboard

</h2>

<div class="row mb-5">

<div class="col-md-4 mb-3">

<a href="students.php" class="text-decoration-none">

<div class="card shadow border-0 h-100">

<div class="card-body text-center">

<h1>👨‍🎓</h1>

<h4>Students</h4>

<p class="text-muted">

View Registered Students

</p>

</div>

</div>

</a>

</div>

<div class="col-md-4 mb-3">

<a href="courses.php" class="text-decoration-none">

<div class="card shadow border-0 h-100">

<div class="card-body text-center">

<h1>📚</h1>

<h4>Courses</h4>

<p class="text-muted">

Manage Courses

</p>

</div>

</div>

</a>

</div>

<div class="col-md-4 mb-3">

<a href="enrollments.php" class="text-decoration-none">

<div class="card shadow border-0 h-100">

<div class="card-body text-center">

<h1>📝</h1>

<h4>Enrollments</h4>

<p class="text-muted">

View Student Enrollments

</p>

</div>

</div>

</a>

</div>

</div>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card bg-primary text-white shadow">

<div class="card-body text-center">

<h5>Total Students</h5>

<h1>

<?php echo $students["total"]; ?>

</h1>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card bg-success text-white shadow">

<div class="card-body text-center">

<h5>Total Courses</h5>

<h1>

<?php echo $courses["total"]; ?>

</h1>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card bg-warning text-dark shadow">

<div class="card-body text-center">

<h5>Total Enrollments</h5>

<h1>

<?php echo $enrollments["total"]; ?>

</h1>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
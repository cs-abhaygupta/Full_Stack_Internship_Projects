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

$sql = "SELECT
            courses.*,
            categories.category_name
        FROM courses
        LEFT JOIN categories
        ON courses.category_id = categories.id
        ORDER BY courses.id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Dashboard | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold">

🎓 CourseHub

</a>

<div>

<span class="text-white me-3">

Welcome,

<strong><?php echo $_SESSION["name"]; ?></strong>

</span>
<a href="profile.php" class="btn btn-info btn-sm me-2">
Profile
</a>

<a href="my_courses.php" class="btn btn-warning btn-sm me-2">
My Courses
</a>

<a href="../logout.php" class="btn btn-danger btn-sm">
Logout
</a>

</div>

</div>

</nav>

<div class="container py-5">

<h2 class="mb-4">

Available Courses

</h2>

<div class="row">

<?php

if(mysqli_num_rows($result)>0){

while($course=mysqli_fetch_assoc($result)){

$image="../assets/images/".$course["thumbnail"];

if(empty($course["thumbnail"]) || !file_exists("../assets/images/".$course["thumbnail"])){

$image="../assets/images/default-course.avif";

}

?>

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="<?php echo $image; ?>"

class="card-img-top"

style="height:220px;object-fit:cover;">

<div class="card-body">

<h5 class="fw-bold">

<?php echo $course["title"]; ?>

</h5>

<span class="badge bg-primary mb-2">

<?php echo $course["category_name"]; ?>

</span>

<p>

<?php echo $course["description"]; ?>

</p>

<h4 class="text-success fw-bold">
₹ <?php echo number_format($course["price"],2); ?>
</h4>

<a href="enroll.php?id=<?php echo $course["id"]; ?>"

class="btn btn-primary w-100">

Enroll Now

</a>

</div>

</div>

</div>

<?php

}

}else{

?>

<div class="alert alert-info">

No Courses Available.

</div>

<?php

}

?>

</div>

</div>

</body>

</html>
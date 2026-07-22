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

$student_id = $_SESSION["id"];

$sql = "SELECT
            courses.id,
            courses.title,
            courses.description,
            courses.price,
            courses.thumbnail,
            categories.category_name,
            enrollments.enrolled_at
        FROM enrollments
        INNER JOIN courses
            ON enrollments.course_id = courses.id
        INNER JOIN categories
            ON courses.category_id = categories.id
        WHERE enrollments.student_id='$student_id'
        ORDER BY enrollments.enrolled_at DESC";

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

<title>My Courses | CourseHub</title>

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
My Enrolled Courses
</h2>

<div class="row">

<?php

if(mysqli_num_rows($result) > 0){

while($course = mysqli_fetch_assoc($result)){

$image = "../assets/images/" . $course["thumbnail"];

if(!file_exists("../assets/images/" . $course["thumbnail"])){
    $image = "../assets/images/default-course.avif";
}

?>

<div class="col-md-4 mb-4">

<div class="card shadow h-100">
<p><strong><?php echo $course["thumbnail"]; ?></strong></p>

<img src="<?php echo $image . '?v=' . time(); ?>"
class="card-img-top"
style="height:220px;object-fit:cover;">

<div class="card-body">

<h5 class="card-title">
<?php echo htmlspecialchars($course["title"]); ?>
</h5>

<p>
<strong>Category:</strong>
<?php echo htmlspecialchars($course["category_name"]); ?>
</p>

<p>
<?php echo htmlspecialchars($course["description"]); ?>
</p>

<h5 class="text-success">
₹ <?php echo $course["price"]; ?>
</h5>

<p class="text-muted">
Enrolled On:
<?php echo date("d M Y", strtotime($course["enrolled_at"])); ?>
</p>

</div>

</div>

</div>

<?php

}

}else{

?>

<div class="col-12">

<div class="alert alert-info">

You haven't enrolled in any courses yet.

</div>

</div>

<?php

}

?>

</div>

</div>

</body>

</html>
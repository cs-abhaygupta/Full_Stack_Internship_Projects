<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>CourseHub | Learn Without Limits</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

<div class="container">

<a class="navbar-brand fw-bold text-primary" href="#">
🎓 CourseHub
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Courses</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>

<li class="nav-item">
<a class="btn btn-primary ms-3" href="login.php">
Login
</a>
</li>

</ul>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1>Learn New Skills Online</h1>

<p>
Discover high-quality courses and enhance your career with expert instructors.
</p>

<a href="#" class="btn btn-light btn-lg mt-3">
Explore Courses
</a>

</div>

<div class="col-lg-6 text-center">

<img src="assets/images/hero.png" class="img-fluid" style="max-height:450px;">

</div>

</div>

</div>

</section>

<section class="py-5">

<div class="container">

<h2 class="text-center section-title">
Featured Courses
</h2>

<div class="row">

<?php
for($i=1;$i<=3;$i++){
?>

<div class="col-md-4">

<div class="card course-card shadow">

<img src="https://picsum.photos/400/250?random=<?php echo $i; ?>" class="card-img-top">

<div class="card-body">

<h5>Web Development</h5>

<p>
Master HTML, CSS, JavaScript and PHP from scratch.
</p>

<a href="#" class="btn btn-primary">
View Course
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</section>

<section class="bg-white py-5">

<div class="container">

<h2 class="text-center section-title">
Why Choose CourseHub?
</h2>

<div class="row text-center">

<div class="col-md-4">

<h4>📚 Expert Courses</h4>

<p>Learn from industry professionals.</p>

</div>

<div class="col-md-4">

<h4>🎓 Certification</h4>

<p>Receive completion certificates.</p>

</div>

<div class="col-md-4">

<h4>💼 Career Growth</h4>

<p>Improve your skills and opportunities.</p>

</div>

</div>

</div>

</section>

<footer class="text-center">

© <?php echo date("Y"); ?> CourseHub | Developed by Abhay Gupta

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
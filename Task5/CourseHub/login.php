<?php
if(isset($_SESSION["id"])){

    if($_SESSION["role"]=="admin"){
        header("Location: admin/dashboard.php");
    }else{
        header("Location: student/dashboard.php");
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-body p-4">

<h2 class="text-center text-primary mb-4">
Login
</h2>
<?php

if(isset($_GET["verified"])){
    echo '<div class="alert alert-success">
            Email verified successfully. Please login.
          </div>';
}

if(isset($_GET["notverified"])){
    echo '<div class="alert alert-warning">
            Please verify your email before logging in.
          </div>';
}

if(isset($_GET["error"])){
    echo '<div class="alert alert-danger">
            Invalid Email or Password.
          </div>';
}

?>

<form action="authenticate.php" method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-primary">

Login

</button>

</div>

</form>

<hr>

<p class="text-center">

Don't have an account?

<a href="register.php">
Register
</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
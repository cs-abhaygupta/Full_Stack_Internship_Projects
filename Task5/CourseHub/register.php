<?php

if(isset($_GET["error"])){

    if($_GET["error"]=="empty"){
        echo '<div class="alert alert-danger text-center">
                Please fill all fields.
              </div>';
    }

    elseif($_GET["error"]=="password"){
        echo '<div class="alert alert-danger text-center">
                Passwords do not match.
              </div>';
    }

    elseif($_GET["error"]=="email"){
        echo '<div class="alert alert-danger text-center">
                Email is already registered.
              </div>';
    }

}

if(isset($_GET["verified"])){

    echo '<div class="alert alert-success text-center">
            Registration completed successfully.
            Please login.
          </div>';

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-6 col-lg-5">

<div class="card register-card shadow-lg">

<div class="card-body p-5">

<h2 class="text-center text-primary mb-4">

🎓 CourseHub Registration

</h2>

<form action="process_register.php" method="POST">

<div class="mb-3">

<label class="form-label">Full Name</label>

<input
type="text"
name="name"
class="form-control"
placeholder="Enter your full name"
required>

</div>

<div class="mb-3">

<label class="form-label">Email Address</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<div class="mb-3">

<label class="form-label">Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
placeholder="Enter your phone number"
maxlength="10"
pattern="[0-9]{10}"
required>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter password"
required>

</div>

<div class="mb-4">

<label class="form-label">Confirm Password</label>

<input
type="password"
name="confirm_password"
class="form-control"
placeholder="Confirm password"
required>

</div>

<div class="d-grid">

<button type="submit" class="btn btn-primary btn-lg">

Register

</button>

</div>

</form>

<hr>

<p class="text-center mb-0">

Already have an account?

<a href="login.php" class="fw-bold text-decoration-none">

Login Here

</a>

</p>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
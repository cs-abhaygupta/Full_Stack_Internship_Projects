<?php
$email = $_GET["email"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Verify OTP | CourseHub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-body p-4">

<h3 class="text-center text-primary mb-4">
Email Verification
</h3>

<p class="text-center">
Enter the OTP sent to
<br>
<strong><?php echo htmlspecialchars($email); ?></strong>
</p>
<?php

if(isset($_GET["error"])){

    echo '<div class="alert alert-danger">
            Invalid OTP. Please try again.
          </div>';

}

?>
<form action="process_otp.php" method="POST">

<input type="hidden"
name="email"
value="<?php echo htmlspecialchars($email); ?>">

<div class="mb-3">

<label>OTP</label>

<input
type="text"
name="otp"
maxlength="6"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-primary">

Verify OTP

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
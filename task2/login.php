<!DOCTYPE html> 
<html lang="en"> 
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LogIn Page | Abhay Gupta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head> 
<body>
    <div class = "container">
        <div class="row justify-content-center align-items-center vh-100"> 
            <div class="col-md-5">
                <div class ="card shadow-lg p-4 rounded-4">
                    
                        <h3 class="card-title text-center mt-3">
                            <i class="bi bi-box-arrow-in-right"></i> Login</h3>
                            <?php
if (isset($_GET["success"])) {
    echo '<div class="alert alert-success text-center">
            Registration Successful! Please login.
          </div>';
}

if (isset($_GET["error"])) {
    echo '<div class="alert alert-danger text-center">
            Invalid Email or Password!
          </div>';
}
?>
                            
                    <form class="mt-4" action="authenticate.php" method="POST">
<div class="input-group mb-3">
    <span class="input-group-text">
    <i class="bi bi-envelope-fill mt-2"></i></span>
    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
</div>
<div class="input-group mb-3">
 <span class="input-group-text">
    <i class="bi bi-lock-fill"></i>
</span>
<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
    <span class="input-group-text" id="togglePassword"><i class="bi bi-eye-fill" id="eyeIcon"></i></span>
</div>
<div class ="justify-content-between d-flex form-check mb-3">
    <input type="checkbox" class="form-check-input" id="rememberMe">
    <label class="form-check-label" for="rememberMe">Remember Me</label>
   <a href="forgot_password.html">Forgot Password?</a>
</div>
<button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

     <p class="text-center mt-3">Don't have an account? <a href="register.html">Register</a></p>

                </div>
            </div>
        </div>
    </div>
    


  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
            integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
            crossorigin="anonymous"></script>

  <script src="script.js"></script>
   
</body>
</html>
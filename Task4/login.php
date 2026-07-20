<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Library Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow-lg p-4 rounded-4">

                <h3 class="text-center mb-4">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </h3>

                <?php
                if (isset($_GET["success"])) {
                    echo '
                    <div class="alert alert-success text-center">
                        Registration Successful! Please Login.
                    </div>';
                }

                if (isset($_GET["error"])) {
                    echo '
                    <div class="alert alert-danger text-center">
                        Invalid Email or Password!
                    </div>';
                }
                ?>

                <form action="authenticate.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Email</label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter Email"
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Enter Password"
                                required>

                            <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                                <i class="bi bi-eye-fill" id="eyeIcon"></i>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="remember">

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <a href="#">Forgot Password?</a>

                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </button>

                </form>

                <p class="text-center mt-3 mb-0">
                    Don't have an account?
                    <a href="register.php">Register</a>
                </p>

            </div>

        </div>

    </div>

</div>

<script>
const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", function () {

    if (password.type === "password") {
        password.type = "text";
        eyeIcon.classList.remove("bi-eye-fill");
        eyeIcon.classList.add("bi-eye-slash-fill");
    } else {
        password.type = "password";
        eyeIcon.classList.remove("bi-eye-slash-fill");
        eyeIcon.classList.add("bi-eye-fill");
    }

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

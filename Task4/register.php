<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Library Management</title>

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

        <div class="col-md-6">

            <div class="card shadow-lg p-4 rounded-4">

                <h3 class="text-center mb-4">
                    <i class="bi bi-person-plus-fill"></i>
                    Register
                </h3>

                <form action="register_process.php" method="POST">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password"
                               name="confirm_password"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-4">
                        <label>Role</label>

                        <select name="role" class="form-select">

                            <option value="admin">Admin</option>

                            <option value="member">Member</option>

                        </select>
                    </div>

                    <button class="btn btn-success w-100">
                        <i class="bi bi-person-check-fill"></i>
                        Register
                    </button>

                </form>

                <p class="text-center mt-3">
                    Already have an account?
                    <a href="login.php">Login</a>
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">

        <h2 class="text-success">
            Welcome, <?php echo $_SESSION["name"]; ?> 👋
        </h2>

        <hr>

        <p><strong>Email:</strong> <?php echo $_SESSION["email"]; ?></p>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>

    </div>
</div>

</body>
</html>
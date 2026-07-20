<nav class="navbar navbar-dark bg-primary shadow">
    <div class="container-fluid">

        <span class="navbar-brand fw-bold">
            📚 Library Management System
        </span>

        <div class="text-white">

            Welcome,
            <strong><?php echo $_SESSION["name"]; ?></strong>

            <a href="logout.php" class="btn btn-light btn-sm ms-3">
                Logout
            </a>

        </div>

    </div>
</nav>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class = "container mt-5">
<div class="card p-4 shadow">
    <h2 class="text-center mb-4">ADD USER</h2>
    <form action= "insert_user.php" method="POST">
<div class = "mb-3">
    <lable>Name<lable>
    <input type="text" name="name" id ="name" class="form-control" required>
</div>
<div class = "mb-3">
    <lable>Email<lable>
    <input type="email" name="email" id ="email" class="form-control" required>
</div>
<div class = "mb-3">
    <lable>Phone<lable>
    <input type="text" name="phone" id ="phone" class="form-control" required>
</div>
<button class="btn btn-primary"> Save user</button>
<a href="dashboard.php " class="btn btn-secondary">BACK</a>

</form>

</div>

</div>    
</body>
</html>
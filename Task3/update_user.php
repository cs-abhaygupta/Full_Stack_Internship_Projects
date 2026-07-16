<?php
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE users SET   
    name ='$name',
    email ='$email',
    phone ='$phone'
    WHERE id='$id'";

    if(mysqli_query($conn, $sql)){
header("Location: dashboard.php?success=updated");
exit();
    }else{
        echo "Error: " .mysqli_error($conn);
    }
}



?>

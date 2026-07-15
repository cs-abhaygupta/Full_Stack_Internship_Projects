<?php
$conn = mysqli_connect("localhost", "root", "", "portfolio_db");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];   
$message = $_POST['message'];
$sql = "INSERT INTO contacts(name, email, message) VALUES ('$name', '$email', '$message')";
if (mysqli_query($conn,$sql)){
    echo "New record created successfully";
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
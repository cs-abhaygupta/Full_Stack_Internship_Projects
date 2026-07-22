<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

// Only students can enroll
if ($_SESSION["role"] != "student") {
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$student_id = $_SESSION["id"];

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit();
}

$course_id = intval($_GET["id"]);

// Check if course exists
$course = mysqli_query($conn, "SELECT id FROM courses WHERE id='$course_id'");

if (mysqli_num_rows($course) == 0) {
    header("Location: dashboard.php?error=1");
    exit();
}

// Check if already enrolled
$check = mysqli_query($conn,
    "SELECT * FROM enrollments
     WHERE student_id='$student_id'
     AND course_id='$course_id'"
);

if (mysqli_num_rows($check) > 0) {
    header("Location: dashboard.php?already=1");
    exit();
}

// Insert enrollment
$sql = "INSERT INTO enrollments(student_id, course_id)
        VALUES('$student_id','$course_id')";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php?success=1");
} else {
    header("Location: dashboard.php?error=1");
}

exit();
?>x
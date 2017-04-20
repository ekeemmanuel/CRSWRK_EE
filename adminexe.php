<?php
session_start();
include_once 'resources/connection.php';
$course = $_POST['course'];
$crsttle = $_POST['crsttle'];
$crswrk = $_POST['crswrk'];
$deadline = $_POST['deadline'];


$ass_id = rand(100, 999);
$sql = "INSERT INTO assignment (A_id, description, submissionDate, title, courseCode) VALUES ('$ass_id','$crswrk','$deadline','$crsttle','$course')";

if (mysqli_query($servcon, $sql)) {
    $_SESSION['success'] = "New record created successfully";

    header("Location: admin.php");
} else {
    $_SESSION['failed'] = "Error: " . $sql . "<br>" . mysqli_error($servcon);
}

session_write_close();
header("location:admin.php");
exit;

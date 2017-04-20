<?php
session_start();
include_once 'resources/connection.php';
$crsttle = $_POST['crsttle'];


$grp = $_POST['grpzzz'];

$sql = "INSERT INTO groups(group_name,Ass_id) VALUES ('$crsttle','$grp')";

if (mysqli_query($servcon, $sql)) {
    $_SESSION['success'] = "New record created successfully";

    header("Location: group.php");
} else {
    $_SESSION['failed'] = "Request not completed";
}

session_write_close();
header("location:group.php");
exit;


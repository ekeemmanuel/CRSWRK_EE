<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body class="container-fluid">
<?php

if (!isset($_SESSION['userSession'])) {


    $uname = $_POST['username'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "Username and password are  mandatory";
    }
    $query = "SELECT * FROM users WHERE userID='" . $uname . "' and password='" . $password . "'";
    $res = mysqli_query($servcon, $query);


    $uiddd = "";
    $currentuser = "";
    if (mysqli_num_rows($res) != 1) {
        header("location: index.html");
        echo "username or password incorrect";

    } else {
        $reser = mysqli_fetch_array($res);
        $uiddd = $reser[0];
        $currentuser = $reser[1];
        echo "<h4>" . "Hello  " . "{$currentuser}" . "<h4>";

        $_SESSION['userSession'] = $currentuser;

    }


}

?>

<? $que = "SELECT * FROM courses WHERE courseCode IN (SELECT courseCode FROM users_module WHERE user_Id = $uiddd)";
$selected = mysqli_query($servcon, $que);
$ans = mysqli_num_rows($selected);
while ($ans > 0) {
    $rows2 = mysqli_fetch_array($selected);


    echo "{$rows2[1]}";


}

?>


<div class="row">
    <span class="glyphicon glyphicon-list col-md-4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-8 col-md-offset-1">
        <h3 align="center">Coursework Details</h3>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM OO7</a></div>
            <div class="list-group">
                <a href="#" class="list-group-item">Coursework 1</a>
                <a href="#" class="list-group-item">Coursework 2</a>
                <a href="#" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM OO8</a></div>
            <div class="list-group">
                <a href="#" class="list-group-item">Coursework 1</a>
                <a href="#" class="list-group-item">Coursework 2</a>
                <a href="#" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM O21</a></div>
            <div class="list-group">
                <a href="#" class="list-group-item">Coursework 1</a>
                <a href="#" class="list-group-item">Coursework 2</a>
                <a href="#" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM 501</a></div>
            <div class="list-group">
                <a href="#" class="list-group-item">Coursework 1</a>
                <a href="#" class="list-group-item">Coursework 2</a>
                <a href="#" class="list-group-item">Coursework 3</a>
            </div>
        </div>
    </div>
</div>

<footer>To setup or edit coursework, click <a href="admin.html">here.</a></footer>

</body>
</html>

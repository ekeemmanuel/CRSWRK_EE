<?php
include("resources/connection.php");
session_start();
$sid = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Dashboard</title>
</head>
<body class="container-fluid">

<?php include "resources/nav.php" ?>

<?php
echo "<br><br><br>";
echo "<h4>" . "Hello  " . "{$_SESSION['firstName']}" . "<h4>";
echo "Access Level: " . $_SESSION['role']
?>

<?php
//Checking for user role

echo '<span class="glyphicon glyphicon-list col-md-4 col-md-offset-5" aria-hidden="true"></span>
            <div class="col-md-8 col-md-offset-1">
            <h3 align="center">Coursework Details</h3>';
$dbquery = "SELECT distinct courseCode FROM courses";
$result = mysqli_query($servcon, $dbquery);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><class="list-group-item active">' . $row['courseCode'] . '</a></div>';

    echo getCourseTitle($row['courseCode']);
}

function getCourseTitle($cid)
{
    global $servcon;
    $msg = "";
    $dbqueryx = "SELECT title FROM assignment WHERE courseCode ='$cid'";
    $resultx = mysqli_query($servcon, $dbqueryx);
    $msg .= '<div class="list-group">';
    while ($rowx = mysqli_fetch_assoc($resultx)) {
        $msg .= "<a href='courseWork.php?t=" . $rowx['title'] . "' class='list-group-item'>" . $rowx['title'] . "</a>";
    }
    $msg .= "</div></div>";
    return $msg;
}

if (mysqli_num_rows($result) === 0) {
    echo '<div class="list-group">' . "There is currently no coursework for you." . '</div>';
}
?>

<?php include "resources/administrator.php" ?>

</body>
</html>
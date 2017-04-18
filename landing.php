<?php
include("connection.php");
session_start();
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
<div style="position:fixed; right:10px; top:25px;">
    <form align="right" name="form1" method="post" action="log_out.php">
        <label class="logoutLblPos">
            <input name="submit2" type="submit" id="submit2" value="logout">
        </label>
    </form>
</div>
<?php

echo "<h4>" . "Hello  " . "{$_SESSION['firstName']}" . "<h4>";
echo $_SESSION['user']." I am here";
?>

<!--
$que = "SELECT * FROM courses WHERE courseCode IN (SELECT courseCode FROM users_module WHERE user_Id = $uiddd)";
$selected = mysqli_query($servcon, $que);
$ans = mysqli_num_rows($selected);
while ($ans > 0) {
    $rows2 = mysqli_fetch_array($selected);


    echo "{$rows2[1]}";


}
-->
            <?php
                $dbquery = "SELECT courseCode, courseName FROM `courses` WHERE courseCode IN (SELECT courseCode FROM users_module WHERE user_Id ='{$_SESSION['user']}'";
                   $result =  mysqli_query($servcon,$dbquery);
            if(mysqli_num_rows($result)>0){
                while($rowe=mysqli_fetch_assoc($result)) {
                    echo "<h3>"."{$rowe['courseCode']}".":"."{$rowe['courseName']}"."</h3>". "<br/>";
                    $sqd2 = "SELECT title FROM assignment where courseCode ='{$rowe['courseCode']}'";
                    $q2 = mysqli_query($servcon,$sqd2);
                    if(mysqli_num_rows($q2)>0){
                        while($rowe2=mysqli_fetch_assoc($q2)){
                            echo "<a href='courseWork.php?t={$rowe2['title']}'>"."{$rowe2['title']}"."</a>". "<br/>";
                        }
                    }
                }

            }






            ?>
<div class="row">
    <span class="glyphicon glyphicon-list col-md-4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-8 col-md-offset-1">
        <h3 align="center">Coursework Details</h3>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <class
                ="list-group-item active">CMM OO7</a></div>
            <div class="list-group">
                <a href="courseWork.php" class="list-group-item">Coursework 1</a>
                <a href="courseWork.php" class="list-group-item">Coursework 2</a>
                <a href="courseWork.php" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <class
                ="list-group-item active">CMM OO8</a></div>
            <div class="list-group">
                <a href="courseWork.php" class="list-group-item">Coursework 1</a>
                <a href="courseWork.php" class="list-group-item">Coursework 2</a>
                <a href="courseWork.php" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <class
                ="list-group-item active">CMM O21</a></div>
            <div class="list-group">
                <a href="courseWork.php" class="list-group-item">Coursework 1</a>
                <a href="courseWork.php" class="list-group-item">Coursework 2</a>
                <a href="courseWork.php" class="list-group-item">Coursework 3</a>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a class="list-group-item active">CMM 501</a></div>
            <div class="list-group">
                <a href="courseWork.php" class="list-group-item">Coursework 1</a>
                <a href="courseWork.php" class="list-group-item">Coursework 2</a>
                <a href="courseWork.php" class="list-group-item">Coursework 3</a>
            </div>
        </div>
    </div>
</div>





<div <?php if($_SESSION['role']=='student'){?>style="display: none" <?php }?> >
    <p>To setup or edit coursework, click <a href="admin.php">here.</a></p>
</div>

</body>

</html>
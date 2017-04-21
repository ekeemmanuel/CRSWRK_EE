<?php
include("resources/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<?php include "resources/nav.php" ?>
<div class="row">
    <span class="glyphicon glyphicon-pencil col--4 col-sm-offset-5" aria-hidden="true"></span>
    <div class="col-sm-6 col-sm-offset-3">
        <h3 align="center">Administrator</h3>

        <?php

        if (isset($_SESSION['success'])) {
            echo "<font color='blue'>" . $_SESSION['success'] . "</font>";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['failed'])) {
            echo "<font color='red'>" . $_SESSION['failed'] . "</font>";
            unset($_SESSION['failed']);
        }

        ?>

        <legend>Coursework Setup</legend>

        <form class="form-horizontal" method="post" action="adminexe.php" enctype="multipart/form-data">
            <div class="form-group">
                <?php $sqd7 = "SELECT courseCode, courseName FROM `courses`";
                $q6 = mysqli_query($servcon, $sqd7);
                echo "  <select class=\"col-sm-12 form-control\" name='course'>";
                while ($rown = mysqli_fetch_assoc($q6)) {
                    echo "<option value='{$rown['courseCode']}'>{$rown['courseCode']}" . ":" . "{$rown['courseName']}" . "</option>";
                }
                echo " </select>";

                ?>
            </div>
            <div class="form-group">
                <label for="crsttle">Coursework Title:</label>
                <input name="crsttle" class="col-sm-12 form-control" type="text" placeholder="Enter Coursework Title"/>
            </div>
            <div class="form-group">
                <label for="crswrk">Coursework Description:</label>
                <textarea name="crswrk" class="col-sm-12 form-control" rows="5" cols="25"
                          placeholder="Describe The Coursework"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Submission Deadline:</label>
                <input name="deadline" class="col-sm-12 form-control" type="date" placeholder=""/>
            </div>
            <div class="form-group">
                <span class="glyphicon glyphicon-cloud-upload col-sm-1 col-sm-offset-7" aria-hidden="true"></span>
                <input type="submit" class="col-sm-4 btn btn-primary" value="Upload"/>
            </div>
    </div>
<?php include "resources/footer.php" ?>
</body>
</html>
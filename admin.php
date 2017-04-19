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
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<?php include "nav.php" ?>
<div class="row">
    <span class="glyphicon glyphicon-pencil col-md-4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Administrator</h3>
        <legend>Coursework Setup</legend>

        <form class="form-horizontal" method="get" action="adminexe.php" enctype="multipart/form-data">
            <?php $sqd7 = "SELECT courseCode, courseName FROM `courses`";
            $q6 = mysqli_query($servcon, $sqd7);
            echo "  <select class='col-md-12 form-control' name='course'>";
            while ($rown = mysqli_fetch_assoc($q6)) {
                echo "<option value='{$rown['courseName']}'>{$rown['courseCode']}" . ":" . "{$rown['courseName']}" . "</option>";
            }
            echo " </select>";


            ?>

            <div class="form-group">
                <label for="crsttle">Coursework Title:</label>
                <input name="crsttle" class="col-md-12 form-control" type="text" placeholder="Enter Coursework Title"/>
            </div>
            <div class="form-group">
                <label for="crswrk">Coursework Description:</label>
                <textarea name="crswrk" class="col-md-12 form-control" rows="5" cols="25"
                          placeholder="Describe The Coursework"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Submission Deadline:</label>
                <input name="deadline" class="col-md-12 form-control" type="date" placeholder=""/>
            </div>


            <h4>Peer Group Setup</h4>
            <hr/>
            <div class="form-group">
                <select class='col-md-12 form-control' name="grp">
                    <?php $sqd8 = "SELECT group_name FROM groups";
                    $q8 = mysqli_query($servcon, $sqd8);

                    while ($rowd = mysqli_fetch_assoc($q8)) {
                        echo "<option class='list-group-item' value='{$rowd['group_name']}'>{$rowd['group_name']}</option>";

                    }


                    ?>

                </select>
            </div>

            <div class="form-group">
                <select class='col-md-12 form-control' multiple name="std">
                    <?php
                    $ss = "student";
                    $sqd9 = "SELECT userID FROM users WHERE role = '{$ss}'";
                    $q9 = mysqli_query($servcon, $sqd9);
                    print_r(mysqli_fetch_assoc($q9));
                    while ($rowen = mysqli_fetch_assoc($q9)) {
                        echo "<option class='list-group-item'  value='{$rowen['userID']}'>{$rowen['userID']}</option>";
                    }


                    ?>
                </select>


                <div class="form-group">
                    <span class="glyphicon glyphicon-cloud-upload col-md-1 col-md-offset-7" aria-hidden="true"></span>
                    <input type="submit" class="col-md-4 btn btn-primary" value="Upload"/>
                </div>
        </form>
    </div>

</div>
</body>
</html>
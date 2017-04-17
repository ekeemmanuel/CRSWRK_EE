<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<div style="position:fixed; right:10px; top:25px;">
    <form align="right" name="form1" method="post" action="log_out.php">
        <label class="logoutLblPos">
            <input name="submit2" type="submit" id="submit2" value="logout">
        </label>
    </form>
</div>
<div class="row">
    <span class="glyphicon glyphicon-pencil col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Administrator</h3>


                <legend>Coursework Setup||<a href="admin2.php">Submitted Feedbacks</a> </legend>
                <form class="form-horizontal" method="get">
            <?php $sqd7 = "SELECT courseCode, courseName FROM `courses`";
                   $q6= mysqli_query($servcon, $sqd7);
                   echo "  <select class='col-md-12 form-control' name='course'>";
                   while ($rown=mysqli_fetch_assoc($q6)){
                       echo "<option value='{$rown['courseName']}'>{$rown['courseCode']}".":"."{$rown['courseName']}"."</option>";
                   }
                    echo " </select>";


            ?>

                <div class="form-group">
                    <label for="crsttle">Coursework Title:</label>
                    <input name="crsttle"   class="col-md-12 form-control" type="text" placeholder="Enter Coursework Title" />
                </div>
                <div class="form-group">
                    <label for="crswrk">Coursework Description:</label>
                    <textarea name="crswrk"   class="col-md-12 form-control" rows="5" cols="25" placeholder="Describe The Coursework" ></textarea>
                </div>
                <div class="form-group">
                    <label for="deadline">Submission Deadline:</label>
                    <input name="deadline" class="col-md-12 form-control" type="date" placeholder=""/>
                </div>


                    <h4>Peer Group Setup</h4><hr/>
                    <div class="form-group">
                        <select class='col-md-12 form-control'  name="grp">
                    <?php $sqd8 = "SELECT group_name FROM groups";
                        $q8=mysqli_query($servcon, $sqd8);

                        while ($rowd = mysqli_fetch_assoc($q8)){
                            echo "<option class='list-group-item' value='{$rowd['group_name']}'>{$rowd['group_name']}</option>";

                        }


                    ?>

                        </select>
                    </div>

                <div class="form-group">
                    <select class='col-md-12 form-control' multiple  name="std">
                    <?php
                        $ss = "student";
                        $sqd9 = "SELECT userID FROM users WHERE role = '{$ss}'";
                        $q9= mysqli_query($servcon, $sqd9);
                   print_r(mysqli_fetch_assoc($q9));
                        while($rowen = mysqli_fetch_assoc($q9)){
                            echo "<option class='list-group-item'  value='{$rowen['userID']}'>{$rowd['userID']}</option>";
                        }


                    ?>
                    </select>







                <div class="form-group">
                    <span class="glyphicon glyphicon-cloud-upload col-md-1 col-md-offset-7" aria-hidden="true" ></span>
                    <input type="submit" class="col-md-4 btn btn-primary"  value="Upload"/>
                </div>
        </form>
        <span>To view uploaded coursework, click <a href="landing.php">here.</a></span>

    </div>

</div>

</body>
</html>
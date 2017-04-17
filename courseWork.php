<?php
include("connection.php");
session_start();

$title = $_GET['t'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peer Assessment</title>
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
    <span class="glyphicon glyphicon-user col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-4 col-md-offset-2">
        <h3 align="center">Peer Assessment & Feedback</h3>

        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Details</legend>

                <div class="container">
                        <div class="form-group row">
                            <label for="inputTitle" class="col-md-8 col-form-label">Title: <?php echo $title?></label>
                            </div>
                    <?php $sqd3="SELECT * FROM assignment WHERE title ='{$_GET['t']}' ";
                            $res1=null;
                           $q4 = mysqli_query($servcon, $sqd3);
                            if(mysqli_num_rows($q4)==1){
                                $res1 =  mysqli_fetch_assoc($q4);
                            }
                    ?>
                        <div class="form-group row">
                            <label for="descr" class="col-md-8 col-form-label">Description: <?php echo $res1['description']?></label>
                        </div>
                        <div class="form-group row">
                            <label for="subm" class="col-md-8 col-form-label">Submission Deadline:  <?php echo $res1['submissionDate']?></label>
                        </div>
                    <div class="form-group row">
                        <label for="group" class="col-md-6 col-form-label">Coursework Grouping
                            <ul class="list-group">
                    <?php $sqd4 = "SELECT * FROM groups WHERE Ass_Id='{$res1['A_id']}'";
                               $q5= mysqli_query($servcon, $sqd4);

                                    while($rowa=mysqli_fetch_assoc($q5)){
                                        echo "<li class='list-group-item'> {$rowa['group_name']}: ";

                                        $sqd6 = "SELECT userID FROM users_group WHERE group_ID='{$rowa['id']}'";
                                        $q6= mysqli_query($servcon, $sqd6);
                                        echo "<ul>";
                                        while($rowi=mysqli_fetch_assoc($q6)){
                                            echo "<li class='list-group-item' > {$rowi['userID']}</li>";

                                        }
                                        echo "</ul></li>";




                                }

                    ?>



                                <!--    <li class="list-group-item">Group 2: ST000002, ST000004, ST00006</li>
                                    <li class="list-group-item">Group 3: ST000007, ST000008, ST00009</li> -->
                                </ul></label>
                        </div>
            </fieldset>
        </form>

        <form class="form-horizontal" action="submit.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Feedback Details</legend>
                <div class="form-group">
                    <label for="feedback">Student Feedback:</label>

                    <textarea class="form-control" rows="5" name="fdback" placeholder="Please enter your feedback here. Remember to set word limit later!"></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input name="novel" class="col-md-12 form-control" type="file" placeholder="Upload Supporting Document" />
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-floppy-open col-md-1 col-md-offset-4" aria-hidden="true" ></span>
                    <input type="submit" class="col-md-3 btn btn-primary"  value="Submit"/>
                    <input  type="button" class="col-md-3 col-md-offset-1 btn" onclick="location.href='landing.php'" value="Cancel"/>
                   </div>
            </fieldset>
        </form>
    </div>
</div>


<div <?php if($_SESSION['role']=='student'){?>style="display: none" <?php }?> >
    <p>To setup or edit coursework, click <a href="admin.php">here.</a></p>
</div>

</body>
</html>

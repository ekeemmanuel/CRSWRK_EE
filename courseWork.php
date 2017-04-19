<?php
include("connection.php");
session_start();
if (isset($_GET['t'])) {
    echo $_SESSION['user'];
    $title = $_GET['t'];}
    else{
    header('location:landing.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peer Assessment</title>
</head>

<body class="container-fluid">
<?php include "nav.php" ?>
<div class="row">
    <!--    <span class="glyphicon glyphicon-user col-md-4 col-md-offset-5" aria-hidden="true" ></span>!-->
    <div class="col-md-4 col-md-offset-2">
        <br><h3 align="center">Peer Assessment & Feedback</h3>

        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Details</legend>

                <div class="container">
                    <div class="form-group row">
                        <label for="inputTitle" class="col-md-8 col-form-label">Title: <?php echo $title ?></label>
                    </div>
                    <?php $sqd3 = "SELECT * FROM assignment WHERE title ='{$_GET['t']}' ";
                    $res1 = null;
                    $q4 = mysqli_query($servcon, $sqd3);
                    if (mysqli_num_rows($q4) == 1) {
                        $res1 = mysqli_fetch_assoc($q4);
                    }
                    ?>
                    <div class="form-group row">
                        <label for="descr"
                               class="col-md-8 col-form-label">Description: <?php echo $res1['description'] ?></label>
                    </div>
                    <div class="form-group row">
                        <label for="subm" class="col-md-8 col-form-label">Submission
                            Deadline: <?php echo $res1['submissionDate'] ?></label>
                    </div>
            </fieldset>
        </form>

<?php if($_SESSION['role']=='student') {
    echo '<form class="form-horizontal" action="submit.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Feedback Details</legend>
                <div class="form-group">
                    <label for="feedback">Student Feedback:</label>

                    <textarea class="form-control" rows="5" name="fdback"
                              placeholder="Please enter your feedback here"></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input name="novel" class="col-md-12 form-control" type="file"
                           placeholder="Upload Supporting Document"/>
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-floppy-open col-md-1 col-md-offset-6" aria-hidden="true"></span>
                    <input type="submit" class="col-md-5 btn btn-primary" value="Submit"/>
                </div>
            </fieldset>
        </form>';
}?>
    </div>
</div>

<?php include "administrator.php" ?>

</body>
</html>
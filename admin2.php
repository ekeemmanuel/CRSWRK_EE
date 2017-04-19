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
    <span class="glyphicon glyphicon-pencil col-md-4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Submitted Feedbacks</h3>

<?php
$ct = 1;
$dbquery = "SELECT distinct userID FROM users WHERE userID like '%ST%'";
$result =  mysqli_query($servcon,$dbquery);
    echo '<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Student ID</th>
    </tr>
    </thead>';
while($row = mysqli_fetch_assoc($result)) {
    echo '<tbody>
    <tr>
        <th scope="row">'.$ct.'</th>
        <td><a href="">';
    echo "<a href='admin2.php?s=".$row['userID']."' class='list-group-item'style=\"text-align: center\">".$row['userID']."</a>";
    echo '</a></td>
    </tr>';

    $ct++;
}
echo '</tbody></table>';
?>
    </div>
    <div class="col-md-4 col-md-offset-3">
        <form class="form-horizontal">
            <fieldset>
                <legend><?php
                    if (isset($_GET['s'])){$chosen = $_GET['s'];
                    $dbq = "SELECT * FROM users WHERE userID='$chosen'";
                    $showe = mysqli_query($servcon, $dbq);
                    $res = mysqli_fetch_array($showe);
                    echo $res['firstname']." ".$res['lastname']; echo "</legend>";}?>
                <div class="form-group">
                    <label for="feedback">Feedback Report:</label>
                     <textarea class="form-control" rows="5">
                         <?php
                        if (isset($_GET['s'])){$chosen = $_GET['s'];
                            $rpt = "SELECT * FROM uploads WHERE user_ID='$chosen'";
                            $repo=mysqli_query($servcon, $rpt);
                            $repor = mysqli_fetch_array($repo);
                            if (mysqli_num_rows($repo)>0){
                                echo $repor['texta'];}
                                else{
                                 echo "No submission to  display";
                         }
                        }?></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='submit.php'" value="view"/>
                </div>
            </fieldset>
        </form>
        <?php if (!isset($_GET['s'])){
        echo "Please select a student to display feedback";
        } ?>
    </div>
</div>
</body>
</html>
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
<?php include "resources/nav.php";?>
<div class="row">
<br><br><br>
    <div class="col-md-6 col-md-offset-3">
        <h3 align="center">Submitted Feedbacks</h3>

        <?php if (isset($_GET['c'])){ $student=$_GET['c'];
        $ct = 1;
        $dbquery = "SELECT * FROM uploads WHERE user_ID='$student' ";
        $result =  mysqli_query($servcon,$dbquery);
        echo '<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Submitted Courseworks</th>
    </tr>
    </thead>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tbody>
    <tr>
        <th scope="row">'.$ct.'</th>
        <td><a href="">';$needful=$row['id'];
            echo "<a href='viewspec.php?s=".$needful."' class='list-group-item'style=\"text-align: center\">".$row['courseworkTitle']."</a>";
            echo '</a></td>
    </tr>';
            $ct++;
        }
        echo '</tbody></table>
        
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal">
            <fieldset><legend>'; echo $_GET['c'];}?>
        </legend>
        <div class="form-group">
                        <label for="feedback">Feedback Report:</label>
                        <textarea class="form-control" rows="8" disabled>
                         <?php
                         if (isset($_GET['s'])){$need=$_GET['s'];
                             $rpt = "SELECT texta FROM uploads WHERE id='$need'";
                             $repo=mysqli_query($servcon, $rpt);
                             $repor = mysqli_fetch_array($repo);
                             if (mysqli_num_rows($repo)){
                                 echo $repor['texta'];}
                             else{
                                 echo "No submission to  display";
                             }
                         }?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='submit.php'" value="return"/>
                    </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
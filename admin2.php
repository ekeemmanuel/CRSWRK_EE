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
        <legend>Submitted Feedbacks</legend>

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
    echo "<a href='admin2.php?t=".$row['userID']."' class='list-group-item'style=\"text-align: center\">".$row['userID']."</a>";
    echo '</a></td>
    </tr>';

    $ct++;
}
echo     '</tbody></table>';
?>

        <form class="form-horizontal">
            <fieldset>
                <legend>Emmanuel Eke</legend>
                <div class="form-group">
                    <label for="feedback">Feedback Report:</label>
                    <textarea class="form-control" rows="5" placeholder="The student's feedback is displayed here. Remember to set word limit later!"></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input name="docs" class="col-md-12 form-control" type="file" placeholder="Upload Supporting Document" />
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
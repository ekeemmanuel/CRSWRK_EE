<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Administrator Page 2</title>
</head>
<body class="container-fluid">
<div class="row">
    <span class="glyphicon glyphicon-folder-open col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Administrator</h3>


        <p>CMMOO7: INTRANET SYSTEMS DEVELOPMENT</p>
            <fieldset>
                <legend><a href="admin.php">Coursework Setup</a>||Submitted Feedbacks</legend>

    <table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Student ID</th>
        <th>Group</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td><a href="">ST000001</a></td>
        <td>Group 1</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td><a href="">ST000003</a></td>
        <td>Group 1</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td><a href="">ST000004</a></td>
        <td>Group 2</td>
    </tr>
    <tr>
        <th scope="row">4</th>
        <td><a href="">ST000006</a></td>
        <td>Group 2</td>
    </tr>
    </tbody>
</table>
            </fieldset>

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
Return to Administrator <a href="admin.php">page</a>
</html>
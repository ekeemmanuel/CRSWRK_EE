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
    <title>Coursework Page</title>
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
    <span class="glyphicon glyphicon-list col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-8 col-md-offset-1">
        <h3 align="center">Coursework Details</h3>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM OO7</a></div>
        <div class="list-group">
            <a href="#" class="list-group-item">Coursework 1</a>
            <a href="#" class="list-group-item">Coursework 2</a>
            <a href="#" class="list-group-item">Coursework 3</a>
        </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><a href="#" class="list-group-item active">CMM OO8</a></div>
        <div class="list-group">
             <a href="#" class="list-group-item">Coursework 1</a>
             <a href="#" class="list-group-item">Coursework 2</a>
             <a href="#" class="list-group-item">Coursework 3</a>
        </div>
        </div>

        <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><a href="#" class="list-group-item active">CMM O21</a></div>
        <div class="list-group">
             <a href="#" class="list-group-item">Coursework 1</a>
             <a href="#" class="list-group-item">Coursework 2</a>
             <a href="#" class="list-group-item">Coursework 3</a>
        </div>
        </div>

        <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><a href="#" class="list-group-item active">CMM 501</a></div>
        <div class="list-group">
             <a href="#" class="list-group-item">Coursework 1</a>
             <a href="#" class="list-group-item">Coursework 2</a>
             <a href="#" class="list-group-item">Coursework 3</a>
        </div>
        </div>
    </div>
</div>
</body>

<div <?php if($_SESSION['role']=='student'){?>style="display: none" <?php }?> >
    <p>To setup or edit coursework, click <a href="admin.php">here.</a></p>
</div>

</html>
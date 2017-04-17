<?php
include("connection.php");
if (!isset($_SESSION['firstName'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
            if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "Username and password are  mandatory!";
        }
            else {
            $query = "SELECT * FROM users WHERE userID='" . $username . "' and password='" . $password . "'";
            $credentials = mysqli_query($servcon, $query);

            $user_id = "";
            $currentuser = "";
                if (mysqli_num_rows($credentials) != 1) {
                echo "username or password incorrect!";
            }
                else {
                session_start();

                $reference = mysqli_fetch_array($credentials);
                $user_id = $reference[0];
                $currentuser = $reference[1];
                $role = $reference[5];

                $_SESSION['role'] = $role;

                $_SESSION['firstName'] = $currentuser;
                $_SESSION['user'] = $user_id;
                header('location:landing.php');
                }
            }
    }
}
    else {
    header('location:landing.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="resources/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home</title>
</head>
<body class="container-fluid">
<div class="row">
    <span class="glyphicon glyphicon-education col-md-4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-4 col-md-offset-2">
        <h3 align="center">Login</h3>
        <span style="display: none" id="hide">Account created successfully, Please Sign in</span>
        <form class="form-horizontal" action="index.php" method="POST">
            <div class="form-group">
                <input name="username" class="col-md-12 form-control" type="text" placeholder="Username"/>
            </div>
            <div class="form-group">
                <input name="password" class="col-md-12 form-control" type="password" placeholder="Password"/>
            </div>
            <div class="form-group">
                <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='register.php'"
                       value="Sign up"/>
                <input type="submit" class="col-md-3 col-md-offset-1 btn btn-primary" value="Login"/>
            </div>

        </form>
    </div>

</div>
</body>
</html>
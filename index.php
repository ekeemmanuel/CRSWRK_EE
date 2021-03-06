<?php
include("resources/connection.php");
echo "<br><br>";
if (isset($_GET['g'])){
    echo "New record created successfully";
}
if (!isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {            //Checking login credentials
        $username = strip_tags($_POST['username']);         //Checking Security
        $password = strip_tags($_POST['password']);

        $username = $servcon->real_escape_string($username);
        $password = $servcon->real_escape_string($password);


        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username and Password are mandatory!
    </div>";

        } else {
            $query = "SELECT * FROM users WHERE userID='" . $username . "' and password='" . $password . "'";
            $credentials = mysqli_query($servcon, $query);

            $user_id = "";
            $currentuser = "";
            if (mysqli_num_rows($credentials) != 1) {
                echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
            } else {
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
}else{
    header('location:landing.php');
}
$servcon->close();
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
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Asar" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home</title>
</head>
<br><br>
<body class="freestyle">
<div class="free">
    <div class="row">
        <div class="col-md-11">
            <h3 id="first" align="center">Login</h3>

            <!-- Self-referencing form!-->
             <form class="form-horizontal" action="index.php" method="POST">
                <div class="form-group">
                   <input name="username" class="col-md-12 form-control" type="text" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input name="password" class="col-md-12 form-control" type="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='register.php'" value="Sign up"/>
                    <input type="submit" class="col-md-3 col-md-offset-1 btn btn-primary" value="Login"/>
                </div>
             </form>
        </div>
    </div>
</div>
</body>
</html>
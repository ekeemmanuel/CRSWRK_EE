<?php
include('resources/connection.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
       if( $_POST['password1']=== $_POST['password2']&& $_POST['role']!="neutral") {
         $userID= $_POST['username'];
         $firstname= $_POST['firstname'];
         $lastname= $_POST['lastname'];
         $email= $_POST['email'];
         $pwd= password_hash($_POST['password1'], PASSWORD_DEFAULT);
         $userrole=  $_POST['role'];

         $sql= "INSERT INTO users (userID, firstname, lastname, email, password, role) VALUES ('$userID','$firstname','$lastname','$email','$pwd','$userrole')";

           if (mysqli_query($servcon, $sql)) {
               echo "New record created successfully";
               header("Location: index.php");
           } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($servcon);
           }
       }
       else{
            echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Please enter correct details!
    </div>";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Register</title>
</head>
<body class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h3 align="center">Register</h3>
            <form class="form-horizontal" action = "register.php" method="POST" <?php $_SERVER['PHP_SELF']?>>
                <div class="form-group">
                    <input name="username"   class="col-md-12 form-control" type="text" placeholder="e.g ST123456" />
                </div>
                <div class="form-group">
                    <input name="firstname"   class="col-md-12 form-control" type="text" placeholder="Firstname" />
                </div>
                <div class="form-group">
                    <input name="lastname"   class="col-md-12 form-control" type="text" placeholder="Lastname" />
                </div>
                <div class="form-group">
                    <input name="email"   class="col-md-12 form-control" type="email" placeholder="Email" />
                </div>
                <div class="form-group">
                    <input name="password1" class="col-md-12 form-control" type="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input name="password2" class="col-md-12 form-control" type="password" placeholder="Confirm Password"/>
                </div>
                <div class="form-group">
                    <label>
                        <select class="col-md-12 form-control" style="width: 100%" name="role">
                            <option value="neutral">Select Role</option>
                            <option value="student">Student</option>
                            <option value="administrator">Administrator</option>
                        </select>
                    </label>
                </div>
                <div class="form-group">
<!--<span class="glyphicon glyphicon-cog col-md-1 col-md-offset-7" aria-hidden="true" ></span>!-->
                    <input type="submit" class="col-md-4 btn btn-primary"  value="Sign up"/>
                </div>
            </form>
            <span>Already have an account? <a href="index.php">Login</a></span>
        </div>
    </div>
</body>
</html>
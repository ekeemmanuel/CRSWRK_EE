<?php include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
        <?php $uname = $_POST['username'];
            $password = $_POST['password'];
               // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if(empty($_POST['username'])|| empty($_POST['password'])){
            echo "Username and password are  mandatory";
        }
        $query = "SELECT * FROM users WHERE userID='".$uname."' and password='".$password."'";
        $res = mysqli_query($servcon,$query);

            $uiddd = "";
            $currentuser = "";
        if(mysqli_num_rows($res)!=1){
            header("location: index.html");
            echo "username or password incorrect";

        }
            else{
               $reser =  mysqli_fetch_array($res);
              $uiddd= $reser[0];
              $currentuser= $reser[1];
                echo "<h4>"."Hello  "."{$currentuser}"."<h4>";
            }

        ?>

    <? $que = "SELECT * FROM courses WHERE courseCode IN (SELECT courseCode FROM users_module WHERE user_Id = $uiddd)";
            $selected = mysqli_query($servcon,$que);
        $ans = mysqli_num_rows($selected);
            while($ans>0){
               $rows2 = mysqli_fetch_array($selected);


                   echo "{$rows2[1]}";


            }

    ?>




</body>
</html>

<?php
include("resources/connection.php");
if(isset($_GET['g'])){
    $tag=$_GET['g'];
   echo $tag;
    $act = "DELETE FROM `groups` WHERE `groups`.`id` = '$tag'";
    echo $act."<br/>";
    if (mysqli_query($servcon, $act)) {
        echo "Record deleted successfully";

  //      header("location:group.php");
    } else {
        echo "Request not completed";
    }

    session_write_close();
   header("location:group.php");
    exit;
}
if(isset($_GET['h'])){
    $tag=$_GET['h'];
    echo $tag;

    $act = "DELETE FROM `assignment` WHERE `assignment`.`A_id` = $tag";
    echo $act."<br/>";
    if (mysqli_query($servcon, $act)) {
        echo "Record deleted successfully";

        header("location:crsremove.php");
    } else {
        echo "Request not completed";
    }
    session_write_close();
  header("location:crsremove.php");
    exit;
}


$targe=$_GET['y'];
echo $targe;
    $acti = "DELETE FROM `uploads` WHERE courseworkTitle='$targe'";
    $remov = mysqli_query($servcon, $acti);

     if (mysqli_query($servcon, $remov)) {
         echo "Record deleted successfully";

         header("location:submit.php");
     } else {
        echo "Request not completed";
     }

     session_write_close();
header("location:submit.php");
exit;

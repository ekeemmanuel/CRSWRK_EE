<?php
session_start();
include_once 'resources/connection.php';
$std= $_POST['std'];

$grp= $_POST['grp'];

foreach ($std as $val){
    $sql= "INSERT INTO users_group(userID,group_ID) VALUES ('$val','$grp')";
    mysqli_query($servcon, $sql);
}

header("location:grouping.php?s=".$grp);exit;
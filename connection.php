<?php
/**
 * Created by PhpStorm.
 * User: Eke
 * Date: 06/04/2017
 * Time: 12:16
 */



    $host = "localhost";
    $user = "root";
    $password = "emmanuel";
    $dbname = "peergroup";
$servcon = mysqli_connect($host, $user, $password,$dbname);
 if(!$servcon){
     die("Connection Failed :  ". mysqli_connect_error());
 }else{echo "Connection Successful";}
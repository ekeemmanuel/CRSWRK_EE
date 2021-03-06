<?php
//initialize variables to hold connection parameters
$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

// get connection detail for azure host and db
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

//Local server
if (!$connectstr_dbhost) {
    $connectstr_dbhost = 'localhost';
    $connectstr_dbname = 'peergroup';
    $connectstr_dbusername = 'root';
    $connectstr_dbpassword = 'emmanuel';
}

$servcon = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);
if(!$servcon){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;

}
else{echo "<header class=\"col-md-12\" style='background-color:white; color: cyan; font-size: 30px; font-style: italic; position: fixed'>EKE_E.C peer review app</header>";}
?>

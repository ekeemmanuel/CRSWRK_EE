<?php
// Connect to database
include("connection.php");

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrieve users
        if(!empty($_GET["userid"]))
        {
            $userid=($_GET["userid"]);
            get_users($userid);
        }
        else
        {
            get_users();
        }
        break;
    case 'POST':
        // Insert user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'PUT':
        // Update user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'DELETE':
        // Delete user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_users($userid)
{
    global $connection;
    $query="SELECT * FROM users";
   if(strlen($userid) > 0)
    {
        $query .= ' WHERE userID="' . $userid . '" LIMIT 1';
    }

    $response=array();
    $result=mysqli_query($connection, $query);
    while($row=mysqli_fetch_array($result))
    {
        $response[]=$row;
    }

    header('Content-Type: application/json');

    echo json_encode($response);
}

// Close database connection
mysqli_close($connection);
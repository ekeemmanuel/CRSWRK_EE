<?php
// Connect to database
include("connection.php");

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrive users
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
        insert_user();
        break;
    case 'PUT':
        // Update user
        $userid=intval($_GET["userid"]);
        update_user($userid);
        break;
    case 'DELETE':
        // Delete user
        $userid=intval($_GET["userid"]);
        delete_user($userid);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_users($userid)
{
    global $connection;
    $query="SELECT email FROM users";
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
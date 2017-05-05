<?php
// Connect to database
include("connection.php");

//capture parsed information
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
        //Disable Insert user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'PUT':
        //Disable Update user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'DELETE':
        // Delete user
        $userid=($_GET["userid"]);
        delete_user(userid);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_users($userid)
{
    global $connection;
    $query="SELECT firstname,lastname,userID,email FROM users WHERE userID like '%ST%' ";
   if(strlen($userid) > 0)
    {
        $query .= ' and userID="' . $userid . '" LIMIT 1';
    }

    $response=array();
    $result=mysqli_query($connection, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $response[]=$row;
    }

    if ($response==null) {
        $response[]= "error - User does not exist!";
    }

    header('Content-Type: application/json');

    echo json_encode($response);
}

function delete_user($userid)
{
    global $connection;
    $query="DELETE FROM users WHERE userID=".$userid;
    if(mysqli_query($connection, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'User Deleted Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'User Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close database connection
mysqli_close($connection);
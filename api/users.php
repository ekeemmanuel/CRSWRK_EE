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
        //Delete Experiment
        delete_users($userid);
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

function delete_users($userid)
{
    global $connection;
    foreach ($userid as $value) {
        $query = "DELETE FROM users WHERE userID='$value'";
        $result = $connection->query($query) or die($connection->error);
        mysqli_free_result($result);
    }
    $response = array();
    if ($connection->affected_rows > 0) {
        header("HTTP/1.0 201 User Deleted Successfully");
        echo json_encode($response[0]="User Deleted successfully");
    } else {
        header("HTTP/1.0 204 No Content Found");
    }
}

// Close database connection
mysqli_close($connection);
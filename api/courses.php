<?php
// Connect to database
include("connection.php");

//capture parsed information
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrieve courses
        if(!empty($_GET["$courseCode"]))
        {
            $courseCode=($_GET["$courseCode"]);
            get_courses($courseCode);
        }
        else
        {
            get_courses();
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
        //Disable Delete user
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_courses($courseCode)
{
    global $connection;
    $query="SELECT * FROM courses";
    if(strlen($courseCode) > 0)
    {
        $query .= ' WHERE courseCode="' . $courseCode . '" LIMIT 1';
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
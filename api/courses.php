<?php
// Connect to database
include("connection.php");

//capture parsed information
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrieve courses
        if(!empty($_GET["coursecode"]))
        {
            $coursecode=($_GET["coursecode"]);
            get_courses($coursecode);
        }
        else
        {
            get_courses();
        }
        break;
    case 'POST':
        //Disable Insert course
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'PUT':
        //Disable Update course
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'DELETE':
        //Disable Delete course
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_courses($coursecode)
{
    global $connection;
    $query="SELECT * FROM courses";
    if(strlen($coursecode) > 0)
    {
        $query .= ' WHERE coursecode="' . $coursecode . '" LIMIT 1';
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
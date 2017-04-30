<?php
// Connect to database
include("connection.php");

//capture parsed information
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrieve assignments
        if(!empty($_GET["a_id"]))
        {
            $a_id=($_GET["a_id"]);
            get_assignments($a_id);
        }
        else
        {
            get_assignments();
        }
        break;
    case 'POST':
        //Disable Insert assignment
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'PUT':
        //Disable Update assignment
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'DELETE':
        //Disable Delete assignment
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_assignments($a_id)
{
    global $connection;
    $query="SELECT a_id,coursecode,title,description,submissiondate FROM assignment";
    if(strlen($a_id) > 0)
    {
        $query .= ' WHERE a_id="' . $a_id . '" LIMIT 1';
    }

    $response=array();
    $result=mysqli_query($connection, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $response[]=$row;
    }

    header('Content-Type: application/json');

    echo json_encode($response);
}

// Close database connection
mysqli_close($connection);
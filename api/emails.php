<?php
// Connect to database
include("connection.php");

//capture parsed information
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrieve emails
        if(!empty($_GET["lastname"]))
        {
            $lastname=($_GET["lastname"]);
            get_emails($lastname);
        }
        else
        {
            get_emails();
        }
        break;
    case 'POST':
        //Disable Insert email
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'PUT':
        //Disable Update email
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case 'DELETE':
        //Disable Delete email
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_emails($lastname)
{
    global $connection;
    $query="SELECT email FROM users";
    if(strlen($lastname) > 0)
    {
        $query .= ' WHERE lastname="' . $lastname . '" LIMIT 1';
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
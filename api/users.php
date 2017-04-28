<?php
// Connect to database
include("connection.php");

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':
        // Retrive users
        if(!empty($_GET["user_id"]))
        {
            $user_id=($_GET["user_id"]);
            get_users($user_id);
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
        $user_id=intval($_GET["user_id"]);
        update_user($user_id);
        break;
    case 'DELETE':
        // Delete user
        $user_id=intval($_GET["user_id"]);
        delete_user($user_id);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function insert_user()
{
    global $connection;
    $user_name=$_POST["user_name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $seller=$_POST["seller"];
    $query="INSERT INTO users SET user_name='{$user_name}', price={$price}, quantity={$quantity}, seller='{$seller}'";
    if(mysqli_query($connection, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'user Added Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'user Addition Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
function get_users($user_id)
{
    global $connection;
    $query="SELECT * FROM users";
    if($user_id)
    {
        $query .= ' WHERE userID="ST000002" LIMIT 1';
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
function delete_user($user_id)
{
    global $connection;
    $query="DELETE FROM users WHERE id=".$user_id;
    if(mysqli_query($connection, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'user Deleted Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'user Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
function update_user($user_id)
{
    global $connection;
    parse_str(file_get_contents("php://input"),$post_vars);
    $user_name=$post_vars["user_name"];
    $price=$post_vars["price"];
    $quantity=$post_vars["quantity"];
    $seller=$post_vars["seller"];
    $query="UPDATE users SET user_name='{$user_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$user_id;
    if(mysqli_query($connection, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'user Updated Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'user Updation Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close database connection
mysqli_close($connection);
<?php
include("connection.php");
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
echo "<br><br><br>";
$user_ID = $_SESSION['user'];
$userFN = $_SESSION['firstName'];
echo $user_ID;
include "nav.php";
if (isset($_FILES['novel']) and ($_POST['fdback'])) {
    $texta=$_POST['fdback'];
    $file = $_FILES['novel'];
    //file properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file = rand(1000, 100000) . "-" . $_FILES['novel']['name'];

    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('txt', 'docx', 'jpeg', 'jpg', 'pdf');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2007152) {

                $file_name_new = $file;
                //uniqid('', true) . '.' . $file_ext;
                $file_destination = 'submitted/' . $file_name_new;

                $query = "SELECT user_ID FROM uploads WHERE user_ID='$user_ID'";

                $result = mysqli_query($servcon, $query);
                echo mysqli_num_rows($result);
                if (mysqli_num_rows($result) === 0) {
                    $query1 = "INSERT INTO uploads (user_ID,texta,type,size,name,fileloc) VALUES ('$user_ID','$texta','$file_ext','$file_size','$file_name','$file_destination')";
                    echo $query1;
                    $result1 = mysqli_query($servcon, $query1);
                    echo "File saved to " . $file_destination;
                    move_uploaded_file($file_tmp, $file_destination);
                } else {
                    echo "Only one submission allowed!";
                    //header('location:courseWork.php');
                }
            }
        }
    }
}else{
    echo "Please fill in required fields";
    header('location:courseWork.php?s=$user_ID');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peer Assessment</title>
</head>

<body class="container-fluid">
<?php include "nav.php" ?>
<fieldset>
    <h3><?php echo $userFN . "_" . $user_ID ?></h3>
    <table width="80%" border="1">
        <tr>
            <td>Report</td>
            <td>File Name</td>
            <td>View</td>
            <td>Delete</td>
        </tr>
        <?php
        $view = "SELECT * FROM uploads WHERE user_ID='$user_ID'";
        $show = mysqli_query($servcon, $view);
        $row = mysqli_fetch_array($show);
        ?>
        <tr>
            <td><?php echo $row['texta'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><a href="submitted/<?php echo $row['name'] ?>" target="_blank">view file</a></td>
            <td>
                <form action="submit.php" method="GET"><input type="submit" value="Delete"></form>
            </td>
            </tr>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql_del = "DELETE FROM uploads WHERE user_ID='$user_ID'";
            $remove = mysqli_query($servcon, $sql_del);
        }?>
    </table>
</fieldset>
</body>
</html>
<?php
include("resources/connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "resources/nav.php";
echo "<br><br><br>";

/**if(isset($_SESSION['success'])){
 * echo "<font color='blue'>".$_SESSION['success']."</font>";
 * unset($_SESSION['success']);
 * }
 **/
if (isset($_SESSION['failed'])) {
    echo "<font color='red'>" . $_SESSION['failed'] . "</font>";
    unset($_SESSION['failed']);
}
if ($_SESSION['role'] == "student") {
    $user_ID = $_SESSION['user'];
    $userFN = $_SESSION['firstName'];
    echo $user_ID;
    if (isset($_FILES) && isset($_POST['fdback'])) {
        $title = $_POST['title'];
        $texta = $_POST['fdback'];
        $file = $_FILES['novel'];
        //file properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
//        $content = addslashes(file_get_contents($_FILES['novel']['tmp_name']));
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

                    $query = "SELECT * FROM uploads WHERE user_ID='$user_ID' and courseworkTitle='$title'";
                    $result = mysqli_query($servcon, $query);
                    if (mysqli_num_rows($result) == 0) {
                        $query1 = "INSERT INTO uploads (user_ID,texta,type,courseworkTitle,name,fileloc) VALUES ('$user_ID','$texta','$file_ext','$title','$file_name_new','$file_destination')";
                        $result1 = mysqli_query($servcon, $query1);
                        echo "<font color='blue'>" . "File saved to " . $file_destination . "</font>";
                        move_uploaded_file($file_tmp, $file_destination);
                    } else {
                        echo "<font color='red'>" . "Only one submission allowed!" . "</font>";
                    }
                }
            }
        } else {
            $_SESSION['failed'] = "Please select a valid file type";
            //header('location:courseWork.php');
        }
    } elseif (isset($_POST['fdback'])) {
        $title = $_POST['title'];
        $texta = $_POST['fdback'];
        $query = "SELECT * FROM uploads WHERE user_ID='$user_ID' and courseworkTitle='$title'";
        $result = mysqli_query($servcon, $query);
        if (mysqli_num_rows($result) == 0) {
            $query1 = "INSERT INTO uploads (user_ID,texta,courseworkTitle) VALUES ('$user_ID','$texta','$title')";
            $result1 = mysqli_query($servcon, $query1);
            echo "<font color='blue'>" . "Submission successful" . "</font>";
        } else {
            $_SESSION['failed'] = "<font color='red'>" . "Multiple entries are not allowed" . "</font>";
        }
    } else {
        $_SESSION['failed'] = "Report section required!";
        //header('location:courseWork.php');
    }
} ?>

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
<?php include "resources/nav.php" ?>
<fieldset>
    <?php if ($_SESSION['role'] == "student") {
        echo "<h3>" . $userFN . "_" . $user_ID . "</h3>";

        echo "<table width='80%' border='1'>
        <tr>
            <td>Coursework Title</td>
            <td>Report</td>
            <td>File Name</td>
            <td>View</td>
            <td>Delete</td>
        </tr>";
        $view = "SELECT * FROM uploads WHERE user_ID='$user_ID'";
        $show = mysqli_query($servcon, $view);
        while ($row = mysqli_fetch_array($show)) {
            echo "<tr><td>" . $row['courseworkTitle'] . " </td> ";
            echo "<td>" . $row['texta'] . " </td> ";
            echo "<td> " . $row['name'] . "</td> ";
            echo "<td><a href=\"submitted/" . $row['name'] . " \" target=\"_blank\">view file</a></td>";
            echo "<td>
              <a href='deletecrs.php?y=" . $row['courseworkTitle'] . "'>Delete</a>
            </td>";
        }
        echo "</tr></table>";
    } else {
        echo "<table class=\"table\">
        <tr>
            <td>S/No</td>
            <td>Coursework Title</td>
            <td>Student ID</td>
            <td>Report</td>
            <td>Supporting Documents</td>
            <td>Delete</td>
        </tr>";
        $counter = 1;
        $adm = "SELECT * FROM uploads";
        $lec = mysqli_query($servcon, $adm);
        while ($displ = mysqli_fetch_assoc($lec)) {
            echo "<tr><td>" . $counter++ . " </td > ";
            echo "<td><a href='viewspec.php?c=" . $displ['user_ID'] . "'>" . $displ['courseworkTitle'] . " .</a></td>";
            echo "<td>" . $displ['user_ID'] . " </td > ";
            echo "<td > " . $displ['texta'] . "</td > ";
            if (empty($displ['name'])) {
                echo "<td >None</a></td>";
            } else {
                echo "<td ><a href = \"submitted/" . $displ['name'] . " \" target=\"_blank\">view file</a></td>";
            }
        echo "<td>
              <a href='deletecrs.php?y=" . $displ['courseworkTitle'] . "'>Delete</a>
            </td>";
        }
        echo "</tr></table>";
    } ?>

</fieldset>
</body>
</html>
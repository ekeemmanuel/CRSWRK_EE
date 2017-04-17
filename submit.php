<?php
include 'connection.php';
session_start();
echo $_SESSION['user'];
if(isset($_FILES['novel'])){
    $file=$_FILES['novel'];
    //print_r($file);

    //file properties
    $file_name=$file['name'];
    $file_tmp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    $file = rand(1000, 100000) . "-" . $_FILES['novel']['name'];

    //Work out the file extension
    $file_ext=explode('.', $file_name);
    $file_ext=strtolower(end($file_ext));

    $allowed= array('txt', 'docx', 'jpeg', 'jpg', 'pdf');

    if (in_array($file_ext,$allowed)){
        if ($file_error===0){
            if ($file_size<=2007152){

                $file_name_new=$file;
                    //uniqid('', true) . '.' . $file_ext;
                $file_destination='submitted/' . $file_name_new;

                if (move_uploaded_file($file_tmp,$file_destination)){
                    $sqlInsert = "INSERT INTO uploads (user_ID,file,type,size,name,fileloc) VALUES ('{$_SESSION['user']}','$file','$file_ext','$file_size','$file_name','$file_destination')";
                    $check=mysqli_query($servcon,$sqlInsert);
                };
                echo $file_destination;
            };
        }
    }else{
        echo "No way!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peer Assessment</title>
</head>

<body class="container-fluid">

<table width="80%" border="1">
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM uploads";
 $result_set=mysqli_query($servcon,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
     ?>
     <tr>
         <td><?php echo $row['name'] ?></td>
         <td><?php echo $row['type'] ?></td>
         <td><?php echo $row['size'] ?></td>
         <td><a href="submitted/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
     </tr>
     <?php
 }
 ?>
</table>
</body>
</html>

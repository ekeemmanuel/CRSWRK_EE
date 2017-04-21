<?php
include("resources/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Group</title>
</head>
<body class="container-fluid">
<?php include "resources/nav.php"?>
<div class="row">
    <span class="glyphicon glyphicon-pencil col-md--4 col-md-offset-5" aria-hidden="true"></span>
    <div class="col-md-6 col-md-offset-3">
        <h3 align="center">GROUP</h3>

        <?php

        if (isset($_SESSION['success'])) {
            echo "<font color='blue'>" . $_SESSION['success'] . "</font>";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['failed'])) {
            echo "<font color='red'>" . $_SESSION['failed'] . "</font>";
            unset($_SESSION['failed']);
        }
        ?>
        <fieldset>
            <legend>Group Setup</legend>
            <form class="form-horizontal" method="post" action="groupexe.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input name="crsttle" class="col-md-12 form-control" type="text"
                           placeholder="Enter the name of the new group"/>
                </div>
                <div class="form-group">
                    <select class='col-md-12 form-control' name='grpzzz'>
                        <option>Select the Coursework</option>
                        <?php $grp = "SELECT * FROM assignment";
                        $grp1 = mysqli_query($servcon, $grp);
                        while ($dan = mysqli_fetch_assoc($grp1)) {
                            echo "<option class='list-group-item' value='" . $dan['A_id'] . "'>" . $dan['title'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-cloud-upload col-md-1 col-md-offset-7" aria-hidden="true"></span>
                    <input type="submit" class="col-md-4 btn btn-primary" value="Create"/>
                </div>
            </form>
        </fieldset>
        <div>
            <?php
            $ct = 1;
            $dbquery2 = "SELECT * FROM `groups`";
            $result2 = mysqli_query($servcon, $dbquery2);
            echo '<table width="100%" border="0" cellpadding="1" cellspacing="1" class="box">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Group Name</th>
        <th>Delete Group</th>
    </tr>
    </thead>';
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo '<tbody>
    <tr>
        <th scope="row">' . $ct . '</th>
        <td><a href="">';
                echo "<a href='grouping.php?s=" . $row2['id'] . "' class='list-group-item'style=\"text-align: center\">" . $row2['group_name'] . "</a>";
                echo "<td><a href='deletecrs.php?g=" . $row2['id'] . "' class='list-group-item'style=\"text-align: center\">Delete</a>";
                echo "</a></td>
            </tr>";

                $ct++;
            }
            echo '</tbody></table>';
            ?>
        </div>
    </div>
</div>
</body>
</html>
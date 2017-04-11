<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<div class="row">
    <span class="glyphicon glyphicon-pencil col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Administrator</h3>


        <p>CMMOO7: INTRANET SYSTEMS DEVELOPMENT</p>
        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Setup||<a href="view.php">Submitted Feedbacks</a> </legend>
                <div class="form-group">
                    <label for="crsttle">Coursework Title:</label>
                    <input name="crsttle"   class="col-md-12 form-control" type="text" placeholder="Enter Coursework Title" />
                </div>
                <div class="form-group">
                    <label for="crswrk">Coursework Description:</label>
                    <input name="crswrk"   class="col-md-12 form-control" type="file" placeholder="Select Document" />
                </div>
                <div class="form-group">
                    <label for="deadline">Submission Deadline:</label>
                    <input name="deadline" class="col-md-12 form-control" type="date" placeholder=""/>
                </div>
            </fieldset>
        </form>


        <form class="form-horizontal">
            <fieldset>
                <legend>Peer Group Setup</legend>
                <div class="form-group">
                    <label for="crsttle">General Description:</label>
                    <input name="crsttle"   class="col-md-12 form-control" type="text" placeholder="Describe the grouping"/>
                </div>
                <div class="form-group">
                    <label for="group">Peer Group Allocation:</label>
                    <ul class="list-group">
                        <li class="list-group-item">Group 1: ST000001, ST000003, ST00005</li>
                        <li class="list-group-item">Group 2: ST000002, ST000004, ST00006</li>
                        <li class="list-group-item">Group 3: ST000007, ST000008, ST00009</li>
                    </ul>
                </div>
            </fieldset>
        </form>

        <form class="form-horizontal">
            <fieldset>
                <legend>Complete Setup</legend>
                <div class="form-group">
                    <span class="glyphicon glyphicon-cloud-upload col-md-1 col-md-offset-7" aria-hidden="true" ></span>
                    <input type="submit" class="col-md-4 btn btn-primary"  value="Upload"/>
                </div>
            </fieldset>
        </form>
        <span>To view uploaded coursework, click <a href="landing.php">here.</a></span>

    </div>

</div>
<div class="row">
</div>
</body>
</html>
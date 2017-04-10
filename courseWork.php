<?php
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
<div class="row">
    <span class="glyphicon glyphicon-user col-md-4 col-md-offset-5" aria-hidden="true" ></span>
    <div class="col-md-4 col-md-offset-2">
        <h3 align="center">Peer Assessment & Feedback</h3>

        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Details</legend>

                <div class="container">
                        <div class="form-group row">
                            <label for="inputTitle" class="col-md-8 col-form-label">Title: Coursework 1</label>
                            </div>
                        <div class="form-group row">
                            <label for="descr" class="col-md-8 col-form-label">Description: Desfvbnmsdmnambckjbjdajvmvvaad</label>
                        </div>
                        <div class="form-group row">
                            <label for="subm" class="col-md-8 col-form-label">Submission Deadline: 21/04/2017</label>
                        </div>
                        <div class="form-group row">
                            <label for="group" class="col-md-6 col-form-label">Coursework Grouping<ul class="list-group">
                                    <li class="list-group-item">Group 1: ST000001, ST000003, ST00005</li>
                                    <li class="list-group-item">Group 2: ST000002, ST000004, ST00006</li>
                                    <li class="list-group-item">Group 3: ST000007, ST000008, ST00009</li>
                                </ul></label>
                        </div>
            </fieldset>
        </form>

        <form class="form-horizontal">
            <fieldset>
                <legend>Feedback Details</legend>
                <div class="form-group">
                    <label for="feedback">Student Feedback:</label>

                    <textarea class="form-control" rows="5" placeholder="Please enter your feedback here. Remember to set word limit later!"></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input name="docs" class="col-md-12 form-control" type="file" placeholder="Upload Supporting Document" />
                </div>
            </fieldset>
        </form>

        <form class="form-horizontal">
            <fieldset>
                <legend>Complete Feedback Submission</legend>
                <div class="form-group">
                    <span class="glyphicon glyphicon-floppy-open col-md-1 col-md-offset-7" aria-hidden="true" ></span>
                    <input type="submit" class="col-md-4 btn btn-primary"  value="Submit"/>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

<span>To setup or edit coursework, click <a href="admin.html">here.</a></span>

</html>

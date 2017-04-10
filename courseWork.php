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
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">Peer Assessment & Feedback</h3>

        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Details</legend>

                <div class="container">
                    <form>
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
                            <label for="group" class="col-md-2 col-form-label">Coursework Grouping:</label>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group 1</th>
                                    <th>Group 2</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ST000001</td>
                                    <td>ST000002</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>ST000003</td>
                                    <td>ST000004</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>ST000005</td>
                                    <td>ST000006</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </form>
            </fieldset>
        </form>

        <form class="form-horizontal">
            <fieldset>
                <legend>Feedback Details</legend>
                <div class="form-group">
                    <label for="feedback">Student Feedback:</label>

                    <textarea class="form-control" rows="5" placeholder="Please enter your feedback here Remember to set word limit later!."></textarea>
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
        <span>To setup or edit coursework, click <a href="admin.html">here.</a></span>

    </div>

</div>
<div class="row">
</div>
</body>

<span>To setup or edit coursework, click <a href="admin.html">here.</a></span>

</html>

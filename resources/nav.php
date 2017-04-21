<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="landing.php" style="background-image: url(" bg.jpg")position=front">Peer Group
            Review System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="landing.php">Home</a></li>
                <li><a href="submit.php">Submitted Feedbacks</a></li>
                <?php if (!($_SESSION['role'] == 'student')) { ?>
                    <li><a href="admin.php">Add Coursework</a></li>
                    <li><a href="crsremove.php">Delete Coursework</a></li>
                    <li><a href="group.php">Group Creation</a></li>
                    <li><a href="grouping.php">Student Grouping</a></li>
                <?php } ?>
                <li><a href="log_out.php">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

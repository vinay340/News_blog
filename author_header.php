<!DOCTYPE html>
<html>
<head>
    <title>Author header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/author.css">
</head>
<?php
require('mysql_conn.php');
include("auth.php");
?>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="author_dashboard.php"><img class="logo_img"src="assets/images/new_balance.gif" alt="logo"height="50px" width="50px" ></a>
            </div>
            <div>
            <ul class="nav navbar-nav">
                <li><a href="author_dashboard.php">HOME</a></li>
                <li><a href="">NOTIFICATIONS<sup>   <span class="bubble">05</span></sup></a></li>
            </ul>
            </div>
            <div class="right">
                <img class="circle" src="assets/images/profile.jpeg" alt="PROFILE" height="50px" width="50px"><span><b> <?php echo $_SESSION['sess_username']?></b></span>&nbsp;<span class="fa fa-caret-down"></span>
                <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

            </div>
        </div>
    </nav> 
</body>
</html>
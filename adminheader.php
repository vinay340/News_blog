<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin header</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/adminheader.css">
    </head>
    <?php
        require('mysql_conn.php');
        include("auth.php");
    ?>
    <body>
        <div class="wrapper">
            <div class="menu">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="admindashboard.php" > <img src="assets/images/NB.jpg" alt="NB"></a>
                        <a class="name"><span ><i>NEWS BLOG</i> </span></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" ><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION['sess_username']?></a></li>
                        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>                         
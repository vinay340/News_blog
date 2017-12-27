<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sidebar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidebar.css">

</head>
<body>
    <div class=container-fluid      >
<?php
include("adminheader.php");
?>
</div>  

<div class="navbar-nav nav_sidebar" >                                        
<div  class="row-fluid">
   
<div class="sidebar">
        <ul class="nav nav-tabs nav-stacked "id="nav-tabs" >
        <li>
        <a href="admindashboard.php">
          <i class="fa fa-tachometer"></i>
          <i class="t_name">Dashboard</i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-users icon"></i>
          <i class="t_name">Authors</i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-comments icon"></i>
          <i class="t_name">Comments</i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-newspaper-o icon"></i>
          <i class="t_name">Posts</i>
        </a>
      </li> 
      <li>
        <a href="#">
          <i class="fa fa-link  icon"></i>
          <i class="t_name">Activities</i>
        </a>
      </li>
          
        </ul>
      </div>
</div>
</div>
</body>
</html>
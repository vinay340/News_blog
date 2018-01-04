<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admindashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    include("sidebar.php");
    include("mysql_conn.php");
     
$sql = 'SELECT title,description,content,date,id FROM news where status =1 ORDER BY created_date DESC LIMIT 5 ';  
$sql1='SELECT news_id,content,created_date,commented_by FROM comment';
//$sql2='SELECT count(id) from user where role_id =1';

//$sql3='SELECT count(id) from user where role_id =2';

$retval=mysqli_query($conn, $sql); 
$retval1=mysqli_query($conn, $sql1);
//$retval2=mysqli_query($conn, $sql2);  
 

//     
    ?>
      <?php
      $adminid=$_SESSION['sess_user_id'];
$query5 = "SELECT count(*) from news where approved_by =$adminid ";
$result5 = mysqli_query($conn,$query5);
$rows5 = mysqli_fetch_assoc($result5);
 ?>
    <?php
$query = "SELECT count(*) from user where role_id = '1'";
$result = mysqli_query($conn,$query);
$rows = mysqli_fetch_assoc($result);
 ?>
   <?php
$query1 = "SELECT count(*) from user where role_id = '2'";
$result1 = mysqli_query($conn,$query1);
$rows1 = mysqli_fetch_assoc($result1);
 ?>
 <?php
$query2 = "SELECT count(*) from user where role_id = '3'";
$result2 = mysqli_query($conn,$query2);
$rows2 = mysqli_fetch_assoc($result2);
 ?>
 <?php
$query3 = "SELECT count(*) from news";
$result3 = mysqli_query($conn,$query3);
$rows3 = mysqli_fetch_assoc($result3);
 ?>
<?php
$query4 = "SELECT count(*) from comment";
$result4 = mysqli_query($conn,$query4);
$rows4 = mysqli_fetch_assoc($result4);
 ?>

               <div class="container-fluid">
                  <div class="wrapper top">
                  <div class="col-md-12 col-sm-12 col-xs-12 row ">
                           <div class="col-lg-4 col-md-4 col-sm-6" onclick="window.open('admin_ref.php#admin','mywindow');" style="cursor: pointer;">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number"><?php echo $rows['count(*)'];?></span>
                                            <p class="stats-info">Admins</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-user-secret"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6" onclick="window.open('admin_ref.php#authors','mywindow');" style="cursor: pointer;">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                        
                                            <span class="stats-number"><?php echo $rows1['count(*)'];?></span>
                                            <p class="stats-info"> Authors</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 " onclick="window.open('admin_ref.php#new_reg','mywindow');" style="cursor: pointer;">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number"><?php echo $rows2['count(*)'];?></span>
                                            <p class="stats-info"> Pending Users</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- second row -->

                       <div class="col-md-12 col-sm-12 col-xs-12 row "onclick="window.open('posts.php','mywindow');" style="cursor: pointer;">
                           <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number"><?php echo $rows5['count(*)'];?></span>
                                            <p class="stats-info"> Approved Posts</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6" onclick="window.open('posts.php','mywindow');" style="cursor: pointer;">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number"><?php echo $rows3['count(*)'];?></span>
                                            <p class="stats-info"> Posts</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-thumb-tack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 " onclick="window.open('comments.php','mywindow');" style="cursor: pointer;" >
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number"><?php echo $rows4['count(*)'];?></span>
                                            <p class="stats-info">Comments</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    <!-- 3rd row -->
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">   
                                <div class=" col-md-8 well">
                                    <fieldset class="col-xs-12">
                                        <h2>Activities</h2>
                                        <div class="tabs">
                                           <div > <ul class="nav nav-pills nav-justified col-md-12" id="tab" >
                                                <li class="active col-md-4"><a href="#recent_news" data-toggle="tab">Recently Published</a></li>
                                                <li class="col-md-4"><a href="#recent_comment" data-toggle="tab">Recently Commented</a></li>
                                            </ul>
                                            </div>
                                            
                                            <div class="tab-content">
                                                <div id="recent_news" class="tab-pane fade in active">

                                                   <?php while($row = mysqli_fetch_assoc($retval)){?>
                                                        <fieldset class="well" >
                                                            <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-xs-4 text-right">
                                                                            <?php echo $row['date'] ?>
                                                                        </div>
                                                                    </div>
                                                                <br>
                                                            <div class="row">
                                                                <div class="col-md-10 col-sm-12 col-xs-12">
                                                                    <h4><?php echo $row['title']?></h4>
                                                                    <p><?php echo $row['description']?>
                                                                    </p>
                                                                </div>
                                                            </div>
        <!-- ........... -->   
                                                        </fieldset>

                                                    <?php } ?>
                                                </div>
                                                <div id="recent_comment"class="tab-pane fade ">
                                                <?php while($row1 = mysqli_fetch_assoc($retval1)){?>
                                                    <fieldset class="well"  >
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong><?php echo $row1['news_id']?></strong>
                                                                    </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-4 text-right">
                                                                        <?php echo $row1['created_date']?>
                                                                        </div>
                                                                    </div>
                                                                <br>
                                                            <div class="row">
                                                                <div class="col-md-2 col-sm-12 col-xs-12">
                                                                    <h4> commented by:<?php echo $row1['commented_by'] ?></h4>
                                                                </div>
                                                                <div class="col-md-10 col-sm-12 col-xs-12">
                                                                    <p><?php echo $row1 ['content']?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>  
                                    
                                    </fieldset> 
                                </div>
                            </div>
                        </div>
                    <!-- ........................ -->
                    </div>
                 </div>
</body>
</html>

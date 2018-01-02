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
     
$sql = 'SELECT title,description,content,date,id FROM news ';  
$sql1='SELECT news_id,content,created_date,commented_by FROM comment';
$retval=mysqli_query($conn, $sql); 
$retval1=mysqli_query($conn, $sql1);  
 
 
    ?>
  

               <div class="container-fluid">
                  <div class="wrapper top">
                       <div class="col-md-12 col-sm-12 col-xs-12 row ">
                           <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of views</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of Posts</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-thumb-tack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 ">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of Comments</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- second row -->
                        <div class="col-md-12 col-sm-12 col-xs-12 row ">
                           <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of Admins</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of Authors</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 ">
                                <div class="panel"id="panel1"> 
                                    <div class="panel-body">
                                        <div class="pull-left col-md-9 col-sm-6">
                                            <span class="stats-number">1000</span>
                                            <p class="stats-info">Number of Registrations</p>
                                        </div>
                                        <div class="pull-right col-md-3 col-sm-6">
                                            <i class="fa fa-user-plus"></i>
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
                                                            <marquee class="marquee " direction="up"  scrolldelay="100">

                                                   <?php while($row = mysqli_fetch_assoc($retval)){?>
                                                        <fieldset class="well" >
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-8">
                                                                    <strong><?php echo $row['id'] ?></strong>
                                                                    </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-4 text-right">
                                                                            <?php echo $row['date'] ?>
                                                                        </div>
                                                                    </div>
                                                                <br>
                                                            <div class="row">
                                                                <div class="col-md-2 col-sm-12 col-xs-12">
                                                                    <img src="assets/images/NB.jpg" class="R_img">
                                                                </div>
                                                                <div class="col-md-10 col-sm-12 col-xs-12">
                                                                    <h4><?php echo $row['title']?></h4>
                                                                    <p><?php echo $row['description']?>
                                                                    </p>
                                                                </div>
                                                            </div>
        <!-- ........... -->   
                                                        </fieldset>

                                                    <?php } ?>
                                                    </marquee>
                                                </div>
                                                <div id="recent_comment"class="tab-pane fade ">
                                                <marquee class="marquee" direction="down"  scrolldelay="100" > 
                                                <?php while($row1 = mysqli_fetch_assoc($retval1)){?>
                                                    <fieldset class="well"  >
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-8">
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
                                                  </marquee>            
                                                </div>
                                            </div>
                                        </div>  
                                    
                                    </fieldset> 
                                </div>
                                <div class= "col-md-4 well">
                                    <fieldset class="col-xs-12">
                                    <ul class="list-group col-md-6">
                                        <li class="list-group-item col-md-6" ><a>All</a> <span class="badge ">12</span></li>
                                        <li class="list-group-item col-md-6"><a>Pending</a><span class="badge col-md-2">12</span></li>
                                        <li class="list-group-item col-md-6"><a>Approved</a><span class="badge col-md-2">5</span></li>
                                        <li class="list-group-item  col-md-6"><a>Trash</a><span class="badge col-md-2">3</span></li>
                                    </ul>    
                                    </fieldset>


                                </div>
                            </div>
                        </div>
                    <!-- ........................ -->
                    </div>
                 </div>
</body>
</html>

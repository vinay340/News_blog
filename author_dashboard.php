<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/author.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    include('adminheader.php');
    $a= $_SESSION['sess_user_id'];
$sql = "SELECT title,description,content,date,id, created_date,status FROM news WHERE author_id = $a";  
$sql1 = "SELECT a.title,a.description,a.content,a.date,a.id,b.name,a.created_date FROM news AS a, user AS b WHERE a.author_id != $a  && a.author_id=b.id";  

$retval=mysqli_query($conn, $sql);
$retval1=mysqli_query($conn, $sql1); 
 
    ?>
    <div class="public_content">
        <div class="container-fluid ">
            <div class="row">       
                <div class="col-md-8 col-xs-12">
                    <marquee behavior="scroll">Your last post reached 1500 views...</marquee>
                </div>
                <div class="col-md-4 col-xs-12 right">
                    <a href="create_news.php"><button type="button" id ="btnn" class="btn btn-primary col-md-12">CREATE NEWS</button></a>
                </div>
            </div>
            <div class="tab">
                <ul class="nav nav-pills nav-justified" id="tab">
                    <li class="col-md-6 active" ><a  data-toggle="pill"  href="#me">Posts by me</a></li>
                    <li class="col-md-6"><a  data-toggle="pill"  href="#others">Posts by others</a></li>
                </ul>
                <div class="tab-content" >
                    <div id="me" class="tab-pane fade in active">
                        <form role="form" action="edit_news.php" method="post">
                        <a href="edit_news.php   "> <button type="submit" class="fa fa-pencil-square-o right" aria-hidden="true">&nbsp;</button> </a>
                        <?php while($row = mysqli_fetch_assoc($retval)){?>

                        <fieldset class="content">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                    <div class="title">
                                                        <strong>
                                                            <h3><?php echo $row['id']?>.<?php echo $row['title']?><b class="right"><?php echo $row['created_date']?></b></h3>
                                                        </strong>
                                                    </div> 
                                                    <div class="col-md-2 col-xs-12">
                                                   <span><input type="radio" name="edit_news"  value= "<?php echo $row['id']?>" ></span> 
                                                        <img  class ="img1" src="assets/images/download.jpeg">
                                                    </div>
                                                    <div class="col-md-10 col-xs-12">
                                                        <p><b><?php echo $row['date']?></b><br>
                                                        <?php echo $row['description']?><br>
                                                       STATUS: <?php echo $row['status']?>
                                                        

                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </fieldset>
                    <?php }?>
                        
                        </form>
                        
                    </div>
                    <div id="others" class="tab-pane fade">
                    <?php while($row1  = mysqli_fetch_assoc($retval1)){?>
                        
                        <fieldset class="content" id="others" >
                            <div class="wrapper recent-updated"> 
                                <ul class="news list-unstyled">
                                    <li class="d-flex justify-content-between" > 
                                        <div class="left-col d-flex">
                                            <div class="title">
                                                <strong><h3><?php echo $row1['title']?><b class="right"><?php echo $row1['created_date']?></b></h3></strong>
                                            </div> 
                                            <div class="col-md-2 col-xs-12">
                                                <img  class ="img1" src="assets/images/download.jpeg">
                                            </div>
                                            <div class="col-md-10 col-xs-12">
                                                <p><b><?php echo $row1['date']?></b><br>
                                                <?php echo $row1['description']?>                                                   
                                                </p>
                                                <p><?php echo $row1['name']?></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </fieldset>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>